<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Siswa extends Controller {

    function index() {
        $data['user'] = DB::table("user")->get();

        return view('form_select', $data);
    }

}
