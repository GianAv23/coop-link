<?php

session_start();

define('DSN','mysql:host=localhost;dbname=lecture_web');
define('DBBOS', 'root');
define('DBPASSBOS', '');
$kunci = new PDO(DSN, DBBOS, DBPASSBOS);

function cek_Admin($name, $pass){
    $name = strval($name);
    $pass = strval($pass);
    if( $name === "" && $pass === "" ){
        return false;
    }
    global $kunci;
    $sql_CARI_ADMIN = "SELECT * FROM lecture_web.adminko";
    $queryRes = $kunci->prepare($sql_CARI_ADMIN);
    $queryRes->execute([]);
    while($data_db = $queryRes->fetch(PDO::FETCH_ASSOC)){
        if( $data_db["adminName"] == $name && password_verify($pass, $data_db["adminPass"])){
            $_SESSION["adminID"] = $data_db["adminID"];
            return true;
        }
    }
    return false;
}

function cek_Nasabah($name, $pass){
    $name = strval($name);
    $pass = strval($pass);
    if( $name === "" && $pass === "" ){
        return "Username and password are required";
    }
    global $kunci;
    $sql_CARI_NASABAH = "SELECT * FROM lecture_web.users";
    $queryRes = $kunci->prepare($sql_CARI_NASABAH);
    $queryRes->execute([]);
    while($data_db = $queryRes->fetch(PDO::FETCH_ASSOC)){
        if( $data_db["namaUser"] == $name && password_verify($pass, $data_db["passwordUser"]) ){
            $_SESSION["nasabahID"] = $data_db["userID"];
            return "Valid";
        }
    }
    return "Invalid username or password";
}

function list_All_User(){
    global $kunci;
    $sql_LIST_ALL_USERS = "SELECT * FROM users";
    $arrList = [];
    $queryRes = $kunci->prepare($sql_LIST_ALL_USERS);
    $queryRes->execute([]);
    while( $row = $queryRes->fetch(PDO::FETCH_ASSOC) ){
        $arrList[] = $row;
    }
    return $arrList;
}

function remove_User($id){
    global $kunci;
    $id = intval($id);
    $sql_DELETE_TRANSAKSI_USER = "DELETE FROM transaksi WHERE userID = $id";
    $queryDel = $kunci->prepare($sql_DELETE_TRANSAKSI_USER);
    $queryDel->execute([]);
    $sql_DELETE_USER = "DELETE FROM users WHERE userID = ?";
    $queryRes = $kunci->prepare($sql_DELETE_USER);
    $queryRes->execute([$id]);
}
function change_User_Pass($newPass, $name){
    global $kunci;
    $name = strval($name);
    $newPass = strval($newPass);
    if( $newPass < 8 ){
        return false;
    }
    $sql_FIND_USERID = "SELECT userID FROM users WHERE namaUser = ?";
    $nama = $kunci->prepare($sql_FIND_USERID);
    $nama->execute([$name]);
    $resID = $nama->fetch(PDO::FETCH_ASSOC);
    $newPass = password_hash($newPass, PASSWORD_BCRYPT);
    $sql_CHANGE_PASSWORD = "UPDATE users SET passwordUser = ? WHERE userID = ?";
    $queryRes = $kunci->prepare($sql_CHANGE_PASSWORD);
    $queryRes->execute([$newPass, $resID["userID"]]);
    return true;
}
function change_Admin_Pass($newPass, $name){
    global $kunci;
    $name = strval($name);
    $newPass = strval($newPass);
    if( $newPass < 8 ){
        return false;
    }
    $sql_FIND_USERID = "SELECT adminID FROM adminko WHERE adminName = ?";
    $nama = $kunci->prepare($sql_FIND_USERID);
    $nama->execute([$name]);
    $resID = $nama->fetch(PDO::FETCH_ASSOC);
    $newPass = password_hash($newPass, PASSWORD_BCRYPT);
    $sql_CHANGE_PASSWORD = "UPDATE adminKo SET adminPass = ? WHERE adminID = ?";
    $queryRes = $kunci->prepare($sql_CHANGE_PASSWORD);
    $queryRes->execute([$newPass, $resID["adminID"]]);
    return true;
}

function info_Nasabah(){
    global $kunci;
    $id = $_SESSION["nasabahID"];
    $sql_INFO_NASABAH = "SELECT * FROM users WHERE userID = $id";
    $queryRes = $kunci->prepare($sql_INFO_NASABAH);
    $queryRes->execute([]);
    $var = $queryRes->fetch(PDO::FETCH_ASSOC);
    return $var;
}

