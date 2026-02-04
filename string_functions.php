<html>
<head>
    <title>String Functions in PHP</title>
</head>
<body>
    <h1>String Functions in PHP</h1>
    <form method="post" action="string_functions.php">
        <input type="text" name = "username" placeholder="Enter your name">
    </form>

  
        


    <?php
        $mystring = $_POST['username'];
        echo "Length of the string: " . strlen($mystring) . "<br>";
        echo "Word count: " . str_word_count($mystring) . "<br>";
        echo "Reversed string: " . strrev($mystring) . "<br>";
        echo "Uppercase: " . strtoupper($mystring) . "<br>";
        echo "Lowercase: " . strtolower($mystring) . "<br>";
        echo "Uppercase First: " . ucfirst($mystring) . "<br>";
        echo "Uppercase Words: " . ucwords($mystring) . "<br>";
        $count=1;
        echo "Position of 'World': " . strpos($mystring, "World") . "<br>";
        echo "Replace 'World' with 'PHP': " . str_replace("World", "PHP", $mystring, $count) . "<br>";
        echo "Number of replacements: " . $count . "<br>";
        echo "replace usinf ireplace: " . str_ireplace("hello", "Hi", $mystring) . "<br>";
        //preg_replace
        $pattern = '/\\d{10}/';
        $replacement = '**********';
        $text = 'My phone number is 1234567890.';
        $result = preg_replace($pattern, $replacement, $text);
        echo "After preg_replace: " . $result . "<br>";

        echo "substring (7,5): " . substr($mystring, 7, 5) . "<br>";
        echo "trim: " . trim("   Hello, World!   ") . "<br>";
        echo "ltrim: " . ltrim("   Hello, World!   ") . "<br>";
        echo "rtrim: " . rtrim("   Hello, World!   ") . "<br>";
        //String COMPARISON
        $str1 = "dVELOPER";
        $str2 = "Developer";
        if (strcmp($str1, $str2) === 0) {
            echo "Strings are equal<br>";
        } else {
            echo "Strings are not equal<br>";
        }

        if (strcasecmp($str1, $str2) === 0) {
            echo "Strings are equal (case-insensitive)<br>";
        } else {
            echo "Strings are not equal (case-insensitive)<br>";
        }

        //Special characters and security
        echo "Html special chars: " . htmlspecialchars("<a href='test'>Test</a>") . "<br>";
        echo "Add slashes: " . addslashes("O'Reilly") . "<br>";
        echo "Stripslashes: " . stripslashes("O\'Reilly") . "<br>";


        
       
       
    ?>
</body>








             
