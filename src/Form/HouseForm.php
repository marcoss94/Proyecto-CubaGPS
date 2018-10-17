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
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class HouseForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre', TextType::class, ['label' => 'Nombre'])
            ->add('manager', TextType::class, ['label' => 'Manager'])
            ->add('descripcion', TextareaType::class, ['label' => 'Descripcion'])
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
            ->add('tipoEstablecimiento', ChoiceType::class, ['label' => 'Tipo de Establecimiento', 'choices' => array(
                'casa' => 'casa',
                'habitación' => 'habitación',
                'apartamento' => 'apartamento',
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
            ->add('servicios', ChoiceType::class, ['label' => 'Servicios','choices'=>array(
                'Cocina'=>'Cocina',
                'Terraza'=>'Terraza',
                'Patio'=>'Terraza',
                'Jacuzzi'=>'Jacuzzi',
                'Wi-Fi'=>'Wi-Fi',
                'Caja Fuerte'=>'Caja Fuerte',
                'Lavandería'=>'Lavandería',
                'Masaje'=>'Masaje',
                'Amaca'=>'Amaca',
                'Escritorio de Trabajo'=>'Escritorio de Trabajo',
                'Ducha de Playa'=>'Ducha de Playa',
                'Piscina'=>'Piscina',
                'Cámaras de seguridad'=>'Cámaras de seguridad',
                'Cunas para bebes'=>'Cunas para bebes',
                'Bar/Restaurant'=>'Bar/Restaurant',
                'Equipos de música'=>'Equipos de música',
                'Parqueo'=>'Parqueo',
            ),'expanded'=>true,'multiple'=>true])
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