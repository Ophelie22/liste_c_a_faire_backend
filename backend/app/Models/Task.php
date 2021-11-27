<?php
namespace App\Models;

// On importe le "CoreModel" de Lumen
// Ce fichier ne sera jamais éditié, il fait parti du noyau de lumen
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    // https://laravel.com/docs/8.x/eloquent-relationships#one-to-many-inverse
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
