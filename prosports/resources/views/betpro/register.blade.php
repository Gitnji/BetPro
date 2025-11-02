@extends('layout.app')
@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - BetPro</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#5D5CDE',
                        secondary: '#3b82f6',
                        accent: '#10b981',
                        danger: '#ef4444'
                    }
                }
            },
            darkMode: 'class'
        }
    </script>
</head>
<body class="bg-gray-50 dark:bg-gray-900 min-h-screen flex items-center justify-center transition-colors duration-300 px-4 py-8">
    <div class="max-w-md w-full space-y-8">
        <!-- Header -->
        <div class="text-center">
            <div class="mx-auto w-16 h-16 bg-gradient-to-br from-primary to-secondary rounded-xl flex items-center justify-center mb-6 shadow-lg">
                <i class="fas fa-chart-line text-white text-2xl"></i>
            </div>
            <h1 class="text-3xl font-bold text-primary mb-2">BetPro</h1>
            <h2 class="text-xl text-gray-600 dark:text-gray-400">Create your account</h2>
            <p class="text-sm text-gray-500 dark:text-gray-500 mt-2">Join thousands of successful bettors</p>
        </div>
        
        <!-- Registration Form -->
        <div class="bg-white dark:bg-gray-800 shadow-xl rounded-2xl p-8 border border-gray-200 dark:border-gray-700 transition-colors duration-300">
            <form class="space-y-6" id="register-form" method="POST" action="{{ route('betpro.signup') }}">
                @csrf
                <div class="space-y-5">
                    <div>
                        <label for="name" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                            <i class="fas fa-user mr-2 text-primary"></i>Full Name
                        </label>
                        <input 
                            id="name" 
                            name="name" 
                            type="text" 
                            required 
                            class="w-full px-4 py-3 text-base border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-xl shadow-sm placeholder-gray-400 dark:placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition-all duration-200"
                            placeholder="Enter your full name"
                        >
                        <div id="name-error" class="text-red-500 text-sm mt-1 hidden">
                            <i class="fas fa-exclamation-circle mr-1"></i>Please enter your full name
                        </div>
                    </div>
                    
                    <div>
                        <label for="email" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                            <i class="fas fa-envelope mr-2 text-primary"></i>Email Address
                        </label>
                        <input 
                            id="email" 
                            name="email" 
                            type="email" 
                            required 
                            class="w-full px-4 py-3 text-base border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-xl shadow-sm placeholder-gray-400 dark:placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition-all duration-200"
                            placeholder="Enter your email address"
                        >
                        <div id="email-error" class="text-red-500 text-sm mt-1 hidden">
                            <i class="fas fa-exclamation-circle mr-1"></i>Please enter a valid email address
                        </div>
                    </div>
                    
                    <div>
                        <label for="password" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                            <i class="fas fa-lock mr-2 text-primary"></i>Password
                        </label>
                        <div class="relative">
                            <input 
                                id="password" 
                                name="password" 
                                type="password" 
                                required 
                                class="w-full px-4 py-3 text-base border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-xl shadow-sm placeholder-gray-400 dark:placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition-all duration-200 pr-12"
                                placeholder="Create a strong password"
                            >
                            <button type="button" onclick="togglePassword('password')" class="absolute inset-y-0 right-0 pr-4 flex items-center text-gray-400 hover:text-gray-600 dark:hover:text-gray-300 transition-colors">
                                <i class="fas fa-eye" id="password-toggle"></i>
                            </button>
                        </div>
                        <div class="mt-2">
                            <div class="flex items-center space-x-1 text-xs">
                                <div id="length-check" class="flex items-center text-gray-400">
                                    <i class="fas fa-circle mr-1"></i>8+ characters
                                </div>
                                <div id="uppercase-check" class="flex items-center text-gray-400">
                                    <i class="fas fa-circle mr-1"></i>Uppercase
                                </div>
                                <div id="number-check" class="flex items-center text-gray-400">
                                    <i class="fas fa-circle mr-1"></i>Number
                                </div>
                            </div>
                        </div>
                        <div id="password-error" class="text-red-500 text-sm mt-1 hidden">
                            <i class="fas fa-exclamation-circle mr-1"></i>Password must be at least 8 characters with uppercase and number
                        </div>
                    </div>

                    <div>
                        <label for="confirm-password" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                            <i class="fas fa-lock mr-2 text-primary"></i>Confirm Password
                        </label>
                        <div class="relative">
                            <input 
                                id="confirm-password" 
                                name="confirm-password" 
                                type="password" 
                                required 
                                class="w-full px-4 py-3 text-base border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-xl shadow-sm placeholder-gray-400 dark:placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition-all duration-200 pr-12"
                                placeholder="Confirm your password"
                            >
                            <button type="button" onclick="togglePassword('confirm-password')" class="absolute inset-y-0 right-0 pr-4 flex items-center text-gray-400 hover:text-gray-600 dark:hover:text-gray-300 transition-colors">
                                <i class="fas fa-eye" id="confirm-password-toggle"></i>
                            </button>
                        </div>
                        <div id="confirm-password-error" class="text-red-500 text-sm mt-1 hidden">
                            <i class="fas fa-exclamation-circle mr-1"></i>Passwords do not match
                        </div>
                    </div>
                </div>

                <!-- Terms and Conditions -->
                <div class="flex items-start">
                    <div class="flex items-center h-5">
                        <input 
                            id="terms" 
                            name="terms" 
                            type="checkbox" 
                            required
                            class="h-4 w-4 text-primary focus:ring-primary border-gray-300 dark:border-gray-600 dark:bg-gray-700 rounded transition-colors"
                        >
                    </div>
                    <div class="ml-3 text-sm">
                        <label for="terms" class="text-gray-700 dark:text-gray-300">
                            I agree to the 
                            <a href="#" onclick="showTermsModal()" class="text-primary hover:text-opacity-80 font-medium transition-colors">Terms of Service</a> 
                            and 
                            <a href="#" onclick="showPrivacyModal()" class="text-primary hover:text-opacity-80 font-medium transition-colors">Privacy Policy</a>
                        </label>
                    </div>
                </div>
                <div id="terms-error" class="text-red-500 text-sm hidden">
                    <i class="fas fa-exclamation-circle mr-1"></i>Please accept the terms and conditions
                </div>

                <!-- Submit Button -->
                <div>
                    <button 
                        type="submit" 
                        id="submit-btn"
                        class="w-full bg-primary hover:bg-opacity-90 text-white font-semibold py-3 px-4 rounded-xl focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary transition-all duration-200 shadow-lg transform hover:scale-105 disabled:opacity-50 disabled:cursor-not-allowed disabled:transform-none"
                    >
                        <span id="submit-text">Create Account</span>
                        <i id="submit-loading" class="fas fa-spinner fa-spin ml-2 hidden"></i>
                    </button>
                </div>

                <!-- Login Link -->
                <div class="text-center">
                    <p class="text-sm text-gray-600 dark:text-gray-400">
                        Already have an account? 
                        <a href="{{ route('betpro.login') }}" class="text-primary hover:text-opacity-80 font-semibold transition-colors">
                            Sign in
                        </a>
                    </p>
                </div>
            </form>
        </div>

        <!-- Back to Home -->
        <div class="text-center">
            <a href="{{ route('index') }}" class="text-sm text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300 transition-colors inline-flex items-center">
                <i class="fas fa-arrow-left mr-2"></i>Back to home
            </a>
        </div>

        <!-- Social Registration -->
        <div class="bg-white dark:bg-gray-800 shadow-xl rounded-2xl p-6 border border-gray-200 dark:border-gray-700 transition-colors duration-300">
            <div class="text-center mb-4">
                <p class="text-sm text-gray-500 dark:text-gray-400">Or continue with</p>
            </div>
            <div class="grid grid-cols-2 gap-3">
                <button onclick="registerWithGoogle()" class="flex items-center justify-center px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-xl shadow-sm text-sm font-medium text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 transition-all duration-200">
                    <i class="fab fa-google text-red-500 mr-2"></i>
                    Google
                </button>
                <button onclick="registerWithApple()" class="flex items-center justify-center px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-xl shadow-sm text-sm font-medium text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 transition-all duration-200">
                    <i class="fab fa-apple text-gray-800 dark:text-white mr-2"></i>
                    Apple
                </button>
            </div>
        </div>
    </div>

    <!-- Success Modal -->
    <div id="successModal" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50 flex items-center justify-center p-4">
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-2xl max-w-md w-full transform transition-all duration-300 scale-95">
            <div class="p-6 text-center">
                <div class="mx-auto w-16 h-16 bg-green-100 dark:bg-green-900 rounded-full flex items-center justify-center mb-4">
                    <i class="fas fa-check text-green-600 dark:text-green-400 text-2xl"></i>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">Registration Successful!</h3>
                <p class="text-gray-600 dark:text-gray-400 mb-6">Welcome to BetPro! Redirecting to your dashboard...</p>
                <div class="flex justify-center">
                    <div class="animate-spin rounded-full h-6 w-6 border-b-2 border-primary"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Terms Modal -->
    <div id="termsModal" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50 flex items-center justify-center p-4">
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-2xl max-w-2xl w-full max-h-[90vh] overflow-y-auto">
            <div class="p-6 border-b border-gray-200 dark:border-gray-700">
                <div class="flex justify-between items-center">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Terms of Service</h3>
                    <button onclick="closeModal('termsModal')" class="text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200 transition-colors">
                        <i class="fas fa-times text-xl"></i>
                    </button>
                </div>
            </div>
            <div class="p-6">
                <div class="text-sm text-gray-600 dark:text-gray-400 space-y-4">
                    <p>By creating an account with BetPro, you agree to the following terms and conditions:</p>
                    <ul class="list-disc pl-5 space-y-2">
                        <li>You must be at least 18 years old to use our services</li>
                        <li>You are responsible for maintaining the confidentiality of your account</li>
                        <li>You agree to use our platform responsibly and legally</li>
                        <li>Gambling can be addictive - please bet responsibly</li>
                        <li>We reserve the right to suspend accounts for violations</li>
                    </ul>
                    <p class="text-xs text-gray-500">Last updated: January 2024</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Privacy Modal -->
    <div id="privacyModal" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50 flex items-center justify-center p-4">
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-2xl max-w-2xl w-full max-h-[90vh] overflow-y-auto">
            <div class="p-6 border-b border-gray-200 dark:border-gray-700">
                <div class="flex justify-between items-center">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Privacy Policy</h3>
                    <button onclick="closeModal('privacyModal')" class="text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200 transition-colors">
                        <i class="fas fa-times text-xl"></i>
                    </button>
                </div>
            </div>
            <div class="p-6">
                <div class="text-sm text-gray-600 dark:text-gray-400 space-y-4">
                    <p>We are committed to protecting your privacy and personal information:</p>
                    <ul class="list-disc pl-5 space-y-2">
                        <li>We collect only necessary information to provide our services</li>
                        <li>Your data is encrypted and stored securely</li>
                        <li>We never sell your personal information to third parties</li>
                        <li>You can request data deletion at any time</li>
                        <li>We use cookies to improve your experience</li>
                    </ul>
                    <p class="text-xs text-gray-500">Last updated: January 2024</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Error Message Container -->
    <div id="messageContainer" class="fixed top-4 right-4 z-50"></div>

    <!-- <script>
        // Initialize dark mode
        if (window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches) {
            document.documentElement.classList.add('dark');
        }
        window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', event => {
            if (event.matches) {
                document.documentElement.classList.add('dark');
            } else {
                document.documentElement.classList.remove('dark');
            }
        });

        // Password validation
        document.getElementById('password').addEventListener('input', function() {
            const password = this.value;
            validatePasswordStrength(password);
        });

        function validatePasswordStrength(password) {
            const lengthCheck = document.getElementById('length-check');
            const uppercaseCheck = document.getElementById('uppercase-check');
            const numberCheck = document.getElementById('number-check');

            // Length check
            if (password.length >= 8) {
                lengthCheck.classList.remove('text-gray-400');
                lengthCheck.classList.add('text-green-500');
                lengthCheck.querySelector('i').classList.remove('fa-circle');
                lengthCheck.querySelector('i').classList.add('fa-check-circle');
            } else {
                lengthCheck.classList.remove('text-green-500');
                lengthCheck.classList.add('text-gray-400');
                lengthCheck.querySelector('i').classList.remove('fa-check-circle');
                lengthCheck.querySelector('i').classList.add('fa-circle');
            }

            // Uppercase check
            if (/[A-Z]/.test(password)) {
                uppercaseCheck.classList.remove('text-gray-400');
                uppercaseCheck.classList.add('text-green-500');
                uppercaseCheck.querySelector('i').classList.remove('fa-circle');
                uppercaseCheck.querySelector('i').classList.add('fa-check-circle');
            } else {
                uppercaseCheck.classList.remove('text-green-500');
                uppercaseCheck.classList.add('text-gray-400');
                uppercaseCheck.querySelector('i').classList.remove('fa-check-circle');
                uppercaseCheck.querySelector('i').classList.add('fa-circle');
            }

            // Number check
            if (/\d/.test(password)) {
                numberCheck.classList.remove('text-gray-400');
                numberCheck.classList.add('text-green-500');
                numberCheck.querySelector('i').classList.remove('fa-circle');
                numberCheck.querySelector('i').classList.add('fa-check-circle');
            } else {
                numberCheck.classList.remove('text-green-500');
                numberCheck.classList.add('text-gray-400');
                numberCheck.querySelector('i').classList.remove('fa-check-circle');
                numberCheck.querySelector('i').classList.add('fa-circle');
            }
        }

        // Password toggle
        function togglePassword(fieldId) {
            const field = document.getElementById(fieldId);
            const toggle = document.getElementById(fieldId + '-toggle');
            
            if (field.type === 'password') {
                field.type = 'text';
                toggle.classList.remove('fa-eye');
                toggle.classList.add('fa-eye-slash');
            } else {
                field.type = 'password';
                toggle.classList.remove('fa-eye-slash');
                toggle.classList.add('fa-eye');
            }
        }

        // Show message function
        function showMessage(message, type = 'error') {
            const container = document.getElementById('messageContainer');
            const messageEl = document.createElement('div');
            
            const bgColor = type === 'success' ? 'bg-green-500' : 'bg-red-500';
            const icon = type === 'success' ? 'fa-check-circle' : 'fa-exclamation-circle';
            
            messageEl.className = `${bgColor} text-white px-6 py-4 rounded-lg shadow-lg mb-4 flex items-center space-x-3 transform translate-x-full transition-transform duration-300`;
            messageEl.innerHTML = `
                <i class="fas ${icon}"></i>
                <span>${message}</span>
                <button onclick="this.parentElement.remove()" class="ml-auto">
                    <i class="fas fa-times"></i>
                </button>
            `;
            
            container.appendChild(messageEl);
            
            // Animate in
            setTimeout(() => {
                messageEl.classList.remove('translate-x-full');
            }, 100);
            
            // Auto remove after 5 seconds
            setTimeout(() => {
                if (messageEl.parentElement) {
                    messageEl.classList.add('translate-x-full');
                    setTimeout(() => messageEl.remove(), 300);
                }
            }, 5000);
        }

        // Modal functions
        function showTermsModal() {
            document.getElementById('termsModal').classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }

        function showPrivacyModal() {
            document.getElementById('privacyModal').classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }

        function closeModal(modalId) {
            document.getElementById(modalId).classList.add('hidden');
            document.body.style.overflow = 'auto';
        }

        // Social registration functions
        function registerWithGoogle() {
            showMessage('Google registration coming soon!', 'success');
        }

        function registerWithApple() {
            showMessage('Apple registration coming soon!', 'success');
        }

        // Form validation
        function validateForm() {
            let isValid = true;
            
            // Clear previous errors
            document.querySelectorAll('[id$="-error"]').forEach(el => el.classList.add('hidden'));
            
            const name = document.getElementById('name').value.trim();
            const email = document.getElementById('email').value.trim();
            const password = document.getElementById('password').value;
            const confirmPassword = document.getElementById('confirm-password').value;
            const terms = document.getElementById('terms').checked;
            
            // Name validation
            if (!name) {
                document.getElementById('name-error').classList.remove('hidden');
                isValid = false;
            }
            
            // Email validation
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!email || !emailRegex.test(email)) {
                document.getElementById('email-error').classList.remove('hidden');
                isValid = false;
            }
            
            // Password validation
            const passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/;
            if (!password || !passwordRegex.test(password)) {
                document.getElementById('password-error').classList.remove('hidden');
                isValid = false;
            }
            
            // Confirm password validation
            if (password !== confirmPassword) {
                document.getElementById('confirm-password-error').classList.remove('hidden');
                isValid = false;
            }
            
            // Terms validation
            if (!terms) {
                document.getElementById('terms-error').classList.remove('hidden');
                isValid = false;
            }
            
            return isValid;
        }

        // Form submission
        document.getElementById('register-form').addEventListener('submit', function(e) {
            e.preventDefault();
            
            if (!validateForm()) {
                showMessage('Please fix the errors above');
                return;
            }
            
            // Show loading state
            const submitBtn = document.getElementById('submit-btn');
            const submitText = document.getElementById('submit-text');
            const submitLoading = document.getElementById('submit-loading');
            
            submitBtn.disabled = true;
            submitText.textContent = 'Creating Account...';
            submitLoading.classList.remove('hidden');
            
            // Simulate registration process
            setTimeout(() => {
                // Show success modal
                document.getElementById('successModal').classList.remove('hidden');
                document.body.style.overflow = 'hidden';
                
                // Redirect after delay
                setTimeout(() => {
                    window.location.href = 'dashboard.html';
                }, 2000);
            }, 1500);
        });

        // Close modals when clicking outside
        window.addEventListener('click', function(event) {
            const modals = ['termsModal', 'privacyModal'];
            modals.forEach(modalId => {
                const modal = document.getElementById(modalId);
                if (event.target === modal) {
                    closeModal(modalId);
                }
            });
        });
    </script> -->
</body>
</html>
@endsection