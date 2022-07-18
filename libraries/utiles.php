<?php
    require_once "libraries/database.php";     


    function verfication($login, $email, $password, $password_v){
      $errorMsg = [];

        if(empty($password)){
        $errorMsg[]="Veuillez saisir le mot de passe";	//check mot du passe textbox n'est pas vide
       }
        else if(empty($login)){
         $errorMsg[]="Veuillez saisir le nom d'utilisateur";	//check nom textbox n'est pas vide 
        } 
        else if(empty($email)){
         $errorMsg[]="Veuillez saisir l'email";	//check email textbox n'est pas vide
        }
        else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
         $errorMsg[]="Veuillez mettre une adresse email valide";	//check  email a un format valide
        }
        else if(empty($password_v)){
            $errorMsg[]="Veuillez resaisir le mot de passe";	//check mot du passe textbox n'est pas vide
        }
        else if(strlen($password) < 6){
         $errorMsg[] = "Mot de pass doit être au moin 6 caractères";	//check Mot de pass doit être au moin 6 caractères
        }
        else if(strlen($password) != strlen($password_v)){
         $errorMsg[] = "Le mot de pass doit être correspondant";  // check mot de pass doit être correspondant
        }
          return $errorMsg;
        }

      function verficationp($gps_x, $gps_y, $frequence_sub, $longeur, $largeur,$extension1, $extensions, $size1, $maxSize, $error1,$tmpName1, $name1){

          if(empty($gps_x)){
          $errorMsg[]="Veuillez saisir le gps_x";	//check mot du passe textbox n'est pas vide
         }
          else if(empty($gps_y)){
           $errorMsg[]="Veuillez saisir le gps_y";	//check nom textbox n'est pas vide 
          } 
          else if(empty($frequence_sub)){
           $errorMsg[]="Veuillez saisir le frequence_sub";	//check email textbox n'est pas vide
          }
          else if(empty($longeur)){
           $errorMsg[]="Veuillez saisir le longeur";	//check  email a un format valide
          }
          else if(empty($largeur)){
           $errorMsg[]="Veuillez saisir le largeur";	//check mot du passe textbox n'est pas vide
          }
          elseif (empty($tmpName1) and empty($name1)) {
            return;
          }
          elseif (!in_array($extension1, $extensions) or $size1 > $maxSize or $error1 !== 0) { // check photo
            $errorMsg[] = "Votre fichier n'est pas une image ou il est plus que 2MO";
          }
            return $errorMsg;
          }
  

?>