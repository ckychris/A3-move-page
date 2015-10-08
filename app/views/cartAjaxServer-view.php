<?php
    session_start();

    function isValidVoucher($voucher){
        if(preg_match("/^[\d]{5}-[\d]{5}-[A-Z]{2}$/", $voucher)){
           $array = explode("-",$voucher);
           $d1 = str_split($array[0]);
           $d2 = str_split($array[1]);
           $chkL = str_split($array[2]);
           $count = 0;
           foreach($d1 as $i){
               $d1[$count] = intval($i);
               $count++;
           }
           $count = 0;
           foreach($d2 as $i){
               $d2[$count] = intval($i);
               $count++;
           }
           
           $chk1 = (($d1[0]*$d1[1]+$d1[2])*$d1[3]+$d1[4])%26;
           $chk2 = (($d2[0]*$d2[1]+$d2[2])*$d2[3]+$d2[4])%26;
           return ((ord($chkL[0])-65)==$chk1)&&((ord($chkL[1])-65)==$chk2);
        }else{
           return false;
        }
    }
    
    if(isset($_POST["name"])){
        $_SESSION["name"] = $_POST["name"];
        echo preg_match("/^[a-z\sA-Z]+$/", $_POST["name"]);
    }  
    if(isset($_POST["email"])){
        $_SESSION["email"] = $_POST["email"];
        echo filter_var($_POST["email"], FILTER_VALIDATE_EMAIL);
    }
    if(isset($_POST["phone"])){
        $_SESSION["phone"] = $_POST["phone"];
        echo preg_match("/^(\(04\)|04|\+614)?\d{4}?\d{4}$/", $_POST["phone"]);
    }
    if(isset($_POST["voucher"])){
        $_SESSION["voucher"] = $_POST["voucher"];
        echo isValidVoucher($_POST["voucher"]);
        if(isset($_SESSION["grand-total"])){
            if(isValidVoucher($_POST["voucher"])){
                $_SESSION["grand-total"] = $_SESSION["total"]*0.8;
            }else{
                $_SESSION["grand-total"] = $_SESSION["total"];
            }
        }
    }
    if(isset($_POST["empty"])){
        session_destroy(); 
    }
    if(isset($_POST["updateGrandTotal"])){
        if(isset($_SESSION["grand-total"])){
            echo $_SESSION["grand-total"];
        }else{
            echo "0.00";
        }
    }
    if(isset($_POST["session"])){
        echo json_encode($_SESSION);
    }
    if(isset($_POST["delOne"])){
        unset($_SESSION["cart"]["screenings"][$_POST["delOne"]]);
        $_SESSION["cart"]["screenings"] = array_values($_SESSION["cart"]["screenings"]);
        
        if(count($_SESSION["cart"]["screenings"])>0){
            $grand = 0;
            foreach($_SESSION["cart"]["screenings"] as $i){
                $grand += $i["sub-total"];
            }
            $_SESSION["total"] = $grand;
        }else{
            $_SESSION["total"] = 0.00;
        }
    }
    
?>