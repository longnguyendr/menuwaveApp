<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\VoteRepository")
 */
class Vote
{
    /**
     * @ORM\Id()
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="votesForRatings")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\Id()
     * @ORM\ManyToOne(targetEntity="App\Entity\Rating", inversedBy="votes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $rating;

    /**
     * @ORM\Column(type="voteenum")
     */
    private $votePoint;

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getRating(): ?Rating
    {
        return $this->rating;
    }

    public function setRating(?Rating $rating): self
    {
        $this->rating = $rating;

        return $this;
    }

    public function getVotePoint()
    {
        return $this->votePoint;
    }

    public function setVotePoint($votePoint): self
    {
        $this->votePoint = $votePoint;

        return $this;
    }
}
