<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class CategoriesTable extends Table {

    public function initialize(array $config): void {
        $this->addBehavior('Timestamp');
        $this->belongsTo('Championnats', [
        'dependent' => true,
        ]);
        
    }

    public function validationDefault(Validator $validator): Validator {
        $validator
                ->notEmptyString('nom_categorie', __('Veuillez renseigner un nom'))
                ->numeric('montant_indemnite', __('Veuillez renseigner un nombre'));
                /*->notEmptyString('content', _('Veuillez renseigner une description'))
                ->notEmptyString('user_id', _('Veuillez renseigner un utilisateur')); */

        return $validator;
    }
}