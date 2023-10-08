<?php
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['action'])) {
    if ($_GET['action'] === 'on') {
        shell_exec('gpio -g write 13 1'); //Execute Python script to turn the relay on
        
    } elseif ($_GET['action'] === 'off') {
        // Execute Python script to turn the relay off
       shell_exec('gpio -g write 13 0');
    }
}
//header("Location: index.php");
?>
