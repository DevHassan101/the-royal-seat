<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Royal Seat</title>
    <link rel="icon" type="image" href="{{ asset('assets/image/logo.jpg') }}">
    <link rel="stylesheet" href="{{ asset('assets/CSS/style.css') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: "Outfit", sans-serif;
        }
    </style>
</head>

<body class="overflow-x-hidden">
    @include('website.layouts.header')
    @yield('content')

    @include('website.layouts.footer')

    <script>
        AOS.init();
    </script>
    <script src="./assets/Js/app.js"></script>
</body>

</html>
