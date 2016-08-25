<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;

class EmpresaType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nome')
            ->add('uf')
            ->add('fone')
            ->add('eMail')
            ->add('endereco')
            ->add('numero')
            ->add('complemento')
            ->add('bairro')
            ->add('cidade')
            ->add('cep')
            ->add('cpfcnpj')
            ->add('caminhoLogo')
            ->add('cmc')
            ->add('cnaePrefeitura')
            ->add('cpfPrefeitura')
            ->add('senhaPrefeitura')
            ->add('producao')
            ->add('simples')
            ->add('inicioAtividade', DateType::class)
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Empresa'
        ));
    }
}
