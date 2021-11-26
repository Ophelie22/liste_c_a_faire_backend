<?php
namespace App\Models;

// On importe le "CoreModel" de Lumen
// Ce fichier ne sera jamais éditié, il fait parti du noyau de lumen
use Illuminate\Database\Eloquent\Model;


// Category est un model qui étend Illuminate\Database\Eloquent\Model
// De ce fait Category bénéficie de toutes les fonctionnalités proposées par la classe parente
class Category extends Model{

    // méthode qui sera appelée lorsque l'on souhaitera répérer la liste des taches associées à une catégory

    // le nom de la méthode doit correspondre au nom de la table dans laquelle sont stockées les taches associées à la categorie
    public function tasks()
    {
        // attention il faut absolument voir défini la class Task dans les Models
        // la méthode hasMany est une fonctionnalité proposée par défaut par Eloquent
        // DOC : https://laravel.com/docs/6.x/eloquent-relationships#one-to-many
        return $this->hasMany(Task::class);
    }
}


 