<?php
//connect to database class
include("../settings/db_class.php");

class product_class extends db_connection
{
    // add brand
    public function add_brand_cls($bname)
    {
        $query = "INSERT INTO brands (brand_name) values('$bname')";
        return $this->db_query($query);
    }

    // add category
    public function add_product_category_cls($cname)
    {
        $query = "INSERT INTO categories (cat_name) values('$cname')";
        return $this->db_query($query);
    }

    // add product
    public function add_product_cls($product_cat, $product_brand, $product_title, $product_price, $product_desc, $product_image, $product_keywords)
    {
        $query = "INSERT INTO products (product_cat,product_brand,product_title,product_price,product_desc,product_image,product_keywords)
          values('$product_cat','$product_brand','$product_title','$product_price','$product_desc','$product_image','$product_keywords')";

        return $this->db_query($query);
    }

    //edit brand
    public function edit_brand_cls($brandID, $brandName)
    {
        $query = "update brands set brand_name='$brandName' where brand_id=$brandID";
        return $this->db_query($query);
    }
    //edit category
    public function edit_category_cls($categoryID, $categoryName)
    {
        $query = "update categories set cat_name='$categoryName' where cat_id=$categoryID";
        return $this->db_query($query);
    }

    //edit product
    public function edit_product_cls($productID, $product_cat, $product_brand, $product_title, $product_price, $product_desc, $product_keywords)
    {
        $query = "UPDATE products set `product_cat`='$product_cat',`product_brand`='$product_brand',`product_title`='$product_title',
        `product_price`='$product_price',`product_desc`='$product_desc',`product_keywords`='$product_keywords' 
        where product_id=$productID";
        return $this->db_query($query);
    }

    public function edit_productImg_cls($productID, $product_cat, $product_brand, $product_title, $product_price, $product_desc, $product_image, $product_keywords)
    {
        $query = "UPDATE products set `product_cat`='$product_cat',`product_brand`='$product_brand',`product_title`='$product_title',
        `product_price`='$product_price',`product_desc`='$product_desc',`product_image`='$product_image',`product_keywords`='$product_keywords' 
        where product_id=$productID";
        return $this->db_query($query);
    }


    //delete brand
    public function delete_brand_cls($brandID)
    {
        $query = "delete from brands where brand_id=$brandID";
        return $this->db_query($query);
    }

    //delete category
    public function delete_category_cls($categoryID)
    {
        $query = "delete from categories where cat_id=$categoryID";
        return $this->db_query($query);
    }

    //delete product
    public function delete_product_cls($productID)
    {
        $query = "delete from products where product_id=$productID";
        return $this->db_query($query);
    }

    // select all brands
    public function select_all_brand_cls()
    {
        $query = "SELECT * FROM brands ";
        return $this->db_fetch_all($query);
    }

    //select one brand
    public function select_one_brand_cls($brandID)
    {
        $sql = "SELECT `brand_name` FROM `brands` WHERE brand_id=$brandID";
        return $this->db_fetch_one($sql);
    }

    // select all categories
    public function select_all_category_cls()
    {
        $query = "SELECT * FROM categories";
        return $this->db_fetch_all($query);
    }

    //select one category
    public function select_one_category_cls($categoryID)
    {
        $sql = "SELECT `cat_name` FROM `categories` WHERE cat_id=$categoryID";
        return $this->db_fetch_one($sql);
    }

    // select all products
    public function select_all_product_cls()
    {
        $query = "SELECT * FROM products ";
        return $this->db_fetch_all($query);
    }

    //select one product
    public function select_one_product_cls($productID)
    {
        $sql = "SELECT * FROM `products` WHERE product_id=$productID";
        return $this->db_fetch_one($sql);
    }

    //search product
    public function search_product_cls($find)
    {
        $sql = "select * from products where product_title like '%$find%'";
        return $this->db_fetch_all($sql);
    }

    // select all products
    public function count_product_cls()
    {
        $query = "SELECT count(*) FROM products; ";
        return $this->db_query($query);
    }
    //update cart count
    public function cart_quantity_cls($c_id)
    {

        $query = "SELECT SUM(qty) FROM cart WHERE c_id=$c_id";

        return $this->db_fetch_all($query);
    }
}
