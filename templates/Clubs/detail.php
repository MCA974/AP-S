
<h1>club</h1>

<p>
    <small>Créé le : <?= $club->created->format(DATE_RFC850) ?></small><br>
    <small>Modifié le : <?= $club->modified->format(DATE_RFC850) ?></small>
</p>

<table>
     <tr>
          <th>Nom</th>
          <td><?= h($club->name) ?></td>
     </tr>
</table>

<p>
     <?= $this->Html->link(__('Retour à l\'index'), ['action' => 'index'], ['class' => 'button']) ?>
</p>