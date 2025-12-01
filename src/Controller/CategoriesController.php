<?php

namespace App\Controller;

class CategoriesController extends AppController {
    
    public function index() {
        $mesCategories = $this->Categories->find()
            ->contain(['Championnats'])
            ->toArray();
        
        $this->set(compact('mesCategories'));
    }

    public function view($id = null) {
        try {
            $laCategorie = $this->Categories->get($id, [
                'contain' => ['Championnats']
            ]);
        } catch (\Exception $ex) {
            if ($id === null) {
                $this->Flash->error(__("L'action view doit être appelée avec un identifiant"));
            } else {
                $this->Flash->error(__("La catégorie {0} n'existe pas", $id));
            }
            return $this->redirect(['action' => 'index']);
        }

        $this->set(compact('laCategorie'));
    }

    public function add() {
        $laCategorie = $this->Categories->newEmptyEntity();
        
        if ($this->request->is('post')) {
            $laCategorie = $this->Categories->patchEntity($laCategorie, $this->request->getData());
            if ($this->Categories->save($laCategorie)) {
                $this->Flash->success(__("La catégorie a été sauvegardée."));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__("Impossible d'ajouter la catégorie."));
            }
        }
        
        $this->set(compact('laCategorie'));
    }

    public function edit($id = null) {
        try {
            $laCategorie = $this->Categories->get($id);
        } catch (\Exception $ex) {
            if ($id === null) {
                $this->Flash->error(__("L'action edit doit être appelée avec un identifiant"));
            } else {
                $this->Flash->error(__("La catégorie {0} n'existe pas", $id));
            }
            return $this->redirect(['action' => 'index']);
        }

        if ($this->request->is(['post', 'put', 'patch'])) {
            $laCategorie = $this->Categories->patchEntity($laCategorie, $this->request->getData());
            if ($this->Categories->save($laCategorie)) {
                $this->Flash->success(__("La catégorie a été mise à jour."));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__("Impossible de mettre à jour la catégorie."));
            }
        }

        $this->set(compact('laCategorie'));
    }

    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        
        try {
            $laCategorie = $this->Categories->get($id);
        } catch (\Exception $ex) {
            $this->Flash->error(__("La catégorie n'existe pas."));
            return $this->redirect(['action' => 'index']);
        }

        if ($this->Categories->delete($laCategorie)) {
            $this->Flash->success(__("La catégorie {0} a bien été supprimée", $laCategorie->nom_categorie));
        } else {
            $this->Flash->error(__("Impossible de supprimer la catégorie."));
        }
        
        return $this->redirect(['action' => 'index']);
    }
}