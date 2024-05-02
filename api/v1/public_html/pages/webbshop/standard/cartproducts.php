<div class="product_cart">
    <p><?=$this->title?></p>
    <img src="data:image/jpeg;base64, <?=base64_encode($this->img)?>" alt="image of <?= $this->title?>">
    <p>price: <?=$this->price?></p>
    <form action="index.php?page=checkout&prod_id=<?=$this->prod_id?>" method="post">
        <button type="submit" name="action" value="delete_cart">Delete</button>
    </form>
</div>