<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generate Users</title>
</head>
<body>
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
        <input type="number" name="salaryMin" min="1" max="999999" value="20000">

        <label for="salaryMax">Maximum Salary</label>
        <input type="number" name="salaryMax" min="1" max="999999" value="120000">

        <label for="locationCount">Number Of Locations</label>
        <input type="number" name="locationCount" min="1" max="999999" value="1">

        <label for="postNumberMin">Post Number Minimum</label>
        <input type="number" name="postNumberMin" min="11111" max="99999" value="90001">

        <label for="postNumberMax">Post Number Maximum</label>
        <input type="number" name="postNumberMax" min="11111" max="99999" value="90899">

        <button type="submit">Generate</button>
    </form>
</body>
</html>
