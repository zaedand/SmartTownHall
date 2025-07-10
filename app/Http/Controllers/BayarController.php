<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Donasi;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Redirect;
use App\Exports\DonasiExport;
use Maatwebsite\Excel\Facades\Excel;

class BayarController extends Controller
{
    public function index()
    {
        return view('bayar');
    }

    public function bayar(Request $request)
    {
        $selectedJenis = $request->input('jenis', ''); // Provide a default value if not present
        return view('bayar', compact('selectedJenis'));
    }
    public function donate(Request $request)
    {
        $data = $request->validate([
            'id' => "unique:donatur,column,except,id",
            'nama' => 'required',
            'no_hp' => 'required|numeric',
            'email' => 'required|email',
            'jenis' => 'required',
            'nominal' => 'required',
            'bukti_pembayaran' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5000',
            'status_validasi' => 'nullable|in:0,1,2'
        ]);
        $data['nominal'] = (int) str_replace('.', '', $request->input('nominal'));

        $originalName = $request->file('bukti_pembayaran')->getClientOriginalName();
        $path = $request->file('bukti_pembayaran')->storeAs('public/images', $originalName);
        $data['bukti_pembayaran'] = $originalName;
        // Simpan donasi ke database
        $Donasi = Donasi::create($data);
        $donations = Donasi::all();
        return redirect('home');
    }

    public function edit($id)
    {
        $donation = Donasi::findOrFail($id);
        return view('admin.donasi.edit-donatur', compact('donation'));
    }
    public function editZakat($id)
    {
        $donation = Donasi::findOrFail($id);
        return view('admin.zakat.edit-zakat', compact('donation'));
    }
    public function update(Request $request, $id)
    {

        $data = $request->validate([
            'nama' => '',
            'no_hp' => '',
            'email' => '',
            'jenis' => '',
            'nominal' => '',
            'bukti_pembayaran' => '',
            'status_validasi' => 'nullable|in:0,1,2'
        ]);

        $data['nominal'] = (int) str_replace('.', '', $request->input('nominal'));
        $donation = donasi::findOrFail($id);

        if ($request->hasFile('Bukti_Pembayaran')) {
            $originalName = $request->file('Bukti_Pembayaran')->getClientOriginalName();
            $path = $request->file('Bukti_Pembayaran')->storeAs('public/images', $originalName);
            $data['Bukti_Pembayaran'] = $originalName;
        }

        $donation->update($data);

        return redirect()->route('admin-donatur')->with('success', 'Data donasi berhasil diupdate');
    }

    public function updateZakat(Request $request, $id)
    {

        $data = $request->validate([
            'nama' => '',
            'no_hp' => '',
            'email' => '',
            'jenis' => '',
            'nominal' => '',
            'bukti_pembayaran' => '',
            'status_validasi' => 'nullable|in:0,1,2'
        ]);

        $data['nominal'] = (int) str_replace('.', '', $request->input('nominal'));
        $donation = donasi::findOrFail($id);

        if ($request->hasFile('Bukti_Pembayaran')) {
            $originalName = $request->file('Bukti_Pembayaran')->getClientOriginalName();
            $path = $request->file('Bukti_Pembayaran')->storeAs('public/images', $originalName);
            $data['Bukti_Pembayaran'] = $originalName;
        }

        $donation->update($data);

        return redirect()->route('admin-zakat')->with('success', 'Data donasi berhasil diupdate');
    }

    public function destroy($id)
    {
        $donation = Donasi::findOrFail($id);
        // Delete the associated file if it exists
        Storage::delete('public/images/' . $donation->bukti_pembayaran);
        // Delete the data from the database
        $donation->delete();
        return redirect('admin-donatur')->with('success', 'Data berhasil dihapus.');
    }

    public function destroyZakat($id)
    {
        $donation = Donasi::findOrFail($id);
        // Delete the associated file if it exists
        Storage::delete('public/images/' . $donation->bukti_pembayaran);
        // Delete the data from the database
        $donation->delete();
        return redirect('admin-zakat')->with('success', 'Data berhasil dihapus.');
    }

    public function show(){
        $allDonations = Donasi::where('jenis', 'donasi')->get();
        return view('admin-zakat', compact('allDonations'));
    }

    public function updateStatus(Request $request)
    {
        $id = $request->input('id');
        $status = $request->input('status');
        $donation = Donasi::findOrFail($id);
        $donation->update(['status_validasi' => $status]);
        return redirect()->route('admin-donatur')
                        ->with('success', 'Status updated successfully');

    }
    public function updateStatusZakat(Request $request)
    {
        $id = $request->input('id');
        $status = $request->input('status');

        $donation = Donasi::findOrFail($id);
        $donation->update(['status_validasi' => $status]);
        // Redirect ke view setelah berhasil memperbarui status
        return redirect()->route('admin-zakat')
                        ->with('success', 'Status updated successfully');
    }

    public function showLaporan(){
        $allDonations = Donasi::where('status_validasi', '1')->get();
        return view('admin.laporan.admin-laporan', compact('allDonations'));
    }

    public function exportDonasi()
    {
        return Excel::download(new DonasiExport, 'donasi.xlsx');
    }
}
