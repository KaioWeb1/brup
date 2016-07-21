<?php 
namespace dao;

use dao\Dao;

abstract class Crud extends Dao
{
	
	protected $table;

	abstract public function insert();
	abstract public function update($id);

	public function findAll()
	{
		$sql = "SELECT * FROM $this->table";
		$stmt = \dao\Dao::prepare($sql);
		$stmt->execute();
		return $stmt->fetchAll();
	}

	public function find($id)
	{
		$sql = "SELECT * FROM $this->table WHERE id = :id";
		$stmt = \dao\Dao::prepare($sql);
		$stmt->bindParam(':id', $id, \PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->fetch();
	}

	public function remove($id)
	{
		$sql = "DELETE FROM $this->table WHERE id = :id";
		$stmt = \dao\Dao::prepare($sql);
		$stmt->bindParam(':id', $id, \PDO::PARAM_INT);
		return $stmt->execute();
	}



}



 ?>