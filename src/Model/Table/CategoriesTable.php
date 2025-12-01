<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Categories Model
 *
 * @property \App\Model\Table\ChampionnatsTable&\Cake\ORM\Association\HasMany $Championnats
 */
class CategoriesTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('categories');
        $this->setDisplayField('nom_categorie');
        
        // CORRECTION : La clé primaire est 'id', pas 'num_categorie'
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        // Relation : Une catégorie a plusieurs championnats
        $this->hasMany('Championnats', [
            'foreignKey' => 'num_categorie',
            'dependent' => false,
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->scalar('nom_categorie')
            ->maxLength('nom_categorie', 255)
            ->requirePresence('nom_categorie', 'create')
            ->notEmptyString('nom_categorie', 'Le nom de la catégorie est obligatoire');

        $validator
            ->decimal('montant_indemnite')
            ->requirePresence('montant_indemnite', 'create')
            ->notEmptyString('montant_indemnite', 'Le montant de l\'indemnité est obligatoire')
            ->greaterThanOrEqual('montant_indemnite', 0, 'Le montant doit être positif');

        return $validator;
    }
}