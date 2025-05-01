<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentExperience extends Model
{
    use HasFactory;
    protected $fillable = [
        'student_id', 'job_title', 'company_name', 'start_year', 'end_year', 'description'
    ];
}
