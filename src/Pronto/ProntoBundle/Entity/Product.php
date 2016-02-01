<?php

namespace Pronto\ProntoBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * @ORM\Entity
 * @ORM\Table(name="product")
 * @ORM\HasLifecycleCallbacks
 */
class Product {
   public function __construct() {
      $this->tags = new ArrayCollection();
   }
   /**
    * @ORM\Column(type="integer")
    * @ORM\Id
    * @ORM\GeneratedValue(strategy="AUTO")
    */
   protected $id;
   /**
    * @Assert\NotBlank(message="Inserisci un nome prodotto!")
    * @ORM\Column(type="string", length=100)
    */
   protected $name;
   /**
    * @ORM\Column(type="text", nullable=true)
    */
   protected $description;
   /**
    * @ORM\Column(type="datetime")
    */
   protected $created;
   /**
    * @ORM\Column(type="datetime")
    */
   protected $ts;
   /**
    * @ORM\OneToMany(targetEntity="Tag", mappedBy="product", cascade={"persist"}, orphanRemoval=true)
    * @Assert\Count(min = 1, minMessage = "Aggiungere almeno un tag!") 
    */
   protected $tags;
   /**
    * @ORM\Column(type="string", length=255, nullable=true)
    */
   public $path;
   /**
    * @Assert\File(mimeTypes={ "image/jpeg", "image/png","image/jpg","image/tif"  })
    * @Assert\File(maxSize="6000000")
    */
   private $file;
   private $temp;
   /**
    * @ORM\PrePersist()
    * @ORM\PreUpdate()
    */
   public function preUpload() {
      if (null !== $this->getFile()) {
         $filename = sha1(uniqid(mt_rand(), true));
         $this->path = $filename . '.' . $this->getFile()->guessExtension();
      }
   }
   /**
    * @ORM\PostPersist()
    * @ORM\PostUpdate()
    */
   public function upload() {
      if (null === $this->getFile()) {
         return;
      }
      $this->getFile()->move($this->getUploadRootDir(), $this->path);
      if (isset($this->temp)) {
         unlink($this->getUploadRootDir() . '/' . $this->temp);
         $this->temp = null;
      }
      $this->file = null;
   }
   /**
    * @ORM\PostRemove()
    */
   public function removeUpload() {
      $file = $this->getAbsolutePath();
      if ($file) {
         unlink($file);
      }
   }
   //* Custom getters and setters
   public function setFile(UploadedFile $file = null) {
      $this->file = $file;
      if (isset($this->path)) {
         $this->temp = $this->path;
         $this->path = null;
      } else {
         $this->path = 'initial';
      }
   }
   public function getFile() {
      return $this->file;
   }
   public function getAbsolutePath() {
      return null === $this->path ? null : $this->getUploadRootDir() . '/' . $this->path;
   }
   public function getWebPath() {
      return null === $this->path ? null : $this->getUploadDir() . '/' . $this->path;
   }
   protected function getUploadRootDir() {
      return __DIR__ . '/../../../../web/' . $this->getUploadDir();
   }
   protected function getUploadDir() {
      return 'uploads/product';
   }
   public function addTag(\Pronto\ProntoBundle\Entity\Tag $tag) {
      $tag->setProduct($this);
      $this->tags->add($tag);
      error_log("Aggiunto Tag!!");
   }
   public function removeTag(\Pronto\ProntoBundle\Entity\Tag $tag) {
      $this->tags->removeElement($tag);
   }
   public function setCreated() {
      $this->created = new \DateTime("now");
      return $this;
   }
   public function setTs() {
      $this->ts = new \DateTime("now");
      return $this;
   }
   //* Standard getters and setters
   public function getImgPath() {
      return "uploads/product/$this->file";
   }
   public function getFilePath() {
      return "" . $this->id;
   }
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
   public function setDescription($description) {
      $this->description = $description;
      return $this;
   }
   public function getDescription() {
      return $this->description;
   }
   public function getCreated() {
      return $this->created;
   }
   public function getTs() {
      return $this->ts;
   }
   public function getTags() {
      return $this->tags;
   }
}