
<h1>Ajouter une catégorie</h1>

<?= $this->Form->create($categorieEntity) ?>
<?= $this->Form->control('nom_categorie', ['label' => 'Nom']) ?>
<?= $this->Form->control('montant_indemnite', ['label' => "Montant d'indemnité"]) ?>
<?= $this->Form->button(__('Créer la catégorie')) ?>
<?= $this->Form->end() ?>

<br/>
<?= $this->Html->link('Retour à la liste des catégories', ['controller' => 'Categories', 'action' => 'index'], ['class' => 'button']) ?>