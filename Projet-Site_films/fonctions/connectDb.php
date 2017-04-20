<?php  function connectDb(){

      $host="localhost"; // ou sql.hebergeur.com

      $dbname="exo_note_php";
  try {
       $bdd=new PDO('mysql:host='.$host.';dbname='.$dbname.';charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
       
       
       return $bdd;
      } catch (Exception $e) {
       die('Erreur : VOUS NETES PAS CONNECTE '.$e->getMessage());
  }

}

?>
