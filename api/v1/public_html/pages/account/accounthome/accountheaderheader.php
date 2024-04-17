<header>
    <div class="profile">
        <section>
            <h1><?=$this->username?></h1>
            <p>Created in <?=$this->creationdate?></p>
        </section>
        <section>
            <div><img src="<?=$this->php?>" alt="img of <?=$this->username?>"></div>
        </section>
        <section>
            <h3><?=$this->rating?>/10</h3>
            <h3><?=$this->profits?> kr this month</h3>
        </section>
    </div>
    <section class="nav">
        <ul>
            <li><a href="index.php?page=accounthome">home</a></li>
            <li><a href="index.php?page=accountproducts">products</a></li>
            <li><a href="index.php?page=accountsoldproducts">sold</a></li>
            <li><form action="index.php?page=accounthome"></form></li>
            <li><a href="index.php?page=accountstats">stats</a></li> <!--is this necesary?-->
            <li><a href="index.php?page=accountsettings">settings</a></li>
            <li><form action="accounthome.php">
                <button name="action" value="logout"></button>
            </form></li>
        </ul>
    </section>
</header>