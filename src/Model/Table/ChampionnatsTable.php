<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class ChampionnatsTable extends Table {

    public function initialize(array $config): void {
        parent::initialize($config);

        $this->setTable('championnats');
        $this->setDisplayField('nom_championnat');
        $this->setPrimaryKey('num_championnat');

        $this->addBehavior('Timestamp');

        // Définition des relations
        $this->belongsTo('Categories', [
            'foreignKey' => 'num_categorie',
            'joinType' => 'INNER'
        ]);
        
        $this->belongsTo('Divisions', [
            'foreignKey' => 'num_division',
            'joinType' => 'INNER'
        ]);
        
        $this->belongsTo('TypeChampionnats', [
            'foreignKey' => 'num_type_championnat',
            'joinType' => 'INNER'
        ]);
        
        $this->hasMany('Equipes', [
            'foreignKey' => 'num_championnat'
        ]);
    }

    public function validationDefault(Validator $validator): Validator {
        $validator
            ->notEmptyString('nom_championnat', __('Veuillez renseigner un nom de championnat'))
            ->requirePresence('num_categorie', 'create', __('Veuillez sélectionner une catégorie'))
            ->notEmptyString('num_categorie')
            ->requirePresence('num_division', 'create', __('Veuillez sélectionner une division'))
            ->notEmptyString('num_division')
            ->requirePresence('num_type_championnat', 'create', __('Veuillez sélectionner un type de championnat'))
            ->notEmptyString('num_type_championnat');

        return $validator;
    }
}
