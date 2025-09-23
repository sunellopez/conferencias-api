<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Conferencia extends Model
{
    protected $fillable = ['nombre', 'fecha', 'ponente', 'descripcion'];

    public function inscritos()
    {
        return $this->belongsToMany(User::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
