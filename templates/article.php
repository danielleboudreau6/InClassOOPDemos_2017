    <!-- Article Page Template Content -->
<div class="container">
    <h1 class="mt-4 mb-3">Article</h1> 
    
    <?php
        
        //var_dump($_GET);
    
    // ONLY AUTHORIZED USERS CAN VIEW THIS ARTICLE
    
    if(isset($_SESSION['user_id']) && isset($_SESSION['user_not_expired'])){
        $user_id = $_SESSION['user_id'];
    }else{
        $user_id = null;
    }
        //var_dump($user_id);
        
        if(!empty($user_id)){
            //echo 'user is logged in';
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
                        echo "<ol class='breadcrumb'>
                        <li class='breadcrumb-item'><a href='index.php'>Home</a></li>
                        <li class='breadcrumb-item'><a href='articles.php'>Articles</a></li>
                        <li class='breadcrumb-item active'>$title</li>
                        </ol>";
                        echo "<h2 class='mt-3 mb-3'>$title</h2>";
                        echo $content;
                    }
                    //var_dump($article);
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
        }else{
            echo '<div class="alert alert-warning" role="alert">
                <strong>Members only</strong>
                <p>You must be logged in as a registered user to view this article.</p>
            </div>';
        }
          
    ?>
</div>