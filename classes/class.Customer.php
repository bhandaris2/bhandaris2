<?php
class customer{
	public $customerId;
	public $name;
	public $database;
	
	function __construct($customerId, $database){
		$sql = file_get_contents('sql/getCustomer.sql');
		$params = array(
		'customerid' => $customerId
		);
		$statement = $database->prepare($sql);
		$statement-> execute($params);
		$customer= $statement-> fetchAll(PDO::FETCH_ASSOC);
		
		$this->customerId = $customerId;
		$this->database= $database;
		$this->name = $customer[0]['name'];
	}
}
	?>
	
	