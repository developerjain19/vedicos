<?php
defined('BASEPATH') or exit('no direct access allowed');

class admin_Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        $data['title'] = "Home";
        $data['favicon'] = base_url() . 'assets/images/favicon.png';
        $data['category'] = $this->CommonModal->getNumRow('category');
        $data['products'] = $this->CommonModal->getNumRow('products');
        $data['user_registration'] = $this->CommonModal->getNumRow('user_registration');
        $data['contact_query'] = $this->CommonModal->getNumRow('contact_query');
        $data['new'] = $this->CommonModal->getNumRows('checkout', array('status' => '0'));
        $data['working'] = $this->CommonModal->getNumRows('checkout', array('status' => '1'));
        $data['cancelled'] = $this->CommonModal->getNumRows('checkout', array('status' => '2'));
        $data['completed'] = $this->CommonModal->getNumRows('checkout', array('status' => '3'));
        $data['normal'] = $this->CommonModal->getRowById('referal_per', 'id', '1');
        $data['premium'] = $this->CommonModal->getRowById('referal_per', 'id', '2');
        $data['line'] = $this->CommonModal->getRowById('quicklink', 'id', '1');
        $this->load->view('admin/dashboard', $data);
    }
    public function refupdate()
    {
        extract($this->input->post());
        $this->CommonModal->updateRowById('referal_per', 'id', $id, array('percen' => $percen));
        $this->session->set_userdata('msg', '<h6 class="text-success">Percentage Successfully updated</h6>');
        redirect(base_url('admin_Dashboard'));
    }
    public function minimum_valueupdate()
    {
        extract($this->input->post());
        $this->CommonModal->updateRowById('referal_per', 'id', $id, array('minimum_value' => $minimum_value));
        $this->session->set_userdata('msg', '<h6 class="text-success">Minimum Value  Successfully updated</h6>');
        redirect(base_url('admin_Dashboard'));
    }
    public function minimum_pointupdate()
    {
        extract($this->input->post());
        $this->CommonModal->updateRowById('referal_per', 'id', $id, array('minimum_point' => $minimum_point));
        $this->session->set_userdata('msg', '<h6 class="text-success">Minimum point Successfully updated</h6>');
        redirect(base_url('admin_Dashboard'));
    }

    public function lineupdate()
    {

        $this->CommonModal->updateRowById('quicklink', 'id', '1', $this->input->post());
        $this->session->set_userdata('msg', '<h6 class="text-success">Scroll line Successfully updated</h6>');
        redirect(base_url('admin_Dashboard'));
    }

    public function view_category()
    {
        $table = "category";
        $data['favicon'] = base_url() . 'assets/images/favicon.png';
        $data['title'] = "Product Main Category";
        $data['category'] = $this->CommonModal->getAllRows($table);
        $this->load->view('admin/view_category', $data);
    }
    public function videos()
    {
        $table = "videos";
        $data['favicon'] = base_url() . 'assets/images/favicon.png';
        $data['title'] = "Videos";
        $data['videos'] = $this->CommonModal->getAllRows($table);
        $data['video_cat'] = $this->CommonModal->getAllRows('video_cat');
        $this->load->view('admin/videos', $data);
    }
    public function add_videos()
    {
        $table = "videos";
        $data['favicon'] = base_url() . 'assets/images/favicon.png';
        $data['title'] = "Videos";
        // $data['videos'] = $this->CommonModal->getAllRows($table);
        $data['video_cat'] = $this->CommonModal->getAllRows('video_cat');
        $this->load->view('admin/add_videos', $data);
    }

    public function addvideos()
    {
        $data['favicon'] = base_url() . 'assets/images/favicon.png';

        $post = $this->input->post();
        $img = imageUpload('v_banner', 'uploads/videos/');
        $post['v_banner'] = $img;
        $this->Dashboard_model->insertdata('videos', $post);
        redirect(base_url('admin_Dashboard/videos'));
    }

    public function deletedata()
    {
        $vid = $this->input->post('pw_id');
        $this->CommonModal->deleteRowById('videos', array('pw_id' => $vid));
    }

    public function editvideo($videoid = true)
    {
        $data['favicon'] = base_url() . 'assets/images/favicon.png';
        $data['title'] = "Edit Video";
        $data['video_cat'] = $this->CommonModal->getAllRows('video_cat');
        $data['video'] = $this->CommonModal->getRowById('videos', 'vid', $videoid);
        $this->load->view('admin/editvideo', $data);
        //redirect('admin/edit_products', $data);
    }
    public function updatevideos($videoid)
    {
        $post = $this->input->post();

        $temp_image = $post['v_banner'];
        if ($_FILES['v_banner_img']['name'] != '') {

            $img = imageUpload('v_banner_img', 'uploads/videos/');
            $post['v_banner'] = $img;
            if ($temp_image != "") {
                unlink('uploads/videos/' . $temp_image);
            }
        }

        $this->CommonModal->updateRowById('videos', 'vid', $videoid, $post);
        // print_r($post);exit();
        redirect(base_url('admin_Dashboard/videos'));
    }
    public function ourteam()
    {
        $data['favicon'] = base_url() . 'assets/images/favicon.png';
        $data['title'] = "Our team";
        $data['ourteam'] = $this->CommonModal->getAllRows('ourteam');
        $config['upload_path'] = base_url('uploads/ourteam');

        if (count($_POST) > 0) {

            $post = $this->input->post();
            $no = rand();
            $folder = "./uploads/ourteam/";
            move_uploaded_file($_FILES["timage"]["tmp_name"], "$folder" . $no . $_FILES["timage"]["name"]);
            $file_name = $no . $_FILES["timage"]["name"];
            $post['timage'] =  $file_name;
            $savedata = $this->CommonModal->insertRowReturnId('ourteam', $post);

            if ($savedata) {
                $this->session->set_userdata('msg', '<h6 class="text-success">Team Member Is added</h6>');
            } else {
                $this->session->set_userdata('msg', '<h6 class="text-danger">We are facing technical error, please try again later </h6>');
            }
            redirect(base_url('admin_Dashboard/ourteam'));
        } else {
            $this->load->view('admin/ourteam', $data);
        }
    }

    public function banner()
    {

        $data['favicon'] = base_url() . 'assets/images/favicon.png';
        $data['title'] = "Home Banner";
        $data['banner'] = $this->CommonModal->getAllRows('banner');
        $config['upload_path'] = base_url('uploads/banner');

        if (count($_POST) > 0) {

            $post = $this->input->post();
            $no = rand();
            $folder = "./uploads/banner/";
            move_uploaded_file($_FILES["b_img"]["tmp_name"], "$folder" . $no . $_FILES["b_img"]["name"]);
            $file_name = $no . $_FILES["b_img"]["name"];
            $post['b_img'] =  $file_name;
            $savedata = $this->CommonModal->insertRowReturnId('banner', $post);

            if ($savedata) {
                $this->session->set_userdata('msg', 'Successfully submited');
            } else {
                $this->session->set_userdata('msg', 'We are facing technical error, please try again later  ');
            }
            redirect(base_url('admin_Dashboard/banner'));
        } else {
            $this->load->view('admin/banner', $data);
        }
    }

    public function insta()
    {

        $data['favicon'] = base_url() . 'assets/images/favicon.png';
        $data['title'] = "instagram";
        $data['banner'] = $this->CommonModal->getAllRows('instagram');
        $config['upload_path'] = base_url('uploads/instagram');

        if (count($_FILES) > 0) {

            $post = $this->input->post();
            $no = rand();
            $folder = "./uploads/instagram/";
            move_uploaded_file($_FILES["b_img"]["tmp_name"], "$folder" . $no . $_FILES["b_img"]["name"]);
            $file_name = $no . $_FILES["b_img"]["name"];
            $post['timage'] =  $file_name;
            $savedata = $this->CommonModal->insertRowReturnId('instagram', $post);

            if ($savedata) {
                $this->session->set_userdata('msg', 'Successfully submit.');
            } else {
                $this->session->set_userdata('msg', 'We are facing technical error, please try again later  ');
            }
            redirect(base_url('admin_Dashboard/insta'));
        } else {
            $this->load->view('admin/instagram', $data);
        }
    }
    

    public function disable()
    {
        $id = $this->uri->segment(3);
        $table = $this->uri->segment(4);
        $status = $this->uri->segment(5);
        $data['favicon'] = base_url() . 'assets/images/favicon.png';

        if ($table == 'category') {
            $this->CommonModal->updateRowById($table, 'category_id', $id, array('status' => $status));
            redirect(base_url('admin_Dashboard/view_category'));
        }
        if ($table == 'sub_category') {
            $this->CommonModal->updateRowById($table, 'sub_category_id', $id, array('status' => $status));
            redirect(base_url('admin_Dashboard/view_subcategory'));
        }
        if ($table == 'promocode') {
            $this->CommonModal->updateRowById($table, 'pid', $id, array('status' => $status));
            redirect(base_url('admin_Dashboard/promocode'));
        }
    }

    public function testimonials()
    {

        $data['favicon'] = base_url() . 'assets/images/favicon.png';
        $data['title'] = "Client Review  ";
        $data['testimonials'] = $this->CommonModal->getAllRows('testimonials');


        if (count($_POST) > 0) {

            $post = $this->input->post();
             $post['image']  = imageUpload('img1', 'uploads/testimonial/');
            $savedata = $this->CommonModal->insertRowReturnId('testimonials', $post);

            if ($savedata) {
                $this->session->set_userdata('msg', 'Successfully submited');
            } else {
                $this->session->set_userdata('msg', 'We are facing technical error, please try again later  ');
            }
            redirect(base_url('admin_Dashboard/testimonials'));
        } else {
            $this->load->view('admin/testimonials', $data);
        }
    }

    public function view_subcategory()
    {
        $table = "sub_category";
        $data['favicon'] = base_url() . 'assets/images/favicon.png';
        $data['title'] = "Product Sub Category";
        $data['category'] = $this->CommonModal->getAllRows($table);
        $this->load->view('admin/view_subcategory', $data);
    }

    public function add_category()
    {
        $data['title'] = "Add Product Main Category";
        $data['favicon'] = base_url() . 'assets/images/favicon.png';
        $this->load->view('admin/add_category', $data);
    }

    public function addcategory()
    {
        $data['favicon'] = base_url() . 'assets/images/favicon.png';
        if (isset($_POST['submit'])) {

            $cat_name = $this->input->post('cat_name');
            $file_name = imageUpload('image', 'uploads/category/');


            $table = "category";
            $data = array('cat_name' => $cat_name, 'image' => $file_name);

            $this->Dashboard_model->insertdata($table, $data);
            redirect(base_url('admin_Dashboard/view_category'));
        } else {
            redirect(base_url('admin_Dashboard/add_category'));
        }
    }

    public function add_subcategory()
    {
        $data['title'] = "Add Product Sub Category";
        $data['favicon'] = base_url() . 'assets/images/favicon.png';
        $data['category'] = $this->CommonModal->getAllRows('category');
        $this->load->view('admin/add_subcategory', $data);
    }

    public function addsubcategory()
    {
        $data['favicon'] = base_url() . 'assets/images/favicon.png';
        if (isset($_POST['submit'])) {

            $cat_id = $this->input->post('cat_id');
            $subcat_name = $this->input->post('subcat_name');
            $file_name = imageUpload('image', 'uploads/subcategory/');
            // $no = rand();
            // $folder = base_url() . "uploads/subcategory/";
            // echo $folder;
            // move_uploaded_file($_FILES["image"]["tmp_name"], "$folder" . $no . $_FILES["image"]["name"]);
            // $file_name = $no . $_FILES["image"]["name"];

            $table = "sub_category";
            $data = array('cat_id' => $cat_id, 'subcat_name' => $subcat_name, 'image' => $file_name);

            $this->Dashboard_model->insertdata($table, $data);
            redirect(base_url('admin_Dashboard/view_subcategory'));
        } else {
            redirect(base_url('admin_Dashboard/add_subcategory'));
        }
    }

    public function edit_category($category_id = true)
    {
        $data['favicon'] = base_url() . 'assets/images/favicon.png';
        $data['title'] = "Edit Products Main category";
        $data['categoryInfo'] = $this->Dashboard_model->get_category_Info($category_id);
        $this->load->view('admin/edit_category', $data);
        //redirect('admin/edit_products', $data);
    }

    public function editcategory()
    {
        $table = "category";
        $data['favicon'] = base_url() . 'assets/images/favicon.png';


        $id = $this->input->post('id');
        $cat_name = $this->input->post('cat_name');

        $no = rand();
        if ($_FILES["image"]["name"] == "") {
            $this->db->select("*");
            $this->db->where('category_id', $id);
            $query = $this->db->get($table);
            $result = $query->row();
            $file_name = $result->image;
        } else {
            $uploadfile = $_FILES["image"]["tmp_name"];
            $folder = "uploads/category/";
            move_uploaded_file($_FILES["image"]["tmp_name"], "$folder" . $no . $_FILES["image"]["name"]);
            $file_name = $no . $_FILES["image"]["name"];
        }


        $data = array('category_id' => $id, 'cat_name' => $cat_name, 'image' => $file_name);

        $update = $this->Dashboard_model->update_category_data($table, $data, $id);
        redirect(base_url() . 'admin_Dashboard/view_category');
    }
    public function edit_subcategory($category_id = true)
    {
        $data['favicon'] = base_url() . 'assets/images/favicon.png';
        $data['title'] = "Edit Products Sub category";
        $data['categoryInfo'] = $this->CommonModal->getRowById('sub_category', 'sub_category_id', $category_id);
        $data['category'] = $this->CommonModal->getAllRows('category');
        $this->load->view('admin/edit_subcategory', $data);
    }

    public function editsubcategory()
    {
        $table = "sub_category";
        $data['favicon'] = base_url() . 'assets/images/favicon.png';


        $id = $this->input->post('id');
        $cat_id = $this->input->post('cat_id');
        $subcat_name = $this->input->post('subcat_name');

        $no = rand();
        if ($_FILES["image"]["name"] == "") {
            $this->db->select("*");
            $this->db->where('sub_category_id', $id);
            $query = $this->db->get($table);
            $result = $query->row();
            $file_name = $result->image;
        } else {
            $uploadfile = $_FILES["image"]["tmp_name"];
            $folder = "uploads/subcategory/";
            move_uploaded_file($_FILES["image"]["tmp_name"], "$folder" . $no . $_FILES["image"]["name"]);
            $file_name = $no . $_FILES["image"]["name"];
        }


        $data = array('cat_id' => $cat_id, 'subcat_name' => $subcat_name, 'image' => $file_name);

        $update = $this->CommonModal->updateRowById($table, 'sub_category_id', $id, $data);
        redirect(base_url() . 'admin_Dashboard/view_subcategory');
    }

    public function deletecategory()
    {
        $id = $this->input->post('id');
        $table = "category";
        $delete = $this->CommonModal->deleteRowById($table, array('category_id' => $id));
        if ($delete) {
            echo '0';
        } else {
            echo '1';
        }
    }
    public function deletecontact()
    {
        $id = $this->input->post('id');
        $table = "contact_query";
        $delete = $this->CommonModal->deleteRowById($table, array('cid' => $id));
        if ($delete) {
            echo '0';
        } else {
            echo '1';
        }
    }
    public function deleteprivacypolicy()
    {
        $id = $this->input->post('id');
        $table = "privacypolicy";
        $delete = $this->CommonModal->deleteRowById($table, array('ppid' => $id));
        if ($delete) {
            echo '0';
        } else {
            echo '1';
        }
    }

    public function deleteourteam()
    {
        $id = $this->input->post('id');
        $table = "ourteam";
        $delete = $this->CommonModal->deleteRowById($table, array('tid' => $id));
        if ($delete) {
            echo '0';
        } else {
            echo '1';
        }
    }


    public function deletefaq()
    {
        $id = $this->input->post('id');
        $table = "faq";
        $delete = $this->CommonModal->deleteRowById($table, array('fid' => $id));
        if ($delete) {
            echo '0';
        } else {
            echo '1';
        }
    }
    public function deletebanner()
    {
        $id = $this->input->post('id');
        $table = "banner";
        $delete = $this->CommonModal->deleteRowById($table, array('bid' => $id));
        if ($delete) {
            echo '0';
        } else {
            echo '1';
        }
    }
    public function deleteinsta()
    {
        $id = $this->input->post('id');
        $table = "instagram";
        $delete = $this->CommonModal->deleteRowById($table, array('id' => $id));
        if ($delete) {
            echo '0';
        } else {
            echo '1';
        }
    }

    public function deleteblog()
    {
        $id = $this->input->post('id');
        $table = "blogs";
        $delete = $this->CommonModal->deleteRowById($table, array('bid' => $id));
        if ($delete) {
            echo '0';
        } else {
            echo '1';
        }
    }
    public function deletereview()
    {
        $id = $this->input->post('id');
        $table = "product_reveiw";
        $delete = $this->CommonModal->deleteRowById($table, array('id' => $id));
        if ($delete) {
            echo '0';
        } else {
            echo '1';
        }
    }

    public function deletetestimonials()
    {
        $id = $this->input->post('id');
        $table = "testimonials";
        $delete = $this->CommonModal->deleteRowById($table,  array('tid' => $id));
        if ($delete) {
            echo '0';
        } else {
            echo '1';
        }
    }
    public function deletesubcategory()
    {

        $id = $this->input->post('id');
        $table = "sub_category";
        $delete = $this->CommonModal->deleteRowById($table, array('sub_category_id' => $id));
        if ($delete) {
            echo '0';
        } else {
            echo '1';
        }
    }
    public function deletevideo()
    {
        $id = $this->input->post('id');
        $table = "videos";
        $delete = $this->CommonModal->deleteRowById($table, array('vid' => $id));
        if ($delete) {
            echo '0';
        } else {
            echo '1';
        }
    }

    public function deleteproducts()
    {
        $id = $this->input->post('id');
        $table = "products";
        $delete = $this->CommonModal->deleteRowById($table, array('product_id' => $id));
        if ($delete) {
            echo '0';
        } else {
            echo '1';
        }
    }
    public function deletepromocode()
    {
        $id = $this->input->post('id');
        $table = "promocode";
        $delete = $this->CommonModal->deleteRowById($table, array('pid' => $id));
        if ($delete) {
            echo '0';
        } else {
            echo '1';
        }
    }

    public function blockuser()
    {
        $id = $this->input->post('id');
        $table = "user_registration";
        $delete = $this->CommonModal->deleteRowById($table, array('reg_id' => $id));
        if ($delete) {
            echo '0';
        } else {
            echo '1';
        }
    }

    public function view_products()
    {
        $data['favicon'] = base_url() . 'assets/images/favicon.png';

        $data['title'] = "Products";
        $data['products'] = $this->CommonModal->getRowById('products', 'offer', '0');

        $this->load->view('admin/view_products', $data);
    }
    public function view_offerproducts()
    {
        $data['favicon'] = base_url() . 'assets/images/favicon.png';

        $data['title'] = "Products";
        $data['page'] = "offer";
        $data['products'] = $this->CommonModal->getRowById('products', 'offer', '1');

        $this->load->view('admin/view_products', $data);
    }

    public function get_subcategory()
    {
        $category_id = $_POST['category_id'];
        $data = $this->CommonModal->getRowById('sub_category', 'cat_id', $category_id);
        echo '<option>Select Product Sub Category</option>';
        foreach ($data as $da) {
            echo '<option value="' . $da['sub_category_id'] . '">' . $da['subcat_name'] . '</option>';
        }
    }
    public function add_products()
    {
        $data['favicon'] = base_url() . 'assets/images/favicon.png';
        $data['title'] = "Add Product";
        $table = "category";
        $data['category'] = $this->CommonModal->getAllRows($table);
        $this->load->view('admin/add_products', $data);
    }

    public function addproducts()
    {
        $data['favicon'] = base_url() . 'assets/images/favicon.png';

        $no = rand();
        $post = $this->input->post();
        $post['url'] = str_replace('https://youtu.be/','',str_replace('https://www.youtube.com/watch?v=','',$this->input->post('url')));
        $post['pro_name'] =  (preg_replace('/[^\p{L}\p{N}\s]/u', '', $post['pro_name']));

        $table = "products";
        $post['img1']  = imageUpload('img1', 'uploads/products/');
        $post['img2']  = imageUpload('img2', 'uploads/products/');

        $productId = $this->CommonModal->insertRowReturnId($table, $post);
        // print_r($productId);
        redirect(base_url() . 'admin_Dashboard/view_products');
    }

    public function edit_products($product_id = true)
    {
        $data['favicon'] = base_url() . 'assets/images/favicon.png';
        $data['title'] = "Edit Products";
        $data['productInfo'] = $this->CommonModal->getRowById('products', 'product_id', $product_id);
        $data['category'] = $this->CommonModal->getAllRows('category');
        $this->load->view('admin/edit_products', $data);
        //redirect('admin/edit_products', $data);
    }

    public function edit_productsimg($product_id = true)
    {
        $data['favicon'] = base_url() . 'assets/images/favicon.png';
        if (count($_POST) > 0) {
            $no = rand();
            $folder = "uploads/products/";
            move_uploaded_file($_FILES["img"]["tmp_name"], "$folder" . $no . $_FILES["img"]["name"]);
            $file_name1 = $no . $_FILES["img"]["name"];
            $this->CommonModal->insertRowReturnId('products_image', array('product_id' => $product_id, 'pi_name' => $file_name1));

            redirect(base_url() . 'admin_Dashboard/edit_productsimg/' . $product_id);
        } else {
            $data['productimg'] = $this->CommonModal->getRowById('products_image', 'product_id', $product_id);
            $this->load->view('admin/edit_productsimg', $data);
        }
    }
    public function editproductdetails()
    {
        $table = "products";
        $data['favicon'] = base_url() . 'assets/images/favicon.png';


        $id = $this->input->post('id');
        $pro_name = $this->input->post('pro_name');
        $offer = $this->input->post('offer');
        $offer_per = $this->input->post('offer_per');
        $description = $this->input->post('description');
        $category_id = $this->input->post('category_id');
        $subcategory_id = $this->input->post('subcategory_id');

        $price = $this->input->post('price');
        $old_price = $this->input->post('old_price');
        $weight = $this->input->post('weight');



        if ($_FILES["img1"]["name"] == "") {
            $this->db->select("*");
            $this->db->where('product_id', $id);
            $query = $this->db->get($table);
            $result = $query->row();
            $file_name1 = $result->img1;
        } else {
            $no = rand();
            // $uploadfile = $_FILES["img1"]["tmp_name"];
            $folder =   "uploads/products/";
            move_uploaded_file($_FILES["img1"]["tmp_name"], "$folder" . $no . $_FILES["img1"]["name"]);
            $file_name1 = $no . $_FILES["img1"]["name"];
        }


        if ($_FILES["img2"]["name"] == "") {
            $this->db->select("*");
            $this->db->where('product_id', $id);
            $query = $this->db->get($table);
            $result = $query->row();
            $file_name2 = $result->img2;
        } else {
            $no = rand();
            $uploadfile = $_FILES["img2"]["tmp_name"];
            $folder =  "uploads/products/";
            move_uploaded_file($_FILES["img2"]["tmp_name"], "$folder" . $no . $_FILES["img2"]["name"]);
            $file_name2 = $no . $_FILES["img2"]["name"];
        }


        $data = array('product_id' => $id, 'offer' => $offer, 'offer_per' => $offer_per, 'pro_name' => $pro_name, 'img1' => $file_name1, 'img2' => $file_name2, 'description' => $description, 'category_id' => $category_id, 'price' => $price, 'old_price' => $old_price, 'weight' => $weight, 'subcategory_id' => $subcategory_id);

        $update = $this->Dashboard_model->update_products_data($table, $data, $id);
        if ($offer == '1') {
            $this->session->set_userdata('msg', '<h6 class="text-success">Product updated successfully, and send to offer table , this product will be shown in next tab.</h6>');
        } else {
            $this->session->set_userdata('msg', '<h6 class="text-success">Product updated successfully</h6>');
        }

        redirect(base_url() . 'admin_Dashboard/view_products');
    }


    public function deleteproductimg($pi_id, $product_id)
    {
        $data['favicon'] = base_url() . 'assets/images/favicon.png';
        $this->CommonModal->deleteRowById('products_image', array('pi_id' => $pi_id));
        redirect('admin_Dashboard/edit_productsimg/' . $product_id);
    }
    public function contact_query()
    {
        $data['favicon'] = base_url() . 'assets/images/favicon.png';
        $data['title'] = "Contact Query";
        $table = "contact_query";
        $data['contact'] = $this->CommonModal->getAllRowsInOrder($table, 'cid', 'desc');
        $this->load->view('admin/contact', $data);
    }

    public function promocode()
    {
        $table = "promocode";
        $data['favicon'] = base_url() . 'assets/images/favicon.png';
        $data['title'] = "Promocode";
        $data['promocode'] = $this->CommonModal->getAllRows($table);
        $this->load->view('admin/view_promocode', $data);
    }
    public function add_promocode()
    {
        $data['favicon'] = base_url() . 'assets/images/favicon.png';
        $data['title'] = "Add Promocode";
        $this->load->view('admin/add_promocode', $data);
    }
    public function addpromocode()
    {
        $data = $this->input->post();
        $done = $this->CommonModal->insertRow('promocode', $data);
        if ($done) {
            redirect(base_url() . 'admin_Dashboard/promocode');
        } else {
            redirect(base_url() . 'admin_Dashboard/add_promocode');
        }
    }

    public function editpromocode($id)
    {
        $data['favicon'] = base_url() . 'assets/images/favicon.png';
        $data['title'] = "Edit Promocode";

        $id = $this->uri->segment(3);
        $data['promocode'] = $this->CommonModal->getRowById('promocode', 'pid', $id);
        if (count($_POST) > 0) {
            $data = $this->input->post();
            $done = $this->CommonModal->updateRowById('promocode', 'pid', $id, $data);

            if ($done) {
                redirect(base_url() . 'admin_Dashboard/promocode');
            } else {
                redirect(base_url() . 'admin_Dashboard/promocode');
            }
        } else {
            $this->load->view('admin/editpromocode', $data);
        }
    }

    public function statusupdate()
    {
        extract($this->input->post());
        $this->CommonModal->updateRowById('checkout', 'id', $id, array('status' => $status,'update_date'=>date("Y/m/d")));
        redirect(base_url('admin_Dashboard/orderPlaced'));
    }

    public function orderPlaced()
    {
        $table = "checkout";
        $data['favicon'] = base_url() . 'assets/images/favicon.png';
        $data['title'] = "Order placed";
        $id = $this->uri->segment(3);
        if ($id == '') {
            if (!empty($this->input->post('orderstatus'))) {
                $data['checkout'] = $this->CommonModal->getDataByIdInOrderLimit($table, array('status' => $this->input->post('orderstatus')), 'id', 'desc', '10000', '0');
            } else {
                $data['checkout'] = $this->CommonModal->getAllRowsInOrder($table, 'id', 'desc');
            }
        } else {
            $data['checkout'] = $this->CommonModal->getDataByIdInOrderLimit($table, array('user_id' => $id), 'id', 'desc', '10000', '0');
        }

        $this->load->view('admin/view_orderPlced', $data);
    }
    public function OrderPlacedDetails()
    {
        $id = $this->uri->segment(3);
        $data['favicon'] = base_url() . 'assets/images/favicon.png';
        $data['title'] = "Order placed Details";
        $data['checkout'] = $this->CommonModal->getRowById('checkout', 'id', $id);
        $data['checkoutProduct'] = $this->CommonModal->getRowById('checkout_product', 'checkoutid', $id);
        $this->load->view('admin/OrderPlacedDetails', $data);
    }
    public function shiporder()
    {
        $id = $this->uri->segment(3);
        $data['favicon'] = base_url() . 'assets/images/favicon.png';
        $data['title'] = "Order ship Details";
        $data['checkout'] = $this->CommonModal->getRowById('checkout', 'id', $id);
        // print_r($data['checkout'] );
        $data['checkoutProduct'] = $this->CommonModal->getRowById('checkout_product', 'checkoutid', $id);
        if (count($_POST) > 0) {
            $post = $this->input->post();
            $token = generateToken();
            $ship_product = array();
            if (!empty($data['checkoutProduct'])) {
                foreach ($data['checkoutProduct'] as $row) {
                    $prod = array(
                        "name" => $row['product_name'],
                        "sku" => $row['product_id'],
                        "units" => (int)$row['product_quantity'],
                        "selling_price" => (int)$row['total_pro_amt'],
                        "discount" => "",
                        "tax" => "",
                        "hsn" => ""
                    );
                    array_push($ship_product, $prod);
                }
            }
            $shiporder = createOrder($id, setDateOnly(), $data['checkout'][0]['name'], $data['checkout'][0]['address'], $data['checkout'][0]['city'], $data['checkout'][0]['pincode'], $data['checkout'][0]['state'], 'India', $data['checkout'][0]['email'], $data['checkout'][0]['number'], (($data['checkout'][0]['payment_type'] == '0') ? 'COD' : 'Prepaid'), $data['checkout'][0]['totalamount'], $post['length'], $post['breadth'], $post['height'], $post['weight'], ($ship_product), $token);
            // print_r($shiporder);
            $sh = json_decode($shiporder);
            if ($sh->shipment_id != '') {
                $this->CommonModal->updateRowById('checkout', 'id', $id, array('status' => '1'));
            }
            $awb = generateAwb_ship($sh->shipment_id, $data['checkout'][0]['courier_id'], $token);
            $awb_data = json_decode($awb);

            $post['order_id'] = $sh->order_id;
            $post['shipment_id'] = $sh->shipment_id;
            
            if ($awb_data->awb_assign_status == 1) {
                $post['awb_code'] = $awb_data->response->data->awb_code;
                $post['awb_assign_status'] = $awb_data->awb_assign_status;
                $post['awb_pickup'] = $awb_data->response->data->pickup_scheduled_date;
                $post['awb_response'] = $awb;
                $post['order_response'] = $shiporder;
                $this->CommonModal->updateRowById('checkout', 'id', $id, array('status' => '5'));
                $insert = $this->CommonModal->updateRowById('checkout', 'id', $id, $post);
                if ($insert) {
                    $this->session->set_userdata('msg', '<div class="alert alert-success">Order is ready  for shipment.Pickup is scheduled on ' . $awb_data->response->data->pickup_scheduled_date . ' by ' . $awb_data->response->data->courier_name . '</div>');
                    redirect(base_url('admin_Dashboard/shiporder_track/' . $id));
                } else {
                    $this->session->set_userdata('msg', '<div class="alert alert-danger">Order is now Initiated via shiprocket. Contact Shiprocket for any assistance. </div>');
                    redirect(base_url('admin_Dashboard/shiporder/' . $id));
                }
            } else {
                $insert = $this->CommonModal->updateRowById('checkout', 'id', $id, $post);
                if ($awb_data->message != '') {
                    $this->session->set_userdata('msg', '<div class="alert alert-danger">' . $awb_data->message . '</div>');
                } else {
                    
                    if ($awb_data->response->data->awb_assign_error != '') {
                        // echo $awb_data->response->data->awb_assign_error;
                     $this->session->set_userdata('msg', '<div class="alert alert-danger">' . $awb_data->response->data->awb_assign_error . '</div>');
                    }else{
                      $this->session->set_userdata('msg', '<div class="alert alert-danger">AWB Not generated , kindly refer SHiprocket panel for this query.</div>');   
                    }
                   
                }
                // exit();
                redirect(base_url('admin_Dashboard/shiporder/' . $id));
            }
        } else {
        }
        $this->load->view('admin/shiporder', $data);
    }
    public function returnorder()
    {
        $id = $this->uri->segment(3);
        $data['checkout'] = $this->CommonModal->getRowById('checkout', 'id', $id);
        $data['checkoutProduct'] = $this->CommonModal->getRowById('checkout_product', 'checkoutid', $id);

        $token = generateToken();
        $ship_product = array();
        if (!empty($data['checkoutProduct'])) {
            foreach ($data['checkoutProduct'] as $row) {
                $prod = array(
                    "name" => $row['product_name'],
                    "sku" => $row['product_id'],
                    "units" => (int)$row['product_quantity'],
                    "selling_price" => (int)$row['total_pro_amt'],
                    "discount" => "",
                    "tax" => "",
                    "hsn" => ""
                );
                array_push($ship_product, $prod);
            }
        }

        $returnorder = returnOrder('20221' . $id, setDateOnly(), '2796360', $data['checkout'][0]['name'], $data['checkout'][0]['address'], $data['checkout'][0]['city'], $data['checkout'][0]['state'], $data['checkout'][0]['pincode'], $data['checkout'][0]['email'], $data['checkout'][0]['number'],  $data['checkout'][0]['totalamount'],  $data['checkout'][0]['length'], $data['checkout'][0]['breadth'], $data['checkout'][0]['height'], $data['checkout'][0]['weight'], $ship_product, $token);


        $sh = json_decode($returnorder);
        // print_r($sh);
        if ($sh->shipment_id != '') {
            $this->CommonModal->updateRowById('checkout', 'id', $id, array('status' => '9'));
        }
        $post['return_order_id'] = $sh->order_id;
        $post['return_shipment_id'] = $sh->shipment_id;
        $insert = $this->CommonModal->updateRowById('checkout', 'id', $id, $post);
        $arrs = [];
        $token = generateToken();
        $shipping = shipping_charges($data['checkout'][0]['pincode'], '123401', $data['checkout'][0]['weight'], '0', $token, '1');
        $arr = json_decode($shipping);

        echo '<pre>';
        // print_r($arr);
        // exit();
        if ($arr->status_code != '') {
            $arrs = [];
        } else {
            foreach ($arr->data->available_courier_companies as $company) {
                if ($company->courier_company_id == $arr->data->recommended_courier_company_id) {
                    $arrs = array('rate' => $company->rate, 'courier_id' => $company->courier_company_id);
                }
            }
        }

        $awb = generateAwb($sh->shipment_id, (($arrs['courier_id'] != '') ? $arrs['courier_id'] : $data['checkout'][0]['courier_id']), $token, 1);
        $awb_data = json_decode($awb);
        print_r($awb_data);

        if ($awb_data->awb_assign_status == 1) {
            $post['return_awb_code'] = $awb_data->response->data->awb_code;
            $post['return_awb_assign_status'] = $awb_data->awb_assign_status;
            $post['return_awb_pickup'] = $awb_data->response->data->pickup_scheduled_date;
            $post['return_awb_response'] = $awb;
            $post['return_order_response'] = $returnorder;
            print_r($post);
            $insert = $this->CommonModal->updateRowById('checkout', 'id', $id, $post);
        } else {
            if ($awb_data->response->data != '') {
                $this->session->set_userdata('msg', '<div class="alert alert-danger">' . $awb_data->response->data->awb_assign_error . '</div>');
            } else {
                $this->session->set_userdata('msg', '<div class="alert alert-danger">AWB Not generated , kindly refer SHiprocket panel for this query.</div>');
            }
        }
        // exit();
        redirect(base_url('admin_Dashboard/shiporder_track/' . $id));
    }

    public function shiporder_track()
    {
        $id = $this->uri->segment(3);
        $data['favicon'] = base_url() . 'assets/images/favicon.png';
        $data['title'] = "Order ship Details";
        $data['checkout'] = $this->CommonModal->getRowById('checkout', 'id', $id);
        $data['checkoutProduct'] = $this->CommonModal->getRowById('checkout_product', 'checkoutid', $id);

        $this->load->view('admin/shiporder_track', $data);
    }
    public function runapi()
    {
        // $token = generateToken();
    }
    public function registeredUser()
    {
        $table = "user_registration";
        $data['tag'] = 'unblocked';
        $data['favicon'] = base_url() . 'assets/images/favicon.png';
        $data['title'] = "Normal User";
        $data['page'] = "registeredUser";
        $data['registeredUser'] = $this->CommonModal->getRowByMoreId($table, array('premium' => '0', 'user_status' => '0'));
        $this->load->view('admin/registeredUser', $data);
    }
    public function registeredPremiumUser()
    {
        $table = "user_registration";
        $data['tag'] = 'unblocked';
        $data['favicon'] = base_url() . 'assets/images/favicon.png';
        $data['title'] = "  Premium User";
        $data['page'] = "registeredPremiumUser";
        $data['registeredUser'] = $this->CommonModal->getRowByMoreId($table, array('premium' => '1', 'user_status' => '0'));
        $this->load->view('admin/registeredUser', $data);
    }
    public function viewuserdetails()
    {
        $id = $this->uri->segment(3);
        $data['favicon'] = base_url() . 'assets/images/favicon.png';
        $data['title'] = "View User details";
        $data['registeredUser'] = $this->CommonModal->getRowById('user_registration', 'reg_id', $id);

        if (count($_POST) > 0) {
            $post = $this->input->post();
            $this->CommonModal->updateRowById('user_registration', 'ppid', $id, $post);
            redirect(base_url('admin_Dashboard/registeredUser'));
        } else {
            $this->load->view('admin/viewuserdetails', $data);
        }
    }
    public function blockedUser()
    {
        $table = "user_registration";
        $data['tag'] = 'blocked';
        $data['favicon'] = base_url() . 'assets/images/favicon.png';
        $data['title'] = " Pending for approval User";
        $data['page'] = "blockedUser";
        $data['registeredUser'] = $this->CommonModal->getRowByMoreId($table, array('user_status' => '1'));
        $this->load->view('admin/registeredUser', $data);
    }
    public function updateUsertype()
    {
        $table = "user_registration";

        $id = $this->uri->segment(3);
        $type = $this->uri->segment(4);
        $yes = $this->CommonModal->updateRowById($table, 'reg_id', $id, array('premium' => $type));
        if ($type == '0') {
            redirect(base_url('admin_Dashboard/registeredPremiumUser'));
        } else {

            redirect(base_url('admin_Dashboard/registeredUser'));
        }
    }
    public function approveuser()
    {
        $table = "user_registration";

        $id = $this->uri->segment(3);

        $yes = $this->CommonModal->updateRowById($table, 'reg_id', $id, array('user_status' => '0'));

        redirect(base_url('admin_Dashboard/registeredPremiumUser'));
    }
    public function referalInfo()
    {
        $table = "user_registration";
        $id = $this->uri->segment(3);
        $rid = $this->uri->segment(4);
        $data['favicon'] = base_url() . 'assets/images/favicon.png';
        $data['title'] = " Referal Details - " . $rid;
        $data['registeredUser'] = $this->CommonModal->getRowById($table, 'reg_id', $id);
        $data['registeredrefUser'] = $this->CommonModal->getRowById($table, 'referal_id', $rid);
        $data['referaldata'] = $this->CommonModal->getRowById('referal_amt', 'referal_id', $rid);
        $data['orderDetails'] = $this->CommonModal->getRowById('checkout', 'user_id',  $id); 
        $data['pointDetails'] = $this->CommonModal->getRowById('affliate_purchase', 'user_id',  $id);
        $this->load->view('admin/referalInfo', $data);
    }

    public function privacyPolicy()
    {
        $table = "privacypolicy";
        $data['favicon'] = base_url() . 'assets/images/favicon.png';
        $data['title'] = "Privacy Policy";
        $data['privacypolicy'] = $this->CommonModal->getAllRows($table);
        $this->load->view('admin/privacyPolicy', $data);
    }
    public function editprivacypolicy()
    {
        $id = $this->uri->segment(3);
        $data['favicon'] = base_url() . 'assets/images/favicon.png';
        $data['title'] = "Edit Privacy Policy";
        $data['privacypolicy'] = $this->CommonModal->getRowById('privacypolicy', 'ppid', $id);

        if (count($_POST) > 0) {
            $post = $this->input->post();
            $this->CommonModal->updateRowById('privacypolicy', 'ppid', $id, $post);
            redirect(base_url('admin_Dashboard/privacyPolicy'));
        } else {
            $this->load->view('admin/editprivacypolicy', $data);
        }
    }
    public function editfaq()
    {
        $id = $this->uri->segment(3);
        $data['favicon'] = base_url() . 'assets/images/favicon.png';
        $data['title'] = "Edit FAQ";
        $data['faq'] = $this->CommonModal->getRowById('faq', 'fid', $id);

        if (count($_POST) > 0) {
            $post = $this->input->post();
            $this->CommonModal->updateRowById('faq', 'fid', $id, $post);
            redirect(base_url('admin_Dashboard/faq'));
        } else {
            $this->load->view('admin/editfaq', $data);
        }
    }
    public function add_privacyPolicy()
    {
        $data['favicon'] = base_url() . 'assets/images/favicon.png';
        $data['title'] = "Add Privacy Policy";
        $this->load->view('admin/add_privacyPolicy', $data);
    }
    public function addprivacyPolicy()
    {
        $data = $this->input->post();
        $done = $this->CommonModal->insertRow('privacypolicy', $data);
        if ($done) {
            redirect(base_url() . 'admin_Dashboard/privacyPolicy');
        } else {
            redirect(base_url() . 'admin_Dashboard/add_privacyPolicy');
        }
    }
    public function faq()
    {
        $table = "faq";
        $data['favicon'] = base_url() . 'assets/images/favicon.png';
        $data['title'] = "FAQ";
        $data['faq'] = $this->CommonModal->getAllRows($table);
        $this->load->view('admin/faq', $data);
    }
    public function contactdetails()
    {
        $table = "contactdetails";
        $data['favicon'] = base_url() . 'assets/images/favicon.png';
        $data['title'] = "Contact Details";
        $data['contactdetails'] = $this->CommonModal->getRowById($table, 'cid', '1');
        $this->load->view('admin/contactdetails', $data);
    }


    public function add_faq()
    {
        $data['favicon'] = base_url() . 'assets/images/favicon.png';
        $data['title'] = "Add FAQ";
        $this->load->view('admin/add_faq', $data);
    }
    public function addfaq()
    {
        $data = $this->input->post();
        $done = $this->CommonModal->insertRow('faq', $data);
        if ($done) {
            redirect(base_url() . 'admin_Dashboard/faq');
        } else {
            redirect(base_url() . 'admin_Dashboard/add_faq');
        }
    }
    public function editcontactdetils()
    {
        $table = "contactdetails";
        $data['favicon'] = base_url() . 'assets/images/favicon.png';
        $datav = $this->input->post();
        $update = $this->CommonModal->updateRowByMoreId($table, array('cid' => '1'), $datav);
        redirect(base_url() . 'admin_Dashboard/contactdetails');
    }
    public function productOnSale()
    {
        $sale = $this->input->post('sale');
        $pid = $this->input->post('pid');
        $this->CommonModal->updateRowById('products', 'product_id', $pid, array('sale' => $sale));
    }
    public function productoutofstock()
    {
        $outofstock = $this->input->post('outofstock');
        $pid = $this->input->post('pid');
        $this->CommonModal->updateRowById('products', 'product_id', $pid, array('outofstock' => $outofstock));
    }

    public function featuredProduct()
    {
        $featured = $this->input->post('featured');
        $pid = $this->input->post('pid');
        $this->CommonModal->updateRowById('products', 'product_id', $pid, array('featured' => $featured));
    }
    public function bloglist()
    {
        $table = "blogs";
        $data['favicon'] = base_url() . 'assets/images/favicon.png';
        $data['title'] = "Blogs";
        $data['blogs'] = $this->CommonModal->getAllRows($table);
        $this->load->view('admin/blogs', $data);
    }
    public function addblogs()
    {
        $data['favicon'] = base_url() . 'assets/images/favicon.png';
        $data['title'] = "Add Blogs";
        $this->load->view('admin/addblogs', $data);
    }
    public function addblog()
    {
        $data = $this->input->post();
        $no = rand();
        $folder = "uploads/blog/";
        move_uploaded_file($_FILES["image"]["tmp_name"], "$folder" . $no . $_FILES["image"]["name"]);
        $data['b_image']  = $no . $_FILES["image"]["name"];
        $done = $this->CommonModal->insertRow('blogs', $data);
        if ($done) {
            redirect(base_url() . 'admin_Dashboard/bloglist');
        } else {
            redirect(base_url() . 'admin_Dashboard/addblogs');
        }
    }
    public function edit_blog($blog_id = true)
    {
        $data['favicon'] = base_url() . 'assets/images/favicon.png';
        $data['title'] = "Edit blogs";
        $data['blogs'] = $this->CommonModal->getRowById('blogs', 'bid', $blog_id);
        $this->load->view('admin/editblog', $data);
        //redirect('admin/edit_products', $data);
    }
    public function editblogdetails($blog_id = true)
    {
        $data['favicon'] = base_url() . 'assets/images/favicon.png';
        $datav = $this->input->post();
        $no = rand();
        if ($_FILES["image"]["name"] == "") {
            $this->db->select("*");
            $this->db->where('bid', $blog_id);
            $query = $this->db->get('blogs');
            $result = $query->row();
            $datav['b_image'] = $result->b_image;
        } else {
            $uploadfile = $_FILES["image"]["tmp_name"];
            $folder = "uploads/blog/";
            move_uploaded_file($_FILES["image"]["tmp_name"], "$folder" . $no . $_FILES["image"]["name"]);
            $datav['b_image']  = $no . $_FILES["image"]["name"];
        }

        $update = $this->CommonModal->updateRowByMoreId('blogs', array('bid' => $blog_id), $datav);
        redirect(base_url() . 'admin_Dashboard/bloglist');
    }
    public function withdrawrequest()
    {
        $table = "affiliate_withdraw";
        $data['favicon'] = base_url() . 'assets/images/favicon.png';
        $data['title'] = "Affiliate withdraw";
        $data['affiliate_withdraw'] = $this->CommonModal->getAllRows($table);
        $this->load->view('admin/withdrawrequest', $data);
    }
    public function declinerequest()
    {
        $rid = $this->input->post('rid');
        $this->CommonModal->updateRowById('affiliate_withdraw', 'id', $rid, array('request_status' => '2'));
    }
    public function acceptrequest()
    {
        $id = $this->input->post('id');
        $doc = imageUpload('image', 'uploads/withdrawrequest');
        $this->CommonModal->updateRowById('affiliate_withdraw', 'id', $id, array('request_status' => '1', 'payment' => $doc));
        redirect(base_url() . 'admin_Dashboard/withdrawrequest');
    }
    public function productreview()
    {
        $table = "product_reveiw";
        $data['favicon'] = base_url() . 'assets/images/favicon.png';
        $data['title'] = "Prodcut reveiw";
        $data['product_reveiw'] = $this->CommonModal->getAllRows($table);
        $this->load->view('admin/product_reveiw', $data);
    }
    public function addOnData()
    {

        $id = $this->input->get('id');
        if (isset($id)) {
            $data['data'] = $this->CommonModal->getSingleRowById('tbl_add_on_data', "id = '" . ($id) . "'");
            $data['title'] = '' . $data['data']['title'];
            $this->load->view('admin/add_on_data_view', $data);
        } else {
            $data['title'] = 'View Data';
            $data['all_data'] = $this->CommonModal->getAllRows('tbl_add_on_data');
            $this->load->view('admin/add_on_data', $data);
        }
    }

    public function addOnDataAdd()
    {
        extract($this->input->post());
        $id = $this->input->get('id');
        $decrypt_id = ($this->input->get('id'));
        $data = $this->CommonModal->getSingleRowById('tbl_add_on_data', "id = '$decrypt_id'");
        $data['title_data'] = set_value('title') == false ? @$data['title'] : set_value('title');
        $data['description'] = set_value('description') == false ? @$data['description'] : set_value('description');
        if (isset($id)) {
            $data['title'] = 'Edit ' . $data['title'];
        } else {
            $data['title'] = 'Add Category';
        }

        if (count($_POST) > 0) {
            $post['title'] = trim($title);
            $post['description'] = trim($description);
            if (isset($id)) {
                $post['update_date'] = setDateTime();
                $update = $this->CommonModal->updateRowByIdWithOutXss('tbl_add_on_data', "id = '$decrypt_id'", $post);
                if ($update) {
                    flashData('errors', 'Data Update Successfully');
                } else {
                    flashData('errors', 'Data Not Add');
                }
            }
            redirect('admin_Dashboard/addOnData');
        }
        $this->load->view('admin/add_on_data_add', $data);
    }
    public function cancelorder($order_id, $awbs)
    {

        $token = generateToken();
        $shipment = cancelshipment($awbs, $token);
        $cancel = cancelorder($order_id, $token);
        $ship = json_decode($shipment);
        $can = json_decode($cancel);

        $this->session->set_userdata('msg', '<h6 class="text-danger">' . $ship->message . '</h6>');

        $checkout = $this->CommonModal->getRowById('checkout', 'order_id', $order_id);
        print_r($checkout[0]['id']);
        // exit();
        $this->CommonModal->updateRowById('checkout', 'id', $checkout[0]['id'], array('status' => '2'));

        redirect(base_url('admin_Dashboard/orderPlaced'));
    }
    // public function returnorder($order_id)
    // {
    //     echo $order_id;
    //     $token = generateToken();
    //     $shiporder = returnorder($id, setDateOnly(), $data['checkout'][0]['name'], $data['checkout'][0]['address'], $data['checkout'][0]['city'], $data['checkout'][0]['pincode'], $data['checkout'][0]['state'], 'India', $data['checkout'][0]['email'], $data['checkout'][0]['number'], (($data['checkout'][0]['payment_type'] == '0') ? 'COD' : 'Prepaid'), $data['checkout'][0]['totalamount'], $post['length'], $post['breadth'], $post['height'], $post['weight'], ($ship_product), $token);

    //     $checkout = $this->CommonModal->getRowById('checkout', 'order_id', $order_id);
    //     echo '<pre>';
    //     print_r($checkout);
    //     exit();
    //     $this->CommonModal->updateRowById('checkouts', 'id', $checkout[0]['id'], array('status' => '2')); 
    //     redirect(base_url('admin_Dashboard/orderPlaced'));
    // }

}
