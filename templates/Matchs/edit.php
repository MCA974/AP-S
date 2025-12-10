<h1>Modifier le match (id = <?= h($leMatch->id) ?>)</h1>

<?php
    echo $this->Form->create($leMatch);
    
    echo $this->Form->control('num_equipe_domicile', [
        'label' => 'Équipe à domicile',
        'options' => $lesEquipes,
        'empty' => '-- Sélectionnez une équipe --'
    ]);
    
    echo $this->Form->control('num_equipe_exterieur', [
        'label' => 'Équipe à l\'extérieur',
        'options' => $lesEquipes,
        'empty' => '-- Sélectionnez une équipe --'
    ]);
    
    
    
    echo $this->Form->button(__('Mettre à jour le match'));
    echo $this->Form->end();
?>

<br/>
<?= $this->Html->link(__('Retour aux matchs'), ['action' => 'index'], ['class' => 'button']); ?>