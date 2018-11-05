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
            ->add('description',TextareaType::class,['label' => 'Description'])
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
            ->add('licencia', TextType::class, ['label' => '#Licencia'])
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
                'Cocina'=>'cocina',
                'Terraza'=>'terraza',
                'Patio'=>'patio',
                'Jacuzzi'=>'jacuzzi',
                'Caja Fuerte'=>'caja_fuerte',
                'Lavandería'=>'lavandería',
                'Masaje'=>'masaje',
                'Hamaca'=>'hamaca',
                'Escritorio de Trabajo'=>'escritorio',
                'Ducha de Playa'=>'ducha_playa',
                'Piscina'=>'piscina',
                'Cámaras de seguridad'=>'camaras',
                'Cunas para bebes'=>'cuna',
                'Bar/Restaurant'=>'bar_Restaurant',
                'Equipos de música'=>'equipo_música',
                'Parqueo'=>'parqueo',
            ),'expanded'=>true,'multiple'=>true])
            ->add('longitud',null, ['label' => 'Longitud'])
            ->add('latitud',null, ['label' => 'Latitud'])
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