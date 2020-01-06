<?php

declare(strict_types=1);

/*
 * This file is part of VyfonyBibliographyBundle project.
 *
 * (c) Anton Dyshkant <vyshkant@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Vyfony\Bundle\BibliographyBundle\Persistence\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @author Anton Dyshkant <vyshkant@gmail.com>
 *
 * @ORM\Table(name="bibliography__author")
 * @ORM\Entity
 */
class Author
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
     * @ORM\Column(name="full_name", type="string", length=255, unique=true)
     */
    private $fullName;

    /**
     * @var Collection|Authorship[]
     *
     * @ORM\OneToMany(
     *     targetEntity="Vyfony\Bundle\BibliographyBundle\Persistence\Entity\Authorship",
     *     cascade={"persist"},
     *     mappedBy="author",
     *     orphanRemoval=false
     * )
     */
    private $authorships;

    public function __construct()
    {
        $this->authorships = new ArrayCollection();
    }

    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return Author
     */
    public function setFullName(string $fullName): self
    {
        $this->fullName = $fullName;

        return $this;
    }

    public function getFullName(): string
    {
        return $this->fullName;
    }

    /**
     * @return Collection|Authorship[]
     */
    public function getAuthorships(): Collection
    {
        return $this->authorships;
    }

    /**
     * @param Collection|Authorship[] $authorships
     */
    public function setAuthorships(Collection $authorships): self
    {
        $this->authorships = new ArrayCollection();

        foreach ($authorships as $authorship) {
            $this->addAuthorship($authorship);
        }

        return $this;
    }

    public function addAuthorship(Authorship $authorship): self
    {
        $authorship->setAuthor($this);

        $this->authorships[] = $authorship;

        return $this;
    }
}
