<ul class="nav ">
    <div class='mt-3 d-block'>
        <!-- <li class="nav-item mx-2 my-2">
            <a class=" text-white " href="<?php 
            // echo base_url("index.php/Home/listOfAllChildApprovedByClinicalAdmin") ?>">
                Dashboard
            </a> -->
        </li>
        <li class="nav-item mx-2 my-2">
            <a class=" text-white " href="<?php echo base_url("index.php/Home/listOfAllChildApprovedByClinicalAdmin") ?>">
                Approved Children
            </a>
        </li>
        <li class="nav-item mx-2 my-2">
            <a class="text-white" href="<?php echo base_url('index.php/Home/listOfAllChildsSubmittedForClinicalAdminApproval') ?>">
                Pending Children
            </a>
        </li>
        <li class="nav-item mx-2 my-2">
            <a class="text-white " href="<?php echo base_url('index.php/Home/createHealthWorker') ?>">
                Create Healthworker
            </a>
        </li>
        <li class="nav-item mx-2 my-2">
            <a class="text-white" href="#">
                Logout
            </a>
        </li>
    </div>
</ul>