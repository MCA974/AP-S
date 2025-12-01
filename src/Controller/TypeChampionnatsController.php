<?php

namespace App\Controller;

class TypeChampionnatsController extends AppController {
    
    public function index() {
        $mesTypesChampionnats = $this->TypeChampionnats->find()
            ->contain(['Championnats'])
            ->toArray();
        
        $this->set(compact('mesTypesChampionnats'));
    }

    public function view($id = null) {
        try {
            $leTypeChampionnat = $this->TypeChampionnats->get($id, [
                'contain' => ['Championnats']
            ]);
        } catch (\Exception $ex) {
            if ($id === null) {
                $this->Flash->error(__("L'action view doit être appelée avec un identifiant"));
            } else {
                $this->Flash->error(__("Le type de championnat {0} n'existe pas", $id));
            }
            return $this->redirect(['action' => 'index']);
        }

        $this->set(compact('leTypeChampionnat'));
    }

    public function add() {
        $leTypeChampionnat = $this->TypeChampionnats->newEmptyEntity();
        
        if ($this->request->is('post')) {
            $leTypeChampionnat = $this->TypeChampionnats->patchEntity($leTypeChampionnat, $this->request->getData());
            if ($this->TypeChampionnats->save($leTypeChampionnat)) {
                $this->Flash->success(__('Le type de championnat a été sauvegardé.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Impossible de sauvegarder le type de championnat.'));
            }
        }

        $this->set(compact('leTypeChampionnat'));
    }

    public function edit($id = null) {
        try {
            $leTypeChampionnat = $this->TypeChampionnats->get($id);
        } catch (\Exception $ex) {
            if ($id === null) {
                $this->Flash->error(__("L'action edit doit être appelée avec un identifiant"));
            } else {
                $this->Flash->error(__("Le type de championnat {0} n'existe pas", $id));
            }
            return $this->redirect(['action' => 'index']);
        }

        if ($this->request->is(['post', 'put', 'patch'])) {
            $leTypeChampionnat = $this->TypeChampionnats->patchEntity($leTypeChampionnat, $this->request->getData());
            if ($this->TypeChampionnats->save($leTypeChampionnat)) {
                $this->Flash->success(__("Le type de championnat a été mis à jour."));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__("Impossible de mettre à jour le type de championnat."));
            }
        }

        $this->set(compact('leTypeChampionnat'));
    }

    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        
        try {
            $leTypeChampionnat = $this->TypeChampionnats->get($id);
        } catch (\Exception $ex) {
            $this->Flash->error(__("Le type de championnat n'existe pas."));
            return $this->redirect(['action' => 'index']);
        }

        if ($this->TypeChampionnats->delete($leTypeChampionnat)) {
            $this->Flash->success(__("Le type de championnat {0} a bien été supprimé", $leTypeChampionnat->nom_type_championnat));
        } else {
            $this->Flash->error(__("Impossible de supprimer le type de championnat."));
        }
        
        return $this->redirect(['action' => 'index']);
    }
}