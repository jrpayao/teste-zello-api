<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aplicativo extends Model
{
    use HasFactory;
    protected $table = 'tb_aplicativo';
    protected $primaryKey = 'id';
    protected $fillable = ['name','bundleId','pessoa_id'];
}
