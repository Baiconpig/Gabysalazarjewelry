<?php

namespace App\Http\Controllers;

use App\Models\BrandImage;
use App\Models\CustomerRequest;
use App\Models\HomeBlock;
use App\Models\HomeVideo;
use App\Models\Product;
use App\Models\Testimonial;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\View\View;

class PublicPageController extends Controller
{
    public function home(): View
    {
        $brandImages = BrandImage::query()
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->orderByDesc('created_at')
            ->get();
        $homeBlocks = HomeBlock::query()
            ->where('is_active', true)
            ->where('page_slug', 'home')
            ->orderBy('sort_order')
            ->get()
            ->keyBy('slug');
        $homeVideos = HomeVideo::query()
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->orderByDesc('created_at')
            ->get();
        $homeVideosPayload = $homeVideos->map(fn (HomeVideo $video) => [
            'id' => $video->id,
            'title' => $video->title,
            'category' => $video->category,
            'duration' => $video->duration ?: '',
            'description' => $video->description ?: '',
            'videoUrl' => $video->video_url,
            'thumbnailPath' => $video->thumbnail_path,
        ])->values();
        $featuredProducts = Product::query()
            ->with('category')
            ->orderByDesc('created_at')
            ->take(6)
            ->get();

        return view('welcome', compact('brandImages', 'homeBlocks', 'homeVideos', 'homeVideosPayload', 'featuredProducts'));
    }

    public function history(): View
    {
        return view('pages.history', $this->pageContent('history', 'history-hero'));
    }

    public function catalog(): View
    {
        return view('pages.catalog', $this->pageContent('catalog', 'catalog-hero') + [
            'products' => Product::query()->with('category')->orderByDesc('created_at')->get(),
        ]);
    }

    public function collections(): View
    {
        return view('pages.collections', $this->pageContent('collections', 'collections-hero') + [
            'images' => BrandImage::query()
                ->where('is_active', true)
                ->orderBy('sort_order')
                ->orderByDesc('created_at')
                ->get(),
        ]);
    }

    public function customMade(): View
    {
        return view('pages.custom-made', $this->pageContent('custom-made', 'custom-made-hero'));
    }

    public function customRequest(): View
    {
        return view('pages.custom-request', $this->pageContent('custom-request', 'custom-request-hero'));
    }

    public function appointments(): View
    {
        return view('pages.appointments', $this->pageContent('appointments', 'appointments-hero'));
    }

    public function instagram(): View
    {
        return view('pages.instagram', $this->pageContent('instagram', 'instagram-hero'));
    }

    public function testimonials(): View
    {
        return view('pages.testimonials', $this->pageContent('testimonials', 'testimonials-hero') + [
            'testimonials' => Testimonial::query()
                ->where('is_active', true)
                ->orderBy('sort_order')
                ->orderByDesc('created_at')
                ->get(),
        ]);
    }

    public function contact(): View
    {
        return view('pages.contact', $this->pageContent('contact', 'contact-hero'));
    }

    public function storeCustomRequest(Request $request): RedirectResponse
    {
        $this->storeRequest($request, 'custom_piece');

        return back()->with('status', 'Solicitud de pieza personalizada enviada correctamente.');
    }

    public function storeAppointment(Request $request): RedirectResponse
    {
        $this->storeRequest($request, 'appointment');

        return back()->with('status', 'Solicitud de cita enviada correctamente.');
    }

    public function storeContact(Request $request): RedirectResponse
    {
        $this->storeRequest($request, 'contact');

        return back()->with('status', 'Mensaje enviado correctamente.');
    }

    private function storeRequest(Request $request, string $type): void
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['nullable', 'email', 'max:255'],
            'phone' => ['nullable', 'string', 'max:255'],
            'preferred_date' => ['nullable', 'date'],
            'budget' => ['nullable', 'string', 'max:255'],
            'message' => ['nullable', 'string'],
        ]);

        CustomerRequest::query()->create($data + [
            'type' => $type,
            'status' => 'new',
        ]);
    }

    /**
     * @return array{pageBlocks: Collection<string, HomeBlock>, pageHero: ?HomeBlock}
     */
    private function pageContent(string $pageSlug, string $heroSlug): array
    {
        $pageBlocks = HomeBlock::query()
            ->where('page_slug', $pageSlug)
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->get()
            ->keyBy('slug');

        return [
            'pageBlocks' => $pageBlocks,
            'pageHero' => $pageBlocks->get($heroSlug),
        ];
    }
}
