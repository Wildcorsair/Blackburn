<?php
namespace Debra\Core;

class QueryBuilder
{
    private $query;

    public function where(Array $conditions)
    {
        try {
            if (empty($conditions) && !is_array($conditions)) {
                throw new Exception("Conditions are empty.", 100);
            }

            $this->query = "SELECT * FROM `{$this->tableName}` WHERE ";

            for ($i = 0; $i < count($conditions); $i++) {
                if ($i == count($conditions) - 1) {
                    $this->query .= $conditions[$i];
                } else {
                    $this->query .= $conditions[$i] . ' AND ';
                }
            }

            return $this;

        } catch (\Exception $e) {
            echo '<strong>Error:</strong> ' . $e->getMessage();
        }
    }
}
