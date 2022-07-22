<?php
require_once ('libraries/models/Model.php');

class Utilisateur extends Model
{
    protected $table = "utilisateurs";


    public function selectuser(string $login, string $email) {
        $select_stmt= $this->db->prepare("SELECT * FROM utilisateurs WHERE login=:ulogin OR email=:uemail"); 
        $select_stmt->execute(array(':ulogin'=>$login, ':uemail'=>$email)); 
        $row=$select_stmt->fetch(PDO::FETCH_ASSOC);	
        return $row;
    }
    
    public function insertuser($login, $email, $new_password):void {
        $insert_stmt= $this->db->prepare("INSERT INTO utilisateurs ( login, password, email) VALUES
                                            (:ulogin, :upassword, :uemail)"); 					
                
        $insert_stmt->execute(array( 	 
                                         ':ulogin'	=>$login, 
                                         ':upassword' =>$new_password, 
                                         ':uemail'	=>$email));
    }
    
    public function updateuser($id, $login, $email, $new_password) {
        $update_stmt= $this->db->prepare("UPDATE users SET id = :uid,  login = :ulogin, password = :upassword,
         email = :uemail where utilisateur.id = :uid");				
        $update_stmt->execute(array(	":uid" => $id,
                                        ":ulogin"=>$login,
                                         ":upassword"=>$new_password,
                                         ":uemail"	=>$email));
    }

    public function selectUserById(int $id) {
        $select_stmt = $this->db->prepare("SELECT * from {$this->table} WHERE id=:id");
        $select_stmt->execute(array(":id"=>$id));
        $user=$select_stmt->fetch(PDO::FETCH_ASSOC);
        return $user;
    }
    
}


?>