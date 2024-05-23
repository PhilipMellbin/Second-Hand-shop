<?php


class ViewProduct extends View
{
    ##################################(Vars)##############################
    public $i;
    public $prod_id; //Should i make them private?
    public $title;
    public $img;
    public $price;
    public $product_subject;
    public $description;
    public $publisher;
    public $publish_date;
    public $date_added;
    ##################################(cosntruct)##############################
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
         
        /*$keys = ['prod_id', 'title', 'img', 'price', 'subject', 'description', 'publisher', 'publish_date', 'prod_date_added'];
        foreach ($keys as $key) {
            if (property_exists($this, $key)) {
                $this->{$key} = isset($products[$key]) ? $products[$key] : null;
            }
        }*/
        //set everything in the array
        //render product
    }
    ##################################################(render specified type)####
    public function render_product($type)
    {
        switch ($type)
        {
            case "small":
                $this->render("/webbshop/standard/products");
                break;
            case "standard":
                $this->render("/webbshop/product/product");
                break;
            case "cart":
                $this->render("/webbshop/standard/cartproducts");
                break;
            /*case "recite":
                $this->render("page", "dir");
                break;*/
    }
    }
}