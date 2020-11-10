<?php

$name = '';
$email = '';
$amount = '';
$bank = '';
$currency = '';
    // because code is moved, must now initialize vars

$nameErr = '';
$emailErr = '';
$amountErr = '';
$bankErr = '';
$currencyErr = '';

if($_SERVER['REQUEST_METHOD'] == 'POST') {  // IF server has a request method of post, do the following

    // IF name is empty, create var $nameErr and say, "please fill out your name" and assign to var
    // if NOT empty, $name = $_POST['name']

    // delcare errors - if field is empty, do something
    // a lot of IF statements - if all IF statements are true, then yay

    if( empty($_POST['name']) ) {  // always declare emptys at the top
        $nameErr = 'Please fill out your name.';
    } else {
        $name = $_POST['name'];  // IF empty, display error, else assn the post name to var $name
    }

    if( empty($_POST['email']) ) {
        $emailErr = 'Please fill out your email.';
    } else {
        $email = $_POST['email'];
    }

    if( $_POST['bank'] == 'NULL' ) {
        $bankErr = 'Please choose your banking institution.';
    } else {
        $bank = $_POST['bank'];
    }

    if( empty($_POST['amount']) ) {
        $amountErr = 'Show me the money!';
    } else {
        $amount = $_POST['amount'];
    }

    if( empty($_POST['currency']) ) {
        $currencyErr = 'Please select one of the currencies.';
    } else {
        $currency = $_POST['currency'];
    }

} // close server request method


function message($name, $bank, $email) {

    // because IF errors are moved above, change from elseif
    if( isset(  // IF all the above errors work out, do the following
        // $_POST['name'],
        // $_POST['email'],
        // $_POST['bank'],  // now redundant
        $_POST['amount'],
        $_POST['currency']) && 
        is_numeric($_POST['amount']) && 
        is_numeric($_POST['currency']) ) {  // IF all of these are set, AND amt/curr, do the following

            // $name = $_POST['name'];
            // $email = $_POST['email'];
            // $bank = $_POST['bank'];  // redundant
            $amount = $_POST['amount'];
            $currency = $_POST['currency'];  // assign set vals to vars

            $total = $amount * $currency;
            $total_f = number_format($total, 2);

            echo '<div class="box">';
            echo '<h2>Thank you, ' .$name. ', for filling out our form. Your money will be wired to ' .$bank. ' within 24 hours.</h2>';
            echo '<p>' .$name. ', you now have $' .$total_f. ' American dollars!</p>';
            echo '<p>We will be getting back to you via your email: ' .$email. '.</p>';

            if( ($total >= 0) && ($total < 750) ) {
                echo '<h1 class="red">Hmm... could be better...</h1>';
                echo '<iframe width="560" height="315" src="https://www.youtube.com/embed/l5aZJBLAu1E" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
                echo '</div>';
                echo '<body class="rain"></body>';
            } else {
                echo '<h1 class="green">Life is good!</h1>';
                echo '</div>';
                echo '<body class="confetti"></body>';
            }

        } // end elseif isset

}  // end function message


?>


