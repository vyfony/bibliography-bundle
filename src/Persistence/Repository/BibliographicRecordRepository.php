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

namespace Vyfony\Bundle\BibliographyBundle\Persistence\Repository;

use Doctrine\ORM\EntityRepository;
use Vyfony\Bundle\BibliographyBundle\Persistence\Entity\BibliographicRecord;

/**
 * @author Anton Dyshkant <vyshkant@gmail.com>
 *
 * @method BibliographicRecord|null find(int $id, int $lockMode = null, int $lockVersion = null)
 * @method BibliographicRecord|null findOneBy(array $criteria, array $orderBy = null)
 * @method BibliographicRecord[]    findAll()
 * @method BibliographicRecord[]    findBy(array $criteria, array $orderBy = null, int $limit = null,int $offset = null)
 * @method BibliographicRecord|null findOneByName(string $name)
 * @method BibliographicRecord      findOneByNameOrCreate(string $name)
 */
final class BibliographicRecordRepository extends EntityRepository
{
}
