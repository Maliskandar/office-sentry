<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OfficeBoyMonitoring;
use App\Models\{OfficeBoy, Building, Floor, Room, Shift};
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use App\Models\Tracking;

class OfficeBoyMonitoringController extends Controller
{
    public function index()
    {
        $monitorings = OfficeBoyMonitoring::with(['officeBoy', 'building', 'floor', 'room', 'shift'])->paginate(10); // Atau angka lain untuk menentukan jumlah item per halaman
        return view('dirut.monitoring', compact('monitorings'));
    }

    public function monitoring()
    {
        $monitorings = OfficeBoyMonitoring::with(['officeBoy', 'building', 'floor', 'room', 'shift'])->paginate(10); // Atau angka lain untuk menentukan jumlah item per halaman
        return view('pengawas.monitoring', compact('monitorings'));
    }

    // public function assignRandom()
    // {
    //     $officeBoys = OfficeBoy::all(); // Ambil semua office boy dari tabel office_boys

    //     foreach ($officeBoys as $officeBoy) {
    //         // Pilih secara acak
    //         $randomBuilding = Building::inRandomOrder()->first();
    //         $randomFloor = Floor::inRandomOrder()->first();
    //         $randomRoom = Room::inRandomOrder()->first();
    //         $randomShift = Shift::inRandomOrder()->first();
    //         $date = Carbon::today();

    //         if ($randomBuilding && $randomFloor && $randomRoom && $randomShift) {
    //             DB::transaction(function () use ($officeBoy, $randomBuilding, $randomFloor, $randomRoom, $randomShift, $date) {
    //                 // Hapus monitoring sebelumnya pada tanggal yang sama
    //                 OfficeBoyMonitoring::where('office_boy_id', $officeBoy->id)->where('date', $date)->delete();

    //                 // Buat monitoring baru
    //                 OfficeBoyMonitoring::create([
    //                     'office_boy_id' => $officeBoy->id, // Menggunakan id dari tabel office_boys
    //                     'building_id' => $randomBuilding->id,
    //                     'floor_id' => $randomFloor->id,
    //                     'room_id' => $randomRoom->id,
    //                     'shift_id' => $randomShift->id,
    //                     'date' => $date,
    //                     'status' => 'Belum Dikerjakan' // Status default, bisa disesuaikan
    //                 ]);
    //             });
    //         }
    //     }

    //     return back()->with('success', 'Office boys are assigned to random places successfully.');
    // }

    // public function assignRandom()
    // {
    //     $officeBoys = OfficeBoy::all(); // Ambil semua office boy dari tabel office_boys
    //     $date = Carbon::today();

    //     foreach ($officeBoys as $officeBoy) {
    //         // Cek apakah office boy sudah memiliki tugas di tanggal tersebut
    //         $existingTask = OfficeBoyMonitoring::where('office_boy_id', $officeBoy->id)
    //             ->where('date', $date)
    //             ->first();

    //         if (!$existingTask) {
    //             // Pilih secara acak ruangan yang masih memiliki kapasitas dan belum diisi oleh office boy tersebut
    //             $eligibleRoom = Room::whereDoesntHave('monitorings', function ($query) use ($officeBoy, $date) {
    //                 $query->where('office_boy_id', $officeBoy->id)
    //                     ->where('date', $date);
    //             })
    //                 ->whereHas('monitorings', function ($query) use ($date) {
    //                     $query->where('date', $date);
    //                 }, '<', DB::raw('rooms.jumlah_office_boy'))
    //                 ->inRandomOrder()
    //                 ->with('floor.building') // Pastikan relasi ke 'floor' dan 'building' terdefinisi
    //                 ->first();

    //             $randomShift = Shift::inRandomOrder()->first();

    //             if ($eligibleRoom && $randomShift) {
    //                 DB::transaction(function () use ($officeBoy, $eligibleRoom, $randomShift, $date) {
    //                     // Buat monitoring baru
    //                     OfficeBoyMonitoring::create([
    //                         'office_boy_id' => $officeBoy->id,
    //                         'building_id' => $eligibleRoom->floor->building->id, // Menggunakan building_id dari relasi floor -> building
    //                         'floor_id' => $eligibleRoom->floor_id, // Menggunakan floor_id dari relasi room -> floor
    //                         'room_id' => $eligibleRoom->id, // Menggunakan id dari room yang terpilih
    //                         'shift_id' => $randomShift->id, // Menggunakan shift yang terpilih
    //                         'date' => $date,
    //                         'status' => 'Belum Dikerjakan'
    //                     ]);
    //                 });
    //             }
    //         }
    //     }

    //     return back()->with('success', 'Office boys are assigned to random places successfully.');
    // }

    public function assignRandom()
    {
        $officeBoys = OfficeBoy::all(); // Ambil semua office boy dari tabel office_boys
        $date = Carbon::today()->addDay(); // Menggunakan tanggal besok

        foreach ($officeBoys as $officeBoy) {
            // Cek apakah office boy sudah memiliki tugas di tanggal tersebut
            $existingTask = OfficeBoyMonitoring::where('office_boy_id', $officeBoy->id)
                ->where('date', $date)
                ->first();

            if (!$existingTask) {
                // Pilih secara acak ruangan yang masih memiliki kapasitas dan belum diisi oleh office boy tersebut
                $eligibleRoom = Room::whereDoesntHave('monitorings', function ($query) use ($officeBoy, $date) {
                    $query->where('office_boy_id', $officeBoy->id)
                        ->where('date', $date);
                })
                    ->whereHas('monitorings', function ($query) use ($date) {
                        $query->where('date', $date);
                    }, '<', DB::raw('rooms.jumlah_office_boy'))
                    ->inRandomOrder()
                    ->with('floor.building') // Pastikan relasi ke 'floor' dan 'building' terdefinisi
                    ->first();

                $randomShift = Shift::inRandomOrder()->first();

                if ($eligibleRoom && $randomShift) {
                    DB::transaction(function () use ($officeBoy, $eligibleRoom, $randomShift, $date) {
                        // Buat monitoring baru
                        OfficeBoyMonitoring::create([
                            'office_boy_id' => $officeBoy->id,
                            'building_id' => $eligibleRoom->floor->building->id, // Menggunakan building_id dari relasi floor -> building
                            'floor_id' => $eligibleRoom->floor_id, // Menggunakan floor_id dari relasi room -> floor
                            'room_id' => $eligibleRoom->id, // Menggunakan id dari room yang terpilih
                            'shift_id' => $randomShift->id, // Menggunakan shift yang terpilih
                            'date' => $date,
                            'status' => 'Belum Dikerjakan'
                        ]);
                    });
                }
            }
        }

        return back()->with('success', 'Office boy berhasil ditugaskan ke tempat acak.');
    }


