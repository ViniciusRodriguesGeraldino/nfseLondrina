<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use BeSimple;

/**
 * WSLondrina controller.
 *
 * @Route("/WSLondrina")
 */
class WSLondrina extends Controller
{
    /**
     *
     * @Route("/WSLondrinaIndex", name="WSLondrina")
     *
     */
    public function indexAction(Request $request)
    {
    
        require_once '../../vendor/autoload.php';
     
        $wsdl = 'http://www.thomas-bayer.com/axis2/services/BLZService?wsdl';
        $soapClient = new \BeSimple\SoapClient\SoapClient($wsdl);
        $bank = new stdClass();
        $bank->blz = '20190003';
        
        
        return var_dump($soapClient->getBank($bank));
    }

}
