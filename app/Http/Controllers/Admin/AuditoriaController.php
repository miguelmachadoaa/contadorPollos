<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Repositories\AbonoRepository;
use App\Repositories\ClientesRepository;
use App\Repositories\FormasPagoRepository;
use App\Repositories\ContratoRepository;
use App\Repositories\DolarRepository;
use App\Models\Auditoria;
use App\Events\Notify;
use Auth;
use Illuminate\Support\Str;
use View;
use Pusher\Pusher;
use App\Custom\fpdf\fpdf as fpdf;
class AuditoriaController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        private readonly ContratoRepository $contratoRepository,
        private readonly AbonoRepository $abonoRepository,
        private readonly ClientesRepository $clientesRepository,
        private readonly FormasPagoRepository $formasPagoRepository,
        private readonly DolarRepository $dolarRepository,
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

        $auditoria = Auditoria::join('clientes', 'auditoria.cliente_id', '=', 'clientes.id')->join('users', 'auditoria.user_id', '=', 'users.id')->get();

        return view('admin.auditoria.home', compact('auditoria'));
    }

    public function add($id_cliente)
    {
        $formaspago = $this->formasPagoRepository->all();

        return view('admin.abonos.add', compact('id_cliente', 'formaspago'));
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

            $abono = $this->abonoRepository->create($data);

        } catch (\Exception $e) {

            return ['respuesta' => 'error', 'message' => $e->getMessage()];
        }

        $abonos = $this->abonoRepository->all();


        return view('admin.abonos.home', compact('abonos'));

        return redirect('admin/areacliente');


        
    }

    public function detail($id)
    {
        $abono = $this->abonoRepository->find($id);

        if(!$abono){
            return redirect('home');
        }

        $cliente = $this->clientesRepository->find($abono->cliente_id);
        $dolar = $this->dolarRepository->last();

        return view('admin.abonos.detail', compact('abono', 'cliente', 'dolar'));
    }


    public function edit($id)
    {
        $contratoTipo = $this->abonoRepository->find($id);

        return view('admin.abonos.edit', compact('contratoTipo'));
    }


    public function update($id, Request $request)
    {

        $contratoCategoria = $this->abonoRepository->update($id, $request->all());

        return redirect('admin/abonos');
        
    }


    public function status(Request $request)
    {

        try {

            $data = $request->all();

            $contratoCategoria = $this->abonoRepository->update($data['id'], [
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

        $this->abonoRepository->delete($id);

        return redirect('admin/abonos');
        
    }

    public function archivo($id){

        $abono = $this->abonoRepository->find($id);

        $this->fpdf = new fpdf;

        $this->fpdf->AddPage();

        $this->fpdf->SetFont('Arial', 'B');

        $this->fpdf->SetFontSize(12);

        $this->fpdf->SetFontSize(12);

        $this->fpdf->SetFillColor(255,255,255);

        $this->fpdf->cell(20,8,' ', 0, 0, 'L', true);
        $this->fpdf->cell(100,8,utf8_decode(' RECIBO FRACCIONADO'), 0, 0, 'C', true);
        $this->fpdf->cell(30,8,utf8_decode(' Fecha:  '), 0, 0, 'L', true);
        $this->fpdf->cell(40,8,utf8_decode(date("d/m/Y", strtotime($abono->fecha))), 0, 1, 'L', true);

        $this->fpdf->cell(20,8,' ', 0, 0, 'L', true);
        $this->fpdf->cell(100,8,utf8_decode(' DE PAGO DE FACTURA'), 0, 0, 'C', true);
        $this->fpdf->cell(30,8,utf8_decode(' INSC:  '), 0, 0, 'L', true);
        $this->fpdf->cell(40,8,utf8_decode(str_pad($abono->cliente->contratos->first()->inscripcion??null, 10, "0", STR_PAD_LEFT)), 0, 1, 'L', true);

        $this->fpdf->cell(20,8,' ', 0, 0, 'L', true);
        $this->fpdf->cell(100,8,utf8_decode(' Nro. '.str_pad($abono->id, 10, "0", STR_PAD_LEFT)), 0, 0, 'C', true);
        $this->fpdf->cell(30,8,utf8_decode(''), 0, 0, 'L', true);
        $this->fpdf->cell(40,8,utf8_decode(''), 0, 1, 'L', true);



        $this->fpdf->cell(20,8,' ', 0, 0, 'L', true);
        $this->fpdf->cell(170,8,utf8_decode('  '), 0, 1, 'L', true);
        $this->fpdf->SetFont('Arial', 'B');

        
        $this->fpdf->cell(60,8,utf8_decode('Hemos recibido de :' ), 0, 0, 'L', true);
        $this->fpdf->SetFont('Arial');
        $this->fpdf->cell(45,8,utf8_decode($abono->cliente->nombre.' '.$abono->cliente->apellido ), 0, 1, 'L', true);
        $this->fpdf->SetFont('Arial', 'B');

        $this->fpdf->cell(60,8,utf8_decode('Cedula de Identidad Nro.:'), 0, 0, 'L', true);
        $this->fpdf->SetFont('Arial');
        $this->fpdf->cell(45,8,utf8_decode($abono->cliente->documento ), 0, 1, 'L', true);
        $this->fpdf->SetFont('Arial', 'B');

        $this->fpdf->cell(60,8,utf8_decode('La cantidad de ' ), 0, 0, 'L', true);
        $this->fpdf->SetFont('Arial');
        $this->fpdf->cell(125,8,utf8_decode($abono->monto.' Dolares ' ), 0, 1, 'L', true);

        $this->fpdf->SetFont('Arial', 'B');

        $this->fpdf->SetFont('Arial', 'B');

        $this->fpdf->cell(60,8,utf8_decode('Forma de pago: ' ), 0, 0, 'L', true);
        $this->fpdf->SetFont('Arial');
        $this->fpdf->cell(130,8,utf8_decode($abono->formapago->nombre ), 0, 1, 'L', true);

        
        $this->fpdf->SetFont('Arial', 'B');

        $this->fpdf->cell(60,8,utf8_decode('Estado: ' ), 0, 0, 'L', true);
        $this->fpdf->SetFont('Arial');
        if($abono->estatus == '1'){
        $this->fpdf->cell(130,8,utf8_decode('Aprobado' ), 0, 1, 'L', true);

        }elseif($abono->estatus == '2'){
        $this->fpdf->cell(130,8,utf8_decode('Rechazado' ), 0, 1, 'L', true);

        }else{
        $this->fpdf->cell(130,8,utf8_decode('En espera de revision'), 0, 1, 'L', true);

        }

        $this->fpdf->SetFont('Arial', 'B');

        $this->fpdf->cell(60,8,utf8_decode('Total: ' ), 0, 0, 'L', true);
        $this->fpdf->SetFont('Arial');
        if($abono->formapago->moneda == 'VES'){
            $this->fpdf->cell(130,8,utf8_decode($abono->monto_bs.' BS. / '.$abono->monto.' USD ' ), 0, 1, 'L', true);
        }else{
            $this->fpdf->cell(130,8,utf8_decode($abono->monto.' $ ' ), 0, 1, 'L', true);
        }
        
        $this->fpdf->SetFont('Arial', 'B');

        $this->fpdf->cell(60,8,utf8_decode('Observaciones: ' ), 0, 0, 'L', true);
        $this->fpdf->SetFont('Arial');

        $this->fpdf->cell(130,8,utf8_decode($abono->observaciones ), 0, 1, 'L', true);

        $this->fpdf->cell(10,8,utf8_decode( '' ), 0, 1, 'L', true);
        $this->fpdf->cell(10,8,utf8_decode( '' ), 0, 1, 'L', true);
        $this->fpdf->cell(10,8,utf8_decode( '' ), 0, 0, 'L', true);
        $this->fpdf->cell(75,8,utf8_decode('Entregado por:'), 0, 0, 'L', true);

        $this->fpdf->cell(10,8,utf8_decode(' ' ), 0, 0, 'L', true);
        $this->fpdf->cell(75,8,utf8_decode('Recibido por:' ), 0, 1, 'L', true);


        $this->fpdf->cell(170,8,utf8_decode('Av. Bolivar Con Calle Sucre - C.C. Gran Bazar - Pb. Local Nro.14 - Maracay estado Aragua '), 0, 1, 'L', true);

        

        $this->fpdf->cell(20,8,' ', 0, 0, 'L', true);
        $this->fpdf->cell(170,8,utf8_decode('  '), 0, 1, 'L', true);

        $this->fpdf->cell(20,8,' ', 0, 0, 'L', true);

        $this->fpdf->Image(url('/assets/images/logo.png') , 10,0,0,40 );


        $this->fpdf->Output('I', 'abono.pdf');

        exit;


    }
    

}
