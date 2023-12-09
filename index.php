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
 <form action="download.php" method="post">
        <label for="count">Number of Users:</label>
        <input type="number" id="count" name="count" min="1" max="100" value="5">

        <label for="format">Download Format:</label>
        <select id="format" name="format">
            <option value="html">HTML</option>
            <option value="markdown">Markdown</option>
            <option value="json">JSON</option>
            <option value="txt">Text</option>
        </select>

        <label for="employees">Total Chain Employees</label>
        <input type="number" name="employees" min="1" max="100" value="5">
        
        <label for="salaryMin">Minimum Salary</label>
        <input type="number" name="salaryMin" min="1" max="999999" value="5">

        <label for="salaryMax">Maximum Salary</label>
        <input type="number" name="salaryMax" min="1" max="999999" value="5">

        <label for="locationCount">Number Of Locations</label>
        <input type="number" name="locationCount" min="1" max="999999" value="5">

        <label for="postNumberMin">Post Number Minimum</label>
        <input type="number" name="postNumberMin" min="11111" max="99999" value="5">

        <label for="postNumberMax">Post Number Maximum</label>
        <input type="number" name="postNumberMax" min="11111" max="99999" value="5">

        <button type="submit">Generate</button>
    </form>
</body>
</html>
