<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class PresensiController extends Controller
{
    public function index()
    {
        $qrcode = QrCode::size(400)->generate(Auth::user()->id);
        return view('presensi', compact('qrcode'));
    }
}
