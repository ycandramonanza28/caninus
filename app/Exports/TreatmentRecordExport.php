<?php


namespace App\Exports;

use App\Models\Patient;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Font;

class TreatmentRecordExport implements FromCollection, WithHeadings, WithStyles, WithEvents
{
    protected $treatmentRecord;

    public function __construct(Patient $treatmentRecord)
    {
        $this->treatmentRecord = $treatmentRecord;
    }

    public function collection()
    {
        $rows = [];

        $treatmentNotes = $this->treatmentRecord->treatmentRecord;

        foreach ($treatmentNotes as $note) {
            $rows[] = [
                'DATE' => \Carbon\Carbon::parse($note->created_at)->format('d M Y H:i'),
                'TOOTH' => $note->tooth ?? '-',
                'DIAGNOSA' => $note->diagnosa ?? '-',
                'TREATMENT NOTES' => $note->treatment_note ?? '-',
                'NOTE' => $note->note ?? '-',
            ];
        }

        return collect($rows);
    }

    public function headings(): array
    {
        return [
            'DATE',
            'TOOTH',
            'DIAGNOSA',
            'TREATMENT NOTES',
            'NOTE',
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            6 => ['font' => ['bold' => true]], // Heading tabel di baris ke-6
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $sheet = $event->sheet;

                // Sisipkan 5 baris di atas heading
                $sheet->insertNewRowBefore(1, 5);

                // Data Pasien
                $sheet->setCellValue('A1', 'Patient Name:');
                $sheet->setCellValue('B1', $this->treatmentRecord->name);

                $sheet->setCellValue('A2', 'Date of Birth:');
                $sheet->setCellValue('B2', $this->treatmentRecord->date_of_birth ?? '-');

                $sheet->setCellValue('A3', 'Address:');
                $sheet->setCellValue('B3', $this->treatmentRecord->address ?? '-');

                $sheet->setCellValue('A4', 'Phone:');
                $sheet->setCellValue('B4', $this->treatmentRecord->mobile_phone ?? '-');

                // Bold untuk kolom A saja (label)
                for ($i = 1; $i <= 4; $i++) {
                    $sheet->getStyle("A{$i}")->getFont()->setBold(true);
                }

                // Optional: rata kiri semua
                $sheet->getStyle("A1:B4")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);
            },
        ];
    }
}
