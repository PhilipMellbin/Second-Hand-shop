//start when everything is loaded
document.addEventListener("DOMContentLoaded", function()
{
    const cart = document.getElementsByClassName("cart");
    const categories = document.getElementsByClassName("category");

    const header = document.getElementsByTagName("header");
    const main = document.getElementsByTagName("main");
    const footer = document.getElementsByTagName("footer");

    const cart_btn = document.querySelectorAll('.cart-btn');
    const alt_cart_btn = document.getElementById("cart_btn");
    const cart_exit = document.getElementById("cart_exit");
    const navbutton = document.getElementsByClassName("navbutton");
    const nav = document.getElementsByClassName("navcontent");
    const exitbtn = document.getElementsByClassName("exitbtn");

    const login = document.getElementById("Login");
    const signup = document.getElementById("Signup");
    const signuppage = document.getElementById("signuppage");
    const loginpage = document.getElementById("loginpage");

    navbutton[0].onclick = function()
    {
        nav[0].style.display = "block";
    }
    cart_btn.forEach(btn => {

        btn.addEventListener('click', event => {
            cart[0].style.display = "block";
        });
     
     });
    alt_cart_btn.onclick = function()
    {
        header[0].style.filter = "brightnes(20%)";
        main[0].style.filter ="brightnes(20%)";
        footer[0].style.filter = "brightnes(20%)";
        cart[0].style.display = "block";
        console.log(header[0].style.filter, main[0].style.filter, footer[0].style.filter);
    }
    exitbtn[0].onclick = function()
    {
        nav[0].style.display = "none";
    }
    cart_exit.onclick = function()
    {
        cart[0].style.display = "none";
        header[0].style.filter = main[0].style.filter = footer[0].style.filter = "brightnes(100%);";
    }
    signup.onclick = function()
    {
        signuppage.style.display = "block";
        loginpage.style.display = "none";
    }
    login.onclick = function()
    {
        signuppage.style.display = "none";
        loginpage.style.display = "block"
    }
});