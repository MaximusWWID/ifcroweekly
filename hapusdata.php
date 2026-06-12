<?php

    require "fungsi.php";
    $id = $_GET["id"];

    if(hapusdata($id) > 0)
    {
            echo "<script>
                    alert('Data Berhasil Dihapus');
                    window.location.href='mahasiswa.php';
                  </script>";  //
    }
    else
    {
            echo "<script>
                    alert('Data Gagal Ditambahkan');
                    window.location.href='mahasiswa.php';
                  </script>";
    }    
    
    

    
?>