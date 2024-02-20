<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OfficeBoy;
use App\Models\OfficeBoyTask;
use App\Models\OfficeBoyReport;
use App\Models\Tracking;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use App\Models\OfficeBoyMonitoring;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Carbon\Carbon;

class OfficeBoyController extends Controller
{
    function office_boy()
    {
        return view('officeboy.dashboard');
    }

    public function create()
    {
        return view('officeboy.createOfficeBoy');
    }

    // public function showTaskDetail($monitoringId)
    // {
    //     // Pastikan bahwa ID monitoring diberikan
    //     if (!$monitoringId) {
    //         return back()->with('error', 'ID monitoring tidak diberikan.');
    //     }

    //     // Temukan tugas berdasarkan monitoring_id
    //     $task = OfficeBoyMonitoring::find($monitoringId);

    //     // Jika tugas tidak ditemukan, kembalikan ke halaman sebelumnya dengan pesan error
    //     if (!$task) {
    //         return back()->with('error', 'Tugas tidak ditemukan.');
    //     }

    //     // Kirim data tugas ke view
    //     return view('officeboy.detail-task', compact('task'));
    // }

    public function showDetail($id)
    {
        $task = OfficeBoyMonitoring::find($id);
        if (!$task) {
            // handle not found
            return redirect()->back()->with('error', 'Task tidak ditemukan.');
        }
        return view('detail-task', compact('task'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nik' => 'required|unique:office_boys',
            'nama_lengkap' => 'required',
            'email' => 'required|email|unique:users',
            'phone' => 'required|numeric',
        ]);

        // Generate a random password
        $randomPassword = Str::random(8);

        // Store the plaintext password temporarily (for display purposes)
        $plaintextPassword = $randomPassword;

        // Store the hashed password in the password column of the office_boys table
        $hashedPassword = Hash::make($randomPassword);

        $user = User::create([
            'name' => $request->nama_lengkap,
            'email' => $request->email,
            'password' => $hashedPassword, // Securely hash the password
            'role' => 'office_boy',
        ]);

        if ($user) {
            // Store phone number and hashed password in the corresponding columns
            $officeBoy = new OfficeBoy;
            $officeBoy->nik = $request->nik;
            $officeBoy->nama_lengkap = $request->nama_lengkap;
            $officeBoy->no_telepon = $request->phone;
            $officeBoy->password = $plaintextPassword; // Store plaintext password
            $officeBoy->user_id = $user->id;
            $officeBoy->save();

            return redirect('/createOfficeBoy')->with('success', 'Akun Office Boy berhasil dibuat. Password: ' . $plaintextPassword);
        } else {
            // Handle error if user fails to be created
        }
    }

