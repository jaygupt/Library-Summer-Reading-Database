<?php 
    class crud {
        private $db; 
        
        function __construct($conn) {
            $this->db = $conn; 
        }

        public function insertStudent($fname, $lname, $age, $gradeInFall, $rfsb, $rfp, $rsrt, $outreachCode) {
            try {
                $sql = "INSERT INTO registration (firstname, lastname, age, grade_id, signUpBook, 
                finisherPrize, scholarshipRaffleTicket, outreachCode) VALUES (:fname, :lname, :age, :grade_id, 
                :signUpBook, :finisherPrize, :scholarshipRaffleTicket, :outreachCode)"; 
                $stmt = $this->db->prepare($sql); 

                $stmt->bindparam(":fname", $fname); 
                $stmt->bindparam(":lname", $lname); 
                $stmt->bindparam(":age", $age); 
                $stmt->bindparam(":grade_id", $gradeInFall); 
                $stmt->bindparam(":signUpBook", $rfsb); 
                $stmt->bindparam(":finisherPrize", $rfp); 
                $stmt->bindparam(":scholarshipRaffleTicket", $rsrt); 
                $stmt->bindparam(":outreachCode", $outreachCode); 

                $stmt->execute(); 
                return true; 
            } catch (PDOException $e) {
                echo $e->getMessage(); 
                return false; 
            }
        }

        public function editAttendee($id, $fname, $lname, $age, $gradeInFall, $rfsb, $rfp, $rsrt, $outreachCode) {
            try {

                $sql = "UPDATE `registration` SET `firstname`=:fname,`lastname`=:lname,
                `age`=:age,`grade_id`=:gradeInFall,`signUpBook`=:signUpBook,`finisherPrize`=:finisherPrize,
                `scholarshipRaffleTicket`=:scholarshipRaffleTicket,`outreachCode`=:outreachCode WHERE student_id=:id"; 

                $sql = "UPDATE `registration` SET `firstname`=:fname, `lastname`=:lname, `age`=:age, 
                `grade_id`=:gradeInFall,`signUpBook`=:signUpBook,`finisherPrize`=:finisherPrize,
                `scholarshipRaffleTicket`=:scholarshipRaffleTicket,`outreachCode`=:outreachCode WHERE student_id=:id"; 

                $stmt = $this->db->prepare($sql); 

                $stmt->bindparam(":id", $id); 
                $stmt->bindparam(":fname", $fname); 
                $stmt->bindparam(":lname", $lname); 
                $stmt->bindparam(":age", $age); 
                $stmt->bindparam(":gradeInFall", $gradeInFall); 
                $stmt->bindparam(":signUpBook", $rfsb); 
                $stmt->bindparam(":finisherPrize", $rfp); 
                $stmt->bindparam(":scholarshipRaffleTicket", $rsrt); 
                $stmt->bindparam(":outreachCode", $outreachCode); 

                $stmt->execute(); 

                return true; 
            } catch (PDOException $e) {
                echo $e->getMessage(); 
                return false; 
            }
        }
        
        public function getStudentDetails($id) {
            try {
                $sql = "SELECT * FROM `registration` r INNER JOIN grades g ON r.grade_id = g.grade_id WHERE student_id = :id";
                $stmt = $this->db->prepare($sql); 
                $stmt->bindparam(":id", $id); 
                $stmt->execute(); 
                $result = $stmt->fetch(); 
                return $result;
            } catch (PDOException $e) {
                echo $e->getMessage(); 
                return false;
            }
        }

        public function getStudents() { 
            try {
                $sql = "SELECT * FROM `registration` r INNER JOIN grades g ON r.grade_id = g.grade_id"; 
                $result = $this->db->query($sql);
                return $result;
            } catch (PDOException $e) {
                echo $e->getMessage(); 
                return false;
            }
        }

        public function getGrades() {
            try {
                $sql = "SELECT * FROM `grades`"; 
                $result = $this->db->query($sql);
                return $result; 
            } catch (PDOException $e) {
                echo $e->getMessage(); 
                return false;
            }
        }

        public function deleteStudent($id) {
            try {
                $sql = "DELETE FROM `registration` WHERE student_id = :id"; 
                $stmt = $this->db->prepare($sql); 
                $stmt->bindparam(":id", $id); 
                $stmt->execute(); 
                return true; 
            } catch (PDOException $e) {
                echo $e->getMessage(); 
                return false; 
            }
        }
    }
?>