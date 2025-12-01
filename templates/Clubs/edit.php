<h1>Modifier le club "<?= h($leClub->nom_club) ?>" (id = <?= h($leClub->id) ?>)</h1>
<?php
    echo $this->Form->create($leClub);
    echo $this->Form->control('nom_club', ['label' => 'Nom du club']);
    echo $this->Form->button(__('Mettre à jour le club'));
    echo $this->Form->end();
?>
<br/>

<?= $this->Html->link(__('Retour aux clubs'), ['action' => 'index'], ['class' => 'button']); ?>
