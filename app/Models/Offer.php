<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;
    protected $fillable = ['company_id', 'title', 'description', 'location', 'start_date', 'end_date'];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
    public function students()
    {
        return $this->belongsToMany(User::class, 'offer_student');
    }

}
