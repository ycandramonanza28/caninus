<?php

namespace App\Http\Controllers;

use App\Exports\TreatmentRecordExport;
use App\Models\Patient;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Mpdf\Mpdf;

class PDFController extends Controller
{
    public function exportPDF(Patient $treatmentRecord)
    {
        $treatmentNote = $treatmentRecord->treatmentRecord;
        $medicalHistory = $treatmentRecord->medicalHistory;

        $pdf = Pdf::loadView('pdf.treatment-record', compact('treatmentRecord', 'medicalHistory', 'treatmentNote'));
     
        $filename = 'Treatment_Record_' . $treatmentRecord->name . '_' . now()->format('Y-m-d_H-i-s') . '.pdf';

          return $pdf->download($filename);
    }

    public function exportExcel(Patient $treatmentRecord)
    {
        // Menggunakan instance untuk mendownload Excel
        $filename = 'Treatment_Record_' . $treatmentRecord->name . '_' . now()->format('Y-m-d_H-i-s') . '.xlsx';
        return Excel::download(new TreatmentRecordExport($treatmentRecord), $filename);
    }
}
