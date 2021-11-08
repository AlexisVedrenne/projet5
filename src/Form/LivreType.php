<?php

namespace App\Form;

use App\Entity\Livre;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use App\Entity\Categorie;
use App\Entity\Theme;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Validator\Constraints\Length;

class LivreType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('libelle',TextType::class,[
                'label'=>'Titre du livre',
                'help'=>'Le titre à 30 caractères',
                'constraints'=>[
                    new Length([
                        "max"=>30,
                        "maxMessage"=>"Le titre ne peut pas avoir plus de 30 caractère"
                    ])
                ]
            ])
            ->add('prix',NumberType::class)
            ->add('auteur',TextType::class)
            ->add('sortie',DateType::class,[
                'widget' => 'single_text',
                'format' => 'yyyy-MM-dd',])
            ->add('description',TextareaType::class,[
                'attr' => ['rows'=>'12']
            ])
            ->add('editeur',TextType::class)
            ->add('langue',TextType::class)
            ->add('couverture',TextType::class)
            ->add('categorie',EntityType::class,[
                'class'=>Categorie::class,
                'choice_label'=>'libelle',
                'expanded'=>false,
                'multiple'=>false,
            ])
            ->add('theme',EntityType::class,[
                'class'=>Theme::class,
                'choice_label'=>'libelle',
                'expanded'=>true,
                'multiple'=>true,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Livre::class,
        ]);
    }
}
