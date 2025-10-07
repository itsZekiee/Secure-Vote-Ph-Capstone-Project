<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Secure Vote Ph - Create Voting Form</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</head>
<body class="bg-gray-100 font-inter">
<div x-data="{ collapsed: false }" class="flex min-h-screen">
    @include('layout.partials.sidebar')
    <main class="flex-grow p-8">
        <div class="flex items-center mb-8">
            <button @click="collapsed = !collapsed" class="p-2 rounded-md bg-white shadow mr-4">
                <i class="ri-menu-line text-2xl text-gray-700"></i>
            </button>
            <div>
                <h1 class="text-4xl font-bold text-gray-800">Create Voting Form</h1>
                <p class="mt-1 text-base text-gray-500">Design and configure a new voting form for elections</p>
            </div>
        </div>
        <div x-data="formWizard()" class="max-w-3xl mx-auto">
            <!-- Panel 1: Basic Information -->
            <form x-show="step === 1" @submit.prevent="nextStep" class="bg-white p-8 rounded-xl shadow-lg space-y-6">
                <h2 class="text-2xl font-semibold text-gray-700 mb-2">Basic Information</h2>
                <div>
                    <label class="block font-medium mb-1">Form Title <span class="text-red-500">*</span></label>
                    <input type="text" x-model="form.title" class="form-control border-gray-300 rounded-lg" maxlength="100" required>
                </div>
                <div>
                    <label class="block font-medium mb-1">Organization Name <span class="text-red-500">*</span></label>
                    <input type="text" x-model="form.organization" class="form-control border-gray-300 rounded-lg" maxlength="100" required>
                </div>
                <div>
                    <label class="block font-medium mb-1">Form Category</label>
                    <select x-model="form.category" class="form-control border-gray-300 rounded-lg">
                        <option value="">Select Category</option>
                        <option value="election">Election</option>
                        <option value="survey">Survey</option>
                        <option value="feedback">Feedback</option>
                    </select>
                </div>
                <div>
                    <label class="block font-medium mb-1">Description <span class="text-red-500">*</span> (max 800 characters)</label>
                    <textarea x-model="form.description" class="form-control border-gray-300 rounded-lg" maxlength="800" required></textarea>
                </div>
                <div>
                    <label class="block font-medium mb-1">Instructions for Voters</label>
                    <textarea x-model="form.instructions" class="form-control border-gray-300 rounded-lg" maxlength="400"></textarea>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block font-medium mb-1">Voting Start <span class="text-red-500">*</span></label>
                        <input type="datetime-local" x-model="form.start" class="form-control border-gray-300 rounded-lg" required>
                    </div>
                    <div>
                        <label class="block font-medium mb-1">Voting End <span class="text-red-500">*</span></label>
                        <input type="datetime-local" x-model="form.end" class="form-control border-gray-300 rounded-lg" required :min="form.start">
                    </div>
                </div>
                <div class="flex justify-end">
                    <button type="submit" class="btn btn-primary px-6 py-2 rounded-lg shadow">Next</button>
                </div>
            </form>
            <!-- Panel 2: Positions & Candidates -->
            <form x-show="step === 2" @submit.prevent="nextStep" class="bg-white p-8 rounded-xl shadow-lg space-y-6">
                <h2 class="text-2xl font-semibold text-gray-700 mb-2">Positions & Candidates</h2>
                <template x-for="(position, i) in positions" :key="i">
                    <div class="border p-4 mb-4 rounded-lg bg-gray-50 relative">
                        <button type="button" class="absolute top-2 right-2 btn btn-danger btn-sm" @click="removePosition(i)">
                            <i class="ri-delete-bin-line"></i>
                        </button>
                        <div>
                            <label class="block font-medium mb-1">Position Name <span class="text-red-500">*</span></label>
                            <input type="text" x-model="position.name" class="form-control border-gray-300 rounded-lg" maxlength="60" required>
                        </div>
                        <div>
                            <label class="block font-medium mb-1">Candidates <span class="text-red-500">*</span></label>
                            <template x-for="(candidate, j) in position.candidates" :key="j">
                                <div class="flex items-center mb-2">
                                    <input type="text" x-model="position.candidates[j]" class="form-control border-gray-300 rounded-lg mr-2" maxlength="60" required>
                                    <button type="button" class="btn btn-outline-danger btn-sm" @click="removeCandidate(i, j)" x-show="position.candidates.length > 1">
                                        <i class="ri-close-line"></i>
                                    </button>
                                </div>
                            </template>
                            <button type="button" class="btn btn-outline-primary btn-sm mt-2" @click="addCandidate(i)">
                                Add Candidate
                            </button>
                        </div>
                    </div>
                </template>
                <button type="button" class="btn btn-outline-success mb-4" @click="addPosition()">Add Position</button>
                <div class="flex justify-between">
                    <button type="button" class="btn btn-secondary px-6 py-2 rounded-lg" @click="step = 1">Back</button>
                    <button type="submit" class="btn btn-primary px-6 py-2 rounded-lg shadow">Finish</button>
                </div>
            </form>
            <!-- Panel 3: Share Form -->
            <div x-show="step === 3" class="bg-white p-8 rounded-xl shadow-lg">
                <h2 class="text-2xl font-semibold text-gray-700 mb-2">Share Voting Form</h2>
                <p class="mb-3 text-gray-600">Your form is ready! Share the link or QR code with voters.</p>
                <div class="mb-4 flex items-center gap-2">
                    <input type="text" class="form-control border-gray-300 rounded-lg" :value="shareLink" readonly>
                    <button type="button" class="btn btn-outline-secondary" @click="copyLink">Copy Link</button>
                </div>
                <div class="mt-6 flex flex-col items-center">
                    <div class="bg-gray-200 p-6 rounded-lg flex items-center justify-center w-40 h-40">
                        <span class="text-gray-500 text-lg">[QR Code Here]</span>
                    </div>
                    <button type="button" class="btn btn-outline-primary mt-4">Download QR Code</button>
                </div>
            </div>
        </div>
    </main>
</div>
<script>
    function formWizard() {
        return {
            step: 1,
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
            shareLink: 'https://securevoteph.com/vote/your-form-id',
            nextStep() {
                if (this.step === 1) {
                    // Basic validation
                    if (!this.form.title || !this.form.organization || !this.form.description || !this.form.start || !this.form.end) {
                        alert('Please fill all required fields.');
                        return;
                    }
                    if (this.form.description.length > 800) {
                        alert('Description must be 800 characters or less.');
                        return;
                    }
                    if (this.form.end <= this.form.start) {
                        alert('Voting End must be after Voting Start.');
                        return;
                    }
                    this.step = 2;
                } else if (this.step === 2) {
                    // Validate positions and candidates
                    for (const pos of this.positions) {
                        if (!pos.name || pos.candidates.some(c => !c)) {
                            alert('Please fill all position and candidate fields.');
                            return;
                        }
                    }
                    this.step = 3;
                }
            },
            addPosition() {
                this.positions.push({ name: '', candidates: [''] });
            },
            removePosition(i) {
                if (this.positions.length > 1) this.positions.splice(i, 1);
            },
            addCandidate(i) {
                this.positions[i].candidates.push('');
            },
            removeCandidate(i, j) {
                if (this.positions[i].candidates.length > 1) this.positions[i].candidates.splice(j, 1);
            },
            copyLink() {
                navigator.clipboard.writeText(this.shareLink);
                alert('Link copied!');
            }
        }
    }
</script>
</body>
</html>
