<?php
error_reporting(0);
session_start();
include_once("conexao.php");
if ($_POST['Voltar']) {
    unset($_SESSION['TudoTudo']);
    header('location: index.php');
}
if (isset($_POST['a']) || isset($_POST['b']) || isset($_POST['c']) || isset($_POST['d'])) {
    $resulta = $_POST['result'];
    $codperjf = $_POST['codperjf'];

    if (($resulta == 'a' && isset($_POST['a'])) || ($resulta == 'b' && isset($_POST['b'])) || ($resulta == 'c' && isset($_POST['c'])) || ($resulta == 'd' && isset($_POST['d']))) {
        $_SESSION['resultadoagora'] = ($_SESSION['resultadoagora'] ?? 0) + 1;
        $perguntafeita = "INSERT INTO pergunta_ja_feita (perjf_perguntafeita) VALUES ('$codperjf')";
        mysqli_query($conn, $perguntafeita);
        $_SESSION['TudoTudo'] = "Certo";
        if ($_SESSION['resultadoagora'] == 25) {
            $_SESSION['TudoTudo'] = "Ganhou";
            header('location: index.php');
            $recordetotal = mysqli_fetch_assoc(mysqli_query($conn, "SELECT rec_recorde FROM recorde"))['rec_recorde'] ?? 0;
            if ($_SESSION['resultadoagora'] > $recordetotal) {
                $alterrec = "UPDATE recorde SET rec_recorde = '{$_SESSION['resultadoagora']}' WHERE rec_cod = 1";
                mysqli_query($conn, $alterrec);
            }
            $deleteperjf = "DELETE FROM pergunta_ja_feita";
            mysqli_query($conn, $deleteperjf);
            unset($_SESSION['resultadoagora']);
        }
    } else {
        $recordetotal = mysqli_fetch_assoc(mysqli_query($conn, "SELECT rec_recorde FROM recorde"))['rec_recorde'] ?? 0;
        if ($_SESSION['resultadoagora'] > $recordetotal) {
            $alterrec = "UPDATE recorde SET rec_recorde = '{$_SESSION['resultadoagora']}' WHERE rec_cod = 1";
            mysqli_query($conn, $alterrec);
        }
        $deleteperjf = "DELETE FROM pergunta_ja_feita";
        mysqli_query($conn, $deleteperjf);
        $_SESSION['TudoTudo'] = "Errado";
        unset($_SESSION['resultadoagora']);
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
        $perguntas = "SELECT * FROM perguntas WHERE per_cod NOT IN (SELECT perjf_perguntafeita FROM pergunta_ja_feita) ORDER BY RAND() LIMIT 1";
        $per = mysqli_query($conn, $perguntas);
        while ($row = mysqli_fetch_array($per)) {
            $cod = $row['per_cod'];
            $num1 = $row['per_num1'];
            $num2 = $row['per_num2'];
            $value1 = $row['per_value1'];
            $value2 = $row['per_value2'];
            $value3 = $row['per_value3'];
            $value4 = $row['per_value4'];
            $result = $row['per_result'];
            $simbolo = $row['per_simbolo'];
    ?>
            <div class="tudo">
                <div class="pergunta">
                    <form action="#" method="post">
                        <h1>Pergunta <?php echo $_SESSION['resultadoagora'] + 1; ?></h1>
                        <div class="conta">
                            <h3><?php echo $num1; ?></h3>
                            <h3><?php echo $simbolo; ?></h3>
                            <h3><?php echo $num2; ?></h3>
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
                        <input type="hidden" name="codperjf" value="<?php echo $cod; ?>">
                    </form>
                </div>
            </div>
        <?php
        }
        ?>
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