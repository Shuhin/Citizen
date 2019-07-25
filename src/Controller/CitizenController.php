<?php

namespace App\Controller;
use App\Controller\AppController;
use Cake\View\Helper\SessionHelper;
use Stevenmaguire;
use Jumbojett\OpenIDConnectClient;

class CitizenController extends AppController
{
    public function index()
    {  
        $this->loadComponent('Paginator');
        $citizen = $this->Paginator->paginate($this->Citizen->find());
        $this->set(compact('citizen'));
    }
    public function view($name = null)
    {
        $citizen = $this->Citizen->findByName($name)->firstOrFail();
        $this->set(compact('citizen'));
    }
}