<!-- Aplikasi Persediaan Barang dengan PHP7 dan MySQLi
*******************************************************
* Developer    : Indra Styawantoro
* Company      : Indra Studio
* Release Date : 13 Maret 2017
* Website      : www.indrasatya.com
* E-mail       : indra.setyawantoro@gmail.com
* Phone        : +62-856-6991-9769
-->

<?php
session_start();

// Panggil koneksi database.php untuk koneksi database
require_once "../../config/database.php";

// fungsi untuk pengecekan status login user 
// jika user belum login, alihkan ke halaman login dan tampilkan pesan = 1
if (empty($_SESSION['username']) && empty($_SESSION['password'])){
    echo "<meta http-equiv='refresh' content='0; url=index.php?alert=1'>";
}
// jika user sudah login, maka jalankan perintah untuk insert, update, dan delete
else {
   if(!empty($_GET['act']) && ($_GET['act'] == 'approval1')){		
            $id = $_GET['id'];
            $query = mysqli_query($mysqli, "UPDATE is_barang_masuk
					SET status = 'ACCEPT' WHERE id_barang_masuk = '$id'")
			or die('Ada kesalahan pada query approval barang masuk : '.mysqli_error($mysqli));
            if ($query) {
                header("location: ../../main.php?module=permintaan_barang&alert=1");
            }   
   }else if(!empty($_GET['act']) && ($_GET['act'] == 'approval2')){		
            $id = $_GET['id'];
            $query = mysqli_query($mysqli, "UPDATE is_barang_keluar
					SET status = 'ACCEPT' WHERE id_barang_keluar = '$id'")
			or die('Ada kesalahan pada query approval barang keluar : '.mysqli_error($mysqli));
            if ($query) {
                header("location: ../../main.php?module=permintaan_barang&alert=2");
            }   
        }
}       
?>