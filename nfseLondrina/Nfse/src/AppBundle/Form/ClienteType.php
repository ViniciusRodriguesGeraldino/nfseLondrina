<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class ClienteType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('cpfcnpj', TextType::class, array('label'  => 'Cpf/Cnpj' ))

            ->add('nome', TextType::class,
                array('label'       => 'Nome'//,
                ))

            ->add('cep', TextType::class,
                array('label'       => 'Cep',
                ))

            ->add('endereco', TextType::class, array('label'  => 'Endereço' ))
            ->add('numero', TextType::class, array('label'  => 'N°' ))
            ->add('bairro', TextType::class, array('label'  => 'Bairro' ))
            ->add('complemento', TextType::class, array('label'  => 'Complemento', 'required'    => false) )
            ->add('cidade', TextType::class, array('label'  => 'Municipio' ))
            ->add('codCid', TextType::class, array('label'  => 'Código Municipio') )
            ->add('uf', TextType::class, array('label'  => 'UF' ))

            ->add('fone', TextType::class, array('label'  => 'Telefone' ))
            ->add('rg', TextType::class, array('label'  => 'RG', 'required'    => false) )
            ->add('eMail', EmailType::class, array('label'  => 'Email' ))
            ->add('celular', TextType::class, array('label'  => 'Celular', 'required'    => false) )

            ->add('dataNasc', DateType::class, array(
                'widget' => 'single_text',
                'format' => 'yyyy-MM-dd',
            ))

            ->add('sexo', ChoiceType::class, array('choices'  => array( '' => null, 'Masculino' => 'M', 'Feminino' => 'F')))
            ->add('obs', TextType::class, array('label'  => 'Obs', 'required'    => false) )
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

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'attr' => array(
                'class' => 'form-control'
            ),
        ));
    }
}
