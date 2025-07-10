<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KTP;
use Illuminate\Support\Facades\Storage;

class KTPController extends Controller

    {
        public function index()
        {
            $ktp = KTP::all();
            return view('ktp.admin-ktp', ['ktp' => $ktp]);
        }

        public function indexAdmin()
        {
            $ktp = KTP::all();
            return view('ktp.admin-ktp', ['ktp' => $ktp]);
        }

        public function store(Request $request)
        {
            $data = $request->validate([
                'No_NIK' => 'required|integer|digits:16',
                'No_KK' => 'required|integer|digits:16',
                'Foto_KK' => 'required|image|mimes:jpeg,png,jpg',
                'waktu' => 'nullable|date',
            ],

            [   'No_NIK.required' => '(NIK wajib diisi.)',
                'No_NIK.digits' => '(NIK harus 16 digit.)',
                'No_NIK.integer' => '(NIK hanya dapat berupa angka)',
                'No_KK.required' => '(Nomor KK wajib diisi.)',
                'No_KK.digits' => '(No KK harus 16 digit.)',
                'No_KK.integer' => '(No KK hanya dapat berupa angka)',
                'Foto_KK.required' => '(Foto KK wajib diunggah.)',
                'Foto_KK.mimes' => '(Foto KK hanya dapat berupa jpeg, jpg, png.)',
                'Foto_KK.image' => '(File harus berupa gambar.)',
                // ... tambahkan pesan untuk aturan validasi lainnya ...
            ]);



            $originalName = $request->file('Foto_KK')->getClientOriginalName();
            $path = $request->file('Foto_KK')->storeAs('public/images', $originalName);

            $data['Foto_KK'] = $originalName;


            $ktp = KTP::create($data);
            session()->flash('ktp_id', $ktp->id);

            return redirect()->route('ktp')->with('success', 'data berhasil disubmit.');
        }

        public static function getStatusButtonClass($status) {
            $classes = [
                0 => 'btn-secondary',
                1 => 'btn-success',
                2 => 'btn-danger',
            ];

            return $classes[$status] ?? 'btn-secondary';
        }

        public function updateStatus(Request $request)
        {
            $id = $request->input('id');
            $status = $request->input('status');

            $ktp = KTP::findOrFail($id);
            $ktp->update(['status_validasi' => $status]);
            return redirect()->route('admin-ktp')
                            ->with('updated', 'Status berhasil diperbarui');

        }

        public function destroy($id)
        {
            $ktp = KTP::findOrFail($id);

            try {
                // Check if the image is used by other KTP records
                $isImageUsedByOthers = KTP::where('Foto_KK', $ktp->Foto_KK)->where('id', '!=', $id)->exists();

                if (!$isImageUsedByOthers) {
                    // Attempt to delete the image only if it's not used by other records
                    Storage::delete('public/images/' . $ktp->Foto_KK);
                }

                // Attempt to delete the KTP record
                $ktp->delete();

                // Set a success message
                return redirect()->route('admin-ktp')->with('success', 'Data KTP berhasil dihapus.');
            } catch (\Exception $e) {
                // Set an error message if something goes wrong
                return redirect()->route('admin-ktp')->with('error', 'Terjadi kesalahan saat menghapus data pengajuan.');
            }
        }

}
