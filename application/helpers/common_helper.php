<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

function setDateTime()
{
	return date('Y-m-d H:i:s');
}

function setDateOnly()
{
	return date('Y-m-d');
}
function convertDatedmy($dt)
{
	return date("d-m-Y", strtotime($dt));
}
function convertDatedmyhis($dt)
{
	return date("d-m-Y H:i s", strtotime($dt));
}
function dateDiff($date1, $date2)
{
	$date1_ts = strtotime($date1);
	$date2_ts = strtotime($date2);
	$diff = $date2_ts - $date1_ts;
	return round($diff / 86400);
}
function sessionId($id)
{
	$ci = &get_instance();
	return $ci->session->userdata($id);
}

function insertRow($table, $data)
{
	$ci = &get_instance();
	$clean = $ci->security->xss_clean($data);
	return $ci->db->insert($table, $clean);
}

function returnId($table, $data)
{
	$ci = &get_instance();
	$ci->db->insert($table, $data);
	return $ci->db->insert_id();
}

function randomCode($length_of_string)
{
	$str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
	return substr(str_shuffle($str_result), 0, $length_of_string);
}

function getRowById($table, $column, $id)
{
	$ci = &get_instance();
	$get = $ci->db->get_where($table, array($column => $id));
	if ($get->num_rows() > 0) {
		return $get->result_array();
	} else {
		return false;
	}
}

function getSingleRowById($table, $where)
{
	$ci = &get_instance();
	$get = $ci->db->select()
		->from($table)
		->where($where)
		->get();
	if ($get->num_rows() > 0) {
		return $get->row_array();
	} else {
		return false;
	}
}

function getAllRow($table)
{
	$ci = &get_instance();
	$get = $ci->db->select()
		->from($table)
		->get();
	if ($get->num_rows() > 0) {
		return $get->result_array();
	} else {
		return false;
	}
}

function updateRowById($table, $column, $id, $data)
{
	$ci = &get_instance();
	$clean = $ci->security->xss_clean($data);
	$query = $ci->db->where($column, $id)
		->update($table, $clean);
	return $ci->db->affected_rows();
}

function deleteRowById($table, $column, $id)
{
	$ci = &get_instance();
	$ci->db->where($column, $id);
	$ci->db->delete($table);
	if ($ci->db->affected_rows() > 0) {
		return true;
	} else {
		return $ci->db->error();
	}
}

function deleteRowMoreId($table, $where)
{
	$ci = &get_instance();
	$ci->db->where($where);
	$ci->db->delete($table);
	if ($ci->db->affected_rows() > 0) {
		return true;
	} else {
		return $ci->db->error();
	}
}

function getAllRowInOrder($table, $column, $type)
{
	$ci = &get_instance();
	$select = $ci->db->order_by($column, $type)->get($table);
	if ($select->num_rows() > 0) {
		return $select->result_array();
	} else {
		return false;
	}
}

function getRowsByMoreIdWithOrder($table, $where, $column, $type)
{
	$ci = &get_instance();
	$select = $ci->db->order_by($column, $type)->get_where($table, $where);
	if ($select->num_rows() > 0) {
		return $select->result_array();
	} else {
		return false;
	}
}

function getDataByIdInOrder($table, $column, $id, $orderColumn, $type)
{
	$ci = &get_instance();
	$select = $ci->db->order_by($orderColumn, $type)->get_where($table, array($column => $id));
	return $select->result_array();
}

function getAllDataWithLimitInOrder($table, $orderColumn, $type, $start, $end)
{
	$ci = &get_instance();
	$select = $ci->db->order_by($orderColumn, $type)->limit($start, $end)->get($table);
	return $select->result_array();
}
function getDataByIdInOrderLimit($table, $column, $id, $orderColumn, $type, $start, $end)
{
	$ci = &get_instance();
	$select = $ci->db->order_by($orderColumn, $type)->limit($start, $end)->get_where($table, array($column => $id));
	return $select->result_array();
}

function getRowByMoreId($table, $where)
{
	$ci = &get_instance();
	$get = $ci->db->select()
		->from($table)
		->where($where)
		->get();
	if ($get->num_rows() > 0) {
		return $get->result_array();
	} else {
		return false;
	}
}

function getNumRows($table, $where)
{
	$ci = &get_instance();
	$get = $ci->db->select()
		->from($table)
		->where($where)
		->get();
	return $get->num_rows();
}

function getRowByLikeInOrder($table, $where, $like, $name, $orderBy, $orderType)
{
	$ci = &get_instance();
	$get = $ci->db->select()
		->from($table)
		->where($where)
		->like($like, $name, 'both')
		->order_by($orderBy, $orderType)
		->get();
	if ($get->num_rows() > 0) {
		return $get->result_array();
	} else {
		return false;
	}
}

