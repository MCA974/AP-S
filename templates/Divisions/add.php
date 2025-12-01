<h1>Ajouter une division</h1>
<?php
    echo $this->Form->create($laDivision);
    echo $this->Form->control('nom_division', ['label' => 'Nom de la division']);
    echo $this->Form->button(__('Créer la division'));
    echo $this->Form->end();
    echo $this->Html->link('Retour à la liste des divisions', ['controller' => 'Divisions', 'action' => 'index'], ['class' => 'button']);
?>
