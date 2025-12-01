<h1>Tous les clubs</h1>

<?= $this->Html->image("btn_add.png", ["alt" => "Add", 'url' => ['action' => 'add'], 'style' => 'height:48px;']); ?>

<table>
    <tr>
        <th>Id</th>
        <th>Nom</th>
        <th>Date de création</th>
        <th>Date de modification</th>
        <th>Action</th>
    </tr>

    <?php foreach ($mesClubs as $club): ?>
        <tr>
            <td><?= $club->id ?></td>
            <td>
                <?= $this->Html->link(
                    $club->nom_club,
                    ['controller' => 'Clubs', 'action' => 'view', $club->id]
                ) ?>
            </td>
            <td><?= $club->created ? $club->created->format(DATE_RFC850) : 'N/A' ?></td>
            <td><?= $club->modified ? $club->modified->format(DATE_RFC850) : 'N/A' ?></td>
            <td>
                <?= $this->Html->link(
                    $this->Html->image("btn_edit.png", ["alt" => "edit"]),
                    ['action' => 'edit', $club->id],
                    ['escape' => false]
                ) ?>
                <?= $this->Form->postLink(
                    $this->Html->image("btn_del.png", ["alt" => "supprimer"]),
                    ['action' => 'delete', $club->id],
                    ['confirm' => __("Vraiment supprimer {0} dont l'id vaut {1}?", $club->nom_club, $club->id), 'escape' => false]
                ) ?>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
