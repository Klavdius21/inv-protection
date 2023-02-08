<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>pusher</title>

</head>
<body class="antialiased">

<script>
    let socket = new WebSocket("ws://{{$_SERVER['SERVER_NAME']}}:{{env('WEBSOCKET_PORT')}}");

    socket.onopen = function(event) {
        socket.send("{{$code}}");
    }
</script>
</body>
</html>
