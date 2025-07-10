<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengaduan;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;

class PengaduanController extends Controller
{
    public function index()
    {
        $pengaduans = Pengaduan::all();
        return view('pengaduan.admin-pengaduan', ['pengaduans' => $pengaduans]);
    }

    public static function getStatusButtonClass($status)
    {
        $classes = [
            0 => 'btn-secondary',
            1 => 'btn-success',
            2 => 'btn-danger',
        ];

        return $classes[$status] ?? 'btn-secondary';
    }

    public function create()
    {
        return view('pengaduan.create');
    }

    public function updateStatus(Request $request)
    {
        $id = $request->input('id');
        $status = $request->input('status');

        $pengaduan = Pengaduan::findOrFail($id);
        $pengaduan->update(['status_validasi' => $status]);

        // Set session for notification
        Session::flash('hasNotification', true);

        return redirect()->route('admin-pengaduan')
                         ->with('updated', 'Status berhasil diperbarui');
    }

    public function store(Request $request)
    {

        $data = $request->validate([
            'nama' => 'required|regex:/^[a-zA-Z\s]+$/',
            'no_telepon' => 'required|numeric|min_digits:9|max_digits:12',
            'alamat' => 'required',
            'jenis'=> 'required|string',
            'keterangan' => 'required|max:255|string',
            'surat' => 'required|file|mimes:pdf,doc,docx,png,jpg,jpeg',
        ],

        [   'nama.required' => '(nama tidak boleh kosong.)',
            'nama.regex' => '(nama hanya boleh berupa huruf dan spasi.)',
            'nama.string' => '(nama hanya berupa huruf.)',
            'no_telepon.required' => '(nomor telepon tidak boleh kosong.)',
            'keterangan.required' => '(keterangan tidak boleh kosong.)',
            'keterangan.max' => '(keterangan tidak boleh melebihi 255 karakter.)',
            'no_telepon.numeric' => '(input hanya dapat berupa angka.)',
            'no_telepon.min_digits' => '(input minimal harus 9 digit)',
            'no_telepon.max_digits' => '(input maksimal harus 12 digit)',
            'surat.required' => '(File surat wajib diunggah.)',
            'surat.mimes' => '(Format file surat harus berupa: pdf, doc, docx, jpg, jpeg, png)',
            'jenis.required' => '(jenis harus diisi)',
            'alamat.required' => '(alamat harus diisi)'
        ]);


        // Save the file
        $originalName = $request->file('surat')->getClientOriginalName();
        $path = $request->file('surat')->storeAs('public/surat', $originalName);
        $data['surat'] = $originalName;

        // Create the pengaduan record
        $pengaduan = Pengaduan::create($data);
        session()->flash('id', $pengaduan->id);

        // Set session for notification
        Session::flash('hasNotification', true);

        return redirect()->route('pengaduan')
                         ->with('id', $pengaduan->id)
                         ->with('success', 'Pengaduan berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $pengaduan = Pengaduan::findOrFail($id);
        return view('pengaduan.edit', compact('pengaduan'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'nama' => 'required',
            'no_telepon' => 'required',
            'surat' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
        ]);

        $pengaduan = Pengaduan::findOrFail($id);

        if ($request->hasFile('surat')) {
            $originalName = $request->file('surat')->getClientOriginalName();
            $path = $request->file('surat')->storeAs('public/surat', $originalName);
            $data['surat'] = $originalName;

            Storage::delete('public/surat/' . $pengaduan->surat);
        }

        $pengaduan->update($data);

        return redirect()->route('pengaduan.index')->with('success', 'Pengaduan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $pengaduan = Pengaduan::findOrFail($id);

        Storage::delete('public/surat/' . $pengaduan->surat);

        $pengaduan->delete();
        session()->flash('success', 'Pengaduan berhasil dihapus.');

        return redirect()->route('admin-pengaduan');
    }

    public function showNotif()
    {
        // Retrieve the latest pengaduan status
        $latestPengaduan = Pengaduan::latest()->first();

        if ($latestPengaduan) {
            $status = $latestPengaduan->status_validasi;
            $nama = $latestPengaduan->nama;
            $jenis = $latestPengaduan->jenis;
            $message = "Pengaduan atas nama $nama belum diverifikasi";
            $alertClass = 'alert-secondary';
            // ^alert

            if ($status == 1) {
                $message = "Pengaduan atas nama $nama telah kami terima, $jenis anda akan segera dikirim ke alamat anda.";
                $alertClass = 'alert-success';
            } elseif ($status == 2) {
                $message = "Pengaduan $jenis atas nama $nama ditolak, harap periksa kembali data yang anda kirimkan.";
                $alertClass = 'alert-danger';
            }

            return view('pengaduan.notifpengaduan', ['message' => $message, 'alertClass' => $alertClass]);
        }

        return view('pengaduan.notifpengaduan', ['message' => 'Belum ada notifikasi.', 'alertClass' => 'alert-secondary']);
    }

}
