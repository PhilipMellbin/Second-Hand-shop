<header class="acountheader">
    <div class="profile">
        <section>
            <h3><?=$this->profile_title?></h3>
            <p>since <?=$this->profile_founding?></p>
        </section>
        <section>
            <img src="" alt="">
        </section>
        <section>
            <h3><?=$this->rating?></h3>
        </section>
    </div>
    <div class="nav">
        <ul>
            <li><a href="index.php?page=acounthome">home</a></li>
            <li><a href="index.php?page=acountproducts">products</a></li>
            <li><a href="">sold products</a></li>
            <li><form action="acounthome.php"></form></li>
            <li><a href="">stats</a></li>
            <li><a href="">settings</a></li>
            <li><form action="acounthome.php" method="post">
                <button type="submit" name="action" value="log_out"></button>
            </form></li>
        </ul>
    </div>
</header>
<main>
    <article class="stats_container">
        <section class="title">
            <h1>Statistics</h1>
        </section>
        <section class="stats">
            
        </section>
    </article>
    <article class="popularproducts_container">
        <section class="title">
            <h1>Popular Product</h1>
        </section>
        <section class="products">

        </section>
    </article>
</main>