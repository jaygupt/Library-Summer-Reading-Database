    <?php 
        $title = "View Student"; 
        require_once "includes/header.php"; 
        require_once "includes/auth_check.php";
        require_once "db/conn.php";

        if (!isset($_GET['id'])) {
            header("Location: viewstudents.php"); 
        } else {
            $id = $_GET['id']; 
            $result = $crud->getStudentDetails($id); 
    ?>

        <h1 class="text-center text-dark">View Student</h1>
        <br>
        <div id="user-card" class="card text-center" style="width: 20rem;">
            <div class="card-body">
                <h3 class="card-title">
                    <?php echo $result["firstname"] . " " . $result["lastname"];?>
                </h3>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    Age: <?php echo $result["age"];?> 
                </li>
                <li class="list-group-item">
                    Grade in Fall: <?php echo $result["gradeInFall"];?>
                </li>
                <li class="list-group-item">
                    <?php
                        echo "Received Free Signup Book: " . $result['signUpBook'];
                    ?>
                </li>
                <li class="list-group-item">
                    <?php
                        echo "Received Finisher Prize: " . $result['finisherPrize'];
                    ?>
                </li>
                <li class="list-group-item">
                    <?php
                        echo "Received Scholarship Raffle Ticket: " . $result['scholarshipRaffleTicket'];     
                    ?>
                </li>
                <li class="list-group-item">
                    <?php
                        $outreachCode = $result["outreachCode"];
                        if ($outreachCode == NULL) {
                            echo "Outreach Code: None Given."; 
                        } else {
                            echo "Outreach Code: " . $outreachCode; 
                        }
                    ?>
                </li>
            </ul>
        </div>
        <br>
        <div style="text-align: center;">
            <a href="viewstudents.php" class="btn btn-info">Back to List</a>
            <a href="edit.php?id=<?php echo $result['student_id'] ?>" class="btn btn-warning">Edit</a>
            <a onclick="return confirm('Are you sure you want to delete this record?');" 
            href="delete.php?id=<?php echo $result['student_id'] ?>" 
            class="btn btn-danger">Delete</a>
        </div>
    <?php } ?>

    <?php require_once "includes/footer.php"; ?>   