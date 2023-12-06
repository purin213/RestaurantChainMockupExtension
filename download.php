<?php
spl_autoload_extensions("php");
spl_autoload_register();

require_once 'vendor/autoload.php';

use Helpers\RandomGenerator;

$count = $_POST['count'] ?? 5;
$format = $_POST['format'] ?? 'html';

$count = (int)$count;

$users = RandomGenerator::users($count, $count);

if ($format === 'markdown') {
    header('Content-Type: text/markdown');
    header('Content-Disposition: attachment; filename="users.md"');
    foreach ($users as $user) {
        echo $user->toMarkdown();
    }
} elseif ($format === 'json') {
    header('Content-Type: application/json');
    header('Content-Disposition: attachment; filename="users.json"');
    $usersArray = array_map(fn($user) => $user->toArray(), $users);
    echo json_encode($usersArray);
} elseif ($format === 'txt') {
    header('Content-Type: text/plain');
    header('Content-Disposition: attachment; filename="users.txt"');
    foreach ($users as $user) {
        echo $user->toString();
    }
} else {
    header('Content-Type: text/html');
    foreach ($users as $user) {
        echo $user->toHTML();
    }
}
