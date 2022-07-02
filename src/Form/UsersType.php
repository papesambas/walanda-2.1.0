<?php

namespace App\Form;

use App\Entity\Etablissements;
use App\Entity\Users;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UsersType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('username', TextType::class)
            /*->add('roles', ChoiceType::class, [
                'choices' => [
                    'Utilisateur' => "ROLE_USER"
                ]
            ])*/
            ->add('password')
            ->add('fullName')
            ->add('telephone')
            ->add('email')
            //->add('createdAt')
            ->add('isActif')
            ->add('isVerified')
            ->add('etablissement', EntityType::class, [
                'class' => Etablissements::class
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Users::class,
        ]);
    }
}
