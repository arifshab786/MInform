<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel = "stylesheet" href = "<?php echo base_url(); ?>/style/login.css">
    <title>Login</title>
  </head>
  <body>
    <div class="container mb-4">
        <nav class="navbar navbar-expand-lg navbar-light bg-light mb-4 d-flex justify-content-center">
            <a class="navbar-brand " href="#"><img src="<?= base_url('assets/images/head.png') ?>" height='80px' alt=""></a>
            <h1>INFORM</h1>


            <!-- <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
            </div>   -->
        </nav>
        <div class="row popup">
            <div class="left col rounded">
                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner p-3">
                        <div class="carousel-item active">
                        <img src="<?= base_url('assets/images/img1.jpg') ?>" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                        <img src="<?= base_url('assets/images/img2.jpg') ?>" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                        <img src="<?= base_url('assets/images/img3.jpg') ?>" class="d-block w-100" alt="...">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
            <div class="right col rounded">
                <?php
                    $msg=$this->session->flashdata('msg');
                    if($msg!=""){
                        ?>
                        <div class="alert alert-danger">
                            <?php echo $msg;?>
                        </div>
                    <?php
                    }
                ?>


                <h1 class='text-center'>Login</h1>
                <form class='mt-5' method='post' name='login' action='<?php echo base_url().'index.php/Home/login'; ?>'>
                    <!-- Your form fields here -->
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control" name='username' value="<?php echo set_value('username') ?>" placeholder="Enter your username">
                        <p class='text-danger'><?php echo strip_tags(form_error('username')); ?></p>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" name='password' value="<?php echo set_value('password') ?>"  id="exampleInputPassword1" placeholder="Password">
                        <p class='text-danger'><?php echo strip_tags(form_error('password')); ?></p>
                        
                    </div>
                    <div class="text-center mt-4">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                    <div class="text-center mt-3">
                    <a class="mt-3" href="<?php echo base_url('index.php/Home/loginWithHealthWorkerCredentials') ?>">Login As Health Worker</a>
                    </div>
                </form>
            </div>

        </div>
    </div>
    <footer class='container mt-5 text-center '>
        Developed by - ZMQ Development<br/>
        Copyright &copy; Inform
    </footer>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>