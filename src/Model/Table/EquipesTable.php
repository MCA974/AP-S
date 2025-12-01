<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class EquipesTable extends Table {

    public function initialize(array $config): void {
        parent::initialize($config);
        
        $this->setTable('equipes');
        $this->setPrimaryKey('id');
        
        $this->addBehavior('Timestamp');
        
        // Définition des relations
        $this->belongsTo('Clubs', [
            'foreignKey' => 'num_club',
            'joinType' => 'INNER'
        ]);
        
        $this->belongsTo('Championnats', [
            'foreignKey' => 'num_championnat',
            'joinType' => 'INNER'
        ]);
    }

    public function validationDefault(Validator $validator): Validator {
        $validator
            ->notEmptyString('num_equipe', __('Veuillez renseigner un numéro d\'équipe'))
            ->requirePresence('num_club', 'create', __('Veuillez sélectionner un club'))
            ->notEmptyString('num_club')
            ->requirePresence('num_championnat', 'create', __('Veuillez sélectionner un championnat'))
            ->notEmptyString('num_championnat');

        return $validator;
    }
}