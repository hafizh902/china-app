<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>China Street Food - Ordering System</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+SC:wght@400;500;700&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'chinese-red': '#C41E3A',
                        'chinese-black': '#1A1A1A',
                        'chinese-gold': '#D4AF37',
                        'chinese-gold-light': '#F0D878',
                    },
                    fontFamily: {
                        'chinese': ['Noto Sans SC', 'sans-serif'],
                        'sans': ['Inter', 'sans-serif'],
                    },
                    animation: {
                        'fade-in': 'fadeIn 0.5s ease-in-out',
                        'slide-up': 'slideUp 0.5s ease-out',
                        'slide-right': 'slideRight 0.3s ease-out',
                        'pulse-gold': 'pulseGold 2s infinite',
                    },
                    keyframes: {
                        fadeIn: {
                            '0%': { opacity: '0' },
                            '100%': { opacity: '1' },
                        },
                        slideUp: {
                            '0%': { transform: 'translateY(20px)', opacity: '0' },
                            '100%': { transform: 'translateY(0)', opacity: '1' },
                        },
                        slideRight: {
                            '0%': { transform: 'translateX(-100%)' },
                            '100%': { transform: 'translateX(0)' },
                        },
                        pulseGold: {
                            '0%, 100%': { boxShadow: '0 0 0 0 rgba(212, 175, 55, 0.4)' },
                            '50%': { boxShadow: '0 0 0 10px rgba(212, 175, 55, 0)' },
                        }
                    }
                }
            }
        }
    </script>
    <style>
        * {
            -webkit-tap-highlight-color: transparent;
        }
        
        body {
            font-family: 'Inter', sans-serif;
            overflow-x: hidden;
        }
        
        .chinese-font {
            font-family: 'Noto Sans SC', sans-serif;
        }
        
        .btn-primary {
            background-color: #C41E3A;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        
        .btn-primary:hover {
            background-color: #A01729;
            box-shadow: 0 4px 12px rgba(196, 30, 58, 0.3);
            transform: translateY(-2px);
        }
        
        .btn-gold {
            background-color: #D4AF37;
            color: #1A1A1A;
            transition: all 0.3s ease;
        }
        
        .btn-gold:hover {
            background-color: #C4A030;
            transform: translateY(-2px);
        }
        
        .page {
            display: none;
        }
        
        .page.active {
            display: block;
            animation: fadeIn 0.3s ease;
        }
        
        .status-badge {
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            display: inline-block;
        }
        
        .status-available {
            background-color: #D4EDDA;
            color: #155724;
        }
        
        .status-unavailable {
            background-color: #F8D7DA;
            color: #721C24;
        }
        
        .status-preparing {
            background-color: #FFF3CD;
            color: #856404;
        }
        
        .status-ready {
            background-color: #D1ECF1;
            color: #0C5460;
        }
        
        .status-completed {
            background-color: #D4EDDA;
            color: #155724;
        }
        
        .gold-accent {
            color: #D4AF37;
        }
        
        .red-accent {
            color: #C41E3A;
        }
        
        .black-bg {
            background-color: #1A1A1A;
        }
        
        .gold-border {
            border: 1px solid #D4AF37;
        }
        
        .red-border {
            border: 1px solid #C41E3A;
        }
        
        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }
        
        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }
        
        ::-webkit-scrollbar-thumb {
            background: #C41E3A;
            border-radius: 4px;
        }
        
        ::-webkit-scrollbar-thumb:hover {
            background: #A01729;
        }
        
        /* Toast notification */
        .toast {
            position: fixed;
            top: 20px;
            right: 20px;
            background: #1A1A1A;
            color: white;
            padding: 16px 24px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            z-index: 2000;
            animation: slideInRight 0.3s ease;
            max-width: 400px;
        }
        
        @keyframes slideInRight {
            from {
                transform: translateX(100%);
                opacity: 0;
            }
            to {
                transform: translateX(0);
                opacity: 1;
            }
        }
        
        /* Modal */
        .modal {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.5);
            z-index: 1000;
            display: none;
            align-items: center;
            justify-content: center;
            backdrop-filter: blur(4px);
        }
        
        .modal.active {
            display: flex;
        }
        
        .modal-content {
            background: white;
            border-radius: 16px;
            width: 90%;
            max-width: 600px;
            max-height: 90vh;
            overflow-y: auto;
            animation: slideUp 0.3s ease;
        }
        
        /* Form inputs */
        .form-input {
            width: 100%;
            padding: 12px 16px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 16px;
            transition: all 0.3s;
        }
        
        .form-input:focus {
            outline: none;
            border-color: #C41E3A;
            box-shadow: 0 0 0 3px rgba(196, 30, 58, 0.1);
        }
        
        /* Desktop Sidebar */
        .desktop-sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: 280px;
            height: 100vh;
            background: #1A1A1A;
            z-index: 999;
            overflow-y: auto;
        }
        
        .main-content {
            margin-left: 280px;
            min-height: 100vh;
            transition: margin-left 0.3s ease;
        }
        
        .main-content.sidebar-collapsed {
            margin-left: 0;
        }
        
        /* User Sidebar (Cart) */
        .user-sidebar {
            position: fixed;
            top: 0;
            right: -400px;
            width: 400px;
            height: 100vh;
            background: white;
            box-shadow: -4px 0 12px rgba(0, 0, 0, 0.1);
            transition: right 0.3s ease;
            z-index: 998;
            overflow-y: auto;
        }
        
        .user-sidebar.active {
            right: 0;
        }
        
        /* Desktop Navigation */
        .desktop-nav {
            background: white;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            position: sticky;
            top: 0;
            z-index: 100;
        }
        
        /* Menu card hover effects */
        .menu-card {
            transition: all 0.3s ease;
            cursor: pointer;
            border: 1px solid transparent;
        }
        
        .menu-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.15);
            border-color: #D4AF37;
        }
        
        /* Table hover */
        .table-row:hover {
            background-color: #f9f9f9;
        }
        
        /* Mobile responsiveness */
        @media (max-width: 1024px) {
            .desktop-sidebar {
                transform: translateX(-100%);
                transition: transform 0.3s ease;
            }
            
            .desktop-sidebar.mobile-active {
                transform: translateX(0);
            }
            
            .main-content {
                margin-left: 0;
            }
            
            .user-sidebar {
                width: 100%;
                right: -100%;
            }
        }
        
        @media (max-width: 768px) {
            .modal-content {
                width: 95%;
                margin: 20px;
            }
        }
        
        /* Loading animation */
        .loader {
            border: 3px solid #f3f3f3;
            border-top: 3px solid #C41E3A;
            border-radius: 50%;
            width: 20px;
            height: 20px;
            animation: spin 1s linear infinite;
        }
        
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        
        /* Search bar animation */
        .search-container {
            position: relative;
            max-width: 400px;
        }
        
        .search-input {
            padding-left: 40px;
            padding-right: 40px;
        }
        
        /* Category pills */
        .category-pill {
            transition: all 0.3s ease;
            white-space: nowrap;
        }
        
        .category-pill:hover {
            transform: translateY(-2px);
        }
        
        /* Admin stats cards */
        .stat-card {
            transition: all 0.3s ease;
        }
        
        .stat-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body class="bg-gray-50">
    <!-- Toast Container -->
    <div id="toastContainer"></div>
    
    <!-- Login/Register Modal -->
    <div id="authModal" class="modal">
        <div class="modal-content p-8">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-3xl font-bold chinese-font red-accent" id="authTitle">Login</h2>
                <button onclick="closeAuthModal()" class="text-gray-500 hover:text-gray-700 text-2xl transition-colors">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            
            <!-- Login Form -->
            <div id="loginForm">
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-semibold mb-2">Email</label>
                    <input type="email" id="loginEmail" class="form-input" placeholder="your@email.com">
                </div>
                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-semibold mb-2">Password</label>
                    <input type="password" id="loginPassword" class="form-input" placeholder="••••••••">
                </div>
                <button onclick="login()" class="w-full btn-primary text-white py-3 rounded-lg font-semibold hover:shadow-lg transition-all">
                    Login
                </button>
                <div class="text-center mt-6">
                    <p class="text-gray-600">Don't have an account? <a href="#" onclick="showRegisterForm()" class="red-accent font-semibold hover:underline">Register</a></p>
                </div>
            </div>
            
            <!-- Register Form -->
            <div id="registerForm" style="display: none;">
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-semibold mb-2">Full Name</label>
                    <input type="text" id="registerName" class="form-input" placeholder="Your Full Name">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-semibold mb-2">Email</label>
                    <input type="email" id="registerEmail" class="form-input" placeholder="your@email.com">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-semibold mb-2">Password</label>
                    <input type="password" id="registerPassword" class="form-input" placeholder="••••••••">
                </div>
                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-semibold mb-2">Confirm Password</label>
                    <input type="password" id="registerConfirmPassword" class="form-input" placeholder="••••••••">
                </div>
                <button onclick="register()" class="w-full btn-primary text-white py-3 rounded-lg font-semibold hover:shadow-lg transition-all">
                    Register
                </button>
                <div class="text-center mt-6">
                    <p class="text-gray-600">Already have an account? <a href="#" onclick="showLoginForm()" class="red-accent font-semibold hover:underline">Login</a></p>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Menu Detail Modal -->
    <div id="menuDetailModal" class="modal">
        <div class="modal-content p-8">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-3xl font-bold chinese-font red-accent" id="menuDetailTitle">Menu Detail</h2>
                <button onclick="closeMenuDetailModal()" class="text-gray-500 hover:text-gray-700 text-2xl transition-colors">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div id="menuDetailContent">
                <!-- Menu detail will be loaded here -->
            </div>
        </div>
    </div>
    
    <!-- User Sidebar (Cart) -->
    <div id="userSidebar" class="user-sidebar">
        <div class="p-6 border-b">
            <div class="flex justify-between items-center">
                <h2 class="text-2xl font-bold chinese-font red-accent">Your Cart</h2>
                <button onclick="toggleUserSidebar()" class="text-gray-500 hover:text-gray-700 text-xl transition-colors">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
        <div class="p-6">
            <div id="cartItems" class="space-y-4 mb-6 max-h-96 overflow-y-auto">
                <!-- Cart items will be loaded here -->
            </div>
            <div class="border-t pt-6">
                <div class="flex justify-between mb-3">
                    <span class="text-gray-600 font-medium">Subtotal</span>
                    <span id="cartSubtotal" class="font-bold text-lg">$0.00</span>
                </div>
                <div class="flex justify-between mb-3">
                    <span class="text-gray-600 font-medium">Tax (10%)</span>
                    <span id="cartTax" class="font-bold text-lg">$0.00</span>
                </div>
                <div class="flex justify-between text-xl font-bold red-accent mb-6">
                    <span>Total</span>
                    <span id="cartTotal">$0.00</span>
                </div>
                <button onclick="showPage('checkout')" class="w-full btn-primary text-white py-3 rounded-lg font-semibold hover:shadow-lg transition-all">
                    Proceed to Checkout
                </button>
            </div>
        </div>
    </div>
    
    <!-- Landing / Menu List Page -->
    <div id="landingPage" class="page active">
        <!-- Desktop Navigation -->
        <nav class="desktop-nav">
            <div class="px-6 py-4">
                <div class="flex justify-between items-center">
                    <div class="flex items-center space-x-8">
                        <div class="flex items-center space-x-3">
                            <div class="w-10 h-10 bg-chinese-red rounded-full flex items-center justify-center">
                                <i class="fas fa-bowl-food text-gold"></i>
                            </div>
                            <h1 class="text-2xl font-bold chinese-font">China Street Food</h1>
                        </div>
                        <div class="hidden lg:flex space-x-6">
                            <a href="#" onclick="showPage('landing')" class="text-gray-700 hover:text-chinese-red font-medium transition-colors">Home</a>
                            <a href="#" onclick="showPage('menu')" class="text-gray-700 hover:text-chinese-red font-medium transition-colors">Menu</a>
                            <a href="#" onclick="showPage('orderHistory')" class="text-gray-700 hover:text-chinese-red font-medium transition-colors">Orders</a>
                            <a href="#" class="text-gray-700 hover:text-chinese-red font-medium transition-colors">About</a>
                            <a href="#" class="text-gray-700 hover:text-chinese-red font-medium transition-colors">Contact</a>
                        </div>
                    </div>
                    
                    <div class="flex items-center space-x-4">
                        <div class="search-container hidden md:block">
                            <div class="relative">
                                <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                                <input type="text" id="desktopSearchInput" placeholder="Search for food..." 
                                       class="form-input search-input pl-10 pr-4"
                                       oninput="performSearch()">
                            </div>
                        </div>
                        <button onclick="toggleUserSidebar()" class="relative p-2 text-gray-700 hover:text-chinese-red transition-colors">
                            <i class="fas fa-shopping-cart text-xl"></i>
                            <span id="cartCount" class="absolute -top-1 -right-1 bg-chinese-gold text-chinese-black text-xs rounded-full h-6 w-6 flex items-center justify-center font-bold">0</span>
                        </button>
                        <button onclick="showAuthModal()" id="authButton" class="p-2 text-gray-700 hover:text-chinese-red transition-colors">
                            <i class="fas fa-user text-xl"></i>
                        </button>
                    </div>
                </div>
            </div>
        </nav>
        
        <!-- Hero Section -->
        <section class="relative h-96 overflow-hidden">
            <img src="https://picsum.photos/seed/chinesestreet/1920/600.jpg" alt="China Street Food" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-r from-chinese-black via-transparent to-transparent opacity-70"></div>
            <div class="absolute inset-0 flex items-center px-12">
                <div class="text-white max-w-2xl">
                    <h2 class="text-5xl font-bold chinese-font mb-4">Authentic Chinese Street Food</h2>
                    <p class="text-xl mb-8 text-gray-200">Experience the rich flavors and traditions of Chinese street cuisine, delivered fresh to your door</p>
                    <div class="flex space-x-4">
                        <button onclick="showPage('menu')" class="btn-primary text-white px-8 py-3 rounded-lg font-semibold hover:shadow-lg transition-all">
                            <i class="fas fa-utensils mr-2"></i>Order Now
                        </button>
                        <button class="bg-white text-chinese-black px-8 py-3 rounded-lg font-semibold hover:bg-gray-100 transition-all">
                            <i class="fas fa-play-circle mr-2"></i>Watch Video
                        </button>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- Features Section -->
        <section class="py-12 px-6">
            <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="text-center">
                    <div class="w-16 h-16 bg-chinese-red rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-truck text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-2">Fast Delivery</h3>
                    <p class="text-gray-600">Fresh food delivered to your doorstep within 30 minutes</p>
                </div>
                <div class="text-center">
                    <div class="w-16 h-16 bg-chinese-gold rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-award text-chinese-black text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-2">Authentic Recipes</h3>
                    <p class="text-gray-600">Traditional recipes passed down through generations</p>
                </div>
                <div class="text-center">
                    <div class="w-16 h-16 bg-chinese-red rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-leaf text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-2">Fresh Ingredients</h3>
                    <p class="text-gray-600">Only the freshest ingredients sourced daily</p>
                </div>
            </div>
        </section>
        
        <!-- Category Filter -->
        <div class="px-6 py-6 bg-white">
            <div class="max-w-7xl mx-auto">
                <h2 class="text-2xl font-bold chinese-font red-accent mb-6">Browse Categories</h2>
                <div class="flex flex-wrap gap-3">
                    <button onclick="filterByCategory('all')" class="category-filter btn-primary text-white px-6 py-3 rounded-full font-medium">All Items</button>
                    <button onclick="filterByCategory('noodles')" class="category-filter bg-gray-200 text-gray-700 px-6 py-3 rounded-full font-medium hover:bg-gray-300">
                        <i class="fas fa-utensils mr-2"></i>Noodles
                    </button>
                    <button onclick="filterByCategory('dumplings')" class="category-filter bg-gray-200 text-gray-700 px-6 py-3 rounded-full font-medium hover:bg-gray-300">
                        <i class="fas fa-cookie-bite mr-2"></i>Dumplings
                    </button>
                    <button onclick="filterByCategory('rice')" class="category-filter bg-gray-200 text-gray-700 px-6 py-3 rounded-full font-medium hover:bg-gray-300">
                        <i class="fas fa-bowl-rice mr-2"></i>Rice Dishes
                    </button>
                    <button onclick="filterByCategory('drinks')" class="category-filter bg-gray-200 text-gray-700 px-6 py-3 rounded-full font-medium hover:bg-gray-300">
                        <i class="fas fa-mug-hot mr-2"></i>Drinks
                    </button>
                    <button onclick="filterByCategory('desserts')" class="category-filter bg-gray-200 text-gray-700 px-6 py-3 rounded-full font-medium hover:bg-gray-300">
                        <i class="fas fa-ice-cream mr-2"></i>Desserts
                    </button>
                </div>
            </div>
        </div>
        
        <!-- Menu List -->
        <div class="px-6 py-12">
            <div class="max-w-7xl mx-auto">
                <div class="flex justify-between items-center mb-8">
                    <h2 class="text-3xl font-bold chinese-font red-accent">Popular Items</h2>
                    <div class="flex items-center space-x-4">
                        <span class="text-gray-600">Sort by:</span>
                        <select class="form-input w-40" onchange="sortMenu(this.value)">
                            <option value="popular">Popular</option>
                            <option value="price-low">Price: Low to High</option>
                            <option value="price-high">Price: High to Low</option>
                            <option value="name">Name</option>
                        </select>
                    </div>
                </div>
                <div id="menuList" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                    <!-- Menu items will be loaded here -->
                </div>
            </div>
        </div>
    </div>
    
    <!-- Full Menu Page -->
    <div id="menuPage" class="page">
        <!-- Desktop Navigation (same as landing) -->
        <nav class="desktop-nav">
            <div class="px-6 py-4">
                <div class="flex justify-between items-center">
                    <div class="flex items-center space-x-8">
                        <div class="flex items-center space-x-3">
                            <div class="w-10 h-10 bg-chinese-red rounded-full flex items-center justify-center">
                                <i class="fas fa-bowl-food text-gold"></i>
                            </div>
                            <h1 class="text-2xl font-bold chinese-font">China Street Food</h1>
                        </div>
                        <div class="hidden lg:flex space-x-6">
                            <a href="#" onclick="showPage('landing')" class="text-gray-700 hover:text-chinese-red font-medium transition-colors">Home</a>
                            <a href="#" onclick="showPage('menu')" class="text-chinese-red font-medium">Menu</a>
                            <a href="#" onclick="showPage('orderHistory')" class="text-gray-700 hover:text-chinese-red font-medium transition-colors">Orders</a>
                            <a href="#" class="text-gray-700 hover:text-chinese-red font-medium transition-colors">About</a>
                            <a href="#" class="text-gray-700 hover:text-chinese-red font-medium transition-colors">Contact</a>
                        </div>
                    </div>
                    
                    <div class="flex items-center space-x-4">
                        <div class="search-container hidden md:block">
                            <div class="relative">
                                <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                                <input type="text" id="menuSearchInput" placeholder="Search for food..." 
                                       class="form-input search-input pl-10 pr-4"
                                       oninput="performSearch()">
                            </div>
                        </div>
                        <button onclick="toggleUserSidebar()" class="relative p-2 text-gray-700 hover:text-chinese-red transition-colors">
                            <i class="fas fa-shopping-cart text-xl"></i>
                            <span id="cartCountMenu" class="absolute -top-1 -right-1 bg-chinese-gold text-chinese-black text-xs rounded-full h-6 w-6 flex items-center justify-center font-bold">0</span>
                        </button>
                        <button onclick="showAuthModal()" id="authButtonMenu" class="p-2 text-gray-700 hover:text-chinese-red transition-colors">
                            <i class="fas fa-user text-xl"></i>
                        </button>
                    </div>
                </div>
            </div>
        </nav>
        
        <div class="px-6 py-8">
            <div class="max-w-7xl mx-auto">
                <!-- Category Filter (same as landing) -->
                <div class="mb-8">
                    <div class="flex flex-wrap gap-3">
                        <button onclick="filterByCategory('all')" class="category-filter btn-primary text-white px-6 py-3 rounded-full font-medium">All Items</button>
                        <button onclick="filterByCategory('noodles')" class="category-filter bg-gray-200 text-gray-700 px-6 py-3 rounded-full font-medium hover:bg-gray-300">
                            <i class="fas fa-utensils mr-2"></i>Noodles
                        </button>
                        <button onclick="filterByCategory('dumplings')" class="category-filter bg-gray-200 text-gray-700 px-6 py-3 rounded-full font-medium hover:bg-gray-300">
                            <i class="fas fa-cookie-bite mr-2"></i>Dumplings
                        </button>
                        <button onclick="filterByCategory('rice')" class="category-filter bg-gray-200 text-gray-700 px-6 py-3 rounded-full font-medium hover:bg-gray-300">
                            <i class="fas fa-bowl-rice mr-2"></i>Rice Dishes
                        </button>
                        <button onclick="filterByCategory('drinks')" class="category-filter bg-gray-200 text-gray-700 px-6 py-3 rounded-full font-medium hover:bg-gray-300">
                            <i class="fas fa-mug-hot mr-2"></i>Drinks
                        </button>
                        <button onclick="filterByCategory('desserts')" class="category-filter bg-gray-200 text-gray-700 px-6 py-3 rounded-full font-medium hover:bg-gray-300">
                            <i class="fas fa-ice-cream mr-2"></i>Desserts
                        </button>
                    </div>
                </div>
                
                <!-- Full Menu Grid -->
                <div id="fullMenuList" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                    <!-- Full menu items will be loaded here -->
                </div>
            </div>
        </div>
    </div>
    
    <!-- Cart Page -->
    <div id="cartPage" class="page">
        <!-- Desktop Navigation -->
        <nav class="desktop-nav">
            <div class="px-6 py-4">
                <div class="flex justify-between items-center">
                    <div class="flex items-center space-x-8">
                        <div class="flex items-center space-x-3">
                            <div class="w-10 h-10 bg-chinese-red rounded-full flex items-center justify-center">
                                <i class="fas fa-bowl-food text-gold"></i>
                            </div>
                            <h1 class="text-2xl font-bold chinese-font">China Street Food</h1>
                        </div>
                    </div>
                    
                    <div class="flex items-center space-x-4">
                        <button onclick="showPage('landing')" class="text-gray-700 hover:text-chinese-red font-medium transition-colors">
                            <i class="fas fa-arrow-left mr-2"></i>Back to Menu
                        </button>
                    </div>
                </div>
            </div>
        </nav>
        
        <div class="px-6 py-8">
            <div class="max-w-6xl mx-auto">
                <h1 class="text-3xl font-bold chinese-font red-accent mb-8">Shopping Cart</h1>
                
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                    <!-- Cart Items -->
                    <div class="lg:col-span-2">
                        <div class="bg-white rounded-xl shadow-sm p-6">
                            <div id="cartPageItems" class="space-y-4">
                                <!-- Cart items will be loaded here -->
                            </div>
                        </div>
                    </div>
                    
                    <!-- Order Summary -->
                    <div>
                        <div class="bg-white rounded-xl shadow-sm p-6 sticky top-24">
                            <h2 class="text-xl font-bold mb-4">Order Summary</h2>
                            <div class="space-y-3 mb-6">
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Subtotal</span>
                                    <span id="cartPageSubtotal" class="font-semibold">$0.00</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Tax (10%)</span>
                                    <span id="cartPageTax" class="font-semibold">$0.00</span>
                                </div>
                                <div class="border-t pt-3">
                                    <div class="flex justify-between text-xl font-bold red-accent">
                                        <span>Total</span>
                                        <span id="cartPageTotal">$0.00</span>
                                    </div>
                                </div>
                            </div>
                            <button onclick="showPage('checkout')" class="w-full btn-primary text-white py-3 rounded-lg font-semibold hover:shadow-lg transition-all">
                                Proceed to Checkout
                            </button>
                            <button onclick="showPage('menu')" class="w-full mt-3 border border-chinese-red text-chinese-red py-3 rounded-lg font-semibold hover:bg-chinese-red hover:text-white transition-all">
                                Continue Shopping
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Checkout Page -->
    <div id="checkoutPage" class="page">
        <!-- Desktop Navigation -->
        <nav class="desktop-nav">
            <div class="px-6 py-4">
                <div class="flex justify-between items-center">
                    <div class="flex items-center space-x-8">
                        <div class="flex items-center space-x-3">
                            <div class="w-10 h-10 bg-chinese-red rounded-full flex items-center justify-center">
                                <i class="fas fa-bowl-food text-gold"></i>
                            </div>
                            <h1 class="text-2xl font-bold chinese-font">China Street Food</h1>
                        </div>
                    </div>
                    
                    <div class="flex items-center space-x-4">
                        <button onclick="showPage('cart')" class="text-gray-700 hover:text-chinese-red font-medium transition-colors">
                            <i class="fas fa-arrow-left mr-2"></i>Back to Cart
                        </button>
                    </div>
                </div>
            </div>
        </nav>
        
        <div class="px-6 py-8">
            <div class="max-w-6xl mx-auto">
                <h1 class="text-3xl font-bold chinese-font red-accent mb-8">Checkout</h1>
                
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                    <!-- Checkout Form -->
                    <div class="lg:col-span-2">
                        <div class="bg-white rounded-xl shadow-sm p-6 mb-6">
                            <h2 class="text-xl font-bold mb-6">Delivery Information</h2>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div class="mb-4">
                                    <label class="block text-gray-700 text-sm font-semibold mb-2">First Name</label>
                                    <input type="text" id="deliveryFirstName" class="form-input" placeholder="John">
                                </div>
                                <div class="mb-4">
                                    <label class="block text-gray-700 text-sm font-semibold mb-2">Last Name</label>
                                    <input type="text" id="deliveryLastName" class="form-input" placeholder="Doe">
                                </div>
                            </div>
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-semibold mb-2">Email Address</label>
                                <input type="email" id="deliveryEmail" class="form-input" placeholder="john.doe@example.com">
                            </div>
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-semibold mb-2">Phone Number</label>
                                <input type="tel" id="deliveryPhone" class="form-input" placeholder="+1 (555) 123-4567">
                            </div>
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-semibold mb-2">Delivery Address</label>
                                <textarea id="deliveryAddress" class="form-input" rows="3" placeholder="123 Main St, City, State 12345"></textarea>
                            </div>
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-semibold mb-2">Order Type</label>
                                <div class="flex space-x-6">
                                    <label class="flex items-center cursor-pointer">
                                        <input type="radio" name="orderType" value="delivery" checked class="mr-3">
                                        <span class="font-medium">Delivery</span>
                                    </label>
                                    <label class="flex items-center cursor-pointer">
                                        <input type="radio" name="orderType" value="pickup" class="mr-3">
                                        <span class="font-medium">Pickup</span>
                                    </label>
                                </div>
                            </div>
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-semibold mb-2">Special Instructions</label>
                                <textarea id="specialInstructions" class="form-input" rows="3" placeholder="Any special requests or dietary restrictions..."></textarea>
                            </div>
                        </div>
                        
                        <div class="bg-white rounded-xl shadow-sm p-6">
                            <h2 class="text-xl font-bold mb-6">Payment Method</h2>
                            <div class="space-y-3">
                                <label class="flex items-center p-4 border rounded-lg cursor-pointer hover:bg-gray-50">
                                    <input type="radio" name="payment" value="card" checked class="mr-3">
                                    <i class="fas fa-credit-card mr-3 text-chinese-red"></i>
                                    <span>Credit/Debit Card</span>
                                </label>
                                <label class="flex items-center p-4 border rounded-lg cursor-pointer hover:bg-gray-50">
                                    <input type="radio" name="payment" value="paypal" class="mr-3">
                                    <i class="fab fa-paypal mr-3 text-blue-600"></i>
                                    <span>PayPal</span>
                                </label>
                                <label class="flex items-center p-4 border rounded-lg cursor-pointer hover:bg-gray-50">
                                    <input type="radio" name="payment" value="cash" class="mr-3">
                                    <i class="fas fa-money-bill-wave mr-3 text-green-600"></i>
                                    <span>Cash on Delivery</span>
                                </label>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Order Summary -->
                    <div>
                        <div class="bg-white rounded-xl shadow-sm p-6 sticky top-24">
                            <h2 class="text-xl font-bold mb-4">Order Summary</h2>
                            <div id="checkoutItems" class="space-y-3 mb-6 max-h-64 overflow-y-auto">
                                <!-- Checkout items will be loaded here -->
                            </div>
                            <div class="space-y-3 mb-6">
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Subtotal</span>
                                    <span id="checkoutSubtotal" class="font-semibold">$0.00</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Tax (10%)</span>
                                    <span id="checkoutTax" class="font-semibold">$0.00</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Delivery Fee</span>
                                    <span class="font-semibold">$2.99</span>
                                </div>
                                <div class="border-t pt-3">
                                    <div class="flex justify-between text-xl font-bold red-accent">
                                        <span>Total</span>
                                        <span id="checkoutTotal">$0.00</span>
                                    </div>
                                </div>
                            </div>
                            <button onclick="placeOrder()" class="w-full btn-primary text-white py-3 rounded-lg font-semibold hover:shadow-lg transition-all">
                                Place Order
                            </button>
                            <p class="text-xs text-gray-500 text-center mt-4">
                                By placing this order you agree to our Terms & Conditions
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Order History Page -->
    <div id="orderHistoryPage" class="page">
        <!-- Desktop Navigation -->
        <nav class="desktop-nav">
            <div class="px-6 py-4">
                <div class="flex justify-between items-center">
                    <div class="flex items-center space-x-8">
                        <div class="flex items-center space-x-3">
                            <div class="w-10 h-10 bg-chinese-red rounded-full flex items-center justify-center">
                                <i class="fas fa-bowl-food text-gold"></i>
                            </div>
                            <h1 class="text-2xl font-bold chinese-font">China Street Food</h1>
                        </div>
                    </div>
                    
                    <div class="flex items-center space-x-4">
                        <button onclick="showPage('landing')" class="text-gray-700 hover:text-chinese-red font-medium transition-colors">
                            <i class="fas fa-arrow-left mr-2"></i>Back to Home
                        </button>
                    </div>
                </div>
            </div>
        </nav>
        
        <div class="px-6 py-8">
            <div class="max-w-6xl mx-auto">
                <h1 class="text-3xl font-bold chinese-font red-accent mb-8">Order History</h1>
                
                <div id="orderHistoryList" class="space-y-4">
                    <!-- Order history will be loaded here -->
                </div>
            </div>
        </div>
    </div>
    
    <!-- Admin Dashboard -->
    <div id="adminDashboardPage" class="page">
        <!-- Admin Sidebar -->
        <aside class="desktop-sidebar">
            <div class="p-6">
                <div class="flex items-center space-x-3 mb-8">
                    <div class="w-12 h-12 bg-chinese-gold rounded-full flex items-center justify-center">
                        <i class="fas fa-bowl-food text-chinese-black text-xl"></i>
                    </div>
                    <h2 class="text-xl font-bold chinese-font gold-accent">Admin Panel</h2>
                </div>
                
                <nav class="space-y-2">
                    <a href="#" onclick="showAdminPage('dashboard')" class="flex items-center py-3 px-4 rounded-lg hover:bg-gray-800 transition-all group">
                        <i class="fas fa-tachometer-alt mr-3 gold-accent group-hover:scale-110 transition-transform"></i>
                        <span class="text-white font-medium">Dashboard</span>
                    </a>
                    <a href="#" onclick="showAdminPage('menu')" class="flex items-center py-3 px-4 rounded-lg hover:bg-gray-800 transition-all group">
                        <i class="fas fa-utensils mr-3 gold-accent group-hover:scale-110 transition-transform"></i>
                        <span class="text-white font-medium">Menu Management</span>
                    </a>
                    <a href="#" onclick="showAdminPage('orders')" class="flex items-center py-3 px-4 rounded-lg hover:bg-gray-800 transition-all group">
                        <i class="fas fa-receipt mr-3 gold-accent group-hover:scale-110 transition-transform"></i>
                        <span class="text-white font-medium">Order Management</span>
                    </a>
                    <a href="#" onclick="showAdminPage('customers')" class="flex items-center py-3 px-4 rounded-lg hover:bg-gray-800 transition-all group">
                        <i class="fas fa-users mr-3 gold-accent group-hover:scale-110 transition-transform"></i>
                        <span class="text-white font-medium">Customers</span>
                    </a>
                    <a href="#" onclick="showAdminPage('analytics')" class="flex items-center py-3 px-4 rounded-lg hover:bg-gray-800 transition-all group">
                        <i class="fas fa-chart-line mr-3 gold-accent group-hover:scale-110 transition-transform"></i>
                        <span class="text-white font-medium">Analytics</span>
                    </a>
                    <a href="#" onclick="showAdminPage('settings')" class="flex items-center py-3 px-4 rounded-lg hover:bg-gray-800 transition-all group">
                        <i class="fas fa-cog mr-3 gold-accent group-hover:scale-110 transition-transform"></i>
                        <span class="text-white font-medium">Settings</span>
                    </a>
                </nav>
                
                <div class="mt-8 pt-8 border-t border-gray-700">
                    <a href="#" onclick="logout()" class="flex items-center py-3 px-4 rounded-lg hover:bg-red-900 transition-all group">
                        <i class="fas fa-sign-out-alt mr-3 text-red-400 group-hover:scale-110 transition-transform"></i>
                        <span class="text-red-400 font-medium">Logout</span>
                    </a>
                </div>
            </div>
        </aside>
        
        <!-- Main Content -->
        <main class="main-content">
            <!-- Top Bar -->
            <div class="bg-white shadow-sm px-6 py-4">
                <div class="flex justify-between items-center">
                    <button onclick="toggleAdminSidebar()" class="lg:hidden text-gray-700 hover:text-chinese-red">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                    <h1 class="text-2xl font-bold chinese-font">Dashboard</h1>
                    <div class="flex items-center space-x-4">
                        <button class="relative p-2 text-gray-700 hover:text-chinese-red transition-colors">
                            <i class="fas fa-bell text-xl"></i>
                            <span class="absolute top-0 right-0 w-2 h-2 bg-red-500 rounded-full"></span>
                        </button>
                        <div class="flex items-center space-x-3">
                            <div class="w-8 h-8 bg-chinese-gold rounded-full flex items-center justify-center">
                                <i class="fas fa-user text-chinese-black text-sm"></i>
                            </div>
                            <span class="font-medium">Admin</span>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Dashboard Content -->
            <div class="p-6">
                <!-- Stats Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                    <div class="stat-card bg-white p-6 rounded-xl shadow-sm">
                        <div class="flex items-center justify-between mb-4">
                            <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center">
                                <i class="fas fa-receipt text-blue-600 text-xl"></i>
                            </div>
                            <span class="text-sm text-green-600 font-medium">+12.5%</span>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-800" id="totalOrdersCount">0</h3>
                        <p class="text-gray-600 text-sm mt-1">Total Orders</p>
                    </div>
                    
                    <div class="stat-card bg-white p-6 rounded-xl shadow-sm">
                        <div class="flex items-center justify-between mb-4">
                            <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center">
                                <i class="fas fa-dollar-sign text-green-600 text-xl"></i>
                            </div>
                            <span class="text-sm text-green-600 font-medium">+8.2%</span>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-800" id="totalRevenue">$0</h3>
                        <p class="text-gray-600 text-sm mt-1">Total Revenue</p>
                    </div>
                    
                    <div class="stat-card bg-white p-6 rounded-xl shadow-sm">
                        <div class="flex items-center justify-between mb-4">
                            <div class="w-12 h-12 bg-yellow-100 rounded-full flex items-center justify-center">
                                <i class="fas fa-clock text-yellow-600 text-xl"></i>
                            </div>
                            <span class="text-sm text-red-600 font-medium">-3.1%</span>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-800" id="activeOrdersCount">0</h3>
                        <p class="text-gray-600 text-sm mt-1">Active Orders</p>
                    </div>
                    
                    <div class="stat-card bg-white p-6 rounded-xl shadow-sm">
                        <div class="flex items-center justify-between mb-4">
                            <div class="w-12 h-12 bg-purple-100 rounded-full flex items-center justify-center">
                                <i class="fas fa-utensils text-purple-600 text-xl"></i>
                            </div>
                            <span class="text-sm text-green-600 font-medium">+5.7%</span>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-800" id="menuItemsCount">0</h3>
                        <p class="text-gray-600 text-sm mt-1">Menu Items</p>
                    </div>
                </div>
                
                <!-- Recent Orders Table -->
                <div class="bg-white rounded-xl shadow-sm p-6">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-xl font-bold">Recent Orders</h2>
                        <button onclick="showAdminPage('orders')" class="text-chinese-red hover:underline font-medium">
                            View All <i class="fas fa-arrow-right ml-1"></i>
                        </button>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead>
                                <tr class="border-b">
                                    <th class="text-left py-3 px-4 font-semibold text-gray-700">Order ID</th>
                                    <th class="text-left py-3 px-4 font-semibold text-gray-700">Customer</th>
                                    <th class="text-left py-3 px-4 font-semibold text-gray-700">Items</th>
                                    <th class="text-left py-3 px-4 font-semibold text-gray-700">Total</th>
                                    <th class="text-left py-3 px-4 font-semibold text-gray-700">Status</th>
                                    <th class="text-left py-3 px-4 font-semibold text-gray-700">Date</th>
                                </tr>
                            </thead>
                            <tbody id="recentOrdersTable">
                                <!-- Recent orders will be loaded here -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
    </div>
    
    <!-- Admin Menu Page -->
    <div id="adminMenuPage" class="page">
        <!-- Admin Sidebar (same as dashboard) -->
        <aside class="desktop-sidebar">
            <div class="p-6">
                <div class="flex items-center space-x-3 mb-8">
                    <div class="w-12 h-12 bg-chinese-gold rounded-full flex items-center justify-center">
                        <i class="fas fa-bowl-food text-chinese-black text-xl"></i>
                    </div>
                    <h2 class="text-xl font-bold chinese-font gold-accent">Admin Panel</h2>
                </div>
                
                <nav class="space-y-2">
                    <a href="#" onclick="showAdminPage('dashboard')" class="flex items-center py-3 px-4 rounded-lg hover:bg-gray-800 transition-all group">
                        <i class="fas fa-tachometer-alt mr-3 gold-accent group-hover:scale-110 transition-transform"></i>
                        <span class="text-white font-medium">Dashboard</span>
                    </a>
                    <a href="#" onclick="showAdminPage('menu')" class="flex items-center py-3 px-4 rounded-lg bg-gray-800 transition-all group">
                        <i class="fas fa-utensils mr-3 gold-accent group-hover:scale-110 transition-transform"></i>
                        <span class="text-white font-medium">Menu Management</span>
                    </a>
                    <a href="#" onclick="showAdminPage('orders')" class="flex items-center py-3 px-4 rounded-lg hover:bg-gray-800 transition-all group">
                        <i class="fas fa-receipt mr-3 gold-accent group-hover:scale-110 transition-transform"></i>
                        <span class="text-white font-medium">Order Management</span>
                    </a>
                    <a href="#" onclick="showAdminPage('customers')" class="flex items-center py-3 px-4 rounded-lg hover:bg-gray-800 transition-all group">
                        <i class="fas fa-users mr-3 gold-accent group-hover:scale-110 transition-transform"></i>
                        <span class="text-white font-medium">Customers</span>
                    </a>
                    <a href="#" onclick="showAdminPage('analytics')" class="flex items-center py-3 px-4 rounded-lg hover:bg-gray-800 transition-all group">
                        <i class="fas fa-chart-line mr-3 gold-accent group-hover:scale-110 transition-transform"></i>
                        <span class="text-white font-medium">Analytics</span>
                    </a>
                    <a href="#" onclick="showAdminPage('settings')" class="flex items-center py-3 px-4 rounded-lg hover:bg-gray-800 transition-all group">
                        <i class="fas fa-cog mr-3 gold-accent group-hover:scale-110 transition-transform"></i>
                        <span class="text-white font-medium">Settings</span>
                    </a>
                </nav>
                
                <div class="mt-8 pt-8 border-t border-gray-700">
                    <a href="#" onclick="logout()" class="flex items-center py-3 px-4 rounded-lg hover:bg-red-900 transition-all group">
                        <i class="fas fa-sign-out-alt mr-3 text-red-400 group-hover:scale-110 transition-transform"></i>
                        <span class="text-red-400 font-medium">Logout</span>
                    </a>
                </div>
            </div>
        </aside>
        
        <!-- Main Content -->
        <main class="main-content">
            <!-- Top Bar -->
            <div class="bg-white shadow-sm px-6 py-4">
                <div class="flex justify-between items-center">
                    <button onclick="toggleAdminSidebar()" class="lg:hidden text-gray-700 hover:text-chinese-red">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                    <h1 class="text-2xl font-bold chinese-font">Menu Management</h1>
                    <button onclick="showAddMenuModal()" class="btn-gold text-chinese-black px-6 py-2 rounded-lg font-semibold hover:shadow-lg transition-all">
                        <i class="fas fa-plus mr-2"></i>Add New Item
                    </button>
                </div>
            </div>
            
            <!-- Menu Management Content -->
            <div class="p-6">
                <!-- Filters and Search -->
                <div class="bg-white rounded-xl shadow-sm p-4 mb-6">
                    <div class="flex flex-wrap gap-4 items-center">
                        <div class="flex-1 min-w-[300px]">
                            <div class="relative">
                                <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                                <input type="text" placeholder="Search menu items..." class="form-input pl-10">
                            </div>
                        </div>
                        <select class="form-input w-48">
                            <option>All Categories</option>
                            <option>Noodles</option>
                            <option>Dumplings</option>
                            <option>Rice</option>
                            <option>Drinks</option>
                            <option>Desserts</option>
                        </select>
                        <select class="form-input w-48">
                            <option>All Status</option>
                            <option>Available</option>
                            <option>Unavailable</option>
                        </select>
                    </div>
                </div>
                
                <!-- Menu Grid -->
                <div id="adminMenuList" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                    <!-- Admin menu items will be loaded here -->
                </div>
            </div>
        </main>
    </div>
    
    <!-- Admin Orders Page -->
    <div id="adminOrdersPage" class="page">
        <!-- Admin Sidebar (same as dashboard) -->
        <aside class="desktop-sidebar">
            <div class="p-6">
                <div class="flex items-center space-x-3 mb-8">
                    <div class="w-12 h-12 bg-chinese-gold rounded-full flex items-center justify-center">
                        <i class="fas fa-bowl-food text-chinese-black text-xl"></i>
                    </div>
                    <h2 class="text-xl font-bold chinese-font gold-accent">Admin Panel</h2>
                </div>
                
                <nav class="space-y-2">
                    <a href="#" onclick="showAdminPage('dashboard')" class="flex items-center py-3 px-4 rounded-lg hover:bg-gray-800 transition-all group">
                        <i class="fas fa-tachometer-alt mr-3 gold-accent group-hover:scale-110 transition-transform"></i>
                        <span class="text-white font-medium">Dashboard</span>
                    </a>
                    <a href="#" onclick="showAdminPage('menu')" class="flex items-center py-3 px-4 rounded-lg hover:bg-gray-800 transition-all group">
                        <i class="fas fa-utensils mr-3 gold-accent group-hover:scale-110 transition-transform"></i>
                        <span class="text-white font-medium">Menu Management</span>
                    </a>
                    <a href="#" onclick="showAdminPage('orders')" class="flex items-center py-3 px-4 rounded-lg bg-gray-800 transition-all group">
                        <i class="fas fa-receipt mr-3 gold-accent group-hover:scale-110 transition-transform"></i>
                        <span class="text-white font-medium">Order Management</span>
                    </a>
                    <a href="#" onclick="showAdminPage('customers')" class="flex items-center py-3 px-4 rounded-lg hover:bg-gray-800 transition-all group">
                        <i class="fas fa-users mr-3 gold-accent group-hover:scale-110 transition-transform"></i>
                        <span class="text-white font-medium">Customers</span>
                    </a>
                    <a href="#" onclick="showAdminPage('analytics')" class="flex items-center py-3 px-4 rounded-lg hover:bg-gray-800 transition-all group">
                        <i class="fas fa-chart-line mr-3 gold-accent group-hover:scale-110 transition-transform"></i>
                        <span class="text-white font-medium">Analytics</span>
                    </a>
                    <a href="#" onclick="showAdminPage('settings')" class="flex items-center py-3 px-4 rounded-lg hover:bg-gray-800 transition-all group">
                        <i class="fas fa-cog mr-3 gold-accent group-hover:scale-110 transition-transform"></i>
                        <span class="text-white font-medium">Settings</span>
                    </a>
                </nav>
                
                <div class="mt-8 pt-8 border-t border-gray-700">
                    <a href="#" onclick="logout()" class="flex items-center py-3 px-4 rounded-lg hover:bg-red-900 transition-all group">
                        <i class="fas fa-sign-out-alt mr-3 text-red-400 group-hover:scale-110 transition-transform"></i>
                        <span class="text-red-400 font-medium">Logout</span>
                    </a>
                </div>
            </div>
        </aside>
        
        <!-- Main Content -->
        <main class="main-content">
            <!-- Top Bar -->
            <div class="bg-white shadow-sm px-6 py-4">
                <div class="flex justify-between items-center">
                    <button onclick="toggleAdminSidebar()" class="lg:hidden text-gray-700 hover:text-chinese-red">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                    <h1 class="text-2xl font-bold chinese-font">Order Management</h1>
                    <div class="flex items-center space-x-4">
                        <button class="text-gray-700 hover:text-chinese-red font-medium transition-colors">
                            <i class="fas fa-download mr-2"></i>Export
                        </button>
                        <button class="text-gray-700 hover:text-chinese-red font-medium transition-colors">
                            <i class="fas fa-filter mr-2"></i>Filter
                        </button>
                    </div>
                </div>
            </div>
            
            <!-- Orders Table -->
            <div class="p-6">
                <div class="bg-white rounded-xl shadow-sm overflow-hidden">
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="text-left py-4 px-6 font-semibold text-gray-700">Order ID</th>
                                    <th class="text-left py-4 px-6 font-semibold text-gray-700">Customer</th>
                                    <th class="text-left py-4 px-6 font-semibold text-gray-700">Items</th>
                                    <th class="text-left py-4 px-6 font-semibold text-gray-700">Total</th>
                                    <th class="text-left py-4 px-6 font-semibold text-gray-700">Type</th>
                                    <th class="text-left py-4 px-6 font-semibold text-gray-700">Status</th>
                                    <th class="text-left py-4 px-6 font-semibold text-gray-700">Date</th>
                                    <th class="text-left py-4 px-6 font-semibold text-gray-700">Actions</th>
                                </tr>
                            </thead>
                            <tbody id="adminOrdersTable">
                                <!-- Admin orders will be loaded here -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
    </div>
    
    <!-- Add Menu Modal -->
    <div id="addMenuModal" class="modal">
        <div class="modal-content p-8">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold chinese-font red-accent">Add New Menu Item</h2>
                <button onclick="closeAddMenuModal()" class="text-gray-500 hover:text-gray-700 text-2xl transition-colors">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-semibold mb-2">Item Name *</label>
                    <input type="text" id="menuName" class="form-input" placeholder="Enter item name">
                </div>
                
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-semibold mb-2">Category *</label>
                    <select id="menuCategory" class="form-input">
                        <option value="noodles">Noodles</option>
                        <option value="dumplings">Dumplings</option>
                        <option value="rice">Rice</option>
                        <option value="drinks">Drinks</option>
                        <option value="desserts">Desserts</option>
                    </select>
                </div>
                
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-semibold mb-2">Price *</label>
                    <input type="number" id="menuPrice" class="form-input" placeholder="0.00" step="0.01">
                </div>
                
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-semibold mb-2">Preparation Time</label>
                    <input type="text" id="prepTime" class="form-input" placeholder="15-20 mins">
                </div>
                
                <div class="mb-4 md:col-span-2">
                    <label class="block text-gray-700 text-sm font-semibold mb-2">Description *</label>
                    <textarea id="menuDescription" class="form-input" rows="3" placeholder="Describe the item..."></textarea>
                </div>
                
                <div class="mb-4 md:col-span-2">
                    <label class="block text-gray-700 text-sm font-semibold mb-2">Image</label>
                    <div class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center">
                        <i class="fas fa-cloud-upload-alt text-4xl text-gray-400 mb-2"></i>
                        <p class="text-gray-600">Click to upload or drag and drop</p>
                        <p class="text-sm text-gray-500">PNG, JPG up to 10MB</p>
                        <input type="file" id="menuImage" class="hidden" accept="image/*">
                    </div>
                </div>
                
                <div class="mb-4 md:col-span-2">
                    <label class="flex items-center cursor-pointer">
                        <input type="checkbox" id="menuAvailable" class="mr-3 w-5 h-5" checked>
                        <span class="font-medium">Available for order</span>
                    </label>
                </div>
            </div>
            
            <div class="flex justify-end space-x-3 mt-6">
                <button onclick="closeAddMenuModal()" class="px-6 py-2 border border-gray-300 rounded-lg font-medium hover:bg-gray-50 transition-colors">
                    Cancel
                </button>
                <button onclick="addMenu()" class="btn-primary text-white px-6 py-2 rounded-lg font-medium hover:shadow-lg transition-all">
                    Add Menu Item
                </button>
            </div>
        </div>
    </div>
    
    <script>
        // Application State
        let menuData = [
            { id: 1, name: 'Spicy Beef Noodles', price: 12.99, category: 'noodles', image: 'beefnoodles', description: 'Hand-pulled noodles with tender beef slices in a spicy broth', available: true, prepTime: '15-20 mins' },
            { id: 2, name: 'Pork Dumplings', price: 8.99, category: 'dumplings', image: 'dumplings', description: 'Steamed dumplings filled with seasoned pork and vegetables', available: true, prepTime: '10-15 mins' },
            { id: 3, name: 'Fried Rice with Shrimp', price: 10.99, category: 'rice', image: 'friedrice', description: 'Wok-fried rice with fresh shrimp, eggs, and vegetables', available: true, prepTime: '12-18 mins' },
            { id: 4, name: 'Sweet & Sour Chicken', price: 11.99, category: 'rice', image: 'sweetandsour', description: 'Crispy chicken in a tangy sweet and sour sauce', available: false, prepTime: '20-25 mins' },
            { id: 5, name: 'Vegetable Spring Rolls', price: 6.99, category: 'dumplings', image: 'springrolls', description: 'Crispy rolls filled with fresh vegetables', available: true, prepTime: '8-12 mins' },
            { id: 6, name: 'Jasmine Tea', price: 2.99, category: 'drinks', image: 'tea', description: 'Fragrant green tea infused with jasmine flowers', available: true, prepTime: '2-3 mins' },
            { id: 7, name: 'Mapo Tofu', price: 9.99, category: 'rice', description: 'Silky tofu in a spicy chili bean sauce', available: true, prepTime: '15-20 mins' },
            { id: 8, name: 'Pork Buns', price: 7.99, category: 'dumplings', image: 'buns', description: 'Steamed buns filled with savory pork', available: true, prepTime: '10-15 mins' },
            { id: 9, name: 'Chicken Chow Mein', price: 10.99, category: 'noodles', image: 'chowmein', description: 'Stir-fried noodles with chicken and vegetables', available: true, prepTime: '12-18 mins' },
            { id: 10, name: 'Mango Pudding', price: 4.99, category: 'desserts', image: 'pudding', description: 'Sweet and creamy mango pudding', available: true, prepTime: '5 mins' },
            { id: 11, name: 'Wonton Soup', price: 7.99, category: 'dumplings', image: 'wonton', description: 'Clear broth with pork and shrimp wontons', available: true, prepTime: '10-15 mins' },
            { id: 12, name: 'Beef Fried Rice', price: 11.99, category: 'rice', image: 'beefrice', description: 'Wok-fried rice with tender beef strips', available: true, prepTime: '15-20 mins' }
        ];
        
        let cart = JSON.parse(localStorage.getItem('cart')) || [];
        let orders = JSON.parse(localStorage.getItem('orders')) || [];
        let currentUser = JSON.parse(localStorage.getItem('currentUser')) || null;
        let currentCategory = 'all';
        let searchQuery = '';
        let currentPage = 'landing';
        
        // Initialize app
        document.addEventListener('DOMContentLoaded', function() {
            loadMenu();
            updateCartUI();
            updateOrderHistory();
            updateAdminDashboard();
            
            if (currentUser) {
                updateAuthUI();
            }
            
            // Initialize menu data in localStorage if not exists
            if (!localStorage.getItem('menuData')) {
                localStorage.setItem('menuData', JSON.stringify(menuData));
            } else {
                menuData = JSON.parse(localStorage.getItem('menuData'));
            }
        });
        
        // Page Navigation
        function showPage(page) {
            // Hide all pages
            document.querySelectorAll('.page').forEach(p => p.classList.remove('active'));
            
            // Show selected page
            document.getElementById(page + 'Page').classList.add('active');
            currentPage = page;
            
            // Close user sidebar if open
            document.getElementById('userSidebar').classList.remove('active');
            
            // Load page-specific content
            if (page === 'cart' || page === 'checkout') {
                updateCartUI();
            } else if (page === 'orderHistory') {
                updateOrderHistory();
            } else if (page === 'menu') {
                loadFullMenu();
            }
        }
        
        // Auth Functions
        function showAuthModal() {
            if (currentUser) {
                // If user is logged in, show user menu or logout
                if (currentUser.role === 'admin') {
                    showPage('adminDashboard');
                } else {
                    showToast('You are already logged in');
                }
            } else {
                document.getElementById('authModal').classList.add('active');
            }
        }
        
        function closeAuthModal() {
            document.getElementById('authModal').classList.remove('active');
        }
        
        function showLoginForm() {
            document.getElementById('loginForm').style.display = 'block';
            document.getElementById('registerForm').style.display = 'none';
            document.getElementById('authTitle').textContent = 'Login';
        }
        
        function showRegisterForm() {
            document.getElementById('loginForm').style.display = 'none';
            document.getElementById('registerForm').style.display = 'block';
            document.getElementById('authTitle').textContent = 'Register';
        }
        
        function login() {
            const email = document.getElementById('loginEmail').value;
            const password = document.getElementById('loginPassword').value;
            
            if (!email || !password) {
                showToast('Please fill in all fields');
                return;
            }
            
            // Check if admin
            if (email === 'admin@chinastreet.com' && password === 'admin123') {
                currentUser = { id: 1, name: 'Admin', email: email, role: 'admin' };
                localStorage.setItem('currentUser', JSON.stringify(currentUser));
                updateAuthUI();
                closeAuthModal();
                showPage('adminDashboard');
                showToast('Welcome back, Admin!');
                return;
            }
            
            // Check regular user
            const users = JSON.parse(localStorage.getItem('users')) || [];
            const user = users.find(u => u.email === email && u.password === password);
            
            if (user) {
                currentUser = user;
                localStorage.setItem('currentUser', JSON.stringify(currentUser));
                updateAuthUI();
                closeAuthModal();
                showToast('Login successful!');
            } else {
                showToast('Invalid email or password');
            }
        }
        
        function register() {
            const name = document.getElementById('registerName').value;
            const email = document.getElementById('registerEmail').value;
            const password = document.getElementById('registerPassword').value;
            const confirmPassword = document.getElementById('registerConfirmPassword').value;
            
            if (!name || !email || !password || !confirmPassword) {
                showToast('Please fill in all fields');
                return;
            }
            
            if (password !== confirmPassword) {
                showToast('Passwords do not match');
                return;
            }
            
            const users = JSON.parse(localStorage.getItem('users')) || [];
            const newUser = { id: users.length + 1, name, email, password, role: 'user' };
            users.push(newUser);
            localStorage.setItem('users', JSON.stringify(users));
            
            currentUser = newUser;
            localStorage.setItem('currentUser', JSON.stringify(currentUser));
            updateAuthUI();
            closeAuthModal();
            showToast('Registration successful!');
        }
        
        function logout() {
            currentUser = null;
            localStorage.removeItem('currentUser');
            updateAuthUI();
            showPage('landing');
            showToast('You have been logged out');
        }
        
        function updateAuthUI() {
            const authButtons = document.querySelectorAll('#authButton, #authButtonMenu');
            authButtons.forEach(button => {
                if (currentUser) {
                    button.innerHTML = '<i class="fas fa-user-check text-xl"></i>';
                    if (currentUser.role === 'admin') {
                        button.classList.add('gold-accent');
                    }
                } else {
                    button.innerHTML = '<i class="fas fa-user text-xl"></i>';
                    button.classList.remove('gold-accent');
                }
            });
        }
        
        // Menu Functions
        function loadMenu() {
            const menuList = document.getElementById('menuList');
            let filteredMenu = currentCategory === 'all' 
                ? menuData.slice(0, 8) 
                : menuData.filter(item => item.category === currentCategory).slice(0, 8);
            
            if (searchQuery) {
                filteredMenu = filteredMenu.filter(item => 
                    item.name.toLowerCase().includes(searchQuery.toLowerCase()) || 
                    item.description.toLowerCase().includes(searchQuery.toLowerCase())
                );
            }
            
            if (filteredMenu.length === 0) {
                menuList.innerHTML = '<p class="text-center text-gray-500 py-8 col-span-full">No items found</p>';
            } else {
                menuList.innerHTML = filteredMenu.map(item => createMenuItem(item)).join('');
            }
        }
        
        function loadFullMenu() {
            const menuList = document.getElementById('fullMenuList');
            let filteredMenu = currentCategory === 'all' 
                ? menuData 
                : menuData.filter(item => item.category === currentCategory);
            
            if (searchQuery) {
                filteredMenu = filteredMenu.filter(item => 
                    item.name.toLowerCase().includes(searchQuery.toLowerCase()) || 
                    item.description.toLowerCase().includes(searchQuery.toLowerCase())
                );
            }
            
            if (filteredMenu.length === 0) {
                menuList.innerHTML = '<p class="text-center text-gray-500 py-8 col-span-full">No items found</p>';
            } else {
                menuList.innerHTML = filteredMenu.map(item => createMenuItem(item)).join('');
            }
        }
        
        function createMenuItem(item) {
            const statusBadge = item.available 
                ? '<span class="status-badge status-available">Available</span>'
                : '<span class="status-badge status-unavailable">Unavailable</span>';
            
            return `
                <div class="menu-card bg-white rounded-xl overflow-hidden shadow-sm">
                    <div class="relative h-48 overflow-hidden">
                        <img src="https://picsum.photos/seed/${item.image}/400/300.jpg" alt="${item.name}" class="w-full h-full object-cover">
                        <div class="absolute top-3 right-3">
                            ${statusBadge}
                        </div>
                        ${!item.available ? '<div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center"><span class="text-white font-bold text-lg">Currently Unavailable</span></div>' : ''}
                    </div>
                    <div class="p-5">
                        <h3 class="font-bold text-lg mb-2">${item.name}</h3>
                        <p class="text-gray-600 text-sm mb-3 line-clamp-2">${item.description}</p>
                        <div class="flex items-center justify-between mb-3">
                            <span class="text-xl font-bold gold-accent">$${item.price}</span>
                            <span class="text-sm text-gray-500"><i class="fas fa-clock mr-1"></i>${item.prepTime}</span>
                        </div>
                        <button onclick="showMenuDetail(${item.id})" class="w-full btn-primary text-white py-2 rounded-lg font-medium hover:shadow-lg transition-all ${!item.available ? 'opacity-50 cursor-not-allowed' : ''}" ${!item.available ? 'disabled' : ''}>
                            ${item.available ? 'View Details' : 'Unavailable'}
                        </button>
                    </div>
                </div>
            `;
        }
        
        function showMenuDetail(itemId) {
            const item = menuData.find(m => m.id === itemId);
            if (!item) return;
            
            const statusBadge = item.available 
                ? '<span class="status-badge status-available">Available</span>'
                : '<span class="status-badge status-unavailable">Unavailable</span>';
            
            const detailContent = `
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <img src="https://picsum.photos/seed/${item.image}/600/400.jpg" alt="${item.name}" class="w-full h-64 object-cover rounded-lg">
                    </div>
                    <div>
                        <div class="flex justify-between items-start mb-4">
                            <h3 class="text-3xl font-bold chinese-font red-accent">${item.name}</h3>
                            ${statusBadge}
                        </div>
                        <p class="text-gray-600 mb-4">${item.description}</p>
                        <div class="flex items-center space-x-4 mb-6">
                            <span class="text-2xl font-bold gold-accent">$${item.price}</span>
                            <span class="text-gray-500"><i class="fas fa-clock mr-1"></i>${item.prepTime}</span>
                        </div>
                        <button onclick="addToCart(${item.id})" class="w-full btn-primary text-white py-3 rounded-lg font-semibold hover:shadow-lg transition-all ${!item.available ? 'opacity-50 cursor-not-allowed' : ''}" ${!item.available ? 'disabled' : ''}>
                            ${item.available ? '<i class="fas fa-cart-plus mr-2"></i>Add to Cart' : 'Currently Unavailable'}
                        </button>
                    </div>
                </div>
            `;
            
            document.getElementById('menuDetailContent').innerHTML = detailContent;
            document.getElementById('menuDetailModal').classList.add('active');
        }
        
        function closeMenuDetailModal() {
            document.getElementById('menuDetailModal').classList.remove('active');
        }
        
        // Cart Functions
        function toggleUserSidebar() {
            document.getElementById('userSidebar').classList.toggle('active');
        }
        
        function addToCart(itemId) {
            const item = menuData.find(m => m.id === itemId);
            if (!item || !item.available) {
                showToast('This item is currently unavailable');
                return;
            }
            
            const existingItem = cart.find(c => c.id === itemId);
            
            if (existingItem) {
                existingItem.quantity++;
            } else {
                cart.push({ ...item, quantity: 1 });
            }
            
            saveCart();
            updateCartUI();
            closeMenuDetailModal();
            showToast(`${item.name} added to cart!`);
        }
        
        function removeFromCart(itemId) {
            cart = cart.filter(item => item.id !== itemId);
            saveCart();
            updateCartUI();
        }
        
        function updateQuantity(itemId, change) {
            const item = cart.find(c => c.id === itemId);
            if (item) {
                item.quantity += change;
                if (item.quantity <= 0) {
                    removeFromCart(itemId);
                } else {
                    saveCart();
                    updateCartUI();
                }
            }
        }
        
        function saveCart() {
            localStorage.setItem('cart', JSON.stringify(cart));
        }
        
        function updateCartUI() {
            // Update cart count
            const totalItems = cart.reduce((sum, item) => sum + item.quantity, 0);
            document.getElementById('cartCount').textContent = totalItems;
            document.getElementById('cartCountMenu').textContent = totalItems;
            
            // Update cart items
            const cartItemsDiv = document.getElementById('cartItems');
            const cartPageItemsDiv = document.getElementById('cartPageItems');
            const checkoutItemsDiv = document.getElementById('checkoutItems');
            
            if (cart.length === 0) {
                const emptyMessage = '<p class="text-center text-gray-500 py-8">Your cart is empty</p>';
                cartItemsDiv.innerHTML = emptyMessage;
                cartPageItemsDiv.innerHTML = emptyMessage;
                checkoutItemsDiv.innerHTML = emptyMessage;
            } else {
                const cartItemsHTML = cart.map(item => `
                    <div class="flex items-center space-x-4 p-4 bg-gray-50 rounded-lg">
                        <img src="https://picsum.photos/seed/${item.image}/100/100.jpg" alt="${item.name}" class="w-20 h-20 rounded-lg object-cover">
                        <div class="flex-1">
                            <h4 class="font-semibold text-lg">${item.name}</h4>
                            <p class="text-gray-600">$${item.price}</p>
                        </div>
                        <div class="flex items-center space-x-3">
                            <button onclick="updateQuantity(${item.id}, -1)" class="w-10 h-10 rounded-full bg-white border border-gray-300 flex items-center justify-center hover:bg-gray-100 transition-colors">
                                <i class="fas fa-minus text-sm"></i>
                            </button>
                            <span class="w-12 text-center font-semibold">${item.quantity}</span>
                            <button onclick="updateQuantity(${item.id}, 1)" class="w-10 h-10 rounded-full bg-white border border-gray-300 flex items-center justify-center hover:bg-gray-100 transition-colors">
                                <i class="fas fa-plus text-sm"></i>
                            </button>
                        </div>
                        <button onclick="removeFromCart(${item.id})" class="text-red-500 hover:text-red-700 transition-colors">
                            <i class="fas fa-trash text-lg"></i>
                        </button>
                    </div>
                `).join('');
                
                cartItemsDiv.innerHTML = cartItemsHTML;
                cartPageItemsDiv.innerHTML = cartItemsHTML;
                
                // Checkout items (simplified)
                checkoutItemsDiv.innerHTML = cart.map(item => `
                    <div class="flex justify-between items-center py-2">
                        <div>
                            <span class="font-medium">${item.name}</span>
                            <span class="text-gray-500 ml-2">x${item.quantity}</span>
                        </div>
                        <span class="font-semibold">$${(item.price * item.quantity).toFixed(2)}</span>
                    </div>
                `).join('');
            }
            
            // Update totals
            updateCartTotals();
        }
        
        function updateCartTotals() {
            const subtotal = cart.reduce((sum, item) => sum + (item.price * item.quantity), 0);
            const tax = subtotal * 0.1;
            const total = subtotal + tax;
            
            // Update all cart total displays
            document.getElementById('cartSubtotal').textContent = `$${subtotal.toFixed(2)}`;
            document.getElementById('cartTax').textContent = `$${tax.toFixed(2)}`;
            document.getElementById('cartTotal').textContent = `$${total.toFixed(2)}`;
            
            document.getElementById('cartPageSubtotal').textContent = `$${subtotal.toFixed(2)}`;
            document.getElementById('cartPageTax').textContent = `$${tax.toFixed(2)}`;
            document.getElementById('cartPageTotal').textContent = `$${total.toFixed(2)}`;
            
            document.getElementById('checkoutSubtotal').textContent = `$${subtotal.toFixed(2)}`;
            document.getElementById('checkoutTax').textContent = `$${tax.toFixed(2)}`;
            document.getElementById('checkoutTotal').textContent = `$${total.toFixed(2)}`;
        }
        
        // Checkout Functions
        function placeOrder() {
            if (!currentUser) {
                showToast('Please login to place an order');
                showAuthModal();
                return;
            }
            
            if (cart.length === 0) {
                showToast('Your cart is empty');
                return;
            }
            
            const firstName = document.getElementById('deliveryFirstName').value;
            const lastName = document.getElementById('deliveryLastName').value;
            const email = document.getElementById('deliveryEmail').value;
            const phone = document.getElementById('deliveryPhone').value;
            const address = document.getElementById('deliveryAddress').value;
            const orderType = document.querySelector('input[name="orderType"]:checked').value;
            
            if (!firstName || !lastName || !email || !phone || (orderType === 'delivery' && !address)) {
                showToast('Please fill in all required fields');
                return;
            }
            
            const subtotal = cart.reduce((sum, item) => sum + (item.price * item.quantity), 0);
            const tax = subtotal * 0.1;
            const deliveryFee = orderType === 'delivery' ? 2.99 : 0;
            const total = subtotal + tax + deliveryFee;
            
            const order = {
                id: 'ORD-' + Date.now(),
                customerId: currentUser.id,
                customerName: `${firstName} ${lastName}`,
                customerEmail: email,
                customerPhone: phone,
                customerAddress: address,
                orderType: orderType,
                items: [...cart],
                subtotal: subtotal,
                tax: tax,
                deliveryFee: deliveryFee,
                total: total,
                status: 'Preparing',
                date: new Date().toISOString()
            };
            
            orders.unshift(order);
            localStorage.setItem('orders', JSON.stringify(orders));
            
            // Clear cart
            cart = [];
            saveCart();
            updateCartUI();
            
            showToast('Order placed successfully!');
            showPage('orderHistory');
        }
        
        // Order History Functions
        function updateOrderHistory() {
            const orderHistoryList = document.getElementById('orderHistoryList');
            
            if (!currentUser) {
                orderHistoryList.innerHTML = '<p class="text-center text-gray-500 py-8">Please login to view your order history</p>';
                return;
            }
            
            const userOrders = orders.filter(order => order.customerId === currentUser.id);
            
            if (userOrders.length === 0) {
                orderHistoryList.innerHTML = '<p class="text-center text-gray-500 py-8">You have no orders yet</p>';
            } else {
                orderHistoryList.innerHTML = userOrders.map(order => `
                    <div class="bg-white rounded-xl shadow-sm p-6 hover:shadow-md transition-shadow">
                        <div class="flex justify-between items-start mb-4">
                            <div>
                                <h3 class="font-bold text-lg red-accent">${order.id}</h3>
                                <p class="text-gray-600">${new Date(order.date).toLocaleDateString()} • ${order.orderType}</p>
                            </div>
                            <span class="status-badge status-${order.status.toLowerCase()}">${order.status}</span>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <div>
                                <p class="text-sm text-gray-500">Items</p>
                                <p class="font-semibold">${order.items.length} items</p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500">Total</p>
                                <p class="font-semibold gold-accent">$${order.total.toFixed(2)}</p>
                            </div>
                            <div>
                                <button onclick="viewOrderDetail('${order.id}')" class="text-chinese-red hover:underline font-medium">
                                    View Details
                                </button>
                            </div>
                        </div>
                    </div>
                `).join('');
            }
        }
        
        function viewOrderDetail(orderId) {
            const order = orders.find(o => o.id === orderId);
            if (!order) return;
            
            // In a real app, this would show a detailed view
            alert(`Order ID: ${order.id}\nCustomer: ${order.customerName}\nItems: ${order.items.length}\nTotal: $${order.total.toFixed(2)}\nStatus: ${order.status}`);
        }
        
        // Search Functions
        function performSearch() {
            const searchInput = document.activeElement.id;
            if (searchInput === 'desktopSearchInput' || searchInput === 'menuSearchInput') {
                searchQuery = document.getElementById(searchInput).value;
            } else {
                searchQuery = document.getElementById('searchInput').value;
            }
            
            if (currentPage === 'landing' || currentPage === 'menu') {
                loadMenu();
                if (currentPage === 'menu') {
                    loadFullMenu();
                }
            }
        }
        
        // Category Filter
        function filterByCategory(category) {
            currentCategory = category;
            
            // Update button states
            document.querySelectorAll('.category-filter').forEach(btn => {
                btn.classList.remove('btn-primary', 'text-white');
                btn.classList.add('bg-gray-200', 'text-gray-700');
            });
            event.target.classList.remove('bg-gray-200', 'text-gray-700');
            event.target.classList.add('btn-primary', 'text-white');
            
            // Reload menu
            if (currentPage === 'landing') {
                loadMenu();
            } else if (currentPage === 'menu') {
                loadFullMenu();
            }
        }
        
        // Sort Menu
        function sortMenu(sortBy) {
            let sortedMenu = [...menuData];
            
            switch(sortBy) {
                case 'price-low':
                    sortedMenu.sort((a, b) => a.price - b.price);
                    break;
                case 'price-high':
                    sortedMenu.sort((a, b) => b.price - a.price);
                    break;
                case 'name':
                    sortedMenu.sort((a, b) => a.name.localeCompare(b.name));
                    break;
                default:
                    // Popular - keep original order
                    break;
            }
            
            menuData = sortedMenu;
            loadMenu();
        }
        
        // Admin Functions
        function showAdminPage(page) {
            if (page === 'dashboard') {
                showPage('adminDashboard');
            } else if (page === 'menu') {
                showPage('adminMenu');
            } else if (page === 'orders') {
                showPage('adminOrders');
            }
        }
        
        function toggleAdminSidebar() {
            const sidebar = document.querySelector('.desktop-sidebar');
            const content = document.querySelector('.main-content');
            
            sidebar.classList.toggle('mobile-active');
        }
        
        function updateAdminDashboard() {
            // Update counts
            document.getElementById('totalOrdersCount').textContent = orders.length;
            document.getElementById('activeOrdersCount').textContent = orders.filter(o => o.status === 'Preparing' || o.status === 'Ready').length;
            document.getElementById('menuItemsCount').textContent = menuData.length;
            
            // Calculate revenue
            const totalRevenue = orders.reduce((sum, order) => sum + order.total, 0);
            document.getElementById('totalRevenue').textContent = `$${totalRevenue.toFixed(2)}`;
            
            // Update recent orders table
            const recentOrdersTable = document.getElementById('recentOrdersTable');
            const recentOrders = orders.slice(0, 5);
            
            if (recentOrders.length === 0) {
                recentOrdersTable.innerHTML = '<tr><td colspan="6" class="text-center py-8 text-gray-500">No orders yet</td></tr>';
            } else {
                recentOrdersTable.innerHTML = recentOrders.map(order => `
                    <tr class="table-row border-b">
                        <td class="py-3 px-4 font-medium">${order.id}</td>
                        <td class="py-3 px-4">${order.customerName}</td>
                        <td class="py-3 px-4">${order.items.length}</td>
                        <td class="py-3 px-4 font-semibold">$${order.total.toFixed(2)}</td>
                        <td class="py-3 px-4">
                            <span class="status-badge status-${order.status.toLowerCase()}">${order.status}</span>
                        </td>
                        <td class="py-3 px-4">${new Date(order.date).toLocaleDateString()}</td>
                    </tr>
                `).join('');
            }
        }
        
        function updateAdminMenu() {
            const adminMenuList = document.getElementById('adminMenuList');
            
            adminMenuList.innerHTML = menuData.map(item => `
                <div class="bg-white rounded-xl shadow-sm overflow-hidden hover:shadow-lg transition-shadow">
                    <div class="h-48 overflow-hidden relative">
                        <img src="https://picsum.photos/seed/${item.image}/400/300.jpg" alt="${item.name}" class="w-full h-full object-cover">
                        <div class="absolute top-3 right-3">
                            <span class="status-badge status-${item.available ? 'available' : 'unavailable'}">
                                ${item.available ? 'Available' : 'Unavailable'}
                            </span>
                        </div>
                    </div>
                    <div class="p-5">
                        <h3 class="font-bold text-lg mb-2">${item.name}</h3>
                        <p class="text-gray-600 text-sm mb-3">${item.description}</p>
                        <div class="flex justify-between items-center mb-4">
                            <span class="text-xl font-bold gold-accent">$${item.price}</span>
                            <span class="text-sm text-gray-500"><i class="fas fa-clock mr-1"></i>${item.prepTime}</span>
                        </div>
                        <div class="flex space-x-2">
                            <button onclick="toggleMenuStatus(${item.id})" class="flex-1 btn-gold py-2 rounded-lg text-sm font-semibold hover:shadow-md transition-all">
                                <i class="fas fa-power-off mr-1"></i>Toggle
                            </button>
                            <button onclick="editMenu(${item.id})" class="flex-1 border border-chinese-red text-chinese-red py-2 rounded-lg text-sm font-semibold hover:bg-chinese-red hover:text-white transition-all">
                                <i class="fas fa-edit mr-1"></i>Edit
                            </button>
                            <button onclick="deleteMenu(${item.id})" class="bg-red-500 text-white px-3 py-2 rounded-lg text-sm font-semibold hover:bg-red-600 transition-all">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    </div>
                </div>
            `).join('');
        }
        
        function updateAdminOrders() {
            const adminOrdersTable = document.getElementById('adminOrdersTable');
            
            if (orders.length === 0) {
                adminOrdersTable.innerHTML = '<tr><td colspan="8" class="text-center py-8 text-gray-500">No orders yet</td></tr>';
            } else {
                adminOrdersTable.innerHTML = orders.map(order => `
                    <tr class="table-row border-b hover:bg-gray-50">
                        <td class="py-4 px-6 font-medium">${order.id}</td>
                        <td class="py-4 px-6">
                            <div>
                                <p class="font-medium">${order.customerName}</p>
                                <p class="text-sm text-gray-500">${order.customerEmail}</p>
                            </div>
                        </td>
                        <td class="py-4 px-6">${order.items.length} items</td>
                        <td class="py-4 px-6 font-semibold">$${order.total.toFixed(2)}</td>
                        <td class="py-4 px-6">
                            <span class="px-2 py-1 text-xs rounded-full ${
                                order.orderType === 'delivery' ? 'bg-blue-100 text-blue-800' : 'bg-green-100 text-green-800'
                            }">${order.orderType}</span>
                        </td>
                        <td class="py-4 px-6">
                            <select class="status-badge border-0 cursor-pointer" onchange="updateOrderStatus('${order.id}', this.value)">
                                <option value="Preparing" ${order.status === 'Preparing' ? 'selected' : ''}>Preparing</option>
                                <option value="Ready" ${order.status === 'Ready' ? 'selected' : ''}>Ready</option>
                                <option value="Completed" ${order.status === 'Completed' ? 'selected' : ''}>Completed</option>
                            </select>
                        </td>
                        <td class="py-4 px-6">${new Date(order.date).toLocaleDateString()}</td>
                        <td class="py-4 px-6">
                            <button onclick="viewOrderDetail('${order.id}')" class="text-chinese-red hover:underline font-medium">
                                <i class="fas fa-eye mr-1"></i>View
                            </button>
                        </td>
                    </tr>
                `).join('');
            }
        }
        
        function showAddMenuModal() {
            document.getElementById('addMenuModal').classList.add('active');
        }
        
        function closeAddMenuModal() {
            document.getElementById('addMenuModal').classList.remove('active');
            // Clear form
            document.getElementById('menuName').value = '';
            document.getElementById('menuDescription').value = '';
            document.getElementById('menuPrice').value = '';
            document.getElementById('menuCategory').value = 'noodles';
            document.getElementById('prepTime').value = '';
            document.getElementById('menuImage').value = '';
            document.getElementById('menuAvailable').checked = true;
        }
        
        function addMenu() {
            const name = document.getElementById('menuName').value;
            const description = document.getElementById('menuDescription').value;
            const price = parseFloat(document.getElementById('menuPrice').value);
            const category = document.getElementById('menuCategory').value;
            const prepTime = document.getElementById('prepTime').value;
            const available = document.getElementById('menuAvailable').checked;
            
            if (!name || !description || isNaN(price) || price <= 0) {
                showToast('Please fill in all required fields with valid values');
                return;
            }
            
            const newMenu = {
                id: menuData.length + 1,
                name,
                description,
                price,
                category,
                prepTime: prepTime || '15-20 mins',
                image: name.toLowerCase().replace(/\s+/g, ''),
                available
            };
            
            menuData.push(newMenu);
            localStorage.setItem('menuData', JSON.stringify(menuData));
            
            closeAddMenuModal();
            updateAdminMenu();
            loadMenu();
            showToast('Menu item added successfully!');
        }
        
        function toggleMenuStatus(itemId) {
            const item = menuData.find(m => m.id === itemId);
            if (item) {
                item.available = !item.available;
                localStorage.setItem('menuData', JSON.stringify(menuData));
                updateAdminMenu();
                loadMenu();
                showToast(`Menu item is now ${item.available ? 'available' : 'unavailable'}`);
            }
        }
        
        function editMenu(itemId) {
            // In a real app, this would open an edit modal
            showToast('Edit functionality coming soon!');
        }
        
        function deleteMenu(itemId) {
            if (confirm('Are you sure you want to delete this menu item?')) {
                menuData = menuData.filter(m => m.id !== itemId);
                localStorage.setItem('menuData', JSON.stringify(menuData));
                updateAdminMenu();
                loadMenu();
                showToast('Menu item deleted successfully!');
            }
        }
        
        function updateOrderStatus(orderId, newStatus) {
            const order = orders.find(o => o.id === orderId);
            if (order) {
                order.status = newStatus;
                localStorage.setItem('orders', JSON.stringify(orders));
                updateAdminOrders();
                showToast(`Order status updated to ${newStatus}`);
            }
        }
        
        // Toast notification
        function showToast(message) {
            const toast = document.createElement('div');
            toast.className = 'toast';
            toast.innerHTML = `
                <div class="flex items-center">
                    <i class="fas fa-check-circle text-green-400 mr-3"></i>
                    <span>${message}</span>
                </div>
            `;
            document.body.appendChild(toast);
            
            setTimeout(() => {
                toast.style.animation = 'slideInRight 0.3s ease reverse';
                setTimeout(() => toast.remove(), 300);
            }, 3000);
        }
        
        // Close modals on outside click
        window.onclick = function(event) {
            if (event.target.classList.contains('modal')) {
                event.target.classList.remove('active');
            }
        }
    </script>
</body>
</html><?php /**PATH D:\laragon\www\12PPLG\china-app\resources\views/resto_app.blade.php ENDPATH**/ ?>