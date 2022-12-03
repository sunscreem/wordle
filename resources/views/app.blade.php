<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wordle</title>
    <link href="{{ mix('/assets/css/app.css') }}" rel="stylesheet">
    <script src="{{ mix('/assets/js/manifest.js') }}" defer></script>
    <script src="{{ mix('/assets/js/vendor.js') }}" defer></script>
    <script src="{{ mix('/assets/js/app.js') }}" defer></script>
    @inertiaHead
</head>
<body>
    @inertia
    <div id="app"></div>
</body>
</html>