<?php

require_once ('libraries/database.php');


class Model 
{
    protected $db;     // des variables on peut les utiliser dans cette classe et ses classes enfants. 
    protected $table;

    public function __construct() {    // Un constructeur nous permet appeller automatiquement                      
            $this->db = getdb();     // cette fonction lorsque on crée un objet à partir de cette classe. 
    }
    
    public function selectItem() {
        $select_stmt = $this->db->prepare("SELECT * from {$this->table}");
        $select_stmt->execute();
        $item=$select_stmt->fetchall(PDO::FETCH_ASSOC);
        return $item;
    }

    public function delete(int $id) {
        $select_stmt = $this->db->prepare("DELETE from {$this->table} WHERE id=:id");
        $select_stmt->execute(array(":id"=>$id));
    }


    public function error($errorMsg, $registerMsg) {
        if(isset($errorMsg))
              {
              foreach($errorMsg as $error)
                    {echo $error ;}
              }
        if(isset($registerMsg)) {echo $registerMsg;}
    }
    
}

?>