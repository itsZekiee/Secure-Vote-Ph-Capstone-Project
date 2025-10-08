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
        <section class="welcome-section px-6 lg:px-8 py-20 lg:py-32 bg-gradient-to-br from-gray-50 to-white min-h-screen flex items-center">
            <div class="w-full">
                <div class="grid lg:grid-cols-2 gap-16 items-center">
                    <!-- Left Content -->
                    <div class="space-y-8">
                        <h1 class="text-5xl lg:text-6xl xl:text-7xl font-bold text-secondary leading-tight">
                            Secure,
                            <span class="bg-gradient-to-r from-primary to-accent bg-clip-text text-transparent">
                                Digital
                            </span>
                            Voting
                        </h1>
                        <p class="text-xl text-gray-600 leading-relaxed max-w-2xl">
                            Experience the future of democratic participation with cutting-edge security, real-time analytics, and geo-location verification.
                        </p>
                        <div class="flex flex-col sm:flex-row gap-4">
                            <button class="group bg-gradient-to-r from-primary to-primary/90 hover:from-primary/90 hover:to-primary text-white px-8 py-4 rounded-2xl font-semibold transition-all duration-300 transform hover:scale-105 hover:shadow-2xl">
                                Start Voting Now
                                <i class="ri-arrow-right-line ml-2 group-hover:translate-x-1 transition-transform"></i>
                            </button>
                            <button class="bg-white border-2 border-gray-200 hover:border-primary text-gray-700 hover:text-primary px-8 py-4 rounded-2xl font-semibold transition-all duration-300 hover:shadow-lg">
                                Learn More
                            </button>
                        </div>
                    </div>
                    <!-- Right Visual -->
                    <div class="relative">
                        <div class="absolute inset-0 bg-gradient-to-r from-primary/20 to-accent/20 rounded-3xl blur-3xl"></div>
                        <div class="relative bg-white p-8 rounded-3xl shadow-2xl">
                            <img src="{{ asset('asset/Voting-amico.svg') }}" alt="Secure Voting" class="w-full h-auto object-contain">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Geographic Section -->
        <section id="geo" class="px-6 lg:px-8 py-20 bg-gradient-to-br from-gray-50 to-white min-h-screen">
            <div class="w-full">
                <div class="text-center mb-16 max-w-3xl mx-auto">
                    <div class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-primary/10 to-accent/10 rounded-full mb-6">
                        <span class="text-primary text-sm font-medium">🌍 Geo Location Features</span>
                    </div>
                    <h2 class="text-4xl lg:text-5xl font-bold text-secondary mb-6">
                        Powerful Features for Modern Voting
                    </h2>
                    <p class="text-xl text-gray-600 leading-relaxed">
                        Built with the latest technology to ensure secure, transparent, and efficient elections
                    </p>
                </div>
                <div class="grid lg:grid-cols-2 gap-16 items-center">
                    <div class="space-y-8">
                        <div class="bg-white p-8 rounded-2xl shadow-lg border border-gray-100">
                            <div class="flex items-center mb-6">
                                <i class="ri-map-pin-line text-primary text-2xl mr-3"></i>
                                <h3 class="text-2xl font-bold text-secondary">Geo Location Verification</h3>
                            </div>
                            <p class="text-gray-600 text-lg leading-relaxed">
                                Define precise geographic boundaries for your elections. Control where voters can participate with customizable radius settings.
                            </p>
                        </div>
                        <div class="space-y-6">
                            <div class="group bg-gradient-to-r from-indigo-50 to-indigo-100/50 p-8 rounded-2xl border-l-4 border-indigo-500 hover:shadow-lg transition-all duration-300">
                                <div class="flex items-center mb-4">
                                    <i class="ri-settings-3-line text-indigo-600 text-2xl mr-3"></i>
                                    <h4 class="text-xl font-bold bg-gradient-to-r from-secondary to-primary bg-clip-text text-transparent">Custom Voting Boundaries</h4>
                                </div>
                                <p class="text-gray-700">Set custom voting boundaries with flexible radius controls</p>
                            </div>
                            <div class="group bg-gradient-to-r from-orange-50 to-orange-100/50 p-8 rounded-2xl border-l-4 border-orange-500 hover:shadow-lg transition-all duration-300">
                                <div class="flex items-center mb-4">
                                    <i class="ri-radar-line text-orange-600 text-2xl mr-3"></i>
                                    <h4 class="text-xl font-bold bg-gradient-to-r from-secondary to-primary bg-clip-text text-transparent">Real-time Location Monitoring</h4>
                                </div>
                                <p class="text-gray-700">Monitor voter locations in real-time for security purposes</p>
                            </div>
                            <div class="group bg-gradient-to-r from-teal-50 to-teal-100/50 p-8 rounded-2xl border-l-4 border-teal-500 hover:shadow-lg transition-all duration-300">
                                <div class="flex items-center mb-4">
                                    <i class="ri-building-2-line text-teal-600 text-2xl mr-3"></i>
                                    <h4 class="text-xl font-bold bg-gradient-to-r from-secondary to-primary bg-clip-text text-transparent">Multiple Voting Zones</h4>
                                </div>
                                <p class="text-gray-700">Configure multiple voting zones with different parameters</p>
                            </div>
                        </div>
                    </div>
                    <div class="relative">
                        <div class="absolute inset-0 bg-gradient-to-r from-primary/10 to-accent/10 rounded-3xl blur-2xl"></div>
                        <div class="relative">
                            <img src="{{ asset('asset/33633910_map.jpg') }}" alt="Geo Location Verification" class="w-full h-auto object-contain rounded-lg shadow-lg">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Security Section -->
        <section id="security" class="px-6 lg:px-8 py-20 bg-gradient-to-br from-gray-50 to-white min-h-screen">
            <div class="w-full max-w-6xl mx-auto">
                <div class="text-center mb-16">
                    <div class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-blue-500/10 to-blue-600/10 rounded-full mb-6">
                        <span class="text-blue-600 text-sm font-medium">🔒 Security First</span>
                    </div>
                    <h2 class="text-4xl lg:text-5xl font-bold bg-gradient-to-r from-secondary to-primary bg-clip-text text-transparent mb-6">
                        Enterprise-Grade Security
                    </h2>
                </div>
                <div class="grid lg:grid-cols-2 gap-12">
                    <div class="relative">
                        <div class="absolute inset-0 bg-gradient-to-r from-blue-500/10 to-purple-500/10 rounded-3xl blur-2xl"></div>
                        <div class="relative">
                            <img src="{{ asset('asset/concept-illustration-data-security-technology.png') }}" alt="Security Features" class="w-full h-auto object-contain rounded-lg shadow-lg">
                        </div>
                    </div>
                    <div class="space-y-6">
                        <div class="group bg-gradient-to-r from-blue-50 to-blue-100/50 p-8 rounded-2xl border-l-4 border-blue-500 hover:shadow-lg transition-all duration-300">
                            <div class="flex items-center mb-4">
                                <i class="ri-shield-check-line text-blue-600 text-2xl mr-3"></i>
                                <h3 class="text-xl font-bold bg-gradient-to-r from-secondary to-primary bg-clip-text text-transparent">End-to-End Encryption</h3>
                            </div>
                            <p class="text-gray-700">Military-grade AES-256 encryption protects every vote from device to server.</p>
                        </div>
                        <div class="group bg-gradient-to-r from-green-50 to-green-100/50 p-8 rounded-2xl border-l-4 border-green-500 hover:shadow-lg transition-all duration-300">
                            <div class="flex items-center mb-4">
                                <i class="ri-fingerprint-line text-green-600 text-2xl mr-3"></i>
                                <h3 class="text-xl font-bold bg-gradient-to-r from-secondary to-primary bg-clip-text text-transparent">Biometric Authentication</h3>
                            </div>
                            <p class="text-gray-700">Advanced biometric authentication using fingerprint and facial recognition.</p>
                        </div>
                        <div class="group bg-gradient-to-r from-purple-50 to-purple-100/50 p-8 rounded-2xl border-l-4 border-purple-500 hover:shadow-lg transition-all duration-300">
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
        <section id="analytics" class="px-6 lg:px-8 py-20 bg-gradient-to-br from-gray-50 to-white min-h-screen">
            <div class="w-full max-w-6xl mx-auto">
                <div class="text-center mb-16">
                    <div class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-purple-500/10 to-indigo-500/10 rounded-full mb-6">
                        <span class="text-purple-600 text-sm font-medium">📊 Real-time Analytics</span>
                    </div>
                    <h2 class="text-4xl lg:text-5xl font-bold text-secondary mb-6">
                        Comprehensive Data Insights
                    </h2>
                    <p class="text-xl text-gray-600 leading-relaxed">
                        Make informed decisions with powerful analytics and visualization tools
                    </p>
                </div>
                <div class="grid lg:grid-cols-2 gap-16 items-center">
                    <div class="space-y-8">
                        <div class="bg-white p-8 rounded-2xl shadow-lg border border-gray-100">
                            <div class="flex items-center mb-6">
                                <i class="ri-line-chart-line text-purple-600 text-2xl mr-3"></i>
                                <h3 class="text-2xl font-bold text-secondary">Real-time Data Visualization</h3>
                            </div>
                            <p class="text-gray-600 text-lg leading-relaxed">
                                Monitor voting patterns, participation rates, and results in real-time with interactive dashboards and comprehensive reporting tools.
                            </p>
                        </div>
                        <div class="space-y-6">
                            <div class="group bg-gradient-to-r from-emerald-50 to-emerald-100/50 p-8 rounded-2xl border-l-4 border-emerald-500 hover:shadow-lg transition-all duration-300">
                                <div class="flex items-center mb-4">
                                    <i class="ri-time-line text-emerald-600 text-2xl mr-3"></i>
                                    <h4 class="text-xl font-bold bg-gradient-to-r from-secondary to-primary bg-clip-text text-transparent">Real-time Progress Tracking</h4>
                                </div>
                                <p class="text-gray-700">Track voting progress and system status in real-time</p>
                            </div>
                            <div class="group bg-gradient-to-r from-rose-50 to-rose-100/50 p-8 rounded-2xl border-l-4 border-rose-500 hover:shadow-lg transition-all duration-300">
                                <div class="flex items-center mb-4">
                                    <i class="ri-bar-chart-grouped-line text-rose-600 text-2xl mr-3"></i>
                                    <h4 class="text-xl font-bold bg-gradient-to-r from-secondary to-primary bg-clip-text text-transparent">Interactive Data Visualization</h4>
                                </div>
                                <p class="text-gray-700">Explore data through charts, graphs, and interactive maps</p>
                            </div>
                            <div class="group bg-gradient-to-r from-cyan-50 to-cyan-100/50 p-8 rounded-2xl border-l-4 border-cyan-500 hover:shadow-lg transition-all duration-300">
                                <div class="flex items-center mb-4">
                                    <i class="ri-file-chart-line text-cyan-600 text-2xl mr-3"></i>
                                    <h4 class="text-xl font-bold bg-gradient-to-r from-secondary to-primary bg-clip-text text-transparent">Advanced Report Generation</h4>
                                </div>
                                <p class="text-gray-700">Generate detailed reports and export data for analysis</p>
                            </div>
                        </div>
                    </div>
                    <div class="relative">
                        <div class="absolute inset-0 bg-gradient-to-r from-purple-500/10 to-indigo-500/10 rounded-3xl blur-2xl"></div>
                        <div class="relative">
                            <img src="{{ asset('asset/coloured-statistics-design.png') }}" alt="Analytics Dashboard" class="w-full h-auto object-contain rounded-lg shadow-lg">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- FAQ Section -->
        <section id="faqs" class="px-6 lg:px-8 py-20 bg-gradient-to-br from-gray-50 to-white min-h-screen" x-data="{ openFaq: null }">
            <div class="w-full max-w-4xl mx-auto">
                <div class="text-center mb-16">
                    <div class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-gray-100 to-gray-200 rounded-full mb-6">
                        <span class="text-gray-700 text-sm font-medium">❓ Got Questions?</span>
                    </div>
                    <h2 class="text-4xl lg:text-5xl font-bold text-secondary mb-6">
                        Frequently Asked Questions
                    </h2>
                </div>
                <div class="space-y-6">
                    <div class="bg-white border border-gray-200 rounded-2xl overflow-hidden shadow-sm hover:shadow-md transition-all duration-300">
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
                    <div class="bg-white border border-gray-200 rounded-2xl overflow-hidden shadow-sm hover:shadow-md transition-all duration-300">
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
                    <div class="bg-white border border-gray-200 rounded-2xl overflow-hidden shadow-sm hover:shadow-md transition-all duration-300">
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
                    <div class="bg-white border border-gray-200 rounded-2xl overflow-hidden shadow-sm hover:shadow-md transition-all duration-300">
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
        <section id="auth" class="px-6 lg:px-8 py-20 bg-gradient-to-br from-gray-50 to-white min-h-screen" x-data="{ showSignUp: false }">
            <div class="w-full max-w-md mx-auto">
                <div class="text-center mb-16">
                    <div class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-primary/10 to-accent/10 rounded-full mb-6">
                        <span class="text-primary text-sm font-medium">🚀 Get Started</span>
                    </div>
                    <h2 class="text-4xl lg:text-5xl font-bold text-secondary mb-6">
                        Join Secure Vote PH Today
                    </h2>
                    <p class="text-xl text-gray-600 leading-relaxed">
                        Create your account and experience the future of secure voting
                    </p>
                </div>

                @if($errors->any())
                    <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-xl mb-6">
                        <ul class="list-disc list-inside">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if(session('success'))
                    <div class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-xl mb-6">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="bg-white p-8 rounded-2xl shadow-lg border border-gray-100">
                    <!-- Sign In Form -->
                    <div x-show="!showSignUp" x-transition>
                        <h3 class="text-2xl font-bold text-secondary mb-6 text-center">Sign In</h3>

                        <form method="POST" action="{{ route('login') }}" class="space-y-4">
                            @csrf
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                                <input type="email" name="email" value="{{ old('email') }}" required
                                       placeholder="Enter your email"
                                       class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-primary focus:border-transparent transition-all duration-300">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                                <input type="password" name="password" required
                                       placeholder="Enter your password"
                                       class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-primary focus:border-transparent transition-all duration-300">
                            </div>
                            <button type="submit" class="w-full bg-gradient-to-r from-primary to-primary/90 hover:from-primary/90 hover:to-primary text-white px-6 py-4 rounded-xl font-semibold transition-all duration-300 transform hover:scale-105">
                                Sign In
                            </button>
                        </form>

                        <p class="text-center text-sm text-gray-500 mt-6">
                            Don't have an account?
                            <button @click="showSignUp = true" class="text-primary hover:underline font-medium">Sign up</button>
                        </p>
                    </div>

                    <!-- Sign Up Form -->
                    <div x-show="showSignUp" x-transition>
                        <h3 class="text-2xl font-bold text-secondary mb-6 text-center">Sign Up</h3>

                        <form method="POST" action="{{ route('register') }}" class="space-y-4">
                            @csrf
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Full Name</label>
                                <input type="text" name="name" value="{{ old('name') }}" required
                                       placeholder="Enter your full name"
                                       class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-primary focus:border-transparent transition-all duration-300">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                                <input type="email" name="email" value="{{ old('email') }}" required
                                       placeholder="Enter your email"
                                       class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-primary focus:border-transparent transition-all duration-300">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                                <input type="password" name="password" required
                                       placeholder="Create a password"
                                       class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-primary focus:border-transparent transition-all duration-300">
                            </div>
                            <button type="submit" class="w-full bg-gradient-to-r from-accent to-accent/90 hover:from-accent/90 hover:to-accent text-white px-6 py-4 rounded-xl font-semibold transition-all duration-300 transform hover:scale-105">
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
