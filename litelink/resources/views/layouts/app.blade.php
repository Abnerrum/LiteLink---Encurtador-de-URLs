<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LiteLink — Encurtador de URLs</title>

    {{-- Tailwind CSS via CDN --}}
    <script src="https://cdn.tailwindcss.com"></script>

    {{-- Google Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Syne:wght@400;700;800&family=DM+Mono:wght@400;500&display=swap" rel="stylesheet">

    <style>
        body { font-family: 'Syne', sans-serif; }
        .mono { font-family: 'DM Mono', monospace; }
        .btn-primary {
            transition: background-color 0.15s, transform 0.1s;
        }
        .btn-primary:active { transform: scale(0.97); }
        .card-hover:hover { border-color: #10b981; }
        input:focus { box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.15); }
    </style>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        brand: {
                            50:  '#ecfdf5',
                            100: '#d1fae5',
                            500: '#10b981',
                            600: '#059669',
                            700: '#047857',
                        }
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-gray-50 min-h-screen">

    <div class="max-w-2xl mx-auto px-4 py-12">
        @yield('content')
    </div>

</body>
</html>
