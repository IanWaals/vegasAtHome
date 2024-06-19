<?php

//database connection
function DbConnect(){
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
function GetNavigation(){
    $conn = dbConnect();

    $sql = "SELECT * FROM navigation";

    // Query the database and get results
    $resource = $conn->query($sql) or die($conn->error);

    // Collecting all rows as separate arrays
    $navItems = $resource->fetch_all(MYSQLI_ASSOC);

    return $navItems;
}

function GetOverview(){
    $conn = dbConnect();

    $sql = "SELECT * FROM overviewnav";

    // Query the database and get results
    $resource = $conn->query($sql) or die($conn->error);

    // Collecting all rows as separate arrays
    $overviewItems = $resource->fetch_all(MYSQLI_ASSOC);

    return $overviewItems;
}

function GetCreditsValues(){
    $conn = dbConnect();

    $sql = "SELECT * FROM buycredits";

    // Query the database and get results
    $resource = $conn->query($sql) or die($conn->error);

    // Collecting all rows as separate arrays
    $credits = $resource->fetch_all(MYSQLI_ASSOC);

    return $credits;
}
function GetNbaTeams(){
    $conn = dbConnect();

    $sql = "SELECT * FROM nbateams";

    // Query the database and get results
    $resource = $conn->query($sql) or die($conn->error);

    // Collecting all rows as separate arrays
    $nbaTeams = $resource->fetch_all(MYSQLI_ASSOC);

    return $nbaTeams;
}

function GetNflTeams(){
    $conn = dbConnect();

    $sql = "SELECT * FROM nflteams";

    // Query the database and get results
    $resource = $conn->query($sql) or die($conn->error);

    // Collecting all rows as separate arrays
    $nflTeams = $resource->fetch_all(MYSQLI_ASSOC);

    return $nflTeams;
}

function GetNbaSchedule(){
    $conn = dbConnect();

    $sql = "SELECT * FROM nbaschedule";

    // Query the database and get results
    $resource = $conn->query($sql) or die($conn->error);

    // Collecting all rows as separate arrays
    $nbaGames = $resource->fetch_all(MYSQLI_ASSOC);

    return $nbaGames;
}

function GetNflSchedule(){
    $conn = dbConnect();

    $sql = "SELECT * FROM nflschedule";

    // Query the database and get results
    $resource = $conn->query($sql) or die($conn->error);

    // Collecting all rows as separate arrays
    $nflGames = $resource->fetch_all(MYSQLI_ASSOC);

    return $nflGames;
}

function GetNbaPlayers(){
    $conn = dbConnect();

    $sql = "SELECT * FROM nbaplayers";

    // Query the database and get results
    $resource = $conn->query($sql) or die($conn->error);

    // Collecting all rows as separate arrays
    $nbaPlayers = $resource->fetch_all(MYSQLI_ASSOC);

    return $nbaPlayers;
}

function GetNflPlayers(){
    $conn = dbConnect();

    $sql = "SELECT * FROM nflplayers";

    // Query the database and get results
    $resource = $conn->query($sql) or die($conn->error);

    // Collecting all rows as separate arrays
    $nflPlayers = $resource->fetch_all(MYSQLI_ASSOC);

    return $nflPlayers;
}



function HtmlHead($pagetitle) {
    // Start the session if it hasn't been started already
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    // Initialize or get credits from session
    if (!isset($_SESSION['credits'])) {
        $_SESSION['credits'] = 1000;
    }
    $credits = $_SESSION['credits'];

    $navItems = getNavigation();
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <title><?php echo htmlspecialchars($pagetitle, ENT_QUOTES, 'UTF-8'); ?></title>
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
                credits: <?php echo htmlspecialchars($_SESSION['credits'], ENT_QUOTES, 'UTF-8'); ?>
                <div>
                    <?php foreach ($navItems as $navItem) { ?>
                        <a href="<?php echo htmlspecialchars($navItem['navURL'], ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlspecialchars($navItem['navTitle'], ENT_QUOTES, 'UTF-8'); ?></a>
                    <?php } ?>
                </div>
            </nav>
        </header>
    </html>
    <?php
}

function NbaHead($pagetitle, $team) {
    // Start the session if it hasn't been started already
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    $navItems = getNavigation();
    $overviewItems = GetOverview();
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <title><?php echo htmlspecialchars($pagetitle, ENT_QUOTES, 'UTF-8'); ?></title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/style.css" type="text/css" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Holtwood+One+SC&display=swap" rel="stylesheet">
        <script src="inc/functionsjs.js"></script>
    </head>
    <body>
        <header>
            <nav>
                credits: <?php echo htmlspecialchars($_SESSION['credits'], ENT_QUOTES, 'UTF-8'); ?>
                <div>
                    <?php foreach ($navItems as $navItem) { ?>
                        <a href="<?php echo htmlspecialchars($navItem['navURL'], ENT_QUOTES, 'UTF-8'); ?>?save=no"><?php echo htmlspecialchars($navItem['navTitle'], ENT_QUOTES, 'UTF-8'); ?></a>
                    <?php } ?>
                </div>
            </nav>
            <img class="banner" src="images/logos/basketball/header_logo_basketball.png" alt="the basketball banner">
            <nav class="bottomNav">
                <u><?php echo htmlspecialchars($team, ENT_QUOTES, 'UTF-8'); ?></u>
                <div>
                    <?php foreach ($overviewItems as $overviewItem) {
                        if ($overviewItem['Sport'] == "nba") {
                            ?>
                            <a href="<?php echo htmlspecialchars($overviewItem['navURL'], ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlspecialchars($overviewItem['navTitle'], ENT_QUOTES, 'UTF-8'); ?></a>
                            <?php
                        }
                    } ?>
                </div>
            </nav>
        </header>
    </html>
    <?php
}

function NflHead($pagetitle, $team) {
    // Start the session if it hasn't been started already
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    $navItems = getNavigation();
    $overviewItems = GetOverview();
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <title><?php echo htmlspecialchars($pagetitle, ENT_QUOTES, 'UTF-8'); ?></title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/style.css" type="text/css" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Holtwood+One+SC&display=swap" rel="stylesheet">
        <script src="inc/functionsjs.js"></script>
    </head>
    <body>
        <header>
            <nav>
                credits: <?php echo htmlspecialchars($_SESSION['credits'], ENT_QUOTES, 'UTF-8'); ?>
                <div>
                    <?php foreach ($navItems as $navItem) { ?>
                        <a href="<?php echo htmlspecialchars($navItem['navURL'], ENT_QUOTES, 'UTF-8'); ?>?save=no"><?php echo htmlspecialchars($navItem['navTitle'], ENT_QUOTES, 'UTF-8'); ?></a>
                    <?php } ?>
                </div>
            </nav>
            <img class="banner" src="images/logos/football/header_logo_football.png" alt="the football banner">
            <nav class="bottomNav">
                <u><?php echo htmlspecialchars($team, ENT_QUOTES, 'UTF-8'); ?></u>
                <div>
                    <?php foreach ($overviewItems as $overviewItem) {
                        if ($overviewItem['Sport'] == "nfl") {
                            ?>
                            <a href="<?php echo htmlspecialchars($overviewItem['navURL'], ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlspecialchars($overviewItem['navTitle'], ENT_QUOTES, 'UTF-8'); ?></a>
                            <?php
                        }
                    } ?>
                </div>
            </nav>
        </header>
    </html>
    <?php
}

function DisplayTeams($sport) {
    $nbaTeams = GetNbaTeams();
    $nflTeams = GetNflTeams();
    if ($sport == "basketball") {
        ?>
        <section class="logosGrid">
            <?php
            foreach ($nbaTeams as $nbaTeam) {
                ?>
                <a href="handleTeam.php?sport=basketball&team=<?php echo $nbaTeam['teamId'];?>">
                    <img class="teamImage" src="images/team_logos/nba/<?php echo $nbaTeam['teamConference']; ?>/<?php echo $nbaTeam['teamLogo']; ?>" 
                    alt="the logo of the <?php echo $nbaTeam['teamName']; ?>">
                </a>
                <?php
            }
            ?>
        </section>
        <?php
    }
    elseif ($sport == "football") {
        ?>
        <section class="logosGrid">
            <?php
            foreach ($nflTeams as $nflTeam) {
                ?>
                <a href="handleTeam.php?sport=football&team=<?php echo $nflTeam['teamId'];?>">
                    <img class="teamImageNfl" src="images/team_logos/nfl/<?php echo $nflTeam['teamConference']; ?>/<?php echo $nflTeam['teamLogo']; ?>" 
                    alt="the logo of the <?php echo $nflTeam['teamName']; ?>">
                </a>
                <?php
            }
            ?>
        </section>
        <?php
    }
}

function DisplayOverview($sport, $team) {
    $nbaTeams = GetNbaTeams();
    $nbaGames = GetNbaSchedule();

    $nflTeams = GetnflTeams();
    $nflGames = GetnflSchedule();

    $opponent = "";
    if ($sport == "basketball") {
        ?>
        <h1>Overview</h1>
        <?php
        foreach ($nbaGames as $nbaGame) {
            if ($nbaGame['home_team'] == $team) {
                $location = "VS";
                $opponent = $nbaGame['away_team'];
            }
            elseif ($nbaGame['away_team'] == $team) {
                $location = "@";
                $opponent = $nbaGame['home_team'];
            }
            else {
                $location = "";
            }
            if ($location != "") {
                ?>
                <div class="overviewContainer">
                    <section class="yourTeam">
                        <h2>Your team:</h2>
                        <p><u><?php echo $team; ?></u></p>
                        <?php
                        foreach ($nbaTeams as $nbaTeam) {
                            if ($team == $nbaTeam['teamName']) {
                                ?>
                                <img src="images/team_logos/nba/<?php echo $nbaTeam['teamConference']; ?>/<?php echo $nbaTeam['teamLogo']; ?>" alt="team image" width="300">
                                <?php
                            }
                        }
                        ?>
                        <a href="sportsBet.php?sport=nba&action=roster"><button class="overviewButton"><b class="whiteOutline">VIEW ROSTER</b></button></a>
                    </section>
                    <?php
                        foreach ($nbaTeams as $nbaTeam) {
                            if ($location == "VS") {
                                if ($team == $nbaTeam['teamName']) {
                                    ?>
                                    <img class="stadiumImage" src="images/team_stadiums/nba/<?php echo $nbaTeam['teamStadium'];?>" alt="team image">
                                    <?php
                                }
                            }
                            elseif ($opponent == $nbaTeam['teamName']) {
                                ?>
                                <img class="stadiumImage" src="images/team_stadiums/nba/<?php echo $nbaTeam['teamStadium'];?>" alt="team image">
                                <?php
                            }
                        }
                    ?>
                    <section class="nextGame">
                        <h2>Next game:</h2>
                        <p><?php echo $location . " <u>" . $opponent . "</u>"; ?></p>
                        <?php
                        foreach ($nbaTeams as $nbaTeam) {
                            if ($opponent == $nbaTeam['teamName']) {
                                ?>
                                <img src="images/team_logos/nba/<?php echo $nbaTeam['teamConference']; ?>/<?php echo $nbaTeam['teamLogo']; ?>" alt="team image" width="300">
                                <?php
                            }
                        }
                        ?>
                        <button class="overviewButton" id="modalButton"><b class="whiteOutline">PLACE BET</b></button>
                    </section>
                </div>
                <div id="modalDiv" class="modal">
                    <section class="modal-content">
                    <span class="close">&times;</span>
                        <h1>Place Bet</h1>
                        <form method="post" action="handleTeam.php?sport=nba" class="parlay1">
                            <table>
                                <tr>
                                    <th>Bet nr.</th>
                                    <th>Type</th>
                                    <th>Parlay</th>
                                    <th>Your bet</th>
                                </tr>
                                <tr>
                                    <td>1.</td>
                                    <td>
                                        <?php echo $nbaGame['home_team'] . " o/u 107.5 points"?>
                                    </td>
                                    <td>
                                        <select name="parlay1Ou" class="betSelect">
                                            <option value="over<?php echo $nbaGame['home_team']; ?>">Over</option>
                                            <option value="under<?php echo $nbaGame['home_team']; ?>">Under</option>
                                        </select>
                                    </td>
                                    <td>
                                        <input type="number" name="parlay1Bet" class="formItemSmall" placeholder="€ Place your bet">
                                    </td>
                                </tr>
                                <tr>
                                    <td>2.</td>
                                    <td>Who will win the game?</td>
                                    <td>
                                        <select name="winnerSelect" class="betSelect">
                                            <option value="<?php echo $nbaGame['home_team'];?>"><?php echo $nbaGame['home_team'];?></option>
                                            <option value="<?php echo $nbaGame['away_team'];?>"><?php echo $nbaGame['away_team'];?></option>
                                        </select>
                                    </td>
                                    <td>
                                        <input type="number" name="parlay2Bet" class="formItemSmall" placeholder="€ Place your bet">
                                    </td>
                                </tr>
                                <tr>
                                    <td>3.</td>
                                    <td>
                                        <?php echo $nbaGame['away_team'] . " o/u 107.5 points"?>
                                    </td>
                                    <td>
                                        <select name="parlay3Ou" class="betSelect">
                                            <option value="over<?php echo $nbaGame['away_team']; ?>">Over</option>
                                            <option value="under<?php echo $nbaGame['away_team']; ?>">Under</option>
                                        </select>
                                    </td>
                                    <td>
                                            <input type="number" name="parlay3Bet" class="formItemSmall" placeholder="€ Place your bet">
                                    </td>
                                </tr>
                            </table>
                            If you bet more credits than you have the bets will not come through!!
                            <button name="parlaySubmit" class="overviewButton" id="tableButton"><b class="whiteOutline">Submit</b></button>
                        </form>
                    </section>
                </div>
                <script>
                    // Get the modal
                    var modal = document.getElementById("modalDiv");

                    // Get the button that opens the modal
                    var btn = document.getElementById("modalButton");

                    // Get the <span> element that closes the modal
                    var span = document.getElementsByClassName("close")[0];

                    // When the user clicks on the button, open the modal
                    btn.onclick = function() {
                    modal.style.display = "block";
                    }

                    // When the user clicks on <span> (x), close the modal
                    span.onclick = function() {
                    modal.style.display = "none";
                    }

                    // When the user clicks anywhere outside of the modal, close it
                    window.onclick = function(event) {
                        if (event.target == modal) {
                            modal.style.display = "none";
                        }
                    }
                </script>
                <br>
                <?php
                break;
            }
        }
    }
    elseif ($sport == "football") {
        ?>
        <h1>Overview</h1>
        <?php
        foreach ($nflGames as $nflGame) {
            if ($nflGame['home_team'] == $team) {
                $location = "VS";
                $opponent = $nflGame['away_team'];
            }
            elseif ($nflGame['away_team'] == $team) {
                $location = "@";
                $opponent = $nflGame['home_team'];
            }
            else {
                $location = "";
            }
            if ($location != "") {
                ?>
                <div class="overviewContainer">
                    <section class="yourTeam">
                        <h2>Your team:</h2>
                        <p><u><?php echo $team; ?></u></p>
                        <?php
                        foreach ($nflTeams as $nflTeam) {
                            if ($team == $nflTeam['teamName']) {
                                ?>
                                <img src="images/team_logos/nfl/<?php echo $nflTeam['teamConference']; ?>/<?php echo $nflTeam['teamLogo']; ?>" alt="team image" width="300">
                                <?php
                            }
                        }
                        ?>
                        <a href="sportsBet.php?sport=nfl&action=roster"><button class="overviewButton"><b class="whiteOutline">VIEW ROSTER</b></button></a>
                    </section>
                    <?php
                        foreach ($nflTeams as $nflTeam) {
                            if ($location == "VS") {
                                if ($team == $nflTeam['teamName']) {
                                    ?>
                                    <img class="stadiumImage" src="images/team_stadiums/nfl/<?php echo $nflTeam['teamStadium'];?>" alt="team image">
                                    <?php
                                }
                            }
                            elseif ($opponent == $nflTeam['teamName']) {
                                ?>
                                <img class="stadiumImage" src="images/team_stadiums/nfl/<?php echo $nflTeam['teamStadium'];?>" alt="team image">
                                <?php
                            }
                        }
                    ?>
                    <section class="nextGame">
                        <h2>Next game:</h2>
                        <p><?php echo $location . " <u>" . $opponent . "</u>"; ?></p>
                        <?php
                        foreach ($nflTeams as $nflTeam) {
                            if ($opponent == $nflTeam['teamName']) {
                                ?>
                                <img src="images/team_logos/nfl/<?php echo $nflTeam['teamConference']; ?>/<?php echo $nflTeam['teamLogo']; ?>" alt="team image" width="300">
                                <?php
                            }
                        }
                        ?>
                        <button class="overviewButton" id="modalButton"><b class="whiteOutline">PLACE BET</b></button>
                    </section>
                </div>
                <div id="modalDiv" class="modal">
                    <section class="modal-content">
                    <span class="close">&times;</span>
                        <h1>Place Bet</h1>
                        <form method="post" action="handleTeam.php?sport=nfl" class="parlay1">
                            <table>
                                <tr>
                                    <th>Bet nr.</th>
                                    <th>Type</th>
                                    <th>Parlay</th>
                                    <th>Your bet</th>
                                </tr>
                                <tr>
                                    <td>1.</td>
                                    <td>
                                        <?php echo $nflGame['home_team'] . " o/u 23.5 points"?>
                                    </td>
                                    <td>
                                        <select name="parlay1Ou" class="betSelect">
                                            <option value="over<?php echo $nflGame['home_team']; ?>">Over</option>
                                            <option value="under<?php echo $nflGame['home_team']; ?>">Under</option>
                                        </select>
                                    </td>
                                    <td>
                                        <input type="number" name="parlay1Bet" class="formItemSmall" placeholder="€ Place your bet">
                                    </td>
                                </tr>
                                <tr>
                                    <td>2.</td>
                                    <td>Who will win the game?</td>
                                    <td>
                                        <select name="winnerSelect" class="betSelect">
                                            <option value="<?php echo $nflGame['home_team'];?>"><?php echo $nflGame['home_team'];?></option>
                                            <option value="<?php echo $nflGame['away_team'];?>"><?php echo $nflGame['away_team'];?></option>
                                        </select>
                                    </td>
                                    <td>
                                        <input type="number" name="parlay2Bet" class="formItemSmall" placeholder="€ Place your bet">
                                    </td>
                                </tr>
                                <tr>
                                    <td>3.</td>
                                    <td>
                                        <?php echo $nflGame['away_team'] . " o/u 23.5 points"?>
                                    </td>
                                    <td>
                                        <select name="parlay3Ou" class="betSelect">
                                            <option value="over<?php echo $nflGame['away_team']; ?>">Over</option>
                                            <option value="under<?php echo $nflGame['away_team']; ?>">Under</option>
                                        </select>
                                    </td>
                                    <td>
                                            <input type="number" name="parlay3Bet" class="formItemSmall" placeholder="€ Place your bet">
                                    </td>
                                </tr>
                            </table>
                            If you bet more credits than you have the bets will not come through!!
                            <button name="parlaySubmit" class="overviewButton" id="tableButton"><b class="whiteOutline">Submit</b></button>
                        </form>
                    </section>
                </div>
                <script>
                    // Get the modal
                    var modal = document.getElementById("modalDiv");

                    // Get the button that opens the modal
                    var btn = document.getElementById("modalButton");

                    // Get the <span> element that closes the modal
                    var span = document.getElementsByClassName("close")[0];

                    // When the user clicks on the button, open the modal
                    btn.onclick = function() {
                    modal.style.display = "block";
                    }

                    // When the user clicks on <span> (x), close the modal
                    span.onclick = function() {
                    modal.style.display = "none";
                    }

                    // When the user clicks anywhere outside of the modal, close it
                    window.onclick = function(event) {
                        if (event.target == modal) {
                            modal.style.display = "none";
                        }
                    }
                </script>
                <br>
                <?php
                break;
            }
        }
    }
}

function DisplayPending($sport, $team) {
    $location = "";
    $opponent = "";
    $nbaGames = GetNbaSchedule();
    $nbaTeams = GetNbaTeams();
    $nflGames = GetNflSchedule();
    $nflTeams = GetNflTeams();
    if ($sport == "basketball") {
        ?><h1>Pending bets</h1><?php
        foreach ($nbaGames as $nbaGame) {
            if ($nbaGame['home_team'] == $team) {
                $location = "VS";
                $opponent = $nbaGame['away_team'];
            }
            elseif ($nbaGame['away_team'] == $team) {
                $location = "@";
                $opponent = $nbaGame['home_team'];
            }
            else {
                $location = "";
            }

            if ($location != "") {
                ?>
                <section class="pendingBets">
                    <h2>For game: <?php echo $team . " " . $location . " " . $opponent; ?></h2>
                    <table>
                        <tr>
                            <th></th>
                            <th>Your parlay</th>
                            <th>Bet</th>
                        </tr>
                        <tr>
                            <?php
                            if ($_SESSION['parlay1ou'] == "over" . $nbaGame['home_team']) {
                                $parlay1 = "Over";
                            } 
                            else {
                                $parlay1 = "Under";
                            }
                            ?>
                            <td>O/U for the <?php echo $nbaGame['home_team']; ?></td>
                            <td><?php echo $parlay1; ?></td>
                            <td><?php echo $_SESSION['parlay1']; ?></td>
                        </tr>
                        <tr>
                            <td>For the victorious team of the game</td>
                            <td><?php echo $_SESSION['winningTeam']; ?></td>
                            <td><?php echo $_SESSION['parlay2']; ?></td>
                        </tr>
                        <tr>
                            <?php
                            if ($_SESSION['parlay3ou'] == "over" . $nbaGame['away_team']) {
                                $parlay3 = "Over";
                            } 
                            else {
                                $parlay3 = "Under";
                            }
                            ?>
                            <td>O/U for the <?php echo $nbaGame['away_team']; ?></td>
                            <td><?php echo $parlay3; ?></td>
                            <td><?php echo $_SESSION['parlay3']; ?></td>
                        </tr>
                    </table>
                    <br>
                    <button class="overviewButton" id="openModalButton"><b class="whiteOutline">Get bet results</b></button>
                    <button class="overviewButton">Next game</button>
                </section>
                <div id="openModalDiv" class="modal">
                    <section class="modal-content">
                        <span class="close">&times;</span>
                        <h1>Bet Results</h1>
                        <section id="betResults">
                            <?php
                            foreach ($nbaTeams as $nbaTeam) {
                                if ($team == $nbaTeam['teamName']) {
                                    ?>
                                    <img src="images/team_logos/nba/<?php echo $nbaTeam['teamConference']; ?>/<?php echo $nbaTeam['teamLogo']; ?>" alt="team image" width="150">
                                    <?php
                                }
                            }
                            ?>
                            <p class="versus"><?php echo $location; ?></p>
                            <?php
                            foreach ($nbaTeams as $nbaTeam) {
                                if ($opponent == $nbaTeam['teamName']) {
                                    ?>
                                    <img src="images/team_logos/nba/<?php echo $nbaTeam['teamConference']; ?>/<?php echo $nbaTeam['teamLogo']; ?>" alt="team image" width="150">
                                    <?php
                                }
                            }
                            ?>
                        </section>
                        <?php 
                        if ($location == "VS") {
                            ?><h2><?php echo $nbaGame['home_points'] . " - " . $nbaGame['away_points'];?></h2><?php
                        }
                        else {
                            ?><h2><?php echo $nbaGame['away_points'] . " - " . $nbaGame['home_points'];?></h2><?php
                        }
                        ?>
                        <table>
                        <tr>
                            <th></th>
                            <th>Your parlay</th>
                            <th>Bet</th>
                            <th>Payout</th>
                        </tr>
                        <tr>
                            <?php
                            if ($_SESSION['parlay1ou'] == "over" . $nbaGame['home_team']) {
                                $parlay1 = "Over";
                            } 
                            else {
                                $parlay1 = "Under";
                            }
                            ?>
                            <td>O/U for the <?php echo $nbaGame['home_team']; ?></td>
                            <td><?php echo $parlay1; ?></td>
                            <td><?php echo $_SESSION['parlay1']; ?></td>
                            <td>
                                <?php
                                switch ($parlay1) {
                                    case "Over":
                                        if ($nbaGame['home_points'] >= 108) {
                                            $_SESSION['parlay1'] *= 1.5;
                                            $_SESSION['credits'] += $_SESSION['parlay1'];
                                        }
                                        else {
                                            $_SESSION['parlay1'] = 0;
                                        }
                                        break;
                                    case "Under":
                                        if ($nbaGame['home_points'] >= 108) {
                                            $_SESSION['parlay1'] = 0;
                                        }
                                        else {
                                            $_SESSION['parlay1'] *= 1.5;
                                            $_SESSION['credits'] += $_SESSION['parlay1'];
                                        }
                                        break;
                                }
                                ?>
                                <?php echo $_SESSION['parlay1']?>
                            </td>
                        </tr>
                        <tr>
                            <td>For the victorious team of the game</td>
                            <td><?php echo $_SESSION['winningTeam']; ?></td>
                            <td><?php echo $_SESSION['parlay2']; ?></td>
                            <td>
                                <?php
                                if ($_SESSION['winningTeam'] == $nbaGame['winner']) {
                                    $_SESSION['parlay2'] *= 1.5;
                                    $_SESSION['credits'] += $_SESSION['parlay2'];
                                } else {
                                    $_SESSION['parlay2'] = 0;
                                }
                                ?>
                                <?php echo $_SESSION['parlay2']; ?>
                            </td>
                        </tr>
                        <tr>
                            <?php
                            if ($_SESSION['parlay3ou'] == "over" . $nbaGame['away_team']) {
                                $parlay3 = "Over";
                            } 
                            else {
                                $parlay3 = "Under";
                            }
                            ?>
                            <td>O/U for the <?php echo $nbaGame['away_team']; ?></td>
                            <td><?php echo $parlay3; ?></td>
                            <td><?php echo $_SESSION['parlay3']; ?></td>
                            <td>
                                <?php
                                switch ($parlay3) {
                                    case "Over":
                                        if ($nbaGame['away_points'] >= 108) {
                                            $_SESSION['parlay3'] *= 1.5;
                                            $_SESSION['credits'] += $_SESSION['parlay3'];
                                        }
                                        else {
                                            $_SESSION['parlay3'] = 0;
                                        }
                                        break;
                                    case "Under":
                                        if ($nbaGame['away_points'] >= 108) {
                                            $_SESSION['parlay3'] = 0;
                                        }
                                        else {
                                            $_SESSION['parlay3'] *= 1.5;
                                            $_SESSION['credits'] += $_SESSION['parlay3'];
                                        }
                                        break;
                                }
                                ?>
                                <?php echo $_SESSION['parlay3']?>
                            </td>
                        </tr>
                    </table>
                    <?php
                    $_SESSION['parlay1'] = 0;
                    $_SESSION['parlay2'] = 0;
                    $_SESSION['parlay3'] = 0;
                    ?>
                    </section>
                    <br><br><br>
                </div>
                <br><br>
                <script>
                    // Get the modal
                    var modal = document.getElementById("openModalDiv");

                    // Get the button that opens the modal
                    var btn = document.getElementById("openModalButton");

                    // Get the <span> element that closes the modal
                    var span = document.getElementsByClassName("close")[0];

                    // When the user clicks on the button, open the modal
                    btn.onclick = function() {
                    modal.style.display = "block";
                    }

                    // When the user clicks on <span> (x), close the modal
                    span.onclick = function() {
                    modal.style.display = "none";
                    location.reload();
                    }

                    // When the user clicks anywhere outside of the modal, close it
                    window.onclick = function(event) {
                        if (event.target == modal) {
                            modal.style.display = "none";
                        }
                    }
                </script>
                <?php
                break;
            }
        }
    }
    elseif ($sport == "football") {
        ?><h1>Pending bets</h1><?php
        foreach ($nflGames as $nflGame) {
            if ($nflGame['home_team'] == $team) {
                $location = "VS";
                $opponent = $nflGame['away_team'];
            }
            elseif ($nflGame['away_team'] == $team) {
                $location = "@";
                $opponent = $nflGame['home_team'];
            }
            else {
                $location = "";
            }

            if ($location != "") {
                ?>
                <section class="pendingBets">
                    <h2>For game: <?php echo $team . " " . $location . " " . $opponent; ?></h2>
                    <table>
                        <tr>
                            <th></th>
                            <th>Your parlay</th>
                            <th>Bet</th>
                        </tr>
                        <tr>
                            <?php
                            if ($_SESSION['parlay1ou'] == "over" . $nflGame['home_team']) {
                                $parlay1 = "Over";
                            } 
                            else {
                                $parlay1 = "Under";
                            }
                            ?>
                            <td>O/U for the <?php echo $nflGame['home_team']; ?></td>
                            <td><?php echo $parlay1; ?></td>
                            <td><?php echo $_SESSION['parlay1']; ?></td>
                        </tr>
                        <tr>
                            <td>For the victorious team of the game</td>
                            <td><?php echo $_SESSION['winningTeam']; ?></td>
                            <td><?php echo $_SESSION['parlay2']; ?></td>
                        </tr>
                        <tr>
                            <?php
                            if ($_SESSION['parlay3ou'] == "over" . $nflGame['away_team']) {
                                $parlay3 = "Over";
                            } 
                            else {
                                $parlay3 = "Under";
                            }
                            ?>
                            <td>O/U for the <?php echo $nflGame['away_team']; ?></td>
                            <td><?php echo $parlay3; ?></td>
                            <td><?php echo $_SESSION['parlay3']; ?></td>
                        </tr>
                    </table>
                    <br>
                    <button class="overviewButton" id="openModalButton"><b class="whiteOutline">Get bet results</b></button>
                </section>
                <div id="openModalDiv" class="modal">
                    <section class="modal-content">
                        <span class="close">&times;</span>
                        <h1>Bet Results</h1>
                        <section id="betResults">
                            <?php
                            foreach ($nflTeams as $nflTeam) {
                                if ($team == $nflTeam['teamName']) {
                                    ?>
                                    <img src="images/team_logos/nfl/<?php echo $nflTeam['teamConference']; ?>/<?php echo $nflTeam['teamLogo']; ?>" alt="team image" width="150">
                                    <?php
                                }
                            }
                            ?>
                            <p class="versus"><?php echo $location; ?></p>
                            <?php
                            foreach ($nflTeams as $nflTeam) {
                                if ($opponent == $nflTeam['teamName']) {
                                    ?>
                                    <img src="images/team_logos/nfl/<?php echo $nflTeam['teamConference']; ?>/<?php echo $nflTeam['teamLogo']; ?>" alt="team image" width="150">
                                    <?php
                                }
                            }
                            ?>
                        </section>
                        <?php 
                        if ($location == "VS") {
                            ?><h2><?php echo $nflGame['home_points'] . " - " . $nflGame['away_points'];?></h2><?php
                        }
                        else {
                            ?><h2><?php echo $nflGame['away_points'] . " - " . $nflGame['home_points'];?></h2><?php
                        }
                        ?>
                        <table>
                        <tr>
                            <th></th>
                            <th>Your parlay</th>
                            <th>Bet</th>
                            <th>Payout</th>
                        </tr>
                        <tr>
                            <?php
                            if ($_SESSION['parlay1ou'] == "over" . $nflGame['home_team']) {
                                $parlay1 = "Over";
                            } 
                            else {
                                $parlay1 = "Under";
                            }
                            ?>
                            <td>O/U for the <?php echo $nflGame['home_team']; ?></td>
                            <td><?php echo $parlay1; ?></td>
                            <td><?php echo $_SESSION['parlay1']; ?></td>
                            <td>
                                <?php
                                switch ($parlay1) {
                                    case "Over":
                                        if ($nflGame['home_points'] >= 24) {
                                            $_SESSION['parlay1'] *= 1.5;
                                            $_SESSION['credits'] += $_SESSION['parlay1'];
                                        }
                                        else {
                                            $_SESSION['parlay1'] = 0;
                                        }
                                        break;
                                    case "Under":
                                        if ($nflGame['home_points'] >= 24) {
                                            $_SESSION['parlay1'] = 0;
                                        }
                                        else {
                                            $_SESSION['parlay1'] *= 1.5;
                                            $_SESSION['credits'] += $_SESSION['parlay1'];
                                        }
                                        break;
                                }
                                ?>
                                <?php echo $_SESSION['parlay1']?>
                            </td>
                        </tr>
                        <tr>
                            <td>For the victorious team of the game</td>
                            <td><?php echo $_SESSION['winningTeam']; ?></td>
                            <td><?php echo $_SESSION['parlay2']; ?></td>
                            <td>
                                <?php
                                if ($_SESSION['winningTeam'] == $nflGame['winner']) {
                                    $_SESSION['parlay2'] *= 1.5;
                                    $_SESSION['credits'] += $_SESSION['parlay2'];
                                } else {
                                    $_SESSION['parlay2'] = 0;
                                }
                                ?>
                                <?php echo $_SESSION['parlay2']; ?>
                            </td>
                        </tr>
                        <tr>
                            <?php
                            if ($_SESSION['parlay3ou'] == "over" . $nflGame['away_team']) {
                                $parlay3 = "Over";
                            } 
                            else {
                                $parlay3 = "Under";
                            }
                            ?>
                            <td>O/U for the <?php echo $nflGame['away_team']; ?></td>
                            <td><?php echo $parlay3; ?></td>
                            <td><?php echo $_SESSION['parlay3']; ?></td>
                            <td>
                                <?php
                                switch ($parlay3) {
                                    case "Over":
                                        if ($nflGame['away_points'] >= 24) {
                                            $_SESSION['parlay3'] *= 1.5;
                                            $_SESSION['credits'] += $_SESSION['parlay3'];
                                        }
                                        else {
                                            $_SESSION['parlay3'] = 0;
                                        }
                                        break;
                                    case "Under":
                                        if ($nflGame['away_points'] >= 24) {
                                            $_SESSION['parlay3'] = 0;
                                        }
                                        else {
                                            $_SESSION['parlay3'] *= 1.5;
                                            $_SESSION['credits'] += $_SESSION['parlay3'];
                                        }
                                        break;
                                }
                                ?>
                                <?php echo $_SESSION['parlay3']?>
                            </td>
                        </tr>
                    </table>
                    <?php
                    $_SESSION['parlay1'] = 0;
                    $_SESSION['parlay2'] = 0;
                    $_SESSION['parlay3'] = 0;
                    ?>
                    </section>
                    <br><br><br>
                </div>
                <br><br>
                <script>
                    // Get the modal
                    var modal = document.getElementById("openModalDiv");

                    // Get the button that opens the modal
                    var btn = document.getElementById("openModalButton");

                    // Get the <span> element that closes the modal
                    var span = document.getElementsByClassName("close")[0];

                    // When the user clicks on the button, open the modal
                    btn.onclick = function() {
                    modal.style.display = "block";
                    }

                    // When the user clicks on <span> (x), close the modal
                    span.onclick = function() {
                    modal.style.display = "none";
                    location.reload();
                    }

                    // When the user clicks anywhere outside of the modal, close it
                    window.onclick = function(event) {
                        if (event.target == modal) {
                            modal.style.display = "none";
                        }
                    }
                </script>
                <?php
                break;
            }
        }
    }
}

function DisplaySchedule($sport, $team) {
    $nbaTeams = GetNbaTeams();
    $nbaGames = GetNbaSchedule();

    $nflTeams = GetNflTeams();
    $nflGames = GetNflSchedule();

    // Initialize $scheduleTeam with a default value
    $scheduleTeam = 'all';

    if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['scheduleSelect'])) {
        $scheduleTeam = $_POST['scheduleSelect'];
    }

    if ($sport == "basketball") {
        ?>
        <form method="post">
            <select name="scheduleSelect" class="select">
                <option value="all">Entire season</option>
                <option value="<?php echo $team;?>">Your own team</option>
                <optgroup label="Specific teams">
                    <?php
                    foreach ($nbaTeams as $nbaTeam) {
                        ?>
                        <option value="<?php echo $nbaTeam['teamName']; ?>"><?php echo $nbaTeam['teamName']; ?></option>
                        <?php
                    }
                    ?>
                </optgroup>
            </select>
            <input class="submit" type="submit" value="Submit">
        </form>
        <table>
            <tr>
                <th>Game nr.</th>
                <th>Home Team</th>
                <th></th>
                <th>Away Team</th>
                <th>Date</th>
                <th>Time</th>
            </tr>
            <?php
            foreach ($nbaGames as $nbaGame) {
                if ($nbaGame['home_team'] != $scheduleTeam && $nbaGame['away_team'] != $scheduleTeam && $scheduleTeam != "all") {
                    continue;
                }
                $game_time = $nbaGame['game_time'];
                $formatted_time = preg_replace('/:00$/', '', $game_time);
                ?>
                <tr>
                    <td><?php echo $nbaGame['game_id']; ?></td>
                    <td>
                        <?php
                        foreach ($nbaTeams as $nbaTeam) {
                            if ($nbaGame['home_team'] == $nbaTeam['teamName']) {
                                ?>
                                <img src="images/team_logos/nba/<?php echo $nbaTeam['teamConference']; ?>/<?php echo $nbaTeam['teamLogo']; ?>" alt="team image" width="300">
                                <?php
                            }
                        }
                        ?>
                    </td>
                    <td class="versusTable"><b><u>VS</u></b></td>
                    <td>
                        <?php
                        foreach ($nbaTeams as $nbaTeam) {
                            if ($nbaGame['away_team'] == $nbaTeam['teamName']) {
                                ?>
                                <img src="images/team_logos/nba/<?php echo $nbaTeam['teamConference']; ?>/<?php echo $nbaTeam['teamLogo']; ?>" alt="team image" width="300">
                                <?php
                            }
                        }
                        ?>
                    </td>
                    <td><?php echo $nbaGame['game_date']; ?></td>
                    <td><?php echo $formatted_time;?></td>
                </tr>
                <?php
            }
            ?>
        </table>
        <br><br>
        <?php
    }
    elseif ($sport == "football") {
        ?>
        <form method="post">
            <select name="scheduleSelect" class="select">
                <option value="all">Entire season</option>
                <option value="<?php echo $team;?>">Your own team</option>
                <optgroup label="Specific teams">
                    <?php
                    foreach ($nflTeams as $nflTeam) {
                        ?>
                        <option value="<?php echo $nflTeam['teamName']; ?>"><?php echo $nflTeam['teamName']; ?></option>
                        <?php
                    }
                    ?>
                </optgroup>
            </select>
            <input class="submit" type="submit" value="Submit">
        </form>
        <table>
            <tr>
                <th>Game nr.</th>
                <th>Home Team</th>
                <th></th>
                <th>Away Team</th>
                <th>Date</th>
                <th>Time</th>
            </tr>
            <?php
            foreach ($nflGames as $nflGame) {
                if ($nflGame['home_team'] != $scheduleTeam && $nflGame['away_team'] != $scheduleTeam && $scheduleTeam != "all") {
                    continue;
                }
                $game_time = $nflGame['game_time'];
                $formatted_time = preg_replace('/:00$/', '', $game_time);
                ?>
                <tr>
                    <td><?php echo $nflGame['game_id']; ?></td>
                    <td>
                        <?php
                        foreach ($nflTeams as $nflTeam) {
                            if ($nflGame['home_team'] == $nflTeam['teamName']) {
                                ?>
                                <img src="images/team_logos/nfl/<?php echo $nflTeam['teamConference']; ?>/<?php echo $nflTeam['teamLogo']; ?>" alt="team image" width="300">
                                <?php
                            }
                        }
                        ?>
                    </td>
                    <td class="versusTable"><b><u>VS</u></b></td>
                    <td>
                        <?php
                        foreach ($nflTeams as $nflTeam) {
                            if ($nflGame['away_team'] == $nflTeam['teamName']) {
                                ?>
                                <img src="images/team_logos/nfl/<?php echo $nflTeam['teamConference']; ?>/<?php echo $nflTeam['teamLogo']; ?>" alt="team image" width="300">
                                <?php
                            }
                        }
                        ?>
                    </td>
                    <td><?php echo $nflGame['game_date']; ?></td>
                    <td><?php echo $formatted_time;?></td>
                </tr>
                <?php
            }
            ?>
        </table>
        <br><br>
        <?php
    }
}

