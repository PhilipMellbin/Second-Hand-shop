<section class="product">
    
</section>
<div class="product">
    <h2><?=$this->title?></h2>
    <section>
        <img src="<?=$this->img?>" alt="picture of <?=$this->title?>">
    </section>
    <section>
        <p>Publisher: <?=$this->publisher?></p>
        <p>Publish date: <?=$this->date_added?></p>
        <p>Description:
            <?=$this->description?>
        </p>
        <h3><?=$this->price?></h3>
        <form method="post" action="index.php?page=product&prod_id=<?=$this->prod_id?>">
            <button type="submit" name="action" value="add_cart">Ad to cart!</button>
        </form>
    </section>
</div>