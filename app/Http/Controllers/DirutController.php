<?php

namespace App\Http\Controllers;

use App\Models\OfficeBoy;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\OfficeBoyMonitoring;
use Carbon\Carbon;

class DirutController extends Controller
{
    function kabag_urdal()
    {
        return view('dirut.dashboard');
    }
    public function index(Request $request)
    {
        $search = $request->input('search');

        $officeBoys = OfficeBoy::when($search, function ($query, $search) {
            return $query->where('nama_lengkap', 'like', '%' . $search . '%');
        })->paginate(10);

        return view('dirut.index', compact('officeBoys'));
    }

    public function show($id)
    {
        $officeBoy = OfficeBoy::findOrFail($id);
        return view('dirut.show', compact('officeBoy')); // Buat view ini untuk menampilkan detail
    }

    public function destroy($id)
    {
        $officeBoy = OfficeBoy::findOrFail($id);
        $officeBoy->delete();
        $user = User::findOrFail($officeBoy->user_id); // Dapatkan user yang terkait dengan office boy
        $user->delete(); // Menghapus user juga akan menghapus office boy karena kaskade

        return redirect()->route('dirut.index')->with('success', 'Office Boy berhasil dihapus.');
    }

    // public function showTrackingResults()
    // {
    //     // Dapatkan semua data tracking
    //     $trackings = OfficeBoyMonitoring::all();

    //     // Kirim data tracking ke view
    //     return view('dirut.tracking_results', compact('trackings'));
    // }
    public function showTrackingResults()
    {
        // Dapatkan data tracking dimana sumber_informasi dan catatan tidak null
        $trackings = OfficeBoyMonitoring::whereNotNull('sumber_informasi')
            ->whereNotNull('catatan')
            ->get();

        // Kirim data tracking ke view
        return view('dirut.tracking_results', compact('trackings'));
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

        return view('dirut.monitoring', compact('monitorings'));
    }

}