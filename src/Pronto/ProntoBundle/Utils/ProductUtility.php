<?php

namespace Pronto\ProntoBundle\Utils;
class ProductUtility {
   public function salvaProdotto($em, $dir, $prod) {
      try {
         //* Mantiene inalterato il nome del file
         $file = $prod->getFile();
         $fileName = $file->getClientOriginalName();
         $prod->setFile($fileName);
         //* Aggiorna time stamp e registra nel db
         $prod->setCreated();
         $prod->setTs();
         $em->persist($prod);
         $em->flush();
         //* Carica il file
         $id = $prod->getId();
         $path = $dir . '/../web/uploads/product/' . $id;
         $file->move($path, $fileName);
         return true;
      } catch (Exception $e) {
         error_log('Errore nel salvataggio dell\'immagine: '.$e->getMessage());
      }
   }
}