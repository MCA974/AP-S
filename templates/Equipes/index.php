<h1>Toutes les équipes</h1>

<?= $this->Html->image("btn_add.png", ["alt" => "Add", 'url' => ['action' => 'add'], 'style' => 'height:48px;']); ?>

<table>
    <tr>
        <th>Id</th>
        <th>N° Équipe</th>
        <th>Club</th>
        <th>Championnat</th>
        <th>Date de création</th>
        <th>Date de modification</th>
        <th>Action</th>
    </tr>

    <?php foreach ($mesEquipes as $equipe): ?>
        <tr>
            <td><?= $equipe->id ?></td>
            <td>
                <?= $this->Html->link(
                    $equipe->num_equipe,
                    ['controller' => 'Equipes', 'action' => 'view', $equipe->id]
                ) ?>
            </td>
            <td><?= h($equipe->club->nom_club) ?></td>
            <td><?= h($equipe->championnat->nom_championnat) ?></td>
            <td><?= $equipe->created ? $equipe->created->format(DATE_RFC850) : 'N/A' ?></td>
            <td><?= $equipe->modified ? $equipe->modified->format(DATE_RFC850) : 'N/A' ?></td>
            <td>
                <?= $this->Html->link(
                    $this->Html->image("btn_edit.png", ["alt" => "edit"]),
                    ['action' => 'edit', $equipe->id],
                    ['escape' => false]
                ) ?>
                <?= $this->Form->postLink(
                    $this->Html->image("btn_del.png", ["alt" => "supprimer"]),
                    ['action' => 'delete', $equipe->id],
                    ['confirm' => __("Vraiment supprimer l'équipe {0} dont l'id vaut {1}?", $equipe->num_equipe, $equipe->id), 'escape' => false]
                ) ?>
            </td>
        </tr>
    <?php endforeach; ?>
</table>