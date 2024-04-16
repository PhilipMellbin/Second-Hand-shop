<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <header class="top"><h1>Second Academia</h1><img src="" alt=""></header>
    <main>
        <section class="acountlink">
            <h1>Hello again <?=$this->emall?></h1>
        <form method="post" action="index.php?page=login">
                    <button type="submit" name="action" value="add_cart"><p>Welcome back!</p></button>
                </form>
        </section>
        <section class="changepassword">
            <h2>If this was not you...</h2>
            <a href="index.php=?page=changepassword">Change password!</a>
        </section>
        <section class="login_info">
            <p>ip: <?=$_SERVER['REMOTE_ADDR'];?></p>
            <p>time: <?=time()?></p>
        </section>
    </main>
    <footer>
        <p>(c) Second academia INC</p>
        <a href="">Developed by Mellbin Webdev</a>
    </footer>
</body>
</html>