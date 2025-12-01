<h1>Ajouter un type de championnat</h1>

<?= $this->Form->create($leTypeDeChampionnat) ?>
<?= $this->Form->control('nom_championnat', ['label' => 'Nom du type']) ?>
<?= $this->Form->button(__("Créer le type de championnat")) ?>
<?= $this->Form->end() ?>

<br/>
<?= $this->Html->link('Retour à la liste des types de championnats', ['action' => 'index'], ['class' => 'button']) ?>

<?php
// debug($leTypeDeChampionnat); // décommentez seulement pour débogage
?>

