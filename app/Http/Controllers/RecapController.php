<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Absensi;
use Auth;

class RecapController extends Controller
{
    public function index()
    {
    	$absensi = Absensi::select("dataAbsensi.id", "dataAbsensi.suhu_badan", "dataAbsensi.jam_masuk", "users.name", "users.email", "users.foto", "users.jabatan", "users.phone", "users.location" , DB::raw("COUNT(*) AS jumlah_masuk"))
        ->join('users', 'users.id', '=', 'dataAbsensi.id_pegawai')
        ->where([
        	[DB::raw('MONTH(dataAbsensi.jam_masuk)'), date('m')],
        	[DB::raw('YEAR(dataAbsensi.jam_masuk)'), date('Y')],

        ])
        ->orderBy('jumlah_masuk', 'desc')
        ->orderBy('dataAbsensi.jam_masuk', 'asc')
        ->groupBy('dataAbsensi.id_pegawai')
        ->get();
        return view('recap', ["users" => $absensi]);
    }
}
