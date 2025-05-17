<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\TreatmentRecord;
use App\Services\TreatmentRecordService;
use Illuminate\Http\Request;

class TreatmentRecordController extends Controller
{
    protected $treatmentRecordService;

    public function __construct(TreatmentRecordService $treatmentRecordService)
    {
        $this->treatmentRecordService = $treatmentRecordService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $treatmentRecord = Patient::with('medicalHistory')->get();
        return view('treatment-record', compact('treatmentRecord'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Patient $treatmentRecord)
    {
        return view('create-treatment-record', compact('treatmentRecord'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Patient $treatmentRecord)
    {
        $request['patient_id'] = $treatmentRecord->id;

        $treatmentNote =  $this->treatmentRecordService->store($request);

        if(isset($treatmentNote['error'])) {
            return redirect()->back()->withInput()->with('error',$treatmentNote['error']);
        }

        return redirect()->route('treatment.show', $treatmentRecord->id)->with('success','Data Catatan Treatment Berhasil Ditambahkan !');
    }

    /**
     * Display the specified resource.
     */
    public function show(Patient $treatmentRecord)
    {
        $treatmentNote = $treatmentRecord->treatmentRecord;
        $medicalHistory = $treatmentRecord->medicalHistory;
        return view('detail-treatment', compact('treatmentNote', 'treatmentRecord', 'medicalHistory'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TreatmentRecord $treatmentRecord)
    {
        $treatmentNote = $treatmentRecord;
        $treatmentRecord = $treatmentRecord->patient;
        return view('edit-treatment-record', compact('treatmentRecord','treatmentNote'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TreatmentRecord $treatmentRecord)
    {
        $request['patient_id'] = $treatmentRecord->patient->id;

        $treatmentNote =  $this->treatmentRecordService->update($request, $treatmentRecord);

        if(isset($treatmentNote['error'])) {
            return redirect()->back()->withInput()->with('error',$treatmentNote['error']);
        }
        return redirect()->route('treatment.show', $treatmentRecord->patient->id)->with('success','Data Catatan Treatment Berhasil Diubah !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TreatmentRecord $treatmentRecord)
    {
        $treatmentNote = $this->treatmentRecordService->destroy($treatmentRecord);

        if(isset($treatmentNote['error'])) {
            return redirect()->route('treatment.show')->with('error','Data Catatan Treatment Gagal Dihapus !');
        }
        return redirect()->route('treatment.show', $treatmentRecord->patient->id)->with('success','Data Catatan Treatment Berhasil Dihapus !');
    }
}
