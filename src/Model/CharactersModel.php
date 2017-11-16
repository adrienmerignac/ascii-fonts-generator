<?php

namespace ASCII\Model;


use ASCII\Manager\Manager;
use PDO;

class CharactersModel 
{
	
	public function create(
			string $charactersName,
			string $charactersValue)
	{
		if (!$charactersName || !$charactersValue) {
			return;
		}
		try {
			$sth = Manager::getPDO()->prepare(
					"INSERT INTO `characters`"
					. "(`characters_unicode_name`, `characters_unicode_value`) "
					. "VALUES (:characters_unicode_name,:characters_unicode_value)"
					);
			$sth->bindValue(":characters_unicode_name", $charactersName);
			$sth->bindValue(":characters_unicode_value", $charactersValue);
			$sth->execute();
			$this->success = $charactersName . " Has Been Created";
		} catch (\Throwable $e) {
			$this->error = $e->getMessage();
		}
	}
	
	public function selectAll ()
	{
		try {
			$sth = Manager::getPDO()->prepare(
					"SELECT `characters_unicode_name`, `characters_unicode_value` FROM `characters`"
					);
			$sth->execute();
			$this->results = $sth->fetchAll(PDO::FETCH_OBJ);
		} catch (\Throwable $e) {
			$this->error = $e->getMessage();
		}
	}
	
	public function remove (
			string $charactersValue)
	{
		if (!$charactersValue) {
			return;
		}
		try {
			$sth = Manager::getPDO()->prepare(
					"DELETE FROM `characters` WHERE `characters_unicode_value` = :characters_unicode_value"
					);
			$sth->bindValue(":characters_unicode_value", $charactersValue);
			$sth->execute();
			$this->success = $charactersValue . " Has Been Removed";
			
		} catch (\Throwable $e) {
			$this->error = $e->getMessage();
		}
	}
}