<?php

namespace App\Controller\Admin;

use App\Entity\Equipe;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;


class EquipeCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Equipe::class;
    }

    

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            ImageField::new('image_name')->setLabel('Logo')->setBasePath('/images/logo')
                ->setUploadDir('/public/images/logo')->setRequired(false)
                ->setUploadedFileNamePattern('[randomhash].[extension]'),
            TextField::new('nom'),
            TextField::new('categorie'),
            TextField::new('championnat'),
            IntegerField::new('totalPoints', 'Total des Points')->onlyOnIndex(),
            IntegerField::new('nbrMatchEquipe', 'Nombre de match')->onlyOnIndex(),
            IntegerField::new('nbrMatchGagne', 'Nombre de match gagne')->onlyOnIndex(),
            IntegerField::new('nbrMatchNul', 'Nombre de match nul')->onlyOnIndex(),
            IntegerField::new('nbrMatchPerdu', 'Nombre de match perdu')->onlyOnIndex(),
    
            
        ];
    }
    
}
