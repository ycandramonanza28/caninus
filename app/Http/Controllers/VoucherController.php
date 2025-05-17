<?php

namespace App\Http\Controllers;

use App\Models\Voucher;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class VoucherController extends Controller
{
    public function index()
    {
        // Retrieve vouchers ordered by the most recent first
        $vouchers = Voucher::orderBy('created_at', 'desc')->get();
    
        // Pass the vouchers data to the view
        return view('voucher', compact('vouchers'));
    }
    

    public function create()
    {
           // Generate kode voucher yang unik
        $voucherCode = $this->generateUniqueVoucherCode();

        return view('create-voucher', compact('voucherCode'));
    }

    public function store(Request$request)
    {
        $validated = $request->validate([
            'code' => 'required|unique:vouchers,code',
            'name' => 'required',
            'description' => 'nullable',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10000', // Image validation
            'start_date' => 'required|date',
            'start_time' => 'required|date_format:H:i',
            'end_date' => 'required|date|after_or_equal:start_date',
            'end_time' => 'required|date_format:H:i|after:start_time', // Ensure the end time is after start time
        ]);
    
        // Handle the image upload if exists
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('vouchers/images', 'public');
        }
    
        // Create the voucher record
        Voucher::create([
            'code' => $validated['code'],
            'name' => $validated['name'],
            'description' => $validated['description'],
            'start_date' => $validated['start_date'],
            'start_time' => $validated['start_time'],
            'end_date' => $validated['end_date'],
            'end_time' => $validated['end_time'],
            'image' => $imagePath,
        ]);
    
        return redirect()->route('voucher')->with('success', 'Voucher created successfully');
    }

    public function edit(Voucher $id, Request $request)
    {
        $voucher = $id;
        return view('edit-voucher', compact('voucher'));
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'start_date' => 'required|date',
            'start_time' => 'required|date_format:H:i',
            'end_date' => 'required|date',
            'end_time' => 'required|date_format:H:i|after:start_time', 
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:10000', // Menambahkan validasi untuk gambar
        ]);

        // Mencari voucher berdasarkan ID
        $voucher = Voucher::findOrFail($id);

        // Jika ada gambar baru yang di-upload
        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($voucher->image) {
                // Menghapus gambar lama dari storage/public/vouchers/images
                Storage::delete('public/vouchers/images/' . $voucher->image);
            }

            // Simpan gambar baru dengan path yang diinginkan
            $imagePath = $request->file('image')->store('vouchers/images', 'public'); // Menggunakan path 'vouchers/images'
        } else {
            // Jika tidak ada gambar baru, gunakan gambar lama
            $imagePath = $voucher->image;
        }

        // Perbarui data voucher
        $voucher->update([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'start_date' => $request->input('start_date'),
            'start_time' => $request->input('start_time'),
            'end_date' => $request->input('end_date'),
            'end_time' => $request->input('end_time'),
            'image' => $imagePath, // Update gambar
        ]);

        // Redirect atau memberi respon sesuai kebutuhan
        return redirect()->route('voucher')->with('success', 'Voucher berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $voucher = Voucher::findOrFail($id);

        // Hapus gambar dari storage jika ada
        if ($voucher->image) {
            Storage::delete('public/vouchers/images/' . $voucher->image);
        }
        $voucher->delete();
        return redirect()->route('voucher')->with('success', 'Voucher deleted successfully');
    }

    // Fungsi untuk menghasilkan kode voucher yang unik
    private function generateUniqueVoucherCode()
    {
        do {
            // Generate kode voucher 8 karakter yang hanya berisi huruf
            $voucherCode = 'VOUCHER-' . strtoupper(Str::random(8)); // Kode 8 karakter huruf acak
        } while (Voucher::where('code', $voucherCode)->exists()); // Periksa apakah kode sudah ada di database

        return $voucherCode;
    }
}
