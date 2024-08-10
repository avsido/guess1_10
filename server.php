<?php
session_start();

if (!isset($_SESSION['points'])) {
    $_SESSION['points'] = 0;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userGuess = intval($_POST['guess']);
    $randomNumber = rand(1, 10);

    if ($userGuess === $randomNumber) {
        $_SESSION['points']++;
        $response = [
            'message' => 'Correct! You guessed the right number.',
            'points' => $_SESSION['points']
        ];
    } else {
        $response = [
            'message' => 'Incorrect. The correct number was ' . $randomNumber,
            'points' => $_SESSION['points']
        ];
    }

    echo json_encode($response);
}
?>
