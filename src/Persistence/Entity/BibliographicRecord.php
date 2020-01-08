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
 * @ORM\Table(name="bibliography__record")
 * @ORM\Entity
 */
class BibliographicRecord
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
     * @ORM\Column(name="short_name", type="string", length=255, unique=true)
     */
    private $shortName;

    /**
     * @var string
     *
     * @ORM\Column(name="authors", type="string", length=255, nullable=true)
     */
    private $authors;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="text", length=65535)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="details", type="text", length=65535)
     */
    private $details;

    /**
     * @var int
     *
     * @ORM\Column(name="year", type="integer")
     */
    private $year;

    /**
     * @var Collection|Authorship[]
     *
     * @ORM\OneToMany(
     *     targetEntity="Vyfony\Bundle\BibliographyBundle\Persistence\Entity\Authorship",
     *     cascade={"persist"},
     *     mappedBy="bibliographicRecord",
     *     orphanRemoval=true
     * )
     * @ORM\OrderBy({"position": "ASC"})
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
     * @return BibliographicRecord
     */
    public function setShortName(string $shortName): self
    {
        $this->shortName = $shortName;

        return $this;
    }

    public function getShortName(): string
    {
        return $this->shortName;
    }

    /**
     * @return BibliographicRecord
     */
    public function setAuthors(string $authors): self
    {
        $this->authors = $authors;

        return $this;
    }

    public function getAuthors(): string
    {
        return $this->authors;
    }

    /**
     * @return BibliographicRecord
     */
    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return BibliographicRecord
     */
    public function setDetails(string $details): self
    {
        $this->details = $details;

        return $this;
    }

    public function getDetails(): string
    {
        return $this->details;
    }

    /**
     * @return BibliographicRecord
     */
    public function setYear(int $year): self
    {
        $this->year = $year;

        return $this;
    }

    public function getYear(): int
    {
        return $this->year;
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
        $authorship->setBibliographicRecord($this);

        $this->authorships[] = $authorship;

        return $this;
    }
}
