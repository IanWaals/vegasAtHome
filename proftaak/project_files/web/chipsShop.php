<?php

include("inc/functionsphp.php");

HtmlHead("Buy credits");
$credits = getCreditsValues();
?>
<h1>BUY credits HERE!!</h1>
<main>
    <?php
    foreach ($credits as $chip) {
        ?>
        <section class="getcredits">
            <?php
            echo "<h2>" . $chip['chipTitle'] . "</h2>";
            ?>
            <img src="images/credits.jpg" alt="an image of some casino credits" width="300"><br>
            <?php
            echo "<p>€" . $chip['chipCost'] . "</p>";
            echo "<p>You'll receive " . $chip['chipAmount'] . " credits</p>";
            ?>
        </section>
        <?php
    }
    ?>
</main>
<?php
HtmlFoot();