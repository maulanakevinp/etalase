<?php

namespace App\Http\Controllers;

use App\Anggota;
use App\Exports\AnggotaExport;
use App\Imports\AnggotaImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Facades\Excel;

class AnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $anggota = Anggota::paginate(20);

        if ($request->cari) {
            $anggota = Anggota::where('nama','like',"%{$request->cari}%")
                            ->orWhere('nim','like',"%{$request->cari}%")
                            ->orWhere('nia','like',"%{$request->cari}%")
                            ->latest()->paginate(20);
        }

        $anggota->appends($request->only('cari'));

        return view('anggota.index',compact('anggota'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('anggota.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nia'       =>  ['required', 'string', 'max:16', 'unique:anggota,nia'],
            'nim'       =>  ['required', 'digits:12', 'unique:anggota,nim'],
            'nama'      =>  ['required', 'string', 'max:64'],
            'foto'      =>  ['nullable', 'image', 'mimes:jpeg,png,gif', 'max:2048']
        ]);

        if ($request->foto) {
            $data['foto'] = $request->foto->store('public/anggota');
        } else {
            $data['foto'] = 'public/noavatar.jpg';
        }

        $anggota = Anggota::create($data);
        return redirect()->route('anggota.show', $anggota)->with('success', 'Strucuture berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Anggota  $anggota
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $anggota = Anggota::findOrFail($id);
        return view('anggota.show', compact('anggota'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Anggota  $anggota
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $anggota = Anggota::findOrFail($id);
        return view('anggota.edit', compact('anggota'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Anggota  $anggota
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $anggota = Anggota::findOrFail($id);
        $data = $request->validate([
            'nia'       =>  ['required', 'string', 'max:16', Rule::unique('anggota','nia')->ignore($anggota->id)],
            'nim'       =>  ['required', 'digits:12', Rule::unique('anggota','nim')->ignore($anggota->id)],
            'nama'      =>  ['required', 'string', 'max:64'],
            'foto'      =>  ['nullable', 'image', 'mimes:jpeg,png,gif', 'max:2048']
        ]);

        if ($request->foto) {
            if ($anggota->foto != 'public/noavatar.jpg') {
                File::delete(storage_path('app/'.$anggota->foto));
            }
            $data['foto'] = $request->foto->store('public/anggota');
        } else {
            $data['foto'] = $anggota->foto;
        }

        $anggota->update($data);
        return redirect()->route('anggota.show', $anggota)->with('success', 'Strucuture berhasil perbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Anggota  $anggota
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $anggota = Anggota::findOrFail($id);
        if ($anggota->foto != 'public/noavatar.jpg') {
            File::delete(storage_path('app/'.$anggota->foto));
        }
        $anggota->delete();
        return redirect()->route('anggota.index')->with('success', 'Anggota Berhasil dihapus');
    }

    public function export()
    {
        return Excel::download(new AnggotaExport, 'Anggota Etalase.xlsx');
    }

    public function import(Request $request)
    {
        $request->validate([
            'xlsx' => ['required','file','max:2048']
        ],[
            'xlsx.required' => 'File wajib diisi'
        ]);

        Excel::import(new AnggotaImport, $request->file('xlsx'));
        return redirect()->back()->with('success', 'File xlsx berhasil di import');
    }
}
