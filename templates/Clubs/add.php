
    <h1>Ajouter un club</h1>
    <?php
        echo $this->Form->create($leClub);
        echo $this->Form->control('nom_club', ['label' => 'Nom']);
        echo $this->Form->button(__('Créer le club'));
        echo $this->Form->end();
        echo $this->Html->link('Retour à la liste des clubs', ['controller' => 'Clubs', 'action' => 'index'], ['class' => 'button']);
    ?>
