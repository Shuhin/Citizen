<?php

namespace App\Controller;
use App\Controller\AppController;
use Cake\View\Helper\SessionHelper;
use Stevenmaguire;
use Jumbojett\OpenIDConnectClient;

class SecretController extends AppController
{
    public function index()
    {   
        $oidc = new OpenIDConnectClient('http://10.0.0.110:8080/auth/realms/ISDP',
        'cakephpcitizensso',
        'b6f66498-ed5b-4dca-bbe0-c39219d27e70');
        $oidc->setCertPath('http://10.0.0.110:8080/auth/realms/ISDP/protocol/openid-connect/certs');
        $oidc->setRedirectUrl('http://10.0.0.248:8765/Secret');
        
        $oidc->setResponseTypes(['id_token']);
        $oidc->addAuthParam(['response_mode' => 'form_post']);
        $oidc->setAllowImplicitFlow(true);
        //previous
       //$oidc->addScope(['citizen','openid']);
        $oidc->authenticate();
        
        $claims= $oidc->getVerifiedClaims();
        debug( $claims);
        $this->set('demo_data',json_encode($claims->sub));
        $this -> render('index');
        }  
}
?>