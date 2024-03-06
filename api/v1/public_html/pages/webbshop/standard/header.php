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
    <div class="Title">
        <h1 class="end">Second Academia</h1>
        <div class="img"><img src="/Second_Academia_Shop/Second-Hand-shop/api/v1/public_html/img/column-line-black-icon-png_309179.png" alt=""> </div>
        <h1>SecondHand equipment</h1>
    </div>
    <nav>
        <a class="link" href="index.php?page=home">home</a>
        <p class="link" onmouseover="//display categories"></p>
        <form method="get" action="index.php?search=<?$inp?>">
            <label for="">Search...</label>
            <input type="text" name=<?$inp?>>
            <input type="submit" value="submit">
        </form>
    </nav>
   </header> 
<main>
