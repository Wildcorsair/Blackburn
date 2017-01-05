<?php

namespace Lango\Core;

/**
* Database connection class
*/
class EntityManagerV2
{
	protected $dbh;
    protected $class;
    private $host = 'localhost';
    private $dbname = 'margo';
    private $dbuser = 'root';
    private $dbpass = 'k13JU357@';

	public function __construct()
	{
        try {
            $dsn = "mysql:host={$this->host};dbname={$this->dbname}";
            $this->dbh = new \PDO($dsn, $this->dbuser, $this->dbpass);
        } catch (\PDOException $e) {
            echo 'PDO database connection error: ' . $e->getMessage();
        }
	}

	public function setModel($class)
    {
        if (!empty($class)) {
            $this->class = $class;
        }
        return $this;
    }

	public function findAll()
    {
        $dataset = [];

        if (!empty($this->class)) {
            $stmt = $this->dbh->prepare('SELECT * FROM `users`');
            $stmt->execute();

            while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
                $obj = new $this->class;
                $props = $obj->getProperties();

                foreach ($props as $property) {
                    if (isset($row[$property])) {
                        $setter = 'set' . ucfirst($property);
                        $obj->$setter($row[$property]);
                    }
                }

                $dataset[] = $obj;
            }
            return $dataset;
        } else {
            echo 'Empty Model name.';
        }
    }

    /*public function findById($id)
    {
        if (is_numeric($id)) {
            if (!empty($this->class)) {
                $stmt = $this->dbh->prepare('SELECT * FROM `users` WHERE `id` = :id LIMIT 0, 1');
                $stmt->execute(array('id' => $id));
                $row = $stmt->fetchObject($this->class);
                return $row;
            } else {
                echo 'Empty Model name.';
            }
        } else {
            echo 'ID must be an INTEGER type.';
        }
    }*/
}
