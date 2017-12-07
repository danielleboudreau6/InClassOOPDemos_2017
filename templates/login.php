<!-- Login Page Template Content -->
<div class="container">
    <h1 class="mt-4 mb-3">Login</h1>

    <!-- mwilliams:  breadcrumb navigation -->
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
        <li class="breadcrumb-item active">Login</li>            
    </ol>
    <!-- end breadcrumb -->
    
    <?php
    
    if($_POST){
        $_SESSION['user_id']=1; 
        $_SESSION['user_not_expired']=true;
        $_SESSION['admin']=false;
        
        echo '<div class="alert alert-success">                      
            <p><strong>Welcome</strong></p>
            <p>You have successfully signed in!  
            You will be automatically redirected to the home page in <span id="count">5</span> seconds...</p></div>';
        echo "<script>
            var delay = 5 ;
            var url = 'index.php';
            function countdown() {
                    setTimeout(countdown, 1000) ;
                    $('#count').html(delay);
                    delay --;
                    if (delay < 0 ) {
                            window.location = url ;
                            delay = 0 ;
                    }
            }
            countdown() ;   
          </script>";
          //finish page:  hide form
            echo   '</div></div>';
            include './includes/footer.php'; //footer
        exit();
        
    }
    
    ?>
    
    
    <form method="post" action="login.php" novalidate>
        <div class="form-group">
            <label for="email">Email address</label>
            <input class="form-control" id="email" name="email" 
                   type="email" aria-describedby="emailHelp" placeholder="Enter email">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input class="form-control" id="password" name="password"
                   type="password" placeholder="Password">
        </div>
        <div class="form-group">
            <div class="form-check">
                <label class="form-check-label">
                    <input class="form-check-input" type="checkbox"> Remember Password</label>
            </div>
        </div>
        <button type="submit" class="btn btn-primary btn-block">Login</button>
    </form>
    <div class="text-center">
        <a class="d-block small mt-3" href="register.php">Register an Account</a>
        <a class="d-block small" href="forgot-password.php">Forgot Password?</a>
    </div>
</div>      

