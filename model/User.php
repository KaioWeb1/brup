<?php 


namespace model;
use dao\Crud;

/**
* 
*/
class User extends Crud
{
	private $id;
	private $name;
	private $email;
	protected $table = 'users';

	public function getId()
	{
		return $this->id;
	}

	public function getName()
	{
		return $this->name;
	}

	public function getEmail()
	{
		return $this->email;
	}
	
	public function setName($name)
	{
		$this->name = $name;
	}

	public function setEmail($email)
	{
		$this->email = $email;
	}

	public function insert()
	{
		$sql = "INSERT INTO $this->table (name, email) VALUES (:name, :email)";
		$stmt = \dao\Dao::prepare($sql);
		$stmt->bindParam(':name', $this->name);
		$stmt->bindParam(':email', $this->email);
		return $stmt->execute();
	}
	public function update($id)
	{
		$sql = "UPDATE $this->table SET name = :name, email = :email WHERE id = :id";
		$stmt = \dao\Dao::prepare($sql);
		$stmt->bindParam(':name', $this->name);
		$stmt->bindParam(':email', $this->email);
		$stmt->bindParam(':id', $id);
		return $stmt->execute();
	}

	
}



 ?>