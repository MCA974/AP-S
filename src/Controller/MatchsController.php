<?php
declare(strict_types=1);

namespace App\Controller;

use App\Controller\AppController;

/**
 * Matchs Controller
 *
 * @property \App\Model\Table\MatchsTable $Matchs
 */
class MatchsController extends AppController
{
    /**
     * Index method
     * Liste tous les matchs avec les équipes et clubs associés
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        // Récupération de tous les matchs avec les relations
        $mesMatchs = $this->Matchs->find()
            ->contain([
                'EquipesDomicile' => ['Clubs'],
                'EquipesExterieur' => ['Clubs']
            ])
            ->order(['Matchs.date_match' => 'DESC'])
            ->all();

        $this->set(compact('mesMatchs'));
    }

    /**
     * View method
     * Affiche les détails d'un match
     *
     * @param string|null $id Match id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        try {
            $leMatch = $this->Matchs->get($id, [
                'contain' => [
                    'EquipesDomicile' => ['Clubs'],
                    'EquipesExterieur' => ['Clubs']
                ]
            ]);
            
            $this->set(compact('leMatch'));
        } catch (\Exception $ex) {
            $this->Flash->error(__("Le match n'existe pas"));
            return $this->redirect(['action' => 'index']);
        }
    }

    /**
     * Add method
     * Ajoute un nouveau match
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $leMatch = $this->Matchs->newEmptyEntity();
        
        if ($this->request->is('post')) {
            $leMatch = $this->Matchs->patchEntity($leMatch, $this->request->getData());
            
            if ($this->Matchs->save($leMatch)) {
                $this->Flash->success(__('Le match a été créé avec succès.'));
                return $this->redirect(['action' => 'index']);
            }
            
            $this->Flash->error(__('Le match n\'a pas pu être créé. Veuillez réessayer.'));
        }
        
        // Préparer les listes déroulantes pour le formulaire
        $this->_setDropdowns();
        $this->set(compact('leMatch'));
    }

    /**
     * Edit method
     * Modifie un match existant
     *
     * @param string|null $id Match id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        try {
            $leMatch = $this->Matchs->get($id, [
                'contain' => []
            ]);
        } catch (\Exception $ex) {
            $this->Flash->error(__("Le match n'existe pas"));
            return $this->redirect(['action' => 'index']);
        }
        
        if ($this->request->is(['patch', 'post', 'put'])) {
            $leMatch = $this->Matchs->patchEntity($leMatch, $this->request->getData());
            
            if ($this->Matchs->save($leMatch)) {
                $this->Flash->success(__('Le match a été mis à jour avec succès.'));
                return $this->redirect(['action' => 'index']);
            }
            
            $this->Flash->error(__('Le match n\'a pas pu être mis à jour. Veuillez réessayer.'));
        }
        
        // Préparer les listes déroulantes pour le formulaire
        $this->_setDropdowns();
        $this->set(compact('leMatch'));
    }

    /**
     * Delete method
     * Supprime un match
     *
     * @param string|null $id Match id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        
        try {
            $leMatch = $this->Matchs->get($id);
            
            if ($this->Matchs->delete($leMatch)) {
                $this->Flash->success(__('Le match a été supprimé avec succès.'));
            } else {
                $this->Flash->error(__('Le match n\'a pas pu être supprimé. Veuillez réessayer.'));
            }
        } catch (\Exception $ex) {
            $this->Flash->error(__("Le match n'existe pas"));
        }
        
        return $this->redirect(['action' => 'index']);
    }

    /**
     * Méthode privée pour préparer les listes déroulantes des équipes
     * @return void
     */
    protected function _setDropdowns()
    {
        // Récupérer toutes les équipes avec leurs clubs
        $equipes = $this->Matchs->EquipesDomicile->find()
            ->contain(['Clubs'])
            ->order(['Clubs.nom_club' => 'ASC'])
            ->all();

        // Formater pour la liste déroulante : afficher "Équipe X - Nom du Club"
        $lesEquipes = [];
        foreach ($equipes as $equipe) {
            $lesEquipes[$equipe->id] = sprintf(
                'Équipe %s - %s',
                h($equipe->num_equipe),
                h($equipe->club->nom_club)
            );
        }

        $this->set(compact('lesEquipes'));
    }
}