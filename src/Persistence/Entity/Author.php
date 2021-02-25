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
     * @var Collection|BibliographicRecord[]
     *
     * @ORM\ManyToMany(
     *     targetEntity="Vyfony\Bundle\BibliographyBundle\Persistence\Entity\BibliographicRecord",
     *     cascade={"persist"},
     *     mappedBy="authorships"
     * )
     */
    private $bibliographicRecords;

    public function __construct()
    {
        $this->bibliographicRecords = new ArrayCollection();
    }

    public function __toString(): string
    {
        return (string) $this->fullName;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setFullName(string $fullName): self
    {
        $this->fullName = $fullName;

        return $this;
    }

    public function getFullName(): ?string
    {
        return $this->fullName;
    }

    /**
     * @return Collection|BibliographicRecord[]
     */
    public function getBibliographicRecords(): Collection
    {
        return $this->bibliographicRecords;
    }

    /**
     * @param Collection|BibliographicRecord[] $bibliographicRecords
     */
    public function setBibliographicRecords(Collection $bibliographicRecords): self
    {
        $this->bibliographicRecords = $bibliographicRecords;

        return $this;
    }
}
