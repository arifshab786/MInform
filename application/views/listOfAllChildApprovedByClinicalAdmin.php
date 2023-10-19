<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="http://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css">
    </style>
    <script type="text/javascript" src="http://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="<?php echo base_url("style/dashboard.css"); ?>">

    <title>Dashboard</title>
</head>

<body>
    <div class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
        <div class='d-flex'>
            <a class="navbar-brand mx-3" href="#"><img src="<?= base_url('assets/images/head.png') ?>" height='50px' alt=""></a>
            <h1 class='text-white mr-3'>INFORM</h1>
        </div>
        <div class="d-flex justify-content-center flex-wrap flex-md-nowrap align-items-center ">
            <h1 class=" h2 text-white">Dashboard</h1>
        </div>
        <!-- <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search"> -->
        <ul class="navbar-nav px-3">
            <li class="nav-item text-nowrap">
                <a class="nav-link" href="<?php echo base_url('index.php/Home/logout') ?>">Sign out</a>
            </li>
        </ul>
    </div>

    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block sidebar collapse">
                <div>
                    <?php include("sidebar.php") ?>
                </div>
            </nav>

            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">

                <h4 class='my-3'>List of children approved by Supervisor</h4>
                <div class="table-responsive">
                    <table id="myTable" class="table table-striped table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Health Worker Name</th>
                                <th scope="col">Child Name</th>
                                <th scope="col">Father's Name</th>
                                <th scope="col">Mother's Name</th>
                                <th scope="col">Date of Birth</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($childrendata as $index => $child) { ?>
                                <tr>
                                    <th scope="row"><?php echo $index + 1; ?></th>
                                    <td><?php echo $child["hw_name"]; ?></td>
                                    <td><?php echo $child["child_name"]; ?></td>
                                    <td><?php echo $child["father_name"]; ?></td>
                                    <td><?php echo $child["mother_name"]; ?></td>
                                    <td><?php echo $child["dateofbirth"]; ?></td>
                                    <!-- <td><a class="nav-link" href="<?php
                                                                        // echo base_url('index.php/Home/cr') 
                                                                        ?>">View Screening Details </a></td> -->
                                    <th><?php
                                        $cp = $child['cp_approved'];
                                        $hearingImpairment = $child['hi_approved'];
                                        $visualImpairment = $child['vi_approved'];
                                        $intellectualDisability = $child['id_approved'];
                                        $epilepsy = $child['ep_approved'];
                                        $ASD = $child['asd_approved'];
                                        $problems = array();
                                        if ($cp == '1') {
                                            array_push($problems, "CP");
                                        }
                                        if ($hearingImpairment == '1') {
                                            array_push($problems, "Hearing Impairment");
                                        }
                                        if ($visualImpairment == '1') {
                                            array_push($problems, "Visual Impairmen");
                                        }
                                        if ($intellectualDisability == '1') {
                                            array_push($problems, "Intellectual Disability");
                                        }
                                        if ($epilepsy == '1') {
                                            array_push($problems, "Epilepsy");
                                        }
                                        if ($ASD == '1') {
                                            array_push($problems, "ASD");
                                        }

                                        echo implode(",", $problems); ?></th>
                                </tr>
                            <?php } ?>

                        </tbody>
                    </table>
                </div>
            </main>
        </div>
    </div>
    <div class='text-center bg-dark text-white '>
        <?php include('footer.php') ?>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script>
        window.jQuery || document.write('<script src="/docs/4.6/assets/js/vendor/jquery.slim.min.js"><\/script>')
    </script>
    <script src="/docs/4.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>


    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>
    <script src="dashboard.js"></script>
</body>

</html>