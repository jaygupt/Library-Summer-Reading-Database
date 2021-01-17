    <?php 
        $title = "View Students";
        require_once "includes/header.php"; 
        require_once "includes/auth_check.php"; 
        require_once "db/conn.php"; 

        $results = $crud->getStudents(); 
    ?>

    <h1 class="text-center text-dark">View Students</h1>
    <br>
    <table class="table">
        <tr class="text-center">
            <th>ID #</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Age</th>
            <th>Grade in Fall</th>
            <th>Actions</th>
        </tr>
        <?php while($r = $results->fetch(PDO::FETCH_ASSOC)) { ?>
            <tr class="text-center">
                <td><?php echo $r['student_id'] ?></td>
                <td><?php echo $r['firstname'] ?></td>
                <td><?php echo $r['lastname'] ?></td>
                <td><?php echo $r['age'] ?></td>
                <td><?php echo $r['gradeInFall'] ?></td>
                <td>
                    <a href="view.php?id=<?php echo $r['student_id'] ?>" class="btn btn-primary">View</a>
                    <a href="edit.php?id=<?php echo $r['student_id'] ?>" class="btn btn-warning">Edit</a>
                    <a onclick="return confirm('Are you sure you want to delete this record?');" 
                    href="delete.php?id=<?php echo $r['student_id'] ?>" 
                    class="btn btn-danger">Delete</a>
                </td>
            </tr>
        <?php } ?>
    </table>

    <?php 
        require_once "includes/footer.php"; 
    ?>