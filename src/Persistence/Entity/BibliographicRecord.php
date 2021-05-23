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
 * @ORM\Table(name="bibliography__bibliographic_record")
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
     * @ORM\Column(name="title", type="text", length=65535)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="displayed_value", type="text", length=65535)
     */
    private $displayedValue;

    /**
     * @var int
     *
     * @ORM\Column(name="year", type="integer")
     */
    private $year;

    /**
     * @var Collection|Author[]
     *
     * @ORM\ManyToMany(
     *     targetEntity="Vyfony\Bundle\BibliographyBundle\Persistence\Entity\Author",
     *     cascade={"persist"},
     *     inversedBy="bibliographicRecords"
     * )
     * @ORM\JoinTable(name="bibliography__bibliographic_record_author")
     */
    private $authors;

    public function __construct()
    {
        $this->authors = new ArrayCollection();
    }

    public function __toString(): string
    {
        return (string) $this->shortName;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setShortName(string $shortName): self
    {
        $this->shortName = $shortName;

        return $this;
    }

    public function getShortName(): ?string
    {
        return $this->shortName;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setDisplayedValue(string $displayedValue): self
    {
        $this->displayedValue = $displayedValue;

        return $this;
    }

    public function getDisplayedValue(): ?string
    {
        return $this->displayedValue;
    }

    public function setYear(int $year): self
    {
        $this->year = $year;

        return $this;
    }

    public function getYear(): ?int
    {
        return $this->year;
    }

    /**
     * @return Collection|Author[]
     */
    public function getAuthors(): Collection
    {
        return $this->authors;
    }

    /**
     * @param Collection|Author[] $authors
     */
    public function setAuthors(Collection $authors): self
    {
        $this->authors = $authors;

        return $this;
    }
}
