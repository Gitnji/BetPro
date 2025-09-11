<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard - BetPro</title>
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
                        <h1 class="text-2xl font-bold text-primary">BetPro</h1>
                    </div>
                    <div class="hidden md:ml-6 md:flex md:space-x-8">
                        <a href="#overview" class="text-primary border-b-2 border-primary px-3 py-2 text-sm font-medium">Overview</a>
                        <a href="#bet-tracker" class="text-gray-500 dark:text-gray-400 hover:text-primary px-3 py-2 text-sm font-medium transition-colors">Bet Tracker</a>
                        <a href="#premium-odds" class="text-gray-500 dark:text-gray-400 hover:text-primary px-3 py-2 text-sm font-medium transition-colors">Premium Odds</a>
                        <a href="#courses" class="text-gray-500 dark:text-gray-400 hover:text-primary px-3 py-2 text-sm font-medium transition-colors">Courses</a>
                        <a href="#ebooks" class="text-gray-500 dark:text-gray-400 hover:text-primary px-3 py-2 text-sm font-medium transition-colors">E-books</a>
                    </div>
                </div>
                <div class="flex items-center space-x-4">
                    <div class="relative">
                        <button class="flex items-center space-x-2 text-gray-700 dark:text-gray-300 hover:text-primary transition-colors">
                            <div class="w-8 h-8 rounded-full bg-gradient-to-br from-primary to-secondary flex items-center justify-center text-white font-semibold text-sm">
                                LX
                            </div>
                            <span class="hidden md:block">loner </span>
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
            <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-6">Dashboard Overview</h2>
            
            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6 transform hover:scale-105 transition-all duration-200">
                    <div class="flex items-center">
                        <div class="p-3 bg-accent bg-opacity-20 rounded-xl">
                            <i class="fas fa-chart-line text-accent text-xl"></i>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm text-gray-600 dark:text-gray-400">Total Profit</p>
                            <p class="text-2xl font-bold text-accent">+$2,450</p>
                        </div>
                    </div>
                </div>
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6 transform hover:scale-105 transition-all duration-200">
                    <div class="flex items-center">
                        <div class="p-3 bg-primary bg-opacity-20 rounded-xl">
                            <i class="fas fa-percentage text-primary text-xl"></i>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm text-gray-600 dark:text-gray-400">Win Rate</p>
                            <p class="text-2xl font-bold text-primary">68.5%</p>
                        </div>
                    </div>
                </div>
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6 transform hover:scale-105 transition-all duration-200">
                    <div class="flex items-center">
                        <div class="p-3 bg-yellow-500 bg-opacity-20 rounded-xl">
                            <i class="fas fa-trophy text-yellow-500 text-xl"></i>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm text-gray-600 dark:text-gray-400">Total Bets</p>
                            <p class="text-2xl font-bold text-gray-900 dark:text-white">247</p>
                        </div>
                    </div>
                </div>
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6 transform hover:scale-105 transition-all duration-200">
                    <div class="flex items-center">
                        <div class="p-3 bg-purple-500 bg-opacity-20 rounded-xl">
                            <i class="fas fa-star text-purple-500 text-xl"></i>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm text-gray-600 dark:text-gray-400">Current Plan</p>
                            <p class="text-2xl font-bold text-gray-900 dark:text-white">Pro</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Profit Chart -->
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6 mb-8">
                <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-4">Profit/Loss Over Time</h3>
                <div class="relative h-64 w-full">
                    <canvas id="profitChart"></canvas>
                </div>
            </div>
        </section>

        <!-- Bet Tracker Section -->
        <section id="bet-tracker" class="mb-8">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-3xl font-bold text-gray-900 dark:text-white">Bet Tracker</h2>
                <button onclick="openModal('addBetModal')" class="bg-primary text-white px-6 py-3 rounded-xl hover:bg-opacity-90 transition-all duration-200 shadow-lg font-semibold">
                    <i class="fas fa-plus mr-2"></i>Add Bet
                </button>
            </div>

            <!-- Filter Tabs -->
            <div class="flex space-x-2 mb-6 bg-gray-100 dark:bg-gray-800 p-1 rounded-xl">
                <button class="bg-primary text-white px-4 py-2 rounded-lg font-medium transition-all duration-200" onclick="filterBets('all')">All</button>
                <button class="text-gray-700 dark:text-gray-300 px-4 py-2 rounded-lg hover:bg-white dark:hover:bg-gray-700 transition-all duration-200 font-medium" onclick="filterBets('daily')">Daily</button>
                <button class="text-gray-700 dark:text-gray-300 px-4 py-2 rounded-lg hover:bg-white dark:hover:bg-gray-700 transition-all duration-200 font-medium" onclick="filterBets('weekly')">Weekly</button>
                <button class="text-gray-700 dark:text-gray-300 px-4 py-2 rounded-lg hover:bg-white dark:hover:bg-gray-700 transition-all duration-200 font-medium" onclick="filterBets('monthly')">Monthly</button>
            </div>

            <!-- Bets Table -->
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="min-w-full">
                        <thead class="bg-gray-50 dark:bg-gray-700">
                            <tr>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider">Date</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider">Event</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider">Bet Type</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider">Odds</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider">Stake</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider">Result</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider">P/L</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 dark:divide-gray-700" id="betsTableBody">
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-300">2024-01-15</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-300">Man City vs Arsenal</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-300">Over 2.5</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-300">1.85</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-300">$100</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-3 py-1 text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200">Won</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-green-600">+$85</td>
                            </tr>
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-300">2024-01-14</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-300">Lakers vs Warriors</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-300">Lakers +5.5</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-300">1.90</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-300">$50</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-3 py-1 text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200">Lost</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-red-600">-$50</td>
                            </tr>
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-300">2024-01-13</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-300">Barcelona vs PSG</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-300">BTTS Yes</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-300">1.75</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-300">$75</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-3 py-1 text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200">Won</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-green-600">+$56.25</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>

        <!-- Courses Section -->
        <section id="courses" class="mb-8">
            <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-6">My Courses</h2>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6 transform hover:scale-105 transition-all duration-200">
                    <div class="h-32 bg-gradient-to-br from-primary to-secondary rounded-lg mb-4"></div>
                    <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-2">Betting Fundamentals</h3>
                    <div class="mb-4">
                        <div class="flex justify-between text-sm text-gray-600 dark:text-gray-400 mb-2">
                            <span>Progress</span>
                            <span>75%</span>
                        </div>
                        <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-2">
                            <div class="bg-accent h-2 rounded-full transition-all duration-500" style="width: 75%"></div>
                        </div>
                    </div>
                    <button class="w-full bg-primary text-white py-3 rounded-lg font-semibold hover:bg-opacity-90 transition-all duration-200">Continue</button>
                </div>
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6 transform hover:scale-105 transition-all duration-200">
                    <div class="h-32 bg-gradient-to-br from-accent to-green-600 rounded-lg mb-4"></div>
                    <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-2">Advanced Analytics</h3>
                    <div class="mb-4">
                        <div class="flex justify-between text-sm text-gray-600 dark:text-gray-400 mb-2">
                            <span>Progress</span>
                            <span>30%</span>
                        </div>
                        <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-2">
                            <div class="bg-accent h-2 rounded-full transition-all duration-500" style="width: 30%"></div>
                        </div>
                    </div>
                    <button class="w-full bg-primary text-white py-3 rounded-lg font-semibold hover:bg-opacity-90 transition-all duration-200">Continue</button>
                </div>
            </div>
        </section>

        <!-- Premium Odds Section -->
        <section id="premium-odds" class="mb-8">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-3xl font-bold text-gray-900 dark:text-white">Premium Odds & Tips</h2>
                <div class="flex items-center space-x-2">
                    <span class="text-sm text-gray-600 dark:text-gray-400">Credits:</span>
                    <span class="bg-primary text-white px-3 py-1 rounded-full text-sm font-semibold" id="creditsBalance">25</span>
                </div>
            </div>
            
            <!-- Odds Packages -->
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
                <!-- Daily Tips -->
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6 border-2 border-transparent hover:border-primary transition-all duration-200">
                    <div class="text-center mb-4">
                        <div class="inline-flex items-center justify-center w-16 h-16 bg-blue-100 dark:bg-blue-900 rounded-full mb-3">
                            <i class="fas fa-calendar-day text-blue-600 dark:text-blue-400 text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 dark:text-white">Daily Tips</h3>
                        <p class="text-gray-600 dark:text-gray-400 text-sm">3-5 premium tips daily</p>
                    </div>
                    <div class="text-center mb-4">
                        <span class="text-3xl font-bold text-primary">5</span>
                        <span class="text-gray-600 dark:text-gray-400 ml-1">credits</span>
                    </div>
                    <ul class="text-sm text-gray-600 dark:text-gray-400 space-y-2 mb-6">
                        <li class="flex items-center"><i class="fas fa-check text-green-500 mr-2"></i>3-5 verified tips</li>
                        <li class="flex items-center"><i class="fas fa-check text-green-500 mr-2"></i>Win rate: 75%+</li>
                        <li class="flex items-center"><i class="fas fa-check text-green-500 mr-2"></i>Multiple sports</li>
                    </ul>
                    <button onclick="purchaseOdds('daily', 5)" class="w-full bg-primary text-white py-3 rounded-lg font-semibold hover:bg-opacity-90 transition-all duration-200">
                        Purchase Daily Tips
                    </button>
                </div>

                <!-- VIP Tips -->
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6 border-2 border-yellow-400 relative transform hover:scale-105 transition-all duration-200">
                    <div class="absolute -top-3 left-1/2 transform -translate-x-1/2">
                        <span class="bg-yellow-400 text-gray-900 px-3 py-1 rounded-full text-xs font-bold">POPULAR</span>
                    </div>
                    <div class="text-center mb-4">
                        <div class="inline-flex items-center justify-center w-16 h-16 bg-yellow-100 dark:bg-yellow-900 rounded-full mb-3">
                            <i class="fas fa-crown text-yellow-600 dark:text-yellow-400 text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 dark:text-white">VIP Package</h3>
                        <p class="text-gray-600 dark:text-gray-400 text-sm">Premium weekly package</p>
                    </div>
                    <div class="text-center mb-4">
                        <span class="text-3xl font-bold text-primary">25</span>
                        <span class="text-gray-600 dark:text-gray-400 ml-1">credits</span>
                        <div class="text-xs text-green-600 font-semibold">Save 15 credits!</div>
                    </div>
                    <ul class="text-sm text-gray-600 dark:text-gray-400 space-y-2 mb-6">
                        <li class="flex items-center"><i class="fas fa-check text-green-500 mr-2"></i>7 days of premium tips</li>
                        <li class="flex items-center"><i class="fas fa-check text-green-500 mr-2"></i>Win rate: 80%+</li>
                        <li class="flex items-center"><i class="fas fa-check text-green-500 mr-2"></i>Insider information</li>
                        <li class="flex items-center"><i class="fas fa-check text-green-500 mr-2"></i>Live chat support</li>
                    </ul>
                    <button onclick="purchaseOdds('vip', 25)" class="w-full bg-yellow-500 text-white py-3 rounded-lg font-semibold hover:bg-yellow-600 transition-all duration-200">
                        Get VIP Package
                    </button>
                </div>

                <!-- Premium Accumulators -->
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6 border-2 border-transparent hover:border-primary transition-all duration-200">
                    <div class="text-center mb-4">
                        <div class="inline-flex items-center justify-center w-16 h-16 bg-purple-100 dark:bg-purple-900 rounded-full mb-3">
                            <i class="fas fa-layer-group text-purple-600 dark:text-purple-400 text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 dark:text-white">Accumulators</h3>
                        <p class="text-gray-600 dark:text-gray-400 text-sm">High-odds accumulator bets</p>
                    </div>
                    <div class="text-center mb-4">
                        <span class="text-3xl font-bold text-primary">15</span>
                        <span class="text-gray-600 dark:text-gray-400 ml-1">credits</span>
                    </div>
                    <ul class="text-sm text-gray-600 dark:text-gray-400 space-y-2 mb-6">
                        <li class="flex items-center"><i class="fas fa-check text-green-500 mr-2"></i>3-6 fold accumulators</li>
                        <li class="flex items-center"><i class="fas fa-check text-green-500 mr-2"></i>Odds: 8/1 to 50/1</li>
                        <li class="flex items-center"><i class="fas fa-check text-green-500 mr-2"></i>Research included</li>
                    </ul>
                    <button onclick="purchaseOdds('accumulator', 15)" class="w-full bg-primary text-white py-3 rounded-lg font-semibold hover:bg-opacity-90 transition-all duration-200">
                        Buy Accumulators
                    </button>
                </div>
            </div>

            <!-- Credit Packages -->
            <div class="bg-gradient-to-r from-primary to-secondary rounded-xl p-6 text-white mb-8">
                <h3 class="text-2xl font-bold mb-4">Buy Credits</h3>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                    <div class="bg-white bg-opacity-20 rounded-lg p-4 text-center">
                        <div class="text-2xl font-bold">50</div>
                        <div class="text-sm opacity-80">Credits</div>
                        <div class="text-lg font-semibold mt-2">$9.99</div>
                        <button onclick="buyCredits(50, 9.99)" class="w-full bg-white text-primary py-2 rounded-lg font-semibold mt-3 text-sm hover:bg-opacity-90 transition-all">Buy Now</button>
                    </div>
                    <div class="bg-white bg-opacity-20 rounded-lg p-4 text-center border-2 border-yellow-400">
                        <div class="text-xs bg-yellow-400 text-gray-900 px-2 py-1 rounded-full mb-2 font-bold">BEST VALUE</div>
                        <div class="text-2xl font-bold">120</div>
                        <div class="text-sm opacity-80">Credits</div>
                        <div class="text-lg font-semibold mt-2">$19.99</div>
                        <button onclick="buyCredits(120, 19.99)" class="w-full bg-yellow-400 text-gray-900 py-2 rounded-lg font-semibold mt-3 text-sm hover:bg-yellow-300 transition-all">Buy Now</button>
                    </div>
                    <div class="bg-white bg-opacity-20 rounded-lg p-4 text-center">
                        <div class="text-2xl font-bold">250</div>
                        <div class="text-sm opacity-80">Credits</div>
                        <div class="text-lg font-semibold mt-2">$39.99</div>
                        <button onclick="buyCredits(250, 39.99)" class="w-full bg-white text-primary py-2 rounded-lg font-semibold mt-3 text-sm hover:bg-opacity-90 transition-all">Buy Now</button>
                    </div>
                    <div class="bg-white bg-opacity-20 rounded-lg p-4 text-center">
                        <div class="text-2xl font-bold">500</div>
                        <div class="text-sm opacity-80">Credits</div>
                        <div class="text-lg font-semibold mt-2">$69.99</div>
                        <button onclick="buyCredits(500, 69.99)" class="w-full bg-white text-primary py-2 rounded-lg font-semibold mt-3 text-sm hover:bg-opacity-90 transition-all">Buy Now</button>
                    </div>
                </div>
            </div>
        </section>

        <!-- E-books Marketplace -->
        <section id="ebooks" class="mb-8">
            <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-6">E-books Marketplace</h2>
            
            <!-- My E-books -->
            <div class="mb-8">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">My Library</h3>
                <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6 transform hover:scale-105 transition-all duration-200">
                        <div class="h-32 bg-gradient-to-br from-primary to-secondary rounded-lg mb-4"></div>
                        <h4 class="text-lg font-bold text-gray-900 dark:text-white mb-2">Complete Guide to Sports Betting</h4>
                        <p class="text-sm text-gray-600 dark:text-gray-400 mb-4">Purchased on Jan 15, 2024</p>
                        <button class="w-full bg-accent text-white py-3 rounded-lg font-semibold hover:bg-green-600 transition-all duration-200">
                            <i class="fas fa-download mr-2"></i>Download
                        </button>
                    </div>
                    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6 transform hover:scale-105 transition-all duration-200">
                        <div class="h-32 bg-gradient-to-br from-accent to-green-600 rounded-lg mb-4"></div>
                        <h4 class="text-lg font-bold text-gray-900 dark:text-white mb-2">Bankroll Management</h4>
                        <p class="text-sm text-gray-600 dark:text-gray-400 mb-4">Purchased on Jan 10, 2024</p>
                        <button class="w-full bg-accent text-white py-3 rounded-lg font-semibold hover:bg-green-600 transition-all duration-200">
                            <i class="fas fa-download mr-2"></i>Download
                        </button>
                    </div>
                </div>
            </div>

            <!-- Available E-books -->
            <div>
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">Available E-books</h3>
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <!-- Beginner E-book -->
                    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6 border-2 border-transparent hover:border-primary transition-all duration-200">
                        <div class="h-40 bg-gradient-to-br from-blue-500 to-blue-700 rounded-lg mb-4 flex items-center justify-center">
                            <i class="fas fa-book-open text-white text-4xl"></i>
                        </div>
                        <div class="mb-4">
                            <h4 class="text-lg font-bold text-gray-900 dark:text-white mb-2">Betting Basics: A Beginner's Guide</h4>
                            <p class="text-sm text-gray-600 dark:text-gray-400 mb-3">Learn the fundamentals of sports betting from scratch. Perfect for newcomers.</p>
                            <div class="flex items-center space-x-2 mb-2">
                                <div class="flex text-yellow-400">
                                    <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                                </div>
                                <span class="text-sm text-gray-600 dark:text-gray-400">(247 reviews)</span>
                            </div>
                            <div class="text-sm text-gray-600 dark:text-gray-400">
                                <i class="fas fa-file-alt mr-1"></i>156 pages • <i class="fas fa-clock mr-1"></i>3h read
                            </div>
                        </div>
                        <div class="flex items-center justify-between mb-4">
                            <span class="text-2xl font-bold text-primary">$14.99</span>
                            <span class="text-sm text-gray-500 line-through">$24.99</span>
                        </div>
                        <button onclick="purchaseEbook('betting-basics', 14.99)" class="w-full bg-primary text-white py-3 rounded-lg font-semibold hover:bg-opacity-90 transition-all duration-200">
                            Purchase E-book
                        </button>
                    </div>

                    <!-- Advanced E-book -->
                    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6 border-2 border-yellow-400 relative">
                        <div class="absolute -top-3 left-1/2 transform -translate-x-1/2">
                            <span class="bg-yellow-400 text-gray-900 px-3 py-1 rounded-full text-xs font-bold">BESTSELLER</span>
                        </div>
                        <div class="h-40 bg-gradient-to-br from-purple-500 to-purple-700 rounded-lg mb-4 flex items-center justify-center">
                            <i class="fas fa-chart-line text-white text-4xl"></i>
                        </div>
                        <div class="mb-4">
                            <h4 class="text-lg font-bold text-gray-900 dark:text-white mb-2">Advanced Analytics & Strategies</h4>
                            <p class="text-sm text-gray-600 dark:text-gray-400 mb-3">Master statistical analysis and advanced betting strategies used by professionals.</p>
                            <div class="flex items-center space-x-2 mb-2">
                                <div class="flex text-yellow-400">
                                    <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                                </div>
                                <span class="text-sm text-gray-600 dark:text-gray-400">(892 reviews)</span>
                            </div>
                            <div class="text-sm text-gray-600 dark:text-gray-400">
                                <i class="fas fa-file-alt mr-1"></i>278 pages • <i class="fas fa-clock mr-1"></i>6h read
                            </div>
                        </div>
                        <div class="flex items-center justify-between mb-4">
                            <span class="text-2xl font-bold text-primary">$29.99</span>
                            <span class="text-sm text-gray-500 line-through">$49.99</span>
                        </div>
                        <button onclick="purchaseEbook('advanced-analytics', 29.99)" class="w-full bg-yellow-500 text-white py-3 rounded-lg font-semibold hover:bg-yellow-600 transition-all duration-200">
                            Purchase E-book
                        </button>
                    </div>

                    <!-- Psychology E-book -->
                    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6 border-2 border-transparent hover:border-primary transition-all duration-200">
                        <div class="h-40 bg-gradient-to-br from-green-500 to-green-700 rounded-lg mb-4 flex items-center justify-center">
                            <i class="fas fa-brain text-white text-4xl"></i>
                        </div>
                        <div class="mb-4">
                            <h4 class="text-lg font-bold text-gray-900 dark:text-white mb-2">Psychology of Betting</h4>
                            <p class="text-sm text-gray-600 dark:text-gray-400 mb-3">Understanding the mental game and emotional control in sports betting.</p>
                            <div class="flex items-center space-x-2 mb-2">
                                <div class="flex text-yellow-400">
                                    <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i>
                                </div>
                                <span class="text-sm text-gray-600 dark:text-gray-400">(156 reviews)</span>
                            </div>
                            <div class="text-sm text-gray-600 dark:text-gray-400">
                                <i class="fas fa-file-alt mr-1"></i>198 pages • <i class="fas fa-clock mr-1"></i>4h read
                            </div>
                        </div>
                        <div class="flex items-center justify-between mb-4">
                            <span class="text-2xl font-bold text-primary">$19.99</span>
                            <span class="text-sm text-gray-500 line-through">$29.99</span>
                        </div>
                        <button onclick="purchaseEbook('psychology-betting', 19.99)" class="w-full bg-primary text-white py-3 rounded-lg font-semibold hover:bg-opacity-90 transition-all duration-200">
                            Purchase E-book
                        </button>
                    </div>

                    <!-- Bundle Offer -->
                    <div class="md:col-span-2 lg:col-span-3 bg-gradient-to-r from-primary to-secondary rounded-xl p-6 text-white">
                        <div class="text-center">
                            <h3 class="text-2xl font-bold mb-2">Complete E-book Bundle</h3>
                            <p class="text-lg opacity-90 mb-4">Get all 3 e-books and save 40%</p>
                            <div class="flex items-center justify-center space-x-4 mb-6">
                                <span class="text-3xl font-bold">$39.99</span>
                                <span class="text-xl line-through opacity-70">$64.97</span>
                                <span class="bg-yellow-400 text-gray-900 px-3 py-1 rounded-full text-sm font-bold">Save $24.98</span>
                            </div>
                            <button onclick="purchaseBundle(39.99)" class="bg-white text-primary px-8 py-3 rounded-lg font-semibold hover:bg-opacity-90 transition-all duration-200">
                                Buy Complete Bundle
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- Add Bet Modal -->
    <div id="addBetModal" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50 flex items-center justify-center p-4">
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-2xl max-w-lg w-full max-h-[90vh] overflow-y-auto">
            <div class="p-6 border-b border-gray-200 dark:border-gray-700">
                <div class="flex justify-between items-center">
                    <h2 class="text-2xl font-bold text-gray-900 dark:text-white">Add New Bet</h2>
                    <button onclick="closeModal('addBetModal')" class="text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200 transition-colors">
                        <i class="fas fa-times text-xl"></i>
                    </button>
                </div>
            </div>
            
            <form id="addBetForm" class="p-6">
                <div class="space-y-4">
                    <div>
                        <label class="block text-gray-700 dark:text-gray-300 text-sm font-semibold mb-2">Event *</label>
                        <input type="text" id="eventInput" class="w-full px-4 py-3 text-base border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition-all" placeholder="e.g., Man City vs Arsenal" required>
                        <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">Enter the match or event name</p>
                    </div>
                    
                    <div>
                        <label class="block text-gray-700 dark:text-gray-300 text-sm font-semibold mb-2">Bet Type *</label>
                        <input type="text" id="betTypeInput" class="w-full px-4 py-3 text-base border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition-all" placeholder="e.g., Over 2.5 Goals, BTTS Yes" required>
                        <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">Specify the type of bet you're placing</p>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-gray-700 dark:text-gray-300 text-sm font-semibold mb-2">Odds *</label>
                            <input type="number" id="oddsInput" step="0.01" min="1.01" class="w-full px-4 py-3 text-base border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition-all" placeholder="e.g., 1.85" required>
                            <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">Decimal odds (e.g., 1.85)</p>
                        </div>
                        
                        <div>
                            <label class="block text-gray-700 dark:text-gray-300 text-sm font-semibold mb-2">Stake ($) *</label>
                            <input type="number" id="stakeInput" min="1" class="w-full px-4 py-3 text-base border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition-all" placeholder="e.g., 100" required>
                            <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">Amount you're betting</p>
                        </div>
                    </div>
                    
                    <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-4">
                        <div class="flex justify-between items-center text-sm">
                            <span class="text-gray-600 dark:text-gray-400">Potential Return:</span>
                            <span id="potentialReturn" class="font-semibold text-gray-900 dark:text-white">$0.00</span>
                        </div>
                        <div class="flex justify-between items-center text-sm mt-1">
                            <span class="text-gray-600 dark:text-gray-400">Potential Profit:</span>
                            <span id="potentialProfit" class="font-semibold text-accent">$0.00</span>
                        </div>
                    </div>
                    
                    <div>
                        <label class="block text-gray-700 dark:text-gray-300 text-sm font-semibold mb-2">Notes (Optional)</label>
                        <textarea id="notesInput" rows="3" class="w-full px-4 py-3 text-base border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition-all resize-none" placeholder="Add any notes about this bet..."></textarea>
                    </div>
                </div>
                
                <div class="flex space-x-3 mt-6">
                    <button type="button" onclick="closeModal('addBetModal')" class="flex-1 bg-gray-200 dark:bg-gray-600 text-gray-800 dark:text-gray-200 py-3 rounded-lg font-semibold hover:bg-gray-300 dark:hover:bg-gray-500 transition-all duration-200">Cancel</button>
                    <button type="submit" class="flex-1 bg-primary text-white py-3 rounded-lg font-semibold hover:bg-opacity-90 transition-all duration-200">Add Bet</button>
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
                <p class="text-gray-600 dark:text-gray-400 text-center mb-6">Are you sure you want to logout? You'll need to sign in again to access your dashboard.</p>
                <div class="flex space-x-3">
                    <button onclick="closeModal('logoutModal')" class="flex-1 bg-gray-200 dark:bg-gray-600 text-gray-800 dark:text-gray-200 py-3 rounded-lg font-semibold hover:bg-gray-300 dark:hover:bg-gray-500 transition-all duration-200">Cancel</button>
                    <button onclick="confirmLogout()" class="flex-1 bg-red-600 text-white py-3 rounded-lg font-semibold hover:bg-red-700 transition-all duration-200">Logout</button>
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

        // Initialize dashboard
        document.addEventListener('DOMContentLoaded', function() {
            initializeProfitChart();
            loadDashboardData();
            setupFormCalculations();
        });

        // Initialize profit chart
        function initializeProfitChart() {
            const ctx = document.getElementById('profitChart').getContext('2d');
            
            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                    datasets: [{
                        label: 'Profit/Loss ($)',
                        data: [120, 190, 300, 250, 420, 380, 450, 520, 480, 650, 720, 850],
                        borderColor: '#10b981',
                        backgroundColor: 'rgba(16, 185, 129, 0.1)',
                        borderWidth: 3,
                        fill: true,
                        tension: 0.4,
                        pointBackgroundColor: '#10b981',
                        pointBorderColor: '#ffffff',
                        pointBorderWidth: 2,
                        pointRadius: 6,
                        pointHoverRadius: 8
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            grid: {
                                color: document.documentElement.classList.contains('dark') ? 'rgba(255, 255, 255, 0.1)' : 'rgba(0, 0, 0, 0.1)'
                            },
                            ticks: {
                                color: document.documentElement.classList.contains('dark') ? 'rgba(255, 255, 255, 0.7)' : 'rgba(0, 0, 0, 0.7)'
                            }
                        },
                        x: {
                            grid: {
                                display: false
                            },
                            ticks: {
                                color: document.documentElement.classList.contains('dark') ? 'rgba(255, 255, 255, 0.7)' : 'rgba(0, 0, 0, 0.7)'
                            }
                        }
                    }
                }
            });
        }

        // Setup form calculations
        function setupFormCalculations() {
            const oddsInput = document.getElementById('oddsInput');
            const stakeInput = document.getElementById('stakeInput');
            
            function calculateReturns() {
                const odds = parseFloat(oddsInput.value) || 0;
                const stake = parseFloat(stakeInput.value) || 0;
                
                if (odds > 0 && stake > 0) {
                    const potentialReturn = (odds * stake).toFixed(2);
                    const potentialProfit = (potentialReturn - stake).toFixed(2);
                    
                    document.getElementById('potentialReturn').textContent = `$${potentialReturn}`;
                    document.getElementById('potentialProfit').textContent = `$${potentialProfit}`;
                } else {
                    document.getElementById('potentialReturn').textContent = '$0.00';
                    document.getElementById('potentialProfit').textContent = '$0.00';
                }
            }
            
            oddsInput.addEventListener('input', calculateReturns);
            stakeInput.addEventListener('input', calculateReturns);
        }

        // Load dashboard data
        function loadDashboardData() {
            console.log('Loading dashboard data...');
            updateStats();
        }

        // Update dashboard stats
        function updateStats() {
            const stats = {
                totalProfit: 2450,
                winRate: 68.5,
                totalBets: 247,
                currentPlan: 'Pro'
            };
            console.log('Stats updated:', stats);
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

        // Add new bet
        document.getElementById('addBetForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const event = document.getElementById('eventInput').value;
            const betType = document.getElementById('betTypeInput').value;
            const odds = document.getElementById('oddsInput').value;
            const stake = document.getElementById('stakeInput').value;
            const notes = document.getElementById('notesInput').value;
            
            if (!event || !betType || !odds || !stake) {
                showMessage('Please fill in all required fields', 'error');
                return;
            }
            
            // Add to table
            const tableBody = document.getElementById('betsTableBody');
            const newRow = document.createElement('tr');
            newRow.className = 'hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors';
            
            const today = new Date().toISOString().split('T')[0];
            
            newRow.innerHTML = `
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-300">${today}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-300">${event}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-300">${betType}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-300">${odds}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-300">$${stake}</td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <span class="px-3 py-1 text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-200">Pending</span>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-gray-500">Pending</td>
            `;
            
            tableBody.insertBefore(newRow, tableBody.firstChild);
            
            showMessage('Bet added successfully!');
            closeModal('addBetModal');
            
            // Reset form
            document.getElementById('addBetForm').reset();
            document.getElementById('potentialReturn').textContent = '$0.00';
            document.getElementById('potentialProfit').textContent = '$0.00';
        });

        // Logout functions
        function showLogoutModal() {
            openModal('logoutModal');
        }

        function confirmLogout() {
            // Clear any stored data
            console.log('Logging out...');
            closeModal('logoutModal');
            showMessage('Logged out successfully');
            
            // In a real app, redirect to login page
            // window.location.href = 'index.html';
        }

        // Filter bets by time period
        function filterBets(period) {
            // Remove active class from all buttons
            const buttons = document.querySelectorAll('#bet-tracker .flex.space-x-2 button');
            buttons.forEach(btn => {
                btn.classList.remove('bg-primary', 'text-white');
                btn.classList.add('text-gray-700', 'dark:text-gray-300');
            });
            
            // Add active class to clicked button
            event.target.classList.remove('text-gray-700', 'dark:text-gray-300');
            event.target.classList.add('bg-primary', 'text-white');
            
            console.log('Filtering bets by:', period);
        }

        // Close modals when clicking outside
        window.addEventListener('click', function(event) {
            const modals = ['addBetModal', 'logoutModal'];
            modals.forEach(modalId => {
                const modal = document.getElementById(modalId);
                if (event.target === modal) {
                    closeModal(modalId);
                }
            });
        });

        // Purchase odds function
        function purchaseOdds(packageType, credits) {
            const currentCredits = parseInt(document.getElementById('creditsBalance').textContent);
            
            if (currentCredits < credits) {
                showMessage(`Insufficient credits. You need ${credits} credits but only have ${currentCredits}.`, 'error');
                return;
            }
            
            // Deduct credits
            document.getElementById('creditsBalance').textContent = currentCredits - credits;
            
            // Show success message based on package
            let packageName = '';
            switch(packageType) {
                case 'daily':
                    packageName = 'Daily Tips';
                    break;
                case 'vip':
                    packageName = 'VIP Package';
                    break;
                case 'accumulator':
                    packageName = 'Accumulators';
                    break;
            }
            
            showMessage(`Successfully purchased ${packageName}! You now have access to premium tips.`);
            console.log(`Purchased ${packageName} for ${credits} credits`);
        }

        // Buy credits function
        function buyCredits(amount, price) {
            showConfirmModal(
                `Purchase ${amount} credits for $${price}?`,
                () => {
                    // Simulate payment processing
                    const currentCredits = parseInt(document.getElementById('creditsBalance').textContent);
                    document.getElementById('creditsBalance').textContent = currentCredits + amount;
                    showMessage(`Successfully purchased ${amount} credits! Your new balance is ${currentCredits + amount} credits.`);
                    console.log(`Purchased ${amount} credits for $${price}`);
                }
            );
        }

        // Purchase ebook function
        function purchaseEbook(ebookId, price) {
            showConfirmModal(
                `Purchase this e-book for $${price}?`,
                () => {
                    showMessage(`E-book purchased successfully! Check your library to download it.`);
                    console.log(`Purchased e-book ${ebookId} for $${price}`);
                }
            );
        }

        // Purchase bundle function
        function purchaseBundle(price) {
            showConfirmModal(
                `Purchase the complete e-book bundle for $${price}?`,
                () => {
                    showMessage(`Bundle purchased successfully! All 3 e-books are now available in your library.`);
                    console.log(`Purchased complete bundle for $${price}`);
                }
            );
        }

        // Custom confirmation modal
        function showConfirmModal(message, onConfirm) {
            const modal = document.createElement('div');
            modal.className = 'fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center p-4';
            modal.innerHTML = `
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-2xl max-w-md w-full">
                    <div class="p-6">
                        <div class="flex items-center justify-center w-16 h-16 mx-auto bg-primary bg-opacity-20 rounded-full mb-4">
                            <i class="fas fa-shopping-cart text-primary text-2xl"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white text-center mb-2">Confirm Purchase</h3>
                        <p class="text-gray-600 dark:text-gray-400 text-center mb-6">${message}</p>
                        <div class="flex space-x-3">
                            <button onclick="this.closest('.fixed').remove(); document.body.style.overflow = 'auto';" class="flex-1 bg-gray-200 dark:bg-gray-600 text-gray-800 dark:text-gray-200 py-3 rounded-lg font-semibold hover:bg-gray-300 dark:hover:bg-gray-500 transition-all duration-200">Cancel</button>
                            <button onclick="this.closest('.fixed').remove(); document.body.style.overflow = 'auto'; (${onConfirm.toString()})()" class="flex-1 bg-primary text-white py-3 rounded-lg font-semibold hover:bg-opacity-90 transition-all duration-200">Confirm</button>
                        </div>
                    </div>
                </div>
            `;
            document.body.appendChild(modal);
            document.body.style.overflow = 'hidden';
            
            // Close modal when clicking outside
            modal.addEventListener('click', function(e) {
                if (e.target === modal) {
                    modal.remove();
                    document.body.style.overflow = 'auto';
                }
            });
        }

        // Navigation highlighting
        document.addEventListener('scroll', function() {
            const sections = ['overview', 'bet-tracker', 'premium-odds', 'courses', 'ebooks'];
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