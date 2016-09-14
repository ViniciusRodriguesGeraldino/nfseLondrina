<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use BeSimple;
use BeSimple\SoapClient;
use Doctrine\ORM\Query\ResultSetMapping;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {

//        $valor = $this->get('app.token_authenticator')->start($request);
//        $valor2 = $this->get('app.token_authenticator')->getCredentials($request);

        $valor  = $this->getTotalNFesEmitidas();
        $valor2 = $this->getMovimentacaoSaidaDiaria();

        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..'),
            'valor' => $valor,
            'valor2' => $valor2,
        ]);
    }

    /**
     * @Route("/login", name="login")
     */
    public function loginAction(Request $request)
    {
        $user = $this->getUser();

        if ($user instanceof UserInterface) {
            return $this->redirectToRoute('homepage');
        }

        /** @var AuthenticationException $exception */
        $exception = $this->get('security.authentication_utils')
            ->getLastAuthenticationError();

        return $this->render('login/login.html.twig', [
            'error' => $exception ? $exception->getMessage() : NULL,
        ]);
    }

    public function getTotalNFesEmitidas(){

        $idEmp = $this->get('app.emp')->getIdEmpresa();

        $em = $this->getDoctrine()->getManager();

        $qb = $em->createQueryBuilder();

        $qb ->select('count(n.id)')
            ->from('AppBundle:Nota', 'n')
            ->where('n.empresa = :emp')
            ->andWhere('n.data = :dataHoje')
            ->setParameter('emp', $idEmp)
            ->setParameter('dataHoje', date('Y-m-d'));

        $result = $qb->getQuery()->getResult();

        return $result[0][1];
    }

    public function getMovimentacaoSaidaDiaria(){

    }
}
