<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Secure Vote Ph - Authentication</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Remix Icons -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" rel="stylesheet">
    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        'inter': ['Inter', 'sans-serif'],
                    },
                    animation: {
                        'fade-in': 'fadeIn 0.5s ease-in-out',
                        'slide-up': 'slideUp 0.4s ease-out',
                    }
                }
            }
        }
    </script>
    <!-- Alpine.js -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

    <style>
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        @keyframes slideUp {
            from { transform: translateY(20px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }
        .glass-effect {
            backdrop-filter: blur(10px);
            background: rgba(255, 255, 255, 0.95);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
    </style>
</head>
<body class="min-h-screen bg-gradient-to-br from-blue-50 via-white to-purple-50 font-inter">
@include('layout.partials.simplified-header')

<!-- Background Pattern -->
<div class="absolute inset-0 opacity-5">
    <div class="absolute inset-0" style="background-image: radial-gradient(circle at 1px 1px, rgb(99 102 241) 1px, transparent 0); background-size: 20px 20px;"></div>
</div>

<main class="relative flex items-center justify-center min-h-[85vh] py-12 px-4">
    <div class="w-full max-w-md animate-slide-up" x-data="{
            showSignUp: false,
            isLoading: false,
            showPassword: false,
            showSignupPassword: false
        }">

        <!-- Card Container -->
        <div class="glass-effect rounded-2xl shadow-2xl p-8 border border-white/20">

            <!-- Header -->
            <div class="text-center mb-8">
                <div class="w-16 h-16 bg-gradient-to-r from-blue-600 to-purple-600 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="ri-shield-check-line text-2xl text-white"></i>
                </div>
                <h1 class="text-2xl font-bold text-gray-900 mb-2" x-text="showSignUp ? 'Create Account' : 'Welcome Back'"></h1>
                <p class="text-gray-600 text-sm" x-text="showSignUp ? 'Join our secure voting platform' : 'Sign in to access your voting form'"></p>
            </div>

            <!-- Sign In Form -->
            <div x-show="!showSignUp" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform scale-95" x-transition:enter-end="opacity-100 transform scale-100">
                <form class="space-y-5" @submit.prevent="isLoading = true">
                    <div class="space-y-1">
                        <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
                        <div class="relative">
                            <input type="email" id="email" name="email" required
                                   class="w-full px-4 py-3 pl-11 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 bg-white/80"
                                   placeholder="Enter your email">
                            <i class="ri-mail-line absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                        </div>
                    </div>

                    <div class="space-y-1">
                        <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                        <div class="relative">
                            <input :type="showPassword ? 'text' : 'password'" id="password" name="password" required
                                   class="w-full px-4 py-3 pl-11 pr-11 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 bg-white/80"
                                   placeholder="Enter your password">
                            <i class="ri-lock-line absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                            <button type="button" @click="showPassword = !showPassword" class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-gray-600">
                                <i :class="showPassword ? 'ri-eye-off-line' : 'ri-eye-line'"></i>
                            </button>
                        </div>
                    </div>

                    <div class="flex items-center justify-between text-sm">
                        <label class="flex items-center">
                            <input type="checkbox" class="rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                            <span class="ml-2 text-gray-600">Remember me</span>
                        </label>
                        <a href="#" class="text-blue-600 hover:text-blue-700 font-medium">Forgot password?</a>
                    </div>

                    <button type="submit"
                            class="w-full bg-gradient-to-r from-blue-600 to-purple-600 text-white py-3 rounded-xl font-semibold hover:from-blue-700 hover:to-purple-700 focus:ring-4 focus:ring-blue-200 transition-all duration-200 transform hover:scale-[1.02]"
                            :class="{ 'opacity-75 cursor-not-allowed': isLoading }"
                            :disabled="isLoading">
                        <span x-show="!isLoading">Sign In</span>
                        <span x-show="isLoading" class="flex items-center justify-center">
                                <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                </svg>
                                Signing in...
                            </span>
                    </button>
                </form>
            </div>

            <!-- Sign Up Form -->
            <div x-show="showSignUp" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform scale-95" x-transition:enter-end="opacity-100 transform scale-100">
                <form class="space-y-5" @submit.prevent="isLoading = true">
                    <div class="space-y-1">
                        <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
                        <div class="relative">
                            <input type="text" id="username" name="username" required
                                   class="w-full px-4 py-3 pl-11 border border-gray-200 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-200 bg-white/80"
                                   placeholder="Choose a username">
                            <i class="ri-user-line absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                        </div>
                    </div>

                    <div class="space-y-1">
                        <label for="signup-email" class="block text-sm font-medium text-gray-700">Email Address</label>
                        <div class="relative">
                            <input type="email" id="signup-email" name="email" required
                                   class="w-full px-4 py-3 pl-11 border border-gray-200 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-200 bg-white/80"
                                   placeholder="Enter your email">
                            <i class="ri-mail-line absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                        </div>
                    </div>

                    <div class="space-y-1">
                        <label for="signup-password" class="block text-sm font-medium text-gray-700">Password</label>
                        <div class="relative">
                            <input :type="showSignupPassword ? 'text' : 'password'" id="signup-password" name="password" required
                                   class="w-full px-4 py-3 pl-11 pr-11 border border-gray-200 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-200 bg-white/80"
                                   placeholder="Create a password">
                            <i class="ri-lock-line absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                            <button type="button" @click="showSignupPassword = !showSignupPassword" class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-gray-600">
                                <i :class="showSignupPassword ? 'ri-eye-off-line' : 'ri-eye-line'"></i>
                            </button>
                        </div>
                    </div>

                    <div class="flex items-start">
                        <input type="checkbox" id="terms" class="mt-1 rounded border-gray-300 text-green-600 focus:ring-green-500" required>
                        <label for="terms" class="ml-2 text-sm text-gray-600">
                            I agree to the <a href="#" class="text-green-600 hover:text-green-700 font-medium">Terms of Service</a> and
                            <a href="#" class="text-green-600 hover:text-green-700 font-medium">Privacy Policy</a>
                        </label>
                    </div>

                    <button type="submit"
                            class="w-full bg-gradient-to-r from-green-600 to-emerald-600 text-white py-3 rounded-xl font-semibold hover:from-green-700 hover:to-emerald-700 focus:ring-4 focus:ring-green-200 transition-all duration-200 transform hover:scale-[1.02]"
                            :class="{ 'opacity-75 cursor-not-allowed': isLoading }"
                            :disabled="isLoading">
                        <span x-show="!isLoading">Create Account</span>
                        <span x-show="isLoading" class="flex items-center justify-center">
                                <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                </svg>
                                Creating account...
                            </span>
                    </button>
                </form>
            </div>

            <!-- Divider -->
            <div class="flex items-center my-6">
                <div class="flex-grow border-t border-gray-200"></div>
                <span class="mx-4 text-gray-500 text-sm font-medium">or</span>
                <div class="flex-grow border-t border-gray-200"></div>
            </div>

            <!-- Google SSO -->
            <button class="w-full flex items-center justify-center py-3 border border-gray-200 rounded-xl bg-white hover:bg-gray-50 transition-all duration-200 transform hover:scale-[1.02] shadow-sm">
                <svg class="w-5 h-5 mr-3" viewBox="0 0 24 24">
                    <path fill="#4285F4" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/>
                    <path fill="#34A853" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/>
                    <path fill="#FBBC05" d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z"/>
                    <path fill="#EA4335" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z"/>
                </svg>
                <span class="text-gray-700 font-medium" x-text="showSignUp ? 'Sign up with Google' : 'Sign in with Google'"></span>
            </button>

            <!-- Toggle Form -->
            <div class="mt-6 text-center">
                <span class="text-gray-600 text-sm" x-text="showSignUp ? 'Already have an account?' : 'Don\'t have an account?'"></span>
                <button @click="showSignUp = !showSignUp; isLoading = false"
                        class="ml-1 text-blue-600 font-semibold hover:text-blue-700 transition-colors duration-200"
                        x-text="showSignUp ? 'Sign In' : 'Create Account'">
                </button>
            </div>
        </div>
    </div>
</main>
</body>
</html>
