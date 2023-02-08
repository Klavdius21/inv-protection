<?php

namespace App\Http\Controllers;

use App\Helpers\Websocket;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use React\EventLoop\StreamSelectLoop;


/**
 * Handle the incoming request.
 *
 * @param Request $request
 * @return Application|Factory|View
 */

class SendController extends Controller
{
    const FILE = 'file.txt';
    /**
     * Handle the incoming request.
     *
     * @param Request $request
     * @return Application|Factory|View
     * @throws Exception
     */

    public function __invoke(Request $request)
    {
        event (new \App\Events\NewSignal($request->get('key')));
        /*$websocket = new Websocket();

        if (Storage::disk('local')->missing(self::FILE)) {
            Storage::disk('local')->put(self::FILE, '');
        }
        $file = base_path().'/storage/app/'.self::FILE;

        $conn = new \Ratchet\WebSocket\WsConnection(
            new \Ratchet\Server\IoConnection(
                new \React\Socket\Connection(
                    fopen($file, 'r+'),
                    new StreamSelectLoop
                )
            )
        );

        $websocket->onMessage($conn, $request->get('key'));*/
    }
}

