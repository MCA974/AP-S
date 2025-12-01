
<h1>Toutes les catégories</h1>

<?= $this->Html->image("btn_add.png", ["alt" => "Add", 'url' => ['action' => 'add'], 'style' => 'height:48px;']); ?>

<table>
    <tr>
        <th>Id</th>
        <th>Nom</th>
        <th>Montant d'indemnité</th>
        <th>Date de création</th>
        <th>Date de modification</th>
        <th>Action</th>
    </tr>

    <?php foreach ($mesCategories as $categorie): ?>
    <tr>
        <td><?= h($categorie->id) ?></td>
        <td>
            <?= $this->Html->link(
                h($categorie->nom_categorie),
                ['controller' => 'Categories', 'action' => 'view', $categorie->id]
            ) ?>
        </td>
        <td><?= isset($categorie->montant_indemnite) ? h($categorie->montant_indemnite) : 'N/A' ?></td>
        <td><?= $categorie->created ? $categorie->created->format(DATE_RFC850) : 'N/A' ?></td>
        <td><?= $categorie->modified ? $categorie->modified->format(DATE_RFC850) : 'N/A' ?></td>
        <td>
            <?= $this->Html->link(
                $this->Html->image("btn_edit.png", ["alt" => "edit"]),
                ['action' => 'edit', $categorie->id],
                ['escape' => false]
            ) ?>
            <?= $this->Form->postLink(
                $this->Html->image("btn_del.png", ["alt" => "supprimer"]),
                ['action' => 'delete', $categorie->id],
                [
                    'confirm' => __("Vraiment supprimer {0} dont l'id vaut {1}?", $categorie->nom_categorie, $categorie->id),
                    'escape' => false
                ]
            ) ?>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
