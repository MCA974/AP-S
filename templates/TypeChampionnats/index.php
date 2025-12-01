
<h1>Tous les types de championnats</h1>

<?= $this->Html->image("btn_add.png", ["alt" => "Add", 'url' => ['action' => 'add'], 'style' => 'height:48px;']); ?>

<table>
    <tr>
        <th>N° Type</th>
        <th>Nom</th>
        <th>Date de création</th>
        <th>Date de modification</th>
        <th>Action</th>
    </tr>

    <?php foreach ($mesTypesChampionnats as $type): ?>
        <tr>
            <td><?= h($type->num_type_championnat) ?></td>
            <td><?= h($type->nom_type_championnat) ?></td>
            <td><?= $type->created ? $type->created->format(DATE_RFC850) : 'N/A' ?></td>
            <td><?= $type->modified ? $type->modified->format(DATE_RFC850) : 'N/A' ?></td>
            <td>
                <?= $this->Html->link(__('Voir'), ['action' => 'view', $type->num_type_championnat], ['class' => 'button']) ?>
                <?= $this->Html->link(__('Modifier'), ['action' => 'edit', $type->num_type_championnat], ['class' => 'button']) ?>
                <?= $this->Form->postLink(__('Supprimer'), ['action' => 'delete', $type->num_type_championnat], ['confirm' => __('Êtes-vous sûr ?'), 'class' => 'button']) ?>
            </td>
        </tr>
    <?php endforeach; ?>
</table>