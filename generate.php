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
        
        <label for="salary">Salary Range</label>
        <input type="number" name="salary" min="1" max="999999" value="5">

        <label for="locationCount">Number Of Locations</label>
        <input type="number" name="locationCount" min="1" max="999999" value="5">

        <label for="postNumberRange">Post Number Range</label>
        <input type="number" name="postNumberRange" min="11111" max="99999" value="5">

        <button type="submit">Generate</button>
    </form>
</body>
</html>
