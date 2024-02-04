<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Property Search</title>
</head>
<body>
    <div class="container">
        <h1>Property Search</h1>
        <form action="search.php" method="GET">
            <label for="description">Description:</label>
            <input type="text" name="description">
            
            <label for="postal_code">Postal Code:</label>
            <input type="text" name="postal_code">

            <label for="street">Street:</label>
            <input type="text" name="street">
            
            <input type="submit" value="Search">
        </form>
    </div>
</body>
</html>
