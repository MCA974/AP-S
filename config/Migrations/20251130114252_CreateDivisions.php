<?php
declare(strict_types=1);

use Migrations\BaseMigration;

class CreateDivisions extends BaseMigration
{
    public function change(): void
    {
        $table = $this->table('divisions', ['id' => false, 'primary_key' => ['num_division']]);
        
        $table->addColumn('num_division', 'integer', [
            'autoIncrement' => true,
            'default' => null,
            'null' => false,
        ]);
        
        $table->addColumn('nom_division', 'string', [
            'default' => null,
            'limit' => 100,
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