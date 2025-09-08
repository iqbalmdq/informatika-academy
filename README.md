<p align="center">
    <img src="https://via.placeholder.com/400x100/4F46E5/FFFFFF?text=Informatika+Academy" width="400" alt="Informatika Academy Logo">
</p>

<p align="center">
    <img src="https://img.shields.io/badge/Laravel-11.x-FF2D20?style=for-the-badge&logo=laravel" alt="Laravel">
    <img src="https://img.shields.io/badge/Filament-3.x-F59E0B?style=for-the-badge&logo=php" alt="Filament">
    <img src="https://img.shields.io/badge/Livewire-3.x-4E56A6?style=for-the-badge&logo=livewire" alt="Livewire">
    <img src="https://img.shields.io/badge/TailwindCSS-3.x-06B6D4?style=for-the-badge&logo=tailwindcss" alt="Tailwind CSS">
</p>

# Informatika Academy

Platform pembelajaran online yang dirancang khusus untuk pendidikan informatika. Sistem manajemen pembelajaran yang komprehensif dengan berbagai fitur interaktif untuk mendukung proses belajar mengajar di bidang teknologi informasi.

## 🚀 Fitur Utama

### 👥 Sistem Multi-Role
- **Dosen**: Panel admin untuk mengelola kursus, mentorship, dan monitoring mahasiswa
- **Mahasiswa**: Dashboard untuk mengakses kursus, forum, dan mentorship

### 📚 Manajemen Kursus
- Sistem kursus dengan modul pembelajaran terstruktur
- Enrollment mahasiswa ke kursus
- Tracking progress belajar real-time
- Berbagai level kesulitan (beginner, intermediate, advanced)
- Statistik dan analytics pembelajaran

### 💬 Forum Diskusi
- Forum umum dan forum per kursus
- Kategori diskusi: general, course, project, mentorship
- Sistem pin dan close thread
- Integrasi penuh dengan sistem kursus

### 🎯 Program Mentorship
- **Coaching Clinic**: Sesi konsultasi singkat untuk masalah spesifik
- **Mentorship Program**: Program mentoring jangka panjang
- Penjadwalan sesi mentoring yang fleksibel
- Integrasi dengan GitHub repository
- Status tracking lengkap (pending, approved, completed)

### 📊 Dashboard & Analytics
- Widget statistik untuk mahasiswa dan dosen
- Tracking progress pembelajaran detail
- Monitoring aktivitas forum
- Laporan mentorship dan performa

## 🛠️ Teknologi yang Digunakan

- **Backend**: Laravel 11
- **Admin Panel**: Filament PHP 3.x
- **Frontend**: Livewire 3.x + Tailwind CSS
- **Database**: MySQL/PostgreSQL
- **Authentication**: Laravel Sanctum
- **Real-time**: Laravel Broadcasting

## 📋 Persyaratan Sistem

- PHP >= 8.2
- Composer
- Node.js >= 18.x
- MySQL >= 8.0 atau PostgreSQL >= 13
- Redis (opsional, untuk caching dan queue)

## ⚡ Instalasi

### 1. Clone Repository
```bash
git clone https://github.com/your-username/informatika-academy.git
cd informatika-academy
```

### 2. Install Dependencies
```bash
# Install PHP dependencies
composer install

# Install Node.js dependencies
npm install
```

### 3. Environment Setup
```bash
# Copy environment file
cp .env.example .env

# Generate application key
php artisan key:generate
```

### 4. Database Configuration
Edit file `.env` dan sesuaikan konfigurasi database:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=informatika_academy
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

### 5. Database Migration & Seeding
```bash
# Run migrations
php artisan migrate

# Seed database with sample data
php artisan db:seed
```

### 6. Build Assets
```bash
# For development
npm run dev

# For production
npm run build
```

### 7. Start Development Server
```bash
php artisan serve
```

## 🔐 Akses Panel

Setelah instalasi selesai, Anda dapat mengakses:

- **Website Utama**: `http://localhost:8000`
- **Panel Dosen**: `http://localhost:8000/dosen`
- **Panel Mahasiswa**: `http://localhost:8000/mahasiswa`

### Default Login Credentials

**Dosen:**
- Email: `dosen@informatika-academy.com`
- Password: `password`

**Mahasiswa:**
- Email: `mahasiswa@informatika-academy.com`
- Password: `password`

## 🗄️ Struktur Database

### Tabel Utama:
- **users**: Sistem multi-role (dosen, mahasiswa)
- **courses**: Kursus pembelajaran dengan metadata lengkap
- **modules**: Konten pembelajaran dalam kursus
- **course_enrollments**: Pendaftaran mahasiswa ke kursus
- **forums**: Sistem forum diskusi
- **mentorships**: Sesi mentoring dan coaching

## 🚀 Deployment

### Production Setup
```bash
# Optimize for production
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Set proper permissions
chmod -R 755 storage bootstrap/cache
```

### Nginx Configuration
Contoh konfigurasi Nginx tersedia di file `nginx.conf`.

### Deploy Script
Gunakan script deployment otomatis:
```bash
./deploy.sh
```

## 🧪 Testing

```bash
# Run all tests
php artisan test

# Run specific test suite
php artisan test --testsuite=Feature
php artisan test --testsuite=Unit
```

## 📝 API Documentation

API documentation akan tersedia di `/api/documentation` setelah instalasi selesai.

## 🤝 Contributing

1. Fork repository ini
2. Buat branch fitur baru (`git checkout -b feature/amazing-feature`)
3. Commit perubahan (`git commit -m 'Add some amazing feature'`)
4. Push ke branch (`git push origin feature/amazing-feature`)
5. Buat Pull Request

## 📄 License

Proyek ini dilisensikan di bawah [MIT License](LICENSE).

## 👨‍💻 Tim Pengembang

- **Lead Developer**: [Nama Anda]
- **Backend Developer**: [Nama Tim]
- **Frontend Developer**: [Nama Tim]
- **UI/UX Designer**: [Nama Tim]

## 📞 Support

Jika Anda mengalami masalah atau memiliki pertanyaan:

- 📧 Email: support@informatika-academy.com
- 🐛 Issues: [GitHub Issues](https://github.com/your-username/informatika-academy/issues)
- 📖 Documentation: [Wiki](https://github.com/your-username/informatika-academy/wiki)

## 🙏 Acknowledgments

- [Laravel](https://laravel.com) - Framework PHP yang luar biasa
- [Filament](https://filamentphp.com) - Admin panel yang powerful
- [Tailwind CSS](https://tailwindcss.com) - Utility-first CSS framework
- [Livewire](https://laravel-livewire.com) - Full-stack framework untuk Laravel

---

<p align="center">
    Made with ❤️ for Indonesian Education
</p>
