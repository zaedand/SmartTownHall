<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Kritik;

class KritikController extends Controller
{
    public function index()
    {
        // Mengambil semua kritik dan saran
        $kritik = Kritik::all();

        // Mengirim data kritik dan saran ke view
        return view('kritik.admin-kritik', compact('kritik'));
    }

    public function store(Request $request)
    {
        // Define the validation rules
        $rules = [
            'kritik' => [
                'required',
                'max:255',
                'regex:/^[a-zA-Z0-9\s]+$/', // Allows only alphabets, numbers, and spaces
            ],
            'saran' => [
                'required',
                'max:255',
                'regex:/^[a-zA-Z0-9\s]+$/', // Allows only alphabets, numbers, and spaces
            ],
        ];

        // Define custom error messages
        $messages = [
            'kritik.required' => '(kritik tidak boleh kosong.)',
            'saran.required' => '(saran tidak boleh kosong)',
            'kritik.max' => '(kritik tidak boleh melebihi 255 karakter)',
            'saran.max' => '(saran tidak boleh melebihi 255 karakter)',
            'kritik.regex' => '(kritik hanya boleh berisi huruf dan angka.)',
            'saran.regex' => '(saran hanya boleh berisi huruf dan angka.)',
        ];

        // Validate the input
        $validatedData = $request->validate($rules, $messages);

        // Sanitize the input by escaping special characters
        $validatedData['kritik'] = htmlspecialchars($validatedData['kritik'], ENT_QUOTES, 'UTF-8');
        $validatedData['saran'] = htmlspecialchars($validatedData['saran'], ENT_QUOTES, 'UTF-8');

        // Simpan kritik dan saran ke database
        $kritik =
        Kritik::create([
            'kritik' => $validatedData['kritik'],
            'saran' => $validatedData['saran'],
        ]);

        session()->flash('id', $kritik->id);
        // Redirect kembali ke halaman sebelumnya dengan pesan sukses
        return back()->with('success', 'Kritik dan saran berhasil disimpan.');
    }


    public function destroy($id)
    {
        $kritik = Kritik::findOrFail($id);
        Storage::delete('public/kritik/' . $kritik->kritik);
        $kritik->delete();

        return redirect()->route('admin-kritik')->with('success', 'Kritik berhasil dihapus.');
    }
}
