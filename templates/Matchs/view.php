<h1>Détail du match</h1>

<p>
    <small>Créé le : <?= $leMatch->created->format(DATE_RFC850) ?></small><br>
    <small>Modifié le : <?= $leMatch->modified->format(DATE_RFC850) ?></small>
</p>

<table>
    <tr>
        <th>Date du match</th>
        <td><?= $leMatch->date_match->format('d/m/Y H:i') ?></td>
    </tr>
    <tr>
        <th>Équipe à domicile</th>
        <td>
            <?= h($leMatch->equipes_domicile->num_equipe) ?> - 
            <?= h($leMatch->equipes_domicile->club->nom_club) ?>
        </td>
    </tr>
    <tr>
        <th>Équipe extérieure</th>
        <td>
            <?= h($leMatch->equipes_exterieur->num_equipe) ?> - 
            <?= h($leMatch->equipes_exterieur->club->nom_club) ?>
        </td>
    </tr>
</table>

<p>
    <?= $this->Html->link(__('Retour à l\'index'), ['action' => 'index'], ['class' => 'button']) ?>
    <?= $this->Html->link(__('Modifier'), ['action' => 'edit', $leMatch->id], ['class' => 'button']) ?>
</p>