<?php
namespace Shelf\Controller;

use Shelf\Controller\AppController;

/**
 * Log Controller
 *
 * @property \Shelf\Model\Table\ShelfLogRegistroTable $ShelfLogRegistro
 *
 * @method \Shelf\Model\Entity\ShelfLogRegistro[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class LogController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->loadModel('Shelf.ShelfLogRegistro');
        $logs = $this->paginate($this->ShelfLogRegistro);

        $this->set(compact('logs'));
    }

    /**
     * View method
     *
     * @param string|null $id ShelfLog id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->loadModel('Shelf.ShelfLogRegistro');
        $log = $this->ShelfLogRegistro->get($id, [
            'contain' => ['ShelfLogDetalhe']
        ]);

        $this->set('log', $log);
    }
}