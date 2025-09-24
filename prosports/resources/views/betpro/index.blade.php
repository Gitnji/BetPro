@extends('layout.app')
@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BetPro - Professional Sports Betting Services</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#1e40af',
                        secondary: '#3b82f6',
                        accent: '#10b981',
                        danger: '#ef4444'
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-gray-50">
    <!-- Navigation -->
    <nav class="bg-white shadow-lg fixed w-full top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <h1 class="text-2xl font-bold text-primary">BetPro</h1>
                    </div>
                    <div class="hidden md:ml-6 md:flex md:space-x-8">
                        <a href="#home" class="text-gray-900 hover:text-primary px-3 py-2 text-sm font-medium">Home</a>
                        <a href="#tips" class="text-gray-500 hover:text-primary px-3 py-2 text-sm font-medium">Tips</a>
                        <a href="#courses" class="text-gray-500 hover:text-primary px-3 py-2 text-sm font-medium">Courses</a>
                        <a href="#ebooks" class="text-gray-500 hover:text-primary px-3 py-2 text-sm font-medium">E-books</a>
                        <a href="#plans" class="text-gray-500 hover:text-primary px-3 py-2 text-sm font-medium">Plans</a>
                    </div>
                </div>
                <div class="flex items-center space-x-4">
                    <a href="{{ route('betpro.login') }}" class="text-gray-600 hover:text-gray-900">Log In</a>
                    <a href="{{ route('betpro.register') }}" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded">Sign Up</a>
                    <button class="md:hidden" onclick="toggleMobileMenu()">
                        <i class="fas fa-bars text-gray-500"></i>
                    </button>
                </div>
            </div>
        </div>
        <!-- Mobile menu -->
        <div id="mobileMenu" class="hidden md:hidden bg-white border-t">
            <div class="px-2 pt-2 pb-3 space-y-1">
                <a href="#home" class="block px-3 py-2 text-gray-900 hover:text-primary">Home</a>
                <a href="#tips" class="block px-3 py-2 text-gray-500 hover:text-primary">Tips</a>
                <a href="#courses" class="block px-3 py-2 text-gray-500 hover:text-primary">Courses</a>
                <a href="#ebooks" class="block px-3 py-2 text-gray-500 hover:text-primary">E-books</a>
                <a href="#plans" class="block px-3 py-2 text-gray-500 hover:text-primary">Plans</a>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="home" class="pt-16 bg-gradient-to-br from-primary to-secondary text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
            <div class="text-center">
                <h1 class="text-4xl md:text-6xl font-bold mb-6">
                    Turn Sports Betting Into a <span class="text-yellow-400">Business</span>
                </h1>
                <p class="text-xl md:text-2xl mb-8 text-blue-100">
                    Professional betting tips, comprehensive courses, and proven strategies to maximize your profits
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <button  class="bg-accent text-white px-8 py-4 rounded-lg text-lg font-semibold hover:bg-green-600 transition duration-200">
                        <a href="{{ route('betpro.register') }}"> Start Free Trial</a>
                    </button>
                    <button onclick="scrollToSection('tips')" class="border-2 border-white text-white px-8 py-4 rounded-lg text-lg font-semibold hover:bg-white hover:text-primary transition duration-200">
                        View Free Tips
                    </button>
                </div>
            </div>
        </div>
    </section>

    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Why Choose Our Platform?</h2>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                    Our advanced analytics and expert insights help you make smarter betting decisions
                </p>
            </div>
            <div class="grid md:grid-cols-3 gap-8">
                <div class="text-center">
                    <div class="bg-green-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Expert Analytics</h3>
                    <p class="text-gray-600">Advanced statistical analysis and data-driven insights for better betting decisions</p>
                </div>
                <div class="text-center">
                    <div class="bg-green-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">High-Value Odds</h3>
                    <p class="text-gray-600">Carefully selected matches with odds ranging from 2x to 10x potential returns</p>
                </div>
                <div class="text-center">
                    <div class="bg-green-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Daily Updates</h3>
                    <p class="text-gray-600">Fresh matches and odds delivered daily to keep you ahead of the game</p>
                </div>
            </div>
        </div>
    </section>


    <!-- Free Tips Section -->
    <section id="tips" class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Today's Free Tips</h2>
                <p class="text-xl text-gray-600">Get a taste of our professional betting analysis</p>
            </div>
            <div class="grid md:grid-cols-3 gap-8">
                <div class="bg-gray-50 rounded-lg p-6 border-l-4 border-accent">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-lg font-semibold text-gray-900">Premier League</h3>
                        <span class="bg-accent text-white px-2 py-1 rounded text-sm">High Confidence</span>
                    </div>
                    <p class="text-gray-700 mb-4">Manchester City vs Arsenal</p>
                    <p class="text-sm text-gray-600 mb-4">Over 2.5 Goals @ 1.85</p>
                    <div class="flex items-center text-sm text-gray-500">
                        <i class="fas fa-clock mr-2"></i>
                        <span>Kickoff: 15:00 GMT</span>
                    </div>
                </div>
                <div class="bg-gray-50 rounded-lg p-6 border-l-4 border-yellow-500">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-lg font-semibold text-gray-900">NBA</h3>
                        <span class="bg-yellow-500 text-white px-2 py-1 rounded text-sm">Medium Confidence</span>
                    </div>
                    <p class="text-gray-700 mb-4">Lakers vs Warriors</p>
                    <p class="text-sm text-gray-600 mb-4">Lakers +5.5 @ 1.90</p>
                    <div class="flex items-center text-sm text-gray-500">
                        <i class="fas fa-clock mr-2"></i>
                        <span>Tip-off: 20:00 EST</span>
                    </div>
                </div>
                <div class="bg-gray-50 rounded-lg p-6 border-l-4 border-primary">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-lg font-semibold text-gray-900">Champions League</h3>
                        <span class="bg-primary text-white px-2 py-1 rounded text-sm">High Confidence</span>
                    </div>
                    <p class="text-gray-700 mb-4">Barcelona vs PSG</p>
                    <p class="text-sm text-gray-600 mb-4">BTTS Yes @ 1.75</p>
                    <div class="flex items-center text-sm text-gray-500">
                        <i class="fas fa-clock mr-2"></i>
                        <span>Kickoff: 21:00 CET</span>
                    </div>
                </div>
            </div>
            <div class="text-center mt-8">
                <button  class="bg-primary text-white px-8 py-3 rounded-lg font-semibold hover:bg-blue-700 transition duration-200">
                    <a href="register.html">Get More Premium Tips</a>
                </button>
            </div>
        </div>
    </section>

    <!-- Plans Section -->
    <section id="plans" class="py-16 bg-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Choose Your Plan</h2>
                <p class="text-xl text-gray-600">Select the perfect plan for your betting journey</p>
            </div>
            <div class="grid md:grid-cols-4 gap-8">
                <!-- Free Plan -->
                <div class="bg-white rounded-lg shadow-lg p-6">
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Free</h3>
                    <p class="text-3xl font-bold text-gray-900 mb-4">$0<span class="text-sm text-gray-500">/month</span></p>
                    <ul class="space-y-3 mb-6">
                        <li class="flex items-center"><i class="fas fa-check text-accent mr-2"></i> 2-3 tips daily</li>
                        <li class="flex items-center"><i class="fas fa-check text-accent mr-2"></i> Basic analysis</li>
                        <li class="flex items-center"><i class="fas fa-check text-accent mr-2"></i> Community access</li>
                    </ul>
                    <button class="w-full bg-gray-200 text-gray-800 py-2 rounded-lg font-semibold">Current Plan</button>
                </div>
                <!-- Starter Plan -->
                <div class="bg-white rounded-lg shadow-lg p-6">
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Starter</h3>
                    <p class="text-3xl font-bold text-gray-900 mb-4">$29<span class="text-sm text-gray-500">/month</span></p>
                    <ul class="space-y-3 mb-6">
                        <li class="flex items-center"><i class="fas fa-check text-accent mr-2"></i> 2 to 3 odds daily</li>
                        <li class="flex items-center"><i class="fas fa-check text-accent mr-2"></i> Detailed analysis</li>
                        <li class="flex items-center"><i class="fas fa-check text-accent mr-2"></i> Bet tracker</li>
                        <li class="flex items-center"><i class="fas fa-check text-accent mr-2"></i> 1 E-book</li>
                    </ul>
                    <button class="w-full bg-primary text-white py-2 rounded-lg font-semibold hover:bg-blue-700 transition duration-200">Choose Plan</button>
                </div>
                <!-- Pro Plan -->
                <div class="bg-white rounded-lg shadow-lg p-6 border-2 border-accent relative">
                    <div class="absolute -top-3 left-1/2 transform -translate-x-1/2">
                        <span class="bg-accent text-white px-4 py-1 rounded-full text-sm font-semibold">Most Popular</span>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Pro</h3>
                    <p class="text-3xl font-bold text-gray-900 mb-4">$59<span class="text-sm text-gray-500">/month</span></p>
                    <ul class="space-y-3 mb-6">
                        <li class="flex items-center"><i class="fas fa-check text-accent mr-2"></i> 2 to 5 odds daily</li>
                        <li class="flex items-center"><i class="fas fa-check text-accent mr-2"></i> Expert analysis</li>
                        <li class="flex items-center"><i class="fas fa-check text-accent mr-2"></i> Advanced bet tracker</li>
                        <li class="flex items-center"><i class="fas fa-check text-accent mr-2"></i> All E-books</li>
                        <li class="flex items-center"><i class="fas fa-check text-accent mr-2"></i> 2 courses</li>
                    </ul>
                    <button class="w-full bg-accent text-white py-2 rounded-lg font-semibold hover:bg-green-600 transition duration-200">Choose Plan</button>
                </div>
                <!-- Elite Plan -->
                <div class="bg-white rounded-lg shadow-lg p-6">
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Elite</h3>
                    <p class="text-3xl font-bold text-gray-900 mb-4">$99<span class="text-sm text-gray-500">/month</span></p>
                    <ul class="space-y-3 mb-6">
                        <li class="flex items-center"><i class="fas fa-check text-accent mr-2"></i> Investment odds daily</li>
                        <li class="flex items-center"><i class="fas fa-check text-accent mr-2"></i> VIP analysis</li>
                        <li class="flex items-center"><i class="fas fa-check text-accent mr-2"></i> Pro bet tracker</li>
                        <li class="flex items-center"><i class="fas fa-check text-accent mr-2"></i> All E-books</li>
                        <li class="flex items-center"><i class="fas fa-check text-accent mr-2"></i> All courses</li>
                        <li class="flex items-center"><i class="fas fa-check text-accent mr-2"></i> 1-on-1 support</li>
                    </ul>
                    <button class="w-full bg-primary text-white py-2 rounded-lg font-semibold hover:bg-blue-700 transition duration-200">Choose Plan</button>
                </div>
            </div>
        </div>
    </section>

    <!-- Courses Section -->
    <section id="courses" class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Professional Courses</h2>
                <p class="text-xl text-gray-600">Master the art of profitable sports betting</p>
            </div>
            <div class="grid md:grid-cols-3 gap-8">
                <div class="bg-gray-50 rounded-lg overflow-hidden shadow-lg">
                    <div class="h-48 bg-gradient-to-br from-primary to-secondary"></div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-900 mb-2">Betting Fundamentals</h3>
                        <p class="text-gray-600 mb-4">Learn the basics of sports betting, bankroll management, and risk assessment.</p>
                        <div class="flex items-center justify-between mb-4">
                            <span class="text-2xl font-bold text-primary">$49</span>
                            <span class="text-sm text-gray-500">4 hours</span>
                        </div>
                        <button class="w-full bg-primary text-white py-2 rounded-lg font-semibold hover:bg-blue-700 transition duration-200">Enroll Now</button>
                    </div>
                </div>
                <div class="bg-gray-50 rounded-lg overflow-hidden shadow-lg">
                    <div class="h-48 bg-gradient-to-br from-accent to-green-600"></div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-900 mb-2">Advanced Analytics</h3>
                        <p class="text-gray-600 mb-4">Deep dive into statistical analysis, value betting, and market inefficiencies.</p>
                        <div class="flex items-center justify-between mb-4">
                            <span class="text-2xl font-bold text-primary">$99</span>
                            <span class="text-sm text-gray-500">8 hours</span>
                        </div>
                        <button class="w-full bg-primary text-white py-2 rounded-lg font-semibold hover:bg-blue-700 transition duration-200">Enroll Now</button>
                    </div>
                </div>
                <div class="bg-gray-50 rounded-lg overflow-hidden shadow-lg">
                    <div class="h-48 bg-gradient-to-br from-yellow-500 to-orange-500"></div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-900 mb-2">Psychology of Betting</h3>
                        <p class="text-gray-600 mb-4">Master emotional control, discipline, and the mental game of professional betting.</p>
                        <div class="flex items-center justify-between mb-4">
                            <span class="text-2xl font-bold text-primary">$79</span>
                            <span class="text-sm text-gray-500">6 hours</span>
                        </div>
                        <button class="w-full bg-primary text-white py-2 rounded-lg font-semibold hover:bg-blue-700 transition duration-200">Enroll Now</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- E-books Section -->
    <section id="ebooks" class="py-16 bg-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">E-books Library</h2>
                <p class="text-xl text-gray-600">Comprehensive guides to elevate your betting game</p>
            </div>
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="bg-white rounded-lg shadow-lg p-6">
                    <div class="h-32 bg-gradient-to-br from-primary to-secondary rounded mb-4"></div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">The Complete Guide to Sports Betting</h3>
                    <p class="text-sm text-gray-600 mb-4">150 pages of comprehensive betting strategies</p>
                    <button class="w-full bg-accent text-white py-2 rounded-lg font-semibold hover:bg-green-600 transition duration-200">Download</button>
                </div>
                <div class="bg-white rounded-lg shadow-lg p-6">
                    <div class="h-32 bg-gradient-to-br from-accent to-green-600 rounded mb-4"></div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">Bankroll Management Mastery</h3>
                    <p class="text-sm text-gray-600 mb-4">Protect and grow your betting capital</p>
                    <button class="w-full bg-accent text-white py-2 rounded-lg font-semibold hover:bg-green-600 transition duration-200">Download</button>
                </div>
                <div class="bg-white rounded-lg shadow-lg p-6">
                    <div class="h-32 bg-gradient-to-br from-yellow-500 to-orange-500 rounded mb-4"></div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">Value Betting Secrets</h3>
                    <p class="text-sm text-gray-600 mb-4">Find profitable opportunities in the market</p>
                    <button class="w-full bg-accent text-white py-2 rounded-lg font-semibold hover:bg-green-600 transition duration-200">Download</button>
                </div>
                <div class="bg-white rounded-lg shadow-lg p-6">
                    <div class="h-32 bg-gradient-to-br from-purple-500 to-pink-500 rounded mb-4"></div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">Live Betting Strategies</h3>
                    <p class="text-sm text-gray-600 mb-4">Master in-play betting techniques</p>
                    <button class="w-full bg-accent text-white py-2 rounded-lg font-semibold hover:bg-green-600 transition duration-200">Download</button>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-4 gap-8">
                <div>
                    <h3 class="text-2xl font-bold mb-4">BetPro</h3>
                    <p class="text-gray-400">Professional sports betting services to help you turn betting into a profitable business.</p>
                </div>
                <div>
                    <h4 class="text-lg font-semibold mb-4">Services</h4>
                    <ul class="space-y-2 text-gray-400">
                        <li><a href="#" class="hover:text-white">Betting Tips</a></li>
                        <li><a href="#" class="hover:text-white">Courses</a></li>
                        <li><a href="#" class="hover:text-white">E-books</a></li>
                        <li><a href="#" class="hover:text-white">Bet Tracker</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-lg font-semibold mb-4">Support</h4>
                    <ul class="space-y-2 text-gray-400">
                        <li><a href="#" class="hover:text-white">Help Center</a></li>
                        <li><a href="#" class="hover:text-white">Contact Us</a></li>
                        <li><a href="#" class="hover:text-white">Terms of Service</a></li>
                        <li><a href="#" class="hover:text-white">Privacy Policy</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-lg font-semibold mb-4">Connect</h4>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-400 hover:text-white"><i class="fab fa-twitter text-xl"></i></a>
                        <a href="#" class="text-gray-400 hover:text-white"><i class="fab fa-facebook text-xl"></i></a>
                        <a href="#" class="text-gray-400 hover:text-white"><i class="fab fa-instagram text-xl"></i></a>
                        <a href="#" class="text-gray-400 hover:text-white"><i class="fab fa-youtube text-xl"></i></a>
                    </div>
                </div>
            </div>
            <div class="border-t border-gray-800 mt-8 pt-8 text-center text-gray-400">
                <p>&copy; 2024 BetPro. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script >

        // Modal functions
        function openModal(modalId) {
            document.getElementById(modalId).classList.remove('hidden');
        }

        function closeModal(modalId) {
            document.getElementById(modalId).classList.add('hidden');
        }

        // Mobile menu toggle
        function toggleMobileMenu() {
            const mobileMenu = document.getElementById('mobileMenu');
            mobileMenu.classList.toggle('hidden');
        }

        // Smooth scrolling
        function scrollToSection(sectionId) {
            document.getElementById(sectionId).scrollIntoView({
                behavior: 'smooth'
            });
        }

        // Authentication functions
        function loginUser() {
            // Simulate login process
            alert('Login successful! Redirecting to dashboard...');
            closeModal('loginModal');
            // In a real app, you would validate credentials and redirect
            window.location.href = 'dashboard.html';
        }

        function registerUser() {
            // Simulate registration process
            alert('Registration successful! Please check your email for verification.');
            closeModal('registerModal');
            // In a real app, you would send registration data to server
        }



        // Navbar scroll effect
        window.addEventListener('scroll', function() {
            const nav = document.querySelector('nav');
            if (window.scrollY > 50) {
                nav.classList.add('shadow-lg');
            } else {
                nav.classList.remove('shadow-lg');
            }
        });

        // Initialize page
        document.addEventListener('DOMContentLoaded', function() {
            // Add any initialization code here
            console.log('BetPro website loaded successfully');
        });
    </script>
</body>
</html>
@endsection