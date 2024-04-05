<?php

namespace App\Controller\Admin;

use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class UserCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return User::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('nom', 'Nom'),
            TextField::new('prenom', 'Prénom'),
            TextField::new('ville', 'Ville'),
            EmailField::new('email', 'Email'),
            TextField::new('password', 'Mot de Passe') // Pense à gérer cela de manière sécurisée
                ->hideOnIndex(), // Cache le mot de passe dans l'index
            ArrayField::new('roles', 'Rôles'),
        ];
    }
    
}
