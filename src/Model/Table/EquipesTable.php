<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Equipes Model
 *
 * @property \App\Model\Table\ClubsTable&\Cake\ORM\Association\BelongsTo $Clubs
 * @property \App\Model\Table\ChampionnatsTable&\Cake\ORM\Association\BelongsTo $Championnats
 */
class EquipesTable extends Table
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

        $this->setTable('equipes');
        $this->setDisplayField('num_equipe');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Clubs', [
            'foreignKey' => 'num_club',
            'joinType' => 'INNER',
        ]);
        
        $this->belongsTo('Championnats', [
            'foreignKey' => 'num_championnat',
            'joinType' => 'INNER',
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
            ->scalar('num_equipe')
            ->maxLength('num_equipe', 100)
            ->requirePresence('num_equipe', 'create')
            ->notEmptyString('num_equipe', 'Le numéro d\'équipe est obligatoire');

        $validator
            ->integer('num_club')
            ->requirePresence('num_club', 'create')
            ->notEmptyString('num_club', 'Le club est obligatoire');

        $validator
            ->integer('num_championnat')
            ->requirePresence('num_championnat', 'create')
            ->notEmptyString('num_championnat', 'Le championnat est obligatoire');

        $validator
            ->scalar('num_groupe')
            ->maxLength('num_groupe', 10)
            ->allowEmptyString('num_groupe');

        return $validator;
    }
}