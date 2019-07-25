<?php

namespace App\Controller;
use App\Controller\AppController;
use Cake\View\Helper\SessionHelper;
use Stevenmaguire;
use Jumbojett\OpenIDConnectClient;

class PrivateController extends AppController
{
    public function index()
    {   
        $oidc = new OpenIDConnectClient('http://10.0.0.247:8080/auth/realms/CITIZENSSO',
        'citizensso-client',
        '1441552b-4b95-4b3b-aab7-a6437e61d7c9');
        $oidc->setCertPath('http://10.0.0.247:8080/auth/realms/CITIZENSSO/protocol/openid-connect/certs');
        $oidc->setRedirectUrl('http://localhost:8765/private');
        
        $oidc->setResponseTypes(['id_token']);
        $oidc->addAuthParam(['response_mode' => 'form_post']);
        $oidc->setAllowImplicitFlow(true);
        //previous
        $oidc->addScope(['citizen','openid']);
        $oidc->authenticate();
        
        $claims= $oidc->getVerifiedClaims();
        debug( $claims);
        $this->set('demo_data',json_encode(['demo'=>'data']));
        $this -> render('index');
        }
        
    public function view($name = null)
    {
        $citizen = $this->Private->findByName($name)->firstOrFail();
        $this->set(compact('BEHOLD'));
    }
}
?>