<?php 
class Dish_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }
	
	function get_all_dishes($active="true"){
	
		$this -> db -> where("active","true");
	
		$query = $this->db->get('dish');
		
		return $query->result();
	}
	
	function get_today_dish(){
	
		$date = date('Y-m-d H:i:s');
	
		$this -> db -> where("available_ordertime_start <",$date);
		
		$this -> db -> where("available_ordertime_end >",$date);
	
		$query = $this->db->get('dish');
		
		return $query->result();

	}
	
	function save_order($arr){
	
		$arrOrderId = $arr["orderid"];
		$arrOrderNumber = $arr["ordernumber"];
		$emailInput = $arr["emailinput"];
		$nameInput = $arr["nameinput"];
		$teleInput = $arr["phoneinput"];
		$addressInput = $arr["addressinput"];
		$extraInput = $arr["extrainput"];
		$curDate = date('Y-m-d h:i:s a', time());//0000-00-00 00:00:00.00
		
		$data = array(
		   'email' => $emailInput ,
		   'telephone' => $teleInput ,
		   'name' => $nameInput,
		   'address' => $addressInput,
		   'extra' => $extraInput,
		   'datetime' => $curDate
		);
		
		$this->db->insert('order', $data);
		
		$id = $this->db->insert_id();
		
		foreach($arrOrderId as $key => $value){
		
			$count = $arrOrderNumber[$key];
	
			for($i =0;$i<$count;$i++){
			
				$data_order = array("dish_id" => $value,"order_id" => $id);
			
				$this->db->insert('dish_order', $data_order);
			}
		}
	}
	
	function update_dish_image($id,$newpath){
	
		$this->db->where('id', $id);
		$this->db->update('dish', array("image"=>$newpath)); 
	}
	
	function update_dish($id,$arr){
	
		$this->db->where('id', $id);
		$this->db->update('dish', $arr);
	}
	
	function insert_dish($arr){
	
		$start_date = $arr["start_date"];
		$start_datetime = $start_date." 10:00:00";
		$start = date("Y-m-d H:i:s", strtotime($start_datetime));
		$end_date = $arr["end_date"];
		$end_datetime = $end_date." 10:00:00";
		$end = date("Y-m-d H:i:s", strtotime($end_datetime));
		
		
		$arr = array(
			"chinese_name" => $arr["chinese_name"],
			"name" => $arr["name"],
			"description" => $arr["description"],
			"price" => $arr["price"],
			"active" => $arr["active"],
			"available_ordertime_start" => $start,
			"available_ordertime_end" => $end
		);
	
		$this->db->insert('dish', $arr); 
	}
	
	function delete_dish($id){
	
		$this->db->delete('dish', array('id' => $id)); 
	}
	
	function get_admin_dish($id){
	
		$query = $this->db->get_where('dish', array('id' => $id));
		
		return $query -> result();
	}
	
	function get_admin_dishes(){
	
		$query = $this->db->get('dish');
		
		return $query->result();
	}
	
	function get_orders(){
	
		$sql = "SELECT o.id as id,o.email as email,telephone,o.name as name,extra,address,d.id as dish_id,d.name as dish_name,chinese_name,datetime FROM takeway.order o INNER JOIN dish_order do ON o.id=do.order_id INNER JOIN dish d ON d.id=do.dish_id order by datetime DESC";
		
		$query = $this->db->query($sql);
		
		$arr = array();
		
		foreach($query -> result() as $row){
		
			if(!array_key_exists($row->id,$arr)){

				$arr[$row->id] = array(
					"id" =>  $row -> id,
					"email" => $row -> email,
					"telephone" => $row -> telephone,
					"name" => $row -> name,
					"extra" => $row -> extra,	 
					"address" => $row -> address,
					"datetime" => $row -> datetime,
					"dish" => array(
						array(
						"dish_id" =>  $row -> dish_id,
						"dish_name" => $row -> dish_name,
						"chinese_name" => $row -> chinese_name
						)
					)
				);
			}
			else{
				
				$arrDish = $arr[$row->id]["dish"];
				$arrDish[] = array(
						"dish_id" =>  $row -> dish_id,
						"dish_name" => $row -> dish_name,
						"chinese_name" => $row -> chinese_name
				);
				$arr[$row->id]["dish"] = $arrDish;
				
			}
		}
		
		return $arr;
	}	
}