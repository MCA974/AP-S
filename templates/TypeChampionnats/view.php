
<h1>Détail du type de championnat</h1>

<p>
    <small>Créé le : <?= $leTypeChampionnat->created->format(DATE_RFC850) ?></small><br>
    <small>Modifié le : <?= $leTypeChampionnat->modified->format(DATE_RFC850) ?></small>
</p>

<table>
    <tr>
        <th>Nom du type</th>
        <td><?= h($leTypeChampionnat->nom_type_championnat) ?></td>
    </tr>
</table>

<?php if (count($leTypeChampionnat->championnats) > 0): ?>
<h2>Championnats associés (<?= count($leTypeChampionnat->championnats) ?>)</h2>
<ul>
    <?php foreach ($leTypeChampionnat->championnats as $championnat): ?>
        <li><?= $this->Html->link(h($championnat->nom_championnat), ['controller' => 'Championnats', 'action' => 'view', $championnat->num_championnat]) ?></li>
    <?php endforeach; ?>
</ul>
<?php endif; ?>

<p>
    <?= $this->Html->link(__('Retour à la liste'), ['action' => 'index'], ['class' => 'button']) ?>
    <?= $this->Html->link(__('Modifier'), ['action' => 'edit', $leTypeChampionnat->num_type_championnat], ['class' => 'button']) ?>
</p>