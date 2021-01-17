    <?php 
        $title = "Edit Record";
        require_once "includes/header.php"; 
        require_once "includes/auth_check.php";
        require_once "db/conn.php"; 

        if (!isset($_GET['id'])) {
            header("Location: viewstudents.php"); 
        } else {
            $id = $_GET['id']; 
            $results = $crud->getGrades(); 
            $student = $crud->getStudentDetails($id); 
    ?>
        <h1 class="text-center text-dark">Edit Record</h1>

        <br>
        <form method="post" action="editpost.php">
            <input name="id" type="hidden" value="<?php echo $student['student_id'] ?>" />
            <div class="form-group">
                <label for="firstname">First Name</label>
                <input type="text" class="form-control" id="firstname" name="firstname" value="<?php echo $student["firstname"]; ?>" required>
            </div>
            <div class="form-group">
                <label for="lastname">Last Name</label>
                <input type="text" class="form-control" id="lastname" name="lastname" value="<?php echo $student["lastname"]; ?>" required>
            </div>
            <div class="form-group">
                <label for="age">Age</label>
                <input type="number" class="form-control" id="age" name="age" value="<?php echo $student["age"]; ?>" min="0" max="14" required>
            </div>
            <div class="form-group">
                <label for="gradeInFall">Grade in Fall (Pre-K through 8th)</label>
                <select class="form-control" id="gradeInFall" name="gradeInFall"> 
                <?php while($r = $results->fetch(PDO::FETCH_ASSOC)) { ?>
                        <option value="<?php echo $r['grade_id']; ?>" <?php if($r['grade_id'] == $student['grade_id']) echo 'selected' ?>>
                                <?php echo $r['gradeInFall']; ?>
                        </option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" id="rfsb" name="rfsb" value="Yes" required checked>
                <label class="form-check-label" for="rfsb">Received Free Signup Book</label>
            </div>
            <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" id="rfp" name="rfp" value="Yes" <?php echo ($student['finisherPrize'] == 'Yes' ? 'checked' : ''); ?>>
                <label class="form-check-label" for="rfp">Received Finisher Prize</label>
            </div>
            <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" id="rsrt" name="rsrt" value="Yes" <?php echo ($student['scholarshipRaffleTicket'] == 'Yes' ? 'checked' : ''); ?>>
                <label class="form-check-label" for="rsrt">Received Scholarship Raffle Ticket</label>
            </div>
            <div class="form-group">
                <label for="outreachCode">Staff Use Only (Outreach Code)</label>
                <input type="text" class="form-control" id="outreachCode" name="outreachCode" value="<?php echo $student["outreachCode"];?>">
            </div>
            <button type="submit" name="submit" class="btn btn-success btn-block">Save Changes</button>
            <a href="viewstudents.php" class="btn btn-info btn-block">Back to List</a>
        </form>

        <?php } ?>

    <?php 
        require_once "includes/footer.php"; 
    ?>