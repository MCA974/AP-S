<h1>Ajouter un championnat</h1>
<?php
    echo $this->Form->create($leChampionnat);
    echo $this->Form->control('nom_championnat', ['label' => 'Nom du championnat']);
    echo $this->Form->control('num_categorie', [
        'label' => 'Catégorie',
        'options' => $categories,
        'empty' => '-- Sélectionnez une catégorie --'
    ]);
    echo $this->Form->control('num_division', [
        'label' => 'Division',
        'options' => $divisions,
        'empty' => '-- Sélectionnez une division --'
    ]);
    echo $this->Form->control('num_type_championnat', [
        'label' => 'Type de championnat',
        'options' => $typeChampionnats,
        'empty' => '-- Sélectionnez un type --'
    ]);
    echo $this->Form->button(__('Créer le championnat'));
    echo $this->Form->end();
    echo $this->Html->link('Retour à la liste des championnats', ['controller' => 'Championnats', 'action' => 'index'], ['class' => 'button']);
?>
