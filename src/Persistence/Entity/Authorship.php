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
 * @author Anton Dyshkant <vyshkant@gmail.com>
 *
 * @ORM\Table(
 *     name="bibliography__authorship",
 *     uniqueConstraints={
 *         @ORM\UniqueConstraint(columns={"bibliographic_record_id", "author_id"}),
 *         @ORM\UniqueConstraint(columns={"bibliographic_record_id", "position"})
 *     }
 * )
 * @ORM\Entity
 */
class Authorship
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
     * @var BibliographicRecord
     * @ORM\ManyToOne(
     *     targetEntity="BibliographicRecord",
     *     cascade={"persist"},
     *     inversedBy="authorships"
     * )
     * @ORM\JoinColumn(name="bibliographic_record_id", referencedColumnName="id", nullable=false)
     */
    private $bibliographicRecord;

    /**
     * @var Author
     *
     * @ORM\ManyToOne(
     *     targetEntity="Vyfony\Bundle\BibliographyBundle\Persistence\Entity\Author",
     *     cascade={"persist"},
     *     inversedBy="authorships"
     * )
     * @ORM\JoinColumn(name="author_id", referencedColumnName="id", nullable=false)
     */
    private $author;

    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return Authorship
     */
    public function setPosition(int $position): self
    {
        $this->position = $position;

        return $this;
    }

    public function getPosition(): int
    {
        return $this->position;
    }

    public function getBibliographicRecord(): BibliographicRecord
    {
        return $this->bibliographicRecord;
    }

    /**
     * @return Authorship
     */
    public function setBibliographicRecord(BibliographicRecord $bibliographicRecord): self
    {
        $this->bibliographicRecord = $bibliographicRecord;

        return $this;
    }

    /**
     * @return Authorship
     */
    public function setAuthor(Author $author): self
    {
        $this->author = $author;

        return $this;
    }

    public function getAuthor(): Author
    {
        return $this->author;
    }
}