    public function editProfile()
    {
        $user = Auth::user();
        $officeBoy = OfficeBoy::where('user_id', $user->id)->firstOrFail();
        return view('officeboy.edit-profile', compact('officeBoy'));
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'tahun_masuk' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required|date',
            'status' => 'required',
            'no_telepon' => 'required',
            'password' => 'nullable|min:6', // Password is optional and should be at least 6 characters if provided
        ]);

        $user = Auth::user();
        $officeBoy = OfficeBoy::where('user_id', $user->id)->firstOrFail();

        // Update profile data
        $officeBoy->tahun_masuk = $request->tahun_masuk;
        $officeBoy->tempat_lahir = $request->tempat_lahir;
        $officeBoy->tanggal_lahir = $request->tanggal_lahir;
        $officeBoy->status = $request->status;
        $officeBoy->no_telepon = $request->no_telepon;

        // Check if a new password is provided and update it
        if ($request->filled('password')) {
            $newPassword = $request->password;

            // Update password in the office_boys table
            $officeBoy->password = $newPassword;
            $officeBoy->save();

            // Update password in the users table
            $user->password = Hash::make($newPassword);
            $user->save();
        } else {
            // If no new password provided, update only other fields
            $officeBoy->save();
        }

        // Check if all required profile fields are filled, then update status_profile
        if ($officeBoy->tahun_masuk && $officeBoy->tempat_lahir && $officeBoy->tanggal_lahir && $officeBoy->no_telepon) {
            $officeBoy->status_profile = 'Sudah Melengkapi';
        } else {
            $officeBoy->status_profile = 'Belum Melengkapi';
        }

        // Save the changes
        $officeBoy->save();

        return redirect()->route('office_boy.edit_profile')->with('success', 'Profil berhasil diperbarui.');
    }

    public function showProfile()
    {
        $user = Auth::user();
        $officeBoy = OfficeBoy::where('user_id', $user->id)->firstOrFail();
        return view('officeboy.profile', compact('officeBoy'));
    }

    // Di dalam OfficeBoyController.php

    // public function showTasks()
    // {
    //     // Dapatkan informasi office boy yang sedang login
    //     // Asumsi bahwa user yang login memiliki relasi ke office boy (misalnya melalui kolom office_boy_id di tabel users)
    //     $officeBoy = Auth::user()->officeBoy; // Ganti 'officeBoy' dengan nama relasi yang sesuai jika berbeda

    //     // Pastikan bahwa office boy ditemukan
    //     if (!$officeBoy) {
    //         return back()->with('error', 'Office boy tidak ditemukan.');
    //     }

    //     // Dapatkan semua tugas yang berkaitan dengan office boy yang sedang login
    //     $tasks = OfficeBoyMonitoring::where('office_boy_id', $officeBoy->id)
    //         ->with(['building', 'floor', 'room', 'shift'])
    //         ->get();

    //     return view('officeboy.task', compact('tasks'));
    // }

    public function showTasks()
    {
        // Dapatkan informasi office boy yang sedang login
        // Asumsi bahwa user yang login memiliki relasi ke office boy (misalnya melalui kolom office_boy_id di tabel users)
        $officeBoy = Auth::user()->officeBoy; // Ganti 'officeBoy' dengan nama relasi yang sesuai jika berbeda

        // Pastikan bahwa office boy ditemukan
        if (!$officeBoy) {
            return back()->with('error', 'Office boy tidak ditemukan.');
        }

        // Dapatkan tanggal hari ini
        $today = Carbon::today();

        // Dapatkan semua tugas yang berkaitan dengan office boy yang sedang login untuk hari ini saja
        $tasks = OfficeBoyMonitoring::where('office_boy_id', $officeBoy->id)
            ->whereDate('date', $today) // Hanya tugas yang bertanggal hari ini
            ->with(['building', 'floor', 'room', 'shift'])
            ->get();

        return view('officeboy.task', compact('tasks'));
    }

    public function showForm()
    {
        // Fetch the authenticated user
        $user = Auth::user();

        // Pass the user data to the view
        return view('officeboy.detail-task', ['user' => $user]);
    }

    public function submitReport(Request $request)
    {
        $request->validate([
            'monitoring_id' => 'required|exists:office_boy_monitorings,id',
            'proof_photo' => 'required|image|max:10240', // Max 10MB
            'catatan_tugas' => 'nullable|string|max:1000', // Contoh validasi untuk catatan_tugas
            'catatan_ob' => 'nullable|string|max:1000', // Contoh validasi untuk catatan_ob
        ]);

        // Temukan tugas berdasarkan monitoring_id
        $task = OfficeBoyMonitoring::findOrFail($request->monitoring_id);

        // Menyimpan bukti foto
        if ($request->hasFile('proof_photo')) {
            $filenameWithExt = $request->file('proof_photo')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('proof_photo')->getClientOriginalExtension();
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            $path = $request->file('proof_photo')->storeAs('public/proofs', $fileNameToStore);

            // Simpan nama file foto ke kolom 'proof_photo'
            $task->proof_photo = $fileNameToStore;
        }

        // Simpan catatan_tugas dan catatan_ob jika tersedia
        if ($request->has('catatan_tugas')) {
            $task->catatan_tugas = $request->catatan_tugas;
        }
        if ($request->has('catatan_ob')) {
            $task->catatan_ob = $request->catatan_ob;
        }

        // Update status tugas menjadi "Selesai Dikerjakan"
        $task->status = 'Selesai Dikerjakan';
        $task->save();

        return back()->with('success', 'Laporan berhasil dikirim.');
    }

    // public function submitReport(Request $request)
    // {
    //     $request->validate([
    //         'monitoring_id' => 'required|exists:office_boy_monitorings,id',
    //         'proof_photo' => 'required|image|max:10240', // Max 10MB
    //     ]);

    //     // Temukan tugas berdasarkan monitoring_id
    //     $task = OfficeBoyMonitoring::findOrFail($request->monitoring_id);

    //     // Menyimpan bukti foto
    //     if ($request->hasFile('proof_photo')) {
    //         $filenameWithExt = $request->file('proof_photo')->getClientOriginalName();
    //         $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
    //         $extension = $request->file('proof_photo')->getClientOriginalExtension();
    //         $fileNameToStore = $filename . '_' . time() . '.' . $extension;
    //         $path = $request->file('proof_photo')->storeAs('public/proofs', $fileNameToStore);

    //         // Simpan nama file foto ke kolom 'proof_photo'
    //         $task->proof_photo = $fileNameToStore;
    //     }

    //     // Update status tugas menjadi "Selesai Dikerjakan"
    //     $task->status = 'Selesai Dikerjakan';
    //     $task->save();

    //     return back()->with('success', 'Laporan berhasil dikirim.');
    // }

    public function checkProfileCompletion($officeBoyId)
    {
        $officeBoy = OfficeBoy::find($officeBoyId);

        if ($officeBoy->tahun_masuk && $officeBoy->tempat_lahir && $officeBoy->tanggal_lahir) {
            $officeBoy->status_profile = 'Sudah Melengkapi';
            $officeBoy->save();
        } else {
            $officeBoy->status_profile = 'Belum Melengkapi';
            $officeBoy->save();
        }

        return back()->with('success', 'Status profil telah diperbarui.');
    }


    public function showTrackings()
    {
        // Dapatkan ID office boy yang sedang login
        $officeBoyId = auth()->user()->officeBoy->id;

        if (!$officeBoyId) {
            return back()->with('error', 'Office boy tidak ditemukan.');
        }

        // Dapatkan semua data tracking yang berkaitan dengan office boy ini
        // dan dimana sumber_informasi dan catatan tidak null
        $trackings = OfficeBoyMonitoring::where('office_boy_id', $officeBoyId)
            ->whereNotNull('sumber_informasi')
            ->whereNotNull('catatan')
            ->get();

        // Kirim data tracking ke view
        return view('officeboy.trackings', compact('trackings'));
    }

    // public function showTrackings()
    // {
    //     // Dapatkan ID office boy yang sedang login
    //     $officeBoyId = auth()->user()->officeBoy->id; // Sesuaikan 'officeBoy' dengan nama relasi yang sesuai di model User Anda

    //     if (!$officeBoyId) {
    //         return back()->with('error', 'Office boy tidak ditemukan.');
    //     }

    //     // Dapatkan semua data tracking yang berkaitan dengan office boy ini
    //     $trackings = OfficeBoyMonitoring::where('office_boy_id', $officeBoyId)->get();

    //     // Kirim data tracking ke view
    //     return view('officeboy.trackings', compact('trackings'));
    // }

    public function updatePhoto(Request $request)
    {
        $request->validate([
            'foto_profil' => 'required|image|mimes:jpeg,png,jpg|max:2048', // Validate the photo
        ]);

        $user = Auth::user();
        $officeBoy = OfficeBoy::where('user_id', $user->id)->firstOrFail();

        // Handle foto profil
        if ($request->hasFile('foto_profil')) {
            $file = $request->file('foto_profil');
            $filename = time() . '.' . $file->getClientOriginalExtension();

            // Delete old photo if exists
            if ($officeBoy->foto_profil) {
                Storage::delete('public/foto_profil/' . $officeBoy->foto_profil);
            }

            // Save new photo
            $file->storeAs('public/foto_profil', $filename);

            // Update photo profil in the database
            $officeBoy->foto_profil = $filename;
            $officeBoy->save();
        }

        return redirect()->back()->with('success', 'Foto profil berhasil diperbarui.');
    }
}