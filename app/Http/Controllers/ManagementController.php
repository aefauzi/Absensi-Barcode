<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Absensi;
use Auth;

class ManagementController extends Controller
{
    public function index()
    {
    	$absensi = Absensi::select("dataAbsensi.id", "dataAbsensi.suhu_badan", "dataAbsensi.jam_masuk", "users.name", "users.email", "users.foto", "users.jabatan", "users.phone", "users.location")
        ->join('users', 'users.id', '=', 'dataAbsensi.id_pegawai')
        ->where([
        	['dataAbsensi.jam_masuk', '>=', date('Y-m-d')],
        	['dataAbsensi.jam_masuk', '<', date('Y-m-d', strtotime("+1 day"))],
        ])
        ->orderBy('dataAbsensi.jam_masuk', 'desc')
        ->groupBy('dataAbsensi.id_pegawai')
        ->get();
        return view('management', ["users" => $absensi]);
    }
}
