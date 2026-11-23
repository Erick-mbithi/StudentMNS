
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'USHINDI COLLEGE') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            margin: 0;
            font-family: 'Figtree', sans-serif;
            background: linear-gradient(135deg, #eef4ff, #f8fafc, #e9f0ff);
        }

        .college-login-wrapper {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 25px 15px;
        }

        .college-login-card {
            width: 100%;
            max-width: 420px;
            background: #ffffff;
            border-radius: 18px;
            padding: 32px;
            box-shadow: 0 15px 45px rgba(30, 64, 175, 0.10);
            border: 1px solid #e5eaf3;
        }

        @media (max-width: 480px) {
            .college-login-card {
                padding: 24px 20px;
            }
        }
    </style>
</head>

<body>

    <div class="college-login-wrapper">

        <div class="college-login-card">

            {{ $slot }}

        </div>

    </div>

</body>
</html>
