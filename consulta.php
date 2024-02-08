<?php
// Conectar ao banco de dados
$host = "sql305.infinityfree.com";
$usuario = "if0_35938479";
$senha = "EMPRESA10";
$banco = "if0_35938479_cduspinda";

$conn = new mysqli($host, $usuario, $senha, $banco);

// Verificar a conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Processar o formulário
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obter o nome do usuário do formulário
    $sigla = $_POST["sigla"];

    // Preparar e executar a consulta
    $sql = "SELECT * FROM imoveis WHERE sigla = '$sigla'";
    $result = $conn->query($sql);

    // Exibir os resultados
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "sigla: " . $row["sigla"] . "<br>";
            echo "titulo: " . $row["titulo"] . "<br>";
            echo "logradouro: " . $row["logradouro"] . "<br>";
	echo "numero: " . $row["numero"] . "<br>";
	echo "zona: " . $row["zona"] . "<br>";
            echo "<hr>";
        }
    } else {
        echo "Nenhum resultado encontrado para a sigla '$sigla'.";
    }
}

// Fechar a conexão
$conn->close();
?>
