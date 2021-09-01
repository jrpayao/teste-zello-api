<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Pessoa extends Model
{
    use HasFactory;

    protected $table = 'tb_pessoa';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'birth', 'cpf', 'rg', 'email','perfil_id'];
    public $with = ['perfil','aplicativos'];

    public function perfil()
    {
        return $this->belongsTo(Perfil::class);
    }

    public function aplicativos()
    {
        return $this->hasMany(AplicativoPessoa::class, 'pessoa_id');
    }
}
