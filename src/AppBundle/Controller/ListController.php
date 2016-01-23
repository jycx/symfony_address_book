<?php
// src/AppBundle/Controller/ListController.php
namespace AppBundle\Controller;

use AppBundle\Entity\Details;
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
    $details = $this->getDoctrine()
        ->getRepository('AppBundle:Details')
        ->findAll();

    if (!$details) {
        throw $this->createNotFoundException(
            'No product found'
        );
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