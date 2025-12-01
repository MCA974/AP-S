
<h1>Détail du championnat</h1>

<p>
    <small>Créé le : <?= $leChampionnat->created->format(DATE_RFC850) ?></small><br>
    <small>Modifié le : <?= $leChampionnat->modified->format(DATE_RFC850) ?></small>
</p>

<table>
     <tr>
          <th>Nom du championnat</th>
          <td><?= h($leChampionnat->nom_championnat) ?></td>
     </tr>
     <tr>
          <th>Catégorie</th>
          <td><?= h($leChampionnat->categorie->nom_categorie) ?></td>
     </tr>
     <tr>
          <th>Division</th>
          <td><?= h($leChampionnat->division->nom_division) ?></td>
     </tr>
     <tr>
          <th>Type de championnat</th>
          <td><?= h($leChampionnat->type_championnat->nom_type_championnat) ?></td>
     </tr>
</table>

<?php if (count($leChampionnat->equipes) > 0): ?>
<h2>Équipes inscrites (<?= count($leChampionnat->equipes) ?>)</h2>
<ul>
    <?php foreach ($leChampionnat->equipes as $equipe): ?>
        <li><?= h($equipe->num_equipe) ?></li>
    <?php endforeach; ?>
</ul>
<?php endif; ?>

<p>
     <?= $this->Html->link(__('Retour à l\'index'), ['action' => 'index'], ['class' => 'button']) ?>
     <?= $this->Html->link(__('Modifier'), ['action' => 'edit', $leChampionnat->num_championnat], ['class' => 'button']) ?>
</p>
