<?php

namespace NotationBundle\Controller;

use NotationBundle\Entity\Person;
use NotationBundle\Entity\Session;
use NotationBundle\Entity\Eleve;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use NotationBundle\Form\Type\SessionType;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     */
    public function indexAction()
    {
        return $this->render('NotationBundle:Default:index.html.twig');
    }

    /**
     * @Route("/personne/ajout", name="ajout_personne")
     */
    public function ajoutAction(Request $request)
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

    /**
     * @Route("/session/ajout", name="ajout_session")
     *
     *
     */
    public function ajoutSession()
    {
        $session = new Session();





        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($session);
            $em->flush();
            return $this->redirectToRoute('ajout_session');
        }

        $em = $this->getDoctrine()->getManager();
        $em2 = $this->getDoctrine()->getManager();
        $liste2 = $em->getRepository('NotationBundle:Session')->findAll();
        $liste4 = $em2->getRepository('NotationBundle:Eleve')->findAll();

        return $this->render(
            'NotationBundle:Default:ajoutsession.html.twig',
            array(
                'form' => $form->createView(),
                'liste2' => $liste2,
                'liste4' => $liste4,
            )
        );
    }

        /**
         *@Route("/session/{id}/detail", name="detail_session")
         *
         *@ParamConverter("session", class="NotationBundle:Session")
         */
    public function detailSessionAction(Request $request, Session $session)
    {
        $form2 = $this->createFormBuilder($session)
            ->add('enseignant', EntityType::class , array(
                'class' => 'NotationBundle:Person',
                'choice_label' => 'nom'))
            ->add('save', 'submit', array('label' => 'ajouter un prof'))
            ->getForm();
        
        $form2->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($session);
            $em->flush();
            return $this->redirectToRoute('ajout_session');
        }



        $em = $this->getDoctrine()->getManager();
        $liste2 = $em->getRepository('NotationBundle:Session')->findAll();

        return $this->render(
            'NotationBundle:Default:ajoutsession.html.twig',
            array(
                'form2' => $form2->createView(),
                'liste2' => $liste2,
            )
        );
    }



    /**
     * @Route("/eleve/ajout", name="ajout_eleve")
     *
     *
     */


    public function ajoutEleve(Request $request)
    {
        $eleve = new Eleve();

        $form = $this->createFormBuilder($eleve)
            ->add('nom', 'text')
            ->add('save', 'submit', array('label' =>'ajouter un eleve'))
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($eleve);
            $em->flush();
            return $this->redirectToRoute('ajout_eleve');
        }

        $em = $this->getDoctrine()->getManager();
        $liste = $em->getRepository('NotationBundle:Eleve')->findAll();

        return $this->render(
            'NotationBundle:Default:ajouteleve.html.twig',
            array(
                'form' => $form->createView(),
                'liste' => $liste,
            )
        );

    }





}