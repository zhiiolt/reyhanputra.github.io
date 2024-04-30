<?php

    $result = 0;
    $input = "0";

    if (isset($_POST['num'])) {
        if ($_POST['num-input'] == "0" && isset($_POST['comma'])) {
            $input = $_POST['num-input'].".";
        }
        else if ($_POST['num-input'] === "0") {
            $input = $_POST['num'];
        }
        else {
            $input = $_POST['num-input'].$_POST['num'];
        }
    } else {
        $input = "";
    }
    if (isset($_POST['op'])) {
        setcookie("num1", $_POST['num-input']);
        setcookie("op", $_POST['op']);
        $input = "";
    }
    if (isset($_POST['percent'])) {
        $input = $_POST['num-input'] / 100;
    }
    if (isset($_POST['<-'])) {
        $input = (int) ($_POST['num-input'] / 10);
    }
    if (isset($_POST['ac'])) {
        $input = 0;
    }
    if (isset($_POST['comma'])) {
        $input = $_POST['num-input'].".";
        
    }
    if (isset($_POST['equals'])) {
        $num = $_POST['num-input'];
        if (isset($_COOKIE['op'])) {
            switch ($_COOKIE['op']) {
                case '+':
                    {
                        $result = $_COOKIE['num1'] + $num;
                    }
                    break;
                case '-':
                    {
                        $result = $_COOKIE['num1'] - $num;
                    }
                    break;
                case '*':
                    {
                        $result = $_COOKIE['num1'] * $num;
                    }
                    break;
                case '/':
                    {
                        $result = $_COOKIE['num1'] / $num;
                    }
                    break;
                default:
                    $result = 0;
                    break;
            }
            
        }
        else {
            $result = 0;
        }
        $input = $result;
        setcookie("op", "", time()-3600);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculator</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>
<style>
    * {
        box-sizing: border-box;
        font-family: "Poppins", sans-serif;
        font-weight: 700;
    }
    body {
        background-color: gray;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: row;
        min-height: 100vh;
        overflow-y: hidden;
    }
    .calculator {
        display: flex;
        flex-direction: column;
        height: 80vh;
        width: 30vw;
        background-color: #e9ecef;
        border-radius: 20px;
    }
    #num-input {
        width: 100%;
        height: 100px;
        font-size: 3rem;
        text-align: right;
        padding: 12px;
        border: none;
        border-radius: 20px;
        background-color: #e9ecef;
    }
    #num-input:focus {
        border: none;
        outline: none;
    }
    .num-btn {
        display: grid;
        grid-template-columns: 1fr 1fr 1fr 1fr;
        padding: 12px;
        gap: 6px;
        border-radius: 20px;
        background-color: white;
    }
    .btn, button {
        border-radius: 40px;
        height: 80px;
        border: none;
        font-size: 2rem;
        cursor: pointer;
        transition: 0.2s ease;
    }
    .btn:hover, button:hover {
        background-color: #ced4da;
    }
    #op {
        color: #fd7e14;
    }
    #equals {
        color: white;
        background-color: #fd7e14;
    }
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
    }
</style>
<body>
    <div class="calculator">
        <form action="index.php" method="post">
            <div class="main-input">
                <input type="text" name="num-input" id="num-input" value="<?= $input ?>">
            </div>
            <div class="num-btn">
                <input type="submit" value="AC" class="btn" name="ac" id="op">
                <input type="submit" value="<-" class="btn" name="<-" id="op">
                <input type="submit" value="%" class="btn" name="percent" id="op">
                <input type="submit" value="/" class="btn" name="op" id="op">
                <input type="submit" value="7" class="btn" name="num">
                <input type="submit" value="8" class="btn" name="num">
                <input type="submit" value="9" class="btn" name="num">
                <input type="submit" value="*" class="btn" name="op" id="op">
                <input type="submit" value="4" class="btn" name="num">
                <input type="submit" value="5" class="btn" name="num">
                <input type="submit" value="6" class="btn" name="num">
                <input type="submit" value="-" class="btn" name="op" id="op">
                <input type="submit" value="1" class="btn" name="num">
                <input type="submit" value="2" class="btn" name="num">
                <input type="submit" value="3" class="btn" name="num">
                <input type="submit" value="+" class="btn" name="op" id="op">
                <div></div>
                <input type="submit" value="0" class="btn" name="num">
                <input type="submit" value="." class="btn" name="comma">
                <input type="submit" value="=" class="btn" name="equals" id="equals">
            </div>
        </form>
    </div>
</body>
</html>