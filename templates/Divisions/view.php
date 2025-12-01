<h1>Détail de la division</h1>

<p>
    <small>Créé le : <?= $laDivision->created->format(DATE_RFC850) ?></small><br>
    <small>Modifié le : <?= $laDivision->modified->format(DATE_RFC850) ?></small>
</p>

<table>
     <tr>
          <th>Nom de la division</th>
          <td><?= h($laDivision->nom_division) ?></td>
     </tr>
</table>

<?php if ( ?>
<h2>Championnats associés (<?= count($laDivision->championnats) ?>)</h2>
<ul>
    <?php foreach ($laDivision->championnats as $championnat): ?>
        <li><?= h($championnat->nom_championnat) ?></li>
    <?php endforeach; ?>
</ul>
<?php else: ?>
<p><em>Aucun championnat associé à cette division.</em></p>
<?php endif; ?>

<p>
     <?= $this->Html->link(__('Retour à l\'index'), ['action' => 'index'], ['class' => 'button']) ?>
     <?= $this->Html->link(__('Modifier'), ['action' => 'edit', $laDivision->num_division], ['class' => 'button']) ?>
</p>
