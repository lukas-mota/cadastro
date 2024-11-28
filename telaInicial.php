<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/telaInicial.css">
    <title>Document</title>
</head>
<body>
<?php include('sidebar.php');
 ?>

<div class="container">
        <div class="column">
            <div class="div2">
                <img src="img/sensor-de-movimento (1).png" alt="Sensor de movimento">
                <span>Sensor de movimento</span>
                <button class="toggle-button" id="toggleButton">Ativar</button>
            </div>
            <div class="div1">
              
            </div>
        </div>
        <div class="div3"></div>
    </div>

<script>
    let isActive = false; // Estado inicial

    document.getElementById('toggleButton').addEventListener('click', function() {
        isActive = !isActive; // Alterna o estado
        this.textContent = isActive ? 'Desativar' : 'Ativar'; // Atualiza o texto do botão
        this.style.backgroundColor = isActive ? '#dc3545' : '#007BFF'; // Muda a cor do botão
    });
    
    
</script>
</body>
</html>