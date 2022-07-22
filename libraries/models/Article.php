<?php

require_once ('libraries/models/Model.php');

class Article extends Model
{

    protected $table = "articles";

    public function insertArticle($article, $id_utilisateur, $id_categorie):void {
        $insert_stmt= $this->db->prepare("INSERT INTO articles (id, article, id_utilisateur,id_categorie) VALUES
                                            ('', :article, :id_utilisateur, :id_categorie,'')"); 							
                
        $insert_stmt->execute(array(	 ':article'	=>$article, 
                                         ':id_utilisateur' =>$id_utilisateur, 
                                         ':id_catagorie'	=>$id_categorie));
    }

    public function selectArticleR() {
        $select_stmt = $this->db->prepare("SELECT * from articles join utilisateurs on 
        articles.id_utilisateur = utilisateurs.id join categories on articles.id_categorie = categories.id
        order by articles.id desc limit 5");
        $select_stmt->execute();
        $article=$select_stmt->fetchall(PDO::FETCH_ASSOC);
        return $article;
    }

    public function selectArticleByC(int $id_categorie) {
        $select_stmt = $this->db->prepare("SELECT * from articles join utilisateurs on 
        articles.id_utilisateur = utilisateurs.id join categories on articles.id_categorie = categories.id
        WHERE categories.id = :id_categorie");
        $select_stmt->execute(array(":id_categorie"=>$id_categorie));
        $article=$select_stmt->fetchall(PDO::FETCH_ASSOC);
        return $article;
    }

    public function updateArticle($id, $article, $id_utilisateur, $id_categorie):void {
        $update_stmt= $this->db->prepare("UPDATE articles SET id = :id, :article, :id_utilisateur, :id_categorie,''
         WHERE id_passage = :id");							
                
        $update_stmt->execute(array(	 ':id'    =>$id,
                                         ':article'	=>$article, 
                                         ':id_utilisateur' =>$id_utilisateur, 
                                         ':id_categorie'	=>$id_categorie));
    }



}

?>