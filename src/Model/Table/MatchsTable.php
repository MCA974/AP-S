<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Matchs Model
 *
 * @property \App\Model\Table\EquipesTable&\Cake\ORM\Association\BelongsTo $EquipesDomicile
 * @property \App\Model\Table\EquipesTable&\Cake\ORM\Association\BelongsTo $EquipesExterieur
 *
 * @method \App\Model\Entity\Match newEmptyEntity()
 * @method \App\Model\Entity\Match newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Match[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Match get($primaryKey, $options = [])
 * @method \App\Model\Entity\Match findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Match patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Match[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Match|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Match saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Match[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Match[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Match[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Match[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class MatchsTable extends Table
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

        $this->setTable('matchs');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        // Relation avec l'équipe à domicile
        $this->belongsTo('EquipesDomicile', [
            'className' => 'Equipes',
            'foreignKey' => 'num_equipe_domicile',
            'joinType' => 'INNER',
        ]);

        // Relation avec l'équipe extérieure
        $this->belongsTo('EquipesExterieur', [
            'className' => 'Equipes',
            'foreignKey' => 'num_equipe_exterieur',
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

        $validator
            ->integer('score_domicile')
            ->allowEmptyString('score_domicile')
            ->greaterThanOrEqual('score_domicile', 0, 'Le score doit être positif ou nul');

        $validator
            ->integer('score_exterieur')
            ->allowEmptyString('score_exterieur')
            ->greaterThanOrEqual('score_exterieur', 0, 'Le score doit être positif ou nul');

        $validator
            ->scalar('lieu')
            ->maxLength('lieu', 255)
            ->allowEmptyString('lieu');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        // Vérifier que l'équipe domicile existe
        $rules->add($rules->existsIn(
            'num_equipe_domicile',
            'EquipesDomicile'
        ), [
            'errorField' => 'num_equipe_domicile',
            'message' => 'L\'équipe à domicile sélectionnée n\'existe pas'
        ]);

        // Vérifier que l'équipe extérieure existe
        $rules->add($rules->existsIn(
            'num_equipe_exterieur',
            'EquipesExterieur'
        ), [
            'errorField' => 'num_equipe_exterieur',
            'message' => 'L\'équipe extérieure sélectionnée n\'existe pas'
        ]);

        // Règle personnalisée : les deux équipes doivent être différentes
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