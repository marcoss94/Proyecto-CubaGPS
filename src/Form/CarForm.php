<?php
/**
 * Created by PhpStorm.
 * User: Armando
 * Date: 18/09/2018
 * Time: 11:21
 */

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;


class CarForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('codigo',TextType::class,['label' => 'Código'])
            ->add('nombreChofer',TextType::class,['label' => 'Nombre del Chofer'])
            ->add('tel', TelType::class, ['label' => 'Teléfono fijo','required'=> false])
            ->add('cel', TelType::class, ['label' => 'Teléfono móvil','required'=> false])
            ->add('email', EmailType::class, ['label' => 'Email','required'=> false])
            ->add('chapa', TextType::class, ['label' => 'Chapa'])
            ->add('nombre', TextType::class, ['label' => 'Modelo y Año'])
            ->add('color', TextType::class, ['label' => 'Color'])
            ->add('descripcion',TextareaType::class,['label' => 'Descripción'])
            ->add('description',TextareaType::class,['label' => 'Description'])
            ->add('licencia', ChoiceType::class, ['label' => 'Tipo de Licencia','choices'  => array(
                'Asociado' => 'Asociado',
                'Licencia operativa' => 'Licencia operativa',
            ),])
            ->add('municipio', TextType::class, ['label' => 'Municipio'])
            ->add('provincia', ChoiceType::class, ['label' => 'Provincia','choices'  => array(
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
            ->add('climatizado', ChoiceType::class, ['label' => 'Climatizado','choices'  => array(
                'Si' => true,
                'No' => false,
            ),])
            ->add('descapotable', ChoiceType::class, ['label' => 'Descapotable','choices'  => array(
                'Si' => true,
                'No' => false,
            ),])
            ->add('capacidad',null, ['label' => 'Cantidad de Asientos'])
            ->add('precio',null, ['label' => 'Precio x Hora/Km'])
            ->add('idiomas',ChoiceType::class, ['label' => 'Idiomas','choices'  => array(
                'English' => 'English',
                'Español' => 'Español',
                'Française' => 'Française',
                'Deutsche' => 'Deutsche',
                'Italiano' => 'Italiano',
                'Português' => 'Português',
                'Pусский' => 'Pусский',
                '中国' => '中国',
            ),'multiple'=>true
            ])
            ->add('transfer', ChoiceType::class, ['label' => 'Transfer','choices'  => array(
                'Si' => true,
                'No' => false,
            ),])
            ->add('active', ChoiceType::class, ['label' => 'Activo','choices'  => array(
                'Si' => true,
                'No' => false,
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