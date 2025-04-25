<?php

namespace App\Http\Controllers;

use App\Models\Armada;
use App\Models\CategoryArmada;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ArmadaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.kelolaarmada.index', [
            // 'categories' => CategoryArmada::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.kelolaarmada.create', [
            // 'categories' => CategoryArmada::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'category_id' => 'required',
            'nama_mobil' => 'required|max:255',
            'deskripsi' => 'required',
            'ukuran' => 'required',
            'berat' => 'required',
            'muatan' => 'required',
            'image' => 'required|image|file|max:1024'
        ]);

        if($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('armada-images');
        }

        $validatedData['slug'] = Str::slug($request->nama_mobil);

        Armada::create($validatedData);

        return redirect('/dashboard/armada')->with('success', 'Armada baru berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
