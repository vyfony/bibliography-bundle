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

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(
 *     name="bibliography__references_list_item",
 *     uniqueConstraints={
 *         @ORM\UniqueConstraint(
 *             name="bibliographic_record_list_has_bibliographic_record",
 *             columns={"bibliographic_record_list_id", "bibliographic_record_id"}
 *         )
 *     }
 * )
 * @ORM\Entity
 */
class ReferencesListItem
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
     * @var int
     *
     * @ORM\Column(name="position", type="integer")
     */
    private $position;

    /**
     * @var ReferencesList
     *
     * @ORM\ManyToOne(
     *     targetEntity="Vyfony\Bundle\BibliographyBundle\Persistence\Entity\ReferencesList",
     *     cascade={"persist"},
     *     inversedBy="items"
     * )
     * @ORM\JoinColumn(name="bibliographic_record_list_id", referencedColumnName="id", nullable=false)
     */
    private $referencesList;

    /**
     * @var BibliographicRecord
     *
     * @ORM\ManyToOne(targetEntity="Vyfony\Bundle\BibliographyBundle\Persistence\Entity\BibliographicRecord", cascade={"persist"})
     * @ORM\JoinColumn(name="bibliographic_record_id", referencedColumnName="id", nullable=false)
     */
    private $bibliographicRecord;

    public function getId(): int
    {
        return $this->id;
    }

    public function setPosition(int $position): self
    {
        $this->position = $position;

        return $this;
    }

    public function getPosition(): ?int
    {
        return $this->position;
    }

    public function setReferencesList(ReferencesList $referencesList): self
    {
        $this->referencesList = $referencesList;

        return $this;
    }

    public function getReferencesList(): ReferencesList
    {
        return $this->referencesList;
    }

    public function setBibliographicRecord(BibliographicRecord $bibliographicRecord): self
    {
        $this->bibliographicRecord = $bibliographicRecord;

        return $this;
    }

    public function getBibliographicRecord(): ?BibliographicRecord
    {
        return $this->bibliographicRecord;
    }
}
