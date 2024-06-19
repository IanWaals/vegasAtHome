<?php

include("inc/functionsphp.php");

if (isset($_GET['save']) && $_GET['save'] == "no") {
    ?>
    <div class="modal" id="modalDiv">
        <section class="modal-content">
            <h1>Lose progress and continue?</h1>
            <h2>all credits on pending bets will be lost</h2>
            <div>
                <a href="chipsShop.php">
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


HtmlHead("Buy credits");
$_SESSION['credits'] = $_SESSION['credits'] + 100;
$credits = getCreditsValues();
$_SESSION['parlay1'] = 0;
$_SESSION['parlay1ou'] = "";
$_SESSION['parlay2'] = 0;
$_SESSION['winningTeam'] = "";
$_SESSION['parlay3'] = 0;
$_SESSION['parlay3ou'] = "";
?>
<h1>BUY credits HERE!!</h1>
<main>
    <?php
    foreach ($credits as $chip) {
        ?>
        <section class="getcredits">
            <?php
            echo "<h2>" . $chip['creditTitle'] . "</h2>";
            ?>
            <img src="images/chips.jpg" alt="an image of some casino credits" width="300"><br>
            <?php
            echo "<p>€" . $chip['creditCost'] . "</p>";
            echo "<p>You'll receive " . $chip['creditAmount'] . " credits</p>";
            ?>
        </section>
        <?php
    }
    ?>
</main>
<?php
HtmlFoot();