<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Galeri;
use Illuminate\Support\Facades\File;

class GaleriController extends Controller
{
    public function index()
    {
        $data = Galeri::orderByDesc('id')->get();
        return view('galeri.index', compact('data'));
    }

    public function create()
    {
        return view('galeri.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'featured_image' => 'required|image|mimes:jpeg,png,jpg|max:20048',
        ]);

        $featuredImage = $request->file('featured_image')->getClientOriginalName();
        $request->file('featured_image')->move(public_path('images'), $featuredImage);

        Galeri::create([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'featured_image' => $featuredImage,
        ]);

        return redirect()->route('galeri.index')->with('success', 'Galeri Berhasil Dibuat>//<!');
    }

    public function show($id)
    {
        $galeri = Galeri::findOrFail($id);
        return view('galeri.show', compact('galeri'));
    }

    public function edit($id)
    {
        $galeri = Galeri::findOrFail($id);
        return view('galeri.edit', compact('galeri'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'featured_image' => 'image|mimes:jpeg,png,jpg|max:20048',
        ]);

        $galeri = Galeri::findOrFail($id);
        $galeri->update([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
        ]);

        if ($request->hasFile('featured_image')) {
            File::delete(public_path('images/' . $galeri->featured_image));
            $featuredImage = $request->file('featured_image')->getClientOriginalName();
            $request->file('featured_image')->move(public_path('images'), $featuredImage);
            $galeri->update(['featured_image' => $featuredImage]);
        }

        return redirect()->route('galeri.index')->with('success', 'Galeri Berhasil DiUpdate!');
    }

    public function destroy($id)
    {
        $galeri = Galeri::findOrFail($id);
        File::delete(public_path('images/' . $galeri->featured_image));
        $galeri->delete();
        return redirect()->route('galeri.index')->with('success', 'Galeri Berhasil Dihapus!');
    }
}
