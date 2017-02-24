<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class EpiType extends AbstractType
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
              ->add('description', TextareaType::class, array(
                  'attr'  => array(
                      'class' => 'form-control'
                  ),
                  'required' => false
            ))
              ->add('nbface', TextType::class, array(
                  'attr'  => array(
                      'class' => 'form-control',
                      'autocomplete'  => 'off'
                  ),
                  'required' => false
            ))
              ->add('nbrayon', TextType::class, array(
                  'attr'  => array(
                      'class' => 'form-control',
                      'autocomplete'  => 'off'
                  ),
                  'required' => false
            ))
              ->add('statut')
              //->add('publiePar')->add('modifiePar')->add('publieLe')
              ->add('rayonnage', null, array(
                  'attr'  => array(
                      'class' => 'form-control select-rayonnage',
                      'autocomplete'  => 'off'
                  )
            ))
              /*->add('tampon', TextType::class, array(
                  'attr'  => array(
                      'class' => 'form-control select-rayonnage',
                      'autocomplete'  => 'off'
                  )
            ))*/
              ;
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Epi'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_epi';
    }


}
