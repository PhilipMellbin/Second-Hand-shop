<article class="loginsection">
    <section class="select">
        <button id="Login"><h1>Log in!</h1></button>
        <h1>/</h1>
        <button id="Signup"><h1>Sign up!</h1></button>
    </section>
    <section class="logincontents login">
        <form action="index.php?page=login" method="post">
            <label for="email">Email:</label>
            <input type="text" name="email" id="email" placeholder="pelle.svanslos@gmail.com">
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" placeholder="V4rtÄrmïÑ_Sx4ns?!?!?" >
            <button type="submit" name="action" value="login">Log in!</button>
        </form>
    </section>
    <section class="logincontents signin">
        <form action="index.php?page=login" method="post">
            <label for="email">Email:</label>
            <input type="text" name="email" id="email">
            <label for="password">Password:</label>
            <input type="password" name="pass" id="pass">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name">
            <label for="PhoneNumber">PhoneNumber:</label>
            <input type="text" name="phone" id="phone">
            <label for="address">Address:</label>
            <input type="text" name="address" id="address">
            <button type="submit" name="action" value="signup">Sign up!</button>
        </form>
    </section>
</article>