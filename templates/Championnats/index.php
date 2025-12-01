<h1>Tous les championnats</h1>

<?= $this->Html->image("btn_add.png", ["alt" => "Add", 'url' => ['action' => 'add'], 'style' => 'height:48px;']); ?>

<table>
    <tr>
        <th>N° Championnat</th>
        <th>Nom</th>
        <th>Catégorie</th>
        <th>Division</th>
        <th>Type</th>
        <th>Date de création</th>
        <th>Date de modification</th>
        <th>Action</th>
    </tr>

    <?php foreach ($mesChampionnats as $championnat): ?>
        <tr>
            <td><?= $championnat->num_championnat ?></td>
            <td>
                <?= $this->Html->link(
                    $championnat->nom_championnat,
                    ['controller' => 'Championnats', 'action' => 'view', $championnat->num_championnat]
                ) ?>
            </td>
            <td><?= h($championnat->categorie->nom_categorie) ?></td>
            <td><?= h($championnat->division->nom_division) ?></td>
            <td><?= h($championnat->type_championnat->nom_type_championnat) ?></td>
            <td><?= $championnat->created ? $championnat->created->format(DATE_RFC850) : 'N/A' ?></td>
            <td><?= $championnat->modified ? $championnat->modified->format(DATE_RFC850) : 'N/A' ?></td>
            <td>
                <?= $this->Html->link(
                    $this->Html->image("btn_edit.png", ["alt" => "edit"]),
                    ['action' => 'edit', $championnat->num_championnat],
                    ['escape' => false]
                ) ?>
                <?= $this->Form->postLink(
                    $this->Html->image("btn_del.png", ["alt" => "supprimer"]),
                    ['action' => 'delete', $championnat->num_championnat],
                    ['confirm' => __("Vraiment supprimer le championnat {0} dont l'id vaut {1}?", $championnat->nom_championnat, $championnat->num_championnat), 'escape' => false]
                ) ?>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
