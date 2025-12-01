<?php

namespace App\Controller;

class DivisionsController extends AppController {
   
    public function index() {
        // Récupération de toutes les divisions
        $mesDivisions = $this->Divisions->find()
            ->contain(['Championnats'])
            ->toArray();

        $this->set(compact('mesDivisions'));
    }

    public function view($id = null) {
        try {
            $laDivision = $this->Divisions->get($id, [
                'contain' => ['Championnats']
            ]);
        } catch (\Exception $ex) {
            if ($id === null) {
                $this->Flash->error(__("L'action view doit être appelée avec un identifiant"));
            } else {
                $this->Flash->error(__("La division {0} n'existe pas", $id));
            }
            return $this->redirect(['action' => 'index']);
        }

        $this->set(compact('laDivision'));
    }

    public function add() {
        $laDivision = $this->Divisions->newEmptyEntity();
        
        if ($this->request->is('post')) {
            $laDivision = $this->Divisions->patchEntity($laDivision, $this->request->getData());
            if ($this->Divisions->save($laDivision)) {
                $this->Flash->success(__("La division a été sauvegardée."));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__("Impossible d'ajouter la division."));
            }
        }
        
        $this->set(compact('laDivision'));
    }

    public function edit($id = null) {
        try {
            $laDivision = $this->Divisions->get($id);
        } catch (\Exception $ex) {
            if ($id === null) {
                $this->Flash->error(__("L'action edit doit être appelée avec un identifiant"));
            } else {
                $this->Flash->error(__("La division {0} n'existe pas", $id));
            }
            return $this->redirect(['action' => 'index']);
        }

        if ($this->request->is(['post', 'put', 'patch'])) {
            $laDivision = $this->Divisions->patchEntity($laDivision, $this->request->getData());
            if ($this->Divisions->save($laDivision)) {
                $this->Flash->success(__("La division a été mise à jour."));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__("Impossible de mettre à jour la division."));
            }
        }

        $this->set(compact('laDivision'));
    }

    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        
        try {
            $laDivision = $this->Divisions->get($id);
        } catch (\Exception $ex) {
            $this->Flash->error(__("La division n'existe pas."));
            return $this->redirect(['action' => 'index']);
        }

        if ($this->Divisions->delete($laDivision)) {
            $this->Flash->success(__("La division {0} d'id {1} a bien été supprimée ", $laDivision->nom_division, $laDivision->num_division));
        } else {
            $this->Flash->error(__("Impossible de supprimer la division."));
        }
        
        return $this->redirect(['action' => 'index']);
    }
}
