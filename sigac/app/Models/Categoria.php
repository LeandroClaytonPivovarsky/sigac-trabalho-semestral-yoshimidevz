<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Role;

class Categoria extends Model
{
    use SoftDeletes;

    protected $table = 'categorias';
    protected $fillable = [
        'nome',
        'descricao'
    ];

    protected $dates = ['deleted_at'];

    // Relacionamentos
    public function roles()
    {
        return $this->belongsToMany(Role::class)->withTimestamps();
    }

    public function cursos()
    {
        return $this->hasMany(Curso::class);
    }

    public function documentos()
    {
        return $this->hasMany(Documento::class);
    }
}
