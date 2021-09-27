<?php

namespace App\Controller\Admin;

use App\Entity\Makeup;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class MakeupCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Makeup::class;
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
