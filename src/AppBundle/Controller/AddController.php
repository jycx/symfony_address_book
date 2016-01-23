<?php
// src/AppBundle/Controller/AddController.php
namespace AppBundle\Controller;

use AppBundle\Entity\Details;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Response;

class AddController extends Controller
{  


/**
     * @Route("/form/add")
     * @Template()
     */
    public function newAction(Request $request)
    {
        // create a task and give it some dummy data for this example
        $details = new Details();
        $details->setName('');
        $details->setEmail('');
		$details->setAddress('');
        $details->setPhone('');
        $details->setWebsite('');
 
 
        $form = $this->createFormBuilder($details)
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
			$em->persist($details);
			$em->flush();
		    //echo new Response($this->render('blog/forward.html.twig'));
		
        }	
		 return $this->render('AddressBook/add.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}
	