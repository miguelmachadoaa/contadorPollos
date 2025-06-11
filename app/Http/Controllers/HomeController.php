<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Configuracion;
use App\Models\Contacto;
use App\Repositories\EmailRepository;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        protected EmailRepository $emailRepository,
        )
    {

        $configuracion = Configuracion::first();

        if(!$configuracion->show_idioma){
            session(['locale' => 'es']);
        }

    }

    public function setlenguaje($locale)
    {

        $configuracion = Configuracion::first();

        if($configuracion->show_idioma){
            session(['locale' => $locale]);
        }else{
            session(['locale' => 'es']);
   
        }

        return back();
    }


    public function sendemail(Request $request){


        try {
            
            $contacto = Contacto::create([
                'nombre'=>$request->name,
                'apellido'=>$request->apellido,
                'email'=>$request->email,
                'telefono'=>$request->telefono??' ',
                'ciudad'=>$request->ciudad??' ',
                'pais'=>$request->pais??' ',
                'mensaje'=>$request->w3lMessage,
            ]);

            $this->emailRepository->contacto($contacto);
            
        } catch (\Throwable $th) {
            return redirect()->route('contacto')->with('error', __('main.errorEmail').' '.$th);    

        }

        return redirect()->route('contacto')->with('success', __('main.emailEnviado'));    


    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        return redirect('/login');


        $idioma = Session::get('locale');

        $idioma = $idioma??'es';

        session(['locale' => $idioma]);

        return view('index', [
            'configuracion'=>Configuracion::first()
        ]);
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function contacto()
    {

        $idioma = Session::get('locale');

        $idioma = $idioma??'es';

        return view('contacto', [
            'configuracion'=>Configuracion::first()
        ]);
    }



    

    

    public function logout()
    {
        auth()->logout();
        return redirect(route('index'));
    }
}
