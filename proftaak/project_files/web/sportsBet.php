<?php 

session_start();

include("inc/functionsphp.php");

if (isset($_GET['action']) && $_GET['action'] === "teamSelect") {
    HtmlHead("sports betting");
    if (isset($_GET['sport'])) {
        switch ($_GET['sport']) {
            case "nba":
                DisplayTeams("basketball");
                break;
            case "nfl":
                DisplayTeams("football");
                break;
            case "mlb":
                DisplayTeams("baseball");
                break;
            default:
                echo "Unknown sport.";
                break;
        }
    } else {
        echo "Sport not specified.";
    }
} 
else if (isset($_GET['action']) && $_GET['action'] === "overview") {
    switch ($_GET['sport']) {
        case "nba":
            NbaHead("Team overview", $_SESSION['nbaTeam']);
            DisplayOverview("basketball", $_SESSION['nbaTeam']);
            break;
        case "nfl":
            NflHead("Team overview", $_SESSION['nflTeam']);
            DisplayOverview("football", $_SESSION['nflTeam']);
            break;
        case "mlb":
            DisplayTeams("baseball");
            break;
        default:
            echo "Unknown sport.";
            break;
    }
}
else if (isset($_GET['action']) && $_GET['action'] == "schedule") {
    switch ($_GET['sport']) {
        case "nba":
            NbaHead("Team Schedule", $_SESSION['nbaTeam']);
            DisplaySchedule("basketball", $_SESSION['nbaTeam']);
            break;
        case "nfl":
            NflHead("Team Schedule", $_SESSION['nflTeam']);
            DisplaySchedule("football", $_SESSION['nflTeam']);
            break;
        case "mlb":
            DisplayTeams("baseball");
            break;
        default:
            echo "Unknown sport.";
            break;
    }
}
else if (isset($_GET['action']) && $_GET['action'] == "roster") {
    switch ($_GET['sport']) {
        case "nba":
            NbaHead("Team Schedule", $_SESSION['nbaTeam']);
            DisplayRoster("basketball", $_SESSION['nbaTeam']);
            break;
        case "nfl":
            NflHead("Team Schedule", $_SESSION['nflTeam']);
            DisplayRoster("football", $_SESSION['nflTeam']);
            break;
        case "mlb":
            DisplayTeams("baseball");
            break;
        default:
            echo "Unknown sport.";
            break;
    }
}
else if (isset($_GET['action']) && $_GET['action'] == "pending") {
    switch ($_GET['sport']) {
        case "nba":
            NbaHead("Team Schedule", $_SESSION['nbaTeam']);
            DisplayPending("basketball", $_SESSION['nbaTeam']);
            break;
        case "nfl":
            NflHead("Team Schedule", $_SESSION['nflTeam']);
            DisplayPending("football", $_SESSION['nflTeam']);
            break;
        case "mlb":
            DisplayTeams("baseball");
            break;
        default:
            echo "Unknown sport.";
            break;
    }
}
else {
    echo "hello";
    

}

HtmlFoot();
