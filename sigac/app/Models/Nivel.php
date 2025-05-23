<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Role;
use App\Models\Curso;

class Nivel extends Model
{
    use SoftDeletes;

    protected $table = 'niveis';
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
}
