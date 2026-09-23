<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PageController extends Controller
{
    /**
     * Render a published dynamic CMS page by its slug.
     */
    public function show(Request $request, string $slug): View
    {
        $page = Page::query()
            ->where('slug', $slug)
            ->published()
            ->firstOrFail();

        return view('frontend.page', [
            'page' => $page,
        ]);
    }
}