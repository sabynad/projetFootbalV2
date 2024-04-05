<?php

namespace App\Controller\Admin;

use App\Entity\Joueur;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
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
            IdField::new('id'),
            TextField::new('nom'),
            TextField::new('prenom'),
            // TextField::new('date_naissance'),
            DateField::new('date_naissance', 'Date de Naissance'),
            IntegerField::new('numero'),
            IntegerField::new('poste'),
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
            
            // TextEditorField::new('description'),
        ];
    }
    
}
