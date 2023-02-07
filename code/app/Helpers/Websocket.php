<?php
namespace App\Helpers;
use Illuminate\Support\Facades\Log;
use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;
use SplObjectStorage;

class Websocket implements MessageComponentInterface
{
    const MESSAGES = [
        '0' => 'Authorized access',
        '1' => 'ALARM! Unauthorized access',
    ];
    const ERROR_MSG = 'Incorrect code';


    protected SplObjectStorage $clients;


    public function __construct() {
        $this->clients = new SplObjectStorage;
    }

    public function onOpen(ConnectionInterface $conn) {
        // Store the new connection to send messages to later
        $this->clients->attach($conn);

        echo "New connection! ({$conn->resourceId})\n";
    }

    public function onMessage(ConnectionInterface $from, $msg)
    {
        $returnMessage = [
            'code' => $msg,
            'message' => self::MESSAGES[$msg] ?? self::ERROR_MSG,
            ];
        $logMessage = $returnMessage['message'] . '; code: ' . $returnMessage['code'];

        if (isset(self::MESSAGES[$msg])) {
            foreach ($this->clients as $client) {
                if ($from !== $client) {
                    // The sender is not the receiver, send to each client connected
                    $client->send(json_encode($returnMessage), JSON_UNESCAPED_UNICODE);
                }
            }
            Log::alert($logMessage);
        } else {
            Log::info($logMessage);
        }

        echo $returnMessage['message'] . PHP_EOL;
    }

    public function onClose(ConnectionInterface $conn) {
        // The connection is closed, remove it, as we can no longer send it messages
        $this->clients->detach($conn);

        echo "Connection {$conn->resourceId} has disconnected\n";
    }

    public function onError(ConnectionInterface $conn, \Exception $e) {
        echo "An error has occurred: {$e->getMessage()}\n";

        $conn->close();
    }
}
