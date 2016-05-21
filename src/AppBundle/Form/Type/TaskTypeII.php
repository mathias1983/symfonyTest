<?php
/**
 * Created by PhpStorm.
 * User: mathias
 * Date: 5/20/16
 * Time: 10:56 AM
 */

namespace AppBundle\Form\Type;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class TaskTypeII extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
      

        $builder
            ->add('task')
            ->add('dueDate', null, array('widget' => 'single_text'))
            ->add('category', CategoryType::class)
            ->add('save', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Task',
        ));
    }
}