<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;


/**
 * Handle the incoming request.
 *
 * @param Request $request
 * @return Application|Factory|View
 */

class SendController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param Request $request
     * @return Application|Factory|View
     * @throws Exception
     */

    public function __invoke(Request $request)
    {
        return view('pusher', ['code' => $request->get('key')]);
    }
}

