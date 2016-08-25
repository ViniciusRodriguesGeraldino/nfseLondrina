<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;

class ClienteType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('empresa')
            ->add('nome')
            ->add('endereco')
            ->add('numero')
            ->add('bairro')
            ->add('complemento')
            ->add('cidade')
            ->add('codCid')
            ->add('uf')
            ->add('cep')
            ->add('fone')
            ->add('cpfcnpj')
            ->add('rg')
            ->add('eMail')
            ->add('celular')
            ->add('dataNasc', DateType::class)
            ->add('estadoCivil')
            ->add('nomeConjuge')
            ->add('profissao')
            ->add('data', DateType::class)
            ->add('sexo')
            ->add('raca')
            ->add('naturalidade')
            ->add('obs')
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Cliente'
        ));
    }
}
