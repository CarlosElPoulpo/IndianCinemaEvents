<?php

namespace AppBundle\Admin;

use Ivory\CKEditorBundle\Form\Type\CKEditorType;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class PersonalityAdmin extends AbstractAdmin
{
    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('name')
            ->add('lastname')
            ->add('title')
            ->add('description')
            ->add('nationality')
            ->add('birthdate')
        ;
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('image', null, array("template"=> ":admin:list_image.html.twig"))
            ->add('name')
            ->add('lastname')
            ->add('nationality')
            ->add('birthdate')
            ->add('_action', null, array(
                'actions' => array(
                    'show' => array(),
                    'edit' => array(),
                    'delete' => array(),
                )
            ))
        ;
    }

    /**
     * @param FormMapper $formMapper
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('name')
            ->add('lastname')
            ->add('image', 'sonata_type_model_list', array(
                'required' => true,
                'btn_list' => false,
            ))
            ->add('title')
            ->add('description', CKEditorType::class, array())
            ->add('nationality')
            ->add('birthdate', 'sonata_type_date_picker', array('format' => 'dd-MM-yyyy'))
        ;
    }

    /**
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('name')
            ->add('lastname')
            ->add('title')
            ->add('description')
            ->add('nationality')
            ->add('birthdate')
        ;
    }
}
