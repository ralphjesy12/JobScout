<?php

namespace AppBundle\Entity;

use Carbon\Carbon;
use Doctrine\ORM\Mapping as ORM;

/**
* Task
*
* @ORM\Table(name="task")
* @ORM\Entity(repositoryClass="AppBundle\Repository\TaskRepository")
*/
class Task
{
    /**
    * @var int
    *
    * @ORM\Column(name="id", type="integer")
    * @ORM\Id
    * @ORM\GeneratedValue(strategy="AUTO")
    */
    private $id;

    /**
    * @var string
    *
    * @ORM\Column(name="content", type="text")
    */
    private $content;

    /**
    * @var boolean
    *
    * @ORM\Column(name="done", type="boolean")
    */
    private $done;

    /**
    * @var \DateTime
    *
    * @ORM\Column(name="created_at", type="datetime")
    */
    private $createdAt;

    /**
    * @var \DateTime
    *
    * @ORM\Column(name="updated_at", type="datetime", nullable=true)
    */
    private $updatedAt;

    /**
    * @var int
    *
    * @ORM\Column(name="user_id", type="integer")
    */
    private $userId;


    /**
    * Get id
    *
    * @return int
    */
    public function getId()
    {
        return $this->id;
    }

    /**
    * Set content
    *
    * @param string $content
    *
    * @return Task
    */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
    * Get content
    *
    * @return string
    */
    public function getContent()
    {
        return $this->content;
    }

    /**
    * Set done
    *
    * @param string $done
    *
    * @return Task
    */
    public function setDone($done)
    {
        $this->done = $done;

        return $this;
    }
    /**
    * Set done
    *
    * @param string $done
    *
    * @return Task
    */
    public function toggleDone()
    {
        $this->done = !$this->done;

        return $this;
    }

    /**
    * Get done
    *
    * @return string
    */
    public function getDone()
    {
        return $this->done;
    }

    /**
    * Set createdAt
    *
    * @param \DateTime $createdAt
    *
    * @return Task
    */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = new \DateTime();

        return $this;
    }

    /**
    * Get createdAt
    *
    * @return \DateTime
    */
    public function getCreatedAt()
    {
        return Carbon::parse($this->createdAt->format('Y-m-d H:i:s'));
    }

    /**
    * Set updatedAt
    *
    * @param \DateTime $updatedAt
    *
    * @return Task
    */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = new \DateTime($updatedAt);

        return $this;
    }

    /**
    * Get updatedAt
    *
    * @return \DateTime
    */
    public function getUpdatedAt()
    {
        return Carbon::parse($this->updatedAt->format('Y-m-d H:i:s'));
    }

    /**
    * Set userId
    *
    * @param integer $userId
    *
    * @return Task
    */
    public function setUserId($userId)
    {
        $this->userId = $userId;

        return $this;
    }

    /**
    * Get userId
    *
    * @return int
    */
    public function getUserId()
    {
        return $this->userId;
    }
}
