
<h1>Ajouter un type de championnat</h1>

<?php
    echo $this->Form->create($leTypeChampionnat);
    echo $this->Form->control('nom_type_championnat', [
        'label' => 'Nom du type de championnat',
        'name' => 'nom_type_championnat'
    ]);
    echo $this->Form->button(__('Créer le type'));
    echo $this->Form->end();
?>
<br/>

<?= $this->Html->link(__('Retour à la liste'), ['action' => 'index'], ['class' => 'button']); ?>

