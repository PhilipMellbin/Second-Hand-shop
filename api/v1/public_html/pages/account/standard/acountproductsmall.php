<div class="product_edit" onclick="window.location = 'index.php?page=productedit&prod_id=<?= $this->prod_id?>';">
    <h3><?= $this->title?></h3>
    <div class="img">
        <img src="<?= $this->img?>" alt="image of <?= $this->title?>">
    </div>
    <p class=""><?= $this->price?></p>
    <form action="index.php?page=comfirm_purchase">
        <button name="action" value="gotocomfirm">Go to Comfirmation Site!</button>
    </form>
</div>