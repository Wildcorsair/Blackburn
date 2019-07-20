<?php
namespace Debra\Entity;

use Debra\Core\Model;

class Ip extends Model
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $ip_address;

    /**
     * @var string
     */
    protected $created_at;

    /**
     * @var string
     */
    protected $updated_at;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getIpAddress()
    {
        return $this->ip_address;
    }

    public function setIpAddress($ipAddress)
    {
        $this->ip_address = $ipAddress;
    }

    public function getCreatedAt()
    {
        return $this->created_at;
    }

    public function setCreatedAt($createdAt)
    {
        $this->created_at = $createdAt;
    }

    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    public function setUpdatedAt($updatedAt)
    {
        $this->updated_at = $updatedAt;
    }
}
