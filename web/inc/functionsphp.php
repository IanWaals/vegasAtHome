<?php

//database connection
function dbConnect(){
    // Database connection parameters
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "vegas@home";

    // Create a new mysqli connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    // Check if the connection works
    if ($conn->connect_error){
        die("connection failed: " . $conn->connect_error);
    }

    return $conn;
}

//get the navigation items
function getNavigation(){
    $conn = dbConnect();

    $sql = "SELECT * FROM navigation";

    // Query the database and get results
    $resource = $conn->query($sql) or die($conn->error);

    // Collecting all rows as separate arrays
    $navItems = $resource->fetch_all(MYSQLI_ASSOC);

    return $navItems;
}

function getCreditsValues(){
    $conn = dbConnect();

    $sql = "SELECT * FROM buycredits";

    // Query the database and get results
    $resource = $conn->query($sql) or die($conn->error);

    // Collecting all rows as separate arrays
    $credits = $resource->fetch_all(MYSQLI_ASSOC);

    return $credits;
}


function HtmlHead($pagetitle) {
    $navItems = getNavigation();
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <title><?php echo $pagetitle ?></title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/style.css" type="text/css" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Holtwood+One+SC&display=swap" rel="stylesheet">
    </head>
    <body>
        <header>
            <img class="banner" src="images/logos/website/header_logo.png" alt="the website banner">
            <nav>
                credits: 1000
                <div>
                    <?php
                    foreach ($navItems as $navItem) {
                        ?>
                        <a href="<?php echo $navItem['navURL'] ?>"><?php echo $navItem['navTitle']; ?></a>
                        <?php
                    }
                    ?>
                </div>
                
            </nav>
        </header>
        
    </html>
    <?php
}

function HtmlFoot(){
    ?>
    </main>
        <footer class="footer">
            <u>Must be 18+ | Gambling problem? <b>Call 1-800-GAMBLER</b> | Odds and lines are subject to change</u>
        </footer>        
        </body>
    </html>
    <?php
}