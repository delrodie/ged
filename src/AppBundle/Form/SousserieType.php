<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class SousserieType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('libelle', TextType::class, array(
                'attr'  => array(
                    'class' => 'form-control',
                    'autocomplete'  => 'off'
                )
          ))
            ->add('designation', TextareaType::class, array(
                'attr'  => array(
                    'class' => 'form-control'
                ),
                'required' => false
          ))
            ->add('statut')
            //->add('publiePar')->add('modifiePar')->add('publieLe')->add('modifieLe')
            /*->add('tampon', TextType::class, array(
                'attr'  => array(
                    'class' => 'form-control select-serie',
                    'autocomplete'  => 'off'
                )
          ))*/ 
            ->add('serie', null, array(
                'attr'  => array(
                    'class' => 'form-control select-serie',
                    'autocomplete'  => 'off'
                )
          ))
            ;
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Sousserie'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_sousserie';
    }


}
