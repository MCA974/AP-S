<h1>Toutes les divisions</h1>

<?= $this->Html->image("btn_add.png", ["alt" => "Add", 'url' => ['action' => 'add'], 'style' => 'height:48px;']); ?>

<table>
    <tr>
        <th>N° Division</th>
        <th>Nom</th>
        <th>Nb Championnats</th>
        <th>Date de création</th>
        <th>Date de modification</th>
        <th>Action</th>
    </tr>

    <?php foreach ($mesDivisions as $division): ?>
        <tr>
            <td><?= $division->num_division ?></td>
            <td>
                <?= $this->Html->link(
                    $division->nom_division,
                    ['controller' => 'Divisions', 'action' => 'view', $division->num_division]
                ) ?>
            </td>
            <td><?= count($division->championnats) ?></td>
            <td><?= $division->created ? $division->created->format(DATE_RFC850) : 'N/A' ?></td>
            <td><?= $division->modified ? $division->modified->format(DATE_RFC850) : 'N/A' ?></td>
            <td>
                <?= $this->Html->link(
                    $this->Html->image("btn_edit.png", ["alt" => "edit"]),
                    ['action' => 'edit', $division->num_division],
                    ['escape' => false]
                ) ?>
                <?= $this->Form->postLink(
                    $this->Html->image("btn_del.png", ["alt" => "supprimer"]),
                    ['action' => 'delete', $division->num_division],
                    ['confirm' => __("Vraiment supprimer la division {0} dont l'id vaut {1}?", $division->nom_division, $division->num_division), 'escape' => false]
                ) ?>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
