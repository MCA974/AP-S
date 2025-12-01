<?php
declare(strict_types=1);

use Migrations\BaseMigration;

class CreateChampionnats extends BaseMigration
{
    public function change(): void
    {
        $table = $this->table('championnats', ['id' => false, 'primary_key' => ['num_championnat']]);
        
        $table->addColumn('num_championnat', 'integer', [
            'autoIncrement' => true,
            'default' => null,
            'null' => false,
        ]);
        
        $table->addColumn('nom_championnat', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
        ]);
        
        $table->addColumn('num_categorie', 'integer', [
            'default' => null,
            'null' => false,
        ]);
        
        $table->addColumn('num_division', 'integer', [
            'default' => null,
            'null' => false,
        ]);
        
        $table->addColumn('num_type_championnat', 'integer', [
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
    }
}
