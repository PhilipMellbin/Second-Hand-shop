<div class="product_cart">
    <p><?=$this->title?></p>
    <img src="<?=$this->img?>" alt=" img of <?=$this->title?>">
    <p>price: <?=$this->price?></p>
    <form action="index.php?page=checkout&prod_id=<?=$this->prod_id?>" method="post">
        <button type="submit" name="action" value="delete_cart">Delete</button>
    </form>
</div>