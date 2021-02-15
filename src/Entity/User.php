<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Table(name="PARTICIPANTS")
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository", repositoryClass=UserRepository::class)
 */
class User implements UserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @Assert\NotBlank(message="Merci de remplir ce champ")
     * @ORM\Column (type="string", length=30)
     */
    private $pseudo;

    /**
     * @Assert\NotBlank(message="Merci de remplir ce champ")
     * @ORM\Column (type="string", length=30)
     */
    private $nom;

    /**
     * @Assert\NotBlank(message="Merci de remplir ce champ")
     * @ORM\Column (type="string", length=30)
     */
    private $prenom;


    /**
     * @ORM\Column (type="integer", length=15)
     */
    private $telephone;

    /**
     * @ORM\Column (type="string", length=255)
     */
    private $email;

    /**
     * @Assert\Length(min="8", minMessage="Votre mot de passe doit contenir au moins 8 caractères")
     * @ORM\Column (type="string", length=255)
     */
    private $password;

    /**
     * @ORM\Column (type="integer", nullable=true)
     */
    private $administrateur;

    /**
     * @ORM\Column (type="integer", nullable=true)
     */
    private $actif;

    /**
     * @ORM\Column (type="integer", length=11, nullable=true)
     */
    private $campus_no_campus;

    //pas sauvegardé en base
    private $roles;

    /**
     * @return mixed
     */
    public function getRoles()
    {
        return ["ROLE_USER"];
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getPseudo()
    {
        return $this->pseudo;
    }

    /**
     * @param mixed $pseudo
     */
    public function setPseudo($pseudo): void
    {
        $this->pseudo = $pseudo;
    }

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom): void
    {
        $this->nom = $nom;
    }

    /**
     * @return mixed
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * @param mixed $telephone
     */
    public function setTelephone($telephone): void
    {
        $this->telephone = $telephone;
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
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password): void
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getAdministrateur()
    {
        return $this->administrateur;
    }

    /**
     * @param mixed $administrateur
     */
    public function setAdministrateur($administrateur): void
    {
        $this->administrateur = $administrateur;
    }

    /**
     * @return mixed
     */
    public function getActif()
    {
        return $this->actif;
    }

    /**
     * @param mixed $actif
     */
    public function setActif($actif): void
    {
        $this->actif = $actif;
    }

    /**
     * @return mixed
     */
    public function getCampusNoCampus()
    {
        return $this->campus_no_campus;
    }

    /**
     * @param mixed $campus_no_campus
     */
    public function setCampusNoCampus($campus_no_campus): void
    {
        $this->campus_no_campus = $campus_no_campus;
    }

    /**
     * @return mixed
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @param mixed $prenom
     */
    public function setPrenom($prenom): void
    {
        $this->prenom = $prenom;
    }



    //inutile pour nous
    public function getSalt() {return null;}
    //inutile pour nous
    public function eraseCredentials(){}

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->pseudo;
    }
}
