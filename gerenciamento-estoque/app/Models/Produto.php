<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    public function fornecedor() {
        return $this->belongsTo(Fornecedor::class);
    }

    public function categoria() {
        return $this->belongsTo(Categoria::class);
    }

    public function movimentacao() {
        return $this->hasMany(Movimentacao::class);
    }
}
