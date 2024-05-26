<?php

namespace App\Controller\Admin;

use App\Entity\Joueur;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class JoueurCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Joueur::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')
                ->hideOnForm(),
    
            TextField::new('nom'),
            TextField::new('prenom'),
            DateField::new('date_naissance', 'Date de Naissance'),
            IntegerField::new('numero'),
            // TextField::new('poste'),
            ChoiceField::new('poste')
            ->setChoices([
                'Attaquant' => 'Attaquant',
                'Milieu de terrain' => 'Milieu de terrain',
                'Défenseur' => 'Défenseur',
                'Gardien de but' => 'Gardien de but',
            ]),
            IntegerField::new('carton_jaune'),
            IntegerField::new('carton_rouge'),
            IntegerField::new('match_joue'),
            IntegerField::new('nbr_passe'),
            IntegerField::new('nbr_passe_decisif'),
            IntegerField::new('nbr_tir'),
            IntegerField::new('nbr_but'),
            IntegerField::new('arret_gardien'),
            IntegerField::new('but_encaisser'),
            IntegerField::new('penalty_dispute'),
            IntegerField::new('penalty_arrete'),
            AssociationField::new('equipe')
            ->setLabel('Équipe')
            ->setRequired(true)
            ->autocomplete(),

            ImageField::new('joueurImageName') // Doit correspondre à la propriété de l'entité
            ->setLabel('photo')
            ->setBasePath('/images/logo') // Chemin pour accéder aux images dans l'interface
            ->setUploadDir('public/images/logo') // Répertoire de téléchargement des images
            ->setRequired(false)
            ->setUploadedFileNamePattern('[randomhash].[extension]')
            ->setFormTypeOptions(['required' => false]),

            
            // TextEditorField::new('description'),
        ];
    }
    
}
