<h1>Ajouter un match</h1>

<?php
    echo $this->Form->create($leMatch);
    
    echo $this->Form->control('num_equipe_domicile', [
        'label' => 'Équipe à domicile',
        'options' => $lesEquipes,
        'empty' => '-- Sélectionnez une équipe --',
        'required' => true
    ]);
    
    echo $this->Form->control('num_equipe_exterieur', [
        'label' => 'Équipe à l\'extérieur',
        'options' => $lesEquipes,
        'empty' => '-- Sélectionnez une équipe --',
        'required' => true
    ]);
    
    echo $this->Form->control('date_match', [
        'label' => 'Date et heure du match',
        'type' => 'datetime-local',
        'required' => true
    ]);
    
    echo $this->Form->control('score_domicile', [
        'label' => 'Score équipe domicile (laisser vide si match à venir)',
        'type' => 'number',
        'min' => 0,
        'placeholder' => 'Optionnel'
    ]);
    
    echo $this->Form->control('score_exterieur', [
        'label' => 'Score équipe extérieur (laisser vide si match à venir)',
        'type' => 'number',
        'min' => 0,
        'placeholder' => 'Optionnel'
    ]);
    
    echo $this->Form->control('lieu', [
        'label' => 'Lieu du match',
        'placeholder' => 'Stade, ville, adresse...',
        'maxlength' => 255
    ]);
    
    echo $this->Form->button(__('Créer le match'), ['class' => 'button']);
    echo $this->Form->end();
?>

<br/>
<?= $this->Html->link('← Retour à la liste des matchs', ['action' => 'index'], ['class' => 'button']) ?>