<?php

namespace Database\Seeders;

use App\Models\AcademicYear;
use App\Models\Classroom;
use App\Models\ClassStudent;
use App\Models\Grade;
use App\Models\Schedule;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. DATA MASTER
        echo "Creating Master Data...\n";
        
        // Tahun Ajaran
        $academicYear = AcademicYear::create([
            'name' => '2025/2026',
            'semester' => 'ganjil',
            'is_active' => true,
        ]);

        // Kelas (Rombel)
        $classrooms = [];
        $classNames = ['X RPL 1', 'X RPL 2', 'XI RPL 1', 'XI RPL 2', 'XII RPL 1'];
        foreach ($classNames as $name) {
            $classrooms[] = Classroom::create([
                'name' => $name,
                'slug' => \Illuminate\Support\Str::slug($name),
            ]);
        }

        // Mata Pelajaran
        $subjects = [];
        $subjectList = [
            ['Matematika', 'MTK'],
            ['Bahasa Indonesia', 'BIND'],
            ['Pemrograman Web', 'WEB'],
            ['Basis Data', 'DB'],
            ['Bahasa Inggris', 'ING'],
        ];
        foreach ($subjectList as $sub) {
            $subjects[] = Subject::create([
                'name' => $sub[0],
                'code' => $sub[1],
            ]);
        }

        // 2. USERS
        echo "Creating Users...\n";

        // Admin
        User::create([
            'name' => 'Super Admin',
            'email' => 'admin@eschool.test',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        // Guru (Buat 5 Guru)
        $teachers = User::factory(5)->create([
            'role' => 'teacher',
            'password' => Hash::make('password'),
        ]);

        // Siswa (Buat 50 Siswa)
        $students = User::factory(50)->create([
            'role' => 'student',
            'password' => Hash::make('password'),
        ]);

        // 3. OPERASIONAL (Enrollment & Jadwal)
        echo "Processing Enrollment & Schedules...\n";

        // Masukkan Siswa ke Kelas (Distribusi Merata)
        foreach ($students as $index => $student) {
            // Bagi siswa ke dalam kelas yang ada secara berurutan
            $classroom = $classrooms[$index % count($classrooms)];
            
            ClassStudent::create([
                'academic_year_id' => $academicYear->id,
                'classroom_id' => $classroom->id,
                'student_id' => $student->id,
            ]);
        }

        // Buat Jadwal Pelajaran
        // Setiap kelas akan mendapatkan semua mata pelajaran
        // Gurunya dipilih secara acak dari daftar guru
        $schedules = [];
        $days = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat'];

        foreach ($classrooms as $classroom) {
            foreach ($subjects as $key => $subject) {
                $schedules[] = Schedule::create([
                    'academic_year_id' => $academicYear->id,
                    'classroom_id' => $classroom->id,
                    'subject_id' => $subject->id,
                    'teacher_id' => $teachers->random()->id, // Guru acak
                    'day' => $days[$key % 5], // Sebar hari
                    'start_time' => '08:00:00',
                ]);
            }
        }

        // 4. GRADING (Isi Nilai Dummy)
        echo "Inputting Grades...\n";

        // Untuk setiap jadwal, ambil siswa di kelas tersebut, lalu beri nilai
        foreach ($schedules as $schedule) {
            // Ambil siswa yang ada di kelas jadwal ini
            $enrolledStudentIds = ClassStudent::where('classroom_id', $schedule->classroom_id)
                ->where('academic_year_id', $academicYear->id)
                ->pluck('student_id');

            foreach ($enrolledStudentIds as $studentId) {
                Grade::create([
                    'schedule_id' => $schedule->id,
                    'student_id' => $studentId,
                    'score' => rand(60, 98), // Nilai acak antara 60 - 98
                    'notes' => fake()->randomElement(['Sangat Bagus', 'Tingkatkan lagi', 'Cukup Baik', '-']),
                ]);
            }
        }
        
        echo "Seeding Complete! Login details:\n";
        echo "Admin: admin@eschool.test / password\n";
        echo "Teacher: " . $teachers->first()->email . " / password\n";
        echo "Student: " . $students->first()->email . " / password\n";
    }
}