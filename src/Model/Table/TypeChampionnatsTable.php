<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class TypeChampionnatsTable extends Table
{
    public function initialize(array $config): void 
    {
        $this->addBehavior('Timestamp');
        
        $this->setTable('type_championnats');
        $this->setPrimaryKey('num_type_championnat');  
        $this->setDisplayField('nom_championnat');
    }

    public function validationDefault(Validator $validator): Validator 
    {
        $validator
            ->allowEmptyString('num_type_championnat', null, 'create')  // Permettre id vide à la création
            ->notEmptyString('nom_championnat', 'Veuillez renseigner un nom');

        return $validator;
    }
}
