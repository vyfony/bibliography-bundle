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
use Sonata\Form\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Vyfony\Bundle\BibliographyBundle\Admin\Abstraction\AbstractEntityAdmin;

final class ReferencesListAdmin extends AbstractEntityAdmin
{
    /**
     * @var string
     */
    protected $baseRouteName = 'bibliography_references_list';

    /**
     * @var string
     */
    protected $baseRoutePattern = 'bibliography/references-list';

    protected function configureListFields(ListMapper $listMapper): void
    {
        $listMapper
            ->addIdentifier('name', null, $this->createLabeledListOptions('name'))
        ;
    }

    protected function configureFormFields(FormMapper $formMapper): void
    {
        $formMapper
            ->with('form.referencesList.section.information.label')
                ->add('name', TextType::class, $this->createLabeledFormOptions('name'))
                ->add('description', TextareaType::class, $this->createLabeledFormOptions('description'))
            ->end()
            ->with('form.referencesList.section.information.label')
                ->add(
                    'items',
                    CollectionType::class,
                    $this->createLabeledFormOptions('items'),
                    [
                        'edit' => 'inline',
                        'inline' => 'table',
                        'sortable' => 'position',
                        'admin_code' => 'vyfony_bibliography.admin.references_list_item',
                    ]
                )
            ->end()
        ;
    }
}
