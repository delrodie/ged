<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class DefinitiveType extends AbstractType
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
            ->add('etagere', TextType::class, array(
                'attr'  => array(
                    'class' => 'form-control',
                    'autocomplete'  => 'off'
                ),
                'required' => false
          ))
            ->add('position', TextType::class, array(
                'attr'  => array(
                    'class' => 'form-control',
                    'autocomplete'  => 'off'
                ),
                'required' => false
          ))
            ->add('extreme', TextType::class, array(
                'attr'  => array(
                    'class' => 'form-control',
                    'autocomplete'  => 'off'
                ),
                'required' => false
          ))
            ->add('vie', TextType::class, array(
                'attr'  => array(
                    'class' => 'form-control',
                    'autocomplete'  => 'off'
                )
          ))
            ->add('statut')
            //->add('publiePar')->add('modifiePar')->add('publieLe')->add('modifieLe')->add('tampon1')->add('tampon2')->add('tampon3')
            ->add('provisoire', null, array(
                    'attr'  => array(
                        'class' => 'form-control select-provisoire',
                        'autocomplete'  => 'off'
                    )
              ))
            ->add('sortfinal', null, array(
                    'attr'  => array(
                        'class' => 'form-control select-sortfinal',
                        'autocomplete'  => 'off'
                    )
              ))
            ->add('epi', null, array(
                    'attr'  => array(
                        'class' => 'form-control select-epi',
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
            'data_class' => 'AppBundle\Entity\Definitive'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_definitive';
    }


}
