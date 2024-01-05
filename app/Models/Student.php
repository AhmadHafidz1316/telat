<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function rombel()
    {
        return $this->belongsTo(rombel::class , 'rombel_id', 'id') ;
    }

    public function rayon()
    {
        return $this->belongsTo(rayon::class , 'rayon_id', 'id') ;
    }

    public function late()
    {
        return $this->hasMany(Late::class);
    }

    public function getTotalLates()
    {
        return $this->late()->count();
    }
}
