<?php
/**
 * Created by PhpStorm.
 * User: Armando
 * Date: 22/09/2018
 * Time: 16:08
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

class PaqueteForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre', TextType::class, ['label' => 'Nombre'])
            ->add('diasDuracion', IntegerType::class, ['label' => 'Dias de duración'])
            ->add('nochesDuracion', IntegerType::class, ['label' => 'Noches de duración'])
            ->add('precio1', MoneyType::class, ['label' => 'Precio para una persona'])
            ->add('precio2', MoneyType::class, ['label' => 'Precio para dos personas'])
            ->add('precio3', MoneyType::class, ['label' => 'Precio para tres o más personas'])
            ->add('descripcion', TextareaType::class, ['label' => 'Descripción'])
            ->add('noIncluye', TextareaType::class, ['label' => 'No incluye'])
            ->add('active', ChoiceType::class, ['label' => 'Activo','choices'  => array(
                'Si' => true,
                'No' => false,
            ),])
            ->add('Guardar', SubmitType::class);
    }
}