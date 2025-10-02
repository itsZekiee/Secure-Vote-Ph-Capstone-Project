<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Secure Vote Ph</title>

    <!-- Google Fonts: Inter -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <!-- Remix Icon CSS for the icon -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" rel="stylesheet">
    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        /* Reset and basic styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            line-height: 1.6;
            color: #3C3737;
        }

        /* Header styles */
        header {
            background-color: white;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); /* Drop-shadow effect */
            padding: 1rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .header-left {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .header-icon {
            font-size: 2rem;
            color: #3C3737; /* Updated logo color */
        }

        .header-title {
            display: flex;
            flex-direction: column;
            gap: 0; /* No space between title and subtitle */
        }

        .header-title h1 {
            font-size: 1.5rem;
            font-weight: 600; /* Semibold */
            color: #3C3737; /* Updated font color */
            margin: 0;
            line-height: 1; /* Tight line-height to remove any inherent spacing */
        }

        .header-subtitle {
            font-size: 0.875rem;
            color: #3C3737; /* Updated font color */
            font-weight: 400;
            font-style: italic; /* Italic style for subtitle */
            line-height: 1; /* Tight line-height to remove any inherent spacing */
            margin-top: 0; /* Ensure no top margin */
        }

        /* Navigation styles */
        .nav__items {
            display: flex;
            align-items: center;
        }

        .nav__items ul {
            display: flex;
            list-style: none;
            gap: 2rem;
            margin: 0;
            padding: 0;
        }

        .nav__items a {
            text-decoration: none;
            color: #3C3737;
            font-weight: 600; /* Semibold */
            font-size: 1rem;
            transition: color 0.3s ease;
        }

        .nav__items a:hover {
            color: #1E5B5C; /* Hover color */
        }

        /* Buttons styles */
        .header-right {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .btn-outline,
        .btn-filled {
            padding: 0.5rem 1.5rem;
            border-radius: 4px;
            font-size: 0.875rem;
            font-weight: 600; /* Semibold */
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
            height: 2.25rem; /* Explicit height to ensure both buttons match */
            line-height: 1.25rem; /* Adjust line-height for consistent vertical centering */
            align-items: center;
            justify-content: center;
            display: flex; /* Use flex for better centering */
        }

        .btn-outline {
            background: white;
            border: 2px solid #3C3737; /* Updated border size to 2px */
            color: #3C3737;
        }

        .btn-outline:hover {
            color: #1E5B5C;
            border-color: #1E5B5C; /* Updated border color on hover */
            background: #f8f9fa; /* Light background on hover */
        }

        .btn-filled {
            background: #3C3737; /* Filled button background */
            color: white;
            border: none;
        }

        .btn-filled:hover {
            background: #1E5B5C; /* Hover color for filled button */
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            header {
                padding: 1rem;
                flex-wrap: wrap;
                gap: 1rem;
            }

            .header-left {
                gap: 0.5rem;
            }

            .header-icon {
                font-size: 1.5rem;
            }

            .header-title h1 {
                font-size: 1.25rem;
            }

            .nav__items ul {
                gap: 1rem;
                font-size: 0.875rem;
            }

            .header-right {
                gap: 0.5rem;
            }

            .btn-outline,
            .btn-filled {
                padding: 0.375rem 1rem;
                font-size: 0.75rem;
                height: 2rem; /* Adjusted height for mobile */
                line-height: 1rem;
            }
        }

        @media (max-width: 480px) {
            .nav__items {
                display: none; /* Hide nav on very small screens; consider adding a hamburger menu in production */
            }
        }
    </style>
</head>
<body class="font-sans text-gray-800">
<header>
    <div class="header-left">
        <i class="ri-shield-keyhole-fill header-icon"></i>
        <div class="header-title">
            <h1>Secure Vote Ph</h1>
            <span class="header-subtitle">Trusted Democracy</span>
        </div>
    </div>

    <nav class="nav__items">
        <ul>
            <li><a href="#features">Features</a></li>
            <li><a href="#security">Security</a></li>
            <li><a href="#geolocation">Geolocation</a></li>
            <li><a href="#analytics">Analytics</a></li>
        </ul>
    </nav>

    <div class="header-right">
        <a href="#learn-more" class="btn-outline">Learn More</a>
        <button class="btn-filled">Get Started</button>
    </div>
</header>

<!-- Main Content -->
<main class="p-6">
    <div class="max-w-3xl mx-auto bg-white rounded-lg shadow-md p-6">
        <h2 class="text-lg font-semibold mb-3">Welcome to Secure Vote PH</h2>
        <p class="text-gray-600">
            Your secure and trusted platform for modern digital voting.
            Please sign in or create an account to continue.
        </p>
    </div>
</main>
</body>
</html>