function encryptId($id)
{
	$ci = &get_instance();
	$key = $ci->encrypt->encode($id);
	return $key;
}

function decryptId($key)
{
	$ci = &get_instance();
	$id = $ci->encrypt->decode($key);
	return $id;
}

function lastReplace($search, $replace, $subject)
{
	$pos = strrpos($subject, $search);
	if ($pos !== false) {
		$subject = substr_replace($subject, $replace, $pos, strlen($search));
	}
	return $subject;
}

function flashData($var, $message)
{
	$ci = &get_instance();
	return $ci->session->set_flashdata($var, $message);
}

function sendOTP($contact_no, $message_content)
{
	$user = "ekaumotp794454";
	$password = "6337";
	$senderid = "EKAUMB";
	$url = "https://kit19.com/ComposeSMS.aspx?";
	$url .= 'username=' . $user;
	$url .= '&password=' . $password;
	$url .= '&sender=' . $senderid;
	$url .= '&to=' . urlencode($contact_no);
	$url .= '&message=' . urlencode($message_content);
	$url .= '&priority=1';
	$url .= '&dnd=1';
	$url .= '&unicode=0';
	// 	$url = "http://mysmsshop.in/V2/http-api.php?apikey=aYR5fktJhboWNydD&senderid=UDHYME&number=$contact_no&message=" . urlencode($message_content) . "&format=json";
	$res = curl_init();
	curl_setopt($res, CURLOPT_URL, $url);
	curl_setopt($res, CURLOPT_RETURNTRANSFER, true);
	$result1 = curl_exec($res);
}

function SMSSend($phone, $msg, $template, $debug = false)
{
	global $user, $password, $senderid, $smsurl;

	$url = 'http://smpp.webtechsolution.co/http-tokenkeyapi.php?authentic-key=363556454449434f534f54503532311654428803&senderid=VDICOS&route=4&number=' . urlencode($phone) . '&message=' . urlencode($msg) . '&templateid=' . $template;
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	// Open the URL to send the message
	// 	$response = httpRequest($urltouse);
	// echo $url;
	$response = curl_exec($ch);
	curl_close($ch);
	if ($debug) {
		$rc = "Response: <br><pre>" .
			str_replace(array("<", ">"), array("&lt;", "&gt;"), $response) .
			"</pre><br>";
	}

	return ($response);
	// echo $response;
}


function getUserId($token)
{
	$ci = &get_instance();
	$ip = $ci->input->ip_address();
	$get = $ci->db->select()
		->from('user_registration')
		->where("user_registration.user_id = '" . $token['data']->id . "' AND user_status = '1' AND unique_hash = '" . $token['data']->unique_hash . "'")
		->get();
	if ($get->num_rows() > 0) {
		return $token['data']->id;
	} else {
		return false;
	}
}


function orderIdGenerateUser()
{
	$number = 'VED' . date('ydmhis');
	if (checkOrderIdExistUser($number)) {
		orderIdGenerateUser();
	}
	return $number;
}

function checkOrderIdExistUser($number)
{
	$ci = &get_instance();
	$get = $ci->db->select()
		->from('affiliate_links')
		->where("affiliate_var = '$number'")
		->get();
	if ($get->num_rows() > 0) {
		return true;
	} else {
		return false;
	}
}


function imageUpload($imageName, $path)
{
	$ci = &get_instance();
	$config['file_name'] = date('dm') . round(microtime(true) * 1000);
	$config['allowed_types'] = 'jpg|png|jpeg|webp';
	$config['upload_path'] = $path;
	$target_path = $path;
	$config['remove_spaces'] = true;
	$config['overwrite'] = false;
	$ci->load->library('upload', $config);
	$ci->upload->initialize($config);
	if ($ci->upload->do_upload($imageName)) {
		$data = array('upload_data' => $ci->upload->data());
		$path = $data['upload_data']['full_path'];
		$picture = $data['upload_data']['file_name'];
		$configi['image_library'] = 'gd2';
		$config['quality'] = '100%';
		$config['create_thumb'] = FALSE;
		$configi['source_image'] = $path;
		$configi['new_image'] = $target_path;
		$configi['maintain_ratio'] = TRUE;
		// 		$configi['width'] = 380;
		// 		$configi['height'] = 260;
		$ci->load->library('image_lib');
		$ci->image_lib->initialize($configi);
		$ci->image_lib->resize();
		return $picture;
	} else {
		return false;
	}
}

