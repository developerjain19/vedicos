<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ajax extends CI_Controller
{

    public function index()
    {
    }
    public function addToCart()
    {
        $product_id = $this->input->post('pid');
        $product = $this->CommonModal->getRowById('products', 'product_id', $product_id);
        $data = array(
            'id'      => $product[0]['product_id'],
            'qty'     => 1,
            'price'   => $product[0]['price'],
            'name'    => $product[0]['pro_name'],
            'image'    => $product[0]['img1'],
            'weight'    => $product[0]['weight']
        );

        $this->cart->insert($data);
        // print_r($this->cart);
        // redirect(base_url(('index/viewCart')));
    }
    public function getShipping()
    {
        $pincode = $this->input->post('pincode');
        $weight = $this->input->post('weight');
        $arrs=[];
        if ($pincode == '') {
        } else {
            $token = generateToken();
            $shipping = shipping_charges_checkout('123401', $pincode, $weight, '0', $token);
            $arr = json_decode($shipping);
            if($arr->status_code != ''){

            }else{
                foreach ($arr->data->available_courier_companies as $company) {
                    if ($company->courier_company_id == $arr->data->recommended_courier_company_id) {
                        $arrs = array('rate' => $company->rate, 'courier_id' => $company->courier_company_id);
                    }
                }
            }
            
        }
        echo json_encode($arrs);
    }
    public function orderStatusUpdate()
    {
        $post = $_POST;
        $this->CommonModal->updateRowById('checkout', 'id', $post['order_id'], array('status' => $post['order_status']));
        // ,'update_date'=>date("Y/m/d")
    }
}
