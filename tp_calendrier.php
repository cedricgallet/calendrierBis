<?php

/* Vérifier que les variables du formulaire sont bien défines */
if (!isset($_POST["month"]) || !isset($_POST["year"]))
{
    header("Location: tp.php"); /* Redirection vers tp.php */
    exit;
}

$nbDays = cal_days_in_month(CAL_GREGORIAN, $_POST["month"], $_POST["year"]); /* Nombre de jours dans le mois choisi par l'utilisateur */
$monthName = date("F", mktime(null, null, null, $_POST["month"])); /* Conversion du mois chiffre -> lettres */

/* Compter le nombre de jours depuis le 1er janvier 1973 */
$shift = 0;
for ($i = 1973; $i <= $_POST["year"]; $i++ ) /* Parcourir les années */
{
    for ($j = 1; $j <= 12; $j++) /* Parcourir les mois dans les années et compter le nombre de jours qu'ils contiennent */
    {
        if ($i != $_POST["year"] || ($i == $_POST["year"] && $j < $_POST["month"])) /* Ne pas compter les mois après le mois choisi */
        {
            $shift += cal_days_in_month(CAL_GREGORIAN, $j, $i);
            /* echo "$i/$j : ";
            echo cal_days_in_month(CAL_GREGORIAN, $j, $i);
            echo "<br/>"; */
        }
    }
}
$shift = $shift % 7; /* Utiliser un modulo 7 pour avoir le nombre de jours de décalage, et ainsi connaître le jour de départ*/

?>
+
<link rel = "stylesheet" href = "css.css">

<table>
    <caption><?php echo $monthName . " " . $_POST["year"] ?></caption>
    <tr>
        <td>Monday</td>
        <td>Tuesday</td>
        <td>Wednesday</td>
        <td>Thursday</td>
        <td>Friday</td>
        <td>Saturday</td>
        <td>Sunday</td>
    </tr>
    <?php
        for ($i = 1; $i <= $nbDays; $i) /* Création du calendrier */
        {
            echo "<tr>";
            for ($j = 1; $j <= 7; $j++)
            {
                if ($i == 1) /* Rajouter des cases vides pour faire le décalage */
                    for ($k = 0; $k < $shift; $k++)
                    {
                        echo "<td></td>";
                        $j++;
                    }
                if ($i <= $nbDays) /* On rajoute la case du jour et on se décale de 1 */
                    echo "<td>" . $i++ . "</td>";
                else 
                    echo "<td></td>"; /* Une fois le nombre de jours dépassés, on complète la ligne avec */
            }
            echo "</tr>";
        }
    ?>
</table>

<a href = "tp.php">Retour</a>