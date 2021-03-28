<?php

//      MsSql için parametre listesi      -->Return $db
//      @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@-- FONKSİYON BAŞI --@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
$serverName = "DESKTOP-5PP8GIT";
$dataBaseName = "CodeDB_1";
$userName = "";
$userPassword = "";

// Ms-SQL bağlantısı fonksiyonu.    bağlantı değişkeni --->>>"$baglan"
function MsSqlBaglantisi($serverName, $dataBaseName, $userName, $userPassword)
{
    try {
        $db = new PDO("sqlsrv:Server=$serverName;Database=$dataBaseName", $userName, $userPassword);
        $db->setAttribute(
            PDO::ATTR_ERRMODE,
            PDO::ERRMODE_EXCEPTION
        );
        //echo "<h3>>>>MsSQL CodeDB_1'e bağlandı.<<<</h3> <br/>";
        return $db;
    } catch (PDOException $e) {
        echo $e->getMessage();
        return $db = NULL;
    }
}
//---------------------------------------  fonksiyon sonu   ----------------------------
$db = MsSqlBaglantisi($serverName, $dataBaseName, $userName, $userPassword);




//      MsSql VT_Master için parametre listesi      -->Return $db
//      @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@-- FONKSİYON BAŞI --@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
$serverName = "DESKTOP-5PP8GIT";
$dataBaseName = "VTMASTER";
$userName = "";
$userPassword = "";

// Ms-SQL bağlantısı fonksiyonu.    bağlantı değişkeni --->>>"$baglan"
function MsSql_VT_Master_Baglantisi($serverName, $dataBaseName, $userName, $userPassword)
{
    try {
        $db = new PDO("sqlsrv:Server=$serverName;Database=$dataBaseName", $userName, $userPassword);
        $db->setAttribute(
            PDO::ATTR_ERRMODE,
            PDO::ERRMODE_EXCEPTION
        );
        //echo "<h3>>>>MsSQL VT_MASTER'e bağlandı.<<<</h3> <br/>";
        return $db;
    } catch (PDOException $e) {
        echo $e->getMessage();
        return $db = NULL;
    }
}
//---------------------------------------  fonksiyon sonu   ----------------------------
$VT_Master = MsSql_VT_Master_Baglantisi($serverName, $dataBaseName, $userName, $userPassword);



//      MySql için parametre listesi      -->Return $con
//      @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@  FONKSİYON BAŞLANGICI  @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
$localhost = "localhost";       // 
$dbName = "codesdeneme";            //
$user = "root";
$password = "";

// MySQL Bağlantı FONKSİYONU    bağlantı değişkeni --->>>  "$con"
function MySqlBaglantisi($localhost, $dbName, $user, $password)
{
    try {
        $con = new PDO("mysql:host=$localhost;dbname=$dbName", "$user", "$password", array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        //echo "<h3>>>>MySQL'e bağlandı<<<</h3>";

        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $con;
    } catch (PDOException $e) {
        die(print_r($e->getMessage()));
        return $con = NULL;
    }
}
$con = MySqlBaglantisi($localhost, $dbName, $user, $password);
//---------------------------------------  fonksiyon sonu   --------------------------

function vericekMS($veriTabaniBaglantisi, $TableName)
{

    global $db;
    global $VT_Master;
    global $con;
    if ($veriTabaniBaglantisi == '$db') {
        $sorgu = "SELECT * FROM $TableName";
        $veri1 = $db->prepare("$sorgu");
        $veri1->execute();
        $veri = $veri1->fetchAll(PDO::FETCH_ASSOC);
        return $veri;
    } elseif ($veriTabaniBaglantisi == '$VT_Master') {
        $sorgu = "SELECT * FROM $TableName";
        $veri1 = $VT_Master->prepare("$sorgu");
        $veri1->execute();
        $veri = $veri1->fetchAll(PDO::FETCH_ASSOC);
        return $veri;
    }
}

function vericekMsSql($TableName)
{
    global $db;
    $sorgu = "SELECT * FROM $TableName";
    $veri1 = $db->prepare("$sorgu");
    $veri1->execute();
    $veri = $veri1->fetchAll(PDO::FETCH_ASSOC);
    return $veri;
}


function vericekMy($TableName)
{
    global $con;
    $sorgu = "SELECT * FROM $TableName";
    $veri1 = $con->prepare("$sorgu");
    $veri1->execute();
    $veri = $veri1->fetchAll(PDO::FETCH_ASSOC);
    return $veri;
}
