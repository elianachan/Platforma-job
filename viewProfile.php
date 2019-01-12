<?php
    session_start();
    require_once('includes/connect.php');

     if(isset($_SESSION['connected']) && $_SESSION['connected'] == true){
         if(isset($_GET['post'])){
            $email = $_SESSION['email'];
            $id = mysqli_real_escape_string($connection, $_GET['post']);
            $query = "SELECT * FROM login WHERE id='$id'";
            $profileRows = $connection -> query($query);
         }
    }else{
        $smsg = "You are not logged in";
        header('Location: login.php');
    }
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Styles -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS"
        crossorigin="anonymous">
    <link rel="stylesheet" href="style/style.css">

    <title>Platform Job</title>
</head>

<body class="">
    <!-- NAVIGATION BAR -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light ">
        <a class="navbar-brand" href="#">Platform Jobs</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link textCap" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link textCap" href="#">View Offers</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle textCap" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        User
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item textCap" href="#">Sign In</a>
                        <a class="dropdown-item textCap" href="#">Register</a>

                    </div>
                </li>

            </ul>
        </div>
    </nav>
    <!-- ./NAVIGATION BAR -->

    <div class="container-fluid offerContainer">
        <div class="row">
            <div class="col-md-12">
                <div class="name">
                    <?php 
                     if($profileRows ->num_rows > 0){
                            while($row = $profileRows -> fetch_assoc()){
                    ?>@<?php echo $row['name']; ?>

                   
                </div>
                <div class="avatar">
                    <img src="data:image;base64,<?php echo $row['avatar']?>" alt="">
                </div>
                <div class="motto">
                   <?php echo $row['motto']; ?>
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-50">

    
    <div id="accordion">
        <div class="card">
            <div class="card-header" id="headingOne">
                <h5 class="mb-0">
                    <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true"
                        aria-controls="collapseOne">
                        About Me
                    </button>
                </h5>
            </div>
    
            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                <div class="card-body">
                   <?php echo $row['aboutme']; ?>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header" id="headingTwo">
                <h5 class="mb-0">
                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false"
                        aria-controls="collapseTwo">
                        Skills
                    </button>
                </h5>
            </div>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                <div class="card-body">
                   <?php echo $row['allskills']; ?>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header" id="headingThree">
                <h5 class="mb-0">
                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree"
                        aria-expanded="false" aria-controls="collapseThree">
                        Contact
                    </button>
                </h5>
            </div>
            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                <div class="card-body">
                  <?php echo $row['location']; ?>
        
                </div>
            </div>
        </div>
    </div>
</div>
       <?php
                            }
                        }
                    ?>
    <!-- Script -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k"
        crossorigin="anonymous"></script>
    <script src="js/index.js"></script>

</body>

</html>