function imageUploadWithRatio($imageName, $path, $width, $height)
{
	$ci = &get_instance();
	$config['file_name'] = date('dm') . round(microtime(true) * 1000);
	$config['allowed_types'] = 'jpg|png|jpeg';
	$config['upload_path'] = $path;
	$target_path = $path;
	$config['remove_spaces'] = true;
	$config['overwrite'] = false;
	$ci->load->library('upload', $config);
	$ci->upload->initialize($config);
	if ($ci->upload->do_upload($imageName)) {
		$data = array('upload_data' => $ci->upload->data());
		$path = $data['upload_data']['full_path'];
		$picture = $data['upload_data']['file_name'];
		$configi['image_library'] = 'gd2';
		$config['quality'] = '100%';
		$config['create_thumb'] = FALSE;
		$configi['source_image'] = $path;
		$configi['new_image'] = $target_path;
		$configi['maintain_ratio'] = TRUE;
		$configi['width'] = $width;
		$configi['height'] = $height;
		$ci->load->library('image_lib');
		$ci->image_lib->initialize($configi);
		$ci->image_lib->resize();
		return $picture;
	} else {
		return false;
	}
}

function fullImage($imageName, $path)
{
	$ci = &get_instance();
	$config['file_name'] = date('dm') . round(microtime(true) * 1000);
	$config['allowed_types'] = 'jpg|png|jpeg';
	$config['upload_path'] = $path;
	$target_path = $path;
	$config['remove_spaces'] = true;
	$config['overwrite'] = false;
	$ci->load->library('upload', $config);
	$ci->upload->initialize($config);
	if ($ci->upload->do_upload($imageName)) {
		$data = array('upload_data' => $ci->upload->data());
		$path = $data['upload_data']['full_path'];
		$picture = $data['upload_data']['file_name'];
		$configi['image_library'] = 'gd2';
		$config['quality'] = '100%';
		$config['create_thumb'] = FALSE;
		$configi['source_image'] = $path;
		$configi['new_image'] = $target_path;
		$configi['maintain_ratio'] = TRUE;
		$ci->load->library('image_lib');
		$ci->image_lib->initialize($configi);
		$ci->image_lib->resize();
		return $picture;
	} else {
		return false;
	}
}

function sendNotificationUser($device_id, $title, $message)
{
	$url = 'https://fcm.googleapis.com/fcm/send';

	define('API_KEY', 'AAAA0k59dxI:APA91bGS22p4m1y4OUeTSAjMQv4YcKQjVaBNjgTiuScqtE_S2b813j-Nq_slYfD9zcGFFwsDMUxf17TPKp5L94MFhvvlbz8tITzKPNFzVHy9Hupm89pZevttM8U4EGWCBBwUHidjzybE');

	$data = array("to" => $device_id, "notification" => array("title" => $title, "body" => $message));
	$data_string = json_encode($data);
	$headers = array('Authorization: key=' . API_KEY, 'Content-Type: application/json');
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
	$results = curl_exec($ch);
	curl_close($ch);
	return $results;
}

function sendEmail($base_url, $host, $username, $password, $fromName, $sendToEmail, $subject, $mail_body)
{

	// base_url = "http://bmcpmaybooking.com/"; 
	// host = 'mail.bmcpmaybooking.com'; 
	// username = 'bookingverification@bmcpmaybooking.com';  
	// password = "j(*0d%z@OKLR";
	// require 'php/class/class.phpmailer.php';
	// $base_url = $base_url;
	// $mail = new PHPMailer;
	// $mail->IsSMTP();
	// $mail->Host = $host;
	// $mail->Port = '587';
	// $mail->SMTPAuth = true;
	// $mail->Username = $username;
	// $mail->Password = $password;
	// $mail->SMTPSecure = '';
	// $mail->From = $username;
	// $mail->FromName = $fromName;
	// $mail->AddAddress($sendToEmail);
	// $mail->WordWrap = 50;
	// $mail->IsHTML(true);
	// $mail->Subject = $subject;
	// $mail->Body = $mail_body;
	// if ($mail->Send()) {
	// 	return true;
	// } else {
	// 	return false;
	// }
}

function generateToken()
{
	$data = getSingleRowById('shiprocket_token', "`datestamp` > now() - interval 24 hour");
	if (!empty($data)) {

		return $data['token'];
	} else {
		$curl = curl_init();
		curl_setopt_array($curl, array(
			CURLOPT_URL => "https://apiv2.shiprocket.in/v1/external/auth/login",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "POST",
			CURLOPT_POSTFIELDS => json_encode(array('email' => 'developerhm@outlook.com', 'password' => 'Owner@123#')),
			CURLOPT_HTTPHEADER => array(
				"Content-Type: application/json"
			),
		));

		$result1 = curl_exec($curl);
		curl_close($curl);
		$result1_out = json_decode($result1);
		$data = insertRow('shiprocket_token', array('token' => $result1_out->{'token'}));
		return $result1_out->{'token'};
	}
}

