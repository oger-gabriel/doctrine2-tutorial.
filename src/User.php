<?php
// src/User.php
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

#[ORM\Entity]
#[ORM\Table(name: "users")]
class User
{
    /** @var int */
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer")]
    private int|null $id = null;

    /** @var string */
    #[ORM\Column(type: "string")]
    private string $name;

    #[ORM\OneToMany(targetEntity: Bug::class, mappedBy: "reporter")]
    private $reportedBugs;

    #[ORM\OneToMany(targetEntity: Bug::class, mappedBy: "engineer")]
    private $assignedBugs;

    public function getId(): int|null
    {
        return $this->id;
    }
    public function getName(): string
    {
        return $this->name;
    }
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function __construct()
    {
        $this->reportedBugs = new ArrayCollection();
        $this->assignedBugs = new ArrayCollection();
    }

    public function addReportedBug(Bug $bug): void
    {
        $this->reportedBugs[] = $bug;
    }
    public function assignedToBug(Bug $bug): void
    {
        $this->assignedBugs[] = $bug;
    }

    private $products;

    public function assignToProduct(Product $product): void
    {
        $this->products[] = $product;
    }
    public function getProducts()
    {
        return $this->products;
    }
}
