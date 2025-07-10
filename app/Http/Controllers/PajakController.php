<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pajak;
use Illuminate\Support\Facades\Storage;

class PajakController extends Controller
{
    public function indexAdmin()
    {
        $pajak = pajak::all();
        return view('pajak.admin-pajak', ['pajak' => $pajak]);
    }

    public function store(Request $request)
    {
        // Strip dots from nominal input before validation
        $nominal = str_replace('.', '', $request->input('nominal'));
        $request->merge(['nominal' => $nominal]);

        $request->validate([
            'nama' => 'required|regex:/^[a-zA-Z\s]+$/',
            'telp' => 'required|numeric|digits_between:9,12',
            'email' => 'required|email',
            'jenis' => 'required',
            'nominal' => 'required|integer', // Ensure nominal only contains digits
            'ktp' => 'required|image|mimes:jpeg,png,jpg',
        ],
        [
            'nama.required' => '(nama harus diisi.)',
            'nama.regex' => '(nama hanya dapat diisi oleh huruf dan spasi)',
            'telp.required' => '(no. telepon harus diisi.)',
            'telp.numeric' => '(masukkan no. telepon dalam bentuk angka.)',
            'telp.digits_between' => '(no. telepon harus diisi antara 9 hingga 12 digit)',
            'email.required' => '(email harus diisi.)',
            'email.email' => '(email harus berupa alamat email yang valid)',
            'jenis.required' => '(Jenis pajak harus dipilih.)',
            'nominal.required' => '(nominal harus diisi.)',
            'nominal.integer' => '(nominal harus berupa angka.)',
            'kpt.image' => '(KTP harus berupa gambar)',
            'ktp.required' => '(Foto KTP wajib diunggah)',
            'ktp.mimes' => '(KTP hanya bisa diunggah dalam format .jpeg, .png, .jpg)',
        ]);

        // Convert nominal to integer
        $nominal = (int) $request->input('nominal');
        $ktpName = $request->file('ktp')->getClientOriginalName();

        // Store KTP image
        $request->file('ktp')->storeAs('public/images', $ktpName);

        // Create a new Pajak entry
        $pajak = Pajak::create([
            'nama' => $request->nama,
            'telp' => $request->telp,
            'email' => $request->email,
            'jenis' => $request->jenis,
            'nominal' => $nominal,
            'ktp' => $ktpName,
        ]);

        session()->flash('id', $pajak->id);
        return redirect()->route('pajak')->with('success', 'Pajak berhasil ditambahkan.');
    }



    public function destroy($id)
    {
        $pajak = Pajak::findOrFail($id);

        Storage::delete('public/ktp/' . $pajak->ktp);

        $pajak->delete();

        return redirect()->route('admin-pajak')->with('success', 'Data Pajak berhasil dihapus.');
    }

    public function updateStatus(Request $request)
    {
        $id = $request->input('id');
        $status = $request->input('status');

        $pengajuan = Pajak::findOrFail($id);
        $pengajuan->update(['status_validasi' => $status]);
        return redirect()->route('admin-pajak')
                        ->with('updated', 'Status berhasil diperbarui');

    }

}
