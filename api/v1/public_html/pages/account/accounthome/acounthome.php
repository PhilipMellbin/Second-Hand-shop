<!--Hem, Instälningar, Skapa produkt, Redigera produkter, Se köp, Logga ut-->
<header>
    <section class="account_header">
        <div>
            <p>Account created: <?=$this->account_created?></p>
        </div>
        <div>
            <img src="" alt="">
            <h3><?=$this->account_name?></h3>
            <a href=""><div>rating: </div></a>
        </div>
        <div>
            <p>Profit this month: <?=$this->account_profits?></p>
        </div>
    </section>
    <section class="account_navbar">
        <ul>
            <li><div><a href="index.php?page=accounthome">home</a></div></li>
            <li><div><a href="index.php?page=accountproduct">create</a></div></li>
            <li><div><a href="index.php?page=accountpurchases">Products</a></div></li>
            <li><div><a href="index.php?page=accountsettings">settings</a></div></li>
            <li>
                <div>
                    <form action="index.php?page=acounthone">
                        <button type="submit" name="action" falue="logout">Log out</button>
                    </form>  
                </div>
            </li>
        </ul>
    </section>
</header>
<main>
    <section class="charts">
        <div class="activity"></div>
        <div class="profit"></div>
    </section>
    <section class="sold_products">
        <h2>Sold products</h2>
        <form action=""></form><!--Search specific product you've created-->
        <!--lazy load-->