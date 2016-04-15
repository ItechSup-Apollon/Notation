<?php
/**
 * Created by PhpStorm.
 * User: mgulcu
 * Date: 15/04/2016
 * Time: 15:44
 */

namespace NotationBundle\Form\Type;


class AjoutPersonneType
{
    public function buildForm(Request $request)
    {
        $personne = new Person();

        $form = $this->createFormBuilder($personne)
            ->add('nom', 'text')
            ->add('prenom', 'text')
            ->add('save', 'submit', array('label' =>'ajouter une personne'))
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($personne);
            $em->flush();
            return $this->redirectToRoute('ajout_personne');
        }

        $em = $this->getDoctrine()->getManager();
        $liste = $em->getRepository('NotationBundle:Person')->findAll();

        return $this->render(
            'NotationBundle:Default:ajout.html.twig',
            array(
                'form' => $form->createView(),
                'liste' => $liste,
            )
        );

    }
}