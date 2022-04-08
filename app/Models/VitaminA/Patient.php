<?php

namespace App\Models\VitaminA;

use App\Models\Ethnic;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    /* Lấy thông tin dân tộc từ mã dân tộc */
    public function getEthnicById($idEthnic){
        $ethnicById = Ethnic::find($idEthnic);
        return $ethnicById;
    }
}
