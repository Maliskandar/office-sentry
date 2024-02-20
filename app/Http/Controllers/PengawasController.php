<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\OfficeBoy;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\OfficeBoyMonitoring;
use Illuminate\Support\Carbon;

class PengawasController extends Controller
{
    function pengawas()
    {
        return view('pengawas.dashboard');
    }

    public function show($id)
    {
        $officeBoy = OfficeBoy::findOrFail($id);
        return view('pengawas.show', compact('officeBoy')); // Buat view ini untuk menampilkan detail
    }

    public function index(Request $request)
    {
        $search = $request->input('search');

        $officeBoys = OfficeBoy::when($search, function ($query, $search) {
            return $query->where('nama_lengkap', 'like', '%' . $search . '%');
        })->paginate(10);

        return view('pengawas.index', compact('officeBoys'));
    }

    public function edit($id)
    {
        $officeBoy = OfficeBoy::findOrFail($id);
        return view('pengawas.edit-profile', compact('officeBoy'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            // Validasi inputan
        ]);

        logger()->info($request->all());

        $officeBoy = OfficeBoy::findOrFail($id);
        $officeBoy->update([
            'tahun_masuk' => $request->tahun_masuk,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'status' => $request->status,
            'no_telepon' => $request->no_telepon,
        ]);

        logger()->info($officeBoy->getAttributes());

        return redirect()->route('pengawas.index')->with('success', 'Profil Office Boy berhasil diperbarui.');
    }

    public function monitoring()
    {
        $monitorings = OfficeBoyMonitoring::with(['officeBoy', 'building', 'floor', 'room', 'shift'])->paginate(10);
        return view('pengawas.monitoring', compact('monitorings'));
    }

    public function destroy($id)
    {
        $officeBoy = OfficeBoy::findOrFail($id);
        $officeBoy->delete();
        $user = User::findOrFail($officeBoy->user_id); // Dapatkan user yang terkait dengan office boy
        $user->delete(); // Menghapus user juga akan menghapus office boy karena kaskade

        return redirect()->route('pengawas.index')->with('success', 'Office Boy berhasil dihapus.');
    }


    public function showTrackingForm()
    {
        $today = Carbon::today();

        // Mendapatkan rooms unik dari office_boy_monitorings yang memiliki tanggal hari ini
        $rooms = OfficeBoyMonitoring::with(['room', 'room.floor', 'room.floor.building'])
            ->whereDate('date', $today)
            ->get()
            ->unique('room_id')
            ->pluck('room');

        // Mendapatkan semua office boys dari office_boy_monitorings pada hari ini
        $officeBoys = OfficeBoyMonitoring::with('officeBoy')
            ->whereDate('date', $today)
            ->get()
            ->unique('office_boy_id')
            ->pluck('officeBoy');

        return view('pengawas.tracking', compact('rooms', 'officeBoys'));
    }

    public function Trackings(Request $request)
    {


        // Validasi input
        $request->validate([
            'room_id' => 'required|exists:rooms,id',
            'office_boy_id' => 'nullable|exists:office_boys,id', // Nullable karena bisa saja tidak memilih office boy tertentu
            'sumber_informasi' => 'required|string',
            'catatan' => 'required|string',
            // 'lokasi' => 'nullable|string', // Uncomment jika Anda ingin menggunakan kolom lokasi
        ]);

        $today = Carbon::today();

        if ($request->input('office_boy_id') === null || $request->input('office_boy_id') === '') {
            // Jika "Semua Office Boy" dipilih, ambil semua office boy di ruangan tersebut
            $monitorings = OfficeBoyMonitoring::where('room_id', $request->room_id)
                ->whereDate('date', $today)
                ->get();
        } else {
            // Jika office boy tertentu dipilih, ambil hanya office boy tersebut
            $monitorings = OfficeBoyMonitoring::where('room_id', $request->room_id)
                ->where('office_boy_id', $request->office_boy_id)
                ->whereDate('date', $today)
                ->get();
        }

        if ($monitorings->isEmpty()) {
            return back()->with('error', 'Tidak ada office boy ditemukan di room ini untuk hari ini.');
        }

        foreach ($monitorings as $monitoring) {
            // Perbarui tracking untuk setiap office boy
            $monitoring->update([
                'sumber_informasi' => $request->sumber_informasi,
                'catatan' => $request->catatan,
                // 'lokasi' => $request->lokasi, // Uncomment jika Anda ingin menggunakan kolom lokasi
            ]);
        }

        return back()->with('success', 'Tracking Informasi Pelaporan telah berhasil diperbarui untuk ruangan dan office boy yang dipilih.');
    }

    public function getOfficeBoysByRoom(Request $request)
    {
        $room_id = $request->room_id;
        $officeBoys = OfficeBoyMonitoring::where('room_id', $room_id)
            ->whereDate('date', Carbon::today())
            ->with('officeBoy') // asumsikan relasi ke tabel office boys dengan nama 'officeBoy'
            ->get()
            ->unique('office_boy_id') // menghindari duplikat
            ->pluck('officeBoy');

        return response()->json([
            'officeBoys' => $officeBoys
        ]);
    }

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

