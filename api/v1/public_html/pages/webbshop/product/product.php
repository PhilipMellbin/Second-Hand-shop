<section class="product">
    
</section>
<div class="productmain">
    <section class="images">
        <div class="img">
            <img src="<?=$this->img?>" alt="picture of <?=$this->title?>">
        </div>
    </section>
    <section class="content">
        <div class="title">
        <h2><?=$this->title?></h2>
        <div class="line first"></div>
        <div class="line second"></div>
        </div>
        <div class="descriptions">
            <section>
                <p><?=$this->description?></p>
            </section>
            <section>
                <a href="index.php?page=account&user=<?=$this->publisher?>">published by <?=$this->publisher?></a>
                <p>Publish date: <?=$this->publish_date?></p>
                <h3><?=$this->price?> SEK</h3>
                <form method="post" action="index.php?page=product&prod_id=<?=$this->prod_id?>">
                    <button type="submit" name="action" value="add_cart">Ad to cart!</button>
                </form>
            </section>
        </div>
    </section>
</div>