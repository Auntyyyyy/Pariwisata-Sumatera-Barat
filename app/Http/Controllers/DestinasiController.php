<?php

namespace App\Http\Controllers;

use App\Models\Destinasi;
use Illuminate\Http\Request;

class DestinasiController extends Controller
{
    /**
     * Aturan validasi untuk form Tambah/Edit Destinasi.
     * Dipisah jadi method sendiri supaya tidak duplikat antara store() & update().
     */
    private function rules(): array
    {
        return [
            'nama'       => 'required|string|min:3|max:18',
            'deskripsi'  => 'required|string',
            'gambar'     => 'required|string|max:255',
            'jam_buka'   => 'required|date_format:H:i',
            'jam_tutup'  => 'required|date_format:H:i|after:jam_buka',
            'lokasi'     => 'nullable|string|max:255',
        ];
    }

    private function messages(): array
    {
        return [
            'jam_tutup.after' => 'Jam tutup harus lebih besar dari jam buka.',
        ];
    }

    /**
     * Beranda — menampilkan 3 destinasi terbaru untuk section Gallery.
     * Jika belum ada route/controller khusus untuk beranda, method ini
     * bisa dipanggil dari route('beranda').
     */
    public function beranda()
    {
        $destinations = Destinasi::latest()->take(3)->get();

        return view('beranda', compact('destinations'));
    }

    public function index(Request $request)
    {
        $keyword = $request->input('cari');

        $destinasiList = Destinasi::when($keyword, function ($query) use ($keyword) {
                $query->where('nama', 'like', '%' . $keyword . '%');
            })
            ->latest()
            ->paginate(2);

        return view('destinations', compact('destinasiList', 'keyword'));
    }

    public function show($id)
    {
        $destinasi = Destinasi::with('atraksi')->findOrFail($id);
        return view('destinations-details', [
            'destinasi' => $destinasi,
        ]);
    }

    public function create()
    {
        return view('destinations-create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate($this->rules(), $this->messages());

        $destinasi = Destinasi::create($validated);

        return redirect()->route('destinations.detail', $destinasi->id)
            ->with('success', 'Destinasi berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $destinasi = Destinasi::findOrFail($id);
        return view('destinations-edit', compact('destinasi'));
    }

    public function update(Request $request, $id)
    {
        $destinasi = Destinasi::findOrFail($id);

        $validated = $request->validate($this->rules(), $this->messages());

        $destinasi->update($validated);

        return redirect()->route('destinations.detail', $destinasi->id)
            ->with('success', 'Destinasi berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $destinasi = Destinasi::findOrFail($id);
        $destinasi->delete();
        return redirect()->route('destinations')
            ->with('success', 'Destinasi berhasil dihapus!');
    }

    

}