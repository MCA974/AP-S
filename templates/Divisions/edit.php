<h1>Modifier la division <?= h($laDivision->nom_division) ?> (id = <?= h($laDivision->num_division) ?>)</h1>
<?php
    echo $this->Form->create($laDivision);
    echo $this->Form->control('nom_division', ['label' => 'Nom de la division']);
    echo $this->Form->button(__('Mettre à jour la division'));
    echo $this->Form->end();
?>
<br/>

<?= $this->Html->link(__('Retour aux divisions'), ['action' => 'index'], ['class' => 'button']); ?>