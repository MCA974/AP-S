<?php

namespace App\Controller;

class ChampionnatsController extends AppController {
   
    public function index() {
        // Récupération de tous les championnats avec leurs relations
        $mesChampionnats = $this->Championnats->find()
            ->contain(['Categories', 'Divisions', 'TypeChampionnats'])
            ->toArray();

        $this->set(compact('mesChampionnats'));
    }

    public function view($id = null) {
        try {
            $leChampionnat = $this->Championnats->get($id, [
                'contain' => ['Categories', 'Divisions', 'TypeChampionnats', 'Equipes']
            ]);
        } catch (\Exception $ex) {
            if ($id === null) {
                $this->Flash->error(__("L'action view doit être appelée avec un identifiant"));
            } else {
                $this->Flash->error(__("Le championnat {0} n'existe pas", $id));
            }
            return $this->redirect(['action' => 'index']);
        }

        $this->set(compact('leChampionnat'));
    }

    public function add() {
        $leChampionnat = $this->Championnats->newEmptyEntity();
        
        if ($this->request->is('post')) {
            $leChampionnat = $this->Championnats->patchEntity($leChampionnat, $this->request->getData());
            if ($this->Championnats->save($leChampionnat)) {
                $this->Flash->success(__("Le championnat a été sauvegardé."));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__("Impossible d'ajouter le championnat."));
            }
        }
        
        // Récupération des données pour les listes déroulantes
        $categories = $this->Championnats->Categories->find('list', [
            'keyField' => 'num_categorie',
            'valueField' => 'nom_categorie'
        ])->toArray();
        
        $divisions = $this->Championnats->Divisions->find('list', [
            'keyField' => 'num_division',
            'valueField' => 'nom_division'
        ])->toArray();
        
        $typeChampionnats = $this->Championnats->TypeChampionnats->find('list', [
            'keyField' => 'num_type_championnat',
            'valueField' => 'nom_type_championnat'
        ])->toArray();
        
        $this->set(compact('leChampionnat', 'categories', 'divisions', 'typeChampionnats'));
    }

    public function edit($id = null) {
        try {
            $leChampionnat = $this->Championnats->get($id);
        } catch (\Exception $ex) {
            if ($id === null) {
                $this->Flash->error(__("L'action edit doit être appelée avec un identifiant"));
            } else {
                $this->Flash->error(__("Le championnat {0} n'existe pas", $id));
            }
            return $this->redirect(['action' => 'index']);
        }

        if ($this->request->is(['post', 'put', 'patch'])) {
            $leChampionnat = $this->Championnats->patchEntity($leChampionnat, $this->request->getData());
            if ($this->Championnats->save($leChampionnat)) {
                $this->Flash->success(__("Votre championnat a été mis à jour."));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__("Impossible de mettre à jour votre championnat."));
            }
        }

        // Récupération des données pour les listes déroulantes
        $categories = $this->Championnats->Categories->find('list', [
            'keyField' => 'num_categorie',
            'valueField' => 'nom_categorie'
        ])->toArray();
        
        $divisions = $this->Championnats->Divisions->find('list', [
            'keyField' => 'num_division',
            'valueField' => 'nom_division'
        ])->toArray();
        
        $typeChampionnats = $this->Championnats->TypeChampionnats->find('list', [
            'keyField' => 'num_type_championnat',
            'valueField' => 'nom_type_championnat'
        ])->toArray();

        $this->set(compact('leChampionnat', 'categories', 'divisions', 'typeChampionnats'));
    }

    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        
        try {
            $leChampionnat = $this->Championnats->get($id);
        } catch (\Exception $ex) {
            $this->Flash->error(__("Le championnat n'existe pas."));
            return $this->redirect(['action' => 'index']);
        }

        if ($this->Championnats->delete($leChampionnat)) {
            $this->Flash->success(__("Le championnat {0} d'id {1} a bien été supprimé ", $leChampionnat->nom_championnat, $leChampionnat->num_championnat));
        } else {
            $this->Flash->error(__("Impossible de supprimer le championnat."));
        }
        
        return $this->redirect(['action' => 'index']);
    }
}
