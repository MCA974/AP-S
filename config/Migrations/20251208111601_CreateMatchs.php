<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class CreateMatchs extends AbstractMigration
{
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
        
        $table->addColumn('created', 'datetime', [
            'default' => null,
            'null' => true,
        ]);
        
        $table->addColumn('modified', 'datetime', [
            'default' => null,
            'null' => true,
        ]);
        
        $table->create();
        
        // Clés étrangères
        $table->addForeignKey(
            'num_equipe_domicile',
            'equipes',
            'id',
            [
                'delete' => 'CASCADE',
                'update' => 'CASCADE',
                'constraint' => 'matchs_num_equipe_domicile_fkey'
            ]
        );
        
        $table->addForeignKey(
            'num_equipe_exterieur',
            'equipes',
            'id',
            [
                'delete' => 'CASCADE',
                'update' => 'CASCADE',
                'constraint' => 'matchs_num_equipe_exterieur_fkey'
            ]
        );
        
        $table->update();
    }
}