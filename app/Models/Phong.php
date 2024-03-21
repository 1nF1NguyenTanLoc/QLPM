<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phong extends Model
{
    use HasFactory;
    
    protected $table = 'phong_may';

    public function nguoiSuDung()
    {
        return $this->belongsTo(User::class, 'nguoi_dung_id');
    }
}
