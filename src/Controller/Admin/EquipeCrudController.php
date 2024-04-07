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
            IntegerField::new('scores', 'Total Points')->onlyOnIndex(),   
            IntegerField::new('matches', 'Match joue')->onlyOnIndex(),
            IntegerField::new('matchesGagne', 'Match gagne')->onlyOnIndex(),
            IntegerField::new('matchesNul', 'Match nul')->onlyOnIndex(),
            IntegerField::new('matchesPerdu', 'Match perdu')->onlyOnIndex(),
           
        ];
    }
    
}
