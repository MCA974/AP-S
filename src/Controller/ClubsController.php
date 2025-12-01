<?php

namespace App\Controller;

class ClubsController extends AppController {
   
    public function index() {
        // on récupère tous les clubs et on les stocke dans $mesClubs
        $mesClubs = $this->Clubs->find()->toArray();

        $this->set(compact('mesClubs'));
    }

    public function detail($id = null) {
        try {
            $leClub = $this->Clubs->get($id);
        } catch (\Exception $ex) {
            if ($id === null) {
                $this->Flash->error(__("L'action detail doit être appelée avec un identifiant"));
            } else {
                $this->Flash->error(__("Le club {0} n'existe pas", $id));
            }
            return $this->redirect(['action' => 'index']);
        }

        $this->set(compact('leClub'));
    }

    public function add() {
        $leClub = $this->Clubs->newEmptyEntity();
        if ($this->request->is('post')) {
            $leClub = $this->Clubs->patchEntity($leClub, $this->request->getData());
            if ($this->Clubs->save($leClub)) {
                $this->Flash->success(__("Le club a été sauvegardé."));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__("Impossible d'ajouter le club."));
            }
        }
        $this->set(compact('leClub'));
    }

    public function edit($id = null) {
        try {
            $leClub = $this->Clubs->get($id);
        } catch (\Exception $ex) {
            if ($id === null) {
                $this->Flash->error(__("L'action edit doit être appelée avec un identifiant"));
            } else {
                $this->Flash->error(__("Le club {0} n'existe pas", $id));
            }
            return $this->redirect(['action' => 'index']);
        }

        if ($this->request->is(['post', 'put', 'patch'])) {
            $leClub = $this->Clubs->patchEntity($leClub, $this->request->getData());
            if ($this->Clubs->save($leClub)) {
                $this->Flash->success(__("Votre club a été mis à jour."));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__("Impossible de mettre à jour votre club."));
            }
        }

        $this->set(compact('leClub'));
    }

    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        try {
            $leClub = $this->Clubs->get($id);
        } catch (\Exception $ex) {
            $this->Flash->error(__("Le club n'existe pas."));
            return $this->redirect(['action' => 'index']);
        }

        if ($this->Clubs->delete($leClub)) {
            $this->Flash->success(__("Le club {0} d'id {1} a bien été supprimé !", $leClub->name, $leClub->id));
        } else {
            $this->Flash->error(__("Impossible de supprimer le club."));
        }
        return $this->redirect(['action' => 'index']);
    }
}