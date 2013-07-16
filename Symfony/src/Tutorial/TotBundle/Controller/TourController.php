<?php

namespace Tutorial\TotBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Tutorial\TotBundle\Entity\Tour;
use Tutorial\TotBundle\Entity\TourCategoryConn1;
use Tutorial\TotBundle\Form\TourType;

/**
 * Tour controller.
 *
 */
class TourController extends Controller
{

    /**
     * Lists all Tour entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('TutorialTotBundle:Tour')->findAll();
		$alltoursarray=array();
        foreach ($entities as $entity)
		{
			$entityCity = $em->getRepository('TutorialTotBundle:City')->find($entity->getCity());
			//echo "entityCity =";
			//print_r($entityCity);
			//echo "<p> , city.id=".$entity->getCity();
			//print_r($entityCity);
			//echo "<p>";
			$cityId=$entityCity->getId();
			$entityCategories = $em->getRepository('TutorialTotBundle:TourCategoryConn1')->findByTour($entity->getId());
			$toursarray=array();
			foreach($entityCategories as $entCat)
			 {
				$entityCatName = $em->getRepository('TutorialTotBundle:Category')->find($entCat->getCategory());
			    
				$toursarray[$entCat->getId()]=$entityCatName->getName();
			 }
			 $alltoursarray[$entity->getName()]=array('city'=>$entityCity->getName(),'tours'=>$toursarray);
		 }
		 print_r($alltoursarray);
			
        return $this->render('TutorialTotBundle:City:index.html.twig', array(
            'entities' => $alltoursarray));




        //return $this->render('TutorialTotBundle:Tour:index.html.twig', array(
          //  'entities' => $entities
		  //));
    }
    /**
     * Creates a new Tour entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new Tour();
        $form = $this->createForm(new TourType(), $entity);
        $form->bind($request);
					echo "Before valid";
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
			//echo "debugBeforePersist. ";
            $em->persist($entity);

			//echo "debugBeforeFlush. city=";
			$entity->setCity($entity->getCity()->getId());
			$categories_collection=$entity->getCategory();
			$entity->setCategory(0);//($entity->getCategory())->getId());
			$em->flush();
			echo "debugAfterFlush. city=";

			$newtourId=$entity->getId();
			echo "new number is ";
			print_r($newtourId);
			echo "CategoryCollection is ";
			print_r($categories_collection);

			foreach ($categories_collection as $i)
			 {
			 $newtourcategconnection=new TourCategoryConn1();
			 $newtourcategconnection->setTour($newtourId);
			 $newtourcategconnection->setCategory($i->getId());
			 //$em
			 $em->persist($newtourcategconnection);
			 $em->flush();
			 }
			print_r($entity->getCategory());
			
            
			//echo "debugValidFlush";
            return $this->redirect($this->generateUrl('tour_show', array('id' => $entity->getId())));
        }
        return $this->render('TutorialTotBundle:Tour:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to create a new Tour entity.
     *
     */
    public function newAction()
    {
        $entity = new Tour();
        $form   = $this->createForm(new TourType(), $entity);

        return $this->render('TutorialTotBundle:Tour:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Tour entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TutorialTotBundle:Tour')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tour entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('TutorialTotBundle:Tour:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Tour entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TutorialTotBundle:Tour')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tour entity.');
        }

        $editForm = $this->createForm(new TourType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('TutorialTotBundle:Tour:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Tour entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TutorialTotBundle:Tour')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tour entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new TourType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('tour_edit', array('id' => $id)));
        }

        return $this->render('TutorialTotBundle:Tour:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Tour entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('TutorialTotBundle:Tour')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Tour entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('tour'));
    }

    /**
     * Creates a form to delete a Tour entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
