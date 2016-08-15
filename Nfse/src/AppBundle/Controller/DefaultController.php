<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use BeSimple;
use BeSimple\SoapClient;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        //require_once 'C:\xampp2\htdocs\EmissorNFSE2\Nfse\vendor\autoload.php';
        
        $wsdl = 'http://www.thomas-bayer.com/axis2/services/BLZService?wsdl';
        $soapClient = new BeSimple\SoapClient\SoapClient($wsdl);
        $bank = new stdClass();
        $bank->blz = '20190003';
        
        
        var_dump($soapClient->getBank($bank));
        // replace this example code with whatever you need
       // return $this->render('default/index.html.twig', [
         //   'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..'),
       // ]);
    }
    
    /**
     * @Route("/classes", name="classes")
     */
    public function  getFunctions(){ //http://testeiss.londrina.pr.gov.br/ws/v1_03/sigiss_ws.php?wsdl

        require_once 'C:\xampp\htdocs\NFSE\nfseLondrina\Nfse\vendor\autoload.php';
//        require_once $this->get('kernel')->getRootDir().'\vendor\autoload.php';

        $wsdl = 'http://testeiss.londrina.pr.gov.br/ws/v1_03/sigiss_ws.php?wsdl';
        $soapClient = new \BeSimple\SoapClient\SoapClient($wsdl);

//        $soapClient->GerarNota

//        var_dump($soapClient->__getFunctions());
//        var_dump($soapClient->__getTypes());

        return $this->render('default/index.html.twig', [
           'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..'),
         ]);
    }
}
