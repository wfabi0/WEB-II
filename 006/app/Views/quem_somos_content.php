<h1>Quem Somos</h1>

<?php

    echo "<ul>";
    foreach($alunos as $a) {
        echo "<li>" . $a . "</li>";
    }
    echo "</ul>";

    echo "<br>";

    echo "Data e hora: " . date("d/m/y H:i:s");

    echo "<br>";

    echo ul($alunos);

    echo "<br>";

    echo "<table border='1'>";
    echo "<thead>";
    echo "<tr>";
    echo "<th>" . "Alunos" . "</th>";
    echo "<th>" . "Notas" . "</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";
    foreach($notas as $nota) {
        echo "<tr>";
        echo "<td>" . $nota['aluno'] . "</td>";
        echo "<td>" . $nota['nota'] . "</td>";
        echo "</tr>";
    }
    echo "</tbody>";
    echo "</table>";

?>