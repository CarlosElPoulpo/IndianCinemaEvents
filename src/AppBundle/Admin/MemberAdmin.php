<?php

namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class MemberAdmin extends AbstractAdmin
{
    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('name')
            ->add('lastname')
            ->add('jobtitle')
            ->add('description')
            ->add('slug')
            ->add('arrange')
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
            ->add('jobtitle')
            ->add('slug')
            ->add('arrange')
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
            ->add('jobtitle')
            ->add('description')
            ->add('image', 'sonata_type_model_list', array(
                'required' => true,
                'btn_list' => false,
            ))
            ->add('arrange')
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
            ->add('jobtitle')
            ->add('description')
            ->add('slug')
            ->add('image', null, array("template"=> ":admin:list_image.html.twig"))
            ->add('arrange')
        ;
    }
}
