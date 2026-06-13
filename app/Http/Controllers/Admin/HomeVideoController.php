<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomeVideo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomeVideoController extends Controller
{
    public function index()
    {
        return view('admin.videos.index', [
            'videos' => HomeVideo::query()
                ->orderBy('sort_order')
                ->orderByDesc('created_at')
                ->paginate(12),
        ]);
    }

    public function create()
    {
        return view('admin.videos.create', [
            'video' => new HomeVideo([
                'category' => 'general',
                'sort_order' => 0,
                'is_active' => true,
            ]),
        ]);
    }

    public function store(Request $request)
    {
        HomeVideo::create($this->validatedData($request));

        return redirect()
            ->route('admin.videos.index')
            ->with('status', 'Video creado correctamente.');
    }

    public function edit(HomeVideo $video)
    {
        return view('admin.videos.edit', compact('video'));
    }

    public function update(Request $request, HomeVideo $video)
    {
        $video->update($this->validatedData($request, $video));

        return redirect()
            ->route('admin.videos.index')
            ->with('status', 'Video actualizado correctamente.');
    }

    public function destroy(HomeVideo $video)
    {
        $video->delete();

        return redirect()
            ->route('admin.videos.index')
            ->with('status', 'Video eliminado correctamente.');
    }

    private function validatedData(Request $request, ?HomeVideo $video = null): array
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'category' => ['required', 'string', 'max:255'],
            'video_url' => ['required', 'string', 'max:255'],
            'thumbnail_path' => ['nullable', 'string', 'max:255'],
            'thumbnail_file' => ['nullable', 'image', 'max:5120'],
            'description' => ['nullable', 'string'],
            'duration' => ['nullable', 'string', 'max:50'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        if ($request->hasFile('thumbnail_file')) {
            $data['thumbnail_path'] = Storage::disk('public')->url(
                $request->file('thumbnail_file')->store('video-thumbnails', 'public')
            );
        }

        $data['sort_order'] = $data['sort_order'] ?? 0;
        $data['is_active'] = $request->boolean('is_active');
        unset($data['thumbnail_file']);

        return $data;
    }
}
