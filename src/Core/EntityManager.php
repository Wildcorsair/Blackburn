<?php
namespace Debra\Core;

use Debra\Core\Database;

/**
* Database connection class
*/
class EntityManager
{
	protected $dbh;
	protected $class;
	protected $tableName;
	private $query;

	public function __construct()
	{
		$database = new Database();
		$this->dbh = $database->connect();
	}

	public function setModel($class)
	{
		if (!empty($class)) {
		    $this->class = $class;
			$this->tableName = $class::getTableName();
		}
		return $this;
	}

	public function getQuery()
	{
		return $this->query;
	}

	public function all()
	{
		$dataset = [];

		try {
			if (!empty($this->class)) {
				$stmt = $this->dbh->prepare("SELECT * FROM `{$this->tableName}`");
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
			}
		} catch (\Exception $e) {
			echo 'Error: ' . $e->getMessage();
		}

	}

    public function find($id)
    {
		try {
			if (is_numeric($id)) {
				if (!empty($this->class)) {
					$dataset = [];

					$stmt = $this->dbh->prepare("SELECT * FROM `{$this->tableName}` WHERE `id` = :id LIMIT 0, 1");
					$stmt->execute(array('id' => $id));

					$row = $stmt->fetch(\PDO::FETCH_ASSOC);
					$obj = new $this->class;
					$props = $obj->getProperties();

					foreach ($props as $property) {
						if (isset($row[$property])) {
							$setter = 'set' . ucfirst($property);
							$obj->$setter($row[$property]);
						}
					}

					return $obj;

				} else {
					throw new Exception("Empty Model name.", 1);
				}
			} else {
				throw new Exception("ID must be an INTEGER type.", 1);
			}
		} catch (\Exception $e) {
			echo '<strong>Error:</strong> ' . $e->getMessage();
		}
    }

	public function where(Array $conditions)
	{
		try {
			if (empty($conditions) && !is_array($conditions)) {
				throw new Exception("Conditions are empty.", 100);
			}

			if (!empty($this->class)) {
				$this->query = "SELECT * FROM `{$this->tableName}` WHERE ";

				for ($i = 0; $i < count($conditions); $i++) {
					if ($i == count($conditions) - 1) {
						$this->query .= $conditions[$i];
					} else {
						$this->query .= $conditions[$i] . ' AND ';
					}
				}

				return $this;

			} else {
				throw new Exception("Empty Model name.", 1);
			}
		} catch (\Exception $e) {
			echo '<strong>Error:</strong> ' . $e->getMessage();
		}
	}

	public function orWhere($conditions)
	{
		$this->query .= ' OR ';
		for ($i = 0; $i < count($conditions); $i++) {
			if ($i == count($conditions) - 1) {
				$this->query .= $conditions[$i];
			} else {
				$this->query .= $conditions[$i] . ' AND ';
			}
		}

		return $this;
	}

	public function setParams($params)
	{
		if (!empty($params) && is_array($params)) {
			$this->params = $params;
		}
		return $this;
	}

	public function get()
	{
		$dataset = [];
		$stmt = $this->dbh->prepare($this->query);
		$stmt->execute($this->params);

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
	}

	public function persist($model)
	{
		// TODO: persist model object to database
		var_dump($model);
	}
}
