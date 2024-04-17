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
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;

class OppositionCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Opposition::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            IntegerField::new('id')
                ->hideOnForm(),
            DateField::new('date')
                // ->setFormat('d-MM-Y')
                ,
            ImageField::new('equipe1.image_name', 'Logo Equipe 1')->setBasePath('/images/logo')->onlyOnIndex(),
            AssociationField::new('equipe1', 'Équipe 1')->setSortProperty('nom'),
            ImageField::new('equipe2.image_name', 'Logo Equipe 2')->setBasePath('/images/logo')->onlyOnIndex(),
            AssociationField::new('equipe2', 'Équipe 2')->setSortProperty('nom'),
            IntegerField::new('scoreEquipe1'),
            IntegerField::new('scoreEquipe2'),
        ];
    }

    
    
}
