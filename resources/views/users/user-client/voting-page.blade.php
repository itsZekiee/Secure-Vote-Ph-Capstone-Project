<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>[Voting Title]</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <!-- Remix Icons -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" rel="stylesheet">
    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Alpine.js -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

</head>
<body class="min-h-screen bg-gradient-to-br from-blue-50 via-white to-purple-50 font-inter">
@include('layout.partials.simplified-header')

<><!-- Background Pattern -->
    <div class="absolute inset-0 opacity-5">
        <div class="absolute inset-0"
             style="background-image: radial-gradient(circle at 1px 1px, rgb(99 102 241) 1px, transparent 0); background-size: 20px 20px;">
        </div>
    </div>
    <section class="mb-8">
        <h1 class="text-3xl font-bold mb-2">{{ $formTitle }}</h1>
        <p class="text-lg text-gray-600 mb-6">{{ $formDescription }}</p>

        @foreach($positions as $position)
            <div class="mb-6">
                <h2 class="text-xl font-semibold mb-2">{{ $position->name }}</h2>
                <ul class="list-disc pl-6">
                    @foreach($position->candidates as $candidate)
                        <li class="mb-1">{{ $candidate->name }}</li>
                    @endforeach
                </ul>
            </div>
        @endforeach
    </section>
</body>
</html>
