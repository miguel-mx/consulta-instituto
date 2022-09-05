<?php

namespace App\Form;

use App\Entity\Consulta;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ConsultaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('tareas', ChoiceType::class, [
                'choices'  => [
                    'Sí' => true,
                    'No' => false,
                ],
                'expanded' => true,
                'multiple' => false,
            ])
            ->add('comentario1',CKEditorType::class, array(
                    'config' => array(
                        'toolbar' => 'basic',
                        'editorplaceholder' => 'Opcional. ¿Tienes algún comentario? Escríbelo aquí...',
                        'label' => '',
                        'required' => false
                    )
            ))
            ->add('documento', ChoiceType::class, [
                'choices'  => [
                    'Sí' => true,
                    'No' => false,
                ],
                'expanded' => true,
                'multiple' => false,
            ])
            ->add('comentario2',CKEditorType::class, array(
                'config' => array(
                    'toolbar' => 'basic',
                    'editorplaceholder' => 'Opcional. ¿Tienes algún comentario? Escríbelo aquí...',
                    'label' => '',
                    'required' => false
                )
            ))
            ->add('academico', ChoiceType::class, [
                'choices'  => [
                    'Sí' => true,
                    'No' => false,
                ],
                'expanded' => true,
                'multiple' => false,
            ])
            ->add('comentario3',CKEditorType::class, array(
                'config' => array(
                    'toolbar' => 'basic',
                    'editorplaceholder' => 'Opcional. ¿Tienes algún comentario? Escríbelo aquí...',
                    'label' => '',
                    'required' => false
                )
            ))
            ->add('comision', ChoiceType::class, [
                'choices'  => [
                    'Sí' => true,
                    'No' => false,
                ],
                'expanded' => true,
                'multiple' => false,
            ])
            ->add('comentario4',CKEditorType::class, array(
                'config' => array(
                    'toolbar' => 'basic',
                    'editorplaceholder' => 'Opcional. ¿Tienes algún comentario? Escríbelo aquí...',
                    'label' => '',
                    'required' => false
                )
            ));
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Consulta::class,
        ]);
    }
}
