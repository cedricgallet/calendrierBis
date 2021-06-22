<form method = "post" action = "tp_calendrier.php">
    <p>
        <label for = "month">Mois : </label>
        <select name = "month">
            <?php
            for ($k = 1; $k <= 12; $k++) /* Liste déroulante : les mois */
            {
                echo "<option value = " . $k . ">";
                echo $k;
                echo "</option>";
            }
            ?>
        </select>
    </p>
    <p>
        <label for = "year">Année : </label>
        <select name = "year">
            <?php
            for ($k = date("Y") - 10; $k <= date("Y") + 10; $k++) /* Lste déroulante -> les années */
            {
                echo "<option value = " . $k;
                if ($k == date("Y")) /* Rajouter un selected dans la balise de l'année actuelle pour commencer avec celle-ci */
                    echo " selected";
                echo ">";
                echo $k;
                echo "</option>";
            }
            ?>
        </select>
    </p>
    <p>
        <input type = "submit" value = "Envoyer">
    </p>
</form>