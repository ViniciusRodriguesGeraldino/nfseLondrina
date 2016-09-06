<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class ServicoType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $lista = [];

        if (array_key_exists('listaServicos', $options) && $options['listaServicos'] != '') {
            $lista = $options['listaServicos'];
        }

        $builder
            ->add('descricao', TextType::class, array('label'  => 'Descrição' ))

           ->add('codSerPref',TextType::class, array('label'  => 'Cód. Prefeitura' ))

//            ->add("codSerPref", ChoiceType::class, array("label" => "Cód. Prefeitura",
//                "choices" => $lista, "attr" => array("class" => "form-control select2") ))

            ->add('valor', TextType::class, array('label'  => 'Valor' ))
            ->add('percIss', TextType::class, array('label'  => 'Aliquota ISS', 'required'    => false ))
            ->add('plano', TextType::class, array('label'  => 'Cód. Plano', 'required'    => false ))

            ->add('percIrrf', TextType::class, array('label'  => 'Aliq. IRRF', 'required'    => false ))
            ->add('percCsl', TextType::class, array('label'  => 'Aliq. CSL', 'required'    => false ))
            ->add('percPis', TextType::class, array('label'  => 'Aliq. PIS', 'required'    => false ))
            ->add('percCofins', TextType::class, array('label'  => 'Aliq. COFINS', 'required'    => false ))


//            ->add('issSuspenso')
//            ->add('issSuspensoMotivo')

//            ->add('ibptNac')
//            ->add('ibptMun')
        ;
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Servico',
//            'listaServicos' => '',
        ));
    }


}
