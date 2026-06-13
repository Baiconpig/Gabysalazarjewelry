<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CustomerRequest;
use Illuminate\View\View;

class RequestReportController extends Controller
{
    public function __invoke(): View
    {
        $requests = CustomerRequest::query()
            ->orderByDesc('created_at')
            ->get();

        return view('admin.reports.requests', [
            'requests' => $requests,
            'totalCount' => $requests->count(),
            'customCount' => $requests->where('type', 'custom_piece')->count(),
            'appointmentCount' => $requests->where('type', 'appointment')->count(),
            'contactCount' => $requests->where('type', 'contact')->count(),
        ]);
    }
}
