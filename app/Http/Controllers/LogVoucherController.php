<?php

namespace App\Http\Controllers;

use App\Models\LogVoucher;
use App\Models\Patient;
use App\Models\Voucher;
use Illuminate\Http\Request;

class LogVoucherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request, Patient $id)
    {
        try {
            $voucher = Voucher::where('code', $request->code)->first();

            if (!$voucher) {
                return redirect()->route('patient')->with('error', 'Voucher tidak ditemukan');
            }
    
            $logVoucher = LogVoucher::where('patient_id', $id->id)->where('code', $request->code)->first();
    
            if ($logVoucher) {
                return redirect()->route('patient')->with('error', 'Voucher sudah digunakan');
            }
    
            $logVoucher = new LogVoucher();
            $logVoucher->patient_id = $id->id;
            $logVoucher->code = $request->code;
            $logVoucher->save();

            return redirect()->route('patient')->with('success', 'Voucher berhasil digunakan');

        } catch (\Exception $e) {
            return redirect()->route('patient', $id)->with('error', $e->getMessage());
        }
       

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(LogVoucher $logVoucher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LogVoucher $logVoucher)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, LogVoucher $logVoucher)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LogVoucher $logVoucher)
    {
        //
    }
}
