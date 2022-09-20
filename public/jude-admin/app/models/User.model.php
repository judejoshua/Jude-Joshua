<?php

class User extends Db
{
	public function getAuth()
    {
        try {
            $query = "SELECT `auth_code` FROM `auth`";
            $stmt = $this->connect()->prepare($query);
            $stmt->execute([]);
            $data = $stmt->fetchAll();
            return $data;
        } catch(PDOException $e){
            return "error=Failed! <br>" . $e->getMessage();
        }
    }

}