function registrasi_Nasabah($email, $name, $pass, $address, $gender, $birthDay, $fileBayar, $potoPropil, $simpananPokok){
    $email = strval($email);
    $name = strval($name);
    $pass = strval($pass);
    $address = strval($address);
    $birthDay = strval($birthDay);
    $fileBayar = strval($fileBayar);
    $potoPropil = strval($potoPropil);
    $simpananPokok = intval($simpananPokok);
    if( $simpananPokok <= 0 ){
        return "Simpanan Pokok tidak boleh nol";
    }
    if( strlen($pass) < 8 ){
        return "Password minimal 8 karakter";
    }
    switch($gender){
        case 'male':
            $gender = "Pria";
            break;
        case 'female':
            $gender = "Wanita";
            break;
    }

    if( $fileBayar === "Error" ){
        return "File bayar Error";
    }
    if( $potoPropil === "Error" ){
        return "File foto profile Error";
    }

    if( $name === "" && $address === "" && $birthDay === '' && $email === ''){
        return "Lengkapi datanya";
    }

    $pass = password_hash($pass, PASSWORD_BCRYPT);
    global $kunci;
    $sql_INSERT_REGISTRASI = "INSERT INTO lecture_web.userregis ( emailRegis, namaRegis, passRegis, alamRegis, gendRegis, birtDRegis, filebayarRegis, simpananPokok, fotoProfil) 
                                VALUES ( ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $queryRes = $kunci->prepare($sql_INSERT_REGISTRASI);
    $queryRes-> execute([$email, $name, $pass, $address, $gender, $birthDay, $fileBayar, $simpananPokok, $potoPropil]);
    return "Berhasil";
}

function show_Register($id){
    global $kunci;
    $id = intval($id);
    if( $id === 0 ){
        $sql_LIST_ALL_REGISTER = "SELECT * FROM lecture_web.userregis ORDER BY regisID DESC";
        $arrList = [];
        $queryRes = $kunci->prepare($sql_LIST_ALL_REGISTER);
        $queryRes->execute([]);
        while( $row = $queryRes->fetch(PDO::FETCH_ASSOC) ){
            $arrList[] = $row;
        }
        return $arrList;
    } else {
        $sql_LIST_SPECIFIC_REGISTER = "SELECT * FROM lecture_web.userregis WHERE regisID = ?";
        $singleLIST = '';
        $queryRes = $kunci->prepare($sql_LIST_SPECIFIC_REGISTER);
        $queryRes->execute([$id]);
        $singleLIST = $queryRes->fetch(PDO::FETCH_ASSOC);
        if( $singleLIST["namaRegis"] !== "" ){
            return $singleLIST;
        }
        return "Gak ada datanya";
    }
}

function acc_Register($bools, $idRegister){
    global $kunci;
    $idRegister = intval($idRegister);
    switch($bools){
        case true:
            $sql_ADD_USER = "INSERT INTO lecture_web.users ( emailUser, passwordUser, namaUser, alamat, kelamin, tanggalLahir, fileBayar, simpananPokok, fotoProfil, simpananWajib, simpananSukaRela )
                            VALUES ( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $var = show_Register($idRegister);
            $queryRes = $kunci->prepare($sql_ADD_USER);
            $queryRes->execute([ $var["emailRegis"], $var["passRegis"], $var["namaRegis"], $var["alamRegis"], $var["gendRegis"], $var["birtDRegis"], $var["filebayarRegis"], $var["simpananPokok"], $var["fotoProfil"], 0, 0 ]);
            remove_Register($idRegister);
            break;
        case false:
            remove_Register($idRegister);
            break;
    }
}

function remove_Register($id){
    global $kunci;
    $id = intval($id);
    $sql_DELETE_REGISTER = "DELETE FROM lecture_web.userregis WHERE regisID = ?";
    $queryRes = $kunci->prepare($sql_DELETE_REGISTER);
    $queryRes->execute([$id]);
}

function jumlah_Total_Uang(){
    global $kunci;
    $sql_SELECT_ALLMONEY = "SELECT SUM(simpananPokok) AS totalPokok, SUM(simpananWajib) AS totalWajib, SUM(simpananSukaRela) AS totalSukaRela FROM lecture_web.users";
    $queryRes = $kunci->prepare($sql_SELECT_ALLMONEY);
    $queryRes->execute([]);
    $var = $queryRes->fetch(PDO::FETCH_ASSOC);
    return $var;
}

function history_Admin(){
    global $kunci;
    $sql_HISTORY_ADMIN = "SELECT namaUser, tanggalTf, jmlhTf, kategori, statusTf FROM transaksi INNER JOIN users ON transaksi.userID = users.userID ORDER BY tfID DESC";
    $queryRes = $kunci->prepare($sql_HISTORY_ADMIN);
    $queryRes->execute([]);
    $arrList = [];
    while( $row = $queryRes->fetch(PDO::FETCH_ASSOC) ){
        $arrList[] = $row;
    }
    return $arrList;
}

function history_Nasabah(){
    global $kunci;
    $id = $_SESSION["nasabahID"];
    $sql_HISTORY_NASABAH = "SELECT namaUser, kategori, statusTf, jmlhTf, tanggalTf FROM transaksi INNER JOIN users ON transaksi.userID = users.userID WHERE users.userID = ? ORDER BY tfID DESC";
    $queryRes = $kunci->prepare($sql_HISTORY_NASABAH);
    $queryRes->execute([$id]);
    $arrList = [];
    while( $row = $queryRes->fetch(PDO::FETCH_ASSOC) ){
        $arrList[] = $row;
    }
    return $arrList;
}

function verifi_Bayar(){
    global $kunci;
    $sql_HISTORY_ADMIN = "SELECT namaUser, emailUser, alamat, tanggalTf, jmlhTf, kategori, statusTf, buktiTf, tfID FROM transaksi INNER JOIN users ON transaksi.userID = users.userID AND statusTf = 'Reviewed' ORDER BY tfID DESC";
    $queryRes = $kunci->prepare($sql_HISTORY_ADMIN);
    $queryRes->execute([]);
    $arrList = [];
    while( $row = $queryRes->fetch(PDO::FETCH_ASSOC) ){
        $arrList[] = $row;
    }
    return $arrList;
}

function acc_Bayar($bools, $id){
    global $kunci;
    $id = intval($id);
    switch($bools){
        case true:
            $sql_ADD_TRANSAKSI = "UPDATE transaksi SET statusTf = 'Verified' WHERE tfID = $id";
            $queryRes = $kunci->prepare($sql_ADD_TRANSAKSI);
            $queryRes->execute([]);
            $sql_JMLH = "SELECT jmlhTf, kategori FROM transaksi WHERE tfID = $id";
            $jmlh = $kunci->prepare($sql_JMLH);
            $jmlh->execute([]);
            $num = $jmlh->fetch(PDO::FETCH_ASSOC);
            $idUser = $_SESSION["nasabahID"];
            if( $num["kategori"] === 'Wajib' ){
                $angka = $num["jmlhTf"];
                $sql_UPDATE_SIMPANAN = "UPDATE users SET simpananWajib = simpananWajib + $angka WHERE userID = $idUser";
                $res = $kunci->prepare($sql_UPDATE_SIMPANAN);
                $res->execute([]);
            } else {
                $angka = $num["jmlhTf"];
                $sql_UPDATE_SIMPANAN = "UPDATE users SET simpananSukaRela = simpananSukaRela + $angka WHERE userID = $idUser";
                $res = $kunci->prepare($sql_UPDATE_SIMPANAN);
                $res->execute([]);
            }
            break;
        case false:
            $sql_DELETE_TRANSAKSI = "UPDATE transaksi SET statusTf = 'Rejected' WHERE tfID = $id";
            $queryRes = $kunci->prepare($sql_DELETE_TRANSAKSI);
            $queryRes->execute([]);
            break;
    }
}

function pembayaran_Nasabah($kategori, $tanggal, $jumlah, $bukti){
    global $kunci;
    $id = $_SESSION["nasabahID"];
    $jumlah = intval($jumlah);
    $kategori = strval($kategori);
    $tanggal = strval($tanggal);
    $bukti = strval($bukti);
    switch($kategori){
        case 'wajib':
            $kategori = 'Wajib';
            break;
        case 'sukarela':
            $kategori = 'Sukarela';
            break;
    }
    $sql_PEMBAYARAN_NASABAH = "INSERT INTO transaksi (userID, kategori, tanggalTf, jmlhTf, buktiTf, statusTf) VALUE ( ?, ?, ?, ?, ? , 'Reviewed')";
    $queryRes = $kunci->prepare($sql_PEMBAYARAN_NASABAH);
    $queryRes->execute([$id,$kategori,$tanggal,$jumlah,$bukti]);
    return true;
}

function edit_Profile($name, $email, $address, $gender, $birthDay, $fotoPath){
    $name = strval($name);
    $email = strval($email);
    $gender = strval($gender);
    $birthDay = strval($birthDay);
    $fotoPath = strval($fotoPath);
    global $kunci;
    $id = $_SESSION["nasabahID"];
    switch($gender){
        case 'male':
            $gender = "Pria";
            break;
        case 'female':
            $gender = "Wanita";
            break;
    }
    $sql_EDIT_PROFILE = "UPDATE users SET namaUser = ?, emailUser = ?, alamat = ?, kelamin = ?, tanggalLahir = ?, fotoProfil = ? WHERE userID = $id ";
    $queryRes = $kunci->prepare($sql_EDIT_PROFILE);
    $queryRes->execute([$name, $email,$address, $gender, $birthDay, $fotoPath]);
    return true;
}

function foto_Path($upload){
    $target_dir = "../images/"; 
    $target_file = $target_dir . basename($_FILES[$upload]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    switch ($imageFileType) {
        case 'jpg':
        case 'png':
        case 'jpeg':
        case 'svg':
        case 'gif':
            if (move_uploaded_file($_FILES[$upload]["tmp_name"], $target_file)){
                return $target_file;
            } else {
                $error_message = "Error"; // gagal
            }
            break;
        default:
            $error_message = "Error"; // file bukan type gambar
            break;
    }
    return $error_message;
}