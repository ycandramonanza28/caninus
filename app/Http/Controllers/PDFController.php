<!-- <?php

namespace App\Http\Controllers;

use App\Exports\TreatmentRecordExport;
use App\Models\Patient;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Str; // untuk slug filename
use Mpdf\Mpdf;

class PDFController extends Controller
{
    // public function exportPDF(Patient $treatmentRecord)
    // {
    //     $treatmentNote = $treatmentRecord->treatmentRecord;
    //     $medicalHistory = $treatmentRecord->medicalHistory;

    //     $pdf = Pdf::loadView('pdf.treatment-record', compact('treatmentRecord', 'medicalHistory', 'treatmentNote'));

    //     $filename = 'Treatment_Record_' . $treatmentRecord->name . '_' . now()->format('Y-m-d_H-i-s') . '.pdf';

    //       return $pdf->download($filename);
    // }

    public function exportPDF(Patient $treatmentRecord)
    {
        // Format data pasien di controller
        $patientInfo = [
            'Patient Name'     => $treatmentRecord->name ?? '-',
            'Gender'           => $treatmentRecord->gender === 'L' ? 'Laki-laki' : ($treatmentRecord->gender === 'P' ? 'Perempuan' : '-'),
            'Parents\' Name'   => $treatmentRecord->parents_name ?? '-',
            'House Phone'      => $treatmentRecord->house_phone ?? '-',
            'Office Phone'     => $treatmentRecord->office_phone ?? '-',
            'Mobile Phone'     => $treatmentRecord->mobile_phone ?? '-',
            'Emergency Number' => $treatmentRecord->emergency_number ?? '-',
            'Date of Birth'    => $treatmentRecord->date_of_birth ? \Carbon\Carbon::parse($treatmentRecord->date_of_birth)->format('d-m-Y') : '-',
            'Place of Birth'   => $treatmentRecord->place_of_birth ?? '-',
            'Email'            => $treatmentRecord->email ?? '-',
            'User Identity'    => $treatmentRecord->user_identity ?? '-',
            'Address'          => $treatmentRecord->address ?? '-',
            'The Referring'    => $treatmentRecord->the_referring ?? '-',
        ];

        // Ambil relasi (kalau ada)
        $treatmentNotes = $treatmentRecord->treatmentRecord ?? collect();
        $medicalHistory = $treatmentRecord->medicalHistory ?? collect();

        // Load view dan kirim data
        $pdf = Pdf::loadView('pdf.treatment-record', [
            'treatmentRecord'        => $treatmentRecord,
            'patientInfo'    => $patientInfo, // ini array rapi siap ditampilkan
            'treatmentNotes' => $treatmentNotes,
            'medicalHistory' => $medicalHistory,
        ])->setPaper('a4', 'portrait');

        $filename = 'Treatment_Record_' . \Illuminate\Support\Str::slug($patient->name ?? 'patient') . '_' . now()->format('Y-m-d_H-i-s') . '.pdf';

        return $pdf->download($filename);
    }


    public function exportExcel(Patient $treatmentRecord)
    {
        // Menggunakan instance untuk mendownload Excel
        $filename = 'Treatment_Record_' . $treatmentRecord->name . '_' . now()->format('Y-m-d_H-i-s') . '.xlsx';
        return Excel::download(new TreatmentRecordExport($treatmentRecord), $filename);
    }
} -->
