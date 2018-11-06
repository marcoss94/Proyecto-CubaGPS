<?php
/**
 * Created by PhpStorm.
 * User: Armando
 * Date: 02/10/2018
 * Time: 11:27
 */

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class ExcursionForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre', TextType::class, ['label' => 'Nombre'])
            ->add('name', TextType::class, ['label' => 'Name'])
            ->add('descripcion', TextareaType::class, ['label' => 'Descripción'])
            ->add('description',TextareaType::class,['label' => 'Description'])
            ->add('provincia', ChoiceType::class, ['label' => 'Provincia', 'choices' => array(
                'Pinar del Rio' => 'Pinar del Rio',
                'Artemisa' => 'Artemisa',
                'La Habana' => 'La Habana',
                'Mayabeque' => 'Mayabeque',
                'Matanzas' => 'Matanzas',
                'Villa Clara' => 'Villa Clara',
                'Cienfuegos' => 'Cienfuegos',
                'Sancti Spiritus' => 'Sancti Spiritus',
                'Ciego de Ávila' => 'Ciego de Ávila',
                'Camaguey' => 'Camaguey',
                'Las Tunas' => 'Las Tunas',
                'Holguín' => 'Holguín',
                'Granma' => 'Granma',
                'Santiago de Cuba' => 'Santiago de Cuba',
                'Guantánamo' => 'Guantánamo',
                'Isla de la Juventud' => 'Isla de la Juventud',
            ),])
            ->add('dias', ChoiceType::class, ['label' => 'Días disponibles','choices'=>array(
                'Lunes'=>'Lunes',
                'Martes'=>'Martes',
                'Miércoles'=>'Miércoles',
                'Jueves'=>'Jueves',
                'Viernes'=>'Viernes',
                'Sábado'=>'Sábado',
                'Domingo'=>'Domingo',
            ),'expanded'=>true,'multiple'=>true])
            ->add('horaInicio', TextType::class, ['label' => 'Hora de inicio'])
            ->add('duracion', TextType::class, ['label' => 'Duración'])
            ->add('guia', ChoiceType::class, ['label' => 'Guía', 'choices' => array(
                'Si' => true,
                'No' => false,
            )])
            ->add('incluyeTransporte', ChoiceType::class, ['label' => 'Incluye Transporte', 'choices' => array(
                'Si' => true,
                'No' => false,
            )])
            ->add('tipoTransporte', ChoiceType::class, ['label' => 'Tipo de Transporte', 'choices' => array(
                'Clásico' => 'Clásico',
                'Moderno' => 'Moderno',
                'Agenciado' => 'Agenciado',
                'Minivan' => 'Minivan',
                'Bus' => 'Bus',
            )])
            ->add('desayuno', ChoiceType::class, ['label' => 'Desayuno','choices'=>array(
                'Si'=>true,
                'No'=>false,
            ),'expanded'=>false,'multiple'=>false])
            ->add('almuerzo', ChoiceType::class, ['label' => 'Almuerzo','choices'=>array(
                'Si'=>true,
                'No'=>false,
            ),'expanded'=>false,'multiple'=>false])
            ->add('comida', ChoiceType::class, ['label' => 'Comida','choices'=>array(
                'Si'=>true,
                'No'=>false,
            ),'expanded'=>false,'multiple'=>false])
            ->add('reglamento', TextareaType::class, ['label' => 'Reglamento'])
            ->add('reglament', TextareaType::class, ['label' => 'Reglament'])
            ->add('precio1', MoneyType::class, ['label' => 'Precio para una persona'])
            ->add('precio2', MoneyType::class, ['label' => 'Precio para dos personas'])
            ->add('precio3', MoneyType::class, ['label' => 'Precio para tres personas'])
            ->add('precio4', MoneyType::class, ['label' => 'Precio para cuatro o más personas'])
            ->add('longitud',null, ['label' => 'Longitud'])
            ->add('latitud',null, ['label' => 'Latitud'])
            ->add('active', ChoiceType::class, ['label' => 'Activo', 'choices' => array(
                'Si' => true,
                'No' => false,
            )])
            ->add('valoracion', ChoiceType::class, ['label' => 'Valoración','choices' => array(
                '0' => 0,
                '1' => 1,
                '2' => 2,
                '3' => 3,
                '4' => 4,
                '5' => 5,
                '6' => 6,
                '7' => 7,
                '8' => 8,
                '9' => 9,
                '10' => 10,
            ),])
            ->add('Guardar', SubmitType::class);
    }
}