<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'verification_token',
        'email_verified_at',
        'phone',
        'skills',
        'designation',
        'city',
        'country',
        'zip_code',
        'about',
        'github', 'linkedin', 'website',
        'profile_image'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password', 'remember_token', 'verification_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'skills' => 'array',
    ];
    public function studentExperiences()
    {
        return $this->hasMany(StudentExperience::class, 'student_id');
    }

    public function studentCertificates()
    {
        return $this->hasMany(StudentCertificate::class, 'user_id');
    }
    public function studentProfile() { return $this->hasOne(Student::class); }
    public function companyProfile() { return $this->hasOne(Company::class); }
    public function centreProfile() { return $this->hasOne(Centre::class); }
    public function company()
    {
        return $this->hasOne(Company::class);
    }
}
