<?php
// Fichier : src/Model/Table/MatchsTable.php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class MatchsTable extends Table
{
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('matchs');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('EquipesDomicile', [
            'className' => 'Equipes',
            'foreignKey' => 'num_equipe_domicile',
            'joinType' => 'INNER',
        ]);

        $this->belongsTo('EquipesExterieur', [
            'className' => 'Equipes',
            'foreignKey' => 'num_equipe_exterieur',
            'joinType' => 'INNER',
        ]);
    }

    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('num_equipe_domicile')
            ->requirePresence('num_equipe_domicile', 'create')
            ->notEmptyString('num_equipe_domicile', 'L\'équipe à domicile est obligatoire');

        $validator
            ->integer('num_equipe_exterieur')
            ->requirePresence('num_equipe_exterieur', 'create')
            ->notEmptyString('num_equipe_exterieur', 'L\'équipe extérieure est obligatoire');

        $validator
            ->dateTime('date_match')
            ->requirePresence('date_match', 'create')
            ->notEmptyDateTime('date_match', 'La date du match est obligatoire');

        return $validator;
    }

    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn(
            'num_equipe_domicile',
            'EquipesDomicile'
        ), [
            'errorField' => 'num_equipe_domicile',
            'message' => 'L\'équipe à domicile sélectionnée n\'existe pas'
        ]);

        $rules->add($rules->existsIn(
            'num_equipe_exterieur',
            'EquipesExterieur'
        ), [
            'errorField' => 'num_equipe_exterieur',
            'message' => 'L\'équipe extérieure sélectionnée n\'existe pas'
        ]);

        $rules->add(
            function ($entity, $options) {
                if ($entity->num_equipe_domicile === $entity->num_equipe_exterieur) {
                    return false;
                }
                return true;
            },
            'equipesDifferentes',
            [
                'errorField' => 'num_equipe_exterieur',
                'message' => 'Une équipe ne peut pas jouer contre elle-même'
            ]
        );

        return $rules;
    }
}