const dropdowns =
{
    cart: document.getElementsByClassName("cart"),
    categories: document.getElementsByClassName("category"),
    cart_btn: document.getElementById("cart_btn"),
    cat_btn: document.getElementById("cat_btn"),

    revert: function()
    {
        window.style.filter="brightness(100%)"
        cart[0].style.display = "none";
        categories[0].style.display = "none";
    },
    dim: function()
    {
        window.style.filter="brightness(70%)"
    },
    disp_cart: function()
    {
        cart[0].style.display = "flex";
        this.dim()
    },
    disp_cat : function()
    {
        categories[0].style.display = "flex";
        this.dim() 
    }
}
/*const cart = document.getElementsByClassName("cart");
const categories = document.getElementsByClassName("category");

const cart_btn = document.getElementById("cart_btn");
const cat_btn = document.getElementById("cat_btn");
cart_btn.onclick = function()
{
    cart[0].style.display = "flex";
    window.style.filter="brightness(70%)"
}
cat_btn.onclick = function()
{
    categories[0].style.display = "flex";
}
window.addEventListener("click", function() {
    window.style.filter="brightness(100%)"
    cart[0].style.display = "none";
    categories[0].style.display = "none";
});*/