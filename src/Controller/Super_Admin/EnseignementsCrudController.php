<?php

namespace App\Controller\Super_Admin;

use App\Entity\Enseignements;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class EnseignementsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Enseignements::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
