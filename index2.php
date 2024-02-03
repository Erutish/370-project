

<?php include("head-nav-foot/header.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rent A Home</title>
    <link rel="stylesheet" href="./head-nav-foot/header.css">
    <link rel="stylesheet" href="styles/homepage.css">
    <link rel="stylesheet" href="./head-nav-foot/footer.css">
</head>

<body>

    <main>
        <!-- Top -->
        <div class="top-half">
            <div class="search">
                <form action="search/search.php" method="GET">
                    <!-- Description Search -->
                    <div class="search-box">
                        <svg xmlns="http://www.w3.org/2000/svg" class="search-logo" viewBox="0 0 16 16">
                            <path d="M11.742 10.35a6.5 6.5 0 1 0-1.392 1.393l4.564 4.563a1 1 0 0 0 1.415-1.414l-4.563-4.564zM6.5 11a4.5 4.5 0 1 1 0-9 4.5 4.5 0 0 1 0 9z" />
                        </svg>
                        <input type="text" name="description" placeholder="Description" value="<?php echo isset($_GET['description']) ? $_GET['description'] : ''; ?>">
                    </div>

                    <!-- Postal Code Search -->
                    <div class="search-box">
                        <svg xmlns="http://www.w3.org/2000/svg" class="search-logo" viewBox="0 0 16 16">
                            <path d="M11.742 10.35a6.5 6.5 0 1 0-1.392 1.393l4.564 4.563a1 1 0 0 0 1.415-1.414l-4.563-4.564zM6.5 11a4.5 4.5 0 1 1 0-9 4.5 4.5 0 0 1 0 9z" />
                        </svg>
                        <input type="text" name="postal_code" placeholder="Postal Code" value="<?php echo isset($_GET['postal_code']) ? $_GET['postal_code'] : ''; ?>">
                    </div>

                    <!-- Street Search -->
                    <div class="search-box">
                        <svg xmlns="http://www.w3.org/2000/svg" class="search-logo" viewBox="0 0 16 16">
                            <path d="M11.742 10.35a6.5 6.5 0 1 0-1.392 1.393l4.564 4.563a1 1 0 0 0 1.415-1.414l-4.563-4.564zM6.5 11a4.5 4.5 0 1 1 0-9 4.5 4.5 0 0 1 0 9z" />
                        </svg>
                        <input type="text" name="street" placeholder="Street" value="<?php echo isset($_GET['street']) ? $_GET['street'] : ''; ?>">
                    </div>

                    <input type="submit" value="Search">
                </form>
            </div>
        </div>
    </main>

    <!-- FOOTER -->
    <!-- <?php include("./head-nav-foot/footer.php"); ?> -->
</body>
</html>
