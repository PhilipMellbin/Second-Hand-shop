//start when everything is loaded
document.addEventListener("DOMContentLoaded", function()
{
    const cart = document.getElementsByClassName("cart");
    const categories = document.getElementsByClassName("category");

    const header = document.getElementsByTagName("header");
    console.log(header[0]);
    console.log(header[0].style);
    console.log(header[0].style.filter);
    header[0].style.filter = "brightnes(20%)";
    console.log(header[0].style.filter)
    const main = document.getElementsByTagName("main");
    const footer = document.getElementsByTagName("footer");

    const cart_btn = document.getElementById("cart_btn");
    const cat_btn = document.getElementById("cat_btn");
    const cart_exit = document.getElementById("cart_exit");
    cart_btn.onclick = function()
    {
        header[0].style.filter = "brightnes(20%)";
        main[0].style.filter ="brightnes(20%)";
        footer[0].style.filter = "brightnes(20%)";
        cart[0].style.display = "block";
        console.log(header[0].style.filter, main[0].style.filter, footer[0].style.filter);
    }
    /*cat_btn.onclick = function()
    {
        categories[0].style.display = "block";
        categories[0].style.filter="brightness(70%)"
    }*/
    cart_exit.onclick = function()
    {
        cart[0].style.display = "none";
        header[0].style.filter = main[0].style.filter = footer[0].style.filter = "brightnes(100%);";
    }
});