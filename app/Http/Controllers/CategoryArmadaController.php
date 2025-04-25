<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
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
            $validatedData['images'] = $request->file('images')->store('category-images');
        }

        $validatedData['slug'] = Str::slug($request->nama_kategori);

        CategoryArmada::create($validatedData);

        return redirect('/dashboard/category-armada')->with('success', 'New category has been added!');
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

    public function checkSlug(Request $request)
    {
        $slug = Str::slug($request->nama);
        // Check if slug exists
        $count = CategoryArmada::where('slug', $slug)->count();
        if($count > 0) {
            $slug = $slug . '-' . ($count + 1);
        }
        return response()->json(['slug' => $slug]);
    }
}
