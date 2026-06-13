<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomeBlock;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class HomeBlockController extends Controller
{
    public function index(): View
    {
        return view('admin.home-blocks.index', [
            'blocks' => HomeBlock::query()
                ->orderBy('page_slug')
                ->orderBy('sort_order')
                ->orderBy('id')
                ->get(),
            'pageLabels' => HomeBlock::PAGE_LABELS,
        ]);
    }

    public function update(Request $request, HomeBlock $homeBlock): RedirectResponse
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'page_slug' => ['required', 'string', 'max:255'],
            'eyebrow' => ['nullable', 'string', 'max:255'],
            'title' => ['nullable', 'string', 'max:255'],
            'body' => ['nullable', 'string'],
            'button_label' => ['nullable', 'string', 'max:255'],
            'button_url' => ['nullable', 'string', 'max:255'],
            'secondary_button_label' => ['nullable', 'string', 'max:255'],
            'secondary_button_url' => ['nullable', 'string', 'max:255'],
            'image_path' => ['nullable', 'string', 'max:255'],
            'logo_path' => ['nullable', 'string', 'max:255'],
            'image_file' => ['nullable', 'image', 'max:5120'],
            'logo_file' => ['nullable', 'image', 'max:5120'],
            'sort_order' => ['required', 'integer', 'min:0'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        if ($request->hasFile('image_file')) {
            $data['image_path'] = Storage::disk('public')->url(
                $request->file('image_file')->store('home-blocks', 'public')
            );
        }

        if ($request->hasFile('logo_file')) {
            $data['logo_path'] = Storage::disk('public')->url(
                $request->file('logo_file')->store('home-logos', 'public')
            );
        }

        $data['is_active'] = $request->boolean('is_active');

        unset($data['image_file'], $data['logo_file']);

        $homeBlock->update($data);

        return redirect()
            ->route('admin.home-blocks.index')
            ->with('status', 'Bloque actualizado correctamente.');
    }
}