<!DOCTYPE html>
<html lang="en-us">
    <head>
        <title>Group Currency Form, with function</title>
        <meta name="author" content="Kira Abell, Hongbin Liu, Jordan Lui, Sebastian Quintana, Yuqiang Tan" />
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width,inital-scale=1" />
        <meta name="robots" content="noindex,nofollow" />

        <style>

            form {
                width: 350px;
                margin: 20px auto;
            }

            input, select {
                margin: 5px 0;
            }

            input[type=text], input[type=email] {
                width: 100%;
            }

            input[type=submit], .button {
                padding: 2px 8px;
            }

            .button a {
                color: black;
                text-decoration: none;
            }

            fieldset {
                padding: 10px;
                padding-right: 15px;
                color: #666;
                background-color: white;
            }

            label {
                display: block;
                margin-bottom: 12px;
            }

            ul {
                margin: 6px 0;
            }

            li {
                list-style-type: none;
                list-style-position: outside;
            }

            p, h1, h2 {
                margin: 0 auto 10px;
                text-align: center;
            }

            .box {
                width: 600px;
                margin: 20px auto;
                background-color: beige;
                padding: 20px;
                border: 1px solid #666;
                text-align: center;
            }

            span {
                display: block;
                color: red;
                font-style: italic;
            }

            .red {
                color: red;
            }

            .green {
                color: green;
            }

            .confetti {
                background-image: url(img/confetti.gif);
                background-color: green;
            }

            .rain {
                background-image: url(img/rain.gif);
                background-color: red;
            }

        </style>

    </head>
    
    <body>

        <h1 class="green">Group Currency Form, with function</h1>
    
        <form action="" method="POST">

            <fieldset>

                <label>
                    Name
                    <input type="text" name="name" value="<?php 
                        if( isset($_POST['name']) ) echo $_POST['name']; ?>"><br />  <!-- if isset post name is set, then show the post name -->
                    <span><?php echo $nameErr; ?></span>
                </label>

                <label>
                    Email
                    <input type="email" name="email" value="<?php 
                        if( isset($_POST['email']) ) echo $_POST['email']; ?>"><br />
                    <span><?php echo $emailErr; ?></span>
                </label>

                <label>
                    Choose your banking institution
                    <select name="bank">
                        <option value="NULL" <?php 
                            if( isset($_POST['bank']) && $_POST == 'NULL' ) {
                                echo 'selected = "unselected"';
                            } ?>>Select one
                        </option>
                        <option value="Bank of America" <?php 
                            if( isset($_POST['bank']) && $_POST['bank'] == 'Bank of America' ) {
                                echo 'selected = "selected"';
                            } ?>>Bank of America
                        </option>
                        <option value="Chase Bank" <?php 
                            if( isset($_POST['bank']) && $_POST['bank'] == 'Chase Bank' ) {
                                echo 'selected = "selected"';
                            } ?>>Chase Bank
                        </option>
                        <option value="Boeing Credit Union" <?php 
                            if( isset($_POST['bank']) && $_POST['bank'] == 'Boeing Credit Union' ) {
                                echo 'selected = "selected"';
                            } ?>>Boeing Credit Union
                        </option>
                        <option value="Wells Fargo" <?php 
                            if( isset($_POST['bank']) && $_POST['bank'] == 'Wells Fargo' ) {
                                echo 'selected = "selected"';
                            } ?>>Wells Fargo
                        </option>
                        <option value="The Mattress" <?php 
                            if( isset($_POST['bank']) && $_POST['bank'] == 'The Mattress' ) {
                                echo 'selected = "selected"';
                            } ?>>The Mattress
                        </option>
                    </select><br />
                    <span><?php echo $bankErr; ?></span>
                </label>

                <label>
                    How much money do you have?
                    <input type="text" name="amount" value="<?php 
                        if( isset($_POST['amount']) ) echo $_POST['amount']; ?>"><br />
                    <span><?php echo $amountErr; ?></span>
                </label>

                <label>
                    Choose your currency
                    <ul>  <!-- if post currency was set
                                is the post currency equal to the value? -->
                        <li><input type="radio" name="currency" value="0.013"
                            <?php if( isset($_POST['currency']) && $_POST['currency'] == '0.013' ) echo 'checked="checked"'; ?>> Rubles</li>
                        <li><input type="radio" name="currency" value="0.76"
                            <?php if( isset($_POST['currency']) && $_POST['currency'] == '0.76' ) echo 'checked="checked"'; ?>> Canadian</li>
                        <li><input type="radio" name="currency" value="1.28"
                            <?php if( isset($_POST['currency']) && $_POST['currency'] == '1.28' ) echo 'checked="checked"'; ?>> Pounds</li>
                        <li><input type="radio" name="currency" value="1.18"
                            <?php if( isset($_POST['currency']) && $_POST['currency'] == '1.18' ) echo 'checked="checked"'; ?>> Euros</li>
                        <li><input type="radio" name="currency" value="0.0094"
                            <?php if( isset($_POST['currency']) && $_POST['currency'] == '0.0094' ) echo 'checked="checked"'; ?>> Yen</li>
                    </ul>
                    <span><?php echo $currencyErr; ?></span>
                    
                </label>

                <input type="submit" value="Convert it!"> 

                <button class="button"><a href="">Reset Form</a></button>

            </fieldset>

        </form>

        <?php echo message($name, $bank, $email); ?>

    
    </body>
    
</html>