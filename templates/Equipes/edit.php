<h1>Modifier l'équipe "<?= h($lEquipe->num_equipe) ?>" (id = <?= h($lEquipe->id) ?>)</h1>
<?php
    echo $this->Form->create($lEquipe);
    echo $this->Form->control('num_equipe', ['label' => 'Numéro d\'équipe']);
    echo $this->Form->control('num_club', [
        'label' => 'Club',
        'options' => $clubs,
        'empty' => '-- Sélectionnez un club --'
    ]);
    echo $this->Form->control('num_championnat', [
        'label' => 'Championnat',
        'options' => $championnats,
        'empty' => '-- Sélectionnez un championnat --'
    ]);
    echo $this->Form->button(__('Mettre à jour l\'équipe'));
    echo $this->Form->end();
?>
<br/>

<?= $this->Html->link(__('Retour aux équipes'), ['action' => 'index'], ['class' => 'button']); ?>