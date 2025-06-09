<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Data Parser</title>
</head>
<body>
<h1>Data Parser</h1>

<form method="GET" action="">
    <label for="source">Choose data source:</label>
    <select name="source" id="source">
        <option value="news" <?= $_GET['source'] === 'news' ? 'selected' : '' ?>>News</option>
        <option value="weather" <?= $_GET['source'] === 'weather' ? 'selected' : '' ?>>Weather</option>
    </select>
    <button type="submit">Fetch Data</button>
</form>


<hr>

<div>
    <?= $content ?? '' ?>
</div>
</body>
</html>
