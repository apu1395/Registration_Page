<?php
try{
    $con = new PDO("mysql:host=localhost;dbname=php","root","root");
}
catch (PDOExection $e)
{
    echo $e->getMessage();

}
?>