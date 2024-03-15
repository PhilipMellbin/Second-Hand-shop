<div class="product" onclick="window.location = 'index.php?page=product&prod_id=<?= $this->prod_id?>';">
    <h3><?= $this->title?></h3>
    <div class="img">
        <img src="<?= $this->img?>" alt="image of <?= $this->title?>">
    </div>
    <p class=""><?= $this->price?></p>
</div>