<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class CreateMatchs extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     * @return void
     */
    public function change(): void
    {
        $table = $this->table('matchs');
        
        $table->addColumn('num_equipe_domicile', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        
        $table->addColumn('num_equipe_exterieur', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        
        $table->addColumn('date_match', 'datetime', [
            'default' => null,
            'null' => false,
        ]);
        
        $table->addColumn('score_domicile', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => true,
        ]);
        
        $table->addColumn('score_exterieur', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => true,
        ]);
        
        $table->addColumn('lieu', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => true,
        ]);
        
        $table->addColumn('created', 'datetime', [
            'default' => null,
            'null' => true,
        ]);
        
        $table->addColumn('modified', 'datetime', [
            'default' => null,
            'null' => true,
        ]);
        
        // Création de la table
        $table->create();
        
        // Ajout des contraintes de clés étrangères APRÈS la création
        // IMPORTANT : On référence 'id' car c'est la PK de la table equipes
        $table->addForeignKey(
            'num_equipe_domicile',
            'equipes',
            'id',  // ← Clé primaire de la table equipes
            [
                'delete' => 'CASCADE',
                'update' => 'CASCADE',
                'constraint' => 'matchs_num_equipe_domicile_fkey'
            ]
        );
        
        $table->addForeignKey(
            'num_equipe_exterieur',
            'equipes',
            'id',  // ← Clé primaire de la table equipes
            [
                'delete' => 'CASCADE',
                'update' => 'CASCADE',
                'constraint' => 'matchs_num_equipe_exterieur_fkey'
            ]
        );
        
        $table->update();
    }
}