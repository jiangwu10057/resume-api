<?php

declare(strict_types=1);

namespace App\Domain\Resume\Entity;

class Share
{
  
  private $id;
  private $resume;

  /**
   * Get the value of id
   */
  public function getId()
  {
    return $this->id;
  }

  /**
   * Set the value of id
   *
   * @return  self
   */
  public function setId($id)
  {
    $this->id = $id;

    return $this;
  }

  /**
   * Get the value of resume
   */
  public function getResume()
  {
    return $this->resume;
  }

  /**
   * Set the value of resume
   *
   * @return  self
   */
  public function setResume($resume)
  {
    $this->resume = $resume;

    return $this;
  }
}