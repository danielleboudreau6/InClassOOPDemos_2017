    <!-- Article Page Template Content -->
<div class="container">
    <h1 class="mt-4 mb-3">Article</h1>
    
    <!-- mwilliams:  breadcrumb navigation -->
    
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
        <li class="breadcrumb-item"><a href="articles.php">Articles</a></li>  
        <li class="breadcrumb-item active">Apache HTTP Server</li>   
    </ol>
    
    <!-- end breadcrumb -->   
    
        <?php
        
        //var_dump($_GET);
        
        // Retrieve the id parameter from the url querystring
        if (isset($_GET['id']) && is_numeric($_GET['id'])   ){
            $id = $_GET['id'];
            
            $data = $dbh->getArticle($id);
            //var_dump($data);
            if($data['error']==false){
                $article = $data['items'];
                //var_dump($article);
                if(empty($article)){
                    echo "<ol class='breadcrumb'>
                        <li class='breadcrumb-item'><a href='index.php'>Home</a></li>
                        <li class='breadcrumb-item'><a href='articles.php'>Articles</a></li>
                     </ol>";
                    echo "<div class='alert alert-danger' role='alert'>
                            This article does not exist!
                          </div>";
                }else{
                    foreach($article as $item){
                        $title = $item['title'];
                        $description = $item['description'];
                        $content = $item['content'];
                    }
                    var_dump($article);
                    //exit();
                }
            }
            
        }else{
           echo"<div class='alert alert-danger' role='alert'>
                    This page was accessed in error!
                  </div>"; 
           echo"</div>";
           include './includes/footer.php';
           exit();
        }
            
//            require './includes/config.php';
//            require MYSQL;
//            
//            // prepare keyword goes with the bindValue keyword
//            $stmt = $dbc->prepare("SELECT id, title, content
//                                   FROM pages
//                                   WHERE id=:id");
//            
//            // bindValue keyword binds the parameter in the where clause of the query
//            // un-hack-able
//            $stmt->bindValue(':id',$id,PDO::PARAM_INT);
//            
//            $stmt->execute();
//            
//            $article = $stmt->fetchAll(PDO::FETCH_ASSOC);
//            
//            //var_dump($article);
            
            
            
            
            
//            // Display the article
//            foreach($article as $row){
//                echo "<ol class='breadcrumb'>
//                        <li class='breadcrumb-item'><a href='index.php'>Home</a></li>
//                        <li class='breadcrumb-item'><a href='articles.php'>Articles</a></li>
//                        <li class='breadcrumb-item active'>{$row['title']}</li>
//                     </ol>";
//                echo "<h2 class='mt-3 mb-3'>{$row['title']}</h2>";
//                echo $row['content'];
//            } 
//        
//        
//        ?>
    
<!--    <h2 class="mt-3 mb-3">Apache HTTP Server</h2>
                <div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. 
                        Sapiente esse necessitatibus neque.
                    </p>
                </div>
                
</div>-->