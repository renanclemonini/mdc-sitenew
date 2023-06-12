<?php 

require_once './ctr-model/clienteDAO.php';
require_once './ctr-model/servicosDAO.php';

$objClientes = new Cliente();
$objServicos = new Servicos();

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/mobile-first.css">
    <link rel="stylesheet" href="css/general.css">
    <link rel="stylesheet" href="css/adm.css">
    <?php include './bs4.php' ?>
    <script src="./js/index.js"></script>
    <title>Marília Di Credico - Administração</title>
    <style>
        .larguraInput{
            width: 300px;
        }

        .formAlign{
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .btnAlign{
            display: flex;
            justify-content: space-between;
        }

        .btnDesign{
            color: #fff;
            background-color: #000;
        }
        
    </style>
</head>
<body onresize="mudouTamanho()">
    <header id="container">
        
    </header>
    <span id="menuBurguer" class="material-symbols-outlined" onclick="clickMenu()">
        menu
    </span>
    <menu id="itensMenu">
        <ul>
            <li><a href="index.php" target="_self">Home</a></li>
            <li><a href="adm.php" target="_self">Administração</a></li>
            <li><a href="https://www.instagram.com/mariliadicredico.bioestetica/" target="_blank">Instagram</a></li>
            <li><a href="micropig.php">Micropigmentação</a></li>
            <li><a href="produtos.php">Produtos</a></li>
        </ul>
    </menu>
    <main class="p-4">
        <h3>Novo Agendamento</h3>
        <p>Caso não encontre seu nome por favor volte na tela anterior e realize seu cadastro.</p>
        <article>
            <form action="./ctr-controle/ctr-agendamentos.php" method="post">
                <input type="hidden" name="insertCliente">
                <p class="formAlign">
                    <label for="iNome">Nome Completo:</label>
                    <select name="txtCliente" id="iNome" class="text-center larguraInput" required>
                        <option value="0 ">Selecione cliente</option>
                    <?php 
                    $stmt = $objClientes->read();
                    $stmt->execute();
                    while($objClientes = $stmt->fetch(PDO::FETCH_ASSOC))
                    {
                    ?>
                        <option value="<?php echo $objClientes['id']; ?>">
                            <?php echo $objClientes['nome']; ?>
                        </option>
                        <?php 
                    }
                    ?>
                    </select>
                </p>
                <p class="formAlign">
                    <label for="iServico">Serviço:</label>
                    <select name="txtServico" id="iServico" class="text-center larguraInput" required>
                        <option value="0 ">Selecione serviço</option>
                    <?php 
                    $stmt = $objServicos->read();
                    $stmt->execute();
                    while($objServicos = $stmt->fetch(PDO::FETCH_ASSOC))
                    {
                    ?>
                        <option value="<?php echo $objServicos['id']; ?>">
                            <?php echo $objServicos['nome']; ?>
                        </option>
                        <?php 
                    }
                    ?>
                    </select>
                </p>
                <p class="formAlign">
                    <label for="iData">Data:</label>
                    <input class="text-center larguraInput" type="date" name="txtData" id="iData" required>
                </p>
                <p class="formAlign">
                    <label for="iHorario">Horário:</label>
                    <input class="text-center larguraInput" type="time" name="txtHorario" id="iHorario" required>
                </p>
                <div class="btnAlign">
                    <input type="submit" value="Cadastrar" class="btn btnDesign">
                    <a href="./agendamento-inicio.php" class="btn btnDesign" style="display: inline-block;">Voltar</a>
                </div>
            </form>
        </article>
    </main>
    <footer>
        <p>Site Desenvolvido por Renan Clemonini &reg;</p>
    </footer>
    <script>  
        function formatar(mascara, documento) {
            let i = documento.value.length;
            let saida = '#';
            let texto = mascara.substring(i);
            while (texto.substring(0, 1) != saida && texto.length ) {
            documento.value += texto.substring(0, 1);
            i++;
            texto = mascara.substring(i);
            }
        }
    </script>
</body>
</html>