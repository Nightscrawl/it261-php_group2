<!DOCTYPE html>
    <head>
        <title>My Adder Assignment -- GROUP 2</title>
        <style>
            p {
                color:red;
                text-align: center;
            }
            
            h1 {
                color:green;
            }
            
            h2 {
                font-size:1.5em;
                text-align: center;
            }
            
            form {
                width:350px;
                margin:0 auto;
                border:1px solid red;
                padding:10px;
            }
            
            h1 {
                text-align: center;
            }

            label, input[type=submit] {
                display: block;
                margin-bottom: 10px;
            }
        </style>
    </head>

    <body>

        <h1>Adder.php - Group 2, is_numeric</h1>
        
        <form action="" method="POST">
            <label>
                Enter the first number: 
                <input type="text" name="num1">
            </label>

            <label>
                Enter the second number: 
                <input type="text" name="num2">
            </label>

            <input type="submit" value="Add Em!!">
            
        </form>

        <?php

            if( isset(
                $_POST['num1'],
                $_POST['num2'])
                ) {
                    $num1 = $_POST['num1'];
                    $num2 = $_POST['num2'];
                    // $myTotal = $num1 + $num2;

                    if( (is_numeric($num1) || empty($num1)) && (is_numeric($num2) || empty($num2)) ) {  // if num1 is a number or empty, and if num2 is a number or empty

                        if( empty($num1) && $num2 ) {  // if num1 is empty and num2 is present
                            echo '<h2>You added nothing to ' .$num2. '</h2>';
                            echo '<p style="color:red;">so the answer is <br>' .$num2. '!</p>';
                        }

                        elseif( empty($num2) && $num1 ) {  // if num2 is empty and num1 is present
                            echo '<h2>You added nothing to ' .$num1. '</h2>';
                            echo '<p style="color:red;">so the answer is <br>' .$num1. '!</p>';
                        }

                        elseif( empty($num1 && $num2) ) {  // if both are empty
                            echo '<p>Please enter at least one value.</p>';
                        }

                        else {
                            $myTotal = $num1 + $num2;  // add num1 and num2
                            echo '<h2>You added ' .$num1. ' and ' .$num2. '</h2>';
                            echo '<p style="color:red;">and the answer is <br>' .$myTotal. '!</p>';
                        }

                    } else {  // if num1 OR num2 is not a number
                        echo '<p>Please enter numbers only.</p>';
                    }

            }

        ?>

        <p><a href="">Reset page</a></p>

    </body>

</html>

