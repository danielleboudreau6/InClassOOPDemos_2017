<?php

// Class to handle all database operations.
// 
// This class will have all the CRUD methods:
// C - Create, INSERTS
// R - Read, SELECTS
// U - Update, UPDATES
// D - Delete, DELETES

class DbHandler{
    private $conn;
    private $test;
    function __construct() {
        
        // initialize the database connection
    require_once dirname(__FILE__.'/DbConnect.php');
    
        // open the db connection
    try{
        $db = new DbConnect(); 
        
        $this->conn = $db->connect();
    
    } catch (Exception $ex) {
        
        $this::dbConnectError($ex->getCode());
    }
}

    // Create static function called dbConnectError
    private static function dbConnectError($code){
        switch ($code) {
            case 1045:
                echo "A database error has occured!";
                break;
            case 2002: 
                echo "A database error has occured!";
                break;
            default:
                echo "A server error has occured!";
                break;
                
        }
    }

    public function getCategoryList(){
        $sql="SELECT id, category,Summary.total 
                FROM categories JOIN (SELECT COUNT(*) AS total, 
                                      category_id
                                      FROM pages
                                      GROUP BY category_id) AS Summary
                WHERE categories.id = Summary.category_id
                ORDER BY category";
        try{
            $stmt = $this->conn->query($sql);
            $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $data = array('error'=>false,
                          'items'=>$categories
                    );
            
        } catch (PDOException $ex) {
            $data = array('error'=>true,
                          'message'=>$ex->getMessage()
                    );
        }
        
        return $data;
    }
    
    // getpopularlist() method gets a list of the 3 most popular articles based on history of pages visited.
    
    public function getPopularList(){
        $sql="SELECT COUNT(*)AS num, page_id, pages.title, 
                       CONCAT(LEFT(pages.description,30),'...') AS description
            FROM history JOIN pages ON pages.id = history.page_id
            WHERE type = 'page'
            GROUP BY page_id
            ORDER BY 1 DESC
            LIMIT 3";
        
        try{
            $stmt = $this->conn->query($sql);
            $popular = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $data = array('error'=>false,
                          'items'=>$popular
                    );
            
        } catch (PDOException $ex) {
            $data = array('error'=>true,
                          'message'=>$ex->getMessage()
                    );
        }
        
        return $data;
    }
    
    public function getArticle($id){
        try{
            $stmt=$this->conn->prepare("SELECT title, description, content
                                        FROM pages
                                        WHERE id=:id");
            $stmt->bindValue(':id',$id,PDO::PARAM_INT);
            $stmt->execute();
            $page = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $data = array(
                'error' =>false,
                'items'=>$page
            );
        } catch (PDOException $ex) {
                $data = array('error'=>true,
                          'message'=>$ex->getMessage()
                    );
        }
        return $data;
    }
    
    public function getArticles(){
        
            $sql="SELECT id, title, description
                FROM pages
                ORDER BY title";
            try{
                $stmt = $this->conn->query($sql);
                // pass on the connection in this 
                $articles = $stmt->fetchAll(PDO::FETCH_ASSOC);
                $data = array(
                    'error' =>false,
                    'items'=>$articles
                );
            } catch (PDOException $ex) {
                $data = array('error'=>true,
                          'message'=>$ex->getMessage()
                    );
        }
        return $data;
    }
    
}