function DisplayRoster($sport, $team) {
    $nbaPlayers = GetNbaPlayers();
    $nbaTeams = GetNbaTeams();
    $nflPlayers = GetNflPlayers();
    $nflTeams = GetNflTeams();
    $tableType = "attributes";

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        if ($_POST['playerRosterSelect'] == "attributes") {
            $tableType = "attributes";
        } elseif ($_POST['playerRosterSelect'] == "stats") {
            $tableType = "stats";
        }
    }

    ?> <h1>Team Roster</h1> <?php
    if ($sport == "basketball") {
        ?>
        <form method="POST">
            <select name="playerRosterSelect" class="select" id="center">
                <option value="atrributes">Player attributes</option>
                <option value="stats">Player statistics</option>
            </select>
            <input class="submit" type="submit" value="Submit">
        </form>
        <?php

        if ($tableType == "attributes") {
            ?>
            <table>
                <tr>
                    <th>Player Name</th>
                    <th></th>
                    <th>Position</th>
                    <th>Age</th>
                    <th>Height (Cm)</th>
                    <th>Weight (Kg)</th>
                </tr>
                <?php
                foreach ($nbaPlayers as $nbaPlayer) {
                    if ($nbaPlayer['playerTeam'] == $team) {
                        ?>
                        <tr>
                            <td><?php echo $nbaPlayer['playerName']; ?></td>
                            <td>
                                <?php
                                foreach ($nbaTeams as $nbaTeam) {
                                    if ($nbaPlayer['playerTeam'] == $nbaTeam['teamName']) {
                                        ?>
                                        <img src="images/team_logos/nba/<?php echo $nbaTeam['teamConference']; ?>/<?php echo $nbaTeam['teamLogo']; ?>" alt="team image" width="200">
                                        <?php
                                    }
                                }
                                ?>
                            </td>
                            <td><?php echo $nbaPlayer['playerPosition']; ?></td>
                            <td><?php echo $nbaPlayer['playerAge']; ?></td>
                            <td><?php echo $nbaPlayer['playerHeight'] . " cm"; ?></td>
                            <td><?php echo $nbaPlayer['playerWeight'] . " kg";?></td>
                        </tr>
                        <?php
                    }
                }
                ?>
            </table>
            <?php
        } elseif ($tableType == "stats") {
            ?>
            <table>
                <tr>
                    <th>Player Name</th>
                    <th></th>
                    <th>PPG (points)</th>
                    <th>APG (assists)</th>
                    <th>RPG (rebounds)</th>
                    <th>STG (steals)</th>
                    <th>BPG (blocks)</th>
                </tr>
                <?php
                foreach ($nbaPlayers as $nbaPlayer) {
                    if ($nbaPlayer['playerTeam'] == $team) {
                        ?>
                        <tr>
                            <td><?php echo $nbaPlayer['playerName']; ?></td>
                            <td>
                                <?php
                                foreach ($nbaTeams as $nbaTeam) {
                                    if ($nbaPlayer['playerTeam'] == $nbaTeam['teamName']) {
                                        ?>
                                        <img src="images/team_logos/nba/<?php echo $nbaTeam['teamConference']; ?>/<?php echo $nbaTeam['teamLogo']; ?>" alt="team image" width="200">
                                        <?php
                                    }
                                }
                                ?>
                            </td>
                            <td><?php echo $nbaPlayer['playerPPG']; ?></td>
                            <td><?php echo $nbaPlayer['playerAssists']; ?></td>
                            <td><?php echo $nbaPlayer['playerRebounds']; ?></td>
                            <td><?php echo $nbaPlayer['playerSteals'];?></td>
                            <td><?php echo $nbaPlayer['playerBlocks'];?></td>
                        </tr>
                        <?php
                    }
                }
                ?>
            </table>
            <?php
        }
    }
    elseif ($sport == "football") {
        ?>
        <form method="POST">
            <select name="playerRosterSelect" class="select" id="center">
                <option value="atrributes">Player attributes</option>
                <option value="stats">Player statistics</option>
            </select>
            <input class="submit" type="submit" value="Submit">
        </form>
        <?php

        if ($tableType == "attributes") {
            ?>
            <table>
                <tr>
                    <th>Player Name</th>
                    <th></th>
                    <th>Position</th>
                    <th>Age</th>
                    <th>Height (Cm)</th>
                    <th>Weight (Kg)</th>
                </tr>
                <?php
                foreach ($nflPlayers as $nflPlayer) {
                    if ($nflPlayer['playerTeam'] == $team) {
                        ?>
                        <tr>
                            <td><?php echo $nflPlayer['playerName']; ?></td>
                            <td>
                                <?php
                                foreach ($nflTeams as $nflTeam) {
                                    if ($nflPlayer['playerTeam'] == $nflTeam['teamName']) {
                                        ?>
                                        <img src="images/team_logos/nfl/<?php echo $nflTeam['teamConference']; ?>/<?php echo $nflTeam['teamLogo']; ?>" alt="team image" width="200">
                                        <?php
                                    }
                                }
                                ?>
                            </td>
                            <td><?php echo $nflPlayer['playerPosition']; ?></td>
                            <td><?php echo $nflPlayer['playerAge']; ?></td>
                            <td><?php echo $nflPlayer['playerHeight'] . " cm"; ?></td>
                            <td><?php echo $nflPlayer['playerWeight'] . " kg";?></td>
                        </tr>
                        <?php
                    }
                }
                ?>
            </table>
            <?php
        } elseif ($tableType == "stats") {
            ?>
            <table>
                <tr>
                    <th>Player Name</th>
                    <th></th>
                    <th>Passing Yards</th>
                    <th>Running Yards</th>
                    <th>Receiving Yards</th>
                    <th>STG (steals)</th>
                    <th>BPG (blocks)</th>
                </tr>
                <?php
                foreach ($nflPlayers as $nflPlayer) {
                    if ($nflPlayer['playerTeam'] == $team) {
                        ?>
                        <tr>
                            <td><?php echo $nflPlayer['playerName']; ?></td>
                            <td>
                                <?php
                                foreach ($nflTeams as $nflTeam) {
                                    if ($nflPlayer['playerTeam'] == $nflTeam['teamName']) {
                                        ?>
                                        <img src="images/team_logos/nfl/<?php echo $nflTeam['teamConference']; ?>/<?php echo $nflTeam['teamLogo']; ?>" alt="team image" width="200">
                                        <?php
                                    }
                                }
                                ?>
                            </td>
                            <td><?php echo $nflPlayer['playerPYDS']; ?></td>
                            <td><?php echo $nflPlayer['playerRYDS']; ?></td>
                            <td><?php echo $nflPlayer['playerREYDS']; ?></td>
                            <td><?php echo $nflPlayer['playerTKL'];?></td>
                            <td><?php echo $nflPlayer['playerSacks'];?></td>
                        </tr>
                        <?php
                    }
                }
                ?>
            </table>
            <?php
        }
    }
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