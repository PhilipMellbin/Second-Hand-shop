//start when everything is loaded
document.addEventListener("DOMContentLoaded", function()
{
    const cart = document.getElementsByClassName("cart");
    const categories = document.getElementsByClassName("category");

    const cart_btn = document.getElementById("cart_btn");
    const cat_btn = document.getElementById("cat_btn");
    const cart_exit = document.getElementById("cart_exit");
    cart_btn.onclick = function()
    {
        cart[0].style.display = "block";
        document.body.style.filter="brightness(70%)"
    }
    cat_btn.onclick = function()
    {
        categories[0].style.display = "block";
        categories[0].style.filter="brightness(70%)"
    }
    cart_exit.onclick = function()
    {
        categories[0].style.display = "none";
        cart[0].style.display = "none";
        document.body.style.filter="brightness(100%)";
    }
    /*document.body.addEventListener("click", function() {
        document.body.style.filter="brightness(100%)"
        cart[0].style.display = "none";
    });*/
});