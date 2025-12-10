<h1>Tous les matchs</h1>

<?= $this->Html->image("btn_add.png", ["alt" => "Add", 'url' => ['action' => 'add'], 'style' => 'height:48px;']); ?>

<table>
    <tr>
        <th>Id</th>
        <th>Date</th>
        <th>Équipe Domicile</th>
        <th>Équipe Extérieur</th>
    </tr>

    <?php foreach ($mesMatchs as $match): ?>
        <tr>
            <td><?= h($match->id) ?></td>
            <td><?= $match->date_match ? $match->date_match->format('d/m/Y H:i') : 'N/A' ?></td>
            <td>
                <?= h($match->equipe_domicile->num_equipe) ?> - 
                <?= h($match->equipe_domicile->club->nom_club) ?>
            </td>
            <td>
                <?= h($match->equipe_exterieur->num_equipe) ?> - 
                <?= h($match->equipe_exterieur->club->nom_club) ?>
            </td>
            <td>
                <?php if ($match->score_domicile !== null && $match->score_exterieur !== null): ?>
                    <?= h($match->score_domicile) ?> - <?= h($match->score_exterieur) ?>
                <?php else: ?>
                    <em>À jouer</em>
                <?php endif; ?>
            </td>
            
            <td><?= $match->created ? $match->created->format(DATE_RFC850) : 'N/A' ?></td>
            <td>
                <?= $this->Html->link(
                    $this->Html->image("btn_edit.png", ["alt" => "edit"]),
                    ['action' => 'edit', $match->id],
                    ['escape' => false]
                ) ?>
                <?= $this->Form->postLink(
                    $this->Html->image("btn_del.png", ["alt" => "supprimer"]),
                    ['action' => 'delete', $match->id],
                    [
                        'confirm' => __("Vraiment supprimer le match {0}?", $match->id),
                        'escape' => false
                    ]
                ) ?>
            </td>
        </tr>
    <?php endforeach; ?>
</table>