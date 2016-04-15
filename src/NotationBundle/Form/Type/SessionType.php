<?php

// src/NotationBundle/Form/Type/SessionType.php
namespace NotationBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class SessionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('intitule', 'text')
            ->add('enseignant', EntityType::class , array(
                'class' => 'NotationBundle:Person',
                'choice_label' => 'nom'))
            ->add('eleve', EntityType::class, array(
                'class' => 'NotationBundle:Eleve',
                'choice_label' => 'nom',
                'expanded'  => true,
                'multiple'  => true))
            ->add('datedebut', 'date')
            ->add('datefin', 'date')
            ->add('save', SubmitType::class);
        );





    }


}