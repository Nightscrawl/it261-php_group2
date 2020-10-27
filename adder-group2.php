<!DOCTYPE html>
    <head>
        <title>My Adder Assignment -- GROUP 2</title>
    </head>

    <body>

        <h1>Adder.php - Group 2</h1>
        
        <form action="" method="POST">
            <label>Enter the first number:</label><input type="text" name="num1"><br>

            <label>Enter the second number:</label><input type="text" name="num2"><br>

            <input type="submit" value="Add Em!!">
            
        </form>

        <?php

            if( isset($_POST['num1']) ) {
                $num1 = $_POST['num1'];
                $num2 = $_POST['num2'];
                $myTotal = $num1 + $num2;
                echo '<h2>You added ' .$num1. ' and ' .$num2. '</h2>';
                echo '<p style="color:red;">and the answer is <br>' .$myTotal. '!</p>';
            }

        ?>

        <p><a href="">Reset page</a></p>

    </body>

</html>

