<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
 // j'indique qu'il y a une catégorie associée à chaque tâche
    // dump($task->category)
    public function category()
    {
          // j'indique à Eloquent qu'il y a une relation entre ce modèle et un autre
        // the model Task is linked to "one" category
        return $this->belongsTo(Category::class);
    }
}
