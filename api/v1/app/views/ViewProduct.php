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
        $this->prod_id = isset($products['prod_id']) ? $products['prod_id'] : null;
        $this->title = isset($products['title']) ? $products['title'] : null;
        $this->img = isset($products['img']) ? $products['img'] : null;
        $this->price = isset($products['price']) ? $products['price'] : null;
        $this->product_subject = isset($products['subject']) ? $products['subject'] : null;
        $this->description = isset($products['description']) ? $products['description'] : null;
        $this->publisher = isset($products['publisher']) ? $products['publisher'] : null;
        $this->publish_date = isset($products['publish_date']) ? $products['publish_date'] : null;
        $this->date_added = isset($products['prod_date_added']) ? $products['prod_date_added'] : null;
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