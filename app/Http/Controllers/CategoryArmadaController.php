<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\CategoryArmada;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class CategoryArmadaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.kelolacategoryarmada.index', [
            'categories' => CategoryArmada::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.kelolacategoryarmada.create', [
            // 'categories' => CategoryArmada::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_kategori' => 'required|max:255',
            'images' => 'image|file|max:1024'
        ]);

        if($request->file('images')) {
            $validatedData['images'] = $request->file('images')->store('armada-images', 'public');
        }

        $validatedData['slug'] = Str::slug($request->nama_kategori);

        CategoryArmada::create($validatedData);

        return redirect('/dashboard/category-armada')->with('success', 'Kategori baru berhasil ditambahkan!');
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
        
        $category = CategoryArmada::where('slug', $id)->firstOrFail();
        return view('dashboard.kelolacategoryarmada.edit', [
            'category' => $category,
            
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $category = CategoryArmada::findOrFail($id);
        
        $rules = [
            'nama_kategori' => 'required|max:255',
            'images' => 'image|file|max:1024'
        ];

        $validatedData = $request->validate($rules);

        if($request->file('images')) {
            if($category->images) {
                Storage::disk('public')->delete($category->images);
            }
            $validatedData['images'] = $request->file('images')->store('armada-images', 'public');
        }

        $validatedData['slug'] = Str::slug($request->nama_kategori);

        CategoryArmada::where('id', $id)->update($validatedData);

        return redirect('/dashboard/category-armada')->with('success', 'Kategori berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = CategoryArmada::where('slug', $id)->firstOrFail();
        
        if($category->images) {
            Storage::disk('public')->delete($category->images);
        }
        
        CategoryArmada::where('slug', $id)->delete();
        
        return redirect('/dashboard/category-armada')->with('success', 'Kategori berhasil dihapus!');
    }

    public function checkSlug(Request $request)
    {
        $slug = Str::slug($request->nama_kategori);
        
        // Check if slug exists
        $count = CategoryArmada::where('slug', 'LIKE', "{$slug}%")->count();
        
        if ($count > 0) {
            $slug = $slug . '-' . ($count + 1);
        }
        
        return response()->json(['slug' => $slug]);
    }
}
