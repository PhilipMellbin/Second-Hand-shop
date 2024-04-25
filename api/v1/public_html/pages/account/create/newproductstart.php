<header>
    <h1>Build-A-Success!</h1>
</header>
<main>
    <form action="index.php?page=createproduct" method="post">
        <section class="product">
            <div class="main">
                <header class="titls">
                    <input type="text" name="title" id="title" placeholder="Text">
                    <input type="file" id="img" name="img" accept="image/png, image/jpeg" />
                </header>
                <main>
                    <section>
                        <input type="text" name="description" placeholder="
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                        Praesent dignissim sed odio semper pulvinar. 
                        Nullam in arcu est. 
                        Etiam ornare tellus velit, ut pharetra ex aliquam a. 
                        Sed dignissim auctor neque. 
                        Duis sodales id nunc non finibus. 
                        Suspendisse at diam mattis, vulputate erat et, interdum massa. 
                        Cras vitae lacinia diam, at facilisis neque. 
                        Nunc congue pellentesque tristique. 
                        Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; 
                        Ut tincidunt egestas diam eget eleifend. 
                        Mauris venenatis sagittis magna, vitae sollicitudin nibh blandit vel. 
                        In et tortor pulvinar, mollis elit consectetur, scelerisque quam. 
                        Nullam sagittis purus vel nunc maximus malesuada. 
                        Sed semper commodo arcu, accumsan feugiat nibh pretium sed.
                        ">
                    </section>
                    <section>
                        <p>published by ...You!</p>
                        <p>publish date: now!</p>
                        <h3><input type="number" name="price" id="price"> SEK</h3>
                    </section>
                </main>
            </div>
            <section>
                <div class="small">
                    <h2>Your product in small form:</h2>
                </div>
                <div class="type">
                    <h2>Finaly, select the subject</h2>
                    <select name="subject" id="subject">
