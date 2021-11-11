<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function archivo($archivo, $usuario){
        if($archivo -> hasFile('ine_url')){
            $file = $archivo -> file("ine_url");
            $nombreArchivo = $file -> getClientOriginalName();
            $extension = pathinfo($nombreArchivo, PATHINFO_EXTENSION);
            $file -> move(public_path('assets/img/pdf'), $usuario.".".$extension);
           }
    }
}
