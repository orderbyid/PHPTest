<?php

namespace Pronto\ProntoBundle\Form;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class ProductType extends AbstractType {
   public function buildForm(FormBuilderInterface $builder, array $options) {
      $nome = ['label' => 'Prodotto*'];
      $save = ['label' => 'Salva'];
      $descr = ['required' => false, 'label' => 'Descrizione'];
      $file = ['required' => false, 'label' => 'Immagine'];
      $tags = [
          'entry_type' => TagType::class,
          'by_reference' => false,
          'allow_add' => true,
          'allow_delete' => true,
          'label' => false
      ];
      $builder
              ->add('name', null, $nome)
              ->add('description', TextareaType::class, $descr)
              ->add('file', FileType::class, $file)
              ->add('tags', CollectionType::class, $tags)
              ->add('save', SubmitType::class, $save);
   }
   public function configureOptions(OptionsResolver $resolver) {
      $resolver->setDefaults(array(
          'data_class' => 'Pronto\ProntoBundle\Entity\Product'
      ));
   }
}