<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Secure Vote Ph</title>

    <!-- Google Fonts: Inter & Plus Jakarta Sans -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Remix Icon CSS -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" rel="stylesheet">
    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    @vite(['resources/sass/app.scss'])

    <!-- Alpine.js -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        'sans': ['Plus Jakarta Sans', 'Inter', 'sans-serif'],
                    },
                    colors: {
                        primary: '#003153',
                        secondary: '#1B1B1B',
                        accent: '#00D4AA',
                    }
                }
            }
        }
    </script>
</head>

<body class="font-sans antialiased bg-gradient-to-br from-gray-50 to-white min-h-screen">

@include('layout.partials.header')

<!-- Main Content -->
<main>
    <div class="max-w-7xl mx-auto">

        <!-- Welcome Section -->
        <section class="welcome-section px-6 lg:px-8 py-20 lg:py-32 bg-gradient-to-br from-gray-50 to-white min-h-screen fade-in flex items-center">
            <div class="w-full">
                <div class="grid lg:grid-cols-2 gap-16 items-center">
                    <!-- Left Content -->
                    <div class="space-y-8">
                        <!-- Main Heading -->
                        <h1 class="text-5xl lg:text-6xl xl:text-7xl font-bold text-secondary leading-tight slide-in-left animate-delay-100">
                            Secure,
                            <span class="bg-gradient-to-r from-primary to-accent bg-clip-text text-transparent">
                        Digital
                    </span>
                            Voting
                        </h1>

                        <!-- Description -->
                        <p class="text-xl text-gray-600 leading-relaxed max-w-2xl slide-in-left animate-delay-200">
                            Experience the future of democratic participation with cutting-edge security, real-time analytics, and geo-location verification.
                        </p>

                        <!-- CTA Buttons -->
                        <div class="flex flex-col sm:flex-row gap-4 slide-in-left animate-delay-300">
                            <button class="group bg-gradient-to-r from-primary to-primary/90 hover:from-primary/90 hover:to-primary text-white px-8 py-4 rounded-2xl font-semibold transition-all duration-300 transform hover:scale-105 hover:shadow-2xl">
                                Start Voting Now
                                <i class="ri-arrow-right-line ml-2 group-hover:translate-x-1 transition-transform"></i>
                            </button>
                            <button class="bg-white border-2 border-gray-200 hover:border-primary text-gray-700 hover:text-primary px-8 py-4 rounded-2xl font-semibold transition-all duration-300 hover:shadow-lg">
                                Learn More
                            </button>
                        </div>

                        <!-- Stats -->
                        <div class="grid grid-cols-3 gap-8 pt-8 slide-in-left animate-delay-400">
                            <div class="text-center">
                                <div class="text-3xl font-bold text-primary">500K+</div>
                                <div class="text-gray-500 text-sm">Active Users</div>
                            </div>
                            <div class="text-center">
                                <div class="text-3xl font-bold text-primary">99.9%</div>
                                <div class="text-gray-500 text-sm">Uptime</div>
                            </div>
                            <div class="text-center">
                                <div class="text-3xl font-bold text-primary">256-bit</div>
                                <div class="text-gray-500 text-sm">Encryption</div>
                            </div>
                        </div>
                    </div>

                    <!-- Right Visual -->
                    <div class="relative slide-in-right animate-delay-200">
                        <div class="absolute inset-0 bg-gradient-to-r from-primary/20 to-accent/20 rounded-3xl blur-3xl"></div>
                        <div class="relative bg-white p-8 rounded-3xl shadow-2xl">
                            <img src="{{ asset('asset/Voting-amico.svg') }}" alt="Secure Voting" class="w-full h-auto object-contain">
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <!-- Geographic Section -->
        <section id="geo" class="px-6 lg:px-8 py-20 bg-gradient-to-br from-gray-50 to-white min-h-screen fade-in">
            <div class="w-full">
                <!-- Section Header -->
                <div class="text-center mb-16 max-w-3xl mx-auto">
                    <div class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-primary/10 to-accent/10 rounded-full mb-6">
                        <span class="text-primary text-sm font-medium">🌍 Geo Location Features</span>
                    </div>
                    <h2 class="text-4xl lg:text-5xl font-bold text-secondary mb-6 slide-in-left">
                        Powerful Features for Modern Voting
                    </h2>
                    <p class="text-xl text-gray-600 leading-relaxed slide-in-left animate-delay-100">
                        Built with the latest technology to ensure secure, transparent, and efficient elections
                    </p>
                </div>

                <div class="grid lg:grid-cols-2 gap-16 items-center">
                    <!-- Left Content -->
                    <div class="space-y-8 slide-in-left animate-delay-200">
                        <!-- Main Feature -->
                        <div class="bg-white p-8 rounded-2xl shadow-lg border border-gray-100">
                            <div class="flex items-center mb-6">
                                <i class="ri-map-pin-line text-primary text-2xl mr-3"></i>
                                <h3 class="text-2xl font-bold text-secondary">Geo Location Verification</h3>
                            </div>
                            <p class="text-gray-600 text-lg leading-relaxed">
                                Define precise geographic boundaries for your elections. Control where voters can participate with customizable radius settings.
                            </p>
                        </div>

                        <!-- Features Grid -->
                        <div class="grid gap-6">
                            <div class="bg-white p-6 rounded-xl border border-gray-100 hover:shadow-md transition-all duration-300 fade-in animate-delay-300">
                                <h4 class="text-lg font-semibold text-secondary mb-2 flex items-center">
                                    <i class="ri-settings-3-line text-primary mr-2"></i>Custom Radius Control
                                </h4>
                                <p class="text-gray-600">Set custom voting boundaries with flexible radius controls</p>
                            </div>

                            <div class="bg-white p-6 rounded-xl border border-gray-100 hover:shadow-md transition-all duration-300 fade-in animate-delay-400">
                                <h4 class="text-lg font-semibold text-secondary mb-2 flex items-center">
                                    <i class="ri-radar-line text-primary mr-2"></i>Real-time Location Tracking
                                </h4>
                                <p class="text-gray-600">Monitor voter locations in real-time for security purposes</p>
                            </div>

                            <div class="bg-white p-6 rounded-xl border border-gray-100 hover:shadow-md transition-all duration-300 fade-in animate-delay-500">
                                <h4 class="text-lg font-semibold text-secondary mb-2 flex items-center">
                                    <i class="ri-map-2-line text-primary mr-2"></i>Flexible Zone Configuration
                                </h4>
                                <p class="text-gray-600">Configure multiple voting zones with different parameters</p>
                            </div>
                        </div>
                    </div>

                    <!-- Right Image -->
                    <div class="relative slide-in-right animate-delay-200">
                        <div class="absolute inset-0 bg-gradient-to-r from-primary/10 to-accent/10 rounded-3xl blur-2xl"></div>
                        <div class="relative">
                            <img src="{{ asset('asset/33633910_map.jpg') }}" alt="Geo Location Verification" class="w-full h-auto object-contain rounded-lg shadow-lg">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Security Section -->
        <section id="security" class="px-6 lg:px-8 py-20 bg-gradient-to-br from-gray-50 to-white min-h-screen fade-in">
            <div class="w-full max-w-6xl mx-auto">
                <!-- Section Header -->
                <div class="text-center mb-16">
                    <div class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-blue-500/10 to-blue-600/10 rounded-full mb-6">
                        <span class="text-blue-600 text-sm font-medium">🔒 Security First</span>
                    </div>
                    <h2 class="text-4xl lg:text-5xl font-bold bg-gradient-to-r from-secondary to-primary bg-clip-text text-transparent mb-6 slide-in-left">
                        Enterprise-Grade Security
                    </h2>
                </div>

                <div class="grid lg:grid-cols-2 gap-12">
                    <!-- Left Image -->
                    <div class="relative slide-in-left animate-delay-200">
                        <div class="absolute inset-0 bg-gradient-to-r from-blue-500/10 to-purple-500/10 rounded-3xl blur-2xl"></div>
                        <div class="relative">
                            <img src="{{ asset('asset/concept-illustration-data-security-technology.png') }}" alt="Security Features" class="w-full h-auto object-contain rounded-lg shadow-lg">
                        </div>
                    </div>

                    <!-- Right Security Features -->
                    <div class="space-y-6">
                        <div class="group bg-gradient-to-r from-blue-50 to-blue-100/50 p-8 rounded-2xl border-l-4 border-blue-500 hover:shadow-lg transition-all duration-300 slide-in-right animate-delay-200">
                            <div class="flex items-center mb-4">
                                <i class="ri-shield-check-line text-blue-600 text-2xl mr-3"></i>
                                <h3 class="text-xl font-bold bg-gradient-to-r from-secondary to-primary bg-clip-text text-transparent">End-to-End Encryption</h3>
                            </div>
                            <p class="text-gray-700">Military-grade AES-256 encryption protects every vote from device to server.</p>
                        </div>

                        <div class="group bg-gradient-to-r from-green-50 to-green-100/50 p-8 rounded-2xl border-l-4 border-green-500 hover:shadow-lg transition-all duration-300 slide-in-right animate-delay-300">
                            <div class="flex items-center mb-4">
                                <i class="ri-fingerprint-line text-green-600 text-2xl mr-3"></i>
                                <h3 class="text-xl font-bold bg-gradient-to-r from-secondary to-primary bg-clip-text text-transparent">Biometric Authentication</h3>
                            </div>
                            <p class="text-gray-700">Advanced biometric authentication using fingerprint and facial recognition.</p>
                        </div>

                        <div class="group bg-gradient-to-r from-purple-50 to-purple-100/50 p-8 rounded-2xl border-l-4 border-purple-500 hover:shadow-lg transition-all duration-300 slide-in-right animate-delay-400">
                            <div class="flex items-center mb-4">
                                <i class="ri-links-line text-purple-600 text-2xl mr-3"></i>
                                <h3 class="text-xl font-bold bg-gradient-to-r from-secondary to-primary bg-clip-text text-transparent">Blockchain Technology</h3>
                            </div>
                            <p class="text-gray-700">Immutable vote recording using distributed ledger for complete transparency.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Analytics Section -->
        <section id="analytics" class="px-6 lg:px-8 py-20 bg-gradient-to-br from-gray-50 to-white min-h-screen fade-in">
            <div class="w-full max-w-6xl mx-auto">
                <!-- Section Header -->
                <div class="text-center mb-16">
                    <div class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-purple-500/10 to-indigo-500/10 rounded-full mb-6">
                        <span class="text-purple-600 text-sm font-medium">📊 Real-time Analytics</span>
                    </div>
                    <h2 class="text-4xl lg:text-5xl font-bold text-secondary mb-6 slide-in-left">
                        Comprehensive Data Insights
                    </h2>
                    <p class="text-xl text-gray-600 leading-relaxed slide-in-left animate-delay-100">
                        Make informed decisions with powerful analytics and visualization tools
                    </p>
                </div>

                <div class="grid lg:grid-cols-2 gap-16 items-center">
                    <!-- Left Content -->
                    <div class="space-y-8 slide-in-left animate-delay-200">
                        <div class="bg-white p-8 rounded-2xl shadow-lg border border-gray-100">
                            <div class="flex items-center mb-6">
                                <i class="ri-line-chart-line text-purple-600 text-2xl mr-3"></i>
                                <h3 class="text-2xl font-bold text-secondary">Real-time Data Visualization</h3>
                            </div>
                            <p class="text-gray-600 text-lg leading-relaxed">
                                Monitor voting patterns, participation rates, and results in real-time with interactive dashboards and comprehensive reporting tools.
                            </p>
                        </div>

                        <!-- Analytics Features -->
                        <div class="grid gap-6">
                            <div class="bg-white p-6 rounded-xl border border-gray-100 hover:shadow-md transition-all duration-300 fade-in animate-delay-300">
                                <h4 class="text-lg font-semibold text-secondary mb-2 flex items-center">
                                    <i class="ri-eye-line text-purple-600 mr-2"></i>Live Monitoring
                                </h4>
                                <p class="text-gray-600">Track voting progress and system status in real-time</p>
                            </div>

                            <div class="bg-white p-6 rounded-xl border border-gray-100 hover:shadow-md transition-all duration-300 fade-in animate-delay-400">
                                <h4 class="text-lg font-semibold text-secondary mb-2 flex items-center">
                                    <i class="ri-pie-chart-line text-purple-600 mr-2"></i>Interactive Visualizations
                                </h4>
                                <p class="text-gray-600">Explore data through charts, graphs, and interactive maps</p>
                            </div>

                            <div class="bg-white p-6 rounded-xl border border-gray-100 hover:shadow-md transition-all duration-300 fade-in animate-delay-500">
                                <h4 class="text-lg font-semibold text-secondary mb-2 flex items-center">
                                    <i class="ri-download-line text-purple-600 mr-2"></i>Export & Reports
                                </h4>
                                <p class="text-gray-600">Generate detailed reports and export data for analysis</p>
                            </div>
                        </div>
                    </div>

                    <!-- Right Image -->
                    <div class="relative slide-in-right animate-delay-200">
                        <div class="absolute inset-0 bg-gradient-to-r from-purple-500/10 to-indigo-500/10 rounded-3xl blur-2xl"></div>
                        <div class="relative">
                            <img src="{{ asset('asset/coloured-statistics-design.png') }}" alt="Analytics Dashboard" class="w-full h-auto object-contain rounded-lg shadow-lg">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- FAQ Section -->
        <section id="faqs" class="px-6 lg:px-8 py-20 bg-gradient-to-br from-gray-50 to-white min-h-screen fade-in" x-data="{ openFaq: null }">
            <div class="w-full max-w-4xl mx-auto">
                <!-- Section Header -->
                <div class="text-center mb-16">
                    <div class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-gray-100 to-gray-200 rounded-full mb-6">
                        <span class="text-gray-700 text-sm font-medium">❓ Got Questions?</span>
                    </div>
                    <h2 class="text-4xl lg:text-5xl font-bold text-secondary mb-6 slide-in-left">
                        Frequently Asked Questions
                    </h2>
                </div>

                <!-- FAQ Items -->
                <div class="space-y-6">
                    <div class="bg-white border border-gray-200 rounded-2xl overflow-hidden shadow-sm hover:shadow-md transition-all duration-300 fade-in animate-delay-200">
                        <button @click="openFaq = openFaq === 1 ? null : 1"
                                class="w-full text-left p-8 flex justify-between items-center hover:bg-gray-50 transition-all duration-300">
                            <span class="text-lg font-semibold text-secondary">How secure is the voting process?</span>
                            <div class="w-8 h-8 rounded-full bg-gray-100 flex items-center justify-center">
                                <i class="ri-arrow-down-s-line transition-transform duration-300 text-gray-600" :class="openFaq === 1 ? 'rotate-180' : ''"></i>
                            </div>
                        </button>
                        <div x-show="openFaq === 1" x-collapse class="px-8 pb-8">
                            <p class="text-gray-600 leading-relaxed">Our platform uses military-grade encryption, biometric authentication, and blockchain technology to ensure the highest level of security for all votes cast. Every vote is encrypted end-to-end and recorded immutably.</p>
                        </div>
                    </div>

                    <div class="bg-white border border-gray-200 rounded-2xl overflow-hidden shadow-sm hover:shadow-md transition-all duration-300 fade-in animate-delay-300">
                        <button @click="openFaq = openFaq === 2 ? null : 2"
                                class="w-full text-left p-8 flex justify-between items-center hover:bg-gray-50 transition-all duration-300">
                            <span class="text-lg font-semibold text-secondary">Can I verify my vote was counted?</span>
                            <div class="w-8 h-8 rounded-full bg-gray-100 flex items-center justify-center">
                                <i class="ri-arrow-down-s-line transition-transform duration-300 text-gray-600" :class="openFaq === 2 ? 'rotate-180' : ''"></i>
                            </div>
                        </button>
                        <div x-show="openFaq === 2" x-collapse class="px-8 pb-8">
                            <p class="text-gray-600 leading-relaxed">Yes, you receive a unique receipt code that allows you to verify your vote was properly recorded without compromising ballot secrecy. Our transparent system ensures complete accountability.</p>
                        </div>
                    </div>

                    <div class="bg-white border border-gray-200 rounded-2xl overflow-hidden shadow-sm hover:shadow-md transition-all duration-300 fade-in animate-delay-400">
                        <button @click="openFaq = openFaq === 3 ? null : 3"
                                class="w-full text-left p-8 flex justify-between items-center hover:bg-gray-50 transition-all duration-300">
                            <span class="text-lg font-semibold text-secondary">What devices are supported?</span>
                            <div class="w-8 h-8 rounded-full bg-gray-100 flex items-center justify-center">
                                <i class="ri-arrow-down-s-line transition-transform duration-300 text-gray-600" :class="openFaq === 3 ? 'rotate-180' : ''"></i>
                            </div>
                        </button>
                        <div x-show="openFaq === 3" x-collapse class="px-8 pb-8">
                            <p class="text-gray-600 leading-relaxed">Secure Vote PH works seamlessly on smartphones, tablets, and computers with modern web browsers. Native mobile apps are available for both iOS and Android platforms.</p>
                        </div>
                    </div>

                    <div class="bg-white border border-gray-200 rounded-2xl overflow-hidden shadow-sm hover:shadow-md transition-all duration-300 fade-in animate-delay-500">
                        <button @click="openFaq = openFaq === 4 ? null : 4"
                                class="w-full text-left p-8 flex justify-between items-center hover:bg-gray-50 transition-all duration-300">
                            <span class="text-lg font-semibold text-secondary">How do I register to vote?</span>
                            <div class="w-8 h-8 rounded-full bg-gray-100 flex items-center justify-center">
                                <i class="ri-arrow-down-s-line transition-transform duration-300 text-gray-600" :class="openFaq === 4 ? 'rotate-180' : ''"></i>
                            </div>
                        </button>
                        <div x-show="openFaq === 4" x-collapse class="px-8 pb-8">
                            <p class="text-gray-600 leading-relaxed">Registration requires valid government ID, proof of address, and biometric enrollment at authorized registration centers or through our mobile units. The process is simple and secure.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Sign In/Up Section -->
        <section id="auth" class="px-6 lg:px-8 py-20 bg-gradient-to-br from-gray-50 to-white min-h-screen fade-in" x-data="{ showSignUp: false }">
            <div class="w-full max-w-md mx-auto">
                <!-- Section Header -->
                <div class="text-center mb-16">
                    <div class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-primary/10 to-accent/10 rounded-full mb-6">
                        <span class="text-primary text-sm font-medium">🚀 Get Started</span>
                    </div>
                    <h2 class="text-4xl lg:text-5xl font-bold text-secondary mb-6 slide-in-left">
                        Join Secure Vote PH Today
                    </h2>
                    <p class="text-xl text-gray-600 leading-relaxed slide-in-left animate-delay-100">
                        Create your account and experience the future of secure voting
                    </p>
                </div>

                <!-- Auth Card -->
                <div class="bg-white p-8 rounded-2xl shadow-lg border border-gray-100 slide-in-up animate-delay-200">
                    <!-- Sign In Form -->
                    <div x-show="!showSignUp" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform scale-95" x-transition:enter-end="opacity-100 transform scale-100" x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 transform scale-100" x-transition:leave-end="opacity-0 transform scale-95">
                        <h3 class="text-2xl font-bold text-secondary mb-6 text-center">Sign In</h3>

                        <!-- Google SSO Button -->
                        <button class="w-full bg-white border-2 border-gray-200 hover:border-gray-300 text-gray-700 px-6 py-4 rounded-xl font-semibold transition-all duration-300 hover:shadow-md mb-6 flex items-center justify-center gap-3">
                            <svg class="w-5 h-5" viewBox="0 0 24 24">
                                <path fill="#4285F4" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/>
                                <path fill="#34A853" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/>
                                <path fill="#FBBC05" d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z"/>
                                <path fill="#EA4335" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z"/>
                            </svg>
                            Continue with Google
                        </button>

                        <div class="relative mb-6">
                            <div class="absolute inset-0 flex items-center">
                                <div class="w-full border-t border-gray-200"></div>
                            </div>
                            <div class="relative flex justify-center text-sm">
                                <span class="px-4 bg-white text-gray-500">or sign in with email</span>
                            </div>
                        </div>

                        <!-- Email Form -->
                        <form class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                                <input type="email" placeholder="Enter your email" class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-primary focus:border-transparent transition-all duration-300">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                                <input type="password" placeholder="Enter your password" class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-primary focus:border-transparent transition-all duration-300">
                            </div>
                            <button class="w-full bg-gradient-to-r from-primary to-primary/90 hover:from-primary/90 hover:to-primary text-white px-6 py-4 rounded-xl font-semibold transition-all duration-300 transform hover:scale-105">
                                Sign In
                            </button>
                        </form>

                        <p class="text-center text-sm text-gray-500 mt-6">
                            Don't have an account?
                            <button @click="showSignUp = true" class="text-primary hover:underline font-medium">Sign up</button>
                        </p>
                    </div>

                    <!-- Sign Up Form -->
                    <div x-show="showSignUp" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform scale-95" x-transition:enter-end="opacity-100 transform scale-100" x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 transform scale-100" x-transition:leave-end="opacity-0 transform scale-95">
                        <h3 class="text-2xl font-bold text-secondary mb-6 text-center">Sign Up</h3>

                        <!-- Google SSO Button -->
                        <button class="w-full bg-white border-2 border-gray-200 hover:border-gray-300 text-gray-700 px-6 py-4 rounded-xl font-semibold transition-all duration-300 hover:shadow-md mb-6 flex items-center justify-center gap-3">
                            <svg class="w-5 h-5" viewBox="0 0 24 24">
                                <path fill="#4285F4" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/>
                                <path fill="#34A853" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/>
                                <path fill="#FBBC05" d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z"/>
                                <path fill="#EA4335" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z"/>
                            </svg>
                            Continue with Google
                        </button>

                        <div class="relative mb-6">
                            <div class="absolute inset-0 flex items-center">
                                <div class="w-full border-t border-gray-200"></div>
                            </div>
                            <div class="relative flex justify-center text-sm">
                                <span class="px-4 bg-white text-gray-500">or create account</span>
                            </div>
                        </div>

                        <!-- Registration Form -->
                        <form class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Full Name</label>
                                <input type="text" placeholder="Enter your full name" class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-primary focus:border-transparent transition-all duration-300">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                                <input type="email" placeholder="Enter your email" class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-primary focus:border-transparent transition-all duration-300">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                                <input type="password" placeholder="Create a password" class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-primary focus:border-transparent transition-all duration-300">
                            </div>
                            <button class="w-full bg-gradient-to-r from-accent to-accent/90 hover:from-accent/90 hover:to-accent text-white px-6 py-4 rounded-xl font-semibold transition-all duration-300 transform hover:scale-105">
                                Create Account
                            </button>
                        </form>

                        <p class="text-center text-sm text-gray-500 mt-6">
                            Already have an account?
                            <button @click="showSignUp = false" class="text-primary hover:underline font-medium">Sign in</button>
                        </p>
                    </div>
                </div>
            </div>
        </section>
    </div>
    @include('layout.partials.footer')
</main>
</body>
</html>
