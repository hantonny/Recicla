<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Local;

class LocalController extends Controller{
    public function listar_local(){
        $locais = Local::all();

        $array = array('locais'=>$locais);
        
        return view('local',$array);
    }
}
