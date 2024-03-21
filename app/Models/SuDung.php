<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuDung extends Model
{
    use HasFactory;
    
    protected $table = 'lich_su_su_dung_phong_may';

    protected $fillable = [
        'id_nguoi_dung',
        'id_phong_may',
        'thoi_gian_bat_dau',
        'thoi_gian_ket_thuc',
        'mo_ta',
    ];

    protected $dates = [
        'thoi_gian_bat_dau',
        'thoi_gian_ket_thuc',
    ];

    public function phongMay()
    {
        return $this->belongsTo(Phong::class, 'id_phong_may');
    }

    public function nguoiDung()
    {
        return $this->belongsTo(User::class, 'id_nguoi_dung');
    }
}
