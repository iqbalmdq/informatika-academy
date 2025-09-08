<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Course;
use App\Models\Module;
use App\Models\CourseEnrollment;
use App\Models\Forum;
use App\Models\Mentorship;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create Admin/Kaprodi Users
        $admin = User::create([
            'name' => 'Dr. Ahmad Kaprodi',
            'email' => 'kaprodi@informatika.ac.id',
            'password' => Hash::make('password'),
            'role' => 'kaprodi',
            'email_verified_at' => now(),
        ]);

        $staff = User::create([
            'name' => 'Siti Staf Admin',
            'email' => 'staff@informatika.ac.id',
            'password' => Hash::make('password'),
            'role' => 'staff',
            'email_verified_at' => now(),
        ]);

        // Create Dosen Users
        $dosen1 = User::create([
            'name' => 'Prof. Budi Santoso',
            'email' => 'budi.santoso@informatika.ac.id',
            'password' => Hash::make('password'),
            'role' => 'dosen',
            'email_verified_at' => now(),
        ]);

        $dosen2 = User::create([
            'name' => 'Dr. Sari Wijaya',
            'email' => 'sari.wijaya@informatika.ac.id',
            'password' => Hash::make('password'),
            'role' => 'dosen',
            'email_verified_at' => now(),
        ]);

        $dosen3 = User::create([
            'name' => 'Dr. Andi Pratama',
            'email' => 'andi.pratama@informatika.ac.id',
            'password' => Hash::make('password'),
            'role' => 'dosen',
            'email_verified_at' => now(),
        ]);

        // Create Mahasiswa Users
        $mahasiswa1 = User::create([
            'name' => 'Rizki Mahasiswa',
            'email' => 'rizki@student.ac.id',
            'password' => Hash::make('password'),
            'role' => 'mahasiswa',
            'email_verified_at' => now(),
        ]);

        $mahasiswa2 = User::create([
            'name' => 'Maya Sari',
            'email' => 'maya@student.ac.id',
            'password' => Hash::make('password'),
            'role' => 'mahasiswa',
            'email_verified_at' => now(),
        ]);

        $mahasiswa3 = User::create([
            'name' => 'Doni Pratama',
            'email' => 'doni@student.ac.id',
            'password' => Hash::make('password'),
            'role' => 'mahasiswa',
            'email_verified_at' => now(),
        ]);

        // Create Sample Courses
        $course1 = Course::create([
            'title' => 'Pemrograman Web Lanjut',
            'slug' => 'pemrograman-web-lanjut',
            'description' => 'Kursus komprehensif tentang pengembangan web modern menggunakan Laravel, Vue.js, dan teknologi terkini.',
            'instructor_id' => $dosen1->id,
            'level' => 'intermediate',
            'duration_hours' => 120,
            'price' => 500000.00,
            'is_published' => true,
            'thumbnail' => 'https://images.unsplash.com/photo-1498050108023-c5249f4df085?w=800&h=600&fit=crop&crop=center&auto=format&q=80',
        ]);

        $course2 = Course::create([
            'title' => 'Algoritma dan Struktur Data',
            'slug' => 'algoritma-struktur-data',
            'description' => 'Memahami konsep fundamental algoritma dan struktur data untuk pengembangan software yang efisien.',
            'instructor_id' => $dosen2->id,
            'level' => 'beginner',
            'duration_hours' => 90,
            'price' => 400000.00,
            'is_published' => true,
            'thumbnail' => 'https://images.unsplash.com/photo-1587620962725-abab7fe55159?w=800&h=600&fit=crop&crop=center&auto=format&q=80',
        ]);

        $course3 = Course::create([
            'title' => 'Machine Learning Fundamentals',
            'slug' => 'machine-learning-fundamentals',
            'description' => 'Pengenalan konsep machine learning, deep learning, dan implementasi praktis menggunakan Python.',
            'instructor_id' => $dosen3->id,
            'level' => 'advanced',
            'duration_hours' => 150,
            'price' => 750000.00,
            'is_published' => true,
            'thumbnail' => 'https://images.unsplash.com/photo-1677442136019-21780ecad995?w=800&h=600&fit=crop&crop=center&auto=format&q=80',
        ]);

        $course4 = Course::create([
            'title' => 'Database Design & Management',
            'slug' => 'database-design-management',
            'description' => 'Merancang dan mengelola database relasional dan NoSQL untuk aplikasi enterprise.',
            'instructor_id' => $dosen1->id,
            'level' => 'intermediate',
            'duration_hours' => 100,
            'price' => 450000.00,
            'is_published' => true,
            'thumbnail' => 'https://images.unsplash.com/photo-1558494949-ef010cbdcc31?w=800&h=600&fit=crop&crop=center&auto=format&q=80',
        ]);

        // Create Modules for Courses
        Module::create([
            'course_id' => $course1->id,
            'title' => 'Pengenalan Laravel Framework',
            'content' => 'Memahami konsep dasar Laravel dan MVC pattern',  // Changed from 'description' to 'content'
            'order' => 1,
            // Removed 'duration' => 30, as this column doesn't exist
        ]);

        Module::create([
            'course_id' => $course1->id,
            'title' => 'Eloquent ORM dan Database',
            'content' => 'Menguasai Eloquent ORM untuk manajemen database',  // Changed from 'description' to 'content'
            'order' => 2,
            // Removed 'duration' => 25,
        ]);

        Module::create([
            'course_id' => $course1->id,
            'title' => 'API Development dengan Laravel',
            'content' => 'Membangun RESTful API menggunakan Laravel',  // Changed from 'description' to 'content'
            'order' => 3,
            // Removed 'duration' => 35,
        ]);

        Module::create([
            'course_id' => $course2->id,
            'title' => 'Konsep Dasar Algoritma',
            'content' => 'Memahami kompleksitas waktu dan ruang',  // Changed from 'description' to 'content'
            'order' => 1,
            // Removed 'duration' => 20,
        ]);

        Module::create([
            'course_id' => $course2->id,
            'title' => 'Array dan Linked List',
            'content' => 'Implementasi struktur data linear',  // Changed from 'description' to 'content'
            'order' => 2,
            // Removed 'duration' => 25,
        ]);

        // Create Course Enrollments
        CourseEnrollment::create([
            'user_id' => $mahasiswa1->id,
            'course_id' => $course1->id,
            'enrolled_at' => now()->subDays(10),
            'progress' => 75,
        ]);

        CourseEnrollment::create([
            'user_id' => $mahasiswa1->id,
            'course_id' => $course2->id,
            'enrolled_at' => now()->subDays(5),
            'progress' => 30,
        ]);

        CourseEnrollment::create([
            'user_id' => $mahasiswa2->id,
            'course_id' => $course1->id,
            'enrolled_at' => now()->subDays(7),
            'progress' => 100,
            'completed_at' => now()->subDays(1),
        ]);

        CourseEnrollment::create([
            'user_id' => $mahasiswa2->id,
            'course_id' => $course3->id,
            'enrolled_at' => now()->subDays(3),
            'progress' => 15,
        ]);

        CourseEnrollment::create([
            'user_id' => $mahasiswa3->id,
            'course_id' => $course2->id,
            'enrolled_at' => now()->subDays(8),
            'progress' => 60,
        ]);

        // Create Forum Posts
        Forum::create([
            'title' => 'Diskusi Umum: Tips Belajar Programming',
            'content' => 'Halo semua! Mari kita diskusikan tips-tips efektif untuk belajar programming. Apa saja metode yang kalian gunakan?',
            'user_id' => $mahasiswa1->id,
            'course_id' => null,
            'category' => 'general',
            'is_pinned' => true,
            'is_closed' => false,
        ]);

        Forum::create([
            'title' => 'Pertanyaan tentang Laravel Eloquent ORM',
            'content' => 'Saya mengalami kesulitan dalam memahami relationship di Eloquent. Bisakah seseorang menjelaskan perbedaan antara hasMany dan belongsTo?',
            'user_id' => $mahasiswa2->id,
            'course_id' => $course1->id,
            'category' => 'course',
            'is_pinned' => false,
            'is_closed' => false,
        ]);

        Forum::create([
            'title' => 'Proyek Akhir: Sistem Manajemen Perpustakaan',
            'content' => 'Saya sedang mengerjakan proyek sistem manajemen perpustakaan menggunakan Laravel. Ada yang punya saran untuk fitur-fitur yang harus diimplementasikan?',
            'user_id' => $mahasiswa3->id,
            'course_id' => $course1->id,
            'category' => 'project',
            'is_pinned' => false,
            'is_closed' => false,
        ]);

        Forum::create([
            'title' => 'Algoritma Sorting: Bubble Sort vs Quick Sort',
            'content' => 'Mari kita bahas perbandingan efisiensi antara Bubble Sort dan Quick Sort. Kapan sebaiknya menggunakan masing-masing algoritma?',
            'user_id' => $dosen2->id,
            'course_id' => $course2->id,
            'category' => 'course',
            'is_pinned' => true,
            'is_closed' => false,
        ]);

        Forum::create([
            'title' => 'Pengalaman Mentorship Program',
            'content' => 'Bagi yang sudah mengikuti mentorship program, bagaimana pengalamannya? Apa saja yang dipelajari dan bagaimana dampaknya terhadap skill programming kalian?',
            'user_id' => $mahasiswa1->id,
            'course_id' => null,
            'category' => 'mentorship',
            'is_pinned' => false,
            'is_closed' => false,
        ]);

        Forum::create([
            'title' => '[CLOSED] Diskusi Machine Learning Dataset',
            'content' => 'Thread ini sudah ditutup karena sudah mendapat jawaban yang lengkap. Terima kasih untuk semua yang berpartisipasi.',
            'user_id' => $dosen3->id,
            'course_id' => $course3->id,
            'category' => 'course',
            'is_pinned' => false,
            'is_closed' => true,
        ]);

        // Create Mentorship Sessions
        Mentorship::create([
            'mentor_id' => $dosen1->id,
            'mentee_id' => $mahasiswa1->id,
            'type' => 'coaching_clinic',
            'title' => 'Code Review: Laravel Best Practices',
            'description' => 'Sesi review kode untuk project Laravel dengan fokus pada best practices, clean code, dan optimasi performa.',
            'scheduled_at' => now()->addDays(3)->setTime(14, 0),
            'status' => 'approved',
            'notes' => 'Mahasiswa diminta untuk menyiapkan kode project yang akan direview.',
            'github_repo' => 'https://github.com/rizki/laravel-project',
        ]);

        Mentorship::create([
            'mentor_id' => $dosen2->id,
            'mentee_id' => $mahasiswa2->id,
            'type' => 'mentorship_program',
            'title' => 'Program Mentorship: Algoritma dan Struktur Data',
            'description' => 'Program mentorship jangka panjang untuk mendalami algoritma dan struktur data dengan implementasi praktis.',
            'scheduled_at' => now()->addDays(1)->setTime(10, 0),
            'status' => 'pending',
            'notes' => null,
            'github_repo' => null,
        ]);

        Mentorship::create([
            'mentor_id' => $dosen3->id,
            'mentee_id' => $mahasiswa3->id,
            'type' => 'coaching_clinic',
            'title' => 'Machine Learning Project Guidance',
            'description' => 'Bimbingan untuk project machine learning menggunakan Python dan TensorFlow.',
            'scheduled_at' => now()->subDays(2)->setTime(16, 0),
            'status' => 'completed',
            'notes' => 'Sesi berjalan dengan baik. Mahasiswa berhasil memahami konsep neural network dan implementasinya.',
            'github_repo' => 'https://github.com/doni/ml-project',
        ]);

        Mentorship::create([
            'mentor_id' => $dosen1->id,
            'mentee_id' => $mahasiswa2->id,
            'type' => 'mentorship_program',
            'title' => 'Full-Stack Web Development Mentorship',
            'description' => 'Program mentorship komprehensif untuk menjadi full-stack web developer dengan fokus pada Laravel dan Vue.js.',
            'scheduled_at' => now()->addDays(7)->setTime(13, 0),
            'status' => 'approved',
            'notes' => 'Mahasiswa sudah memiliki dasar programming yang baik, siap untuk advanced topics.',
            'github_repo' => 'https://github.com/maya/fullstack-journey',
        ]);

        Mentorship::create([
            'mentor_id' => $dosen2->id,
            'mentee_id' => $mahasiswa1->id,
            'type' => 'coaching_clinic',
            'title' => 'Database Design Workshop',
            'description' => 'Workshop intensif tentang database design, normalisasi, dan optimasi query.',
            'scheduled_at' => now()->addDays(5)->setTime(15, 30),
            'status' => 'cancelled',
            'notes' => 'Dibatalkan karena bentrok dengan jadwal ujian mahasiswa.',
            'github_repo' => null,
        ]);

        $this->command->info('✅ Database seeded successfully!');
        $this->command->info('👤 Admin Users Created:');
        $this->command->info('   - Kaprodi: kaprodi@informatika.ac.id (password: password)');
        $this->command->info('   - Staff: staff@informatika.ac.id (password: password)');
        $this->command->info('👨‍🏫 Dosen Users Created:');
        $this->command->info('   - budi.santoso@informatika.ac.id (password: password)');
        $this->command->info('   - sari.wijaya@informatika.ac.id (password: password)');
        $this->command->info('   - andi.pratama@informatika.ac.id (password: password)');
        $this->command->info('👨‍🎓 Mahasiswa Users Created:');
        $this->command->info('   - rizki@student.ac.id (password: password)');
        $this->command->info('   - maya@student.ac.id (password: password)');
        $this->command->info('   - doni@student.ac.id (password: password)');
        $this->command->info('📚 4 Sample Courses Created with Modules and Enrollments');
        $this->command->info('💬 6 Forum Posts Created with Various Categories');
        $this->command->info('🤝 5 Mentorship Sessions Created with Different Status');
    }
}
