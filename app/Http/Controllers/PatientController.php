<?php

namespace App\Http\Controllers;

use App\Http\Requests\PatientRequest;
use App\Http\Requests\PatientUpdateRequest;
use App\Models\Patient;
use App\Services\PatientService;

class PatientController extends Controller
{
    protected $patientService;

    public function __construct(PatientService $patientService)
    {
        $this->patientService = $patientService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $patients = Patient::all();
        return view('patient', compact('patients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create-patient');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PatientRequest $request)
    {
        $patient = $this->patientService->store($request);
        
        if(isset($patient['error'])) {
            return redirect()->route('patient.create')->with('error',$patient['error']);
        }
        
        return redirect()->route('patient')->with('success','Data Pasien Berhasil Ditambahkan !');
    }

    /**
     * Display the specified resource.
     */
    public function show(Patient $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Patient $id)
    {
        $patient = $id;
        return view('edit-patient', compact('patient'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PatientUpdateRequest $request, Patient $id)
    {
        $patient = $this->patientService->update($request, $id);

        if(isset($patient['error'])) {
            return redirect()->route('patient.edit', $id['id'])->with('error',$patient['error']);
        }
        return redirect()->route('patient')->with('success','Data Pasien Berhasil Diubah !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Patient $id)
    {
        $patient = $this->patientService->destroy($id);

        if(isset($patient['error'])) {
            return redirect()->route('patient')->with('error','Data Pasien Gagal Dihapus !');
        }
        return redirect()->route('patient')->with('success','Data Pasien Berhasil Dihapus !');
    }
}
