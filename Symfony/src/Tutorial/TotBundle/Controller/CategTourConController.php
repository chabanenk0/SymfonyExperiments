<?php

namespace Tutorial\TotBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Tutorial\TotBundle\Entity\CategTourCon;
use Tutorial\TotBundle\Form\CategTourConType;

/**
 * CategTourCon controller.
 *
 */
class CategTourConController extends Controller
{

    /**
     * Lists all CategTourCon entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('TutorialTotBundle:CategTourCon')->findAll();

        return $this->render('TutorialTotBundle:CategTourCon:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new CategTourCon entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new CategTourCon();
        $form = $this->createForm(new CategTourConType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('categtourcon_show', array('id' => $entity->getId())));
        }

        return $this->render('TutorialTotBundle:CategTourCon:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to create a new CategTourCon entity.
     *
     */
    public function newAction()
    {
        $entity = new CategTourCon();
        $form   = $this->createForm(new CategTourConType(), $entity);

        return $this->render('TutorialTotBundle:CategTourCon:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a CategTourCon entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TutorialTotBundle:CategTourCon')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find CategTourCon entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('TutorialTotBundle:CategTourCon:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing CategTourCon entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TutorialTotBundle:CategTourCon')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find CategTourCon entity.');
        }

        $editForm = $this->createForm(new CategTourConType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('TutorialTotBundle:CategTourCon:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing CategTourCon entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TutorialTotBundle:CategTourCon')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find CategTourCon entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new CategTourConType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('categtourcon_edit', array('id' => $id)));
        }

        return $this->render('TutorialTotBundle:CategTourCon:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a CategTourCon entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('TutorialTotBundle:CategTourCon')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find CategTourCon entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('categtourcon'));
    }

    /**
     * Creates a form to delete a CategTourCon entity by id.
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
