<?php

namespace App\Admin;

use App\Entity\Serial;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

final class SeasonAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper->add('name', TextType::class);
        $formMapper->add('description', TextareaType::class);
        $formMapper->add('startDate', DateTimeType::class);
        $formMapper->add('endDate', DateTimeType::class);
        $formMapper->add('serial', EntityType::class, [
            'class' => Serial::class,
            'choice_label' => 'name',
        ]);
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('name');
        $datagridMapper->add('description');
        $datagridMapper->add('startDate');
        $datagridMapper->add('endDate');
        $datagridMapper->add('serial', null, [], EntityType::class, [
            'class' => Serial::class,
            'choice_label' => 'name',
        ]);
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->addIdentifier('name');
        $listMapper->add('description');
        $listMapper->add('startDate');
        $listMapper->add('endDate');
        $listMapper->add('serial.name');
    }
}