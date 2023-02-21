<?php

namespace App\Entity;

use App\Form\ProviderType;
use App\Repository\ProviderRepository;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProviderRepository::class)]
class Provider
{

    // Campo ID
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    // Campo name
    #[ORM\Column(type: 'string')]
    #[Assert\NotBlank(message: "El campo del nombre es obligatorio")]
    #[Assert\Length(min: 4, max: 250, minMessage: "Ingresa un nombre mayor de 4 caracteres", maxMessage: "Ingresa un nombre menor de 250 caracteres")]
    private $name;

    // Campo email
    #[ORM\Column(type: 'string')]
    #[Assert\NotBlank(message: "El campo del correo no es valido")]
    #[Assert\Length(min: 4, max: 250, minMessage: "Ingresa un correo mayor de 4 caracteres", maxMessage: "Ingresa un correo menor de 250 caracteres")]
    #[Assert\Email]
    private $email;

    //Campo tipo del proveedor
    #[ORM\ManyToOne(targetEntity: "Type")]
    #[ORM\JoinColumn(name: "type_id", referencedColumnName: "id")]
    private $type;

    // Campo activo
    #[ORM\Column(type: 'boolean')]
    private $active;

    // Campo fecha creado
    #[ORM\Column(type: 'date')]
    private $date_created;

    # Campo fecha actualizada
    #[ORM\Column(type: 'date')]
    private $date_updated;

    # Campo telefono
    #[ORM\Column(type: 'string')]
    #[Assert\NotBlank(message: "El campo del telefono no es valido")]
    #[Assert\Length(min: 7, max: 15, minMessage: "Ingresa un numero de telefono mayor de 7 caracteres", maxMessage: "Ingresa un numero de telefono menor de 15 caracterest")]
    private $tel;

    public function __construct($name = null, $email = null, $type = null, $active = null, $date_created  = null, $date_updated = null, $tel = null)
    {

    }

    public function getId(): ?int
    {
        return $this->id;
    }
    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email): void
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type): void
    {
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * @param mixed $active
     */
    public function setActive($active): void
    {
        $this->active = $active;
    }

    /**
     * @return mixed
     */
    public function getDateCreated():?\DateTime
    {
        return $this->date_created;
    }

    /**
     * @param mixed $date_created
     */
    public function setDateCreated($date_created): void
    {
        $this->date_created = $date_created;
    }

    /**
     * @return mixed
     */
    public function getDateUpdated():?\DateTime
    {
        return $this->date_updated;
    }

    /**
     * @param mixed $date_updated
     */
    public function setDateUpdated($date_updated): void
    {
        $this->date_updated = $date_updated;
    }

    /**
     * @return mixed
     */
    public function getTel()
    {
        return $this->tel;
    }

    /**
     * @param mixed $tel
     */
    public function setTel($tel): void
    {
        $this->tel = $tel;
    }


}