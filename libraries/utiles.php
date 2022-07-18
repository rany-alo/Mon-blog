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

?>