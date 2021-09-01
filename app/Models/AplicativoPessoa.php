<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AplicativoPessoa extends Model
{
    use HasFactory;
    protected $table = 'tb_aplicativo_pessoa';
    protected $primaryKey = 'id';
    protected $fillable = ['pessoa_id','aplicativo_id'];
    protected $with = ['aplicativoPessoa'];

    public function aplicativoPessoa()
    {
        return $this->hasMany(Aplicativo::class,'id','aplicativo_id');
    }
}
