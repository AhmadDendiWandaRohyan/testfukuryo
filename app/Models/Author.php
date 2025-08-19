<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Author extends Model
{
    protected $fillable = ['name', 'dob', 'address'];

    // Hitung umur otomatis
    public function getAgeAttribute()
    {
        return Carbon::parse($this->dob)->age;
    }
}
