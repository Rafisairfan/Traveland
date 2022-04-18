<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class MainController extends Controller
{
    public function index(Request $request) {
        return view('Main/login');
    }
    public function recomdest(Request $request) {
        $destinasi = DB::table('traveland')->get();
    	// mengirim data pegawai ke view index
    	return view('Main/homepage',['destinasi' => 'masok']);
    }
    public function yourschedule($namadest) {

        // $nama = DB::table('detail')
		// ->where('nama','like',"%".$namadest."%")
		// ->paginate();
        // return view('Main/direction',['nama'=> $namadest]);
        return view('/direction-page');
    }
}