    // public function resetTasks()
    // {
    //     $today = Carbon::today();

    //     DB::transaction(function () use ($today) {
    //         // Dapatkan semua monitoring untuk hari ini
    //         $todaysMonitorings = OfficeBoyMonitoring::where('date', $today)->get();

    //         foreach ($todaysMonitorings as $monitoring) {
    //             // Reset status menjadi 'Belum Dikerjakan' dan hapus proof_photo
    //             $monitoring->update([
    //                 'status' => 'Belum Dikerjakan',
    //                 'proof_photo' => null,
    //             ]);
    //         }
    //     });

    //     return back()->with('success', 'Status and proof_photo for today have been reset successfully.');
    // }

    public function resetTasks()
    {
        $today = Carbon::today();
        $yesterday = Carbon::yesterday();

        DB::transaction(function () use ($today, $yesterday) {
            // Dapatkan semua monitoring untuk hari kemarin
            $yesterdaysMonitorings = OfficeBoyMonitoring::where('date', $yesterday)->get();

            foreach ($yesterdaysMonitorings as $monitoring) {
                // Cek apakah sudah ada monitoring untuk hari ini
                $existingTodayMonitoring = OfficeBoyMonitoring::where('office_boy_id', $monitoring->office_boy_id)
                    ->where('date', $today)
                    ->first();
                if (!$existingTodayMonitoring) {
                    // Duplikat data monitoring hari kemarin ke hari ini dengan status 'Belum Dikerjakan' dan proof_photo null
                    OfficeBoyMonitoring::create([
                        'office_boy_id' => $monitoring->office_boy_id,
                        'building_id' => $monitoring->building_id,
                        'floor_id' => $monitoring->floor_id,
                        'room_id' => $monitoring->room_id,
                        'shift_id' => $monitoring->shift_id,
                        'date' => $today,
                        'status' => 'Belum Dikerjakan',
                        'proof_photo' => null,
                    ]);
                }
            }
        });

        return back()->with('success', 'Status dan proof_photo hari ini telah disetel ulang dan tugas kemarin telah berhasil diduplikasi.');
    }


    public function filterTasksByDate(Request $request)
    {
        // Validasi input tanggal
        $request->validate([
            'date' => 'required|date',
        ]);

        $date = new Carbon($request->date);

        // Dapatkan semua monitoring sesuai tanggal yang dipilih dengan pagination
        $monitorings = OfficeBoyMonitoring::where('date', $date)
            ->with(['officeBoy', 'building', 'floor', 'room', 'shift'])
            ->paginate(10); // Adjust the number according to your needs

        // Append the date parameter to the pagination links
        $monitorings->appends(['date' => $request->date]);

        return view('pengawas.monitoring', compact('monitorings'));
    }

    // public function tracking(Request $request)
    // {
    //     // Validasi input
    //     $request->validate([
    //         'monitoring_id' => 'required|exists:office_boy_monitorings,id',
    //         'date' => 'required|date',
    //         'sumber_informasi' => 'required|string',
    //         'catatan' => 'required|string',
    //         'lokasi' => 'required|string',
    //     ]);

    //     // Dapatkan monitoring yang berkaitan
    //     $monitoring = OfficeBoyMonitoring::findOrFail($request->monitoring_id);

    //     // Buat record tracking baru
    //     $tracking = new Tracking([
    //         'monitoring_id' => $monitoring->id,
    //         'date' => $request->date,
    //         'sumber_informasi' => $request->sumber_informasi,
    //         'catatan' => $request->catatan,
    //         'lokasi' => $request->lokasi,
    //     ]);

    //     // Simpan tracking
    //     $tracking->save();

    //     return back()->with('success', 'Tracking information has been submitted successfully.');
    // }

    public function showMonitorings(Request $request)
    {
        // Ambil kata kunci pencarian dari request
        $search = $request->input('search');

        // Query ke database dengan kondisi pencarian jika ada
        $monitorings = OfficeBoyMonitoring::with(['officeBoy', 'building', 'floor', 'room', 'shift'])
            ->when($search, function ($query, $search) {
                return $query->whereHas('officeBoy', function ($query) use ($search) {
                    $query->where('nama_lengkap', 'like', "%{$search}%");
                })
                    ->orWhereHas('building', function ($query) use ($search) {
                        $query->where('name', 'like', "%{$search}%");
                    })
                    ->orWhereHas('floor', function ($query) use ($search) {
                        $query->where('name', 'like', "%{$search}%");
                    })
                    ->orWhereHas('room', function ($query) use ($search) {
                        $query->where('name', 'like', "%{$search}%");
                    });
            })
            ->paginate(10); // Ganti dengan angka yang diinginkan untuk pagination

        return view('dirut.monitoring', compact('monitorings'));
    }
}