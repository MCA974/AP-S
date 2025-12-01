<?php

namespace App\Controller;

class CategoriesController extends AppController {
    
    public function index() {
        //on récupére tous les posts et on les stocke dans $mesDivisions
        $mesCategories = $this->Categories->find()->all();

        $this->set(compact('mesCategories')); //envoie à la vue le contenu de $mesDivisions dans $rep qui sera utiliseable
    }

   public function detail($id = null) {
        try {
            $leArticle = $this->Articles->get($id);
        } catch (\Exception $ex) {
            if ($id == null) {
                $this->Flash->error(__("L'action detail doit être appelé avec un identifiant"));
            } else {
                $this->Flash->error(__("L’article {0} n'existe pas", $id));
            }
            return $this->redirect(['action' => 'index']);
        }

        $this->set(compact('leArticle'));
    } 

     public function add() {
        
        $laCategorie = $this->Categories->newEmptyEntity();
        if ($this->request->is('post')) {
            $laCategorie = $this->Categories->patchEntity($laCategorie, $this->request->getData());
            if ($this->Categories->save($laCategorie)) {
                $this->Flash->success(__("La catégorie a été sauvegardé."));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__("Impossible d'ajouter une catégorie."));
            }
        }
        $this->set(compact('laCategorie'));
    }

    public function edit($id = null) {
        try {
            $laCategorie = $this->Categories->get($id);
        } catch (\Exception $ex) {
            if ($id == null) {
                $this->Flash->error(__("L'action edit doit être appelé avec un identifiant"));
            } else {
                $this->Flash->error(__("La catégorie {0} n'existe pas", $id));
            }
            return $this->redirect(['action' => 'index']);
        }

        if ($this->request->is(['post', 'put'])) {
            $this->Categories->patchEntity($laCategorie, $this->request->getData());
            if ($this->Categories->save($laCategorie)) {
                $this->Flash->success(__('Votre catégorie a été mis à jour.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Impossible de mettre à jour votre catégorie.'));
            }
        }

        $this->set(compact('laCategorie'));
    }

    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $laCategorie = $this->Categories->get($id);
        if ($this->Categories->delete($laCategorie)) {
            $this->Flash->success(__("Le type de championnat {0} d' id {1} a bien été supprimé ! ", $laCategorie->nom_categorie, $laCategorie->id));
        return $this->redirect(['action' => 'index']);
        }
    }
}