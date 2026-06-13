<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return view('admin.categories.index', [
            'categories' => Category::query()
                ->withCount('products')
                ->orderBy('name')
                ->get(),
        ]);
    }

    public function create()
    {
        return view('admin.categories.create', [
            'category' => new Category(),
        ]);
    }

    public function show(Category $category)
    {
        $category->loadCount('products');

        return view('admin.categories.show', compact('category'));
    }

    public function store(Request $request)
    {
        Category::create($this->validatedData($request));

        return redirect()
            ->route('admin.categories.index')
            ->with('status', 'Categoria creada correctamente.');
    }

    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $category->update($this->validatedData($request));

        return redirect()
            ->route('admin.categories.index')
            ->with('status', 'Categoria actualizada correctamente.');
    }

    public function destroy(Category $category)
    {
        if ($category->products()->exists()) {
            return redirect()
                ->route('admin.categories.index')
                ->withErrors('No puedes eliminar una categoria que tiene productos asociados.');
        }

        $category->delete();

        return redirect()
            ->route('admin.categories.index')
            ->with('status', 'Categoria eliminada correctamente.');
    }

    private function validatedData(Request $request): array
    {
        return $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
        ]);
    }
}