function createOrder($order_id, $order_date, $billing_customer_name, $billing_address, $billing_city, $billing_pincode, $billing_state, $billing_country, $billing_email, $billing_phone, $payment_method, $sub_total, $length, $breadth, $height, $weight, $product, $token)
{
	$pickup_location = "House No -748-p, sector 18, Distt-Re";

	$data = array(
		"order_id" => $order_id,
		"order_date" => $order_date,
		"pickup_location" => $pickup_location,
		"channel_id" => "",
		"comment" => "",
		"reseller_name" => "",
		"company_name" => "",
		"billing_customer_name" => $billing_customer_name,
		"billing_last_name" => "",
		"billing_address" => $billing_address,
		"billing_address_2" => "",
		"billing_isd_code" => "",
		"billing_city" => $billing_city,
		"billing_pincode" => $billing_pincode,
		"billing_state" => $billing_state,
		"billing_country" => $billing_country,
		"billing_email" => $billing_email,
		"billing_phone" => $billing_phone,
		"billing_alternate_phone" => "",
		"shipping_is_billing" => true,
		"shipping_customer_name" => $billing_customer_name,
		"shipping_last_name" => "",
		"shipping_address" => $billing_address,
		"shipping_address_2" => "",
		"shipping_city" => "",
		"shipping_pincode" => "",
		"shipping_country" => "",
		"shipping_state" => "",
		"shipping_email" => "",
		"shipping_phone" => "",
		"order_items" => $product,
		"payment_method" => "Prepaid",
		"shipping_charges" => "",
		"giftwrap_charges" => "",
		"transaction_charges" => "",
		"total_discount" => "",
		"sub_total" => $sub_total,
		"length" => $length,
		"breadth" => $breadth,
		"height" => $height,
		"weight" => $weight,
		"ewaybill_no" => "",
		"customer_gstin" => "",
		"invoice_number" => "",
		"order_type" => "",
	);
	// print_r( json_encode($data));
	$curl = curl_init();
	curl_setopt_array($curl, array(
		CURLOPT_URL => "https://apiv2.shiprocket.in/v1/external/orders/create/adhoc",
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => "",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 0,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => "POST",
		CURLOPT_POSTFIELDS => json_encode($data),
		CURLOPT_HTTPHEADER => array(
			"Content-Type: application/json",
			"Authorization: Bearer " . $token
		),
	));

	$result1 = curl_exec($curl);
	curl_close($curl);

	return $result1;
}
function generateAwb_ship($shipment_id, $courier_id, $token)
{
	$data = array(
		"shipment_id" => $shipment_id,
		"courier_id" => $courier_id
	);
	print_R($data);
	$curl = curl_init();
	curl_setopt_array($curl, array(
		CURLOPT_URL => "https://apiv2.shiprocket.in/v1/external/courier/assign/awb",
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => "",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 0,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_CUSTOMREQUEST => "POST",
		CURLOPT_POSTFIELDS => json_encode($data),
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_HTTPHEADER => array(
			"Content-Type: application/json",
			"Authorization: Bearer " . $token
		),
	));
	$result1 = curl_exec($curl);
	curl_close($curl);
	return $result1;
}

function generateAwb($shipment_id, $courier_id, $token, $is_return = 0)
{
	$data = array(
		"shipment_id" => $shipment_id,
		"courier_id" => $courier_id,
		"is_return" => $is_return
	);
	print_R($data);
	$curl = curl_init();
	curl_setopt_array($curl, array(
		CURLOPT_URL => "https://apiv2.shiprocket.in/v1/external/courier/assign/awb",
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => "",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 0,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_CUSTOMREQUEST => "POST",
		CURLOPT_POSTFIELDS => json_encode($data),
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_HTTPHEADER => array(
			"Content-Type: application/json",
			"Authorization: Bearer " . $token
		),
	));
	$result1 = curl_exec($curl);
	curl_close($curl);
	return $result1;
}

