<?php

namespace App\Admin;

use App\Entity\Season;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

final class EpisodeAdmin extends AbstractAdmin
{
    public function toString($object)
    {
        return $object instanceof Season
            ? $object->getName()
            : 'Season';
    }

    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->with('Data')
                ->add('name', TextType::class)
                ->add('duration', NumberType::class)
                ->add('producer', TextType::class)
                ->add('distributor', TextType::class)
                ->add('season', EntityType::class, [
                    'class' => Season::class,
                    'choice_label' => 'name'
                ])
            ->end()
            ->with('Upload data')
                ->add('imageFile', FileType::class)
            ->end();
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('name')
            ->add('duration')
            ->add('producer')
            ->add('distributor')
            ->add('season', null, [], EntityType::class, [
                'class' => Season::class,
                'choice_label' => 'name',
            ]);
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('name')
            ->add('duration')
            ->add('producer')
            ->add('distributor')
            ->add('season.name')
            ->add('imageFile', null, array('template' => '@app/resource/Views/admin/list_image.html.twig'));
    }
}