        return view('pengawas.monitoring', compact('monitorings'));
    }

    public function showTrackingResults()
    {
        // Dapatkan data tracking dimana sumber_informasi dan catatan tidak null
        $trackings = OfficeBoyMonitoring::whereNotNull('sumber_informasi')
            ->whereNotNull('catatan')
            ->get();

        // Kirim data tracking ke view
        return view('pengawas.tracking_result', compact('trackings'));
    }

    // public function Trackings(Request $request)
    // {
    //     // Validasi input
    //     $request->validate([
    //         'room_id' => 'required|exists:rooms,id',
    //         'sumber_informasi' => 'required|string',
    //         'catatan' => 'required|string',
    //         // 'lokasi' => 'required|string', // Uncomment jika Anda ingin menggunakan kolom lokasi
    //     ]);

    //     // Dapatkan semua office boy monitoring yang berada di room yang dipilih
    //     $monitorings = OfficeBoyMonitoring::where('room_id', $request->room_id)
    //         ->get();

    //     // Pastikan bahwa kita mendapatkan beberapa records
    //     if ($monitorings->isEmpty()) {
    //         return back()->with('error', 'Tidak ada office boy ditemukan di room ini.');
    //     }

    //     foreach ($monitorings as $monitoring) {
    //         // Perbarui tracking untuk setiap office boy
    //         $monitoring->update([
    //             'sumber_informasi' => $request->sumber_informasi,
    //             'catatan' => $request->catatan,
    //             // 'lokasi' => $request->lokasi, // Uncomment jika Anda ingin menggunakan kolom lokasi
    //         ]);
    //     }

    //     return back()->with('success', 'Tracking information has been updated successfully for all office boys in the selected room.');
    // }

    // public function showTrackingForm()
    // {
    //     // Dapatkan tanggal hari ini
    //     $today = Carbon::today();

    //     // Dapatkan semua monitoring untuk hari ini untuk ditampilkan di dropdown
    //     $monitorings = OfficeBoyMonitoring::with('officeBoy')
    //         ->whereDate('date', $today)
    //         ->get();

    //     // Tampilkan view dengan data monitorings
    //     return view('pengawas.tracking', compact('monitorings'));
    // }

    //     public function showTrackingForm()
    // {
    //     // Mendapatkan rooms unik dari office_boy_monitorings
    //     $rooms = OfficeBoyMonitoring::with(['room', 'room.floor', 'room.floor.building'])
    //         ->get()
    //         ->unique('room_id')
    //         ->pluck('room');

    //     return view('pengawas.tracking', compact('rooms'));
    // }
    // public function showTrackingForm()
    // {
    //     $today = Carbon::today();

    //     // Contoh mendapatkan rooms unik dari office_boy_monitorings
    //     $rooms = OfficeBoyMonitoring::with(['room', 'room.floor', 'room.floor.building'])
    //         ->whereDate('date', $today)
    //         ->get()
    //         ->unique('room_id')
    //         ->pluck('room');

    //     return view('pengawas.tracking', compact('rooms'));
    // }


    // public function Tracking(Request $request)
    // {
    //     // Validasi input
    //     $request->validate([
    //         'room_id' => 'required|exists:rooms,id',
    //         'sumber_informasi' => 'required|string',
    //         'catatan' => 'required|string',
    //         'lokasi' => 'required|string',
    //     ]);

    //     // Dapatkan semua office boy monitoring yang berada di room yang dipilih
    //     $monitorings = OfficeBoyMonitoring::where('room_id', $request->room_id)->get();

    //     // Pastikan bahwa kita mendapatkan beberapa records
    //     if ($monitorings->isEmpty()) {
    //         return back()->with('error', 'Tidak ada office boy ditemukan di room ini.');
    //     }

    //     foreach ($monitorings as $monitoring) {
    //         // Buat tracking baru untuk setiap office boy
    //         $monitoring->trackings()->create([
    //             'sumber_informasi' => $request->sumber_informasi,
    //             'catatan' => $request->catatan,
    //             'lokasi' => $request->lokasi,
    //             // Jika Anda memiliki kolom tanggal di tracking, tambahkan 'tanggal' => $request->tanggal atau Carbon::today()
    //         ]);
    //     }

    //     return back()->with('success', 'Tracking information has been added successfully for all office boys in the selected room.');
    // }



    // public function Tracking(Request $request)
    // {
    //     // Validasi input
    //     $request->validate([
    //         'room_id' => 'required|exists:rooms,id',
    //         'sumber_informasi' => 'required|string',
    //         'catatan' => 'required|string',
    //         'lokasi' => 'required|string',
    //     ]);

    //     // Dapatkan semua office boy monitoring yang berada di room yang dipilih
    //     $monitorings = OfficeBoyMonitoring::where('room_id', $request->room_id)
    //         ->get();

    //     // Pastikan bahwa kita mendapatkan beberapa records
    //     if ($monitorings->isEmpty()) {
    //         return back()->with('error', 'Tidak ada office boy ditemukan di room ini.');
    //     }

    //     foreach ($monitorings as $monitoring) {
    //         // Perbarui tracking untuk setiap office boy
    //         $monitoring->update([
    //             'sumber_informasi' => $request->sumber_informasi,
    //             'catatan' => $request->catatan,
    //             'lokasi' => $request->lokasi,
    //         ]);
    //     }

    //     return back()->with('success', 'Tracking information has been updated successfully for all office boys in the selected room.');
    // }





    // public function tracking(Request $request)
    // {
    //     $request->validate([
    //         'monitoring_id' => 'required|exists:office_boy_monitorings,id',
    //         'sumber_informasi' => 'required|string',
    //         'catatan' => 'required|string',
    //         'lokasi' => 'required|string',
    //     ]);

    //     // Temukan monitoring berdasarkan monitoring_id
    //     $monitoring = OfficeBoyMonitoring::findOrFail($request->monitoring_id);

    //     // Update record dengan informasi yang diberikan
    //     $monitoring->update([
    //         'sumber_informasi' => $request->sumber_informasi,
    //         'catatan' => $request->catatan,
    //         'lokasi' => $request->lokasi,
    //         // Jika ingin mengubah status atau kolom lain, Anda bisa menambahkannya di sini.
    //     ]);

    //     return back()->with('success', 'Tracking information berhasil dikirim.');
    // }
}