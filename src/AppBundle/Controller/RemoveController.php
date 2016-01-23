<?php
// src/AppBundle/Controller/RemoveController.php
namespace AppBundle\Controller;

use AppBundle\Entity\Details;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Response;

class RemoveController extends Controller{





	/**
     * @Route("/form/remove/{id}")
     * @Template()
     */
	public function updateAction($id ,Request $request)
	{
    $em = $this->getDoctrine()->getManager();
    $detail = $em->getRepository('AppBundle:Details')->find($id);
    $em->remove($detail);
	$em->flush();
	return new Response($this->render('AddressBook/forward.html.twig'));
		
     }	
		  
 
	}
 