<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengajuan;
use Illuminate\Support\Facades\Storage;

class PengajuanController extends Controller
{
    public function index()
    {
        $pengajuans = Pengajuan::all();
        return view('pengajuan.admin-pengajuan', ['pengajuans' => $pengajuans]);
    }

    public function downloadTanah(){
        $file_path = public_path('file/template-surat.webp'); // Change this to the actual path of your file
        $file_name = 'template-surat.webp'; // Change this to the desired filename
        $headers = [
            'Content-Type' => 'application/octet-stream',
        ];

        return response()->download($file_path, $file_name);

}

public function downloadDomisili(){
    $file_path = public_path('file/'); // Change this to the actual path of your file
    $file_name = 'template-surat-domisili.webp'; // Change this to the desired filename
    $headers = [
        'Content-Type' => 'application/octet-stream',
    ];

    return response()->download($file_path, $file_name);

}

public function downloadSKCK(){
    $file_path = public_path('file/'); // Change this to the actual path of your file
    $file_name = 'template-surat-skck.webp'; // Change this to the desired filename
    $headers = [
        'Content-Type' => 'application/octet-stream',
    ];

    return response()->download($file_path, $file_name);

}

    public function create()
    {


        return view('pengajuan.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'nama' => 'required|regex:/^[a-zA-Z\s]+$/',
            'no_telepon' => 'required|numeric|min_digits:9|max_digits:12',
            'jenis' => 'required',
            'ktp' => 'required|image|mimes:jpeg,png,jpg',
            'surat' => 'required|file|mimes:pdf,doc,docx',
        ],

        [
            'nama.required' => '(nama tidak boleh kosong.)',
            'nama.regex' => '(nama hanya boleh berupa huruf dan spasi.)',
            'no_telepon.required' => '(nomor telepon tidak boleh kosong.)',
            'no_telepon.numeric' => '(input hanya dapat berupa angka.)',
            'no_telepon.min_digits' => '(input minimal harus 9 digit)',
            'no_telepon.max_digits' => '(input maksimal harus 12 digit)',
            'jenis.required' => '(jenis harus dipilih.)',
            'ktp.required' => '(Foto KTP wajib diunggah.)',
            'ktp.mimes' => '(Format file KTP harus berupa: jpeg, png, jpg)',
            'surat.required'=>'(Surat Wajib Diunggah)',
            'surat.mimes' => '(Format file surat harus berupa: pdf, doc, docx.)',
        ]);

        $ktpName = $request->file('ktp')->getClientOriginalName();
        $suratName = $request->file('surat')->getClientOriginalName();

        $request->file('ktp')->storeAs('public/ktp', $ktpName);
        $request->file('surat')->storeAs('public/surat', $suratName);

        $pengajuan =
        Pengajuan::create([
            'nama' => $request->nama,
            'no_telepon' => $request->no_telepon,
            'jenis' => $request->jenis,
            'ktp' => $ktpName,
            'surat' => $suratName,
        ]);

        session()->flash('id', $pengajuan->id);
        return redirect()->route('pengajuan')->with('success', 'Pengajuan berhasil ditambahkan.');
    }

    public function show($id)
    {
        $pengajuan = Pengajuan::findOrFail($id);
        return view('pengajuan.show', ['pengajuan' => $pengajuan]);
    }

    public function edit($id)
    {
        $pengajuan = Pengajuan::findOrFail($id);
        return view('pengajuan.edit', ['pengajuan' => $pengajuan]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'no_telepon' => 'required',
            'jenis' => 'required',
            'ktp' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:5000',
            'surat' => 'nullable|file|mimes:pdf,doc,docx|max:5000',
        ]);



        $pengajuan = Pengajuan::findOrFail($id);

        $data = [
            'nama' => $request->nama,
            'no_telepon' => $request->no_telepon,
            'jenis' => $request->jenis,
        ];

        if ($request->hasFile('ktp')) {
            $ktpName = $request->file('ktp')->getClientOriginalName();
            $request->file('ktp')->storeAs('public/ktp', $ktpName);
            $data['ktp'] = $ktpName;
            Storage::delete('public/ktp/' . $pengajuan->ktp);
        }

        if ($request->hasFile('surat')) {
            $suratName = $request->file('surat')->getClientOriginalName();
            $request->file('surat')->storeAs('public/surat', $suratName);
            $data['surat'] = $suratName;
            Storage::delete('public/surat/' . $pengajuan->surat);
        }

        $pengajuan->update($data);

        return redirect()->route('pengajuan.index')->with('success', 'Pengajuan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $pengajuan = Pengajuan::findOrFail($id);

        Storage::delete('public/ktp/' . $pengajuan->ktp);
        Storage::delete('public/surat/' . $pengajuan->surat);

        $pengajuan->delete();

        return redirect()->route('admin-pengajuan')->with('success', 'Pengajuan berhasil dihapus.');
    }

    public function updateStatus(Request $request)
    {
        $id = $request->input('id');
        $status = $request->input('status');

        $pengajuan = Pengajuan::findOrFail($id);
        $pengajuan->update(['status_validasi' => $status]);
        return redirect()->route('admin-pengajuan')
                        ->with('updated', 'Status berhasil diperbarui');

    }
}
