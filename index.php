<?php
error_reporting(0);
session_start();
include_once("conexao.php");
$resultadoagora = 0;
if ($_POST['a']) {
    $resulta = $_POST['result'];
    $codperjf = $_POST['codperjf'];
    if ($resulta == 'a') {
        $resultadoagora = $resultadoagora + 1;
        $perguntafeita = "INSERT INTO pergunta_ja_feita (perjf_perguntafeita) VALUES ('$codperjf')";
        $comando = mysqli_query($conn, $perguntafeita);
        $_SESSION['TudoTudo'] = "Certo";
        header('location: index.php');
    } else {
        $recordetotals = "SELECT * FROM recorde";
        $recordetot = mysqli_query($conn, $recordetotals);
        while ($row = mysqli_fetch_array($recordetot)) {
            $recordetotal = $row['rec_recorde'];
        }
        if($resultadoagora > $recordetotal){
            $alterrec = "UPDATE ";
        }
        $deleteperjf = "DELETE FROM pergunta_ja_feita";
        $comando = mysqli_query($conn, $deleteperjf);
        $_SESSION['TudoTudo'] = "Errado";
        header('location: index.php');
    }
} else if ($_POST['b']) {
    $resulta = $_POST['result'];
    $codperjf = $_POST['codperjf'];
    if ($resulta == 'b') {
        $resultadoagora = $resultadoagora + 1;
        $perguntafeita = "INSERT INTO pergunta_ja_feita (perjf_perguntafeita) VALUES ('$codperjf')";
        $comando = mysqli_query($conn, $perguntafeita);
        $_SESSION['TudoTudo'] = "Certo";
        header('location: index.php');
    } else {
        $deleteperjf = "DELETE FROM pergunta_ja_feita";
        $comando = mysqli_query($conn, $deleteperjf);
        $_SESSION['TudoTudo'] = "Errado";
        header('location: index.php');
    }
} else if ($_POST['c']) {
    $resulta = $_POST['result'];
    $codperjf = $_POST['codperjf'];
    if ($resulta == 'c') {
        $resultadoagora = $resultadoagora + 1;
        $perguntafeita = "INSERT INTO pergunta_ja_feita (perjf_perguntafeita) VALUES ('$codperjf')";
        $comando = mysqli_query($conn, $perguntafeita);
        $_SESSION['TudoTudo'] = "Certo";
        header('location: index.php');
    } else {
        $deleteperjf = "DELETE FROM pergunta_ja_feita";
        $comando = mysqli_query($conn, $deleteperjf);
        $_SESSION['TudoTudo'] = "Errado";
        header('location: index.php');
    }
} else if ($_POST['d']) {
    $resulta = $_POST['result'];
    $codperjf = $_POST['codperjf'];
    if ($resulta == 'd') {
        $resultadoagora = $resultadoagora + 1;
        $perguntafeita = "INSERT INTO pergunta_ja_feita (perjf_perguntafeita) VALUES ('$codperjf')";
        $comando = mysqli_query($conn, $perguntafeita);
        $_SESSION['TudoTudo'] = "Certo";
        header('location: index.php');
    } else {
        $deleteperjf = "DELETE FROM pergunta_ja_feita";
        $comando = mysqli_query($conn, $deleteperjf);
        $_SESSION['TudoTudo'] = "Errado";
        header('location: index.php');
    }
}
?>
<!DOCTYPE html>
<html lang="en">

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
            <form action="#" method="post">
                Pergunta <?php echo $rec + 1 ?>
                <h3><?php echo $num1; ?></h3>
                <h3><?php echo $simbolo; ?></h3>
                <h3><?php echo $num2; ?></h3>
                <input type="submit" value="<?php echo $value1 ?>" name="a">
                <input type="submit" value="<?php echo $value2 ?>" name="b">
                <input type="submit" value="<?php echo $value3 ?>" name="c">
                <input type="submit" value="<?php echo $value4 ?>" name="d">
                <input type="hidden" name="result" value="<?php echo $result; ?>">
                <input type="hidden" name="codperjf" value="<?php echo $cod; ?>">
            </form>
        <?php
        }
    } else if ($_SESSION['TudoTudo'] == "Errado") {
        unset($_SESSION['TudoTudo']);
        ?>
        <h1>JOGO DO MILHÃO</h1>
        <form action="#" method="post">
            <input type="submit" name="Comecar" value="Começar">
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
    <?php
    } else {
        unset($_SESSION['TudoTudo']);
    ?>
        <h1>JOGO DO MILHÃO</h1>
        <form action="#" method="post">
            <input type="submit" name="Comecar" value="Começar">
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
    <?php
    }
    ?>
</body>

</html>