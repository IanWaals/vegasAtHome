<?php

include ("inc/functionsphp.php");

if (isset($_GET['save']) && $_GET['save'] == "no") {
    ?>
    <div class="modal" id="modalDiv">
    <section class="modal-content">
            <h1>Lose progress and continue?</h1>
            <h2>all credits on pending bets will be lost</h2>
            <div>
                <a href="index.php">
                    <button class="overviewButton"><b class="whiteOutline">Yes</b></button>
                </a><br><br>
                <button onclick="history.back()" class="overviewButton"><b class="whiteOutline">No</b></button>
            </div>
        </section>
    </div>
    <button id="modalButton" style="display:none;">Open Modal</button> <!-- Hidden button to trigger modal -->
    <script>
        // Get the modal
        var modal = document.getElementById("modalDiv");

        // Get the button that opens the modal
        var btn = document.getElementById("modalButton");

        // Automatically open the modal when the page loads
        window.onload = function() {
            modal.style.display = "block";
        }

        // When the user clicks on the button, open the modal (not needed since we open it on load)
        btn.onclick = function() {
            modal.style.display = "block";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>
    <?php
}

$_SESSION['parlay1'] = 0;
$_SESSION['parlay1ou'] = "";
$_SESSION['parlay2'] = 0;
$_SESSION['winningTeam'] = "";
$_SESSION['parlay3'] = 0;
$_SESSION['parlay3ou'] = "";

HtmlHead("Homepage");

?>
<main>
    <div class="ButtonLinks">
        <section class="buttonLink">
            <img class="minesImage" src="images/Mines.png" alt="image of the casino game mines" width="700">
            <a href="s"><div class="playNowButton">Play now!</div></a>
        </section>
        <img src="images/ads/horizontalAd.png" alt="an ad for coolblue" width="700">
        <section class="buttonLink">
            <img class="minesImage" src="images/sportsBet.webp" alt="image of the casino game mines" width="700">
            <a href="selectSport.php?Action=selectSport"><div class="playNowButton">Play now!</div></a>
        </section>
    </div>
    <aside class="asideAd">
        <img class="asideAd" src="images/ads/asideAd.png" alt="an ad for pet food"><br><br><br><br>
        <img class="asideAd" src="images/ads/asideAd3.png" alt="an ad for pet cars">
    </aside>
</main>
<br>

<?php
HtmlFoot();