<?php

namespace App\Controller\Admin;

use App\Entity\Tp;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class TpCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Tp::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('name'),
            ImageField::new('tpFile')->setUploadDir("/public/assets/images")
                                    ->setBasePath("/public/assets/images"),
            ImageField::new('correction')->setUploadDir("/public/assets/images")
                                         ->setBasePath("/public/assets/images"),
            AssociationField::new('chapitre'),
        ];
    }
    
}
