<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/Second_Academia_Shop/Second-Hand-shop/api/v1/public_html/styles/style.css">
</head>
<body>
   <header class="top">
    <!--Title-->
    <div class="Title">
        <div class="pillar"><img src="https://cdn-icons-png.flaticon.com/512/4793/4793297.png" alt="LOGO"></div>
        <div class="Logo">
            <h1>Second Academia</h1>
            <div class="logo"><img src="/../Second_Academia_Shop/Second-Hand-shop/api/v1/public_html/img/182956.png" alt=""></div>
            <h2>Second hand study equipment</h2>
        </div>
        <div class="pillar"><img src="https://cdn-icons-png.flaticon.com/512/4793/4793297.png" alt="LOGO"></div>
        <!--<h1 class="end">Second Academia</h1>-->
        <!--<h1>SecondHand equipment</h1>-->
    </div>
    <!--Navbad-->
    <div class="navbar">
        <ul>
            <li class="button"><a class="Button" href="index.php?page=home">home</a></li>
            <li class="button"><a href="index.php?page=categories">categories</a><div class="Categories"></div></li>
            <li class="button"><a href="index.php?page=aboutus">About us</a></li>
            <li class="search">
                <form method="get" action="index.php?search=<?$inp?>">
                    <label for="">Search...</label>
                    <input type="text" name=<?$inp?>>
                    <input type="submit" value="submit">
                </form>
            </li>
            <li class="button"><!--<a href="index.php?page=home">Cart</a>-->
            <a href="index.php?page=checkout">Cart</a>
            <div class="Cart">
                <!--Seperate like the rest? To complex-->
            </div>
        </li>
            <li class="button"><a href="index.php?page=home">Region</a></li>
            <li class="button"><a href="index.php?page=home">Signup/Locin</a></li>
        </ul>
    </div>
</header>
<div class="slides">
    <div class="categories">
        <div class="subjects">
            <h3>subjects</h3>
            <ul>

            <!--continue to headermiddle1.php-->
            </ul>
        </div>
        <div class="types">
            <h3>type</h3>
            <ul>
                <!--continue to headermiddle2.php-->
            </ul>
        </div>
    </div>
    <div class="cart">
        <h3>Item amount: </h3>
        <!--continue to headerend.php-->
        <div>
            <a href="index.php?page=checkout">Go to checkout!</a>
        </div>
    </div>
</div> 
<main>
