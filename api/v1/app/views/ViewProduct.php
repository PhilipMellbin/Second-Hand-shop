<?php


class ViewProduct extends View
{
    public $prod_id;
    public $title;
    public $img;
    public $price;
    public $product_subject;
    public $description;
    public $publisher;
    public $publish_date;
    public $date_added;
    
    public function __construct(array $products)
    {
        $this->prod_id = $products['prod_id'];
        $this->title = $products['title'];
        $this->img = $products['img'];
        $this->price = $products['price'];
        $this->product_subject = $products['subject'];
        $this->description = $products['description'];
        $this->publisher = $products['publisher'];
        $this->publish_date = $products['publish_date'];
        $this->date_added = $products['prod_date_added'];
        //set everything in the array
        //render product
    }
    public function render_product($type)
    {
        switch ($type)
        {
            case "small":
                $this->render("standard/products");
                break;
            case "standard":
                $this->render("product/product");
                break;
            case "cart":
                $this->render("standard/cartproducts");
                break;
            case "recite":
                $this->render("page", "dir");
                break;
    }
    }
}