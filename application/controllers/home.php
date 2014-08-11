<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
	public function index()
	{
		$this -> init();
	}
	
	public function init(){
		$this->load->model('Dish_model','', TRUE);

		$dishes = $this->Dish_model->get_all_dishes();
		
		$today_dish = $this -> Dish_model -> get_today_dish();
		
		$data["main_content"] = "home";
		
		$data["dishes"] = $dishes;
		
		$data["today_dish"] = $today_dish;
		
		$this->load->helper('url');
		
		$this -> load -> view('template',$data);
	}
	
	public function menu(){
	
		$this->load->model('Dish_model','', TRUE);
		
		$data["main_content"] = "menu";
		
		$this->load->helper('url');

		$arr = array();
		
		if(isset($_SESSION['orders'])){
			
			$arr = $_SESSION['orders'];
		}

		$dishes = $this->Dish_model->get_today_dish();
		
		if(count($dishes)>0){
		
			foreach($dishes as $key => $dish){

				$dish->full = $this ->Dish_model-> is_order_full($dish->id);
				
				$dishes[$key] = $dish;
			}
		}
		
		$data["dishes"] = $dishes;
		
		$data["orders"] = $arr;

		$this -> load -> view('template',$data);
	}
	
	public function ajax_order_food(){
		
		$arr = array();
		
		if(isset($_SESSION["orders"])){
			
			$arr = $_SESSION["orders"];
		}
		
		if(is_array($arr)){
		
			if(array_key_exists($_POST["data_id"],$arr)){
			
				$new_arr = $arr[$_POST["data_id"]];
				
				$new_arr["count"] = $new_arr["count"]+1;
				
				$arr[$_POST["data_id"]] = $new_arr;
			}
			else{
			
				//print_r($_POST);
			
				$arr[$_POST["data_id"]] = array("name"=>$_POST["data_name"],"chinese_name"=>$_POST["data_chinese_name"],"image"=>$_POST["data_image"],"price"=>$_POST["data_price"],"count" => 1);
			}
		}
		
		$data["orders"] = $arr;
		
		$_SESSION["orders"] = $arr;
		
		$this->load->helper('url');
		
		$this -> load -> view('order_table',$data);
	}
	
	public function delete_order(){
	
		$arr = array();
		
		if(isset($_SESSION["orders"])){
			
			$arr = $_SESSION["orders"];
		}
		
		if(is_array($arr)){
		
			if(array_key_exists($_POST["data_id"],$arr)){

				unset($arr[$_POST["data_id"]]);
				var_dump($arr);
			}
		}
		
		if(isset($_SESSION["orders"])){
			
			$_SESSION["orders"] = $arr;
		}
		
		$data["orders"] = $arr;
		
		$_SESSION["orders"] = $arr;
		
		$this->load->helper('url');
	
		$this -> load -> view('order_table',$data);
	}
	
	public function book_food(){
	
		$this->load->model('Dish_model','', TRUE);
		
		$arrOrderId = isset($_POST["orderid"])?$_POST["orderid"]:'';
		$arrOrderNumber = isset($_POST["ordernumber"])?$_POST["ordernumber"]:'';
		$emailInput = isset($_POST["emailinput"])?$_POST["emailinput"]:'';
		$nameInput = isset($_POST["nameinput"])?$_POST["nameinput"]:'';
		$addressInput = isset($_POST["addressinput"])?$_POST["addressinput"]:'';
		$extraInput = isset($_POST["extrainput"])?$_POST["extrainput"]:'';
		
		if($arrOrderId != "" && $arrOrderNumber!="" && $emailInput!="" && $nameInput!="" && $addressInput!=""){
		
			$this->Dish_model->save_order($_POST);
		
			echo "<p style=\"color:green\">Your enquire has been successfully sent</p>";
		}
		else{

		}
	}
	
	public function order(){
	
		$data["main_content"] = "order";
		$this->load->helper('url');
		$this -> load -> view('template',$data);
	}
}