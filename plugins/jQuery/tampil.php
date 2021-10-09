<?php

mysql_connect("localhost","root","") or die("error koneksi");
  mysql_select_db("guru") or die("error pilih db");
 
 $judul=$_POST["judul"];

 $result=mysql_query("SELECT * FROM guru where nama_gr like '%$judul%' ");
 $found=mysql_num_rows($result);
 
 if($found>0){
    while($row=mysql_fetch_array($result)){
    echo "<li>$row[nama_gr]</br>";
    }   
 }else{
    echo "<li>Tidak ada artikel yang ditemukan <li>";
 }
?>