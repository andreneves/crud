<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Categoria;

class Produto extends Model
{
    use HasFactory;

    protected $table = 'produtos';

    public function categoria()
    {
        return $this->hasOne(Categoria::class, 'id', 'categoria_id');
    }

}
