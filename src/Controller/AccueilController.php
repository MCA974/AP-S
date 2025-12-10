<?php

declare(strict_types=1);

namespace App\Controller;

class AccueilController extends AppController {

    public function index() {
        // Liste des liens pour les boutons de la page d'accueil
        $links = [
            ['label' => 'Divisions', 'url' => ['controller' => 'Divisions', 'action' => 'index']],
            ['label' => 'Catégories', 'url' => ['controller' => 'Categories', 'action' => 'index']],
            ['label' => 'Types de Championnat', 'url' => ['controller' => 'TypeChampionnats', 'action' => 'index']],
            ['label' => 'Championnats', 'url' => ['controller' => 'Championnats', 'action' => 'index']],
            ['label' => 'Clubs', 'url' => ['controller' => 'Clubs', 'action' => 'index']],
            ['label' => 'Équipes', 'url' => ['controller' => 'Equipes', 'action' => 'index']],
            ['label' => 'Matchs', 'url' => ['controller' => 'Matchs', 'action' => 'index']],
        ];

        $this->set(compact('links'));
    }
}
