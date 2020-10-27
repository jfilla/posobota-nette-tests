<?php declare(strict_types = 1);

namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class Item
{

	public const ID_A = 'a';

	public const ID_B = 'b';

	/**
	 * @ORM\Column(type="string", nullable=false)
	 * @ORM\Id
	 */
	private string $id;

	/**
	 * @ORM\Column(type="decimal", precision=12, scale=2)
	 */
	private string $price;

	public function getId(): string
	{
		return $this->id;
	}

	/**
	 * @return static
	 */
	public function setId(string $id)
	{
		$this->id = $id;
		return $this;
	}

	public function getPrice(): string
	{
		return $this->price;
	}

	/**
	 * @return static
	 */
	public function setPrice(string $price)
	{
		$this->price = $price;
		return $this;
	}

}
