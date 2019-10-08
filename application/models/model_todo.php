<?php

class Model_Todo extends Model
{
	protected $valid;
	const STATUS = 1;
	
	public function __construct()
	{
		parent::__construct();

		$this->valid = new Validete();
	}

	public function paginatorData($count,int $from)
	{
		$data = []; //, `name` DESC
		$query = "SELECT * FROM `todos` ORDER BY `id` ";
		$limit = "LIMIT $count";
		
		if ( $from > 1)
		{
			$from = --$from*$count;
			$limit = "LIMIT $from, $count";
		}
		$query .= $limit;
		$result = $this->query($query, PDO::FETCH_ASSOC) ?? '';

		if($result)
		{
			foreach ($result as $row) {
				$data[] =[
					'id' 		=> $row['id'],
					'name' 		=> $row['name'],
					'text' 		=> $row['text'],
					'email'		=> $row['email'],
					'status'	=> $row['status'],
				];
			}
		}

		return $data;
	}
	
	public function insert()
	{
		$name 	= $_POST['name']; 
		$email 	= $_POST['email']; 
		$text 	= $_POST['description'];
		
		$name 	= $this->valid->validName($name); 
		$email 	= $this->valid->validEmail($email); 
		$text 	= $this->valid->validText($text); 
		
		$query = "INSERT INTO `todos`(`name`, `email`, `text`) VALUES ('$name', '$email', '$text')";
		$result = $this->query($query) ?? '';

		return $result;
	}

	public function getById()
	{
		$id = $_GET['id'];
		$id = $this->valid->validId($id);

		$query = "SELECT * FROM `todos` WHERE id=$id";
		$result = $this->query($query) ?? '';

		$row = $result->fetch();
		return $row;
	}

	public function update()
	{
		$id = $_GET['id'];
		$name 	= $_POST['name']; 
		$email 	= $_POST['email']; 
		$text 	= $_POST['description'];
		$status = static::STATUS;
		$updated_at = date('Y-m-d H:i:s');

		$id 	= $this->valid->validId($id);
		$name 	= $this->valid->validName($name); 
		$email 	= $this->valid->validEmail($email); 
		$text 	= $this->valid->validText($text); 
		
		$query = "UPDATE `todos` SET `name`='$name',`email`='$email',`text`='$text',`status`=$status,`updated_at`='$updated_at' WHERE id=$id";
		$result = $this->query($query) ?? '';

		return $result;
	}

	public function getCount($table)
	{
		$query = "SELECT COUNT( `id` ) as 'count' FROM $table WHERE 1";
		$result = $this->query($query) ?? '';
		$row = $result->fetch();

		return $row[0]; 
	}

	public function paginatorLinks($limit, $currentPage)
	{
		$total =  $this->getCount('todos');
		if ($total <= $limit) return false;

		$paginator = new Pagination($total, $currentPage, $limit, '?page=');

		return $paginator->links();
	}


	
}

class Validete
{
	public function validName($var)
	{
		// можно тут сколько угодно валидировать
		return trim($var);
	}
	
	public function validEmail($var)
	{
		// можно тут сколько угодно валидировать
		return trim($var);
	}
	public function validText($var)
	{
		// можно тут сколько угодно валидировать 
		return htmlspecialchars(trim($var));
	}

	public function validId($var)
	{
		// можно тут сколько угодно валидировать 
		return $var;
	}
	
}
