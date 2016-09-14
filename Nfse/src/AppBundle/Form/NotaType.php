<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;

class NotaType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('empresa')
            ->add('numeroNota')
            ->add('cliente')
            ->add('data', DateType::class)
            ->add('mes')
            ->add('ano')
            ->add('cancelada')
            ->add('motivo')
            ->add('percPis')
            ->add('pis')
            ->add('csl')
            ->add('cofins')
            ->add('inss')
            ->add('iss')
            ->add('issRetido')
            ->add('baseIss')
            ->add('desconto')
            ->add('total')
            ->add('irrf')
            ->add('idFaturamento')
            ->add('totalBruto')
            ->add('tipoNota')
            ->add('irrfOrig')
            ->add('pisOrig')
            ->add('cslOrig')
            ->add('cofinsOrig')
            ->add('inssOrig')
            ->add('issOrig')
            ->add('issRetidoOrig')
            ->add('numeroNotaSubstitutiva')
            ->add('autenticidade')
            ->add('linkimpressao')
            ->add('autenticidadeCancelamento')
            ->add('linkimpressaoCancelamento')
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Nota'
        ));
    }
}
