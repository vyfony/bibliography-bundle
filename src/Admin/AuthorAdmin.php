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

namespace Vyfony\Bundle\BibliographyBundle\Admin;

use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Vyfony\Bundle\BibliographyBundle\Admin\Abstraction\AbstractEntityAdmin;

final class AuthorAdmin extends AbstractEntityAdmin
{
    /**
     * @var string
     */
    protected $baseRouteName = 'bibliography_author';

    /**
     * @var string
     */
    protected $baseRoutePattern = 'bibliography/author';

    protected function configureListFields(ListMapper $listMapper): void
    {
        $listMapper
            ->addIdentifier('fullName', null, $this->createLabeledFormOptions('fullName'))
        ;
    }

    protected function configureFormFields(FormMapper $formMapper): void
    {
        $formMapper
            ->with('form.author.section.data.label')
                ->add('fullName', null, $this->createLabeledFormOptions('fullName'))
            ->end()
        ;
    }
}
