<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My App</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">My App</a>
    </nav>
    <div class="container mt-4">
        <h1>Welcome to My App</h1>
        <table id="data-table" class="table table-dark table-striped">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Cidade</th>
                    <th>Salário</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    // Connect to the database
                    $servername = "db";
                    $username = "root";
                    $password = "Senha123";
                    $dbname = "testedb";
                    $conn = new mysqli($servername, $username, $password, $dbname);

                    // Check connection
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }

                    // Query data from the database
                    $sql = "SELECT nome, cidade, salario FROM tabela_exemplo";
                    $result = $conn->query($sql);

                    // Output data as table rows
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row["nome"] . "</td>";
                            echo "<td>" . $row["cidade"] . "</td>";
                            echo "<td>" . $row["salario"] . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='3'>No data found</td></tr>";
                    }

                    // Close database connection
                    $conn->close();
                ?>
            </tbody>
        </table>
    </div>
    <footer class="footer bg-dark text-white mt-4">
        <div class="container text-center">
            <p>Footer Content</p>
        </div>
    </footer>
</body>
</html>
