<h1>Détail de l'équipe</h1>

<p>
    <small>Créé le : <?= $lEquipe->created->format(DATE_RFC850) ?></small><br>
    <small>Modifié le : <?= $lEquipe->modified->format(DATE_RFC850) ?></small>
</p>

<table>
     <tr>
          <th>Numéro d'équipe</th>
          <td><?= h($lEquipe->num_equipe) ?></td>
     </tr>
     <tr>
          <th>Club</th>
          <td><?= h($lEquipe->club->nom_club) ?></td>
     </tr>
     <tr>
          <th>Championnat</th>
          <td><?= h($lEquipe->championnat->nom_championnat) ?></td>
     </tr>
</table>

<p>
     <?= $this->Html->link(__('Retour à l\'index'), ['action' => 'index'], ['class' => 'button']) ?>
     <?= $this->Html->link(__('Modifier'), ['action' => 'edit', $lEquipe->id], ['class' => 'button']) ?>
</p>