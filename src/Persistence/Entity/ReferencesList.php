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
 * @ORM\Table(name="bibliography__references_list")
 * @ORM\Entity
 */
class ReferencesList
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
     * @ORM\Column(name="name", type="string", length=255, unique=true)
     */
    private $name;

    /**
     * @var string|null
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;

    /**
     * @var Collection|ReferencesListItem[]
     *
     * @ORM\OneToMany(
     *     targetEntity="Vyfony\Bundle\BibliographyBundle\Persistence\Entity\ReferencesListItem",
     *     cascade={"persist"},
     *     mappedBy="referencesList",
     *     orphanRemoval=true
     * )
     * @ORM\OrderBy({"position": "ASC"})
     */
    private $items;

    public function __construct()
    {
        $this->items = new ArrayCollection();
    }

    public function __toString(): string
    {
        return (string) $this->name;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param Collection|ReferencesListItem[] $items
     */
    public function setItems(Collection $items): self
    {
        $this->items = new ArrayCollection();

        foreach ($items as $item) {
            $this->addItem($item);
        }

        return $this;
    }

    /**
     * @return Collection|ReferencesListItem[]
     */
    public function getItems(): Collection
    {
        return $this->items;
    }

    public function addItem(ReferencesListItem $item): void
    {
        $item->setReferencesList($this);

        $this->items[] = $item;
    }
}
