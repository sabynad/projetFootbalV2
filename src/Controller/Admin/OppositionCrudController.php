<?php

namespace App\Controller\Admin;

use App\Entity\Opposition;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class OppositionCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Opposition::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IntegerField::new('id'),
            DateField::new('date'),
            ImageField::new('equipe1.image_name', 'Logo Equipe 1')->setBasePath('/images/logo')->onlyOnIndex(),
            TextField::new('equipe1.nom'),
            ImageField::new('equipe2.image_name', 'Logo Equipe 2')->setBasePath('/images/logo')->onlyOnIndex(),
            TextField::new('equipe2.nom'),
            IntegerField::new('scoreEquipe1'),
            IntegerField::new('scoreEquipe2'),
            // TextEditorField::new('description'),
        ];
    }
    
}
