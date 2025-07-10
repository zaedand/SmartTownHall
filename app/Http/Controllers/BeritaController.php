<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita;
use Illuminate\Support\Facades\Storage;

class BeritaController extends Controller
{
    public function index()
    {
        $beritas = Berita::all();
        return view('baru.index', ['Beritas' => $beritas]);
    }

    public function indexAdmin()
    {
        $beritas = Berita::all();
        return view('berita.admin-berita', ['Beritas' => $beritas]);
    }
    public function indexDonasi()
    {
        $beritas = Berita::all();
        return view('donasi', ['Beritas' => $beritas]);
    }

    public function create()
    {
        return view('berita.tambah-berita');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'judul' => 'required|string|max:255',
            'paragraph' => 'required|string|max:5000',
            'gambar' => 'required|image|mimes:jpeg,png,jpg|max:5000',
            'jenis' => 'required|string|max:50',
            'waktu' => 'required|date',
        ],
        [
            'judul.required' => '(Judul berita wajib diisi.)',
            'judul.string' => '(Judul tidak valid.)',
            'judul.max' => '(Judul berita tidak boleh lebih dari 255 karakter.)',
            'paragraph.required' => '(Paragraf berita wajib diisi.)',
            'paragraph.string' => '(Paragraf tidak valid.)',
            'paragraph.max' => '(Paragraf berita tidak boleh lebih dari 5000 karakter.)',
            'gambar.required' => '(File gambar wajib diunggah.)',
            'gambar.image' => '(File harus berupa gambar.)',
            'gambar.mimes' => '(File gambar hanya berupa format jpeg, png, jpg)',
            'gambar.max' => '(File gambar tidak boleh lebih dari 5000KB)',
            'jenis.required' => '(Jenis wajib diisi.)',
            'jenis.string' => '(Jenis hanya boleh berupa huruf, angka, dan spasi.)',
            'jenis.max' => '(Jenis tidak boleh lebih dari 50 karakter.)',
            'waktu.required' => '(Waktu wajib diisi.)',
            'waktu.date' => '(Masukkan tanggal yang valid.)'
        ]);

        $data['nominal'] = (int) str_replace('.', '', $request->input('nominal'));

        $originalName = $request->file('gambar')->getClientOriginalName();
        $path = $request->file('gambar')->storeAs('public/images', $originalName);

        $data['gambar'] = $originalName;

        $berita = Berita::create($data);

        return redirect()->route('admin-berita')->with('success', 'Berita berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $berita = Berita::findOrFail($id);
        return view('berita.edit-berita', compact('berita'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'judul' => 'required',
            'paragraph' => 'required',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:5000',
            'jenis' => 'required',
            'waktu' => 'nullable|date',
        ]);

        $berita = Berita::findOrFail($id);

        if ($request->hasFile('gambar')) {
            $originalName = $request->file('gambar')->getClientOriginalName();
            $path = $request->file('gambar')->storeAs('public/images', $originalName);
            $data['gambar'] = $originalName;

            Storage::delete('public/images/' . $berita->gambar);
        }

        $berita->update($data);

        return redirect()->route('admin-berita')->with('success', 'Berita berhasil diperbarui.');
    }

    public function destroy($id)
{
    $berita = Berita::findOrFail($id);

    try {
        // Check if the image is used by other berita records
        $isImageUsedByOthers = Berita::where('gambar', $berita->gambar)->where('id', '!=', $id)->exists();

        if (!$isImageUsedByOthers) {
            // Attempt to delete the image only if it's not used by other records
            Storage::delete('public/images/' . $berita->gambar);
        }

        // Attempt to delete the berita
        $berita->delete();

        // Set a success message
        return redirect()->route('admin-berita')->with('delete', 'Berita berhasil dihapus.');
    } catch (\Exception $e) {
        // Set an error message if something goes wrong
        return redirect()->route('admin-berita')->with('error', 'Terjadi kesalahan saat menghapus berita.');
    }
}


}
