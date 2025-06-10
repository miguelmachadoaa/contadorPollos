<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Repositories\NotificacionRepository;
use Auth;
use Illuminate\Support\Str;
use View;
use Carbon\Carbon;


class NotificacionesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        private readonly NotificacionRepository $notificacionRepository,
    )
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

     public function index(Request $request)
    {
        $notificaciones = $this->notificacionRepository->list();

        return view('admin.notificaciones.index', compact('notificaciones'));
    }

     public function list(Request $request)
    {
        $notificaciones = $this->notificacionRepository->list();

        return view('admin.notificaciones.list', compact('notificaciones'));
    }

    public function update(Request $request)
    {
        $notificaciones = $this->notificacionRepository->update($request->id, [
            'read'=>1
        ]);

        return true;
    }

    public function updateall(Request $request)
    {

        $notifications = $this->notificacionRepository->list();

        foreach($notifications as $notification){

             $this->notificacionRepository->update($notification->id, [
                'read'=>1
            ]);
        }
        
        return redirect('admin/notificaciones');
    }

    
    

}
