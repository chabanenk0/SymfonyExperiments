<?php

namespace Tutorial\TotBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Tutorial\TotBundle\Entity\TourCategoryConn1;
use Tutorial\TotBundle\Form\TourCategoryConn1Type;

/**
 * TourCategoryConn1 controller.
 *
 */
class TourCategoryConn1Controller extends Controller
{

    /**
     * Lists all TourCategoryConn1 entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('TutorialTotBundle:TourCategoryConn1')->findAll();

        return $this->render('TutorialTotBundle:TourCategoryConn1:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new TourCategoryConn1 entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new TourCategoryConn1();
        $form = $this->createForm(new TourCategoryConn1Type(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('tourcategoryconn1_show', array('id' => $entity->getId())));
        }

        return $this->render('TutorialTotBundle:TourCategoryConn1:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to create a new TourCategoryConn1 entity.
     *
     */
    public function newAction()
    {
        $entity = new TourCategoryConn1();
        $form   = $this->createForm(new TourCategoryConn1Type(), $entity);

        return $this->render('TutorialTotBundle:TourCategoryConn1:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a TourCategoryConn1 entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TutorialTotBundle:TourCategoryConn1')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TourCategoryConn1 entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('TutorialTotBundle:TourCategoryConn1:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing TourCategoryConn1 entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TutorialTotBundle:TourCategoryConn1')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TourCategoryConn1 entity.');
        }

        $editForm = $this->createForm(new TourCategoryConn1Type(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('TutorialTotBundle:TourCategoryConn1:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing TourCategoryConn1 entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TutorialTotBundle:TourCategoryConn1')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TourCategoryConn1 entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new TourCategoryConn1Type(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('tourcategoryconn1_edit', array('id' => $id)));
        }

        return $this->render('TutorialTotBundle:TourCategoryConn1:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a TourCategoryConn1 entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('TutorialTotBundle:TourCategoryConn1')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find TourCategoryConn1 entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('tourcategoryconn1'));
    }

    /**
     * Creates a form to delete a TourCategoryConn1 entity by id.
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
