<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ServicoType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('descricao')
            ->add('percIrrf')
            ->add('percCsl')
            ->add('percPis')
            ->add('percCofins')
            ->add('percIss')
            ->add('plano')
            ->add('issSuspenso')
            ->add('issSuspensoMotivo')
            ->add('codSerPref')
            ->add('valor')
            ->add('ibptNac')
            ->add('ibptMun')
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Servico'
        ));
    }
}
