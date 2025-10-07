<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Client Dashboard</title>

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
<body class="bg-gray-50">
    @include('layout.partials.simplified-header')

    <main class="flex flex-col items-center justify-center min-h-[80vh]">
        <div class="max-w-md w-full mx-auto mt-12 p-6 bg-transparent rounded-lg" x-data="{ showSignUp: false }">
            <!-- Sign In Form -->
            <div x-show="!showSignUp">
                <div class="mb-6 text-center">
                    <div class="section-title text-4xl font-bold text-gray-900 mb-2">Voter Authentication</div>
                    <div class="section-subTitle text-gray-500 text-sm">Please verify your identity to proceed with voting</div>
                </div>
                <form>
                    <div class="mb-4">
                        <input class="w-full px-4 py-2 border rounded focus:outline-none focus:ring" type="email" id="email" name="email" required placeholder="Email">
                    </div>
                    <div class="mb-6">
                        <input class="w-full px-4 py-2 border rounded focus:outline-none focus:ring" type="password" id="password" name="password" required placeholder="Password">
                    </div>
                    <button type="submit" class="w-full py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Sign In</button>
                </form>
                <div class="flex items-center my-6">
                    <div class="flex-grow border-t border-gray-300"></div>
                    <span class="mx-4 text-gray-500 text-sm">or continue with SSO</span>
                    <div class="flex-grow border-t border-gray-300"></div>
                </div>
                <button class="w-full flex items-center justify-center py-2 border border-gray-300 rounded bg-white hover:bg-gray-100">
                    <i class="ri-google-fill text-xl mr-2"></i>
                    <span class="text-gray-700 font-medium">Sign in with Google</span>
                </button>
                <div class="mt-8 text-center">
                        <span class="text-gray-600 text-sm">Don't Have Account?
                            <a href="#" class="text-blue-600 font-semibold hover:underline" @click.prevent="showSignUp = true">Create Now!</a>
                        </span>
                </div>
            </div>
            <!-- Sign Up Form -->
            <div x-show="showSignUp">
                <div class="mb-6 text-center">
                    <div class="section-title text-3xl font-bold text-gray-900 mb-2">Create Account</div>
                    <div class="section-subTitle text-gray-500 text-sm">Sign up to start voting securely</div>
                </div>
                <form>
                    <div class="mb-4">
                        <input class="w-full px-4 py-2 border rounded focus:outline-none focus:ring" type="text" id="username" name="username" required placeholder="Username">
                    </div>
                    <div class="mb-4">
                        <input class="w-full px-4 py-2 border rounded focus:outline-none focus:ring" type="email" id="signup-email" name="email" required placeholder="Email">
                    </div>
                    <div class="mb-6">
                        <input class="w-full px-4 py-2 border rounded focus:outline-none focus:ring" type="password" id="signup-password" name="password" required placeholder="Password">
                    </div>
                    <button type="submit" class="w-full py-2 bg-green-600 text-white rounded hover:bg-green-700">Create Account</button>
                </form>
                <div class="flex items-center my-6">
                    <div class="flex-grow border-t border-gray-300"></div>
                    <span class="mx-4 text-gray-500 text-sm">or continue with SSO</span>
                    <div class="flex-grow border-t border-gray-300"></div>
                </div>
                <button class="w-full flex items-center justify-center py-2 border border-gray-300 rounded bg-white hover:bg-gray-100">
                    <i class="ri-google-fill text-xl mr-2"></i>
                    <span class="text-gray-700 font-medium">Sign up with Google</span>
                </button>
                <div class="mt-8 text-center">
                        <span class="text-gray-600 text-sm">Already have an account?
                            <a href="#" class="text-blue-600 font-semibold hover:underline" @click.prevent="showSignUp = false">Sign In</a>
                        </span>
                </div>
            </div>
        </div>
    </main>
</body>
</html>
