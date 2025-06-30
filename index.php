<?php
require 'config.php';

// Consulta a la tabla countrylanguage
$sql = "SELECT CountryCode, Language, IsOfficial, Percentage FROM countrylanguage ORDER BY CountryCode, Language";
$stmt = $pdo->query($sql);
$languages = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Idiomas por País</title>
    <style>
        table {
            border-collapse: collapse;
            width: 80%;
            margin: 20px auto;
        }
        th, td {
            border: 1px solid #999;
            padding: 8px 12px;
            text-align: center;
        }
        th {
            background-color: #eee;
        }
    </style>
</head>
<body>
    <h1 style="text-align: center;">Tabla countrylanguage</h1>
    <table>
        <thead>
            <tr>
                <th>Country Code</th>
                <th>Language</th>
                <th>Is Official</th>
                <th>Percentage</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($languages as $row): ?>
                <tr>
                    <td><?= htmlspecialchars($row['CountryCode']) ?></td>
                    <td><?= htmlspecialchars($row['Language']) ?></td>
                    <td><?= $row['IsOfficial'] === 'T' ? 'Sí' : 'No' ?></td>
                    <td><?= htmlspecialchars($row['Percentage']) ?>%</td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>

