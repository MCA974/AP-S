<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TypeChampionnat $typeChampionnat
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Type Championnat'), ['action' => 'edit', $typeChampionnat->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Type Championnat'), ['action' => 'delete', $typeChampionnat->id], ['confirm' => __('Are you sure you want to delete # {0}?', $typeChampionnat->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Type Championnats'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Type Championnat'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="typeChampionnats view content">
            <h3><?= h($typeChampionnat->num_championnat) ?></h3>
            <table>
                <tr>
                    <th><?= __('Num Championnat') ?></th>
                    <td><?= h($typeChampionnat->num_championnat) ?></td>
                </tr>
                <tr>
                    <th><?= __('Integer') ?></th>
                    <td><?= h($typeChampionnat->integer) ?></td>
                </tr>
                <tr>
                    <th><?= __('Nom Championnat') ?></th>
                    <td><?= h($typeChampionnat->nom_championnat) ?></td>
                </tr>
                <tr>
                    <th><?= __('String') ?></th>
                    <td><?= h($typeChampionnat->string) ?></td>
                </tr>
                <tr>
                    <th><?= __('Num Categorie') ?></th>
                    <td><?= h($typeChampionnat->num_categorie) ?></td>
                </tr>
                <tr>
                    <th><?= __('Num Division') ?></th>
                    <td><?= h($typeChampionnat->num_division) ?></td>
                </tr>
                <tr>
                    <th><?= __('Num Type Championnat') ?></th>
                    <td><?= h($typeChampionnat->num_type_championnat) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($typeChampionnat->id) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>