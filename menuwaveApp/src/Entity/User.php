<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
class User implements UserInterface
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, unique=true)
     */
    private $username;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $password;

    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\UserInfo", mappedBy="user", cascade={"persist", "remove"})
     */
    private $info;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Rating", mappedBy="author", cascade={"persist"})
     */
    private $ratings;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Places", mappedBy="user", cascade={"persist"})
     */
    private $places;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Request", mappedBy="user", cascade={"persist"})
     */
    private $requests;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Vote", mappedBy="user", orphanRemoval=true)
     */
    private $votesForRatings;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Pictures", mappedBy="user", orphanRemoval=true, cascade={"persist"})
     */
    private $pictures;

    public function __construct()
    {
        $this->ratings = new ArrayCollection();
        $this->places = new ArrayCollection();
        $this->requests = new ArrayCollection();
        $this->votesForRatings = new ArrayCollection();
        $this->pictures = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $Password): self
    {
        $this->password = $Password;

        return $this;
    }

    public function getRoles(): ?array
    {
        return array_unique(array_merge(['ROLE_USER'], $this->roles));
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * Returns the salt that was originally used to encode the password.
     *
     * This can return null if the password was not encoded using a salt.
     *
     * @return string|null The salt
     */
    public function getSalt()
    {
        // TODO: Implement getSalt() method.
    }

    /**
     * Removes sensitive data from the user.
     *
     * This is important if, at any given point, sensitive information like
     * the plain-text password is stored on this object.
     */
    public function eraseCredentials()
    {
        // TODO: Implement eraseCredentials() method.
    }

    public function getInfo(): ?UserInfo
    {
        return $this->info;
    }

    public function setInfo(UserInfo $info): self
    {
        $this->info = $info;

        // set the owning side of the relation if necessary
        if ($this !== $info->getUser()) {
            $info->setUser($this);
        }

        return $this;
    }

    /**
     * @return Collection|Rating[]
     */
    public function getRatings(): Collection
    {
        return $this->ratings;
    }

    public function addRating(Rating $rating): self
    {
        if (!$this->ratings->contains($rating)) {
            $this->ratings[] = $rating;
            $rating->setAuthor($this);
        }

        return $this;
    }

    public function removeRating(Rating $rating): self
    {
        if ($this->ratings->contains($rating)) {
            $this->ratings->removeElement($rating);
            // set the owning side to null (unless already changed)
            if ($rating->getAuthor() === $this) {
                $rating->setAuthor(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Places[]
     */
    public function getPlaces(): Collection
    {
        return $this->places;
    }

    public function addPlace(Places $place): self
    {
        if (!$this->places->contains($place)) {
            $this->places[] = $place;
            $place->setUser($this);
        }

        return $this;
    }

    public function removePlace(Places $place): self
    {
        if ($this->places->contains($place)) {
            $this->places->removeElement($place);
            // set the owning side to null (unless already changed)
            if ($place->getUser() === $this) {
                $place->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Request[]
     */
    public function getRequests(): Collection
    {
        return $this->requests;
    }

    public function addRequest(Request $request): self
    {
        if (!$this->requests->contains($request)) {
            $this->requests[] = $request;
            $request->setUser($this);
        }

        return $this;
    }

    public function removeRequest(Request $request): self
    {
        if ($this->requests->contains($request)) {
            $this->requests->removeElement($request);
            // set the owning side to null (unless already changed)
            if ($request->getUser() === $this) {
                $request->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Vote[]
     */
    public function getVotesForRatings(): Collection
    {
        return $this->votesForRatings;
    }

    public function addVotesForRating(Vote $votesForRating): self
    {
        if (!$this->votesForRatings->contains($votesForRating)) {
            $this->votesForRatings[] = $votesForRating;
            $votesForRating->setUser($this);
        }

        return $this;
    }

    public function removeVotesForRating(Vote $votesForRating): self
    {
        if ($this->votesForRatings->contains($votesForRating)) {
            $this->votesForRatings->removeElement($votesForRating);
            // set the owning side to null (unless already changed)
            if ($votesForRating->getUser() === $this) {
                $votesForRating->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Pictures[]
     */
    public function getPictures(): Collection
    {
        return $this->pictures;
    }

    public function addPicture(Pictures $picture): self
    {
        if (!$this->pictures->contains($picture)) {
            $this->pictures[] = $picture;
            $picture->setUser($this);
        }

        return $this;
    }

    public function removePicture(Pictures $picture): self
    {
        if ($this->pictures->contains($picture)) {
            $this->pictures->removeElement($picture);
            // set the owning side to null (unless already changed)
            if ($picture->getUser() === $this) {
                $picture->setUser(null);
            }
        }

        return $this;
    }
}
