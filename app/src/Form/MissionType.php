<?php

namespace App\Form;

use App\Entity\Mission;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MissionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom')
            ->add('destination')
            ->add('objectif')
            ->add('dureeJours')
            ->add('equipage')
            ->add('status')
            ->add('roleMission', ChoiceType::class, [
                'label' => 'Votre rôle dans la mission',
                'placeholder' => 'Choisissez votre rôle',
                'choices' => [
                    'Capitaine' => 'capitaine',
                    'Ingénieur' => 'ingenieur',
                    'Scientifique' => 'scientifique',
                    'Pilote' => 'pilote',
                    'Médecin' => 'medecin',
                ],
            ])
            ->add('nombreRecrues', null, [
                'label' => 'Nombre de recrues recherchées',
                'required' => false,
            ])
            ->add('description')
            ->add('typeMission')
            ->add('dateLancementPrevue', null, [
                'widget' => 'single_text'
            ])
           
            
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Mission::class,
        ]);
    }
}
