<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Secure Vote Ph - Voting Settings</title>

    <!-- Google Fonts and Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <!-- Remix Icon -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" rel="stylesheet">
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Alpine.js for interactivity -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

</head>
<body>
    <div x-data="{ collapsed: false, loading: false }" class="flex">
        <!-- Sidebar -->
        @include('layout.partials.sidebar')

        <!-- Main Content -->
        <main class="flex-grow p-6 bg-gray-100">
            <div class="flex items-start mb-6">
                <button @click="collapsed = !collapsed" class="p-2 rounded-md focus:outline-none mr-4">
                    <i class="ri-menu-line text-2xl" style="color: #444444;"></i>
                </button>
                <div>
                    <h1 class="text-4xl font-bold">Voting Settings</h1>
                    <p class="mt-1 text-sm text-gray-500 max-w-xl">
                        Configure voter registration and verification settings
                    </p>
                </div>
            </div>

            <!-- Setting Panels -->
            <section class="mt-6">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    <!-- 1) Registration Settings / Configuration -->
                    <div class="relative rounded-2xl border border-gray-200 bg-white/90 backdrop-blur-sm shadow-sm hover:shadow-md transition-shadow" x-data="{ saving:false }">
                        <span class="absolute inset-x-0 top-0 h-1 bg-gradient-to-r from-[#1B1B1B] to-[#003153]"></span>
                        <div class="p-6">
                            <div class="mb-5 flex items-start gap-3">
                                <div class="shrink-0 rounded-xl bg-[#003153]/10 p-2 text-[#003153]">
                                    <i class="ri-user-add-line text-xl"></i>
                                </div>
                                <div>
                                    <h2 class="text-lg font-semibold tracking-tight text-gray-900">Registration Settings / Configuration</h2>
                                    <p class="text-sm text-gray-500">Configure voter registration and verification settings</p>
                                </div>
                            </div>

                            <div class="space-y-5">
                                <div>
                                    <label for="min_age" class="block text-sm font-medium text-gray-700">Minimum Age</label>
                                    <input id="min_age" name="min_age" type="number" min="0"
                                           class="mt-1 w-full rounded-xl border border-gray-200 bg-gray-50 px-3 py-2 text-sm text-gray-900 placeholder-gray-400 focus:border-[#003153] focus:bg-white focus:ring-2 focus:ring-[#003153]/40"
                                           placeholder="18">
                                </div>

                                <div>
                                    <label for="registration_deadline" class="block text-sm font-medium text-gray-700">Registration Deadline</label>
                                    <input id="registration_deadline" name="registration_deadline" type="datetime-local"
                                           class="mt-1 w-full rounded-xl border border-gray-200 bg-gray-50 px-3 py-2 text-sm text-gray-900 focus:border-[#003153] focus:bg-white focus:ring-2 focus:ring-[#003153]/40">
                                </div>

                                <div class="flex items-center justify-between">
                                    <div>
                                        <p class="text-sm font-medium text-gray-700">Required ID Verification</p>
                                        <p class="text-xs text-gray-500">Require a valid ID during registration</p>
                                    </div>
                                    <label class="inline-flex items-center cursor-pointer">
                                        <input type="checkbox" name="require_id_verification" class="peer sr-only">
                                        <div class="w-11 h-6 rounded-full bg-gray-200 peer-checked:bg-[#003153] transition relative after:absolute after:top-[2px] after:left-[2px] after:h-5 after:w-5 after:rounded-full after:bg-white after:shadow after:transition peer-checked:after:translate-x-5"></div>
                                    </label>
                                </div>

                                <div class="flex items-center justify-between">
                                    <div>
                                        <p class="text-sm font-medium text-gray-700">Auto-Approved Registration</p>
                                        <p class="text-xs text-gray-500">Automatically approve new registrations</p>
                                    </div>
                                    <label class="inline-flex items-center cursor-pointer">
                                        <input type="checkbox" name="auto_approve_registration" class="peer sr-only">
                                        <div class="w-11 h-6 rounded-full bg-gray-200 peer-checked:bg-[#003153] transition relative after:absolute after:top-[2px] after:left-[2px] after:h-5 after:w-5 after:rounded-full after:bg-white after:shadow after:transition peer-checked:after:translate-x-5"></div>
                                    </label>
                                </div>

                                <div class="flex items-center justify-between">
                                    <div>
                                        <p class="text-sm font-medium text-gray-700">Allow Email Registration</p>
                                        <p class="text-xs text-gray-500">Enable sign up using email</p>
                                    </div>
                                    <label class="inline-flex items-center cursor-pointer">
                                        <input type="checkbox" name="allow_email_registration" class="peer sr-only">
                                        <div class="w-11 h-6 rounded-full bg-gray-200 peer-checked:bg-[#003153] transition relative after:absolute after:top-[2px] after:left-[2px] after:h-5 after:w-5 after:rounded-full after:bg-white after:shadow after:transition peer-checked:after:translate-x-5"></div>
                                    </label>
                                </div>

                                <div class="flex items-center justify-between">
                                    <div>
                                        <p class="text-sm font-medium text-gray-700">Allow Phone Registration</p>
                                        <p class="text-xs text-gray-500">Enable sign up using mobile number</p>
                                    </div>
                                    <label class="inline-flex items-center cursor-pointer">
                                        <input type="checkbox" name="allow_phone_registration" class="peer sr-only">
                                        <div class="w-11 h-6 rounded-full bg-gray-200 peer-checked:bg-[#003153] transition relative after:absolute after:top-[2px] after:left-[2px] after:h-5 after:w-5 after:rounded-full after:bg-white after:shadow after:transition peer-checked:after:translate-x-5"></div>
                                    </label>
                                </div>

                                <div>
                                    <label for="allowed_domains" class="block text-sm font-medium text-gray-700">Allowed Domains (comma-separated)</label>
                                    <input id="allowed_domains" name="allowed_domains" type="text"
                                           class="mt-1 w-full rounded-xl border border-gray-200 bg-gray-50 px-3 py-2 text-sm text-gray-900 placeholder-gray-400 focus:border-[#003153] focus:bg-white focus:ring-2 focus:ring-[#003153]/40"
                                           placeholder="example.com, school.edu">
                                </div>

                                <div>
                                    <label for="max_reg_per_ip" class="block text-sm font-medium text-gray-700">Max Registrations per IP (per day)</label>
                                    <input id="max_reg_per_ip" name="max_reg_per_ip" type="number" min="0"
                                           class="mt-1 w-full rounded-xl border border-gray-200 bg-gray-50 px-3 py-2 text-sm text-gray-900 placeholder-gray-400 focus:border-[#003153] focus:bg-white focus:ring-2 focus:ring-[#003153]/40"
                                           placeholder="5">
                                </div>

                                <div class="flex items-center justify-between">
                                    <div>
                                        <p class="text-sm font-medium text-gray-700">Require Terms Acceptance</p>
                                        <p class="text-xs text-gray-500">Users must accept Terms &amp; Privacy</p>
                                    </div>
                                    <label class="inline-flex items-center cursor-pointer">
                                        <input type="checkbox" name="require_terms" class="peer sr-only">
                                        <div class="w-11 h-6 rounded-full bg-gray-200 peer-checked:bg-[#003153] transition relative after:absolute after:top-[2px] after:left-[2px] after:h-5 after:w-5 after:rounded-full after:bg-white after:shadow after:transition peer-checked:after:translate-x-5"></div>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="border-t border-gray-100 px-6 py-4">
                            <button type="button"
                                    @click="saving=true; setTimeout(()=>saving=false,1200)"
                                    class="inline-flex items-center gap-2 rounded-xl bg-gradient-to-r from-[#1B1B1B] to-[#003153] px-4 py-2 text-sm font-medium text-white shadow ring-1 ring-[#003153]/20 hover:opacity-90 focus:outline-none focus:ring-2 focus:ring-[#003153]">
                                <span x-show="!saving">Save Changes</span>
                                <span x-show="saving" class="inline-flex items-center gap-2">
                                    <i class="ri-loader-4-line animate-spin text-base"></i>
                                    Saving...
                                </span>
                            </button>
                        </div>
                    </div>


                    <!-- 2) Verification Settings -->
                    <div class="relative rounded-2xl border border-gray-200 bg-white/90 backdrop-blur-sm shadow-sm hover:shadow-md transition-shadow" x-data="{ saving:false }">
                        <span class="absolute inset-x-0 top-0 h-1 bg-gradient-to-r from-[#1B1B1B] to-[#003153]"></span>
                        <div class="p-6">
                            <div class="mb-5 flex items-start gap-3">
                                <div class="shrink-0 rounded-xl bg-[#003153]/10 p-2 text-[#003153]">
                                    <i class="ri-shield-check-line text-xl"></i>
                                </div>
                                <div>
                                    <h2 class="text-lg font-semibold tracking-tight text-gray-900">Verification Settings</h2>
                                    <p class="text-sm text-gray-500">Configure voter verification and security measures</p>
                                </div>
                            </div>

                            <div class="space-y-5">
                                <div>
                                    <label for="verification_method" class="block text-sm font-medium text-gray-700">Verification Method</label>
                                    <select id="verification_method" name="verification_method"
                                            class="mt-1 w-full rounded-xl border border-gray-200 bg-gray-50 px-3 py-2 text-sm text-gray-900 focus:border-[#003153] focus:bg-white focus:ring-2 focus:ring-[#003153]/40">
                                        <option value="email">Email</option>
                                        <option value="sms">SMS</option>
                                        <option value="otp-app">OTP App</option>
                                        <option value="gov-id">Government ID</option>
                                    </select>
                                </div>

                                <div>
                                    <label for="verification_timeout" class="block text-sm font-medium text-gray-700">Verification Timeout (minutes)</label>
                                    <input id="verification_timeout" name="verification_timeout" type="number" min="1"
                                           class="mt-1 w-full rounded-xl border border-gray-200 bg-gray-50 px-3 py-2 text-sm text-gray-900 placeholder-gray-400 focus:border-[#003153] focus:bg-white focus:ring-2 focus:ring-[#003153]/40"
                                           placeholder="10">
                                </div>

                                <div class="flex items-center justify-between">
                                    <div>
                                        <p class="text-sm font-medium text-gray-700">Enable Two\-Factor Authentication</p>
                                        <p class="text-xs text-gray-500">Extra security during verification</p>
                                    </div>
                                    <label class="inline-flex items-center cursor-pointer">
                                        <input type="checkbox" name="enable_2fa" class="peer sr-only">
                                        <div class="w-11 h-6 rounded-full bg-gray-200 peer-checked:bg-[#003153] transition relative after:absolute after:top-[2px] after:left-[2px] after:h-5 after:w-5 after:rounded-full after:bg-white after:shadow after:transition peer-checked:after:translate-x-5"></div>
                                    </label>
                                </div>

                                <div class="flex items-center justify-between">
                                    <div>
                                        <p class="text-sm font-medium text-gray-700">Duplicate Detection</p>
                                        <p class="text-xs text-gray-500">Block multiple accounts</p>
                                    </div>
                                    <label class="inline-flex items-center cursor-pointer">
                                        <input type="checkbox" name="duplicate_detection" class="peer sr-only">
                                        <div class="w-11 h-6 rounded-full bg-gray-200 peer-checked:bg-[#003153] transition relative after:absolute after:top-[2px] after:left-[2px] after:h-5 after:w-5 after:rounded-full after:bg-white after:shadow after:transition peer-checked:after:translate-x-5"></div>
                                    </label>
                                </div>

                                <div class="flex items-center justify-between">
                                    <div>
                                        <p class="text-sm font-medium text-gray-700">Geo Location Detection</p>
                                        <p class="text-xs text-gray-500">Flag unusual regions</p>
                                    </div>
                                    <label class="inline-flex items-center cursor-pointer">
                                        <input type="checkbox" name="geo_location_detection" class="peer sr-only">
                                        <div class="w-11 h-6 rounded-full bg-gray-200 peer-checked:bg-[#003153] transition relative after:absolute after:top-[2px] after:left-[2px] after:h-5 after:w-5 after:rounded-full after:bg-white after:shadow after:transition peer-checked:after:translate-x-5"></div>
                                    </label>
                                </div>

                                <div>
                                    <label for="max_verification_attempts" class="block text-sm font-medium text-gray-700">Max Verification Attempts</label>
                                    <input id="max_verification_attempts" name="max_verification_attempts" type="number" min="1"
                                           class="mt-1 w-full rounded-xl border border-gray-200 bg-gray-50 px-3 py-2 text-sm text-gray-900 placeholder-gray-400 focus:border-[#003153] focus:bg-white focus:ring-2 focus:ring-[#003153]/40"
                                           placeholder="5">
                                </div>
                            </div>
                        </div>

                        <div class="border-t border-gray-100 px-6 py-4">
                            <button type="button"
                                    @click="saving=true; setTimeout(()=>saving=false,1200)"
                                    class="inline-flex items-center gap-2 rounded-xl bg-gradient-to-r from-[#1B1B1B] to-[#003153] px-4 py-2 text-sm font-medium text-white shadow ring-1 ring-[#003153]/20 hover:opacity-90 focus:outline-none focus:ring-2 focus:ring-[#003153]">
                                <span x-show="!saving">Save Changes</span>
                                <span x-show="saving" class="inline-flex items-center gap-2">
                                    <i class="ri-loader-4-line animate-spin text-base"></i>
                                    Saving...
                                </span>
                            </button>
                        </div>
                    </div>

                    <!-- 3) Security & Privacy -->
                    <div class="relative rounded-2xl border border-gray-200 bg-white/90 backdrop-blur-sm shadow-sm hover:shadow-md transition-shadow" x-data="{ saving:false }">
                        <span class="absolute inset-x-0 top-0 h-1 bg-gradient-to-r from-[#1B1B1B] to-[#003153]"></span>
                        <div class="p-6">
                            <div class="mb-5 flex items-start gap-3">
                                <div class="shrink-0 rounded-xl bg-[#003153]/10 p-2 text-[#003153]">
                                    <i class="ri-lock-2-line text-xl"></i>
                                </div>
                                <div>
                                    <h2 class="text-lg font-semibold tracking-tight text-gray-900">Security &amp; Privacy</h2>
                                    <p class="text-sm text-gray-500">Configure security and privacy protection settings</p>
                                </div>
                            </div>

                            <div class="space-y-5">
                                <div>
                                    <label for="data_retention_years" class="block text-sm font-medium text-gray-700">Data Retention Period (years)</label>
                                    <input id="data_retention_years" name="data_retention_years" type="number" min="0"
                                           class="mt-1 w-full rounded-xl border border-gray-200 bg-gray-50 px-3 py-2 text-sm text-gray-900 placeholder-gray-400 focus:border-[#003153] focus:bg-white focus:ring-2 focus:ring-[#003153]/40"
                                           placeholder="2">
                                </div>

                                <div class="flex items-center justify-between">
                                    <div>
                                        <p class="text-sm font-medium text-gray-700">Encrypt Personal Data</p>
                                        <p class="text-xs text-gray-500">AES\-256 at rest</p>
                                    </div>
                                    <label class="inline-flex items-center cursor-pointer">
                                        <input type="checkbox" name="encrypt_personal_data" class="peer sr-only">
                                        <div class="w-11 h-6 rounded-full bg-gray-200 peer-checked:bg-[#003153] transition relative after:absolute after:top-[2px] after:left-[2px] after:h-5 after:w-5 after:rounded-full after:bg-white after:shadow after:transition peer-checked:after:translate-x-5"></div>
                                    </label>
                                </div>

                                <div class="flex items-center justify-between">
                                    <div>
                                        <p class="text-sm font-medium text-gray-700">Audit Trail</p>
                                        <p class="text-xs text-gray-500">Record sensitive actions</p>
                                    </div>
                                    <label class="inline-flex items-center cursor-pointer">
                                        <input type="checkbox" name="audit_trail" class="peer sr-only">
                                        <div class="w-11 h-6 rounded-full bg-gray-200 peer-checked:bg-[#003153] transition relative after:absolute after:top-[2px] after:left-[2px] after:h-5 after:w-5 after:rounded-full after:bg-white after:shadow after:transition peer-checked:after:translate-x-5"></div>
                                    </label>
                                </div>

                                <div class="flex items-center justify-between">
                                    <div>
                                        <p class="text-sm font-medium text-gray-700">Anonymous Voting</p>
                                        <p class="text-xs text-gray-500">Hide voter identity</p>
                                    </div>
                                    <label class="inline-flex items-center cursor-pointer">
                                        <input type="checkbox" name="anonymous_voting" class="peer sr-only">
                                        <div class="w-11 h-6 rounded-full bg-gray-200 peer-checked:bg-[#003153] transition relative after:absolute after:top-[2px] after:left-[2px] after:h-5 after:w-5 after:rounded-full after:bg-white after:shadow after:transition peer-checked:after:translate-x-5"></div>
                                    </label>
                                </div>

                                <div>
                                    <label for="ip_rate_limit" class="block text-sm font-medium text-gray-700">IP Rate Limit (requests/min)</label>
                                    <input id="ip_rate_limit" name="ip_rate_limit" type="number" min="0"
                                           class="mt-1 w-full rounded-xl border border-gray-200 bg-gray-50 px-3 py-2 text-sm text-gray-900 placeholder-gray-400 focus:border-[#003153] focus:bg-white focus:ring-2 focus:ring-[#003153]/40"
                                           placeholder="60">
                                </div>

                                <div>
                                    <label for="session_timeout" class="block text-sm font-medium text-gray-700">Session Timeout (minutes)</label>
                                    <input id="session_timeout" name="session_timeout" type="number" min="1"
                                           class="mt-1 w-full rounded-xl border border-gray-200 bg-gray-50 px-3 py-2 text-sm text-gray-900 placeholder-gray-400 focus:border-[#003153] focus:bg-white focus:ring-2 focus:ring-[#003153]/40"
                                           placeholder="30">
                                </div>
                            </div>
                        </div>

                        <div class="border-t border-gray-100 px-6 py-4">
                            <button type="button"
                                    @click="saving=true; setTimeout(()=>saving=false,1200)"
                                    class="inline-flex items-center gap-2 rounded-xl bg-gradient-to-r from-[#1B1B1B] to-[#003153] px-4 py-2 text-sm font-medium text-white shadow ring-1 ring-[#003153]/20 hover:opacity-90 focus:outline-none focus:ring-2 focus:ring-[#003153]">
                                <span x-show="!saving">Save Changes</span>
                                <span x-show="saving" class="inline-flex items-center gap-2">
                                    <i class="ri-loader-4-line animate-spin text-base"></i>
                                    Saving...
                                </span>
                            </button>
                        </div>
                    </div>

                    <!-- 4) Notifications & Alerts -->
                    <div class="relative rounded-2xl border border-gray-200 bg-white/90 backdrop-blur-sm shadow-sm hover:shadow-md transition-shadow" x-data="{ saving:false }">
                        <span class="absolute inset-x-0 top-0 h-1 bg-gradient-to-r from-[#1B1B1B] to-[#003153]"></span>
                        <div class="p-6">
                            <div class="mb-5 flex items-start gap-3">
                                <div class="shrink-0 rounded-xl bg-[#003153]/10 p-2 text-[#003153]">
                                    <i class="ri-notification-3-line text-xl"></i>
                                </div>
                                <div>
                                    <h2 class="text-lg font-semibold tracking-tight text-gray-900">Notifications &amp; Alerts</h2>
                                    <p class="text-sm text-gray-500">Configure system notifications and alert preferences</p>
                                </div>
                            </div>

                            <div class="space-y-5">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <p class="text-sm font-medium text-gray-700">Registration Confirmation Email</p>
                                        <p class="text-xs text-gray-500">Send email on successful registration</p>
                                    </div>
                                    <label class="inline-flex items-center cursor-pointer">
                                        <input type="checkbox" name="notify_registration_confirmation" class="peer sr-only">
                                        <div class="w-11 h-6 rounded-full bg-gray-200 peer-checked:bg-[#003153] transition relative after:absolute after:top-[2px] after:left-[2px] after:h-5 after:w-5 after:rounded-full after:bg-white after:shadow after:transition peer-checked:after:translate-x-5"></div>
                                    </label>
                                </div>

                                <div>
                                    <span class="block text-sm font-medium text-gray-700 mb-1">Verification Code Delivery</span>
                                    <div class="flex flex-wrap gap-4">
                                        <label class="inline-flex items-center gap-2 text-sm text-gray-700">
                                            <input type="radio" name="code_delivery" value="email" class="text-[#003153] focus:ring-[#003153]"> Email
                                        </label>
                                        <label class="inline-flex items-center gap-2 text-sm text-gray-700">
                                            <input type="radio" name="code_delivery" value="sms" class="text-[#003153] focus:ring-[#003153]"> SMS
                                        </label>
                                        <label class="inline-flex items-center gap-2 text-sm text-gray-700">
                                            <input type="radio" name="code_delivery" value="both" class="text-[#003153] focus:ring-[#003153]"> Both
                                        </label>
                                    </div>
                                </div>

                                <div class="flex items-center justify-between">
                                    <div>
                                        <p class="text-sm font-medium text-gray-700">Admin Alert on Suspicious Activity</p>
                                        <p class="text-xs text-gray-500">Notify admins on risk signals</p>
                                    </div>
                                    <label class="inline-flex items-center cursor-pointer">
                                        <input type="checkbox" name="alert_suspicious_activity" class="peer sr-only">
                                        <div class="w-11 h-6 rounded-full bg-gray-200 peer-checked:bg-[#003153] transition relative after:absolute after:top-[2px] after:left-[2px] after:h-5 after:w-5 after:rounded-full after:bg-white after:shadow after:transition peer-checked:after:translate-x-5"></div>
                                    </label>
                                </div>

                                <div class="flex items-center justify-between">
                                    <div>
                                        <p class="text-sm font-medium text-gray-700">Daily Summary Email</p>
                                        <p class="text-xs text-gray-500">Digest of system activity</p>
                                    </div>
                                    <label class="inline-flex items-center cursor-pointer">
                                        <input type="checkbox" name="daily_summary_email" class="peer sr-only">
                                        <div class="w-11 h-6 rounded-full bg-gray-200 peer-checked:bg-[#003153] transition relative after:absolute after:top-[2px] after:left-[2px] after:h-5 after:w-5 after:rounded-full after:bg-white after:shadow after:transition peer-checked:after:translate-x-5"></div>
                                    </label>
                                </div>

                                <div>
                                    <label for="webhook_url" class="block text-sm font-medium text-gray-700">Webhook URL</label>
                                    <input id="webhook_url" name="webhook_url" type="url"
                                           class="mt-1 w-full rounded-xl border border-gray-200 bg-gray-50 px-3 py-2 text-sm text-gray-900 placeholder-gray-400 focus:border-[#003153] focus:bg-white focus:ring-2 focus:ring-[#003153]/40"
                                           placeholder="https://example.com/webhook">
                                </div>

                                <div>
                                    <label for="sms_sender_id" class="block text-sm font-medium text-gray-700">SMS Sender ID</label>
                                    <input id="sms_sender_id" name="sms_sender_id" type="text"
                                           class="mt-1 w-full rounded-xl border border-gray-200 bg-gray-50 px-3 py-2 text-sm text-gray-900 placeholder-gray-400 focus:border-[#003153] focus:bg-white focus:ring-2 focus:ring-[#003153]/40"
                                           placeholder="SECUREVOTE">
                                </div>
                            </div>
                        </div>

                        <div class="border-t border-gray-100 px-6 py-4">
                            <button type="button"
                                    @click="saving=true; setTimeout(()=>saving=false,1200)"
                                    class="inline-flex items-center gap-2 rounded-xl bg-gradient-to-r from-[#1B1B1B] to-[#003153] px-4 py-2 text-sm font-medium text-white shadow ring-1 ring-[#003153]/20 hover:opacity-90 focus:outline-none focus:ring-2 focus:ring-[#003153]">
                                <span x-show="!saving">Save Changes</span>
                                <span x-show="saving" class="inline-flex items-center gap-2">
                                    <i class="ri-loader-4-line animate-spin text-base"></i>
                                    Saving...
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </div>
</body>
</html>
