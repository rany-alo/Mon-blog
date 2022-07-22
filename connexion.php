<?php
include "partials/header.php";
require_once "libraries/utiles.php";
require_once "libraries/models/Utilisateur.php";
require_once "libraries/models/Model.php";
require_once "libraries/models/Article.php";
require_once "libraries/models/Categorie.php";

$modelUser = new Utilisateur();
session_name('user_login');
session_start();

if (isset($_REQUEST['connexion']))  
{          
   $login = strip_tags($_REQUEST['login']);
   $email		=strip_tags($_REQUEST["login"]);	
   $password = strip_tags($_REQUEST['password']);
  if(empty($login)){						
		$errorMsg[]="veuillez entrer le nom d'utilisateur ou l'e-mail";	//check "nom/email" textbox n'est pas vide 
	}
  else if(empty($email)){
		$errorMsg[]="veuillez entrer le nom d'utilisateur ou l'e-mail";	//check "nom/email" textbox n'est pas vide
	}
	else if(empty($password)){
		$errorMsg[]="veuillez entrer le mot de pass";	//check "passowrd" textbox n'est pas vide
	}
	else
	{
		try
		{
			$row = $modelUser->selectuser($login, $email);
			
			if($row)	//check database n'est pas vide.
			{
				if($login==$row["login"] OR $email==$row["email"]) //check condition user est existe par nom ou email.
				{
					if(password_verify($password, $row["password"])) //check condition user "password" est corrospendant avec celci de database "password" en utilisant password_verify()
					{
						$_SESSION["user_login"] = $row["id"];
						$loginMsg = "Connexion réussie...";	
						header("refresh:1; index.php");				
					}
					else
					{
						$errorMsg[]="Mauvais mot de passe";
					}
				}
				else
				{
					$errorMsg[]="Mauvais nom d'utilisateur ou e-mail";
				}
			}
			else
			{
				$errorMsg[]="Mauvais nom d'utilisateur ou e-mail";
			}
		}
		catch(PDOException $e)
		{
			$e->getMessage();
		}		
	}
}
            ?> 
    </div>
            
    <form method="post">
      <div id="creer">
          <h4 class = "text-center">Connexion</h4>
          <hr><br/>
      </div>
      <?php
		if(isset($errorMsg))
		{
			foreach($errorMsg as $error)
			{
			?>
				<div class="alert-danger">
					<strong><?php echo $error; ?></strong>
				</div>
            <?php
			}
		}
		if(isset($loginMsg))
		{
		?>
			<div class="alert-success">
				<strong><?php echo $loginMsg; ?></strong>
			</div>
        <?php
		}
		?>   
      <div class="container px-4 px-lg-5 justify-content-center">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col">
            <input type="text" class="form-control" name = "login" placeholder="Nom d'utilisateur ou Email">
            </div>
            <div class="col">
            <input type="password" class="form-control" name = "password" placeholder="Mot de passe">
            </div>
        </div></br>
      </div>
        <div class="text-center">
        <input class = "submit" type="submit" name="connexion" value="Connexion">
        </div>
    </form><br/>
</div>
<?php
include "partials/footer.php";
?>