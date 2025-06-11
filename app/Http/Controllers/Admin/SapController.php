<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Repositories\AuditoriaRepository;
use App\Models\SapRecord;
use App\Events\Notify;
use Auth;
use Illuminate\Support\Str;
use View;
use Pusher\Pusher;
use App\Custom\fpdf\fpdf as fpdf;

class SapController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        private readonly AuditoriaRepository $auditoriaRepository,
    )
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
       
        return view('admin.sap.home' );
    }

    public function add($id_cliente)
    {

        return view('admin.abonos.add', compact('id_cliente'));
    }


    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'fecha' => 'required',
            'forma_pago' => 'required',
            'referencia' => 'required|min:4',
            'monto' => 'required',
            'myfile' => 'required',
        ]);

        try {

            $archivo = null;

            if ($request->hasFile('myfile')) {
    
                $file = $request->file('myfile');
                $extension = $file->extension()?: 'png';
                $picture = Str::random(10) . '.' . $extension;
                $destinationPath = public_path('/uploads/abonos/');
                $file->move($destinationPath, $picture);
                $archivo = $picture;

            }

            $data = $request->all();

            $data['archivo']= $archivo;

            $abono = $this->auditoriaRepository->create($data);

        } catch (\Exception $e) {

            return ['respuesta' => 'error', 'message' => $e->getMessage()];
        }

        $abonos = $this->auditoriaRepository->all();


        return view('admin.abonos.home', compact('abonos'));

        return redirect('admin/areacliente');


        
    }

    public function detail($id)
    {
        $abono = $this->auditoriaRepository->find($id);

        if(!$abono){
            return redirect('home');
        }


        return view('admin.abonos.detail', compact('abono', 'cliente', 'dolar'));
    }


    public function edit($id)
    {
        $contratoTipo = $this->auditoriaRepository->find($id);

        return view('admin.abonos.edit', compact('contratoTipo'));
    }


    public function update($id, Request $request)
    {

        $contratoCategoria = $this->auditoriaRepository->update($id, $request->all());

        return redirect('admin/abonos');
        
    }


    public function status(Request $request)
    {

        try {

            $data = $request->all();

            $contratoCategoria = $this->auditoriaRepository->update($data['id'], [
                'estatus'=>$data['estado_abono'],
                'observaciones'=>$data['observaciones']

            ]);

        } catch (\Exception $e) {

            return ['respuesta' => 'error', 'message' => $e->getMessage()];
        }

        return ['respuesta' => 'exito', 'message' => 'Abono actualizado correctamente.', 'id' => $data['id']];
        
    }

    public function delete($id)
    {

        $this->auditoriaRepository->delete($id);

        return redirect('admin/abonos');
        
    }

    
    

}
