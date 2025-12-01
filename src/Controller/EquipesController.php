<?php

namespace App\Controller;

class EquipesController extends AppController {
    
    public function index() {
        $mesEquipes = $this->Equipes->find()
            ->contain(['Clubs', 'Championnats'])
            ->toArray();
        
        $this->set(compact('mesEquipes'));
    }

    public function view($id = null) {
        try {
            $lEquipe = $this->Equipes->get($id, [
                'contain' => ['Clubs', 'Championnats']
            ]);
        } catch (\Exception $ex) {
            if ($id === null) {
                $this->Flash->error(__("L'action view doit être appelée avec un identifiant"));
            } else {
                $this->Flash->error(__("L'équipe {0} n'existe pas", $id));
            }
            return $this->redirect(['action' => 'index']);
        }

        $this->set(compact('lEquipe'));
    }

    public function add() {
        $lEquipe = $this->Equipes->newEmptyEntity();
        
        if ($this->request->is('post')) {
            $lEquipe = $this->Equipes->patchEntity($lEquipe, $this->request->getData());
            if ($this->Equipes->save($lEquipe)) {
                $this->Flash->success(__("L'équipe a été sauvegardée."));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__("Impossible d'ajouter l'équipe."));
        }
        
        $this->_setDropdowns();
        $this->set(compact('lEquipe'));
    }

    public function edit($id = null) {
        $lEquipe = $this->Equipes->get($id, ['contain' => ['Clubs', 'Championnats']]);

        if ($this->request->is(['post', 'put', 'patch'])) {
            $lEquipe = $this->Equipes->patchEntity($lEquipe, $this->request->getData());
            if ($this->Equipes->save($lEquipe)) {
                $this->Flash->success(__("L'équipe a été mise à jour."));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__("Impossible de mettre à jour l'équipe."));
        }

        $this->_setDropdowns();
        $this->set(compact('lEquipe'));
    }

    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $lEquipe = $this->Equipes->get($id);

        if ($this->Equipes->delete($lEquipe)) {
            $this->Flash->success(__("L'équipe {0} a bien été supprimée", $lEquipe->num_equipe));
        } else {
            $this->Flash->error(__("Impossible de supprimer l'équipe."));
        }
        
        return $this->redirect(['action' => 'index']);
    }

    protected function _setDropdowns() {
        $lesClubs = $this->Equipes->Clubs->find()
            ->map(function($row) {
                return [$row->num_club => $row->nom_club];
            })
            ->reduce(function($result, $item) {
                return $result + $item;
            }, []);
        
        $lesChampionnats = $this->Equipes->Championnats->find()
            ->map(function($row) {
                return [$row->num_championnat => $row->nom_championnat];
            })
            ->reduce(function($result, $item) {
                return $result + $item;
            }, []);

        $this->set(compact('lesClubs', 'lesChampionnats'));
    }
}