function shipping_charges($pickup_postcode, $delivery_postcode, $weight, $cod, $token, $is_return = 0)
{
	$data = array(
		"pickup_postcode" => $pickup_postcode,
		"delivery_postcode" => $delivery_postcode,
		"weight" => $weight,
		"cod" => $cod,
		"is_return" => $is_return
	);
	$curl = curl_init();
	$query = http_build_query($data);
	curl_setopt_array($curl, array(
		CURLOPT_URL => "https://apiv2.shiprocket.in/v1/external/courier/serviceability?$query",
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => "",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 0,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_CUSTOMREQUEST => "GET",
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_HTTPHEADER => array(
			"Content-Type: application/json",
			"Authorization: Bearer " . $token
		),
	));
	$result1 = curl_exec($curl);
	curl_close($curl);
	return $result1;
}

function shipping_charges_checkout($pickup_postcode, $delivery_postcode, $weight, $cod, $token)
{
	$data = array(
		"pickup_postcode" => $pickup_postcode,
		"delivery_postcode" => $delivery_postcode,
		"weight" => $weight,
		"cod" => $cod
	);
	$curl = curl_init();
	$query = http_build_query($data);
	curl_setopt_array($curl, array(
		CURLOPT_URL => "https://apiv2.shiprocket.in/v1/external/courier/serviceability?$query",
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => "",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 0,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_CUSTOMREQUEST => "GET",
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_HTTPHEADER => array(
			"Content-Type: application/json",
			"Authorization: Bearer " . $token
		),
	));
	$result1 = curl_exec($curl);
	curl_close($curl);
	return $result1;
}

function cancelorder($order_id, $token)
{

	$curl = curl_init();
	curl_setopt_array($curl, array(
		CURLOPT_URL => "https://apiv2.shiprocket.in/v1/external/orders/cancel",
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => "",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 0,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_CUSTOMREQUEST => "POST",
		CURLOPT_POSTFIELDS => json_encode(array("ids" => array($order_id))),
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_HTTPHEADER => array(
			"Content-Type: application/json",
			"Authorization: Bearer " . $token
		),
	));
	$result1 = curl_exec($curl);
	curl_close($curl);
	return $result1;
}

function cancelshipment($awbs, $token)
{

	$curl = curl_init();
	curl_setopt_array($curl, array(
		CURLOPT_URL => "https://apiv2.shiprocket.in/v1/external/orders/cancel/shipment/awbs",
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => "",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 0,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_CUSTOMREQUEST => "POST",
		CURLOPT_POSTFIELDS => json_encode(array("awbs" => array($awbs))),
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_HTTPHEADER => array(
			"Content-Type: application/json",
			"Authorization: Bearer " . $token
		),
	));
	$result1 = curl_exec($curl);
	curl_close($curl);
	return $result1;
}

function returnOrder($order_id, $order_date, $channel_id, $pickup_customer_name, $pickup_address, $pickup_city, $pickup_state, $pickup_pincode, $pickup_email, $pickup_phone, $sub_total, $length, $breadth, $height, $weight, $product, $token)
{
	$pickup_location = "House No -748-p, sector 18, Distt-Rewari, Haryana";
	$data = array(
		"order_id" => $order_id,
		"order_date" => $order_date,
		"channel_id" => $channel_id,
		"pickup_customer_name" => $pickup_customer_name,
		"pickup_last_name" => "",
		"company_name" => "Vedicos",
		"pickup_address" => $pickup_address,
		"pickup_address_2" => "",
		"pickup_city" => $pickup_city,
		"pickup_state" => $pickup_state,
		"pickup_country" => "India",
		"pickup_pincode" => $pickup_pincode,
		"pickup_email" => $pickup_email,
		"pickup_phone" => $pickup_phone,
		"pickup_isd_code" => "91",
		"shipping_customer_name" => "Vedicos",
		"shipping_last_name" => "",
		"shipping_address" => $pickup_location,
		"shipping_address_2" => "",
		"shipping_city" => "Rewari",
		"shipping_country" => "India",
		"shipping_pincode" => 123401,
		"shipping_state" => "Haryana",
		"shipping_email" => "vedicos.in@gmail.com",
		"shipping_isd_code" => "91",
		"shipping_phone" => 9812347716,
		"order_items" => $product,
		"payment_method" => "PREPAID",
		"total_discount" => "0",
		"sub_total" => $sub_total,
		"length" => $length,
		"breadth" => $breadth,
		"height" => $height,
		"weight" => $weight
	);
	print_r(json_encode($data));
	$curl = curl_init();
	curl_setopt_array($curl, array(
		CURLOPT_URL => "https://apiv2.shiprocket.in/v1/external/orders/create/return",
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => "",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 0,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => "POST",
		CURLOPT_POSTFIELDS => json_encode($data),
		CURLOPT_HTTPHEADER => array(
			"Content-Type: application/json",
			"Authorization: Bearer " . $token
		),
	));

	$result1 = curl_exec($curl);
	curl_close($curl);
	return $result1;
}
