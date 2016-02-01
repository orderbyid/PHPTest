<?php

namespace Pronto\ProntoBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * Tag
 *
 * @ORM\Table(name="tag")
 * @ORM\Entity(repositoryClass="Pronto\ProntoBundle\Repository\TagRepository")
 */
class Tag {
   /**
    * @var int
    *
    * @ORM\Column(name="id", type="integer")
    * @ORM\Id
    * @ORM\GeneratedValue(strategy="AUTO")
    */
   private $id;
   /**
    * @var string
    *
    * @ORM\Column(name="name", type="string", length=255)
    */
   private $name;
   /**
    * @ORM\ManyToOne(targetEntity="Product", inversedBy="tags")
    * @ORM\JoinColumn(name="product_id", referencedColumnName="id")
    */
   protected $product;
   //* Standard getters and setters
   public function getId() {
      return $this->id;
   }
   public function setName($name) {
      $this->name = $name;
      return $this;
   }
   public function getName() {
      return $this->name;
   }
   public function setProduct(\Pronto\ProntoBundle\Entity\Product $product = null) {
      $this->product = $product;
      return $this;
   }
   public function getProduct() {
      return $this->product;
   }
}