<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}-BLOG</title>

    <x-website.styles />
</head>

<body class="d-flex flex-column min-vh-100">
    <x-website.navbar />
    <div class="flex-grow-1">
        {{ $slot }}
    </div>
    
    <x-website.footer />
    <x-website.scripts />
</body>

</html>
