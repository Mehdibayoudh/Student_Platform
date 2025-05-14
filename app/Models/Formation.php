<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formation extends Model
{
    use HasFactory;

    protected $fillable = ['centre_id', 'title', 'description', 'location', 'start_date', 'end_date'];

    public function centre()
    {
        return $this->belongsTo(Centre::class);
    }
}
