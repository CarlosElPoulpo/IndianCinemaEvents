<?php

namespace AppBundle\Admin;

use Ivory\CKEditorBundle\Form\Type\CKEditorType;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class EventAdmin extends AbstractAdmin
{
    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('title')
            ->add('subtitle')
            ->add('description')
            ->add('place')
            ->add('startdate')
            ->add('enddate')
            ->add('visible')
            ->add('slug')
        ;
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('image', null, array("template"=> ":admin:list_image.html.twig"))
            ->add('title')
            ->add('subtitle')
            ->add('place')
            ->add('startdate')
            ->add('enddate')
            ->add('visible',null, array('editable' => true, 'required' => 'true'))
            ->add('slug')
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
            ->add('image', 'sonata_type_model_list', array(
                'required' => true,
                'btn_list' => false,
            ))
            ->add('title')
            ->add('subtitle')
            ->add('description', CKEditorType::class)
            ->add('place')
            ->add('startdate', 'sonata_type_date_picker', array('format' => 'dd-MM-yyyy'))
            ->add('enddate', 'sonata_type_date_picker', array('format' => 'dd-MM-yyyy'))
            ->add('visible')
        ;
    }

    /**
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('title')
            ->add('subtitle')
            ->add('description')
            ->add('place')
            ->add('startdate')
            ->add('enddate')
            ->add('visible')
            ->add('slug')
        ;
    }
}
