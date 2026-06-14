<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PublicPreviewGate
{
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->session()->get('public_preview_authenticated')) {
            return $next($request);
        }

        $request->session()->put('url.intended', $request->fullUrl());

        return redirect()->route('public.preview.login');
    }
}
