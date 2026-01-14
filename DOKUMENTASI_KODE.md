# Dokumentasi Kode Aplikasi China Street Food

## 📋 Daftar Isi
1. [Model Database](#model-database)
2. [Komponen Livewire](#komponen-livewire)
3. [Middleware](#middleware)
4. [Routes](#routes)
5. [Views (Blade Templates)](#views-blade-templates)
6. [Migration Database](#migration-database)
7. [Seeder](#seeder)

## 🗄️ Model Database

### User Model (`app/Models/User.php`)
```php
class User extends Authenticatable
{
    protected $fillable = [
        'name',      // nama lengkap user
        'email',     // email untuk login
        'password',  // password terenkripsi
        'role',      // role: 'user' atau 'admin'
    ];

    // Method untuk mendapatkan inisial nama (contoh: "John Doe" -> "JD")
    public function initials(): string

    // Relasi: User memiliki banyak Order
    public function orders()
}
```

**Penggunaan:**
- Mengelola data user dengan autentikasi Laravel Fortify
- Role-based access control (user/admin)
- Relasi dengan tabel orders

### Menu Model (`app/Models/Menu.php`)
```php
class Menu extends Model
{
    protected $fillable = [
        'name',        // nama menu
        'description', // deskripsi menu
        'category',    // kategori: noodles, dumplings, rice, drinks, desserts
        'price',       // harga dalam Rupiah
        'image',       // path gambar menu
        'is_available' // status ketersediaan (boolean)
    ];

    // Relasi: Menu memiliki banyak OrderItem
    public function orderItems()
}
```

**Penggunaan:**
- Menyimpan data menu makanan/minuman
- Filter berdasarkan kategori
- Relasi dengan order items

### Order Model (`app/Models/Order.php`)
```php
class Order extends Model
{
    protected $fillable = [
        'user_id',           // ID user pemesan
        'order_number',      // nomor pesanan unik
        'status',           // status: pending, confirmed, preparing, delivered, cancelled
        'order_type',       // tipe: dine-in, takeaway, delivery
        'delivery_address', // alamat pengiriman (opsional)
        'customer_name',    // nama pelanggan
        'customer_email',   // email pelanggan
        'customer_phone',   // nomor telepon
        'special_instructions', // instruksi khusus
        'subtotal',         // subtotal harga
        'tax',             // pajak (10%)
        'delivery_fee',    // biaya pengiriman
        'total'            // total akhir
    ];

    // Relasi dengan User dan OrderItems
    public function user()
    public function items()
}
```

**Penggunaan:**
- Menyimpan data pesanan lengkap
- Tracking status pesanan
- Kalkulasi otomatis total dengan pajak

### OrderItem Model (`app/Models/OrderItem.php`)
```php
class OrderItem extends Model
{
    protected $fillable = [
        'order_id',   // ID pesanan
        'menu_id',    // ID menu yang dipesan
        'menu_name',  // snapshot nama menu
        'price',      // harga per item
        'quantity'    // jumlah yang dipesan
    ];

    // Relasi dengan Order dan Menu
    public function order()
    public function menu()
}
```

**Penggunaan:**
- Detail item dalam setiap pesanan
- Snapshot data untuk history yang akurat

## ⚡ Komponen Livewire

### HomePage (`app/Livewire/Pages/HomePage.php`)
```php
class HomePage extends Component
{
    protected $layout = 'app'; // menggunakan layout utama

    public function render()
    {
        return view('livewire.pages.home-page');
    }
}
```

**Penggunaan:**
- Halaman landing page utama
- Menampilkan hero section, features, dan menu preview

### MenuPage (`app/Livewire/Pages/MenuPage.php`)
```php
class MenuPage extends Component
{
    protected $layout = 'app';

    // Property untuk filter (tersimpan di URL)
    #[Url] public $category = 'all';
    #[Url] public $search = '';
    #[Url] public $sort = 'popular';

    public function render()
    {
        // Query menu dengan filter
        $items = Menu::when($this->category !== 'all', fn($q) => $q->where('category', $this->category))
            ->when($this->search, fn($q) => $q->where('name', 'like', "%{$this->search}%"))
            ->get();

        return view('livewire.pages.menu-page', ['menuItems' => $items]);
    }
}
```

**Penggunaan:**
- Halaman browsing menu dengan filter kategori
- Pencarian real-time dengan debounce
- Sorting berdasarkan popularitas/harga/nama

### CartComponent (`app/Livewire/CartComponent.php`)
```php
class CartComponent extends Component
{
    public $cart = []; // array menyimpan item keranjang

    public function mount()
    {
        // Ambil data dari session
        $this->cart = session()->get('cart', []);
    }

    // Method CRUD keranjang
    public function addToCart($item)
    public function removeItem($id)
    public function updateQuantity($id, $qty)

    // Computed property untuk kalkulasi
    public function getSubtotalProperty()
    public function getTaxProperty()
    public function getTotalProperty()
}
```

**Penggunaan:**
- Mengelola state keranjang belanja
- Persistent storage menggunakan Laravel session
- Real-time update UI dengan Livewire events

## 🛡️ Middleware

### AdminMiddleware (`app/Http/Middleware/AdminMiddleware.php`)
```php
class AdminMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        // Cek autentikasi dan role admin
        if (!auth()->check() || auth()->user()->role !== 'admin') {
            abort(403, 'Unauthorized'); // Error 403 Forbidden
        }

        return $next($request);
    }
}
```

**Penggunaan:**
- Proteksi route admin dari akses user biasa
- Role-based authorization
- Terdaftar di `bootstrap/app.php`

## 🛣️ Routes

### Web Routes (`routes/web.php`)
```php
// Route Public - dapat diakses semua orang
Route::get('/', HomePage::class)->name('home');
Route::get('/menu', MenuPage::class)->name('menu');
Route::get('/cart', CartPage::class)->name('cart');
Route::get('/checkout', CheckoutPage::class)->name('checkout');
Route::get('/orders', OrderHistoryPage::class)->name('orders');

// Route Admin - hanya untuk role admin
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', Dashboard::class)->name('admin.dashboard');
    Route::get('/menu', MenuManagement::class)->name('admin.menu');
    Route::get('/orders', OrderManagement::class)->name('admin.orders');
});
```

**Penggunaan:**
- Routing dengan Livewire full-page components
- Grouping route admin dengan middleware protection
- Named routes untuk easy navigation

## 🎨 Views (Blade Templates)

### Layout Utama (`resources/views/components/layouts/app.blade.php`)
```blade
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Tailwind CSS + Font Awesome + Google Fonts -->
    <!-- Custom Tailwind config untuk warna tema -->
</head>
<body>
    <!-- Navbar dengan: Logo, Menu Links, Cart Component, Auth Links -->
    <nav class="bg-white shadow-md sticky top-0 z-50">
        <!-- Navigation bar lengkap dengan login/register -->
    </nav>

    {{ $slot }} {{-- Konten halaman dimuat di sini --}}
    @livewireScripts
</body>
</html>
```

**Penggunaan:**
- Layout utama untuk semua halaman Livewire
- Navbar sticky dengan responsive design
- Link login dan register mengarah ke `resources/views/livewire/auth/`

### Home Page (`resources/views/livewire/pages/home-page.blade.php`)
```blade
<div>
    {{-- Hero Section - Gambar + Call-to-action --}}
    {{-- Features Section - Keunggulan layanan --}}
    {{-- Menu Section - Preview menu menggunakan komponen --}}
    {{-- Cart Component - Keranjang belanja --}}
</div>
```

**Penggunaan:**
- Landing page dengan hero section
- Menampilkan fitur utama aplikasi
- Integrasi komponen menu dan cart

### Menu Page (`resources/views/livewire/pages/menu-page.blade.php`)
```blade
<div>
    {{-- Category Filter - Tombol filter kategori --}}
    {{-- Search & Sort - Input pencarian + dropdown sort --}}
    {{-- Menu Grid - Grid responsive menu items --}}
</div>
```

**Penggunaan:**
- Interface untuk browsing menu
- Filter dan search real-time
- Grid responsive untuk berbagai ukuran layar

### Cart Component (`resources/views/livewire/cart-component.blade.php`)
```blade
<div x-data="{ open: false }" @cart-updated.window="open = true">
    <!-- Icon keranjang dengan badge jumlah -->
    <!-- Sidebar keranjang dengan Alpine.js -->
    <!-- List items + kontrol quantity + total harga -->
</div>
```

**Penggunaan:**
- Sidebar keranjang dengan animasi Alpine.js
- Real-time update via Livewire events
- Kalkulasi otomatis subtotal, tax, total

### Authentication Views

#### Login Page (`resources/views/livewire/auth/login.blade.php`)
```blade
<div class="min-h-screen flex items-center justify-center bg-gray-50">
    <!-- Form login dengan styling konsisten -->
    <form method="POST" action="{{ route('login.store') }}">
        <!-- Input email, password, remember me -->
        <!-- Link ke register dan forgot password -->
    </form>
</div>
```

**Fitur:**
- Form login dengan validasi
- Remember me checkbox
- Link ke forgot password dan register
- Error handling dan session status

#### Register Page (`resources/views/livewire/auth/register.blade.php`)
```blade
<div class="min-h-screen flex items-center justify-center bg-gray-50">
    <!-- Form register dengan styling konsisten -->
    <form method="POST" action="{{ route('register.store') }}">
        <!-- Input name, email, password, confirm password -->
        <!-- Link ke login -->
    </form>
</div>
```

**Fitur:**
- Form registrasi lengkap
- Validasi password confirmation
- Link ke halaman login
- Error handling

## 🗃️ Migration Database

### Users Table Migration
```php
Schema::create('users', function (Blueprint $table) {
    $table->id();
    $table->string('name');
    $table->string('email')->unique();
    $table->timestamp('email_verified_at')->nullable();
    $table->string('password');
    $table->string('role')->default('user'); // Kolom role
    $table->rememberToken();
    $table->timestamps();
});
```

### Menus Table Migration
```php
Schema::create('menus', function (Blueprint $table) {
    $table->id();
    $table->string('name');
    $table->text('description')->nullable();
    $table->string('category');
    $table->decimal('price', 10, 2);
    $table->string('image')->nullable();
    $table->boolean('is_available')->default(true);
    $table->timestamps();
});
```

### Orders & Order Items Migration
```php
// Orders table
Schema::create('orders', function (Blueprint $table) {
    $table->id();
    $table->foreignId('user_id')->constrained()->onDelete('cascade');
    $table->string('order_number')->unique();
    $table->enum('status', ['pending', 'confirmed', 'preparing', 'delivered', 'cancelled']);
    $table->enum('order_type', ['dine-in', 'takeaway', 'delivery']);
    // ... kolom lainnya
});

// Order items table
Schema::create('order_items', function (Blueprint $table) {
    $table->id();
    $table->foreignId('order_id')->constrained()->onDelete('cascade');
    $table->foreignId('menu_id')->constrained();
    $table->string('menu_name'); // snapshot
    $table->decimal('price', 10, 2);
    $table->integer('quantity');
    $table->timestamps();
});
```

## 🌱 Seeder

### MenuSeeder
```php
public function run(): void
{
    $menus = [
        [
            'name' => 'Kung Pao Chicken',
            'description' => 'Spicy chicken with peanuts and vegetables',
            'category' => 'rice',
            'price' => 45000,
            'image' => 'https://example.com/kung-pao.jpg',
            'is_available' => true,
        ],
        // ... menu lainnya
    ];

    foreach ($menus as $menu) {
        Menu::create($menu);
    }
}
```

**Penggunaan:**
- Mengisi data awal menu
- Data testing untuk development

## 🎯 Alur Kerja Aplikasi

### 1. User Registration/Login
- User register/login via Fortify
- Role otomatis 'user' (bisa diubah manual jadi 'admin')

### 2. Browsing Menu
- User melihat menu di HomePage atau MenuPage
- Filter berdasarkan kategori
- Search real-time
- Klik item untuk tambah ke cart

### 3. Keranjang Belanja
- Cart tersimpan di session
- Update quantity real-time
- Kalkulasi otomatis total dengan tax

### 4. Checkout
- Form input data pengiriman
- Pilih tipe order (dine-in/takeaway/delivery)
- Simpan order ke database

### 5. Admin Management
- CRUD menu items
- View dan update status orders
- Dashboard dengan statistik

## 🔧 Teknologi Digunakan

- **Laravel 12**: Framework PHP utama
- **Livewire**: Reactive components tanpa JavaScript
- **Alpine.js**: Lightweight JavaScript untuk interaktivitas
- **Tailwind CSS**: Utility-first CSS framework
- **Fortify**: Authentication package Laravel
- **MySQL**: Database
- **Font Awesome**: Icon library
- **Google Fonts**: Typography (Noto Sans SC + Inter)

## 📱 Responsive Design

- Mobile-first approach
- Breakpoints: sm, md, lg, xl
- Navbar collapse untuk mobile
- Grid system yang adaptif

---

**Catatan**: Semua kode telah dibuat tanpa menggunakan Flux UI components dan diganti dengan HTML native + Tailwind CSS untuk kompatibilitas dan performa yang lebih baik.</content>
<parameter name="filePath">d:\laragon\www\12PPLG\china-app\DOKUMENTASI_KODE.md