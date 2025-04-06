<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cafe Product Search</title>
    <link rel="stylesheet" href="/Users/ronecesaab/Desktop/homework 9/public/assets/style.css">
</head>
<body>
    <div class="container">
        <h1>Search Our Products!</h1>
        <form method="GET" action="">
            <input type="text" name="search" placeholder="Search for products or categories" required>
            <button type="submit">Search</button>
        </form>

        <h3>Results:</h3>
        <ul id="product-list">
            <?php echo $productListHtml; ?>
        </ul>
    </div>
</body>
</html>

