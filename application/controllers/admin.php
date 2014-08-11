<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Admin extends CI_Controller {

	public function index(){
	
		$this -> order();
	}
	
	public function order(){
	
		$this->load->helper('url');
	
		if(isset($_SESSION["login"]) && $_SESSION["login"]=="yes"){

			$this->load->model('Dish_model','', TRUE);
			
			$order_limit = $this -> Dish_model -> get_daily_order_limit();
			
			$data["order_limit"] = $order_limit;

			$data["main"] = "order";
			
			$orders = $this -> Dish_model -> get_orders();
			
			$data["order"] = $orders;	
			
			$this -> load -> view('admin/header',$data);
			
			$this -> load -> view('admin/order',$data);
			
			$this -> load -> view('admin/footer',$data);
		}
		else{
		
			$data["main"] = "order";
		
			$this -> load -> view('admin/header',$data);
		
			$this -> load -> view('admin/login',$data);
			
			$this -> load -> view('admin/footer',$data);
		}
		
	}
	
	public function dishes(){
	
		$this->load->helper('url');
		if(isset($_SESSION["login"]) && $_SESSION["login"]=="yes"){

			$this->load->model('Dish_model','', TRUE);
		
			$data["main"] = "dishes";
			
			$arrDishes = $this -> Dish_model -> get_admin_dishes();
			
			$data["dishes"] = $arrDishes;
		
			$this -> load -> view('admin/header',$data);
			
			$this -> load -> view('admin/dishes',$data);
			
			$this -> load -> view('admin/footer',$data);
		}
		else{

			$data["main"] = "dishes";
			
			$this -> load -> view('admin/header',$data);
		
			$this -> load -> view('admin/login',$data);
			
			$this -> load -> view('admin/footer',$data);
		}
	}
	
	public function add_dish(){
	
		$this->load->helper('url');
	
		$this -> load -> view('admin/dish_add_form');
	}
	
	public function create_dish(){
	
		//Array ( [id] => [chinese_name] => [name] => [description] => [price] => [start_date] => [end_date] => )
		$this->load->model('Dish_model','', TRUE);
		$this -> Dish_model -> insert_dish($_POST);
		
		$this -> dishes();
	}
	
	public function delete_dish(){
	
		$id = $_POST["id"];
		
		$this->load->model('Dish_model','', TRUE);
		$this -> Dish_model -> delete_dish($id);
		
		$this -> dishes();
	}
	
	public function edit_dish(){
	
		$this->load->model('Dish_model','', TRUE);
		$this->load->helper('url');
		$id = $_POST["id"];
		$arrDishes = $this -> Dish_model -> get_admin_dish($id);

		if(count($arrDishes)>0){
		
			$data["dish"] = $arrDishes[0];
		
			$this -> load -> view('admin/dish_form',$data);
		}
		else{
		
			echo "System Error";
		}
	}
	
	public function update_limit(){
		$this->load->model('Dish_model','', TRUE);

		$value = $_POST["value"];
		$this -> Dish_model -> update_limit_value($value);
		
		echo "<p style=\"color:green\">Limit has been updated to ".$value."</p>";
	}
	
	
	
	public function update_dish(){
		
		// Array
		// (
			// [id] => 1
			// [chinese_name] => 小鸡炖蘑菇
			// [name] => chicken and mushroom
			// [description] => 
			// [price] => 10
			// [active] => yes
			// [start_date] => 
			// [end_date] => 
		// )
		
		$id = $_POST["id"];
		
		$start_date = $_POST["start_date"];
		$start_datetime = $start_date." 10:00:00";
		$start = date("Y-m-d H:i:s", strtotime($start_datetime));
		$end_date = $_POST["end_date"];
		$end_datetime = $end_date." 10:00:00";
		$end = date("Y-m-d H:i:s", strtotime($end_datetime));
		
		
		$arr = array(
			"chinese_name" => $_POST["chinese_name"],
			"name" => $_POST["name"],
			"description" => $_POST["description"],
			"price" => $_POST["price"],
			"active" => $_POST["active"],
			"available_ordertime_start" => $start,
			"available_ordertime_end" => $end
		);
		
		$this->load->model('Dish_model','', TRUE);
		
		$this -> Dish_model -> update_dish($id,$arr);
		
		$this -> dishes();
	}
	
	public function upload_file(){
	
		///C:\xampp\htdocs\ci\application\views\admin
		$this->load->helper('url');
		
		$path=dirname(__FILE__)."/../../assets/uploads/";
		
		$new_name = "";
		
		if ($_FILES["file-0"]["error"] > 0) {
			//echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
		} else {
			//echo "Upload: " . $_FILES["file"]["name"] . "<br>";
			//echo "Type: " . $_FILES["file"]["type"] . "<br>";
			//echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
			//echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";
			$new_name = rand(0,10000).time().$_FILES["file-0"]["name"];
			if (file_exists($path . $new_name)) {
			 // echo $new_name . " already exists. ";
			} else {
			   move_uploaded_file($_FILES["file-0"]["tmp_name"],
			  $path.$new_name);
			  // echo "Stored in: " . "upload/" . $new_name;
			}
		}
		
		//print_r($_POST);
		
		$newpath ="/uploads/".$new_name;
		
		$id = isset($_GET["id"])?$_GET["id"]:0;
		
		$this->load->model('Dish_model','', TRUE);
		
		echo $id."===".$newpath."<br/>";
		
		$this -> Dish_model -> update_dish_image($id,$newpath);
		
		echo "<img src=\"".base_url()."assets".$newpath."?id=".rand(0,1000)."\" width=\"300px\" height=\"150px\"/>";
	}
	
	public function password(){
	
		$this->load->helper('url');
	
		$page = isset($_GET["page"])?$_GET["page"]:'';
	
		if(isset($_SESSION["login"])){
		
			if($_SESSION["login"] != "yes"){
			
				if($_POST["pwd"] = "123456"){
				
					$_SESSION["login"]="yes";
					redirect(site_url('admin/'.$page));
				}
				else{

					$_SESSION["login"]="no";
				}
			}
			else{
			
				redirect(site_url('admin/'.$page));
			}

		}
		else{
			if($_POST["pwd"] = "123456"){
				
				$_SESSION["login"]="yes";
				redirect(site_url('admin/'.$page));
			}
			else{

				$_SESSION["login"]="no";
			}
		}
	}			
}