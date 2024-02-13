<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            session_start();
            if(isset($_SESSION['nome_sessao']) && isset($_SESSION['id_sessao'])){
                echo $_SESSION['nome_sessao']."<br>";
                echo $_SESSION['id_sessao']."<br>";
                echo "<br>";

                require_once '../connection/db_connection.php';
                require_once '../model/userDBA.php';

                $connection = connection();

                $resultGetNames = getNames($connection, 50);
                mysqli_close($connection);
                while ($rowResutGetName=mysqli_fetch_assoc($resultGetNames)){
                    echo $rowResutGetName['name']."<br>";
                }
            }else{
                echo "Usuário não logado";   
            }
        ?>
    </body>
</html>
