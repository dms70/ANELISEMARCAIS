<?php

namespace App\Controller\Admin;

use App\Entity\Makeup;
use Vich\UploaderBundle\Form\Type\VichImageType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Validator\Constraints\DateTime;

class MakeupCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Makeup::class;
    }

  
    public function configureFields(string $pageName): iterable
    {
        return [
            #IdField::new('id'),
            TextField::new('title', null),
            TextareaField::new('description'),
            DateTimeField::new('datemakeup', null),
            DateTimeField::new('date')->hideOnForm(),
            TextField::new('makeupby'),
            BooleanField::new('portfolio'),
            TextField::new('imageFile', null)->setFormType(VichImageType::class)->OnlyWhenCreating(),
            ImageField::new('file', null)->setBasePath('/uploads/makeups')->OnlyOnIndex(),
            ArrayField::new('makeupused'),
            ArrayField::new('keywords'),
            SlugField::new('slug')->setTargetFieldName('title')->hideOnIndex(),
            

    }
 
    public function configureCrud(Crud $crud): Crud
    {
    return $crud
    ->setDefaultSort(['datemakeup' => 'DESC']);
   
    }


}
