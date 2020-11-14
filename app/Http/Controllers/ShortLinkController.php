<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShortLinkRequest;
use App\Models\ShortLink;
use Illuminate\Support\Str;

/**
 * Class ShortLinkController
 * @package App\Http\Controllers
 */
class ShortLinkController extends Controller
{

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('index')->with([
            'shortLinks' => ShortLink::query()->latest()->get(),
        ]);
    }

    /**
     * @param ShortLinkRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ShortLinkRequest $request)
    {

        ShortLink::create([
            'link' => $request->link,
            'token' => Str::random(6),
        ]);

        return redirect()->route('index')->with('success', 'Short link has been created.');
    }

    /**
     * @param $token
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function getShortLinkRedirect($token)
    {
        $link = ShortLink::query()->where('token', $token)->first();

        return redirect($link->link);
    }
}
