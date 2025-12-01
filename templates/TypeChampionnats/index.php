<h1>Tous les types de championnats</h1>

<?=
/* $this->html->link('Créer une division', ['action' => 'add'], ['class' => 'button', 'style' => 'background-color : #266EE5;']); */
$this->html->image("btn_add.png",["alt" => "Add", 'url' => ['action' => 'add'], 'style' => 'height:48px;']);
?>

<table>
    <tr>
        <th>Id</th>
        <th>Nom</th>
        <!-- <th>Créer par</th> -->
        <th>Date de création</th>
        <th>Date de modification</th>
        <th> Action </th>
    </tr>

    <!-- Ici se trouve l'itération sur l'objet query de notre $mesArticles, l'affichage des infos des articles -->
    <?php foreach ($mesTypesDeChampionnats as $leTypeDeChampionnat): ?>
        <tr>
            <td><?= $leTypeDeChampionnat->id ?></td>
            <td>
                <?=
                $this->html->link($leTypeDeChampionnat->name, [
                    'controller' => 'type_championnats',
                    'action' => 'index',
                    $leTypeDeChampionnat->id]);
                //l’url généré sera de la forme /articles/detail/…
                ?>
            </td>
            
            <!-- <td>< ?= $division->name ? ></td> -->
            <td><?= $leTypeDeChampionnat->created->format(DATE_RFC850) ?></td>
            <td><?= $leTypeDeChampionnat->modified->format(DATE_RFC850) ?></td>

            <td> <?=
                $this->html->link($this->html->image("btn_edit.png",["alt" => "edit"]),
                        ['action' => 'edit', $leTypeDeChampionnat->id], 
                        ['escape' => false]);
                ?>
            <?=
                $this->Form->postLink($this->html->image("btn_del.png", ["alt" => "supprimer"]),
                        ['action' => 'delete', $leTypeDeChampionnat->id],
                        ['confirm' => __("Vraiment supprimer {0} dont l'id vaut {1} ", $leTypeDeChampionnat->name, $leTypeDeChampionnat->id), 'escape' => false]);
                         
                ?> 
            </td>
        </tr>
<?php endforeach; ?>
</table>