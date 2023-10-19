<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="http://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css">
    </style>
    <script type="text/javascript" src="http://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="<?php echo base_url("style/dashboard.css"); ?>">
    <!-- <link rel="stylesheet" href="<?php
                                        // echo base_url("style/dashboard.css"); 
                                        ?>"> -->

    <title>health worker dashboard</title>
</head>

<body>
    <div class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
        <div class='d-flex'>
            <a class="navbar-brand mx-3" href="#"><img src="<?= base_url('assets/images/head.png') ?>" height='50px' alt=""></a>
            <h1 class='text-white mr-3'>INFORM</h1>
        </div>
        <div class="d-flex justify-content-center flex-wrap flex-md-nowrap align-items-center ">
            <h1 class=" h2 text-white">Health Worker Dashboard</h1>
        </div>
        <!-- <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search"> -->
        <ul class="navbar-nav px-3">
            <li class="nav-item text-nowrap">
                <a class="nav-link" href="<?php echo base_url('index.php/Home/logoutHealthWorker') ?>">Sign out ( <?php echo $user["username"] ?> ) </a>
            </li>
        </ul>
    </div>

    <div class="">
        <div class="d-flex">
            <nav class="col-md-3 col-lg-2 d-md-block sidebar">
                <div>
                    <?php include("sidebar.php") ?>
                </div>
            </nav>
            <div>

                <div class="row popup">

                    <div class="right col rounded">
                        <?php
                        $msg = $this->session->flashdata('msg');
                        if ($msg != "") {
                        ?>
                            <div class="alert alert-danger">
                                <?php echo $msg; ?>
                            </div>
                        <?php
                        }
                        ?>


                        <h1 class='text-center mt-3'>Your Details</h1>
                        <div class="d-flex">
                            <div class="form-group mx-4">
                                <label>Username</label>
                                <input type="text" value="<?php echo $user["username"] ?>" class="form-control" placeholder="username " disabled>
                            </div>
                            <div class="form-group mx-5">
                                <label>Name</label>
                                <input type="text" value="<?php echo $user["name"] ?>" class="form-control" placeholder="Enter Name" disabled>
                            </div>
                        </div>
                        <div class="d-flex">
                            <div class="form-group mx-4">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" value="<?php echo $user["email"] ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" disabled>
                            </div>
                            <div class="form-group mx-5">
                                <label for="exampleInputPassword1">Password</label>
                                <input type="text" value="<?php echo $user["password"] ?>" class="form-control" id="exampleInputPassword1" placeholder="Password" disabled>
                            </div>
                        </div>
                        <div class="d-flex">

                            <div class="form-group mx-4">
                                <label>Address</label>
                                <input type="text-area" value="<?php echo $user["address"] ?>" class="form-control" placeholder="address" disabled>
                            </div>
                            <div class="form-group mx-5">
                                <label>Contact Number</label>
                                <input type="number" value="<?php echo $user["contact_no"] ?>" class="form-control" placeholder="phone number" disabled>
                            </div>
                        </div>
                        <div class="form-group mr-5 ml-4">
                            <label>Selected Region ID</label>
                            <input type="text" value="<?php echo $user["region_id"] ?>" class="form-control" placeholder="phone number" disabled>
                        </div>

                        <div class="form-group mr-5 ml-4">
                            <label>Date of Joining</label>
                            <input type="date" value="<?php echo $user["date_of_joining"] ?>" class="form-control" disabled>
                        </div>
                        <!-- <button type="submit" class="btn btn-primary mx-4 mb-5">Submit</button> -->
                        <!-- </form> -->
                    </div>
                    <div class="left col rounded">
                        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner p-3">
                                <div class="carousel-item active">
                                    <img src="<?= base_url('assets/images/h_img1.jpg') ?>" class="d-block w-100" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="<?= base_url('assets/images/h_img2.jpg') ?>" class="d-block w-100" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="<?= base_url('assets/images/h_img3.png') ?>" class="d-block w-100" alt="...">
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

                </div>

            </div>


        </div>

    </div>
    <div class='text-center bg-dark text-white '>
        <?php include('footer.php') ?>
    </div>

    <!-- Optional JavaScript -->

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script>
        window.jQuery || document.write('<script src="/docs/4.6/assets/js/vendor/jquery.slim.min.js"><\/script>')
    </script>
    <script src="/docs/4.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>


    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>