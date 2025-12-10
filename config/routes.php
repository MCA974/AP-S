<?php
/**
 * Routes configuration.
 */

use Cake\Routing\Route\DashedRoute;
use Cake\Routing\RouteBuilder;

return function (RouteBuilder $routes): void {
    $routes->setRouteClass(DashedRoute::class);

    $routes->scope('/', function (RouteBuilder $builder): void {
        
        //  PAGE D'ACCUEIL - Route principale
        $builder->connect('/', ['controller' => 'Pages', 'action' => 'display', 'accueil']);
        $builder->connect('/accueil', ['controller' => 'Pages', 'action' => 'display', 'accueil']);
        
        //  ROUTES RESTFUL POUR LES CONTRÔLEURS PRINCIPAUX (optionnel mais recommandé)
        $builder->resources('Championnats');
        $builder->resources('Equipes');
        $builder->resources('Categories');
        $builder->resources('Divisions');
        $builder->resources('TypeChampionnats');
        $builder->resources('Clubs');
        
        // Routes par défaut pour tous les contrôleurs
        $builder->fallbacks();
    });
};
