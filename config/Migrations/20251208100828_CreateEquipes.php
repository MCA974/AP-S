<?php
declare(strict_types=1);

use Migrations\BaseMigration;

class CreateEquipes extends BaseMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/migrations/4/en/migrations.html#the-change-method
     *
     * @return void
     */
    public function change(): void
    {
        $table = $this->table('equipes');
        
        $table->addColumn('num_equipe', 'string', [
            'default' => null,
            'limit' => 100,
            'null' => false,
        ]);
        
        $table->addColumn('num_club', 'integer', [
            'default' => null,
            'null' => false,
        ]);
        
        $table->addColumn('num_championnat', 'integer', [
            'default' => null,
            'null' => false,
        ]);
        
        $table->addColumn('num_groupe', 'string', [
            'default' => null,
            'limit' => 10,
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
        
        // Ajouter les clés étrangères
        $table->addForeignKey('num_club', 'clubs', 'id', [
            'delete' => 'CASCADE',
            'update' => 'CASCADE'
        ]);
        
        $table->addForeignKey('num_championnat', 'championnats', 'num_championnat', [
            'delete' => 'CASCADE',
            'update' => 'CASCADE'
        ]);
        
        $table->create();
    }
}