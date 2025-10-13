<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Secure Vote Ph - Create Voting Form</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        'inter': ['Inter', 'sans-serif'],
                    },
                    colors: {
                        primary: {
                            50: '#eff6ff',
                            100: '#dbeafe',
                            500: '#3b82f6',
                            600: '#2563eb',
                            700: '#1d4ed8',
                        }
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-gradient-to-br from-slate-50 to-slate-100 font-inter min-h-screen">
<div x-data="{ collapsed: false }" class="flex min-h-screen">
    @include('layout.partials.sidebar')
    <main class="flex-grow p-4 md:p-8">
        <!-- Header -->
        <div class="flex items-center mb-8">
            <button @click="collapsed = !collapsed" class="p-3 rounded-xl bg-white shadow-sm hover:shadow-md transition-shadow mr-4 border border-slate-200">
                <i class="ri-menu-line text-xl text-slate-600"></i>
            </button>
            <div>
                <h1 class="text-3xl md:text-4xl font-bold text-slate-800 mb-1">Create Voting Form</h1>
                <p class="text-slate-500">Design and configure a new voting form for elections</p>
            </div>
        </div>

        <div x-data="formWizard()" class="max-w-4xl mx-auto">
            <!-- Progress Indicator -->
            <div class="mb-8">
                <div class="flex items-center justify-between mb-4">
                    <template x-for="i in 3" :key="i">
                        <div class="flex items-center" :class="i < 3 ? 'flex-1' : ''">
                            <div class="relative">
                                <div class="w-10 h-10 rounded-full flex items-center justify-center text-sm font-semibold transition-all duration-300"
                                     :class="step >= i ? 'bg-primary-500 text-white shadow-lg' : 'bg-slate-200 text-slate-500'">
                                    <span x-text="i"></span>
                                </div>
                                <div class="absolute -bottom-8 left-1/2 transform -translate-x-1/2 text-xs font-medium whitespace-nowrap"
                                     :class="step >= i ? 'text-primary-600' : 'text-slate-400'"
                                     x-text="['Basic Info', 'Positions', 'Share Form'][i-1]">
                                </div>
                            </div>
                            <div x-show="i < 3" class="flex-1 h-0.5 mx-4 transition-colors duration-300"
                                 :class="step > i ? 'bg-primary-500' : 'bg-slate-200'">
                            </div>
                        </div>
                    </template>
                </div>
            </div>

            <!-- Panel 1: Basic Information -->
            <form x-show="step === 1" @submit.prevent="nextStep"
                  x-transition:enter="transition ease-out duration-300"
                  x-transition:enter-start="opacity-0 transform translate-x-8"
                  x-transition:enter-end="opacity-100 transform translate-x-0"
                  class="bg-white p-6 md:p-8 rounded-2xl shadow-xl border border-slate-200">

                <div class="flex items-center mb-6">
                    <div class="w-12 h-12 bg-primary-100 rounded-xl flex items-center justify-center mr-4">
                        <i class="ri-file-text-line text-xl text-primary-600"></i>
                    </div>
                    <div>
                        <h2 class="text-2xl font-semibold text-slate-800">Basic Information</h2>
                        <p class="text-slate-500 text-sm">Set up the foundation of your voting form</p>
                    </div>
                </div>

                <div class="grid gap-6">
                    <div class="grid md:grid-cols-2 gap-6">
                        <div class="space-y-2">
                            <label class="block text-sm font-semibold text-slate-700">Form Title <span class="text-red-500">*</span></label>
                            <input type="text" x-model="form.title"
                                   class="w-full px-4 py-3 border border-slate-300 rounded-xl focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-colors"
                                   placeholder="e.g., Student Government Election 2024"
                                   maxlength="100" required>
                        </div>
                        <div class="space-y-2">
                            <label class="block text-sm font-semibold text-slate-700">Organization Name <span class="text-red-500">*</span></label>
                            <input type="text" x-model="form.organization"
                                   class="w-full px-4 py-3 border border-slate-300 rounded-xl focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-colors"
                                   placeholder="e.g., University of the Philippines"
                                   maxlength="100" required>
                        </div>
                    </div>

                    <div class="space-y-2">
                        <label class="block text-sm font-semibold text-slate-700">Description <span class="text-red-500">*</span></label>
                        <textarea x-model="form.description"
                                  class="w-full px-4 py-3 border border-slate-300 rounded-xl focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-colors resize-none"
                                  rows="4"
                                  placeholder="Describe the purpose and context of this voting form..."
                                  maxlength="800" required></textarea>
                        <div class="flex justify-between text-xs text-slate-500">
                            <span>Provide a clear description for voters</span>
                            <span x-text="`${form.description.length}/800`"></span>
                        </div>
                    </div>

                    <div class="space-y-2">
                        <label class="block text-sm font-semibold text-slate-700">Instructions for Voters</label>
                        <textarea x-model="form.instructions"
                                  class="w-full px-4 py-3 border border-slate-300 rounded-xl focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-colors resize-none"
                                  rows="3"
                                  placeholder="Optional: Add specific voting instructions or guidelines..."
                                  maxlength="400"></textarea>
                        <div class="text-xs text-slate-500 text-right">
                            <span x-text="`${form.instructions.length}/400`"></span>
                        </div>
                    </div>

                    <div class="grid md:grid-cols-2 gap-6">
                        <div class="space-y-2">
                            <label class="block text-sm font-semibold text-slate-700">Voting Start <span class="text-red-500">*</span></label>
                            <input type="datetime-local" x-model="form.start"
                                   class="w-full px-4 py-3 border border-slate-300 rounded-xl focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-colors"
                                   required>
                        </div>
                        <div class="space-y-2">
                            <label class="block text-sm font-semibold text-slate-700">Voting End <span class="text-red-500">*</span></label>
                            <input type="datetime-local" x-model="form.end"
                                   class="w-full px-4 py-3 border border-slate-300 rounded-xl focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-colors"
                                   required :min="form.start">
                        </div>
                    </div>
                </div>

                <div class="flex justify-end mt-8">
                    <button type="submit"
                            class="px-8 py-3 bg-primary-600 hover:bg-primary-700 text-white font-semibold rounded-xl shadow-lg hover:shadow-xl transition-all duration-200 flex items-center gap-2">
                        Continue
                        <i class="ri-arrow-right-line"></i>
                    </button>
                </div>
            </form>

            <!-- Panel 2: Positions & Candidates -->
            <form x-show="step === 2" @submit.prevent="createForm"
                  x-transition:enter="transition ease-out duration-300"
                  x-transition:enter-start="opacity-0 transform translate-x-8"
                  x-transition:enter-end="opacity-100 transform translate-x-0"
                  class="bg-white p-6 md:p-8 rounded-2xl shadow-xl border border-slate-200">

                <div class="flex items-center mb-6">
                    <div class="w-12 h-12 bg-primary-100 rounded-xl flex items-center justify-center mr-4">
                        <i class="ri-group-line text-xl text-primary-600"></i>
                    </div>
                    <div>
                        <h2 class="text-2xl font-semibold text-slate-800">Positions & Candidates</h2>
                        <p class="text-slate-500 text-sm">Define the positions and their candidates</p>
                    </div>
                </div>

                <div class="space-y-6">
                    <template x-for="(position, i) in positions" :key="i">
                        <div class="border border-slate-200 rounded-xl p-6 bg-gradient-to-r from-slate-50 to-white relative">
                            <button type="button"
                                    class="absolute top-4 right-4 w-8 h-8 bg-red-100 hover:bg-red-200 text-red-600 rounded-lg flex items-center justify-center transition-colors"
                                    @click="removePosition(i)"
                                    x-show="positions.length > 1">
                                <i class="ri-delete-bin-line text-sm"></i>
                            </button>

                            <div class="space-y-4">
                                <div>
                                    <label class="block text-sm font-semibold text-slate-700 mb-2">
                                        Position Name <span class="text-red-500">*</span>
                                    </label>
                                    <input type="text" x-model="position.name"
                                           class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-colors"
                                           placeholder="e.g., President, Vice President"
                                           maxlength="60" required>
                                </div>

                                <div>
                                    <label class="block text-sm font-semibold text-slate-700 mb-3">
                                        Candidates <span class="text-red-500">*</span>
                                    </label>
                                    <div class="space-y-3">
                                        <template x-for="(candidate, j) in position.candidates" :key="j">
                                            <div class="flex items-center gap-3">
                                                <div class="flex-1 relative">
                                                    <input type="text" x-model="position.candidates[j]"
                                                           class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-colors"
                                                           :placeholder="`Candidate ${j + 1} name`"
                                                           maxlength="60" required>
                                                </div>
                                                <button type="button"
                                                        class="w-10 h-10 bg-red-100 hover:bg-red-200 text-red-600 rounded-lg flex items-center justify-center transition-colors"
                                                        @click="removeCandidate(i, j)"
                                                        x-show="position.candidates.length > 1">
                                                    <i class="ri-close-line text-sm"></i>
                                                </button>
                                            </div>
                                        </template>
                                    </div>
                                    <button type="button"
                                            class="mt-3 px-4 py-2 text-primary-600 hover:text-primary-700 hover:bg-primary-50 rounded-lg transition-colors flex items-center gap-2 text-sm font-medium"
                                            @click="addCandidate(i)">
                                        <i class="ri-add-line"></i>
                                        Add Candidate
                                    </button>
                                </div>
                            </div>
                        </div>
                    </template>

                    <button type="button"
                            class="w-full py-4 border-2 border-dashed border-slate-300 hover:border-primary-400 hover:bg-primary-50 rounded-xl text-slate-600 hover:text-primary-600 transition-colors flex items-center justify-center gap-2 font-medium"
                            @click="addPosition()">
                        <i class="ri-add-line text-xl"></i>
                        Add New Position
                    </button>
                </div>

                <div class="flex justify-between mt-8">
                    <button type="button"
                            class="px-8 py-3 bg-slate-200 hover:bg-slate-300 text-slate-700 font-semibold rounded-xl transition-colors flex items-center gap-2"
                            @click="step = 1">
                        <i class="ri-arrow-left-line"></i>
                        Back
                    </button>
                    <button type="submit" :disabled="isLoading"
                            class="px-8 py-3 bg-green-600 hover:bg-green-700 text-white font-semibold rounded-xl shadow-lg hover:shadow-xl transition-all duration-200 flex items-center gap-2 disabled:opacity-50">
                        <span x-show="!isLoading">Create Form</span>
                        <span x-show="isLoading">Creating...</span>
                        <i class="ri-check-line" x-show="!isLoading"></i>
                        <i class="ri-loader-line animate-spin" x-show="isLoading"></i>
                    </button>
                </div>
            </form>

            <!-- Panel 3: Share Form -->
            <div x-show="step === 3"
                 x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="opacity-0 transform translate-x-8"
                 x-transition:enter-end="opacity-100 transform translate-x-0"
                 class="bg-white p-6 md:p-8 rounded-2xl shadow-xl border border-slate-200">

                <div class="text-center mb-8">
                    <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="ri-check-line text-2xl text-green-600"></i>
                    </div>
                    <h2 class="text-2xl font-semibold text-slate-800 mb-2">Form Created Successfully!</h2>
                    <p class="text-slate-500">Share the link or QR code with voters to start collecting responses</p>
                </div>

                <div class="space-y-6">
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-3">Share Link</label>
                        <div class="flex gap-3">
                            <input type="text"
                                   class="flex-1 px-4 py-3 border border-slate-300 rounded-xl bg-slate-50 text-slate-600"
                                   :value="shareLink" readonly>
                            <button type="button"
                                    class="px-6 py-3 bg-primary-600 hover:bg-primary-700 text-white font-semibold rounded-xl transition-colors flex items-center gap-2"
                                    @click="copyLink">
                                <i class="ri-file-copy-line"></i>
                                Copy
                            </button>
                        </div>
                    </div>

                    <div class="grid md:grid-cols-2 gap-6">
                        <div class="text-center">
                            <label class="block text-sm font-semibold text-slate-700 mb-3">QR Code</label>
                            <div class="bg-gradient-to-br from-slate-100 to-slate-200 p-8 rounded-xl border-2 border-dashed border-slate-300">
                                <div class="w-32 h-32 bg-white rounded-lg shadow-inner mx-auto flex items-center justify-center">
                                    <span class="text-slate-400 text-xs">QR Code</span>
                                </div>
                            </div>
                            <button type="button"
                                    class="mt-4 px-4 py-2 bg-slate-200 hover:bg-slate-300 text-slate-700 font-medium rounded-lg transition-colors flex items-center gap-2 mx-auto">
                                <i class="ri-download-line"></i>
                                Download QR
                            </button>
                        </div>

                        <div class="space-y-4">
                            <h3 class="text-lg font-semibold text-slate-800">Quick Actions</h3>
                            <div class="space-y-3">
                                <button class="w-full px-4 py-3 bg-blue-50 hover:bg-blue-100 text-blue-700 rounded-lg transition-colors flex items-center gap-3">
                                    <i class="ri-mail-line"></i>
                                    Send via Email
                                </button>
                                <button class="w-full px-4 py-3 bg-green-50 hover:bg-green-100 text-green-700 rounded-lg transition-colors flex items-center gap-3">
                                    <i class="ri-whatsapp-line"></i>
                                    Share on WhatsApp
                                </button>
                                <button class="w-full px-4 py-3 bg-purple-50 hover:bg-purple-100 text-purple-700 rounded-lg transition-colors flex items-center gap-3">
                                    <i class="ri-facebook-line"></i>
                                    Share on Facebook
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex justify-center mt-8">
                    <button type="button"
                            class="px-8 py-3 bg-slate-800 hover:bg-slate-900 text-white font-semibold rounded-xl transition-colors"
                            @click="window.location.href = '{{ route('dashboard') }}'">
                        Go to Dashboard
                    </button>
                </div>
            </div>
        </div>
    </main>
</div>

<script>
    function formWizard() {
        return {
            step: 1,
            isLoading: false,
            form: {
                title: '',
                organization: '',
                category: '',
                description: '',
                instructions: '',
                start: '',
                end: ''
            },
            positions: [{ name: '', candidates: [''] }],
            shareLink: '',

            nextStep() {
                if (this.step === 1) {
                    if (!this.validateBasicInfo()) return;
                    this.step = 2;
                }
            },

            async createForm() {
                if (!this.validatePositions()) return;

                this.isLoading = true;

                try {
                    const response = await fetch('/api/forms', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        },
                        body: JSON.stringify({
                            form: this.form,
                            positions: this.positions
                        })
                    });

                    const result = await response.json();

                    if (response.ok) {
                        this.shareLink = `${window.location.origin}/vote/${result.form_id}`;
                        this.step = 3;
                    } else {
                        this.showNotification(result.message || 'Error creating form', 'error');
                    }
                } catch (error) {
                    this.showNotification('Error creating form. Please try again.', 'error');
                    console.error('Error:', error);
                } finally {
                    this.isLoading = false;
                }
            },

            validateBasicInfo() {
                if (!this.form.title || !this.form.organization || !this.form.description || !this.form.start || !this.form.end) {
                    this.showNotification('Please fill all required fields.', 'error');
                    return false;
                }
                if (this.form.description.length > 800) {
                    this.showNotification('Description must be 800 characters or less.', 'error');
                    return false;
                }
                if (this.form.end <= this.form.start) {
                    this.showNotification('Voting end must be after voting start.', 'error');
                    return false;
                }
                return true;
            },

            validatePositions() {
                for (const pos of this.positions) {
                    if (!pos.name || pos.candidates.some(c => !c.trim())) {
                        this.showNotification('Please fill all position and candidate fields.', 'error');
                        return false;
                    }
                }
                return true;
            },

            addPosition() {
                this.positions.push({ name: '', candidates: [''] });
            },

            removePosition(i) {
                if (this.positions.length > 1) {
                    this.positions.splice(i, 1);
                }
            },

            addCandidate(i) {
                this.positions[i].candidates.push('');
            },

            removeCandidate(i, j) {
                if (this.positions[i].candidates.length > 1) {
                    this.positions[i].candidates.splice(j, 1);
                }
            },

            copyLink() {
                navigator.clipboard.writeText(this.shareLink).then(() => {
                    this.showNotification('Link copied to clipboard!', 'success');
                });
            },

            showNotification(message, type) {
                alert(message); // Replace with proper toast notification
            }
        }
    }
</script>
</body>
</html>
