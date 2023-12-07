<?php
// コードベースのファイルのオートロード
spl_autoload_extensions(".php");
spl_autoload_register();

use Helpers\RandomGenerator;
// composerの依存関係のオートロード
require_once 'vendor/autoload.php';

// クエリ文字列からパラメータを取得
$min = $_GET['min'] ?? 2;
$max = $_GET['max'] ?? 10;

// パラメータが整数であることを確認
$min = (int)$min;
$max = (int)$max;

// ユーザーの生成
$restaurantChains = RandomGenerator::restaurantChains();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Profiles</title>
    <style>
        /* ユーザーカードのスタイル */
    </style>
    <link rel ="stylesheet" href="vendor/twbs/bootstrap/dist/css/bootstrap.css">
</head>
<body class="p-5">
    <h1>Restaurant Profiles</h1>
        <?php foreach($restaurantChains as $restaurantChain): ?>
            <div>
                <?php echo $restaurantChain->toHTML(); ?>
            </div>
        <?php endforeach; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
