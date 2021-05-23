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

use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Vyfony\Bundle\BibliographyBundle\Admin\Abstraction\AbstractEntityAdmin;

final class BibliographicRecordAdmin extends AbstractEntityAdmin
{
    /**
     * @var string
     */
    protected $baseRouteName = 'bibliography_record';

    /**
     * @var string
     */
    protected $baseRoutePattern = 'bibliography/bibliographic-record';

    protected function configureListFields(ListMapper $listMapper): void
    {
        $listMapper
            ->addIdentifier('shortName', null, $this->createLabeledListOptions('shortName'))
            ->add('title', null, $this->createLabeledListOptions('title'))
            ->add('year', null, $this->createLabeledListOptions('year'))
        ;
    }

    protected function configureFormFields(FormMapper $formMapper): void
    {
        $formMapper
            ->with('form.bibliographicRecord.section.basicInformation.label', ['class' => 'col-md-7'])
                ->add('shortName', null, $this->createLabeledFormOptions('shortName'))
                ->add('title', null, $this->createLabeledFormOptions('title'))
                ->add('year', null, $this->createLabeledFormOptions('year'))
                ->add('authors', null, $this->createLabeledManyToManyFormOptions('authors'))
            ->end()
            ->with('form.bibliographicRecord.section.details.label', ['class' => 'col-md-5'])
                ->add('displayedValue', null, $this->createLabeledFormOptions('displayedValue'))
            ->end()
        ;
    }
}
