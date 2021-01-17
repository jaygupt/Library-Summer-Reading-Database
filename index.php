    <?php 
        $title = "Registration";
        require_once "includes/header.php"; 
        require_once "includes/auth_check.php"; 
        require_once "db/conn.php"; 

        $results = $crud->getGrades(); 
    ?>
        <h1 class="text-center text-dark">Summer Reading Registration</h1>

        <!--
            - First Name
            - Last Name
            - Age 
            - Grade in Fall (Pre-K through 8th)
            - Received Free Signup Book
            - Received Finisher Prize 
            - Received Scholarship Raffle Ticket (Check to add 1)
            - Staff Use Only (Outreach Code)
            - Submit says: add record 
        -->

        <br>
        <form method="post" action="success.php">
            <div class="form-group">
                <label for="firstname">First Name</label>
                <input type="text" class="form-control" id="firstname" name="firstname" required>
            </div>
            <div class="form-group">
                <label for="lastname">Last Name</label>
                <input type="text" class="form-control" id="lastname" name="lastname" required>
            </div>
            <div class="form-group">
                <label for="age">Age</label>
                <input type="number" class="form-control" id="age" name="age" min="0" max="14" required>
            </div>
            <div class="form-group">
                <label for="gradeInFall">Grade in Fall (Pre-K through 8th)</label>
                <select class="form-control" id="gradeInFall" name="gradeInFall">
                    <?php while($r = $results->fetch(PDO::FETCH_ASSOC)) { ?>
                        <option value="<?php echo $r['grade_id']; ?>"><?php echo $r['gradeInFall']; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" id="rfsb" name="rfsb" value="Yes" required>
                <label class="form-check-label" for="rfsb">Received Free Signup Book</label>
            </div>
            <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" id="rfp" name="rfp" value="Yes">
                <label class="form-check-label" for="rfp">Received Finisher Prize</label>
            </div>
            <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" id="rsrt" name="rsrt" value="Yes">
                <label class="form-check-label" for="rsrt">Received Scholarship Raffle Ticket</label>
            </div>
            <div class="form-group">
                <label for="outreachCode">Staff Use Only (Outreach Code)</label>
                <input type="text" class="form-control" id="outreachCode" name="outreachCode">
            </div>
            <button type="submit" name="submit" class="btn btn-primary btn-block">Add Record</button>
            <a href="viewstudents.php" class="btn btn-secondary btn-block">Go to List</a>
        </form>

    <?php 
        require_once "includes/footer.php"; 
    ?>