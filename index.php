<?php
error_reporting(0);
session_start();
include_once("conexao.php");
if ($_POST['Voltar']) {
    unset($_SESSION['TudoTudo']);
    header('location: index.php');
}
$recvida = "SELECT rec_vida FROM recorde";
$recvidas = mysqli_query($conn, $recvida);
while ($row = mysqli_fetch_array($recvidas)) {
    $vida = $row['rec_vida'];
}
if (isset($_POST['a']) || isset($_POST['b']) || isset($_POST['c']) || isset($_POST['d'])) {
    $resulta = $_POST['result'];

    if (($resulta == 'a' && isset($_POST['a'])) || ($resulta == 'b' && isset($_POST['b'])) || ($resulta == 'c' && isset($_POST['c'])) || ($resulta == 'd' && isset($_POST['d']))) {
        $_SESSION['resultadoagora'] = ($_SESSION['resultadoagora'] ?? 0) + 1;
        $_SESSION['TudoTudo'] = "Certo";
        if ($_SESSION['resultadoagora'] == 25) {
            $_SESSION['TudoTudo'] = "Ganhou";
            header('location: index.php');
            $recordetotal = mysqli_fetch_assoc(mysqli_query($conn, "SELECT rec_recorde FROM recorde"))['rec_recorde'] ?? 0;
            if ($_SESSION['resultadoagora'] > $recordetotal) {
                $alterrec = "UPDATE recorde SET rec_recorde = '{$_SESSION['resultadoagora']}' WHERE rec_cod = 1";
                mysqli_query($conn, $alterrec);
            }
            unset($_SESSION['resultadoagora']);
        }
    } else {
        if ($vida == 1) {
            $recordetotal = mysqli_fetch_assoc(mysqli_query($conn, "SELECT rec_recorde FROM recorde"))['rec_recorde'] ?? 0;
            if ($_SESSION['resultadoagora'] > $recordetotal) {
                $alterrec = "UPDATE recorde SET rec_recorde = '{$_SESSION['resultadoagora']}' WHERE rec_cod = 1";
                mysqli_query($conn, $alterrec);
            }
            $_SESSION['TudoTudo'] = "Errado";
            unset($_SESSION['resultadoagora']);
            $vidamais = "UPDATE recorde SET rec_vida = 3";
            $recmais = mysqli_query($conn, $vidamais);
        } else {
            $vida = $vida - 1;
            $_SESSION['resultadoagora'] = ($_SESSION['resultadoagora'] ?? 0) + 1;
            $_SESSION['TudoTudo'] = "Certo";
            $vidamenos = "UPDATE recorde SET rec_vida = $vida";
            $recmenos = mysqli_query($conn, $vidamenos);
            if ($_SESSION['resultadoagora'] == 25) {
                $_SESSION['TudoTudo'] = "Ganhou";
                header('location: index.php');
                $recordetotal = mysqli_fetch_assoc(mysqli_query($conn, "SELECT rec_recorde FROM recorde"))['rec_recorde'] ?? 0;
                if ($_SESSION['resultadoagora'] > $recordetotal) {
                    $alterrec = "UPDATE recorde SET rec_recorde = '{$_SESSION['resultadoagora']}' WHERE rec_cod = 1";
                    mysqli_query($conn, $alterrec);
                }
                unset($_SESSION['resultadoagora']);
            }
        }
    }
    header('location: index.php');
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Matematica</title>
</head>

<body>
    <?php
    if ($_POST['Comecar'] || $_SESSION['TudoTudo'] == "Certo") {
        $numero1 = rand(0, 100);
        $numero2 = rand(0, 100);
        $simb = array('+', '-', '/', '*');
        shuffle($simb);
        $simbolo = $simb[0];
        if ($simbolo == '/') {
            while ($numero2 == 0) {
                $numero2 = rand(1, 50);
            }
        }
        switch ($simbolo) {
            case '+':
                $resultado = $numero1 + $numero2;
                break;
            case '-':
                $resultado = $numero1 - $numero2;
                break;
            case '*':
                $resultado = $numero1 * $numero2;
                break;
            case '/':
                $resultado = $numero1 / $numero2;
                break;
        }
        $resultado = round($resultado, 2);

        $value = array(1, 2, 3, 4);
        shuffle($value);
        $valueresp = $value[0];


        if ($valueresp == 1) {
            $result = 'a';
            $value1 = $resultado;
            $value2 = rand($resultado - 10, $resultado - 2);
            $value3 = rand($resultado - 10, $resultado - 2);
            $value4 = rand($resultado - 10, $resultado - 2);
        } else if ($valueresp == 2) {
            $result = 'b';
            $value1 = rand($resultado - 10, $resultado - 2);
            $value2 = $resultado;
            $value3 = rand($resultado - 10, $resultado - 2);
            $value4 = rand($resultado - 10, $resultado - 2);
        } else if ($valueresp == 3) {
            $result = 'c';
            $value1 = rand($resultado - 10, $resultado - 2);
            $value2 = rand($resultado - 10, $resultado - 2);
            $value3 = $resultado;
            $value4 = rand($resultado - 10, $resultado - 2);
        } else if ($valueresp == 4) {
            $result = 'd';
            $value1 = rand($resultado - 10, $resultado - 2);
            $value2 = rand($resultado - 10, $resultado - 2);
            $value3 = rand($resultado - 10, $resultado - 2);
            $value4 = $resultado;
        }

    ?>
        <div class="tudo">
            <div class="pergunta">
                <form action="#" method="post">
                    <div class="coracoes">
                        <?php
                        if ($vida == 3) {
                        ?>
                            <h4>
                                Vida:
                                <img src="./Imagens/cheio.png">
                                <img src="./Imagens/cheio.png">
                                <img src="./Imagens/cheio.png">
                            </h4>
                        <?php
                        } else if ($vida == 2) {
                        ?>
                            <h4>
                                Vida:
                                <img src="./Imagens/cheio.png">
                                <img src="./Imagens/cheio.png">
                                <img src="./Imagens/vazio.png">
                            </h4>
                        <?php
                        } else if ($vida == 1) {
                        ?>
                            <h4>
                                Vida:
                                <img src="./Imagens/cheio.png">
                                <img src="./Imagens/vazio.png">
                                <img src="./Imagens/vazio.png">
                            </h4>
                        <?php
                        }
                        ?>
                    </div>
                    <h1>Pergunta <?php echo $_SESSION['resultadoagora'] + 1; ?></h1>
                    <div class="conta">
                        <h3><?php echo $numero1; ?></h3>
                        <h3><?php echo $simbolo; ?></h3>
                        <h3><?php echo $numero2; ?></h3>
                    </div>
                    <div class="botaoconta">
                        <input type="submit" class="btnconta" value="<?php echo $value1 ?>" name="a">
                        <input type="submit" class="btnconta" value="<?php echo $value2 ?>" name="b">
                    </div>
                    <div class="botaoconta">
                        <input type="submit" class="btnconta" value="<?php echo $value3 ?>" name="c">
                        <input type="submit" class="btnconta" value="<?php echo $value4 ?>" name="d">
                    </div>
                    <input type="hidden" name="result" value="<?php echo $result; ?>">
                </form>
            </div>
        </div>
    <?php
    } else if ($_SESSION['TudoTudo'] == "Errado") {
        unset($_SESSION['TudoTudo']);
    ?>
        <div class="tudo">
            <h1>JOGO DO MILHÃO</h1>
            <form action="#" method="post">
                <input type="submit" name="Comecar" value="Começar" class="btn-init">
            </form>

            <?php
            $rec = "SELECT * FROM recorde";
            $recorde = mysqli_query($conn, $rec);
            while ($row = mysqli_fetch_array($recorde)) {
                $recor = $row['rec_recorde'];
            ?>
                <h3>Recorde: <?php echo $recor; ?></h3>
            <?php
            }
            ?>
        </div>
    <?php
    } else if ($_SESSION['TudoTudo'] == "Ganhou") {
    ?>
        <div class="tudo">
            <div class="pergunta">
                <h1>Parabens</h1>
                <form action="#" method="post">
                    <input type="submit" class="btn-init" value="Voltar" name="Voltar">
                </form>
            </div>
        </div>
    <?php
    } else {
        unset($_SESSION['TudoTudo']);
    ?>
        <div class="tudo">
            <h1>JOGO DO MILHÃO</h1>
            <form action="#" method="post">
                <input type="submit" name="Comecar" value="Começar" class="btn-init">
            </form>

            <?php
            $rec = "SELECT * FROM recorde";
            $recorde = mysqli_query($conn, $rec);
            while ($row = mysqli_fetch_array($recorde)) {
                $recor = $row['rec_recorde'];
            ?>
                <h3>Recorde: <?php echo $recor; ?></h3>
            <?php
            }
            ?>
        </div>
    <?php
    }
    ?>
</body>

</html>