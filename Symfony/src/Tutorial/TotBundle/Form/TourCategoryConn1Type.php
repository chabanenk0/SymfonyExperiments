<?php

namespace Tutorial\TotBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class TourCategoryConn1Type extends AbstractType
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
            'data_class' => 'Tutorial\TotBundle\Entity\TourCategoryConn1'
        ));
    }

    public function getName()
    {
        return 'tutorial_totbundle_tourcategoryconn1type';
    }
}
