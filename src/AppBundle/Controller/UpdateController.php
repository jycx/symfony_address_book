<?php
// src/AppBundle/Controller/UpdateController.php
namespace AppBundle\Controller;

use AppBundle\Entity\Details;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Response;

class UpdateController extends Controller{





	/**
     * @Route("/form/update/{id}")
     * @Template()
     */
	public function updateAction($id ,Request $request)
	{
    $em = $this->getDoctrine()->getManager();
    $detail = $em->getRepository('AppBundle:Details')->find($id);
	
        $form = $this->createFormBuilder($detail)
            ->add('name', 'text', array('attr' => array('size'=> '55','style' => 'height:50')))
			->add('email', 'text', array('attr' => array('size'=> '55','style' => 'height:50')))
			->add('address', 'text', array('attr' => array('size'=> '55','style' => 'height:50')))
			->add('phone', 'text', array('attr' => array('size'=> '55','style' => 'height:50')))
			->add('website', 'text', array('attr' => array('size'=> '55','style' => 'height:50')))
            ->add('save', 'submit', array('label' => 'Add to address book'))
            ->getForm();

      
	  
		$form->handleRequest($request);
		 
		if ($form->isValid()) {
		
			$em = $this->getDoctrine()->getManager();
			$em->persist($detail);
			$em->flush();
		    return new Response($this->render('AddressBook/forward.html.twig'));
		
        }	
		 return $this->render('AddressBook/add.html.twig', array(
            'form' => $form->createView(),
        ));
    

    $em->flush();

    return new Response($this->render('AddressBook/forward.html.twig'));
	}
}