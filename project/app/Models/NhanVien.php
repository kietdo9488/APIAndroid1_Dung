<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NhanVien extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'hinh',
        'ho',
        'ten',
        'soDienThoai',
        'soNgayLam',
        'tienLuongTheoNgay',
        'tienLuongTong',
        'tienLuongDaNhan',
        'trangThai'
    ];
}
