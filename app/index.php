<?php
require_once __DIR__ . '/../config/database.php';

try {
    $stmt = $con->prepare("SELECT * FROM funcionario");
    $stmt->execute();
    $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($resultados as $linha) {
        echo "CPF: " . htmlspecialchars($linha['cpf']) . "<br>";
    }

} catch (PDOException $e) {
    echo "Erro na consulta: " . $e->getMessage();
}
?>
