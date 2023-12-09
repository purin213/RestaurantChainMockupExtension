<?php
spl_autoload_extensions("php");
spl_autoload_register();

require_once 'vendor/autoload.php';

use Helpers\RandomGenerator;

$count = $_POST['count'] ?? 5;
$format = $_POST['format'] ?? 'html';
$numOfEmployees = $_POST['employees'];
$salaryMin = $_POST['salaryMin'];
$salaryMax = $_POST['salaryMax'];
$locationCount = $_POST['locationCount'];
$postNumberMin = $_POST['postNumberMin'];
$postNumberMax = $_POST['postNumberMax'];

$count = (int)$count;

$restaurantChains = RandomGenerator::restaurantChains(
    $numOfEmployees, $salaryMin, $salaryMax,
    $locationCount, $postNumberMin, $postNumberMax
);

$deployContent = '';

if ($format === 'txt') {
    header('Content-Type: text/plain');
    header('Content-Disposition: attachment; filename="restaurantChains.txt"');
    foreach ($restaurantChains as $restaurantChain) {
        $deployContent .= $restaurantChain->toString();
    }
} elseif ($format === 'html') {
    header('Content-Type: text/html');
    foreach ($restaurantChains as $restaurantChain) {
        $deployContent .= $restaurantChain->toHTML();
    }
} elseif ($format === 'markdown') {
    header('Content-Type: text/markdown');
    header('Content-Disposition: attachment; filename="restaurantChains.md"');
    foreach ($restaurantChains as $restaurantChain) {
        $deployContent .= $restaurantChain->toMarkdown();
    }
} elseif ($format === 'json') {
    header('Content-Type: application/json');
    header('Content-Disposition: attachment; filename="restaurantChains.json"');
    $mappedRestaurantChains = array_map(fn($restaurantChain) => $restaurantChain->toArray(), $restaurantChains);
    $deployContent .= json_encode($mappedRestaurantChains);
} else {
    return null;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Profiles</title>
    <style></style>
    <link rel ="stylesheet" href="vendor/twbs/bootstrap/dist/css/bootstrap.css">
</head>
<body class="p-5">

    <?php if ($format === 'html') echo $deployContent; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
