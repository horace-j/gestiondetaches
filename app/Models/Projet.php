<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Projet extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = ['titre', 'description', 'date_debut', 'date_fin'];

    public function taches()
    {
        return $this->hasMany(Tache::class);
    }
    public function getProgressionAttribute()
    {
        // Compter le nombre total de tâches et le nombre de tâches terminées
        $totalTaches = $this->taches()->count();
        $tachesTerminees = $this->taches()->where('statut', 'terminée')->count();

        // Si le total des tâches est supérieur à 0, calculer la progression
        if ($totalTaches > 0) {
            $progression = ($tachesTerminees / $totalTaches) * 100;
            return round($progression);  // Arrondi à l'entier le plus proche
        }

        return 0;  // Si aucune tâche n'existe, la progression est 0%
    }
}
