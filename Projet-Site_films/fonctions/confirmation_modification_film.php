<?php 
  if($_POST['modif']=="non")
  {
    header('Location: ../index.php');
  }
  elseif($_POST['modif']=="oui")
  {
    header('Location: ../modification_film.php');
  }
?> 