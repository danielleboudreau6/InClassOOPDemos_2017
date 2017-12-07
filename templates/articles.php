<!-- Articles Page Template Content -->
<div class="container">
    <h1 class="mt-4 mb-3">All Articles</h1>
    <!-- mwilliams:  breadcrumb navigation -->
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
        <li class="breadcrumb-item active">Articles</li>            
    </ol>
    <!-- end breadcrumb -->    
    
    <?php
        $data = $dbh->getArticles();
        //var_dump($data);
        if($data['error']==false){
            $articles = $data['items'];
            //var_dump($articles);
            echo '<table class="table table-striped table-hover table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Title</th>
                            <th scope="col">Description</th>
                            <th scope="col">View</th>
                        </tr>
                    </thead>';
            foreach($articles as $article){
                $id = $article['id'];
                $title = $article['title'];
                $desc = $article['description'];
                
                echo '<tr>
                        <th scope="row">'.$title.'</th>
                        <td>'.$desc.'</td>
                        <td><a href="article.php?id='.$id.'">Read Article</a>  <i class="fa fa-eye" aria-hidden="true"></i></td>
                    </tr>';
                
            }
            
            echo '</thead></table>';
        }
        
    
    ?>
    
    
<!--    <table class="table table-striped table-hover table-bordered">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col">View</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">Apache HTTP Server</th>
                <td>Using Apache HTTP Server on Microsoft Windows</td>
                <td><a href="article.php?id=1">Read Article</a>  <i class="fa fa-eye" aria-hidden="true"></i></td>
            </tr>
            <tr>
                <th scope="row">ASP.NET Security Best Practices</th>
                <td>Basic Security Practices for Web Applications</td>
                <td><a href="article.php?id=2">Read Article</a>  <i class="fa fa-eye" aria-hidden="true"></i></td>
            </tr>
            <tr>
                <th scope="row">Building Mobile Websites</th>
                <td>How to build a mobile website with HTML 5</td>
                <td><a href="article.php?id=3">Read Article</a>  <i class="fa fa-eye" aria-hidden="true"></i></td>
            </tr>
        </tbody>
    </table>-->
</div>

