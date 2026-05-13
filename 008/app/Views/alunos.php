<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alunos</title>
</head>

<body>

    <h1>Alunos</h1>
    <table>
        <tr>
            <th>Nome</th>
            <th>Nota</th>
        </tr>
        <?php

        foreach ($alunos as $aluno) {
            echo "<tr>";
            echo "<td>" . $aluno->nome_alu . "</td>";
            echo "<td>" . $aluno->nota_alu . "</td>";
            echo "</tr>";
        }

        ?>
    </table>

</body>

</html>