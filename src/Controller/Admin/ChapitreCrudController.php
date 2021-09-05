<?php

namespace App\Controller\Admin;

use App\Entity\Chapitre;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;

class ChapitreCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Chapitre::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('nom'),
            TextField::new('description'),
            AssociationField::new('module'),

        ];
    }
    
}
