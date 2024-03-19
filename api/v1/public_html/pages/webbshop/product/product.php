<section class="product">
    
</section>
<div class="productmain">
    <section class="images">
        <img src="<?=$this->img?>" alt="picture of <?=$this->title?>">
    </section>
    <section class="content">
        <div class="title">
        <h2><?=$this->title?></h2>
        </div>
        <div class="descriptions">
            <section>
                <?=$this->description?>
            </section>
            <section>
                <p>Publisher: <?=$this->publisher?></p>
                <p>Publish date: <?=$this->publish_date?></p>
                <h3><?=$this->price?> SEK</h3>
                <form method="post" action="index.php?page=product&prod_id=<?=$this->prod_id?>">
                    <button type="submit" name="action" value="add_cart">Ad to cart!</button>
                </form>
            </section>
        </div>
    </section>
</div>