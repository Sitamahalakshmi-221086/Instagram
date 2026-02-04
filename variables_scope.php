<?php
   #String 
   $mystring = "Gayatri";
   echo $mystring."<br>";
   echo gettype($mystring)."<br>";
   #Integer
   $num = 19;
   echo $num."<br>";
   echo gettype($num)."<br>";
   #float
   $num1 = 19.5;
   echo $num1."<br>";
   echo gettype($num1)."<br>";
   $boolValue = True;
   echo $boolValue."<br>";
   echo gettype($boolValue)."<br>";
   $array1 = array("fsd","ML","AI");
   print_r($array1)."<br>";
   echo gettype($array1);
   echo "<br>";
   #Key value Arrays
   $array2 = array("JS" => "MERN","Python" => "ML");
   echo "<br>";
   print_r($array2)."<br>";
   #multidimensional array
   $array3 = array(
    array("WT","FSD","ML","AI"),
    array("MERN","Django","Flutter"),
    array("JS" => "MERN","Python" => "ML")
   );
    echo "<br>";


   print_r($array3)."<br>";

   #Scope of Variables
   #Local Scope

    function Instagram_users(){
    $likes = True;
    $reels = 10;
    if(! $likes){
        echo "likes: $likes";
        
    }
    else{
        echo "watched reels : $reels";
    }
    

    }
    Instagram_users()."<br>";
    echo "<br>";
    #Global scope 
    global $num;
    $num  = 19;
    function globalVar(){
        global $num;
        if($num == 16){
            echo "The user got 16 comments";
        }else if ($num <= 19){
            echo "19k followers";
        }else{
            echo "No user Account";
        }
    }
    globalVar()."<br>";

    #static scope
    $var = "Hi";
    function fun(){
        global $hi;
        echo $hi;
        static $age = 20;
        $age ++;

    }
    fun()."<br>";
    fun()."<br>";


?>