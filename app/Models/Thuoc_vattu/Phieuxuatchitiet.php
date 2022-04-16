<?php

namespace App\Models\Thuoc_vattu;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phieuxuatchitiet extends Model
{
    use HasFactory;
    protected $table = 'phieuxuatchitiet';
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
