@extends('layout.app')
@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - BetPro</title>
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
            <h2 class="text-xl text-gray-600 dark:text-gray-400">Welcome back</h2>
            <p class="text-sm text-gray-500 dark:text-gray-500 mt-2">Sign in to access your dashboard</p>
        </div>
        
        <!-- Login Form -->
        <div class="bg-white dark:bg-gray-800 shadow-xl rounded-2xl p-8 border border-gray-200 dark:border-gray-700 transition-colors duration-300">
            <form class="space-y-6" id="login-form" method="POST" action="{{ route('betpro.login') }}">
                @csrf
                <div class="space-y-5">
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
                                placeholder="Enter your password"
                            >
                            <button type="button" onclick="togglePassword()" class="absolute inset-y-0 right-0 pr-4 flex items-center text-gray-400 hover:text-gray-600 dark:hover:text-gray-300 transition-colors">
                                <i class="fas fa-eye" id="password-toggle"></i>
                            </button>
                        </div>
                        <div id="password-error" class="text-red-500 text-sm mt-1 hidden">
                            <i class="fas fa-exclamation-circle mr-1"></i>Please enter your password
                        </div>
                    </div>
                </div>

                <!-- Remember me and Forgot password -->
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <input 
                            id="remember-me" 
                            name="remember-me" 
                            type="checkbox" 
                            class="h-4 w-4 text-primary focus:ring-primary border-gray-300 dark:border-gray-600 dark:bg-gray-700 rounded transition-colors"
                        >
                        <label for="remember-me" class="ml-2 block text-sm text-gray-700 dark:text-gray-300">
                            Remember me
                        </label>
                    </div>

                    <div class="text-sm">
                        <a href="#" onclick="showForgotPasswordModal()" class="text-primary hover:text-opacity-80 font-medium transition-colors">
                            Forgot password?
                        </a>
                    </div>
                </div>

                <!-- Submit Button -->
                <div>
                    <button 
                        type="submit" 
                        id="submit-btn"
                        class="w-full bg-primary hover:bg-opacity-90 text-white font-semibold py-3 px-4 rounded-xl focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary transition-all duration-200 shadow-lg transform hover:scale-105 disabled:opacity-50 disabled:cursor-not-allowed disabled:transform-none"
                    >
                        <span id="submit-text">Sign In</span>
                        <i id="submit-loading" class="fas fa-spinner fa-spin ml-2 hidden"></i>
                    </button>
                </div>

                <!-- Register Link -->
                <div class="text-center">
                    <p class="text-sm text-gray-600 dark:text-gray-400">
                        Don't have an account? 
                        <a href="{{ route('betpro.register') }}" class="text-primary hover:text-opacity-80 font-semibold transition-colors">
                            Sign up
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

        <!-- Social Login -->
        <div class="bg-white dark:bg-gray-800 shadow-xl rounded-2xl p-6 border border-gray-200 dark:border-gray-700 transition-colors duration-300">
            <div class="text-center mb-4">
                <p class="text-sm text-gray-500 dark:text-gray-400">Or continue with</p>
            </div>
            <div class="grid grid-cols-2 gap-3">
                <button onclick="loginWithGoogle()" class="flex items-center justify-center px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-xl shadow-sm text-sm font-medium text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 transition-all duration-200">
                    <i class="fab fa-google text-red-500 mr-2"></i>
                    Google
                </button>
                <button onclick="loginWithApple()" class="flex items-center justify-center px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-xl shadow-sm text-sm font-medium text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 transition-all duration-200">
                    <i class="fab fa-apple text-gray-800 dark:text-white mr-2"></i>
                    Apple
                </button>
            </div>
        </div>

        <!-- Demo Accounts -->
        <div class="bg-gradient-to-r from-blue-50 to-indigo-50 dark:from-gray-800 dark:to-gray-700 rounded-2xl p-6 border border-blue-200 dark:border-gray-600">
            <div class="text-center mb-4">
                <h3 class="text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                    <i class="fas fa-user-cog mr-2 text-primary"></i>Demo Accounts
                </h3>
                <p class="text-xs text-gray-500 dark:text-gray-400">Try BetPro without registration</p>
            </div>
            <div class="grid grid-cols-1 gap-2">
                <button onclick="loginAsDemo('user')" class="flex items-center justify-center px-4 py-2 bg-white dark:bg-gray-700 border border-gray-200 dark:border-gray-600 rounded-lg shadow-sm text-sm font-medium text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-600 transition-all duration-200">
                    <i class="fas fa-user mr-2 text-blue-500"></i>
                    Demo User
                </button>
                <button onclick="loginAsDemo('admin')" class="flex items-center justify-center px-4 py-2 bg-white dark:bg-gray-700 border border-gray-200 dark:border-gray-600 rounded-lg shadow-sm text-sm font-medium text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-600 transition-all duration-200">
                    <i class="fas fa-user-shield mr-2 text-purple-500"></i>
                    Demo Admin
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
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">Login Successful!</h3>
                <p class="text-gray-600 dark:text-gray-400 mb-6">Welcome back! Redirecting to your dashboard...</p>
                <div class="flex justify-center">
                    <div class="animate-spin rounded-full h-6 w-6 border-b-2 border-primary"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Forgot Password Modal -->
    <div id="forgotPasswordModal" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50 flex items-center justify-center p-4">
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-2xl max-w-md w-full">
            <div class="p-6 border-b border-gray-200 dark:border-gray-700">
                <div class="flex justify-between items-center">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Reset Password</h3>
                    <button onclick="closeModal('forgotPasswordModal')" class="text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200 transition-colors">
                        <i class="fas fa-times text-xl"></i>
                    </button>
                </div>
            </div>
            <form id="forgot-password-form" class="p-6">
                <div class="mb-4">
                    <label for="reset-email" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                        <i class="fas fa-envelope mr-2 text-primary"></i>Email Address
                    </label>
                    <input 
                        id="reset-email" 
                        type="email" 
                        required 
                        class="w-full px-4 py-3 text-base border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-xl shadow-sm placeholder-gray-400 dark:placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition-all duration-200"
                        placeholder="Enter your email address"
                    >
                </div>
                <p class="text-sm text-gray-600 dark:text-gray-400 mb-6">
                    We'll send you a link to reset your password.
                </p>
                <div class="flex space-x-3">
                    <button type="button" onclick="closeModal('forgotPasswordModal')" class="flex-1 bg-gray-200 dark:bg-gray-600 text-gray-800 dark:text-gray-200 py-3 rounded-lg font-semibold hover:bg-gray-300 dark:hover:bg-gray-500 transition-all duration-200">Cancel</button>
                    <button type="submit" class="flex-1 bg-primary text-white py-3 rounded-lg font-semibold hover:bg-opacity-90 transition-all duration-200">Send Reset Link</button>
                </div>
            </form>
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

        // Password toggle
        function togglePassword() {
            const field = document.getElementById('password');
            const toggle = document.getElementById('password-toggle');
            
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
        function showForgotPasswordModal() {
            document.getElementById('forgotPasswordModal').classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }

        function closeModal(modalId) {
            document.getElementById(modalId).classList.add('hidden');
            document.body.style.overflow = 'auto';
        }

        // Social login functions
        function loginWithGoogle() {
            showMessage('Google login coming soon!', 'success');
        }

        function loginWithApple() {
            showMessage('Apple login coming soon!', 'success');
        }

        // Demo login functions
        function loginAsDemo(type) {
            const submitBtn = document.getElementById('submit-btn');
            const submitText = document.getElementById('submit-text');
            const submitLoading = document.getElementById('submit-loading');
            
            submitBtn.disabled = true;
            submitText.textContent = 'Signing in...';
            submitLoading.classList.remove('hidden');
            
            setTimeout(() => {
                document.getElementById('successModal').classList.remove('hidden');
                document.body.style.overflow = 'hidden';
                
                setTimeout(() => {
                    if (type === 'admin') {
                        window.location.href = 'admin-dashboard.html';
                    } else {
                        window.location.href = 'dashboard.html';
                    }
                }, 2000);
            }, 1500);
        }

        // Form validation
        function validateForm() {
            let isValid = true;
            
            // Clear previous errors
            document.querySelectorAll('[id$="-error"]').forEach(el => el.classList.add('hidden'));
            
            const email = document.getElementById('email').value.trim();
            const password = document.getElementById('password').value;
            
            // Email validation
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!email || !emailRegex.test(email)) {
                document.getElementById('email-error').classList.remove('hidden');
                isValid = false;
            }
            
            // Password validation
            if (!password) {
                document.getElementById('password-error').classList.remove('hidden');
                isValid = false;
            }
            
            return isValid;
        }

        // Form submission
        document.getElementById('login-form').addEventListener('submit', function(e) {
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
            submitText.textContent = 'Signing in...';
            submitLoading.classList.remove('hidden');
            
            // Simulate login process
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

        // Forgot password form submission
        document.getElementById('forgot-password-form').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const email = document.getElementById('reset-email').value.trim();
            
            if (!email) {
                showMessage('Please enter your email address');
                return;
            }
            
            showMessage('Password reset link sent to your email!', 'success');
            closeModal('forgotPasswordModal');
            this.reset();
        });

        // Close modals when clicking outside
        window.addEventListener('click', function(event) {
            const modals = ['forgotPasswordModal'];
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