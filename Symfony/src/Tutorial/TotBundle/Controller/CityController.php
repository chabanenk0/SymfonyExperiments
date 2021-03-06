<?php

namespace Tutorial\TotBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Tutorial\TotBundle\Entity\City;
use Tutorial\TotBundle\Form\CityType;
//use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

/**
 * City controller.
 *
 */
class CityController extends Controller
{

    /**
     * Lists all City entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('TutorialTotBundle:City')->findAll();
		//$entries_res=$entities->getResult();
		$alltoursarray=array();
        foreach ($entities as $entity)
		{
		$query = $em->createQuery('SELECT p FROM TutorialTotBundle:CategTourCon p WHERE p.city =:cityid')->setParameter('cityid', $entity->getId());
        $tourscities = $query->getResult();
		$toursarray=array();
		if (count($tourscities)>0){
		foreach ($tourscities as $needcities)
         {$needtour = $em->getRepository('TutorialTotBundle:Tour')->find($needcities->getCity());
		  $toursarray[ $needtour->getId()]= $needtour->getName();
		 }
		 }
		 $entity->setTours($toursarray);
		 $alltoursarray[$entity->getName()]=$toursarray;
		}
			
        return $this->render('TutorialTotBundle:City:index.html.twig', array(
            'entities' => $alltoursarray));
    }
    /**
     * Creates a new City entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new City();
        $form = $this->createForm(new CityType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('city_show', array('id' => $entity->getId())));
        }

        return $this->render('TutorialTotBundle:City:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to create a new City entity.
     *
     */
    public function newAction()
    {
        $entity = new City();
        $form   = $this->createForm(new CityType(), $entity);

        return $this->render('TutorialTotBundle:City:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a City entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TutorialTotBundle:City')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find City entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('TutorialTotBundle:City:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing City entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TutorialTotBundle:City')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find City entity.');
        }

        $editForm = $this->createForm(new CityType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('TutorialTotBundle:City:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing City entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TutorialTotBundle:City')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find City entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new CityType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('city_edit', array('id' => $id)));
        }

        return $this->render('TutorialTotBundle:City:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a City entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('TutorialTotBundle:City')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find City entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('city'));
    }

    /**
     * Creates a form to delete a City entity by id.
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
