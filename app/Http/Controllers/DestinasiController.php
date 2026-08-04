<?php

namespace App\Http\Controllers;

use App\Models\Destinasi;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;


class DestinasiController extends Controller
{
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
        $destinasi = Destinasi::findOrFail($id);

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
        $destinasi = Destinasi::create($request->all());
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
        $destinasi->update($request->all());
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

    public function boot(): void
{
    Paginator::useBootstrapFive();
}
}