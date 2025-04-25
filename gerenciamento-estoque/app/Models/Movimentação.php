<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Movimentação extends Model
{
    public function produtos() {
        return $this->belongsTo(Produto::class);
    }
}
