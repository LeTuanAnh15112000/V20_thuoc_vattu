<?php

namespace App\Models\Thuoc_vattu;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phieunhapthuocchitiet extends Model
{
    use HasFactory;
    protected $table = 'phieunhapthuocchitiet';
    protected $primarykey = 'id';
    protected $fillable = [
        'tenthuoc' ,
        'soluong' ,
        'hamluong',
        'dangtrinhbay',
        'dangtebao',
        'donvi',
        'dongia',
        'hangsanxuat' ,
        'nuocsanxuat' ,
        'handung' ,
        'manguon'
        ];
}
