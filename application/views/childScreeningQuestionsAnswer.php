<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url("style/dashboard.css"); ?>">

    <title>Dashboard</title>
</head>

<body>

    <div class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
        <div class="d-flex">
            <a class="navbar-brand mx-3" href="#"><img src="<?= base_url('assets/images/head.png') ?>" height='50px' alt=""></a>
            <h1 class="text-white mr-3">INFORM</h1>
        </div>
        <div class="d-flex justify-content-center flex-wrap flex-md-nowrap align-items-center ">
            <h1 class="h2 text-white">Screening Details</h1>
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
                    <?php include("sidebar.php"); ?>
                </div>
            </nav>

            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">

                <h4 class='my-3'>Screening Details</h4>
                <div class="table-responsive">
                    <form method="post" action="<?php echo base_url('index.php/Home/updateChildDetails') ?>">
                        <table class="table">
                            <tbody>
                                <!-- Placeholder for table rows -->
                                <tr>
                                    <th scope="col">Child Id</th>
                                    <td><?php echo $screeningDetails['child_id'] ?> <input type="hidden" name="childId" value="<?php echo $screeningDetails['child_id'] ?> "></td>
                                </tr>
                                <tr>
                                    <th scope="col">Child Name</th>
                                    <td><?php echo $screeningDetails['child_name'] ?></td>
                                </tr>
                                <tr>
                                    <th scope="col">Screening Date</th>
                                    <td><?php echo $screeningDetails['screening_date'] ?></td>
                                </tr>
                                <tr>
                                    <th scope="col">Q1. Compared with other children,did your child have any serious delay in sitting,standing or walking ?</th>
                                    <td><?php if ($screeningDetails['ans1'] == 1) {
                                            echo 'Yes';
                                        }
                                        if ($screeningDetails['ans1'] == 0) {
                                            echo 'No';
                                        }
                                        if ($screeningDetails['ans1'] == 2) {
                                            echo 'Skip';
                                        } ?></td>
                                </tr>
                                <tr>
                                    <th scope="col">Q2. Does your child appear to have difficulty hearing ?</th>
                                    <td><?php if ($screeningDetails['ans2'] == 1) {
                                            echo 'Yes';
                                        }
                                        if ($screeningDetails['ans2'] == 0) {
                                            echo 'No';
                                        }
                                        if ($screeningDetails['ans2'] == 2) {
                                            echo 'Skip';
                                        } ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="col">Q3. When you tell your child to do something does he/she seem to understand what you are saying ?</th>
                                    <td><?php if ($screeningDetails['ans3'] == 1) {
                                            echo 'Yes';
                                        }
                                        if ($screeningDetails['ans3'] == 0) {
                                            echo 'No';
                                        }
                                        if ($screeningDetails['ans3'] == 2) {
                                            echo 'Skip';
                                        } ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="col">Q4. Does your child have difficulty in walking or moving his/her arms or does he/she have weakness and/or stiffness in the arms or legs ?</th>
                                    <td><?php if ($screeningDetails['ans4'] == 1) {
                                            echo 'Yes';
                                        }
                                        if ($screeningDetails['ans4'] == 0) {
                                            echo 'No';
                                        }
                                        if ($screeningDetails['ans4'] == 2) {
                                            echo 'Skip';
                                        } ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="col">Q5. Does your child have sometimes have some fits become rigid or loose consciousness ?</th>
                                    <td><?php if ($screeningDetails['ans5'] == 1) {
                                            echo 'Yes';
                                        }
                                        if ($screeningDetails['ans5'] == 0) {
                                            echo 'No';
                                        }
                                        if ($screeningDetails['ans5'] == 2) {
                                            echo 'Skip';
                                        } ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="col">Q6. Does your child learn to do things like other children like his/her age ?</th>
                                    <td><?php if ($screeningDetails['ans6'] == 1) {
                                            echo 'Yes';
                                        }
                                        if ($screeningDetails['ans6'] == 0) {
                                            echo 'No';
                                        }
                                        if ($screeningDetails['ans6'] == 2) {
                                            echo 'Skip';
                                        } ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="col">Q7. Does your child speak at all (can he/she make himself/herself understood I words, can he/she say any recognizablewords) ?</th>
                                    <td><?php if ($screeningDetails['ans7'] == 1) {
                                            echo 'Yes';
                                        }
                                        if ($screeningDetails['ans7'] == 0) {
                                            echo 'No';
                                        }
                                        if ($screeningDetails['ans7'] == 2) {
                                            echo 'Skip';
                                        } ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="col">Q8. For three to nine year-old children ask : is your child's speech in any way different from normal<br /> (not clear enough to understand by people other than his/her immediate family) ?</th>
                                    <td><?php if ($screeningDetails['ans8'] == 1) {
                                            echo 'Yes';
                                        }
                                        if ($screeningDetails['ans8'] == 0) {
                                            echo 'No';
                                        }
                                        if ($screeningDetails['ans8'] == 2) {
                                            echo 'Skip';
                                        } ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="col">Q9. For two year old children ask : can he/she name at least one object <br />
                                        (for example , an animal, a toy, a cup , a spoon) ?</th>
                                    <td><?php if ($screeningDetails['ans9'] == 1) {
                                            echo 'Yes';
                                        }
                                        if ($screeningDetails['ans9'] == 0) {
                                            echo 'No';
                                        }
                                        if ($screeningDetails['ans9'] == 2) {
                                            echo 'Skip';
                                        } ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="col">Q10. Compared with other children of his/her age does your child appear in any way slow in hios/her thinking or understanding ?</th>
                                    <td><?php if ($screeningDetails['ans10'] == 1) {
                                            echo 'Yes';
                                        }
                                        if ($screeningDetails['ans10'] == 0) {
                                            echo 'No';
                                        }
                                        if ($screeningDetails['ans10'] == 2) {
                                            echo 'Skip';
                                        } ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Possible Problems according to you</th>
                                    <td>
                                        <table width="286">
                                            <tr>
                                                <td width="232"><label>
                                                        <input type="checkbox" name="PossibleProblems[VI]" value="1" id="PossibleProblems_0" />
                                                        Visual Impairment</label></td>
                                            </tr>
                                            <tr>
                                                <td><label>
                                                        <input type="checkbox" name="PossibleProblems[CP]" value="1" id="PossibleProblems_1" />
                                                        CP</label></td>
                                            </tr>
                                            <tr>
                                                <td><label>
                                                        <input type="checkbox" name="PossibleProblems[EP]" value="1" id="PossibleProblems_2" />
                                                        Epilepsy</label></td>
                                            </tr>
                                            <tr>
                                                <td><label>
                                                        <input type="checkbox" name="PossibleProblems[ASD]" value="1" id="PossibleProblems_3" />
                                                        ASD</label></td>
                                            </tr>
                                            <tr>
                                                <td><label>
                                                        <input type="checkbox" name="PossibleProblems[HI]" value="1" id="PossibleProblems_4" />
                                                        Hearing Impairment</label>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><label>
                                                        <input type="checkbox" name="PossibleProblems[ID]" value="1" id="PossibleProblems_5" />
                                                        Intellectual Dissability</label></td>
                                            </tr>

                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Instruction For Healthworker</th>
                                    <td><textarea name="instruction" id="textarea" cols="45" rows="5"></textarea></td>
                                </tr>
                                <tr>
                                    <th height="50" colspan="5" scope="row"><input class="btn btn-primary" type="submit" name="button" id="button" value="Submit" /></th>

                                </tr>
                                <!-- <tr>
                                    <th scope="col">Child Id</th>
                                    <td><?php
                                        // echo 
                                        // $screeningDetails['child_id'] 
                                        ?> <input type="hidden" name="childId" value="<?php
                                                                                                                    // echo 
                                                                                                                    // $screeningDetails['child_id'] 
                                                                                                                    ?> "></td>
                                </tr> -->
                                <!-- Add more table rows here as needed -->
                            </tbody>
                        </table>
                    </form>
                </div>
            </main>
        </div>
    </div>
    <div class='text-center bg-dark text-white '>
        <?php include('footer.php') ?>
    </div>
    <!-- JavaScript and Bootstrap scripts -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>