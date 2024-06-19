<?php

session_start();

include ("inc/functionsphp.php");

HtmlHead("Select a sport");

if ($_GET['Action'] == "selectSport") {
    ?>
    <h1>Select a sport!!</h1>
    <main>
        <section class="leagueImages">
            <a href="sportsBet.php?sport=nba&action=teamSelect">
                <img src="images/logos/basketball/nba_logo.png" alt="the logo for the national basketball association">
            </a>
            <a href="sportsBet.php?sport=nfl&action=teamSelect">
                <img src="images/logos/football/nfl_logo.png" alt="the logo for the national football league">
            </a>
            <img onclick="MlbLogoClick()" src="images/logos/baseball/mlb logo.png" alt="the logo for major league baseball">
            <script src="inc/functionsjs.js"></script>
        </section>
    </main>
    <?php
}

HtmlFoot();