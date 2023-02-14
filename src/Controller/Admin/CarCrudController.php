<?php

namespace App\Controller\Admin;

use App\Entity\Car;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;

class CarCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Car::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('name'),     
            AssociationField::new('brand'),  
            TextField::new('model'),   
            BooleanField::new('isHeader'),       
            TextField::new('model'),                   
            ImageField::new('frontImage')
                ->setBasePath('build/images/')
                ->setUploadDir('assets/images/')
                ->setUploadedFileNamePattern('[randomhash].[extension]'),
            ImageField::new('leftSideImage')
                ->setBasePath('build/images/')
                ->setUploadDir('assets/images/')
                ->setUploadedFileNamePattern('[randomhash].[extension]'),
            ImageField::new('rightSideImage')
                ->setBasePath('build/images/')
                ->setUploadDir('assets/images/')
                ->setUploadedFileNamePattern('[randomhash].[extension]'),
            IntegerField::new('speed'),   
            NumberField::new('acceleration'),  
            IntegerField::new('autonomy'),
            NumberField::new('price'),
        ];
    }

}
