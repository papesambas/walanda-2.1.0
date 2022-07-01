<?php

namespace App\Controller\Super_Admin;

use App\Entity\Etablissements;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class EtablissementsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Etablissements::class;
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
