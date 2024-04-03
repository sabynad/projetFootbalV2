<?php

namespace App\Form;

use App\Entity\Equipe;
use App\Entity\Joueur;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class JoueurType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom')
            ->add('prenom')
            ->add('date_naissance', null, [
                'widget' => 'single_text',
            ])
            ->add('numero')
            ->add('poste')
            ->add('numero_licence')
            ->add('cartonJaune')
            ->add('cartonRouge')
            ->add('matchJoue')
            ->add('nbrPasse')
            ->add('nbrPasseDecisif')
            ->add('nbrTir')
            ->add('nbrBut')
            ->add('arretGardien')
            ->add('butEncaisser')
            ->add('penaltyDispute')
            ->add('penaltyArrete')
            ->add('equipe', EntityType::class, [
                'class' => Equipe::class,
                'choice_label' => 'nom',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Joueur::class,
        ]);
    }
}
