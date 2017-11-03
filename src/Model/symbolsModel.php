<?php

namespace ASCII\Model;


use ASCII\Manager\Manager;
use PDO;

class symbolsModel 
{
	
	public function create(
			string $symbolsName,
			string $symbolsValue)
	{
		if (!$symbolsName || !$symbolsValue) {
			return;
		}
		try {
			$sth = Manager::getPDO()->prepare(
					"INSERT INTO `symbols`"
					. "(`symbols_name`, `symbols_value`) "
					. "VALUES (:symbols_name,:symbols_value)"
					);
			$sth->bindValue(":symbols_name", $symbolsName);
			$sth->bindValue(":symbols_value", $symbolsValue);
			$sth->execute();
			$this->success = $symbolsName . " Has Been Created";
		} catch (\Throwable $e) {
			$this->error = $e->getMessage();
		}
	}
	
	public function selectAll ()
	{
		try {
			$sth = Manager::getPDO()->prepare(
					"SELECT `symbols_name`, `symbols_value` FROM `symbols`"
					);
			$sth->execute();
			$this->results = $sth->fetchAll(PDO::FETCH_OBJ);
		} catch (\Throwable $e) {
			$this->error = $e->getMessage();
		}
	}
	
	public function remove (
			string $symbolsValue)
	{
		if (!$symbolsValue) {
			return;
		}
		try {
			$sth = Manager::getPDO()->prepare(
					"DELETE FROM `symbols` WHERE `symbols_value` = :symbols_value"
					);
			$sth->bindValue(":symbols_value", $symbolsValue);
			$sth->execute();
			$this->success = $symbolsValue . " Has Been Removed";
		} catch (\Throwable $e) {
			$this->error = $e->getMessage();
		}
	}
}