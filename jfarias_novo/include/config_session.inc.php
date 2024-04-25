<?php 

ini_set('session.use_only_cookies', 1);
ini_set('session.use_strict_mode', 1);


session_set_cookie_params([
    'lifetime' => 1800,
    'domain' => 'localhost',
    'path' => '/',
    'secure' => true,
    'httponly' => true
]);

session_start();

if(isset($_SESSION["user_id"])){
    if(!isset($_SESSION["last_regeneration"])){
        regId_loggedin();
    } else {
        $interval = 30 * 30;
        if(time() - $_SESSION["last_regeneration"] >= $interval){
            regId_loggedin();
        }
    }
} else {
    if(!isset($_SESSION["last_regeneration"])){
        regId();
    } else {
        $interval = 30 * 30;
        if(time() - $_SESSION["last_regeneration"] >= $interval){
            regId();
        }
    }
}



function regId_loggedin(){
    session_regenerate_id(true);
    $userid = $_SESSION["user_id"];
    $newSessionId = session_create_id();
    $sessionId = $newSessionId . "_" . $userid;
    session_id($sessionId);
    $_SESSION["last_regeneration"] = time();
}

function regId(){
    session_regenerate_id(true);
    $_SESSION["last_regeneration"] = time();
}

?>