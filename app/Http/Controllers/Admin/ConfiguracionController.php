<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Configuracion;
use Auth;
use Illuminate\Support\Str;
use View;


class ConfiguracionController extends Controller
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
        $configuracion = Configuracion::first();
        return view('admin.configuracion.home', compact('configuracion'));
    }

    public function add()
    {
        return view('admin.configuracion.add');
    }


    public function store(Request $request)
    {

        $configuracion = Configuracion::first();

        if(isset($configuracion->id)){

            $configuracion->update([
                'negocio'=>$request->negocio,
                'direccion'=>$request->direccion,
                'telefono'=>$request->telefono,
                'email'=>$request->email,
                'whatsapp'=>$request->whatsapp,
                'videofooter'=>$request->videofooter,
                'show_idioma'=>$request->show_idioma,
                'user_id'=>Auth::getUser()->id
               ]);

        }else{

            Configuracion::create([
                'negocio'=>$request->negocio,
                'direccion'=>$request->direccion,
                'telefono'=>$request->telefono,
                'email'=>$request->email,
                'whatsapp'=>$request->whatsapp,
                'videofooter'=>$request->videofooter,
                'show_idioma'=>$request->show_idioma,
                'user_id'=>Auth::getUser()->id
               ]);

        }

      return redirect('admin/configuracion');
        
    }

}
