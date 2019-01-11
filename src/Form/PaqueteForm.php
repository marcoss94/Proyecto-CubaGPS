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
            ->add('codigo',TextType::class,['label' => 'Código'])
            ->add('nombre', TextType::class, ['label' => 'Nombre'])
            ->add('name', TextType::class, ['label' => 'Name'])
            ->add('duracion', IntegerType::class, ['label' => 'Dias de duración'])
            ->add('nochesDuracion', IntegerType::class, ['label' => 'Noches de duración'])
            ->add('precio1', MoneyType::class, ['label' => 'Precio para una persona'])
            ->add('precio2', MoneyType::class, ['label' => 'Precio x persona para dos personas'])
            ->add('precio3', MoneyType::class, ['label' => 'Precio x persona para tres personas'])
            ->add('precio4', MoneyType::class, ['label' => 'Precio x persona para cuatro o más personas'])
            ->add('descripcion', TextareaType::class, ['label' => 'Descripción'])
            ->add('description',TextareaType::class,['label' => 'Description'])
            ->add('incluye', TextareaType::class, ['label' => 'Incluye','required'=> false])
            ->add('included', TextareaType::class, ['label' => 'Included','required'=> false])
            ->add('noIncluye', TextareaType::class, ['label' => 'No incluye'])
            ->add('notIncluded', TextareaType::class, ['label' => 'Not included'])
            ->add('valoracion',null,['label' => 'Valoración'])
            ->add('active', ChoiceType::class, ['label' => 'Activo','choices'  => array(
                'Si' => true,
                'No' => false,
            ),])
            ->add('Guardar', SubmitType::class);
    }
}