<?php 
require_once('./simple.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $secretKey = '6LepWIgrAAAAAFcENedXVUBLgP2I26cswrlf493l'; // Replace with your reCAPTCHA v3 secret
    $token = $_POST['token'] ?? '';
    $remoteIp = $_SERVER['REMOTE_ADDR'];

    // Verify the token with Google
    $verifyUrl = 'https://www.google.com/recaptcha/api/siteverify';
    $response = file_get_contents($verifyUrl . '?secret=' . $secretKey . '&response=' . $token . '&remoteip=' . $remoteIp);
    $captcha = json_decode($response);

    if ($captcha->success && $captcha->score >= 0.5) {
        // Passed reCAPTCHA check
        $msg = "<h3>Hello, you got a new inquiry</h3>";

        foreach ($_POST as $key => $value) {
            if ($key !== 'token') {
                $msg .= "<p><strong>" . htmlspecialchars(strtoupper($key)) . ":</strong> " . htmlspecialchars($value) . "</p>";
            }
        }

        sendMail($msg);
        echo "success";
    } else {
        // reCAPTCHA failed
        http_response_code(403);
        echo "reCAPTCHA verification failed.";
    }
}
?>
