<?php
	namespace App\Controller;

	//Librerias
	use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
	use Symfony\Component\Routing\Annotation\Route;
	use Symfony\Component\HttpFoundation\Response;
	use Symfony\Component\HttpFoundation\Request;

	//Entidades
	use App\Entity\Docente;
	use App\Entity\Busqueda;
	use App\Entity\Plaza;

	//Tipos de datos
	use Symfony\Component\Form\Extension\Core\Type\TextType;
	use Symfony\Component\Form\Extension\Core\Type\SubmitType;

	class SicdoController extends AbstractController {
		
		/**
	 	 *
	 	 * @Route("/", name="inicio")
		*/
		public function default(Request $request) {
			$docente = new Docente();
        	
        	//creación del form
        	$form = $this->createFormBuilder($docente)
            	->add('curp', TextType::class, [
            		'label' => 'Introduce la CURP',
            		'attr' => [
            			'class' => 'form-control',
            			'maxlength' => 18,
            			'minlength' => 18]])
            	->add('save', SubmitType::class, [
            		'label' => 'Consultar',
            		'attr' => [
            			'class' => 'btn btn-primary'
            		]])
            	->getForm();

            $form->handleRequest($request);

    		if ($form->isSubmitted() && $form->isValid()) {
        		// $form->getData() holds the submitted values
        		// but, the original `$task` variable has also been updated
        		$docente = $form->getData();

        		// ... perform some action, such as saving the task to the database
        		// for example, if Task is a Doctrine entity, save it!
        		// $entityManager = $this->getDoctrine()->getManager();
        		// $entityManager->persist($task);
        		// $entityManager->flush();

        		return $this->redirectToRoute('consulta_curp', array(
        			'curp' => $docente->getCurp()
        		));
    		}

			return $this->render('default.html.twig', [
            	'form' => $form->createView()
        	]);
		}

		/**
		 *
		 * @Route("/{curp}", name="consulta_curp", methods={"GET"})
		*/
		public function consultaCurp(string $curp) {
			$consulta = $this->getDoctrine()
    			->getRepository(Busqueda::class)
    			->findByCurp($curp);
    		$plaza = $this->getDoctrine()
    			->getRepository(Plaza::class)
    			->findByCurp($curp);
			return $this->render('consulta.html.twig', array(
				'curp' => $curp,
				'consulta' => $consulta,
				'plaza' => $plaza
			));
		}
	}