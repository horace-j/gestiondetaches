<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Employer;
use App\Models\Projet;
use App\Models\Tache;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function homes()
    {
        $usersCount = User::count();
        $employersCount = Employer::count();
        $projetsCount = Projet::count();
        $tachesCount = Tache::count();

        // Exemple de récupération des tâches par projet
        $tachesParProjet = Projet::withCount('taches')->get();

        return view('home', compact('usersCount', 'employersCount', 'projetsCount', 'tachesCount', 'tachesParProjet'));
    }
}
