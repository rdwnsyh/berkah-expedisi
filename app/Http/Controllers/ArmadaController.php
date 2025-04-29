<?php

namespace App\Http\Controllers;

use App\Models\Armada;
use App\Models\CategoryArmada;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ArmadaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.kelolaarmada.index', [
            'armadas' => Armada::with('category')
                        ->filter(request(['search']))
                        ->latest()
                        ->paginate(10)
                        ->withQueryString()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.kelolaarmada.create', [
            'categories' => CategoryArmada::all()
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

        // Generate unique slug
        $slug = Str::slug($request->nama_mobil);
        $count = Armada::where('slug', 'LIKE', "{$slug}%")->count();
        if ($count > 0) {
            $validatedData['slug'] = $slug . '-' . ($count + 1);
        } else {
            $validatedData['slug'] = $slug;
        }

        if($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('armada-images', 'public');
        }

        try {
            Armada::create($validatedData);
            return redirect('/dashboard/armada')->with('success', 'Armada baru berhasil ditambahkan!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menambahkan armada: ' . $e->getMessage());
        }
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
    public function edit($slug)
    {
        $armada = Armada::where('slug', $slug)->firstOrFail();
        return view('dashboard.kelolaarmada.edit', [
            'armada' => $armada,
            'categories' => CategoryArmada::all()
        ]);
    }

    public function update(Request $request, $slug)
    {
        $armada = Armada::where('slug', $slug)->firstOrFail();
        
        $rules = [
            'category_id' => 'required',
            'nama_mobil' => 'required|max:255',
            'deskripsi' => 'required',
            'ukuran' => 'required',
            'berat' => 'required',
            'muatan' => 'required',
            'image' => 'image|file|max:1024'
        ];

        // Generate new slug if nama_mobil changes
        if($request->nama_mobil != $armada->nama_mobil) {
            $newSlug = Str::slug($request->nama_mobil);
            $count = Armada::where('slug', 'LIKE', "{$newSlug}%")
                          ->where('id', '!=', $armada->id)
                          ->count();
            if ($count > 0) {
                $validatedData['slug'] = $newSlug . '-' . ($count + 1);
            } else {
                $validatedData['slug'] = $newSlug;
            }
        }

        $validatedData = $request->validate($rules);

        // Only update image if new one is uploaded
        if($request->file('image')) {
            if($armada->image) {
                Storage::delete('public/' . $armada->image);
            }
            $validatedData['image'] = $request->file('image')->store('armada-images', 'public');
        }

        try {
            $armada->update($validatedData);
            return redirect('/dashboard/armada')->with('success', 'Armada berhasil diupdate!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal mengupdate armada: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($slug)
    {
        $armada = Armada::where('slug', $slug)->firstOrFail();

        try {
            // Delete image if exists
            if($armada->image) {
                Storage::delete('public/' . $armada->image);
            }
            
            // Delete the armada
            $armada->delete();
            
            return redirect('/dashboard/armada')->with('success', 'Armada berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menghapus armada: ' . $e->getMessage());
        }
    }

    public function checkSlug(Request $request)
    {
        $slug = Str::slug($request->nama_mobil);
        
        // Check if slug exists
        $count = Armada::where('slug', 'LIKE', "{$slug}%")->count();
        
        if ($count > 0) {
            $slug = $slug . '-' . ($count + 1);
        }
        
        return response()->json(['slug' => $slug]);
    }
}
