<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Welcome extends Controller {

    function index() {
        $data['news'] = DB::select("SELECT * FROM `news` INNER JOIN kategori1 WHERE news.id_kategori=kategori1.id_kategori ORDER BY post_on DESC LIMIT 6");
        $data['slider'] = DB::select("SELECT * FROM slider ORDER BY id_slider DESC");
        $data['bimtek'] = DB::select("SELECT * FROM jenis WHERE id_kategori='1'");
        $data['testimoni'] = DB::select("SELECT * FROM testimoni LIMIT 4");
//        select_join($table1, $table2, $id)
        $data['kelas'] = DB::select("SELECT * FROM kelas INNER JOIN jenis ON kelas.id_jenis=jenis.id_jenis WHERE kelas.id_jenis NOT IN('1') ORDER BY kelas.biaya ASC");
        $data['lain'] = DB::select("SELECT * FROM jenis WHERE jenis.id_jenis IN('25','26','27') AND  jenis.id_jenis NOT IN('1')");
        $data['gallery'] = DB::select("SELECT * FROM gallery inner join album on album.id_album=gallery.id_album order by id_gallery desc limit 9");
        $data['in_house'] = DB::select("SELECT * FROM gallery join album on album.id_album=gallery.id_album where gallery.id_album='21' order by id_gallery desc limit 9");
        $data['private'] = DB::select("SELECT * FROM gallery join album on album.id_album=gallery.id_album where gallery.id_album='20' order by id_gallery desc limit 9");
        $data['regular'] = DB::select("SELECT * FROM gallery join album on album.id_album=gallery.id_album where gallery.id_album='22' order by id_gallery desc limit 9");
        $data['album'] = DB::table('album')->get();

        return view('welcome_message', $data);
    }

}
