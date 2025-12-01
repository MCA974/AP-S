
<h1>Ajouter une équipe</h1>
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
    echo $this->Form->button(__('Créer l\'équipe'));
    echo $this->Form->end();
    echo $this->Html->link('Retour à la liste des équipes', ['controller' => 'Equipes', 'action' => 'index'], ['class' => 'button']);
?>