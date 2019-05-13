<?php

namespace Plugin\Magcube\Form\Type\Admin;

use Plugin\Magcube\Entity\Config;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class MagentoSearch extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('sku', TextType::class, [
            'constraints' => [
                new NotBlank(),
                new Length(['max' => 6]),
            ],
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        // $resolver->setDefaults([
        //     'data_class' => Config::class,
        // ]);
    }
}
