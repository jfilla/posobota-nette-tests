<?php declare(strict_types = 1);

namespace App\Entities;

use DateTime;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class Order
{

	/**
	 * @ORM\Column(type="integer", nullable=false)
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="IDENTITY")
	 */
	protected ?int $id = null;

	/**
	 * @ORM\Column(type="datetime", nullable=false)
	 */
	private DateTime $date;

	/**
	 * @ORM\Column(type="integer")
	 */
	private int $quantity;

	/**
	 * @ORM\ManyToOne(targetEntity="Item")
	 * @ORM\JoinColumns({
	 *   @ORM\JoinColumn(referencedColumnName="id", nullable=false)
	 * })
	 */
	private Item $item;

	public function getId(): ?int
	{
		return $this->id;
	}

	/**
	 * @return static
	 */
	public function setId(?int $id)
	{
		$this->id = $id;
		return $this;
	}

	public function getDate(): DateTime
	{
		return $this->date;
	}

	/**
	 * @return static
	 */
	public function setDate(DateTime $date)
	{
		$this->date = $date;
		return $this;
	}

	public function getQuantity(): int
	{
		return $this->quantity;
	}

	/**
	 * @return static
	 */
	public function setQuantity(int $quantity)
	{
		$this->quantity = $quantity;
		return $this;
	}

	public function getItem(): Item
	{
		return $this->item;
	}

	/**
	 * @return static
	 */
	public function setItem(Item $item)
	{
		$this->item = $item;
		return $this;
	}

}
