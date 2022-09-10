<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Index extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        $data['category'] = $this->CommonModal->getAllRowsInOrder('category', 'category_id', 'desc');
        $data['rate'] = $this->CommonModal->getRowById('quicklink', 'id', '1');

        $data['contactdetails'] = $this->CommonModal->getRowById('contactdetails', 'cid', '1');
        $data['logo'] = 'assets/images/logo.png';
        $data['testimonials'] = $this->CommonModal->getAllRowsInOrder('testimonials', 'tid', 'desc');
        $data['line'] = $this->CommonModal->getRowById('quicklink', 'id', '1');
        $data['team'] = $this->CommonModal->getAllRows('ourteam');
        $data['instagram'] = $this->CommonModal->getAllRows('instagram');
        $data['banner'] = $this->CommonModal->getAllRowsInOrder('banner', 'bid', 'desc');
        $data['featured'] = $this->CommonModal->getRowByIdWithLimit('products', 'featured', '1', 4);
        $data['videos'] = $this->CommonModal->getRowByIdWithLimit('videos', 'v_category', 1, 3);
        $data['videos_p'] = $this->CommonModal->getRowByIdWithLimit('videos', 'v_category', 2, 3);
        $data['products'] = $this->CommonModal->getAllRowsInOrderWithLimit('products', 4, 'product_id', 'desc');
        $data['promocode'] = $this->CommonModal->getRowById('promocode', 'status', '0');

        $data['title'] = 'Vedicos';
        $this->load->view('home', $data);
    }
    public function team_details($id)
    {
        $data['category'] = $this->CommonModal->getAllRowsInOrder('category', 'category_id', 'desc');
        $data['rate'] = $this->CommonModal->getRowById('quicklink', 'id', '1');

        $data['contactdetails'] = $this->CommonModal->getRowById('contactdetails', 'cid', '1');
        $data['logo'] = 'assets/images/logo.png';

        $data['team'] = $this->CommonModal->getRowById('ourteam', 'tid', $id);


        $data['title'] = 'Vedicos';
        $this->load->view('team_details', $data);
    }

    public function any_query()
    {
        $data['logo'] = 'assets/images/logo.png';
        $data['category'] = $this->CommonModal->getAllRowsInOrder('category', 'category_id', 'desc');
        $data['rate'] = $this->CommonModal->getRowById('quicklink', 'id', '1');

        $data['contactdetails'] = $this->CommonModal->getRowById('contactdetails', 'cid', '1');
        $data['featured'] = $this->CommonModal->getRowByIdWithLimit('products', 'featured', 1, 1);

        if (count($_POST) > 0) {
            $post = $this->input->post();
            $ins = $this->CommonModal->insertRow('contact_query', $post);
            if ($ins) {
                $this->session->set_userdata('msg', 'Your query is successfully submit. We will contact you as soon as possible.');
            } else {
                $this->session->set_userdata('msg', 'We are facing technical error ,please try again later or get in touch with Email ID provided in contact section.');
            }
        } else {
        }
        $data['title'] = 'Vedicos | Any Query';
        $data['logo'] = 'assets/images/logo.png';
        $this->load->view('any_query', $data);
    }
    public function login()
    {
        if (count($_POST) > 0) {
            extract($this->input->post());
            $table = "user_registration";
            $login_data = $this->CommonModal->getRowByMoreId($table, array('contact' => $contact));
            // print_r($login_data); 
            if (!empty($login_data)) {
                if ($this->session->userdata('otp') == $otp) {
                    if ($login_data[0]['user_status'] == '1') {
                        $this->session->set_userdata('loginmsg', 'Your account is pending for approval. Please contact us for more details');
                        echo '4';
                    } else {
                        $this->session->set_userdata(array('login_user_id' => $login_data[0]['reg_id'], 'login_user_type' => $login_data[0]['premium'], 'login_user_name' => $login_data[0]['fullname'], 'login_user_emailid' => $login_data[0]['emailid'], 'login_user_contact' => $login_data[0]['contact'], 'referal_id' => $login_data[0]['referal_id'], 'my_ref_code' => 'VED' . $login_data[0]['my_ref_code'] . $login_data[0]['reg_id']));

                        $this->session->unset_userdata('otp');
                        if (count($this->cart->contents()) > 0) {
                            echo '5';
                        } else {
                            echo '0';
                        }
                    }
                } else {
                    $this->session->set_userdata('loginmsg', 'Invalid OTP');
                    echo '1';
                }
            } else {
                echo '2';
            }
        } else {
            // if ($this->session->has_userdata('login_user_id')) {
            //     redirect(base_url('index/profile'));
            // }
            echo '3';
        }
    }
    public function sendotponlogin()
    {
        $contact = $this->input->post('logincontact');
        $otp =   rand(11111, 9999999);

        $data = $this->CommonModal->getNumRows('user_registration', array('contact' => $contact));

        if ($data == '') {
            echo '2';
        } elseif ($data == 1) {
            $this->session->set_userdata('otp', $otp);
            sendOTP($contact, $otp . ' is your One Time Password (OTP) to verify your phone number with Edusol App. Thanks EDUSOL (Ekaum Enterprises)');
            $debug = true;
            $msg = "Your otp is " . $otp . " to verify your Vedicos account. Pl don't share this to anyone else. Thanks Team Vedicos";
            SMSSend($contact, $msg, '1707165224789163217', $debug);


            echo '1';
        } else {
            echo '0';
        }

        // print_r($formdata);

    }
    public function resendotp()
    {
        $contact = $this->input->post('vid');
        $otp =   rand(11111, 9999999);


        $this->session->set_userdata('otp', $otp);
        sendOTP($contact, $otp . ' is your One Time Password (OTP) to verify your phone number with Edusol App. Thanks EDUSOL (Ekaum Enterprises)');
        echo '1';


        // print_r($formdata);

    }
    public function loginresendotp()
    {
        $contact = $this->input->post('vid');
        $otp =   rand(11111, 9999999);


        $this->session->set_userdata('otp', $otp);
        sendOTP($contact, $otp . ' is your One Time Password (OTP) to verify your phone number with Edusol App. Thanks EDUSOL (Ekaum Enterprises)');
        echo '1';


        print_r($otp);
    }


    public function register()
    {
        if ($this->session->has_userdata('login_user_id')) {
            redirect(base_url('index/profile'));
        }
        $data['category'] = $this->CommonModal->getAllRowsInOrder('category', 'category_id', 'desc');
        $data['rate'] = $this->CommonModal->getRowById('quicklink', 'id', '1');
        $data['contactdetails'] = $this->CommonModal->getRowById('contactdetails', 'cid', '1');
        // $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

        if (count($_POST) > 0) {
            $formdata = $this->input->post();
            $table = "user_registration";
            if (strlen($formdata['contact']) == 10) {
                $regdata = $this->CommonModal->getRowById('user_registration', 'contact', $formdata['contact']);

                if (empty($regdata)) {
                    $regdataemail = $this->CommonModal->getRowById('user_registration', 'emailid', $formdata['emailid']);
                    if (empty($regdataemail)) {
                        $formdata['my_ref_code'] = $this->input->post('fullname');
                        $formdata['otp'] =   rand(11111, 9999999);
                        $lig = $this->CommonModal->insertRowReturnId($table, $formdata);
                        sendOTP($formdata['contact'], $formdata['otp'] . ' is your One Time Password (OTP) to verify your phone number with Edusol App. Thanks EDUSOL (Ekaum Enterprises)');
                        // print_r($formdata);
                        $this->session->set_userdata(array('otp' => $formdata['otp'], 'login_user_name' => $formdata['fullname'],  'login_user_contact' => $formdata['contact'],  'login_user_otp_id' => $lig));
                        redirect(base_url('index/phoneverification'));
                    } elseif (count($regdataemail) == 1) {
                        $this->session->set_userdata('regmsg', 'Mail ID Already registered');
                        redirect(base_url('index'));
                    } else {
                        $this->session->set_userdata('regmsg', 'Your account is been blocked with multiple  mail ID ' . $formdata['emailid']);
                        redirect(base_url('index'));
                    }
                } elseif (count($regdata) == 1) {
                    $this->session->set_userdata('regmsg', 'Contact no. Already registered');
                    redirect(base_url('index'));
                } else {
                    $this->session->set_userdata('regmsg', 'Your account is been blocked with with multiple contact no. ' . $formdata['contact']);
                    redirect(base_url('index'));
                }
            } else {
                $this->session->set_userdata('regmsg', 'Invalid Contact no. Contact no. should be of 10 digit');
                redirect(base_url('index'));
            }


            // $this->session->set_userdata('msg', 'You have registered successfully. check mail ID to get your password.');


            // redirect('index/login');
        } else {
            $data['title'] = 'Vedicos | User Registeration';
            $data['logo'] = 'assets/images/logo.png';
            $this->load->view('register', $data);
        }
    }

    public function phoneverification()
    {
        $data['category'] = $this->CommonModal->getAllRowsInOrder('category', 'category_id', 'desc');
        $data['rate'] = $this->CommonModal->getRowById('quicklink', 'id', '1');
        $data['contactdetails'] = $this->CommonModal->getRowById('contactdetails', 'cid', '1');
        // print_r($this->session->userdata);
        $data['title'] = 'Vedicos | Phone verification';
        $data['logo'] = 'assets/images/logo.png';
        $this->load->view('phone_verification', $data);
    }

    public function checkotp()
    {
        $vid = $this->input->post('vid');

        $otp = $this->session->userdata('otp');
        $doctor = (($this->session->has_userdata('doctor')) ? $this->session->userdata('doctor') : 'no');
        // echo $doctor;
        if ($vid == $otp) {

            $this->CommonModal->updateRowById('user_registration', 'reg_id', $this->session->userdata('login_user_otp_id'), array('otp_verified' => '1'));
            if ($doctor == 'yes') {
                $this->session->set_userdata('regmsg', '<span class="text-success">Your Mobile no has been verified. Pl wait our team is reviewing your profile and will update you soon. Thanks.</span>');
            } else {
                $this->session->set_userdata('regmsg', '<span class="text-success">OTP verified.</span>');
                $login_data = $this->CommonModal->getSingleRowById('user_registration', array('reg_id' => $this->session->userdata('login_user_otp_id')));
                $this->session->set_userdata(array('login_user_id' => $login_data['reg_id'], 'login_user_type' => $login_data['premium'], 'login_user_name' => $login_data['fullname'], 'login_user_emailid' => $login_data['emailid'], 'login_user_contact' => $login_data['contact'], 'referal_id' => $login_data['referal_id'], 'my_ref_code' => 'VED' . $login_data['my_ref_code'] . $login_data['reg_id']));
            }



            $this->session->unset_userdata('otp');
            $this->session->unset_userdata('doctor');
            $this->session->unset_userdata('login_user_otp_id');

            echo '1';
        } else {
            echo '0';
        }
    }
    public function changePassword()
    {
        extract($this->input->post());
        $user_registration = $this->CommonModal->getRowById('user_registration', 'reg_id', $this->session->has_userdata('login_user_id'));
        print_r($current);
        print_r($user_registration[0]['password']);
        if ($current == $user_registration[0]['password']) {
            if ($new == $confirm) {
                $this->session->set_userdata('msg', 'Password is submitted successfully');
                $this->CommonModal->updateRowById('user_registration', 'reg_id', $this->session->has_userdata('login_user_id'), array('password' => $new));
            } else {
                $this->session->set_userdata('msg', 'New password and Confirm password does\'nt match');
            }
        } else {
            $this->session->set_userdata('msg', 'You have entered wrong Current password');
        }
        redirect(base_url('index/profile'));
    }
    public function about()
    {
        $data['category'] = $this->CommonModal->getAllRowsInOrder('category', 'category_id', 'desc');
        $data['rate'] = $this->CommonModal->getRowById('quicklink', 'id', '1');

        $data['contactdetails'] = $this->CommonModal->getRowById('contactdetails', 'cid', '1');


        $data['title'] = 'Vedicos | About Us';
        $data['logo'] = 'assets/images/logo.png';
        $this->load->view('about', $data);
    }
    public function contact()
    {
        echo sessionId('otp');
        $data['category'] = $this->CommonModal->getAllRowsInOrder('category', 'category_id', 'desc');
        $data['rate'] = $this->CommonModal->getRowById('quicklink', 'id', '1');

        $data['contactdetails'] = $this->CommonModal->getRowById('contactdetails', 'cid', '1');

        if (count($_POST) > 0) {
            $post = $this->input->post();
            $insert = $this->CommonModal->insertRowReturnId('contact_query', $post);
            if ($insert) {
                $this->session->set_userdata('msg', 'Your query is successfully submit. We will contact you as soon as possible.');
            } else {
                $this->session->set_userdata('msg', 'We are facing technical error ,please try again later or get in touch with Email ID provided in contact section.');
            }
        } else {
        }
        $data['title'] = 'Vedicos | Contact Us';
        $data['logo'] = 'assets/images/logo.png';
        $this->load->view('contact', $data);
    }
    public function product()
    {
        $categoryid = $this->uri->segment(3);
        $data['categoryid'] = $this->uri->segment(3);
        $subcategoryid = $this->uri->segment(4);
        $data['subcategoryid'] = $this->uri->segment(4);
        $data['category'] = $this->CommonModal->getAllRowsInOrder('category', 'category_id', 'desc');
        $data['rate'] = $this->CommonModal->getRowById('quicklink', 'id', '1');

        $data['contactdetails'] = $this->CommonModal->getRowById('contactdetails', 'cid', '1');
        if (count($_POST) > 0) {
            extract($this->input->post());
            $table = "products";
            $data['products'] = $this->Dashboard_model->fetchbysearch($table, $searchbox);
        } else {
            if ($subcategoryid != '') {
                $data['products'] = $this->CommonModal->getRowById('products', 'subcategory_id', $subcategoryid);
            } elseif ($categoryid != '') {
                $data['products'] = $this->CommonModal->getRowById('products', 'category_id', $categoryid);
            } else {
                $data['products'] = $this->Dashboard_model->fetchlimit('products');
            }
            $data['subcategory'] = $this->CommonModal->getRowById('sub_category', 'cat_id', $categoryid);
        }

        $data['title'] = 'Vedicos | Our product';
        $data['logo'] = 'assets/images/logo.png';
        $this->load->view('collection', $data);
    }

    public function deals()
    {

        $data['category'] = $this->CommonModal->getAllRowsInOrder('category', 'category_id', 'desc');
        $data['rate'] = $this->CommonModal->getRowById('quicklink', 'id', '1');
        $data['contactdetails'] = $this->CommonModal->getRowById('contactdetails', 'cid', '1');

        $data['promocode'] = $this->CommonModal->getRowById('promocode', 'status', '0');
        $data['title'] = 'Vedicos | Our Deals';
        $data['logo'] = 'assets/images/logo.png';
        $this->load->view('deals', $data);
    }

    public function promocode_details($pid)
    {

        $data['category'] = $this->CommonModal->getAllRowsInOrder('category', 'category_id', 'desc');
        $data['rate'] = $this->CommonModal->getRowById('quicklink', 'id', '1');
        $data['contactdetails'] = $this->CommonModal->getRowById('contactdetails', 'cid', '1');

        $data['promocode'] = $this->CommonModal->getRowByMoreId('promocode', array('status' => '0', 'pid' => $pid));
        $data['title'] = 'Vedicos | Our Promocode Details';
        $data['logo'] = 'assets/images/logo.png';
        $this->load->view('promocode_details', $data);
    }

    public function sale()
    {
        $data['category'] = $this->CommonModal->getAllRowsInOrder('category', 'category_id', 'desc');
        $data['rate'] = $this->CommonModal->getRowById('quicklink', 'id', '1');

        $data['contactdetails'] = $this->CommonModal->getRowById('contactdetails', 'cid', '1');
        $data['subcategory'] = $this->CommonModal->getAllRowsInOrder('sub_category', 'subcat_name', 'asc');
        $data['products'] = $this->CommonModal->getRowById('products', 'sale', '1');

        $data['title'] = 'Vedicos | Our product';
        $data['logo'] = 'assets/images/logo.png';
        $this->load->view('productonsale', $data);
    }
    public function product_details()
    {
        $id = $this->uri->segment(3);
        $data['category'] = $this->CommonModal->getAllRowsInOrder('category', 'category_id', 'desc');
        $data['rate'] = $this->CommonModal->getRowById('quicklink', 'id', '1');
        $data['contactdetails'] = $this->CommonModal->getRowById('contactdetails', 'cid', '1');
        $data['product_reveiw'] = $this->CommonModal->getRowById('product_reveiw', 'product_id', $id);
        $data['products_image'] = $this->CommonModal->getRowById('products_image', 'product_id', $id);

        $table = "products";

        $data['affiliate'] = $this->uri->segment(4);
        $data['details'] = $this->Dashboard_model->fetch_collection($table, $id);
        $currentURL = current_url();
        $params   = $_SERVER['QUERY_STRING'];
        $data['fullURL'] = $currentURL;
        // $data['fullURL'] = $currentURL . '?' . $params;  

        $data['title'] = 'Vedicos | Our product details';
        $data['logo'] = 'assets/images/logo.png';
        $this->load->view('collection_details', $data);
    }
    public function blog_details()
    {
        $data['category'] = $this->CommonModal->getAllRowsInOrder('category', 'category_id', 'desc');
        $data['rate'] = $this->CommonModal->getRowById('quicklink', 'id', '1');
        $data['contactdetails'] = $this->CommonModal->getRowById('contactdetails', 'cid', '1');
        $data['blogs_list'] = $this->CommonModal->getAllRowsInOrder('blogs', 'bid', 'desc');
        $id = $this->uri->segment(3);
        $data['blogs'] = $this->CommonModal->getRowById('blogs', 'bid', $id);

        $data['title'] = 'Vedicos | Our Blog details';
        $data['logo'] = 'assets/images/logo.png';
        $this->load->view('blog_details', $data);
    }
    // public function products()
    // {

    //     $data['category'] = $this->CommonModal->getAllRowsInOrder('category', 'category_id', 'desc');
    //     $data['rate'] = $this->CommonModal->getRowById('quicklink', 'id', '1'); 
    //     $data['contactdetails'] = $this->CommonModal->getRowById('contactdetails', 'cid', '1');
    //     $data['testimonials'] = $this->CommonModal->getAllRowsInOrder('testimonials', 'tid', 'desc');
    //     $data['products'] = $this->CommonModal->getRowById('products', 'category_id', $categoryid);
    //     $data['title'] = 'Vedicos | Our product';
    //     $data['logo'] = 'assets/images/logo.png';
    //     $this->load->view('products', $data);
    // }
    public function cart_checkout()
    {
        if (!$this->session->has_userdata('login_user_id')) {
            $this->session->set_userdata('checkout', 'Login here to continue');
        } else {
            $data['login'] = $this->CommonModal->getRowById('user_registration', 'reg_id', $this->session->userdata('login_user_id'));
        }

        $data['category'] = $this->CommonModal->getAllRowsInOrder('category', 'category_id', 'desc');
        $data['rate'] = $this->CommonModal->getRowById('quicklink', 'id', '1');
        $data['contactdetails'] = $this->CommonModal->getRowById('contactdetails', 'cid', '1');
        $data['old_checkout'] = $this->CommonModal->getSingleRowById('checkout', array('user_id' => $this->session->userdata('login_user_id')));
        $data['state_list'] = $this->CommonModal->getAllRows('state_list');

        $data['title'] = 'Vedicos | Add to cart';
        $data['logo'] = 'assets/images/logo.png';
        $this->load->view('add_to_cart', $data);
    }
    public function profile()
    {
        if (!$this->session->has_userdata('login_user_id')) {
            redirect('index/login');
        }

        $data['category'] = $this->CommonModal->getAllRowsInOrder('category', 'category_id', 'desc');
        $data['rate'] = $this->CommonModal->getRowById('quicklink', 'id', '1');

        $data['contactdetails'] = $this->CommonModal->getRowById('contactdetails', 'cid', '1');

        $data['login_user'] = $this->session->userdata();
        // print_r($this->session->userdata);  exit;
        $data['wishList'] = $this->CommonModal->getRowById('products_wishlist', 'user_id', $this->session->userdata('login_user_id'));
        $data['orderDetails'] = $this->CommonModal->getRowById('checkout', 'user_id', $this->session->userdata('login_user_id'));
        $data['profiledata'] = $this->CommonModal->getRowById('user_registration', 'reg_id', $this->session->userdata('login_user_id'));
        $data['pointDetails'] = $this->CommonModal->getRowById('affliate_purchase', 'user_id', $this->session->userdata('login_user_id'));
        // $data['pointDetails'] = $this->CommonModal->getRowById('referal_amt', 'referal_id', $this->session->userdata('my_ref_code'));
        if (count($_POST) > 0) {
            $formdata = $this->input->post();
            if ($formdata['user_type'] == '1') {
                $this->session->set_userdata('doctor', 'yes');
            } else {
                $this->session->set_userdata('doctor', 'no');
            }
            if ($_FILES['profile']['name'] != '') {
                $formdata['profile'] = imageUpload('profile', 'uploads/user/');
            } else {
                $formdata['profile'] = $data['profiledata'][0]['profile'];
            }
            if ($_FILES['degreedoc']['name'] != '') {
                $formdata['degreedoc'] = imageUpload('degreedoc', 'uploads/user/');
            } else {
                $formdata['degreedoc'] = $data['profiledata'][0]['degreedoc'];
            }
            if ($_FILES['identitydoc']['name'] != '') {
                $formdata['identitydoc'] = imageUpload('identitydoc', 'uploads/user/');
            } else {
                $formdata['identitydoc'] = $data['profiledata'][0]['identitydoc'];
            }
            // print_r($_FILES);
            // print_r($_POST);
            // print_r($formdata);
            $lig = $this->CommonModal->updateRowById('user_registration', 'reg_id', $this->session->userdata('login_user_id'), $formdata);
            $this->session->set_userdata('profilemsg', 'Profile updated successfully');
        } else {
            // $this->session->set_userdata('profilemsg', 'Server error');
            // redirect(base_url('profile'));
        }

        $data['title'] = 'Vedicos | Profile';
        $data['logo'] = 'assets/images/logo.png';
        $this->load->view('profile', $data);
    }
    public function orders()
    {
        if (!$this->session->has_userdata('login_user_id')) {
            redirect('index/login');
        }

        $data['category'] = $this->CommonModal->getAllRowsInOrder('category', 'category_id', 'desc');
        $data['rate'] = $this->CommonModal->getRowById('quicklink', 'id', '1');
        $data['contactdetails'] = $this->CommonModal->getRowById('contactdetails', 'cid', '1');

        $data['login_user'] = $this->session->userdata();
        $data['orderDetails'] = $this->CommonModal->getRowById('checkout', 'user_id', $this->session->userdata('login_user_id'));

        $data['title'] = 'Vedicos | Profile';
        $data['logo'] = 'assets/images/logo.png';
        $this->load->view('orders', $data);
    }
    public function cancelorder()
    {
        $id = $this->input->post('id');
        $upd = $this->CommonModal->updateRowById('checkout', 'id', $id, array('status' => '2'));
        if ($upd) {
            echo '0';
        } else {
            echo '1';
        }
    }
    public function returnorder()
    {
        $id = $this->input->post('id');
        $upd = $this->CommonModal->updateRowById('checkout', 'id', $id, array('status' => '8'));
        if ($upd) {
            echo '0';
        } else {
            echo '1';
        }
    }

    public function wishlist()
    {
        if (!$this->session->has_userdata('login_user_id')) {
            redirect('index/login');
        }
        $data['category'] = $this->CommonModal->getAllRowsInOrder('category', 'category_id', 'desc');
        $data['rate'] = $this->CommonModal->getRowById('quicklink', 'id', '1');
        $data['contactdetails'] = $this->CommonModal->getRowById('contactdetails', 'cid', '1');
        $data['login_user'] = $this->session->userdata();
        $data['wishList'] = $this->CommonModal->getRowById('products_wishlist', 'user_id', $this->session->userdata('login_user_id'));
        $data['title'] = 'Vedicos | Wishlist';
        $data['logo'] = 'assets/images/logo.png';
        $this->load->view('wishlist', $data);
    }

    public function orderDetails()
    {
        if (!$this->session->has_userdata('login_user_id')) {
            redirect('index/login');
        }
        $checkoutID = $this->uri->segment(3);
        $data['category'] = $this->CommonModal->getAllRowsInOrder('category', 'category_id', 'desc');
        $data['rate'] = $this->CommonModal->getRowById('quicklink', 'id', '1');

        $data['contactdetails'] = $this->CommonModal->getRowById('contactdetails', 'cid', '1');

        $data['orderDetails'] = $this->CommonModal->getRowById('checkout', 'id', $checkoutID);
        $data['orderProductDetails'] = $this->CommonModal->getRowById('checkout_product', 'checkoutid', $checkoutID);
        $data['title'] = 'Vedicos | Profile';
        $data['logo'] = 'assets/images/logo.png';
        $this->load->view('orderDetails', $data);
    }
    public function orderInvoice()
    {
        if (!$this->session->has_userdata('login_user_id')) {
            redirect('index/login');
        }
        $checkoutID = $this->uri->segment(3);
        $data['category'] = $this->CommonModal->getAllRowsInOrder('category', 'category_id', 'desc');
        $data['rate'] = $this->CommonModal->getRowById('quicklink', 'id', '1');

        $data['contactdetails'] = $this->CommonModal->getRowById('contactdetails', 'cid', '1');

        $data['orderDetails'] = $this->CommonModal->getRowById('checkout', 'id', $checkoutID);
        $data['orderProductDetails'] = $this->CommonModal->getRowById('checkout_product', 'checkoutid', $checkoutID);
        $data['title'] = 'Vedicos | Profile';
        $data['logo'] = 'assets/images/logo.png';
        $this->load->view('orderInvoice', $data);
    }

    public function logout()
    {
        $this->session->unset_userdata('login_user_id');
        $this->session->unset_userdata('login_user_name');
        $this->session->unset_userdata('login_user_emailid');
        $this->session->unset_userdata('login_user_contact');
        $this->session->unset_userdata('login_user_type');
        $this->session->unset_userdata('referal_id');
        $this->session->unset_userdata('my_ref_code');
        redirect(base_url('index'));
    }

    // razorpay code
    public function checkoutpay()
    {
        if (count($_POST) > 0) {

            $profiledata = $this->CommonModal->getRowById('user_registration', 'reg_id', $this->session->userdata('login_user_id'));
            echo '<pre>';
            $postdata = $this->input->post();
            // print_r($postdata);
            // print_r($profiledata);

            $point = 0;
            $minimumpv = 0;
            if ($profiledata[0]['user_type'] == '0') {
                // echo 'normal';
                $referal_per = $this->CommonModal->getRowById('referal_per', 'id', '1');
                if ($postdata['totalreferalpoint'] >= $referal_per[0]['minimum_point']) {
                    $point = (int)$this->cart->total() * ($referal_per[0]['minimum_value'] / 100);

                    $postdata['referalpoint'] = $point;
                }
            } elseif ($profiledata[0]['user_type'] == '1') {
                // echo 'premium';
                $referal_per = $this->CommonModal->getRowById('referal_per', 'id', '2');
                if ($postdata['totalreferalpoint'] >= $referal_per[0]['minimum_point']) {
                    $point = (int)$this->cart->total() * ($referal_per[0]['minimum_value'] / 100);

                    $postdata['referalpoint'] = $point;
                }
            } else {
                $postdata['referalpoint'] = $point;
            }
            // print_r($postdata);
            // exit();

            $post = $this->CommonModal->insertRowReturnId('checkout', $postdata);


            foreach ($this->cart->contents() as $items) :
                $product = array('checkoutid' => $post, 'product_id' => $items['id'], 'product_img' => $items['image'], 'product_name' => $items['name'], 'product_price' => $items['price'], 'product_quantity' => $items['qty'], 'affiliate' => $items['affiliate'], 'total_pro_amt' => ($items['price'] * $items['qty']));

                if ($items['affiliate'] != '0') {
                    $refdata = $this->CommonModal->getRowById('user_registration', 'reg_id', $items['affiliate']);
                    if ($this->session->userdata('login_user_id') != $items['affiliate']) {
                        if ($refdata[0]['premium'] == 0) {
                            $referal_per = $this->CommonModal->getRowById('referal_per', 'id', '1');
                            $amt = ((int)$items['price'] * (int)$items['qty']) * ($referal_per[0]['percen'] / 100);
                            $this->CommonModal->insertRowReturnId('affliate_purchase', array('user_id' => $items['affiliate'], 'product_id' => $items['id'], 'checkoutid' => $post, 'amount' => $items['price'], 'percentage' => $referal_per[0]['percen'], 'ref_amt' => $amt));
                        } else {
                            $referal_per = $this->CommonModal->getRowById('referal_per', 'id', '2');
                            $amt = ((int)$items['price'] * (int)$items['qty']) * ($referal_per[0]['percen'] / 100);
                            $this->CommonModal->insertRowReturnId('affliate_purchase', array('user_id' => $items['affiliate'], 'product_id' => $items['id'], 'checkoutid' => $post, 'amount' => $items['price'], 'percentage' => $referal_per[0]['percen'], 'ref_amt' => $amt));
                        }
                        $line_cost = (int)$refdata[0]['total_ref'] * (int)$amt;
                        $rowdata2 = array('total_ref' =>  $line_cost);
                        $post_ref = $this->CommonModal->updateRowById('user_registration', 'reg_id', $refdata[0]['reg_id'], $rowdata2);
                    }
                }
                $this->CommonModal->insertRowReturnId('checkout_product', $product);
            endforeach;
            if ($post != '') {
                $this->cart->destroy();
                if ($this->input->post('payment_type') == '0') {

                    redirect(base_url('index/booking_status'));
                } else {
                    $data['title']              = 'Checkout payment | Vedicos';
                    $data['callback_url']       = base_url() . 'index/callback';
                    $data['surl']               = base_url() . 'index/success';
                    $data['furl']               = base_url() . 'index/failed';
                    $data['currency_code']      = 'INR';
                    $data['grandtotal']         = $this->input->post('grand_total');
                    $data['name']               = $this->input->post('name');
                    $data['email']              = $this->input->post('email');
                    $data['number']             = $this->input->post('number');
                    $data['product']             = $post;
                    $this->load->view('checkout', $data);
                }
            } else {
                echo 'Check Form Data';
            }
        }
    }
    private function curl_handler($payment_id, $amount)
    {
        $url            = 'https://api.razorpay.com/v1/payments/' . $payment_id . '/capture';
        $key_id         = "rzp_live_DFw1xfBuCSwG0l";
        $key_secret     = "Y7B7ZZWllO2L2ASumbfcTajL";
        $fields_string  = "amount=$amount";
        //cURL Request
        $ch = curl_init();
        //set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_USERPWD, $key_id . ':' . $key_secret);
        curl_setopt($ch, CURLOPT_TIMEOUT, 60);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
        return $ch;
    }
    public function callback()
    {
        // print_r($this->input->post());
        if (!empty($this->input->post('razorpay_payment_id')) && !empty($this->input->post('merchant_order_id'))) {
            $razorpay_payment_id = $this->input->post('razorpay_payment_id');
            $merchant_order_id = $this->input->post('merchant_order_id');

            $this->session->set_flashdata('razorpay_payment_id', $this->input->post('razorpay_payment_id'));
            $this->session->set_flashdata('merchant_order_id', $this->input->post('merchant_order_id'));
            $currency_code = 'INR';
            $amount = $this->input->post('merchant_total');
            $success = false;
            $error = '';
            try {
                $ch = $this->curl_handler($razorpay_payment_id, $amount);
                //execute post
                $result = curl_exec($ch);
                $http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
                if ($result === false) {
                    $success = false;
                    $error = 'Curl error: ' . curl_error($ch);
                } else {
                    $response_array = json_decode($result, true);
                    //Check success response
                    if ($http_status === 200 and isset($response_array['error']) === false) {
                        $success = true;
                    } else {
                        $success = false;
                        if (!empty($response_array['error']['code'])) {
                            $error = $response_array['error']['code'] . ':' . $response_array['error']['description'];
                        } else {
                            $error = 'RAZORPAY_ERROR:Invalid Response <br/>' . $result;
                        }
                    }
                }
                //close curl connection
                curl_close($ch);
            } catch (Exception $e) {
                $success = false;
                $error = 'Request to Razorpay Failed';
            }

            if ($success === true) {
                if (!empty($this->session->userdata('ci_subscription_keys'))) {
                    $this->session->unset_userdata('ci_subscription_keys');
                }
                $updateData = array('razorpay_payment_id' => $this->input->post('razorpay_payment_id'), 'merchant_order_id' => $this->input->post('merchant_order_id'), 'merchant_amount' => $this->input->post('merchant_amount'));
                $this->CommonModal->updateRowById('checkout', 'id', $this->input->post('merchant_product_info_id'), $updateData);
                if (!$order_info['order_status_id']) {
                    redirect($this->input->post('merchant_surl_id'));
                } else {
                    redirect($this->input->post('merchant_surl_id'));
                }
            } else {
                redirect($this->input->post('merchant_furl_id'));
            }
        } else {
            echo 'An error occured. Contact site administrator, please!';
        }
    }
    public function success()
    {
        $data['category'] = $this->CommonModal->getAllRowsInOrder('category', 'category_id', 'desc');
        $data['rate'] = $this->CommonModal->getRowById('quicklink', 'id', '1');

        $data['contactdetails'] = $this->CommonModal->getRowById('contactdetails', 'cid', '1');
        $data['logo'] = 'assets/images/logo.png';
        $data['title'] = 'Razorpay Success | Vedicos';
        $msg = '';
        $msg .= "<h4>Thank you for shopping on Vedicos. We're prepping your order with Vedicos Ayur-products.</h4>";
        $msg .= "<br/>";
        $msg .= "Till then happy shopping 🙂 - Team Vedicos.";

        $msg .= "<p>Transaction ID: " . $this->session->flashdata('razorpay_payment_id') . '</p>';
        $msg .= "<br/>";
        $msg .= "<p>Order ID: " . $this->session->flashdata('merchant_order_id') . '</p>';
        $data['message'] = $msg;
        $this->load->view('payment_msg', $data);
    }
    public function failed()
    {
        $data['category'] = $this->CommonModal->getAllRowsInOrder('category', 'category_id', 'desc');
        $data['rate'] = $this->CommonModal->getRowById('quicklink', 'id', '1');

        $data['contactdetails'] = $this->CommonModal->getRowById('contactdetails', 'cid', '1');
        $data['logo'] = 'assets/images/logo.png';
        $data['title'] = 'Razorpay Failed | Vedicos';
        $msg = '';
        $msg .= "<h4>Your transaction got Failed</h4>";
        $msg .= "<br/>";
        $msg .= "<p>Transaction ID: " . $this->session->flashdata('razorpay_payment_id') . '</p>';
        $msg .= "<br/>";
        $msg .= "<p>Order ID: " . $this->session->flashdata('merchant_order_id') . '</p>';
        $data['message'] = $msg;
        $this->load->view('payment_msg', $data);
    }
    public function booking_status()
    {
        $data['category'] = $this->CommonModal->getAllRowsInOrder('category', 'category_id', 'desc');
        $data['rate'] = $this->CommonModal->getRowById('quicklink', 'id', '1');

        $data['contactdetails'] = $this->CommonModal->getRowById('contactdetails', 'cid', '1');
        $data['logo'] = 'assets/images/logo.png';
        $data['title'] = 'Payment Status';
        $msg = '';
        $msg .= "<h4>Thank you for shopping on Vedicos.</h4>";
        $msg .= "<br/>";
        $msg .= "<h4>Thank you for shopping on Vedicos. We're prepping your order with Vedicos Ayur-products.</h4>";
        $msg .= "<br/>";
        $msg .= "Till then happy shopping 🙂 - Team Vedicos.";
        $data['message'] = $msg;
        $this->load->view('payment_msg', $data);
    }

    // ajax function
    public function addToCart()
    {
        $product_id = $this->input->post('pid');
        $affiliate = $this->input->post('affiliate');
        $product = $this->CommonModal->getRowByIdfield('products', 'product_id', $product_id, array('product_id', 'price', 'pro_name', 'img1', 'weight'));
        $data = array(
            'id'      => $product[0]['product_id'],
            'qty'     => 1,
            'price'   => $product[0]['price'],
            'name'    => htmlentities($product[0]['pro_name']),
            'affiliate'    => $affiliate,
            'image'    => $product[0]['img1'],
            'weight'    => $product[0]['weight']
        );

        $this->cart->insert($data);
        print_r($product);
    }
    public function cart_list()
    {
        $data['category'] = $this->CommonModal->getAllRowsInOrder('category', 'category_id', 'desc');
        $data['rate'] = $this->CommonModal->getRowById('quicklink', 'id', '1');
        $data['contactdetails'] = $this->CommonModal->getRowById('contactdetails', 'cid', '1');
        $data['logo'] = 'assets/images/logo.png';
        $data['title'] = 'Disclaimer | Vedicos';

        $this->load->view('cart_list', $data);
    }
    public function update_qty()
    {
        extract($this->input->post());
        // print_r($this->input->post());
        $data = array(
            'rowid' => $rowid,
            'qty'   => $qty
        );


        $this->cart->update($data);
        // echo 're';
        print_r($data);
    }

    public function addTowishlist()
    {
        $product_id = $this->input->post('pid');
        $user_id = $this->session->userdata('login_user_id');
        $post = array('product_id' => $product_id, 'user_id' => $user_id);
        $ret =  $this->CommonModal->insertRow('products_wishlist', $post);
        if ($ret) {
            echo  '1';
        } else {
            echo '0';
        }
    }
    public function removewishlist()
    {
        $pw_id = $this->input->post('pid');
        $ret = $this->CommonModal->deleteRowById('products_wishlist', array('pw_id' => $pw_id));


        if ($ret) {
            echo  '1';
        } else {
            echo '0';
        }
    }

    public function fetch_totalitems()
    {
        echo $this->cart->total_items();
    }
    public function fetch_totalamount()
    {
        echo $this->cart->total();
    }
    public function delete_item()
    {
        $product_id = $this->input->post('pid');
        $data = array(
            'rowid' => $product_id,
            'qty'   => 0
        );


        $this->cart->update($data);
    }
    public function fetch_data()
    {
        // $items = $this->cart->contents();
        // foreach($items as $pro){

        // }
        $this->load->view('cart');
    }
    public function cartAjax()
    {
        // $items = $this->cart->contents();
        // foreach($items as $pro){

        // }
        $this->load->view('cartListAjax');
    }
    public function cartAjax2()
    {
        // $items = $this->cart->contents();
        // foreach($items as $pro){

        // }
        $this->load->view('cartListAjax2');
    }
    public function cartweight()
    {
        $w = 0;

        foreach ($this->cart->contents() as $items) :

            $w += $items['weight'];
        endforeach;
        echo $w;
    }

    public function getProduct()
    {
        $categoryid = $this->input->post('catid');
        $subcategoryid = $this->input->post('subcatid');
        $limit = $this->input->post('limit');
        $offset = $this->input->post('offset');
        if ($subcategoryid != '') {
            echo json_encode($this->CommonModal->getDataByIdInOrderLimit('products', array('subcategory_id' => $subcategoryid), 'product_id', 'desc', $limit, $offset));
        } elseif ($categoryid != '') {
            echo json_encode($this->CommonModal->getDataByIdInOrderLimit('products', array('category_id' => $categoryid), 'product_id', 'desc', $limit, $offset));
        } else {
            echo json_encode($this->CommonModal->getAllDataWithLimitInOrder('products', 'product_id', 'desc', $limit, $offset));
        }
    }
    public function checkPromo()
    {
        $promocode = $this->input->post('promocode');
        echo json_encode($this->CommonModal->getRowById('promocode', 'title', $promocode));
    }

    public function faq()
    {
        $data['category'] = $this->CommonModal->getAllRowsInOrder('category', 'category_id', 'desc');
        $data['rate'] = $this->CommonModal->getRowById('quicklink', 'id', '1');

        $data['contactdetails'] = $this->CommonModal->getRowById('contactdetails', 'cid', '1');
        $data['logo'] = 'assets/images/logo.png';
        $data['faq'] = $this->CommonModal->getAllRowsInOrder('faq', 'fid', 'desc');


        $data['title'] = 'FAQ | Vedicos';

        $this->load->view('faq', $data);
    }
    public function disclaimer()
    {
        $data['category'] = $this->CommonModal->getAllRowsInOrder('category', 'category_id', 'desc');
        $data['rate'] = $this->CommonModal->getRowById('quicklink', 'id', '1');
        $data['contactdetails'] = $this->CommonModal->getRowById('contactdetails', 'cid', '1');
        $data['logo'] = 'assets/images/logo.png';
        $data['title'] = 'Disclaimer | Vedicos';
        $data['data'] = $this->CommonModal->getSingleRowById('tbl_add_on_data', array('id' => '11'));

        $this->load->view('disclaimer', $data);
    }
    public function returnPolicy()
    {
        $data['category'] = $this->CommonModal->getAllRowsInOrder('category', 'category_id', 'desc');
        $data['rate'] = $this->CommonModal->getRowById('quicklink', 'id', '1');
        $data['contactdetails'] = $this->CommonModal->getRowById('contactdetails', 'cid', '1');
        $data['logo'] = 'assets/images/logo.png';
        $data['data'] = $this->CommonModal->getSingleRowById('tbl_add_on_data', array('id' => '10'));


        $data['title'] = 'Return Policy | Vedicos';

        $this->load->view('disclaimer', $data);
    }

    public function refundPolicy()
    {
        $data['category'] = $this->CommonModal->getAllRowsInOrder('category', 'category_id', 'desc');
        $data['rate'] = $this->CommonModal->getRowById('quicklink', 'id', '1');
        $data['contactdetails'] = $this->CommonModal->getRowById('contactdetails', 'cid', '1');
        $data['logo'] = 'assets/images/logo.png';
        $data['data'] = $this->CommonModal->getSingleRowById('tbl_add_on_data', array('id' => '9'));


        $data['title'] = 'Cancellation and Refund Policy | Vedicos';

        $this->load->view('disclaimer', $data);
    }
    public function terms_condition()
    {
        $data['category'] = $this->CommonModal->getAllRowsInOrder('category', 'category_id', 'desc');
        $data['rate'] = $this->CommonModal->getRowById('quicklink', 'id', '1');
        $data['contactdetails'] = $this->CommonModal->getRowById('contactdetails', 'cid', '1');
        $data['logo'] = 'assets/images/logo.png';
        // $data['returnPolicy'] = $this->CommonModal->getRowById('quicklink', 'id', '1');
        $data['data'] = $this->CommonModal->getSingleRowById('tbl_add_on_data', array('id' => '2'));

        $data['title'] = 'Terms and condition | Vedicos';

        $this->load->view('disclaimer', $data);
    }

    public function privacy_policy()
    {
        $data['category'] = $this->CommonModal->getAllRowsInOrder('category', 'category_id', 'desc');
        $data['rate'] = $this->CommonModal->getRowById('quicklink', 'id', '1');
        $data['contactdetails'] = $this->CommonModal->getRowById('contactdetails', 'cid', '1');
        $data['logo'] = 'assets/images/logo.png';
        // $data['returnPolicy'] = $this->CommonModal->getRowById('quicklink', 'id', '1');
        $data['data'] = $this->CommonModal->getSingleRowById('tbl_add_on_data', array('id' => '1'));

        $data['title'] = 'Privacy Policy | Vedicos';

        $this->load->view('disclaimer', $data);
    }
    public function consultation()
    {
        $data['category'] = $this->CommonModal->getAllRowsInOrder('category', 'category_id', 'desc');
        $data['rate'] = $this->CommonModal->getRowById('quicklink', 'id', '1');
        $data['contactdetails'] = $this->CommonModal->getRowById('contactdetails', 'cid', '1');

        if (count($_POST) > 0) {
            $post = $this->input->post();
            $insert = $this->CommonModal->insertRowReturnId('consult_query', $post);
            if ($insert) {
                $this->session->set_userdata('msg', 'Your query is successfully submit. We will contact you as soon as possible.');
            } else {
                $this->session->set_userdata('msg', 'We are facing technical error ,please try again later or get in touch with Email ID provided in contact section.');
            }
        } else {
        }
        $data['title'] = 'Vedicos | Consultation';
        $data['logo'] = 'assets/images/logo.png';
        $this->load->view('consultation', $data);
    }

    public function videos()
    {
        $data['category'] = $this->CommonModal->getAllRowsInOrder('category', 'category_id', 'desc');
        $data['rate'] = $this->CommonModal->getRowById('quicklink', 'id', '1');
        $data['contactdetails'] = $this->CommonModal->getRowById('contactdetails', 'cid', '1');
        $data['videos'] = $this->CommonModal->getAllRowsInOrder('videos', 'vid', 'desc');
        $data['title'] = 'Vedicos | Videos';
        $data['logo'] = 'assets/images/logo.png';
        $this->load->view('videos', $data);
    }
    public function blogs()
    {
        $data['category'] = $this->CommonModal->getAllRowsInOrder('category', 'category_id', 'desc');
        $data['rate'] = $this->CommonModal->getRowById('quicklink', 'id', '1');
        $data['contactdetails'] = $this->CommonModal->getRowById('contactdetails', 'cid', '1');
        $data['blogs'] = $this->CommonModal->getAllRowsInOrder('blogs', 'bid', 'desc');
        $data['title'] = 'Vedicos | Blogs';
        $data['logo'] = 'assets/images/logo.png';
        $this->load->view('blogs', $data);
    }
    public function video_detail($vid)
    {
        $data['category'] = $this->CommonModal->getAllRowsInOrder('category', 'category_id', 'desc');
        $data['rate'] = $this->CommonModal->getRowById('quicklink', 'id', '1');
        $data['contactdetails'] = $this->CommonModal->getRowById('contactdetails', 'cid', '1');
        $data['videos'] = $this->CommonModal->getRowByIdInOrder('videos', array('vid' => $vid), 'vid', 'desc');
        $data['allvideos_list'] = $this->CommonModal->getAllRowsInOrder('videos', 'vid', 'desc');

        $data['title'] = 'Vedicos | Videos';
        $data['logo'] = 'assets/images/logo.png';
        $this->load->view('video_detail', $data);
    }
    public function affilate_link()
    {

        $post = $this->input->post();
        $affiliate_var = '';
        $data = $this->CommonModal->getNumRows('affiliate_links', $post);
        if ($data > 0) {
            $aff = $this->CommonModal->getRowByMoreId('affiliate_links', $post);
            $affiliate_var = $aff[0]['affiliate_var'];
        } else {
            $affiliate_var = orderIdGenerateUser();
            $post['affiliate_var'] = $affiliate_var;
            $this->CommonModal->insertRow('affiliate_links', $post);
        }
        echo $affiliate_var;
    }
    public function affiliate_share($aff)
    {

        $data = $this->CommonModal->getRowById('affiliate_links', 'affiliate_var', $aff);
        if ($data > 0) {
            $product = $this->CommonModal->getRowById('products', 'product_id', $data[0]['product_id']);
            $user = $this->CommonModal->getRowById('user_registration', 'reg_id', $data[0]['user_id']);
            redirect(base_url('index/product_details/' . $data[0]['product_id'] . '/' . $data[0]['user_id'] . '/' . url_title($product[0]['pro_name'], 'dash', true) . '/' . url_title($user[0]['fullname'], 'dash', true)));
        } else {
            redirect(base_url('index'));
        }
    }
    public function register_as_doctor()
    {
        if ($this->session->has_userdata('login_user_id')) {
            redirect(base_url('index/profile'));
        }
        $data['category'] = $this->CommonModal->getAllRowsInOrder('category', 'category_id', 'desc');
        $data['rate'] = $this->CommonModal->getRowById('quicklink', 'id', '1');
        $data['contactdetails'] = $this->CommonModal->getRowById('contactdetails', 'cid', '1');

        if (count($_POST) > 0) {
            $formdata = $this->input->post();
            if ($formdata['user_type'] == '1') {
                $this->session->set_userdata('doctor', 'yes');
            } else {
                $this->session->set_userdata('doctor', 'no');
            }
            $table = "user_registration";
            $regdata = $this->CommonModal->getRowById('user_registration', 'contact', $formdata['contact']);

            if (empty($regdata)) {
                echo '<pre>';
                // print_r($formdata);
                $formdata['my_ref_code'] = $this->input->post('fullname');
                $formdata['otp'] =   rand(11111, 9999999);
                $formdata['profile'] = imageUpload('image', 'uploads/user/');
                $formdata['degreedoc'] = imageUpload('degreedoc', 'uploads/user/');
                $formdata['identitydoc'] = imageUpload('identitydoc', 'uploads/user/');
                // print_r($formdata);exit();
                $lig = $this->CommonModal->insertRowReturnId($table, $formdata);
                sendOTP($formdata['contact'], $formdata['otp'] . ' is your One Time Password (OTP) to verify your phone number with Edusol App. Thanks EDUSOL (Ekaum Enterprises)');
                // print_r($formdata);
                $this->session->set_userdata(array('otp' => $formdata['otp'], 'login_user_name' => $formdata['fullname'],  'login_user_contact' => $formdata['contact'],  'login_user_otp_id' => $lig));


                redirect(base_url('index/phoneverification'));
            } elseif (count($regdata) == 1) {
                $this->session->set_userdata('regmsg', 'Already registered');
                redirect(base_url('index'));
            } else {
                $this->session->set_userdata('regmsg', 'Your account is been blocked');
                redirect(base_url('index'));
            }
        } else {
            $data['title'] = 'Vedicos | User Registeration';
            $data['logo'] = 'assets/images/logo.png';
            $this->load->view('register', $data);
        }
    }
    public function withdrawrequest()
    {
        $user = $this->session->userdata('login_user_id');
        $points = $this->input->post('points');
        $upiid = $this->input->post('upiid');
        $this->CommonModal->insertRowReturnId('affiliate_withdraw', array('user_id' => $user, 'points' => $points, 'upiid' => $upiid));
    }



    public function product_review($pid)
    {
        $data['category'] = $this->CommonModal->getAllRowsInOrder('category', 'category_id', 'desc');
        $data['rate'] = $this->CommonModal->getRowById('quicklink', 'id', '1');

        $data['contactdetails'] = $this->CommonModal->getRowById('contactdetails', 'cid', '1');
        $data['row'] = $this->CommonModal->getRowById('products', 'product_id', $pid);
        // $data['products_image'] = $this->CommonModal->getRowById('products_image', 'product_id', $pid);
        // print_r($data['row']);
        $data['product_id'] = $pid;

        if (count($_POST) > 0) {
            $post = $this->input->post();
            $post['image'] = imageUpload('image', 'uploads/review');
            $insert = $this->CommonModal->insertRowReturnId('product_reveiw', $post);
            if ($insert) {
                $this->session->set_userdata('msg', 'Your review is successfully submit');
            } else {
                $this->session->set_userdata('msg', 'We are facing technical error');
            }
            redirect(base_url('index/orders'));
        } else {
        }

        $data['title'] = 'Vedicos | Product Review';
        $data['logo'] = 'assets/images/logo.png';
        $this->load->view('review', $data);
    }
    public function token()
    {
        $token = generateToken();
        echo $token;
    }
}
