<?php
/**
 * Created by PhpStorm.
 * User: Armando
 * Date: 14/10/2018
 * Time: 17:56
 */

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateIntervalType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class RoomForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre', TextType::class, ['label' => 'Nombre'])
            ->add('camasDobles', IntegerType::class, ['label' => 'Camas Dobles'])
            ->add('camasSimples', IntegerType::class, ['label' => 'Camas Simples'])
            ->add('literas', IntegerType::class, ['label' => 'Literas'])
            ->add('piso', IntegerType::class, ['label' => 'Piso'])
            ->add('vista', TextType::class, ['label' => 'Vistas a:'])
            ->add('precio', MoneyType::class, ['label' => 'Precio'])
            ->add('escaleras', ChoiceType::class, ['label' => 'Escaleras', 'choices' => array(
                'si' => true,
                'no' => false,
            ),])
            ->add('privada', ChoiceType::class, ['label' => 'Privada', 'choices' => array(
                'si' => true,
                'no' => false,
            ),])
            ->add('independiente', ChoiceType::class, ['label' => 'Independiente', 'choices' => array(
                'si' => true,
                'no' => false,
            ),])
            ->add('comun', ChoiceType::class, ['label' => 'Común', 'choices' => array(
                'si' => true,
                'no' => false,
            ),])
            ->add('servicios', ChoiceType::class, ['label' => 'Servicios', 'choices' => array(
                'Baño'=>'bathroom',
                'Wi-Fi'=>'wifi',
                'Ducha' => 'ducha',
                'Jacuzzi' => 'jacuzzi',
                'Secadora' => 'secadora',
                'Aire acondicionado' => 'aire_acondicionado',
                'Ventilador' => 'ventilador',
                'TV' => 'tv',
                'Mini bar' => 'mini_bar',
                'Refrigerador' => 'refrigerador',
                'Caja de seguridad' => 'caja_fuerte',
                'Plancha' => 'plancha',
            ), 'expanded' => true, 'multiple' => true])
            ->add('active', ChoiceType::class, ['label' => 'Activa', 'choices' => array(
                'si' => true,
                'no' => false,
            ),])
            ->add('Guardar', SubmitType::class);
    }
}