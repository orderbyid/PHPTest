<?php

namespace Pronto\ProntoBundle\Form;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TagType extends AbstractType {
   public function buildForm(FormBuilderInterface $builder, array $options) {
      $builder->add('name', null, ['label' => false]);
   }
   public function configureOptions(OptionsResolver $resolver) {
      $resolver->setDefaults(array(
          'data_class' => 'Pronto\ProntoBundle\Entity\Tag'
      ));
   }
}