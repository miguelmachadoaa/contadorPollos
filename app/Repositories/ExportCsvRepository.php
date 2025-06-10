<?php

namespace App\Repositories;

final class ExportCsvRepository{

    public function export(Array $header, Array $data)
    {
        header("Content-Type: text/csv; charset=utf-8");
        header("Content-Disposition: attachment; filename=reporte_contrato_".date('d_m_Y').".csv");
        $output = fopen('php://output', 'w');

        fputcsv($output, $header, ';');
        
        foreach ($data as $fields) {
            if(is_array($fields)){
                fputcsv($output, $fields, ';');
            }
        }
  
        die();

        return 'true';
    }

    
}