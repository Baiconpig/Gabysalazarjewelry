<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BrandImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BrandImageController extends Controller
{
    public function index()
    {
        return view('admin.images.index', [
            'images' => BrandImage::query()
                ->orderBy('sort_order')
                ->orderByDesc('created_at')
                ->paginate(12),
        ]);
    }

    public function create()
    {
        return view('admin.images.create', [
            'image' => new BrandImage([
                'category' => 'general',
                'sort_order' => 0,
                'is_active' => true,
            ]),
        ]);
    }

    public function store(Request $request)
    {
        BrandImage::create($this->validatedData($request));

        return redirect()
            ->route('admin.images.index')
            ->with('status', 'Imagen creada correctamente.');
    }

    public function edit(BrandImage $image)
    {
        return view('admin.images.edit', compact('image'));
    }

    public function update(Request $request, BrandImage $image)
    {
        $image->update($this->validatedData($request, $image));

        return redirect()
            ->route('admin.images.index')
            ->with('status', 'Imagen actualizada correctamente.');
    }

    public function destroy(BrandImage $image)
    {
        $image->delete();

        return redirect()
            ->route('admin.images.index')
            ->with('status', 'Imagen eliminada correctamente.');
    }

    private function validatedData(Request $request, ?BrandImage $image = null): array
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'category' => ['required', 'string', 'max:255'],
            'image_path' => [$image ? 'nullable' : 'required_without:image_file', 'string', 'max:255'],
            'image_file' => ['nullable', 'image', 'max:5120'],
            'alt_text' => ['nullable', 'string', 'max:255'],
            'source' => ['nullable', 'string', 'max:255'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        if ($request->hasFile('image_file')) {
            $data['image_path'] = Storage::disk('public')->url(
                $request->file('image_file')->store('brand-images', 'public')
            );
        }

        $data['sort_order'] = $data['sort_order'] ?? 0;
        $data['is_active'] = $request->boolean('is_active');
        unset($data['image_file']);

        return $data;
    }
}
