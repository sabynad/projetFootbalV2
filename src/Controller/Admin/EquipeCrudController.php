<?php

namespace App\Controller\Admin;

use App\Entity\Equipe;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class EquipeCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Equipe::class;
    }

    
    // public function configureFields(string $pageName): iterable
    // {
    //     return [
    //         IdField::new('id'),
    //         TextField::new('title'),
    //         TextEditorField::new('description'),
    //     ];
    // }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('nom'),
            TextField::new('categorie'),
            TextField::new('championnat'),
            // TextField::new('image_name'),
            // ImageField::new('image_name')->hideOnIndex(), 
            // ImageField::new('image_name')->hideOnForm(), 
            ImageField::new('image_name')->setLabel('Logo')->setBasePath('/images/logo')->onlyOnIndex(), // Afficher l'image dans la liste
        ];
    }
    
}
