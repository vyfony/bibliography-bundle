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

namespace  Vyfony\Bundle\BibliographyBundle\Admin;

use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Form\Type\ModelListType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Vyfony\Bundle\BibliographyBundle\Admin\Abstraction\AbstractEntityAdmin;

final class ReferencesListItemAdmin extends AbstractEntityAdmin
{
    /**
     * @var string
     */
    protected $baseRouteName = 'bibliography_references_list_item';

    /**
     * @var string
     */
    protected $baseRoutePattern = 'bibliography/references-list/item';

    protected function configureFormFields(FormMapper $formMapper): void
    {
        $formMapper
            ->add(
                'bibliographicRecord',
                ModelListType::class,
                $this->createLabeledFormOptions('bibliographicRecord', ['required' => true])
            )
            ->add('position', HiddenType::class, $this->createLabeledFormOptions('position'))
        ;
    }
}
