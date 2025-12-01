<h1>Modifier la division "<?= $laCategorie->nom_categorie ?>" (id = <?= $laCategorie->id ?>)</h1>
<?php
    echo $this->Form->create($laCategorie);
    echo $this->Form->control('nom_categorie');
    echo $this->Form->control('montant_indemnite');
    echo $this->Form->button(__("Mettre à jour la catégorie"));
    echo $this->Form->end();
?>
<br/>

<?=
$this->html->link('Retour aux categories',
        ['action' => 'index'],
        ['class' => 'button']);
?>