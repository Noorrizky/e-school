<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;

class User extends Authenticatable implements FilamentUser
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;
    
    public function canAccessPanel(Panel $panel): bool
        {
            // 1. Ambil ID panel (admin, teacher, atau student)
            // 2. Cek apakah role user sesuai dengan panel tersebut
            
            if ($panel->getId() === 'admin') {
                return $this->role === 'admin';
            }

            if ($panel->getId() === 'teacher') {
                return $this->role === 'teacher';
            }

            if ($panel->getId() === 'student') {
                return $this->role === 'student';
            }

        return false; // Default tolak
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'nidn',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function studentClassrooms(): HasMany
    {
        // Relasi untuk mengambil data kelas siswa
        return $this->hasMany(ClassStudent::class, 'student_id');
    }

    public function teacherSchedules(): HasMany
    {
        // Relasi untuk mengambil jadwal mengajar guru
        return $this->hasMany(Schedule::class, 'teacher_id');
    }
}
