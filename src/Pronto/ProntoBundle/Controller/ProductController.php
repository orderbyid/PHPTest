<?php

namespace Pronto\ProntoBundle\Controller;
use Pronto\ProntoBundle\Form\ProductType;
use Pronto\ProntoBundle\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ProductController extends Controller {
   public function createAction(Request $request) {
      $par = ['editBtn' => false];
      return $this-> openForm(null, $request, $par);
   }
   public function editAction($id, Request $request) {
      $rep = $this->getDoctrine()->getRepository('ProntoProntoBundle:Product');
      $prod = $rep->find($id);
      $par = ['editBtn' => true, 'product' => $prod];
      return $this->openForm($prod, $request, $par);;
   }
   public function deleteAction($id) {
      $rep = $this->getDoctrine()->getRepository('ProntoProntoBundle:Product');
      $prod = $rep->find($id);
      $em = $this->getDoctrine()->getManager();
      $em->remove($prod);
      $em->flush();
      $this->addFlash('notice','Prodotto eliminato!');
      return $this->redirect($this->generateUrl('productList'));
   }
   public function listAction() {
      $template = 'ProntoProntoBundle:Product:list.html.twig';
      $rep = $this->getDoctrine()->getRepository('ProntoProntoBundle:Product');
      $products = $rep->findAll();
      $par = ['products' => $products];
      return $this->render($template, $par);
   }
   protected function openForm($prod, $request, $par){
      if(!$prod){
         $prod = new Product();
         $prod->setCreated();
      }
      $form = $this->createForm(ProductType::class, $prod);
      $form->handleRequest($request);
      if ($form->isSubmitted() && $form->isValid()) {
         $prod->setTs();
         $em = $this->getDoctrine()->getManager();
         $em->persist($prod);
         $em->flush();
         $this->addFlash('notice','Modifiche registrate nel database!');
         return $this->redirect($this->generateUrl('productList'));
      }
      $template = 'ProntoProntoBundle:Product:new.html.twig';
      $par['form'] = $form->createView();
      return $this->render($template, $par);
   }
}