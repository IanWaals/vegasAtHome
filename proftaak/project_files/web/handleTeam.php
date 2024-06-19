<?php

session_start();

include("inc/functionsphp.php");

$nbaTeams = getNbaTeams();
$nflTeams = getNflTeams();
if (isset($_GET['team'])) {
    if (isset($_GET['sport']) && $_GET['sport'] == "basketball") {
        foreach ($nbaTeams as $nbaTeam) {
            if ($nbaTeam['teamId'] == $_GET['team']) {
                $_SESSION['nbaTeam'] = $nbaTeam['teamName'];
                header("location: sportsBet.php?sport=nba&action=overview");
            }
        }
    } elseif (isset($_GET['sport']) && $_GET['sport'] == "football") {
        foreach ($nflTeams as $nflTeam) {
            if ($nflTeam['teamId'] == $_GET['team']) {
                $_SESSION['nflTeam'] = $nflTeam['teamName'];
                header("location: sportsBet.php?sport=nfl&action=overview");
            }
        }
    }
    
    
}


if ($_SERVER['REQUEST_METHOD']) {
    if (isset($_GET['test']) && $_GET['test'] == "ja") {
        $_SESSION['credits'] += 100;
        header("location: chipsShop.php");
    }
    if ($_POST['parlay1Bet'] + $_POST['parlay2Bet'] + $_POST['parlay3Bet'] <= $_SESSION['credits']) {
        $_SESSION['parlay1'] = $_POST['parlay1Bet'];
        $_SESSION['parlay1ou'] = $_POST['parlay1Ou'];
        $_SESSION['parlay2'] = $_POST['parlay2Bet'];
        $_SESSION['winningTeam'] = $_POST['winnerSelect'];
        $_SESSION['parlay3'] = $_POST['parlay3Bet'];
        $_SESSION['parlay3ou'] = $_POST['parlay3Ou'];
        $_SESSION['credits'] -= ($_SESSION['parlay1'] + $_SESSION['parlay2'] + $_SESSION['parlay3']);
    }
    switch ($_GET['sport']) {
        case "nba":
            header("location: sportsBet.php?sport=nba&action=overview");
            break;
        case "nfl":
            header("location: sportsBet.php?sport=nfl&action=overview");
            break;
        case "mlb":
            header("location: sportsBet.php?sport=mlb&action=overview");
            break;
    }
}