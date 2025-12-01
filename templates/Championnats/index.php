
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
            <td><?= h($championnat->num_championnat) ?></td>
            <td><?= h($championnat->nom_championnat) ?></td>
            <td><?= h($championnat->categorie->nom_categorie) ?></td>
            <td><?= h($championnat->division->nom_division) ?></td>
            <td><?= h($championnat->type_championnat->nom_type_championnat) ?></td>
            <td><?= $championnat->created ? $championnat->created->format(DATE_RFC850) : 'N/A' ?></td>
            <td><?= $championnat->modified ? $championnat->modified->format(DATE_RFC850) : 'N/A' ?></td>
            <td>
                <?= $this->Html->link(__('Voir'), ['action' => 'view', $championnat->num_championnat], ['class' => 'button']) ?>
                <?= $this->Html->link(__('Modifier'), ['action' => 'edit', $championnat->num_championnat], ['class' => 'button']) ?>
                <?= $this->Form->postLink(__('Supprimer'), ['action' => 'delete', $championnat->num_championnat], ['confirm' => __('Êtes-vous sûr ?'), 'class' => 'button']) ?>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
