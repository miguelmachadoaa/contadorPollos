<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Repositories\UserRepository;

use App\Repositories\ExportCsvRepository;
use App\Repositories\ExportPdfRepository;

use App\Mappers\ContratosMapper;



use Auth;
use Illuminate\Support\Str;
use View;
use Datetime;
use App\Custom\fpdf\fpdf as fpdf;


class ReporteController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        private readonly UserRepository $userRepository,
        private readonly ExportCsvRepository $exportCsvRepository,
        private readonly ExportPdfRepository $exportPdfRepository,
        private readonly ContratosMapper $contratosMapper,
    )
    {
        $this->middleware('auth');
    }

    public function index(){

        return true;
    }




    

}
