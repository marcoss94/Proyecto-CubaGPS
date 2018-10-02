<?php
/**
 * Created by PhpStorm.
 * User: Armando
 * Date: 18/09/2018
 * Time: 18:49
 */

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class HouseForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('manager', TextType::class, ['label' => 'Manager'])
            ->add('direccion', TextType::class, ['label' => 'Direción'])
            ->add('municipio', TextType::class, ['label' => 'Municipio'])
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
            ->add('tel', TelType::class, ['label' => 'Teléfono fijo'])
            ->add('email', EmailType::class, ['label' => 'Email'])
            ->add('cel', TelType::class, ['label' => 'Teléfono móvil'])
            ->add('cantidadHabitaciones', null, ['label' => 'Cantidad de Habitaciones'])
            ->add('precioHabitacion', null, ['label' => 'Precio por habitación'])
            ->add('cantidadCamaDoble', null, ['label' => 'Camas Dobles'])
            ->add('cantidadCamaSimple', null, ['label' => 'Camas Simples'])
            ->add('cocina', ChoiceType::class, ['label' => 'Cocina', 'choices' => array(
                'si' => true,
                'no' => false,
            ),])
            ->add('tipoEstablecimiento', ChoiceType::class, ['label' => 'Tipo de Establecimiento', 'choices' => array(
                'casa' => 'casa',
                'habitación' => 'habitación',
                'apartamento' => 'apartamento',
            ),])
            ->add('parqueoGaraje',  ChoiceType::class, ['label' => 'Parqueo o Garaje', 'choices' => array(
                'si' => true,
                'no' => false,
            ),])
            ->add('desayuno', ChoiceType::class, ['label' => 'Desayuno', 'choices' => array(
                'si' => true,
                'no' => false,
            ),])
            ->add('almuerzo',  ChoiceType::class, ['label' => 'Almuerzo', 'choices' => array(
                'si' => true,
                'no' => false,
            ),])
            ->add('cena',  ChoiceType::class, ['label' => 'Cena', 'choices' => array(
                'si' => true,
                'no' => false,
            ),])
            ->add('lavanderia',  ChoiceType::class, ['label' => 'Lavandería', 'choices' => array(
                'si' => true,
                'no' => false,
            ),])
            ->add('masaje',  ChoiceType::class, ['label' => 'Masaje', 'choices' => array(
                'si' => true,
                'no' => false,
            ),])
            ->add('wifi',  ChoiceType::class, ['label' => 'Wi-Fi', 'choices' => array(
                'si' => true,
                'no' => false,
            ),])
            ->add('cajaFuerte',  ChoiceType::class, ['label' => 'Caja Fuerte', 'choices' => array(
                'si' => true,
                'no' => false,
            ),])
            ->add('guia', ChoiceType::class, ['label' => 'Guía', 'choices' => array(
                'si' => true,
                'no' => false,
            ),])
            ->add('terraza',  ChoiceType::class, ['label' => 'Terraza', 'choices' => array(
                'si' => true,
                'no' => false,
            ),])
            ->add('active',  ChoiceType::class, ['label' => 'Activo', 'choices' => array(
                'si' => true,
                'no' => false,
            ),])
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