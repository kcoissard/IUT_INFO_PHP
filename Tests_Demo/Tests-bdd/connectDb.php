<?php
 
 function connectDb(){
      $host="localhost"; // ou sql.hebergeur.com
      $user="p1207997";      // ou login
      $password="245447";      // ou xxxxxx
      $dbname="p1207997";
  try {
       $bdd=new PDO('mysql:host='.$host.';dbname='.$dbname.
                    ';charset=utf8',$user,$password);
       return $bdd;
      } catch (Exception $e) {
       die('Erreur : VOUS NETES PAS CONNECTE '.$e->getMessage());
  }
 }

?>
