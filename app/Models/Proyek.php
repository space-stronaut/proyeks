<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proyek extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class, 'pengembang_proyek', 'id');
    }

    public function details(){
        return $this->hasMany(ProyekDetail::class, 'proyek_id', 'id');
    }
}
