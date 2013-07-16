<?php

namespace Tutorial\TotBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ORM;

class TourType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
		 $builder
            ->add('name')
            //->add('city','choice',array('choices' => $options1))
			->add('city','entity',array('class'=>'TutorialTotBundle:City','property'=>'name'))//,
			//'data_class' => 'TutorialTotBundle:City',
			//'data' => 'id',
			//'property'=>'name'))
            //->add('category','choice',array('choices' => $options2));
			->add('category','entity',array('class' => 'TutorialTotBundle:Category','property'=>'name','multiple'=>'true'));
        
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Tutorial\TotBundle\Entity\Tour'
        ));
    }

    public function getName()
    {
        return 'tutorial_totbundle_tourtype';
    }
}
