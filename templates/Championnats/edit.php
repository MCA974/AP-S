<h1>Modifier le championnat "^<?= h^($leChampionnat-^>nom_championnat^) ?^>" (id = <?= h($leChampionnat->num_championnat) ?>)</h1>
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
    echo $this->Form->button(__('Mettre à jour le championnat'));
    echo $this->Form->end();
?>
<br/>

<?= $this->Html->link(__('Retour aux championnats'), ['action' => 'index'], ['class' => 'button']); ?>
