<?php

require('../settings/dbclass.php');

//extending means inheriting all the methods from connection
class Cart extends db_connection{

    //methods for adding cart(if user is logged in)
    function add_to_cart($p_id,$ip_add,$c_id, $qty){
        //retrun true or false
        return $this->db_query("insert into cart(p_id,ip_add,c_id,qty) values('$p_id','$ip_add','$c_id','$qty')");
    }

    //methods for adding cart(if user is not logged in)
    function add_to_cart_notLogin($p_id,$ip_add, $qty){
        //retrun true or false
        return $this->db_query("insert into cart(p_id,ip_add,qty) values('$p_id','$ip_add','$qty')");
    }


    function select_all_products_cart($ip_add){
        return $this->db_fetch_all("select p.product_id, p.product_cat, p.product_brand, p.product_price, p.product_title, 
        p.product_desc, p.product_image, p.product_keywords, c.p_id, c.ip_add, c.qty 
        from products AS p JOIN cart AS c ON p.product_id = c.p_id AND c.ip_add = '$ip_add'");
    }

    function select_all_products_carts($session){
        return $this->db_fetch_all("select p.product_id, p.product_cat, p.product_brand, p.product_price, p.product_title, 
        p.product_desc, p.product_image, p.product_keywords, c.p_id, c.ip_add, c.qty 
        from products AS p JOIN cart AS c ON p.product_id = c.p_id AND c.c_id = '$session'");
    }

    function remove_cart($prod_id,$session){
        return $this->db_query("delete from cart where p_id = '$prod_id' and  c_id ='$session'");
    }

 

    function select_one_cart($p_id, $ip_add){
        return $this->db_fetch_one("select p.product_id, p.product_cat, p.product_brand, p.product_price, p.product_title, 
        p.product_desc, p.product_image, p.product_keywords, c.p_id, c.ip_add, c.qty 
        from products AS p JOIN cart AS c ON p.product_id = c.p_id AND c.ip_add = '$ip_add' where p_id='$p_id' and ip_add='$ip_add'");
    }

    function getCartItemQty($ip_add,$session){
        return $this->db_count("select count(*) as count_item from cart where ip_add='$ip_add' or c_id='$session' ");
    }

    

    function getCartItemAmt($ip_add){
        return $this->db_fetch_all("select sum(product_price * qty) as amount from products as p join cart as c on p.product_id = c.p_id and c.ip_add = '$ip_add'");
    }

    function select_cart_notlogin($c_id, $p_id){
        return $this->db_fetch_all("select * from cart where c_id='$c_id' and p_id='$p_id'");
    }


    function updateCartQty_Login($qty, $prod_id, $session){
        return $this->db_query("update cart set qty='$qty' where c_id='$session' and p_id='$prod_id'");
    }

    //insert order
    function insert_order($c_id, $invoice, $date, $status){
        return $this->db_query("insert into orders (customer_id, invoice_no, order_date, order_status) values('$c_id', '$invoice', '$date', '$status')");
    }

    function insert_orderDetails($order_id, $product_id, $qty){
        return $this->db_query("insert into orderdetails(order_id, product_id, qty) values ('$order_id', '$product_id', '$qty')");
    }
     

    function recentOrder(){
        return $this->db_fetch_one("select MAX(order_id) as current from orders");
    }


    //--INSERT--//
    public function insert_payment_cls($amount, $c_id, $order_id, $cc, $pdate){
        return $this->db_query("insert into payment (amt, customer_id, order_id, currency, payment_date) values ('$amount', '$c_id', '$order_id', '$cc', '$pdate')");
    }
 // remove from cart
     public function remove_all_from_cart_cls($c_id)
     {
        
        $query= "delete from cart where c_id=$c_id";
        return $this-> db_query($query);
        
         
     }

     public function view_last_order_cls($order_id)
    {
         $query= "select products.product_title,orderdetails.qty, orderdetails.order_id from products inner join orderdetails on products.product_id=orderdetails.product_id where orderdetails.order_id=$order_id ";
        return $this-> db_fetch_all($query);

    }

    //update cart count
    public function cart_quantity_cls($c_id)
    {

        $query= "SELECT SUM(qty) FROM cart WHERE c_id=$c_id";
        
        return $this-> db_fetch_all($query);
    }
}