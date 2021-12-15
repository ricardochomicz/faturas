<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = ['empresa', 'valor', 'linhas'];

    public function setValorAtributte($value)
    {
        return str_replace(',','.', str_replace('.','', $value));
    }
}
