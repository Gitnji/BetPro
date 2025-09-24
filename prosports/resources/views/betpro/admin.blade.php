
@extends('layout.app')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - BetPro</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
<body class="bg-gray-50 dark:bg-gray-900 transition-colors duration-300">
    <!-- Navigation -->
    <nav class="bg-white dark:bg-gray-800 shadow-lg transition-colors duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <h1 class="text-2xl font-bold text-primary">BetPro Admin</h1>
                    </div>
                    <div class="hidden md:ml-6 md:flex md:space-x-8">
                        <a href="#overview" class="text-primary border-b-2 border-primary px-3 py-2 text-sm font-medium">Overview</a>
                        <a href="#users" class="text-gray-500 dark:text-gray-400 hover:text-primary px-3 py-2 text-sm font-medium transition-colors">Users</a>
                        <a href="#tips" class="text-gray-500 dark:text-gray-400 hover:text-primary px-3 py-2 text-sm font-medium transition-colors">Tips & Odds</a>
                        <a href="#courses" class="text-gray-500 dark:text-gray-400 hover:text-primary px-3 py-2 text-sm font-medium transition-colors">Courses</a>
                        <a href="#ebooks" class="text-gray-500 dark:text-gray-400 hover:text-primary px-3 py-2 text-sm font-medium transition-colors">E-books</a>
                    </div>
                </div>
                <div class="flex items-center space-x-4">
                    <div class="relative">
                        <button class="flex items-center space-x-2 text-gray-700 dark:text-gray-300 hover:text-primary transition-colors">
                            <div class="w-8 h-8 rounded-full bg-gradient-to-br from-primary to-secondary flex items-center justify-center text-white font-semibold text-sm">
                                <i class="fa-solid fa-user"></i>
                            </div>
                            <span class="hidden md:block">Nji</span>
                            <i class="fas fa-chevron-down text-sm"></i>
                        </button>
                    </div>
                    <button onclick="showLogoutModal()" class="text-gray-500 dark:text-gray-400 hover:text-primary transition-colors">
                        <i class="fas fa-sign-out-alt"></i>
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Overview Section -->
        <section id="overview" class="mb-8">
            <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-6">Admin Overview</h2>
            
            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6 transform hover:scale-105 transition-all duration-200">
                    <div class="flex items-center">
                        <div class="p-3 bg-primary bg-opacity-20 rounded-xl">
                            <i class="fas fa-users text-primary text-xl"></i>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm text-gray-600 dark:text-gray-400">Total Users</p>
                            <p class="text-2xl font-bold text-gray-900 dark:text-white">{{ $totalUsers }}</p>
                        </div>
                    </div>
                </div>
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6 transform hover:scale-105 transition-all duration-200">
                    <div class="flex items-center">
                        <div class="p-3 bg-accent bg-opacity-20 rounded-xl">
                            <i class="fas fa-dollar-sign text-accent text-xl"></i>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm text-gray-600 dark:text-gray-400">Monthly Revenue</p>
                            <p class="text-2xl font-bold text-accent">$45,230</p>
                        </div>
                    </div>
                </div>
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6 transform hover:scale-105 transition-all duration-200">
                    <div class="flex items-center">
                        <div class="p-3 bg-yellow-500 bg-opacity-20 rounded-xl">
                            <i class="fas fa-chart-line text-yellow-500 text-xl"></i>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm text-gray-600 dark:text-gray-400">Active Subscriptions</p>
                            <p class="text-2xl font-bold text-gray-900 dark:text-white">892</p>
                        </div>
                    </div>
                </div>
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6 transform hover:scale-105 transition-all duration-200">
                    <div class="flex items-center">
                        <div class="p-3 bg-purple-500 bg-opacity-20 rounded-xl">
                            <i class="fas fa-lightbulb text-purple-500 text-xl"></i>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm text-gray-600 dark:text-gray-400">Tips Published</p>
                            <p class="text-2xl font-bold text-gray-900 dark:text-white">3,456</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Revenue Chart -->
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6 mb-8">
                <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-4">Monthly Revenue</h3>
                <div class="relative h-64 w-full">
                    <canvas id="revenueChart"></canvas>
                </div>
            </div>
        </section>

        <!-- Users Management Section -->
        <section id="users" class="mb-8">
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6 space-y-4 sm:space-y-0">
                <h2 class="text-3xl font-bold text-gray-900 dark:text-white">User Management</h2>
                <div class="flex space-x-4">
                    <input type="text" id="userSearch" placeholder="Search users..." class="px-4 py-2 text-base border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                    <button onclick="searchUsers()" class="bg-primary text-white px-4 py-2 rounded-lg hover:bg-opacity-90 transition-all duration-200">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>

            <!-- Users Table -->
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="min-w-full">
                        <thead class="bg-gray-50 dark:bg-gray-700">
                            <tr>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider">User</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider">Email</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider">Plan</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider">Status</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider">Joined</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                            @foreach($users as $user)
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="h-10 w-10 rounded-full bg-gradient-to-br from-primary to-secondary flex items-center justify-center text-white font-semibold">
                                            JD
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900 dark:text-white">{{ $user->name }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-300">{{ $user->email }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-300">Pro</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-3 py-1 text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200">Active</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-300">{{ $user->created_at }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <button onclick="editUser('user1')" class="text-primary hover:text-opacity-80 mr-3 transition-colors">Edit</button>
                                    <button onclick="suspendUser('user1')" class="text-red-600 hover:text-red-800 transition-colors">Suspend</button>
                                </td>
                            </tr>
                            <!-- <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="h-10 w-10 rounded-full bg-gradient-to-br from-accent to-green-600 flex items-center justify-center text-white font-semibold">
                                            JS
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900 dark:text-white">Jane Smith</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-300">jane@example.com</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-300">Starter</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-3 py-1 text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200">Active</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-300">2024-01-10</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <button onclick="editUser('user2')" class="text-primary hover:text-opacity-80 mr-3 transition-colors">Edit</button>
                                    <button onclick="suspendUser('user2')" class="text-red-600 hover:text-red-800 transition-colors">Suspend</button>
                                </td>
                            </tr> -->
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>

        <!-- Tips Management Section -->
        <section id="tips" class="mb-8">
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6 space-y-4 sm:space-y-0">
                <h2 class="text-3xl font-bold text-gray-900 dark:text-white">Tips & Odds Management</h2>
                <button onclick="openModal('addTipModal')" class="bg-primary text-white px-6 py-3 rounded-xl hover:bg-opacity-90 transition-all duration-200 shadow-lg font-semibold">
                    <i class="fas fa-plus mr-2"></i>Add Tip
                </button>
            </div>

            <!-- Tips Grid -->
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6 border-2 border-transparent hover:border-primary transition-all duration-200">
                    <div class="flex justify-between items-start mb-4">
                        <div class="flex items-center space-x-3">
                            <div class="p-2 bg-blue-100 dark:bg-blue-900 rounded-lg">
                                <i class="fas fa-futbol text-blue-600 dark:text-blue-400"></i>
                            </div>
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Premier League</h3>
                        </div>
                        <div class="flex space-x-2">
                            <button onclick="editTip('tip1')" class="text-primary hover:text-opacity-80 transition-colors">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button onclick="deleteTip('tip1')" class="text-red-600 hover:text-red-800 transition-colors">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    </div>
                    <p class="text-gray-700 dark:text-gray-300 mb-2 font-medium">Manchester City vs Arsenal</p>
                    <p class="text-sm text-gray-600 dark:text-gray-400 mb-3">Over 2.5 Goals @ 1.85</p>
                    <div class="flex justify-between items-center mb-3">
                        <span class="bg-accent text-white px-3 py-1 rounded-full text-sm font-semibold">High Confidence</span>
                        <span class="text-sm text-gray-500 dark:text-gray-400">15:00 GMT</span>
                    </div>
                    <div class="flex justify-between items-center text-sm">
                        <span class="text-gray-600 dark:text-gray-400">Accuracy: <span class="font-semibold text-green-600">85%</span></span>
                        <span class="text-gray-600 dark:text-gray-400">Price: <span class="font-semibold text-primary">5 credits</span></span>
                    </div>
                </div>

                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6 border-2 border-transparent hover:border-primary transition-all duration-200">
                    <div class="flex justify-between items-start mb-4">
                        <div class="flex items-center space-x-3">
                            <div class="p-2 bg-orange-100 dark:bg-orange-900 rounded-lg">
                                <i class="fas fa-basketball-ball text-orange-600 dark:text-orange-400"></i>
                            </div>
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">NBA</h3>
                        </div>
                        <div class="flex space-x-2">
                            <button onclick="editTip('tip2')" class="text-primary hover:text-opacity-80 transition-colors">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button onclick="deleteTip('tip2')" class="text-red-600 hover:text-red-800 transition-colors">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    </div>
                    <p class="text-gray-700 dark:text-gray-300 mb-2 font-medium">Lakers vs Warriors</p>
                    <p class="text-sm text-gray-600 dark:text-gray-400 mb-3">Lakers +5.5 @ 1.90</p>
                    <div class="flex justify-between items-center mb-3">
                        <span class="bg-yellow-500 text-white px-3 py-1 rounded-full text-sm font-semibold">Medium Confidence</span>
                        <span class="text-sm text-gray-500 dark:text-gray-400">20:00 EST</span>
                    </div>
                    <div class="flex justify-between items-center text-sm">
                        <span class="text-gray-600 dark:text-gray-400">Accuracy: <span class="font-semibold text-green-600">78%</span></span>
                        <span class="text-gray-600 dark:text-gray-400">Price: <span class="font-semibold text-primary">3 credits</span></span>
                    </div>
                </div>
            </div>
        </section>

        <!-- Courses Management Section -->
        <section id="courses" class="mb-8">
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6 space-y-4 sm:space-y-0">
                <h2 class="text-3xl font-bold text-gray-900 dark:text-white">Courses Management</h2>
                <button onclick="openModal('addCourseModal')" class="bg-primary text-white px-6 py-3 rounded-xl hover:bg-opacity-90 transition-all duration-200 shadow-lg font-semibold">
                    <i class="fas fa-plus mr-2"></i>Add Course
                </button>
            </div>

            <!-- Courses Grid -->
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg overflow-hidden transform hover:scale-105 transition-all duration-200">
                    <div class="h-32 bg-gradient-to-br from-primary to-secondary"></div>
                    <div class="p-6">
                        <div class="flex justify-between items-start mb-3">
                            <div>
                                <h3 class="text-lg font-bold text-gray-900 dark:text-white">Betting Fundamentals</h3>
                                <span class="inline-block bg-blue-100 dark:bg-blue-900 text-blue-800 dark:text-blue-200 text-xs px-2 py-1 rounded-full mt-1">Beginner</span>
                            </div>
                            <div class="flex space-x-2">
                                <button onclick="editCourse('course1')" class="text-primary hover:text-opacity-80 transition-colors">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button onclick="deleteCourse('course1')" class="text-red-600 hover:text-red-800 transition-colors">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </div>
                        <p class="text-gray-600 dark:text-gray-400 mb-4 text-sm">Learn the basics of sports betting and bankroll management strategies.</p>
                        <div class="flex justify-between items-center mb-2">
                            <span class="text-xl font-bold text-primary">$49.99</span>
                            <span class="text-sm text-gray-500 dark:text-gray-400">156 enrolled</span>
                        </div>
                        <div class="text-xs text-gray-500 dark:text-gray-400">
                            <span>8 hours • 12 lessons</span>
                        </div>
                    </div>
                </div>

                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg overflow-hidden transform hover:scale-105 transition-all duration-200">
                    <div class="h-32 bg-gradient-to-br from-accent to-green-600"></div>
                    <div class="p-6">
                        <div class="flex justify-between items-start mb-3">
                            <div>
                                <h3 class="text-lg font-bold text-gray-900 dark:text-white">Advanced Analytics</h3>
                                <span class="inline-block bg-red-100 dark:bg-red-900 text-red-800 dark:text-red-200 text-xs px-2 py-1 rounded-full mt-1">Advanced</span>
                            </div>
                            <div class="flex space-x-2">
                                <button onclick="editCourse('course2')" class="text-primary hover:text-opacity-80 transition-colors">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button onclick="deleteCourse('course2')" class="text-red-600 hover:text-red-800 transition-colors">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </div>
                        <p class="text-gray-600 dark:text-gray-400 mb-4 text-sm">Deep dive into statistical analysis and advanced value betting techniques.</p>
                        <div class="flex justify-between items-center mb-2">
                            <span class="text-xl font-bold text-primary">$99.99</span>
                            <span class="text-sm text-gray-500 dark:text-gray-400">89 enrolled</span>
                        </div>
                        <div class="text-xs text-gray-500 dark:text-gray-400">
                            <span>16 hours • 24 lessons</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- E-books Management Section -->
        <section id="ebooks" class="mb-8">
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6 space-y-4 sm:space-y-0">
                <h2 class="text-3xl font-bold text-gray-900 dark:text-white">E-books Management</h2>
                <button onclick="openModal('addEbookModal')" class="bg-primary text-white px-6 py-3 rounded-xl hover:bg-opacity-90 transition-all duration-200 shadow-lg font-semibold">
                    <i class="fas fa-plus mr-2"></i>Add E-book
                </button>
            </div>

            <!-- E-books Grid -->
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6 transform hover:scale-105 transition-all duration-200">
                    <div class="h-32 bg-gradient-to-br from-primary to-secondary rounded-lg mb-4"></div>
                    <div class="flex justify-between items-start mb-2">
                        <h3 class="text-sm font-bold text-gray-900 dark:text-white">Complete Guide to Sports Betting</h3>
                        <div class="flex space-x-1">
                            <button onclick="editEbook('ebook1')" class="text-primary hover:text-opacity-80 transition-colors">
                                <i class="fas fa-edit text-sm"></i>
                            </button>
                            <button onclick="deleteEbook('ebook1')" class="text-red-600 hover:text-red-800 transition-colors">
                                <i class="fas fa-trash text-sm"></i>
                            </button>
                        </div>
                    </div>
                    <p class="text-xs text-gray-600 dark:text-gray-400 mb-2">234 downloads • $14.99</p>
                    <span class="text-xs bg-green-100 dark:bg-green-900 text-green-800 dark:text-green-200 px-2 py-1 rounded-full">Published</span>
                </div>

                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6 transform hover:scale-105 transition-all duration-200">
                    <div class="h-32 bg-gradient-to-br from-accent to-green-600 rounded-lg mb-4"></div>
                    <div class="flex justify-between items-start mb-2">
                        <h3 class="text-sm font-bold text-gray-900 dark:text-white">Bankroll Management</h3>
                        <div class="flex space-x-1">
                            <button onclick="editEbook('ebook2')" class="text-primary hover:text-opacity-80 transition-colors">
                                <i class="fas fa-edit text-sm"></i>
                            </button>
                            <button onclick="deleteEbook('ebook2')" class="text-red-600 hover:text-red-800 transition-colors">
                                <i class="fas fa-trash text-sm"></i>
                            </button>
                        </div>
                    </div>
                    <p class="text-xs text-gray-600 dark:text-gray-400 mb-2">189 downloads • $19.99</p>
                    <span class="text-xs bg-green-100 dark:bg-green-900 text-green-800 dark:text-green-200 px-2 py-1 rounded-full">Published</span>
                </div>
            </div>
        </section>
    </div>

    <!-- Add Tip Modal -->
    <div id="addTipModal" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50 flex items-center justify-center p-4">
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-2xl max-w-lg w-full max-h-[90vh] overflow-y-auto">
            <div class="p-6 border-b border-gray-200 dark:border-gray-700">
                <div class="flex justify-between items-center">
                    <h2 class="text-2xl font-bold text-gray-900 dark:text-white">Add New Tip</h2>
                    <button onclick="closeModal('addTipModal')" class="text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200 transition-colors">
                        <i class="fas fa-times text-xl"></i>
                    </button>
                </div>
            </div>
            
            <form id="addTipForm" class="p-6" action="{{ route('betpro.admin') }}" method="POST">
                @csrf
                <div class="space-y-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-gray-700 dark:text-gray-300 text-sm font-semibold mb-2">Sport *</label>
                            <select class="w-full px-4 py-3 text-base border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent" required>
                                <option value="">Select Sport</option>
                                <option value="football">Football</option>
                                <option value="basketball">Basketball</option>
                                <option value="tennis">Tennis</option>
                                <option value="baseball">Baseball</option>
                                <option value="hockey">Hockey</option>
                            </select>
                        </div>
                        
                        <div>
                            <label class="block text-gray-700 dark:text-gray-300 text-sm font-semibold mb-2">Confidence Level *</label>
                            <select class="w-full px-4 py-3 text-base border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent" required>
                                <option value="">Select Confidence</option>
                                <option value="high">High</option>
                                <option value="medium">Medium</option>
                                <option value="low">Low</option>
                            </select>
                        </div>
                    </div>

                    <div>
                        <label class="block text-gray-700 dark:text-gray-300 text-sm font-semibold mb-2">Event *</label>
                        <input type="text" class="w-full px-4 py-3 text-base border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent" placeholder="e.g., Man City vs Arsenal" required>
                    </div>

                    <div>
                        <label class="block text-gray-700 dark:text-gray-300 text-sm font-semibold mb-2">Bet Type *</label>
                        <input type="text" class="w-full px-4 py-3 text-base border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent" placeholder="e.g., Over 2.5 Goals" required>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div>
                            <label class="block text-gray-700 dark:text-gray-300 text-sm font-semibold mb-2">Odds *</label>
                            <input type="number" step="0.01" min="1.01" class="w-full px-4 py-3 text-base border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent" placeholder="1.85" required>
                        </div>
                        
                        <div>
                            <label class="block text-gray-700 dark:text-gray-300 text-sm font-semibold mb-2">Price (Credits) *</label>
                            <input type="number" min="1" class="w-full px-4 py-3 text-base border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent" placeholder="5" required>
                        </div>
                        
                        <div>
                            <label class="block text-gray-700 dark:text-gray-300 text-sm font-semibold mb-2">Accuracy (%) *</label>
                            <input type="number" min="1" max="100" class="w-full px-4 py-3 text-base border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent" placeholder="85" required>
                        </div>
                    </div>

                    <div>
                        <label class="block text-gray-700 dark:text-gray-300 text-sm font-semibold mb-2">Event Time *</label>
                        <input type="datetime-local" class="w-full px-4 py-3 text-base border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent" required>
                    </div>

                    <div>
                        <label class="block text-gray-700 dark:text-gray-300 text-sm font-semibold mb-2">Analysis (Optional)</label>
                        <textarea rows="3" class="w-full px-4 py-3 text-base border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent resize-none" placeholder="Provide analysis or reasoning for this tip..."></textarea>
                    </div>
                </div>
                
                <div class="flex space-x-3 mt-6">
                    <button type="button" onclick="closeModal('addTipModal')" class="flex-1 bg-gray-200 dark:bg-gray-600 text-gray-800 dark:text-gray-200 py-3 rounded-lg font-semibold hover:bg-gray-300 dark:hover:bg-gray-500 transition-all duration-200">Cancel</button>
                    <button type="submit" class="flex-1 bg-primary text-white py-3 rounded-lg font-semibold hover:bg-opacity-90 transition-all duration-200">Add Tip</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Add Course Modal -->
    <div id="addCourseModal" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50 flex items-center justify-center p-4">
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-2xl max-w-lg w-full max-h-[90vh] overflow-y-auto">
            <div class="p-6 border-b border-gray-200 dark:border-gray-700">
                <div class="flex justify-between items-center">
                    <h2 class="text-2xl font-bold text-gray-900 dark:text-white">Add New Course</h2>
                    <button onclick="closeModal('addCourseModal')" class="text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200 transition-colors">
                        <i class="fas fa-times text-xl"></i>
                    </button>
                </div>
            </div>
            
            <form id="addCourseForm" class="p-6">
                <div class="space-y-4">
                    <div>
                        <label class="block text-gray-700 dark:text-gray-300 text-sm font-semibold mb-2">Course Title *</label>
                        <input type="text" class="w-full px-4 py-3 text-base border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent" placeholder="e.g., Advanced Betting Strategies" required>
                    </div>

                    <div>
                        <label class="block text-gray-700 dark:text-gray-300 text-sm font-semibold mb-2">Category *</label>
                        <select class="w-full px-4 py-3 text-base border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent" required>
                            <option value="">Select Category</option>
                            <option value="beginner">Beginner</option>
                            <option value="intermediate">Intermediate</option>
                            <option value="advanced">Advanced</option>
                            <option value="specialized">Specialized</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-gray-700 dark:text-gray-300 text-sm font-semibold mb-2">Description *</label>
                        <textarea rows="3" class="w-full px-4 py-3 text-base border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent resize-none" placeholder="Course description..." required></textarea>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div>
                            <label class="block text-gray-700 dark:text-gray-300 text-sm font-semibold mb-2">Price ($) *</label>
                            <input type="number" step="0.01" min="0" class="w-full px-4 py-3 text-base border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent" placeholder="99.99" required>
                        </div>
                        
                        <div>
                            <label class="block text-gray-700 dark:text-gray-300 text-sm font-semibold mb-2">Duration (hours) *</label>
                            <input type="number" min="1" class="w-full px-4 py-3 text-base border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent" placeholder="8" required>
                        </div>
                        
                        <div>
                            <label class="block text-gray-700 dark:text-gray-300 text-sm font-semibold mb-2">Lessons *</label>
                            <input type="number" min="1" class="w-full px-4 py-3 text-base border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent" placeholder="12" required>
                        </div>
                    </div>

                    <div>
                        <label class="block text-gray-700 dark:text-gray-300 text-sm font-semibold mb-2">Prerequisites (Optional)</label>
                        <input type="text" class="w-full px-4 py-3 text-base border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent" placeholder="e.g., Basic understanding of sports betting">
                    </div>

                    <div>
                        <label class="block text-gray-700 dark:text-gray-300 text-sm font-semibold mb-2">Course Material Upload</label>
                        <input type="file" class="w-full px-4 py-3 text-base border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent" accept=".zip,.pdf,.mp4">
                        <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">Upload course materials (ZIP, PDF, or MP4)</p>
                    </div>
                </div>
                
                <div class="flex space-x-3 mt-6">
                    <button type="button" onclick="closeModal('addCourseModal')" class="flex-1 bg-gray-200 dark:bg-gray-600 text-gray-800 dark:text-gray-200 py-3 rounded-lg font-semibold hover:bg-gray-300 dark:hover:bg-gray-500 transition-all duration-200">Cancel</button>
                    <button type="submit" class="flex-1 bg-primary text-white py-3 rounded-lg font-semibold hover:bg-opacity-90 transition-all duration-200">Add Course</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Add E-book Modal -->
    <div id="addEbookModal" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50 flex items-center justify-center p-4">
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-2xl max-w-lg w-full max-h-[90vh] overflow-y-auto">
            <div class="p-6 border-b border-gray-200 dark:border-gray-700">
                <div class="flex justify-between items-center">
                    <h2 class="text-2xl font-bold text-gray-900 dark:text-white">Add New E-book</h2>
                    <button onclick="closeModal('addEbookModal')" class="text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200 transition-colors">
                        <i class="fas fa-times text-xl"></i>
                    </button>
                </div>
            </div>
            
            <form id="addEbookForm" class="p-6">
                <div class="space-y-4">
                    <div>
                        <label class="block text-gray-700 dark:text-gray-300 text-sm font-semibold mb-2">E-book Title *</label>
                        <input type="text" class="w-full px-4 py-3 text-base border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent" placeholder="e.g., Psychology of Winning Bets" required>
                    </div>

                    <div>
                        <label class="block text-gray-700 dark:text-gray-300 text-sm font-semibold mb-2">Description *</label>
                        <textarea rows="3" class="w-full px-4 py-3 text-base border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent resize-none" placeholder="E-book description..." required></textarea>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-gray-700 dark:text-gray-300 text-sm font-semibold mb-2">Price ($) *</label>
                            <input type="number" step="0.01" min="0" class="w-full px-4 py-3 text-base border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent" placeholder="19.99" required>
                        </div>
                        
                        <div>
                            <label class="block text-gray-700 dark:text-gray-300 text-sm font-semibold mb-2">Pages *</label>
                            <input type="number" min="1" class="w-full px-4 py-3 text-base border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent" placeholder="150" required>
                        </div>
                    </div>

                    <div>
                        <label class="block text-gray-700 dark:text-gray-300 text-sm font-semibold mb-2">Author *</label>
                        <input type="text" class="w-full px-4 py-3 text-base border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent" placeholder="Author name" required>
                    </div>

                    <div>
                        <label class="block text-gray-700 dark:text-gray-300 text-sm font-semibold mb-2">File Upload *</label>
                        <input type="file" class="w-full px-4 py-3 text-base border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent" accept=".pdf" required>
                        <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">Upload PDF file</p>
                    </div>

                    <div>
                        <label class="block text-gray-700 dark:text-gray-300 text-sm font-semibold mb-2">Cover Image</label>
                        <input type="file" class="w-full px-4 py-3 text-base border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent" accept="image/*">
                        <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">Upload cover image (optional)</p>
                    </div>
                </div>
                
                <div class="flex space-x-3 mt-6">
                    <button type="button" onclick="closeModal('addEbookModal')" class="flex-1 bg-gray-200 dark:bg-gray-600 text-gray-800 dark:text-gray-200 py-3 rounded-lg font-semibold hover:bg-gray-300 dark:hover:bg-gray-500 transition-all duration-200">Cancel</button>
                    <button type="submit" class="flex-1 bg-primary text-white py-3 rounded-lg font-semibold hover:bg-opacity-90 transition-all duration-200">Add E-book</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Success/Error Messages -->
    <div id="messageContainer" class="fixed top-4 right-4 z-50"></div>

    <!-- Logout Confirmation Modal -->
    <div id="logoutModal" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50 flex items-center justify-center p-4">
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-2xl max-w-md w-full">
            <div class="p-6">
                <div class="flex items-center justify-center w-16 h-16 mx-auto bg-red-100 dark:bg-red-900 rounded-full mb-4">
                    <i class="fas fa-sign-out-alt text-red-600 dark:text-red-400 text-2xl"></i>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white text-center mb-2">Confirm Logout</h3>
                <p class="text-gray-600 dark:text-gray-400 text-center mb-6">Are you sure you want to logout? You'll need to sign in again to access the admin dashboard.</p>
                <div class="flex space-x-3">
                    <button onclick="closeModal('logoutModal')" class="flex-1 bg-gray-200 dark:bg-gray-600 text-gray-800 dark:text-gray-200 py-3 rounded-lg font-semibold hover:bg-gray-300 dark:hover:bg-gray-500 transition-all duration-200">Cancel</button>
                    <a href="{{ route('index') }}" onclick="confirmLogout()" class="text-center justify-center flex-1 bg-red-600 text-white py-3 rounded-lg font-semibold hover:bg-red-700 transition-all duration-200">logout</a>
                </div>
            </div>
        </div>
    </div>

    <script>
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

        // Initialize admin dashboard
        document.addEventListener('DOMContentLoaded', function() {
            initializeRevenueChart();
            loadAdminData();
        });

        function initializeRevenueChart() {
            const ctx = document.getElementById('revenueChart').getContext('2d');

            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                    datasets: [{
                        label: 'Revenue ($)',
                        data: [32000, 35000, 38000, 42000, 45000, 48000, 52000, 49000, 53000, 56000, 58000, 62000],
                        backgroundColor: '#5D5CDE',
                        borderColor: '#5D5CDE',
                        borderWidth: 1,
                        borderRadius: 8
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: { display: false },
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    return '$' + context.raw.toLocaleString();
                                }
                            }
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            grid: { 
                                color: document.documentElement.classList.contains('dark') ? 'rgba(255, 255, 255, 0.1)' : 'rgba(0, 0, 0, 0.1)' 
                            },
                            ticks: {
                                color: document.documentElement.classList.contains('dark') ? 'rgba(255, 255, 255, 0.7)' : 'rgba(0, 0, 0, 0.7)',
                                callback: function(value) { return '$' + value.toLocaleString(); }
                            }
                        },
                        x: { 
                            grid: { display: false },
                            ticks: {
                                color: document.documentElement.classList.contains('dark') ? 'rgba(255, 255, 255, 0.7)' : 'rgba(0, 0, 0, 0.7)'
                            }
                        }
                    }
                }
            });
        }

        // Load admin data
        function loadAdminData() {
            console.log('Loading admin dashboard data...');
            updateAdminStats();
        }

        // Update admin stats
        function updateAdminStats() {
            const stats = {
                totalUsers: 1247,
                monthlyRevenue: 45230,
                activeSubscriptions: 892,
                tipsPublished: 3456
            };
            console.log('Admin stats updated:', stats);
        }

        // Modal functions
        function openModal(modalId) {
            document.getElementById(modalId).classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }

        function closeModal(modalId) {
            document.getElementById(modalId).classList.add('hidden');
            document.body.style.overflow = 'auto';
        }

        // Show message function
        function showMessage(message, type = 'success') {
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

        // Add new tip
        document.getElementById('addTipForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const formData = new FormData(this);
            
            showMessage('Tip added successfully!');
            closeModal('addTipModal');
            this.reset();
            
            console.log('New tip added');
        });

        // Add new course
        document.getElementById('addCourseForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const formData = new FormData(this);
            
            showMessage('Course added successfully!');
            closeModal('addCourseModal');
            this.reset();
            
            console.log('New course added');
        });

        // Add new e-book
        document.getElementById('addEbookForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const formData = new FormData(this);
            
            showMessage('E-book added successfully!');
            closeModal('addEbookModal');
            this.reset();
            
            console.log('New e-book added');
        });

        // Edit functions
        function editTip(tipId) {
            console.log('Editing tip:', tipId);
            showMessage('Edit functionality would open here', 'success');
        }

        function deleteTip(tipId) {
            showDeleteConfirmation('tip', () => {
                showMessage('Tip deleted successfully!');
                console.log('Deleting tip:', tipId);
            });
        }

        function editCourse(courseId) {
            console.log('Editing course:', courseId);
            showMessage('Edit functionality would open here', 'success');
        }

        function deleteCourse(courseId) {
            showDeleteConfirmation('course', () => {
                showMessage('Course deleted successfully!');
                console.log('Deleting course:', courseId);
            });
        }

        function editEbook(ebookId) {
            console.log('Editing e-book:', ebookId);
            showMessage('Edit functionality would open here', 'success');
        }

        function deleteEbook(ebookId) {
            showDeleteConfirmation('e-book', () => {
                showMessage('E-book deleted successfully!');
                console.log('Deleting e-book:', ebookId);
            });
        }

        // User management functions
        function editUser(userId) {
            console.log('Editing user:', userId);
            showMessage('Edit functionality would open here', 'success');
        }

        function suspendUser(userId) {
            showDeleteConfirmation('user', () => {
                showMessage('User suspended successfully!');
                console.log('Suspending user:', userId);
            });
        }

        // Search functionality
        function searchUsers() {
            const searchTerm = document.getElementById('userSearch').value;
            console.log('Searching users:', searchTerm);
            showMessage(`Searching for: ${searchTerm}`, 'success');
        }

        // Delete confirmation modal
        function showDeleteConfirmation(itemType, onConfirm) {
            const modal = document.createElement('div');
            modal.className = 'fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center p-4';
            modal.innerHTML = `
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-2xl max-w-md w-full">
                    <div class="p-6">
                        <div class="flex items-center justify-center w-16 h-16 mx-auto bg-red-100 dark:bg-red-900 rounded-full mb-4">
                            <i class="fas fa-trash text-red-600 dark:text-red-400 text-2xl"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white text-center mb-2">Confirm Deletion</h3>
                        <p class="text-gray-600 dark:text-gray-400 text-center mb-6">Are you sure you want to delete this ${itemType}? This action cannot be undone.</p>
                        <div class="flex space-x-3">
                            <button onclick="this.closest('.fixed').remove(); document.body.style.overflow = 'auto';" class="flex-1 bg-gray-200 dark:bg-gray-600 text-gray-800 dark:text-gray-200 py-3 rounded-lg font-semibold hover:bg-gray-300 dark:hover:bg-gray-500 transition-all duration-200">Cancel</button>
                            <button onclick="this.closest('.fixed').remove(); document.body.style.overflow = 'auto'; (${onConfirm.toString()})()" class="flex-1 bg-red-600 text-white py-3 rounded-lg font-semibold hover:bg-red-700 transition-all duration-200">Delete</button>
                        </div>
                    </div>
                </div>
            `;
            document.body.appendChild(modal);
            document.body.style.overflow = 'hidden';
            
            modal.addEventListener('click', function(e) {
                if (e.target === modal) {
                    modal.remove();
                    document.body.style.overflow = 'auto';
                }
            });
        }

        // Logout functions
        function showLogoutModal() {
            openModal('logoutModal');
        }

        function confirmLogout() {
            console.log('Logging out...');
            closeModal('logoutModal');
            showMessage('Logged out successfully');
        }

        // Close modals when clicking outside
        window.addEventListener('click', function(event) {
            const modals = ['addTipModal', 'addCourseModal', 'addEbookModal', 'logoutModal'];
            modals.forEach(modalId => {
                const modal = document.getElementById(modalId);
                if (event.target === modal) {
                    closeModal(modalId);
                }
            });
        });

        // Navigation highlighting
        document.addEventListener('scroll', function() {
            const sections = ['overview', 'users', 'tips', 'courses', 'ebooks'];
            const navLinks = document.querySelectorAll('nav a');
            
            sections.forEach(sectionId => {
                const section = document.getElementById(sectionId);
                if (section) {
                    const rect = section.getBoundingClientRect();
                    if (rect.top <= 100 && rect.bottom >= 100) {
                        navLinks.forEach(link => {
                            link.classList.remove('text-primary', 'border-b-2', 'border-primary');
                            link.classList.add('text-gray-500', 'dark:text-gray-400');
                        });
                        
                        const activeLink = document.querySelector(`nav a[href="#${sectionId}"]`);
                        if (activeLink) {
                            activeLink.classList.remove('text-gray-500', 'dark:text-gray-400');
                            activeLink.classList.add('text-primary', 'border-b-2', 'border-primary');
                        }
                    }
                }
            });
        });
    </script>
</body>
</html>
@endsection