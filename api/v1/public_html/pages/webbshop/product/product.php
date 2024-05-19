<section class="product">
    
</section>
<div class="productmain">
    <section id="success">
        <h1>Success! <?=$this->title?> Is now in cart!</h1>
        <div>
            <a class="capitalism" href="index.php?page=home">Buy more!</a>
            <a class="let-go" href="index.php?page=checkout">To Checkout</a>
        </div>
    </section>
    <section class="images">
        <div class="img">
            <img src="data:image/jpeg;base64, <?=base64_encode($this->img)?>" alt="image of <?= $this->title?>">
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
                    <button type="submit" name="action" value="add_cart"><p>Ad to cart!</p></button>
                </form>
            </section>
        </div>
    </section>
</div>
<section class="view_start">
    <h2>Or maby you're intresdet in...</h2>
</section>
<section class="products">