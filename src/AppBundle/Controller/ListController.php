<?php
// src/AppBundle/Controller/ListController.php
namespace AppBundle\Controller;

use AppBundle\Entity\Details;
use AppBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Response;

class ListController extends Controller
{  
     /**	
     * @Route("/form/list")
     */
    public function listAction() 
	{
	$user = $this->getUser()->getId();
    $details = $this->getDoctrine()
        ->getRepository('AppBundle:Details')
        ->findByUser($user);

    if (!$details) {
        //throw $this->createNotFoundException(
            echo 'No info found in your address book ';
        //);
    }

     return  $this->render('AddressBook/list.html.twig', array(
            'details' =>$details,
        ));
	}

	/**	
     * @Route("/form/list/{id}")
     */
    public function detailAction($id)
	{ 


	$detail = $this->getDoctrine()
        ->getRepository('AppBundle:Details')
        ->find($id);
		
   return  $this->render('AddressBook/list_detail.html.twig',array(
            'detail' =>$detail,
			
        ));
	}
}