<?php

namespace App\Entity;

use App\Repository\CarsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CarsRepository::class)]
class Cars
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $name;

    #[ORM\Column(type: 'string', length: 6)]
    private $nb_kilometers;

    #[ORM\Column(type: 'string', length: 10)]
    private $circulation_date;

    #[ORM\Column(type: 'string', length: 6)]
    private $kilometers;

    #[ORM\Column(type: 'string', length: 20)]
    private $color;

    #[ORM\Column(type: 'integer')]
    private $number_doors;

    #[ORM\Column(type: 'float')]
    private $price;

    #[ORM\Column(type: 'integer')]
    private $critair;

    #[ORM\Column(type: 'string', length: 20)]
    private $carburant;

    #[ORM\Column(type: 'string', length: 15)]
    private $gearbox_type;

    #[ORM\ManyToOne(targetEntity: Categories::class, inversedBy: 'cars')]
    #[ORM\JoinColumn(nullable: false)]
    private $categories;

    #[ORM\OneToMany(mappedBy: 'cars', targetEntity: Images::class, orphanRemoval: true)]
    private $images;

    #[ORM\Column(type: 'datetime_immutable', options:['default' => 'CURRENT_TIMESTAMP'])]
    private $created_at;

    #[ORM\OneToMany(mappedBy: 'cars', targetEntity: OrderDetails::class)]
    private $orderDetails;

    public function __construct()
    {
        $this->images = new ArrayCollection();
        $this->orderDetails = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getNbKilometers(): ?string
    {
        return $this->nb_kilometers;
    }

    public function setNbKilometers(string $nb_kilometers): self
    {
        $this->nb_kilometers = $nb_kilometers;

        return $this;
    }

    public function getCirculationDate(): ?string
    {
        return $this->circulation_date;
    }

    public function setCirculationDate(string $circulation_date): self
    {
        $this->circulation_date = $circulation_date;

        return $this;
    }

    public function getKilometers(): ?string
    {
        return $this->kilometers;
    }

    public function setKilometers(string $kilometers): self
    {
        $this->kilometers = $kilometers;

        return $this;
    }

    public function getColor(): ?string
    {
        return $this->color;
    }

    public function setColor(string $color): self
    {
        $this->color = $color;

        return $this;
    }

    public function getNumberDoors(): ?int
    {
        return $this->number_doors;
    }

    public function setNumberDoors(int $number_doors): self
    {
        $this->number_doors = $number_doors;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getCritair(): ?int
    {
        return $this->critair;
    }

    public function setCritair(int $critair): self
    {
        $this->critair = $critair;

        return $this;
    }

    public function getCarburant(): ?string
    {
        return $this->carburant;
    }

    public function setCarburant(string $carburant): self
    {
        $this->carburant = $carburant;

        return $this;
    }

    public function getGearboxType(): ?string
    {
        return $this->gearbox_type;
    }

    public function setGearboxType(string $gearbox_type): self
    {
        $this->gearbox_type = $gearbox_type;

        return $this;
    }

    public function getCategories(): ?Categories
    {
        return $this->categories;
    }

    public function setCategories(?Categories $categories): self
    {
        $this->categories = $categories;

        return $this;
    }

    /**
     * @return Collection<int, Images>
     */
    public function getImages(): Collection
    {
        return $this->images;
    }

    public function addImage(Images $image): self
    {
        if (!$this->images->contains($image)) {
            $this->images[] = $image;
            $image->setCars($this);
        }

        return $this;
    }

    public function removeImage(Images $image): self
    {
        if ($this->images->removeElement($image)) {
            // set the owning side to null (unless already changed)
            if ($image->getCars() === $this) {
                $image->setCars(null);
            }
        }

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeImmutable $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }

    /**
     * @return Collection<int, OrderDetails>
     */
    public function getOrderDetails(): Collection
    {
        return $this->orderDetails;
    }

    public function addOrderDetail(OrderDetails $orderDetail): self
    {
        if (!$this->orderDetails->contains($orderDetail)) {
            $this->orderDetails[] = $orderDetail;
            $orderDetail->setCars($this);
        }

        return $this;
    }

    public function removeOrderDetail(OrderDetails $orderDetail): self
    {
        if ($this->orderDetails->removeElement($orderDetail)) {
            // set the owning side to null (unless already changed)
            if ($orderDetail->getCars() === $this) {
                $orderDetail->setCars(null);
            }
        }

        return $this;
    }
}
