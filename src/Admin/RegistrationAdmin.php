<?php

namespace App\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;


class RegistrationAdmin extends AbstractAdmin
{

     protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('firstname', TextType::class)
             ->add('firstname', TextType::class)
            ->add('lastname', TextType::class)
            ->add('email', EmailType::class)
            ->add('phone', TelType::class)
            ->add('address', TextType::class)
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
             ->add('firstname')
            ->add('lastname')
            ->add('email')
            ->add('phone')
            ->add('address')
            ->add('registeredAt')

        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {

        $listMapper
            ->add('firstname')
            ->add('lastname')
            ->add('email')
            ->add('phone')
            ->add('address')
            ->add('registeredAt')
        ;
    }

}