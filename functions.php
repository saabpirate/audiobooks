<?php
   $dbuser="secsotm";
   $dbpass="mmm111";
   $dbname="sotm";
   $globalcon=mysqli_connect("localhost",$dbuser,$dbpass,$dbname);

function createList(){
   $hero1="none";
   $hero2="none";
   $hero3="none";
   $hero4="none";
   $hero5="none";

   $sql="SELECT * FROM Battles";
   $result=mysqli_query($globalcon,$sql);   

   while($row  = mysqli_fetch_array($result))
   {
      $bosql="SELECT * FROM BattleObjects WHERE BO_ID = " . $row['BattleID'];
      $boresult=mysqli_query($globalcon,$bosql);
      while($borow = mysqli_fetch_array($boresult))
      {
         if
      }
   }
}
