<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="refresh" content="2;url={{ $url }}">
    <title>Unauthorized</title>
</head>
<body>
    <div style="text-align: center; margin-top: 50px; font-family: sans-serif;">
        <h1>403 | {{ $message }}</h1>
        <p>You will be redirected in 5 seconds...</p>
    </div>

    <script>
        setTimeout(function() {
            window.location.href = "{{ $url }}";
        }, 5000);
    </script>
</body>
</html>