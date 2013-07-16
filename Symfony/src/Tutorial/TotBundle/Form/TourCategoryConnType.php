<?php

namespace Tutorial\TotBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class TourCategoryConnType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('tour')
            ->add('category')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Tutorial\TotBundle\Entity\TourCategoryConn'
        ));
    }

    public function getName()
    {
        return 'tutorial_totbundle_tourcategoryconntype';
    }
}
