<?php

namespace App\Controller;

class TypeChampionnatsController extends AppController {
    
    public function index() {
        //on récupére tous les posts et on les stocke dans $mesDivisions
        $mesTypesDeChampionnats = $this->TypeChampionnats->find()->all();

        $this->set(compact('mesTypesDeChampionnats')); //envoie à la vue le contenu de $mesDivisions dans $rep qui sera utiliseable
    }

   /* public function detail($id = null) {
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
    } */

     public function add() {
        
        $leTypeDeChampionnat = $this->TypeChampionnats->newEmptyEntity();
        if ($this->request->is('post')) {
            $leTypeDeChampionnat = $this->TypeChampionnats->patchEntity($leTypeDeChampionnat, $this->request->getData());
            if ($this->TypeChampionnats->save($leTypeDeChampionnat)) {
                $this->Flash->success(__("Le type de championnat a été sauvegardé."));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__("Impossible d'ajouter type de championnat."));
            }
        }
        $this->set(compact('leTypeDeChampionnat'));
    }

    public function edit($id = null) {
        try {
            $leTypeDeChampionnat = $this->TypeChampionnats->get($id);
        } catch (\Exception $ex) {
            if ($id == null) {
                $this->Flash->error(__("L'action edit doit être appelé avec un identifiant"));
            } else {
                $this->Flash->error(__("Le type de championnat {0} n'existe pas", $id));
            }
            return $this->redirect(['action' => 'index']);
        }

        if ($this->request->is(['post', 'put'])) {
            $this->TypeChampionnats->patchEntity($leTypeDeChampionnat, $this->request->getData());
            if ($this->TypeChampionnats->save($leTypeDeChampionnat)) {
                $this->Flash->success(__('Votre type de championnat a été mis à jour.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Impossible de mettre à jour votre type de championnat.'));
            }
        }

        $this->set(compact('leTypeDeChampionnat'));
    }

    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $leTypeDeChampionnat = $this->TypeChampionnats->get($id);
        if ($this->TypeChampionnats->delete($leTypeDeChampionnat)) {
            $this->Flash->success(__("Le type de championnat {0} d' id {1} a bien été supprimé ! ", $leTypeDeChampionnat->name, $leTypeDeChampionnat->id));
        return $this->redirect(['action' => 'index']);
        }
    }
}