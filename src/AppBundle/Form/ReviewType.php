<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use AppBundle\Model\ReviewModel;
use blackknight467\StarRatingBundle\Form\RatingType;
use EWZ\Bundle\RecaptchaBundle\Form\Type\EWZRecaptchaType;

class ReviewType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
                ->add('name', TextType::class, ['required' => true])
                ->add('email', EmailType::class, ['required' => false])
                ->add('satisfaction', RatingType::class, ['required' => true])
                ->add('quality', RatingType::class, ['required' => true])
                ->add('review', TextareaType::class, ['required' => true])
                ->add('recaptcha', EWZRecaptchaType::class, ['required' => true])
                ->add('submit', SubmitType::class)
                ;
    }
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => ReviewModel::class,
            'csrf_protection' => false,
            'allow_extra_fields' => true,
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return '';
    }


}
