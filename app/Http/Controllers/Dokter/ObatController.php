<?php

namespace App\Http\Controllers\Dokter;

use App\Http\Controllers\Controller;
use App\Http\Requests\ObatUpdateRequest;
use Illuminate\Http\Request;

use App\Models\Obat;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;

class ObatController extends Controller
{
    public function index(){
        $obats = request()->has('trashed')
        ? Obat::onlyTrashed()->get()
        : Obat::all();

        return view('dokter.obat.index', compact('obats'));
    }

    public function store(Request $request) 
    { 
        $request->validate([ 
            'namaObat' => 'required|string', 
            'kemasan' => 'required|string', 
            'harga' => 'required|integer', 
        ]); 
 
        Obat::create([ 
            'nama_obat' => $request->namaObat, 
            'kemasan' => $request->kemasan, 
            'harga' => $request->harga, 
        ]); 
 
        return redirect()->back()->with('status', 'obat-created'); 
    } 
 
    public function edit($id)
    {
        $obat = Obat::findOrFail($id);

        return view('dokter.obat.edit')->with([ 
            'obat' => $obat, 
        ]); 
    }

    public function update(ObatUpdateRequest $request, $id): RedirectResponse
    {
        $obat = Obat::findOrFail($id);

        $obat->update([
            'nama_obat' => $request->namaObat,
            'kemasan' => $request->kemasan,
            'harga' => $request->harga,
        ]);

        return redirect()->route('obat.index');
    }

    
    public function destroy($id)
    {
        $obat = Obat::findOrFail($id);
        $obat->delete();

        return redirect()->route('obat.index')->with('success', 'Data obat berhasil dihapus.');
    }

    public function restore($id)
    {
        $obat = Obat::onlyTrashed()->findOrFail($id);
        $obat->restore();

        return redirect()->route('obat.index')->with('success', 'Data obat berhasil dipulihkan.');
    }

    public function forceDelete($id)
    {
        $obat = Obat::onlyTrashed()->findOrFail($id);
        $obat->forceDelete();

        return redirect()->route('obat.index')->with('success', 'Data obat dihapus permanen.');
    }

    public function trash()
    {
        $obats = Obat::onlyTrashed()->get();
        return view('dokter.obat.trash', compact('obats'));
    }


}
