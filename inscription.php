<?php
include "partials/header.php";
require_once "libraries/utiles.php";
require_once "libraries/models/Utilisateur.php";
require_once "libraries/models/Model.php";
require_once "libraries/models/Article.php";
require_once "libraries/models/Categorie.php";

$modelUser = new Utilisateur();

if (isset($_REQUEST['inscription']))  
{          
   $login = strip_tags($_REQUEST['login']);
   $email = strip_tags($_REQUEST['email']);
   $password = strip_tags($_REQUEST['password']);
   $password_v = strip_tags($_REQUEST['password_v']);
   $errorMsg =  verfication($login, $email, $password, $password_v);
   if (!isset($errorMsg))
   {	
     try
      {	
            $new_password = password_hash($password, PASSWORD_DEFAULT); //encrypt le mot de passe en utilisant password_hash()
        
            $modelUser->insertuser($login, $new_password,$email );
            $registerMsg="Inscription réussie..... Veuillez cliquer sur Connexion pour Se connecter"; //execute query success message
            
      }
       catch(PDOException $e)
       {
        echo $e->getMessage();
       }
    }

}
?>
    
    <div class = "text-center">		
       <?php 
         if(isset($errorMsg))
          {
               foreach($errorMsg as $error)
               {
              ?>
                 <div class="alert-danger">
                     <strong>ERREUR ! <?php echo $error ; ?></strong>
                </div>
             <?php
               }
          }
        if(isset($registerMsg))
          {
             ?>
            <div class="alert-success">
                  <strong><?php echo $registerMsg; ?></strong>
              </div>
            <?php
          }
            ?> 
    </div>
            
    <form method="post">
      <div id="creer">
          <h4 class = "text-center">CRÉER MON COMPTE</h4>
          <hr><br/>
      </div>
      <div class="container px-4 px-lg-5 justify-content-center">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col">
            <input type="text" class="form-control" name = "login" placeholder="Nom d'utilisateur">
            </div>
            <div class="col">
            <input type="email" class="form-control" name = "email" placeholder="E mail">
            </div>
        </div></br>
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col">
            <input type="password" class="form-control" name = "password" placeholder="Mot de passe">
            </div>
            <div class="col">
            <input type="password" class="form-control" name = "password_v" placeholder="Confirmation de mot de passe">
            </div>
        </div></br>
      </div>
        <div class="text-center">
        <input class = "submit" type="submit" name="inscription" value="Inscription">
        </div>
    </form><br/>
</div>
<?php
include "partials/footer.php";
?>