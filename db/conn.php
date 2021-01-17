<?php 
    $configs = include("config.php"); 
?>
<?php 
    // Development Connection
    $host = $configs['host']; 
    $db = $configs['db']; 
    $user = $configs['user'];
    $pass = $configs['pass'];  
    $charset = $configs['charset']; 

    $dsn = "mysql:host=$host;dbname=$db;charset=$charset"; 

    try {
        $pdo = new PDO($dsn, $user, $pass); 
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  
    } catch(PDOException $e) {
        throw new PDOException($e->getMessage()); 
    }

    require_once "crud.php"; 
    require_once "user.php"; 
    $crud = new crud($pdo); 
    $user = new user($pdo); 

    // insertUser has two parameters: username and password 
    // $user->insertUser(); 
?>