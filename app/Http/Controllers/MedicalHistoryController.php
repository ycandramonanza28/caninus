<?php

namespace App\Http\Controllers;

use App\Http\Requests\MedicalHistoryRequest;
use App\Models\MedicalHistory;
use App\Models\Patient;
use App\Services\MedicalHistoryService;
use Illuminate\Http\Request;

class MedicalHistoryController extends Controller
{
    protected $medicalHistoryService;

    public function __construct(MedicalHistoryService $medicalHistoryService)
    {
        $this->medicalHistoryService = $medicalHistoryService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $medicalHistory = Patient::with('medicalHistory')->get();
        return view('medical-history', compact('medicalHistory'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Patient $history)
    {
        return view('create-medical-history', compact('history'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MedicalHistoryRequest $request, Patient $history)
    {
        $request['patient_id'] = $history->id;

       $medicalHistory =  $this->medicalHistoryService->store($request);

        if(isset($medicalHistory['error'])) {
            return redirect()->back()->withInput()->with('error',$medicalHistory['error']);
        }
        return redirect()->route('medical.history.show', $history->id)->with('success','Data Pasien Berhasil Ditambahkan !');
    }

    /**
     * Display the specified resource.
     */
    public function show(Patient $history)
    {
        $medicalHistories = $history->medicalHistory;
        return view('detail-medical-history', compact('history','medicalHistories'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Patient $history)
    {
        $medicalHistories = $history->medicalHistory;
        return view('edit-medical-history', compact('history','medicalHistories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MedicalHistoryRequest $request, Patient $history)
    {
        $medicalHistories = $history->medicalHistory;
        $request['patient_id'] = $history->id;

       $medicalHistory =  $this->medicalHistoryService->update($request, $medicalHistories);

        if(isset($medicalHistory['error'])) {
            return redirect()->back()->withInput()->with('error',$medicalHistory['error']);
        }
        return redirect()->route('medical.history.show', $history->id)->with('success','Data Pasien Berhasil Diubah !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Patient $history)
    {
        $medicalHistories = $history->medicalHistory;

        $medicalHistory = $this->medicalHistoryService->destroy($medicalHistories);

        if(isset($medicalHistory['error'])) {
            return redirect()->route('medical.history.show')->with('error','Data Riwayat Medis Gagal Dihapus !');
        }
        return redirect()->route('medical.history.show', $history->id)->with('success','Data Riwayat Medis Berhasil Dihapus !');
    }
}
