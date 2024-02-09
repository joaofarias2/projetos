<?php 
session_start();

try {
    require_once 'dbh.inc.php';
    require_once 'login_model.inc.php';
    
    
    $userData = get_user_role($pdo, $_SESSION['user_id']);

    
    if ($userData) {
        $userRole = $userData['user_role'];
    
        if ($userRole === "admin") {
            header("Location: ../adminpage/admindash.php");
        } else {
            header("Location: ../userdash.php");
        }
    }    

} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}
?>

