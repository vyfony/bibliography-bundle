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
use Sonata\AdminBundle\Form\Type\ModelType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
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
            ->add('authors', null, $this->createLabeledListOptions('authors'))
            ->add('title', null, $this->createLabeledListOptions('title'))
            ->add('year', null, $this->createLabeledListOptions('year'))
        ;
    }

    protected function configureFormFields(FormMapper $formMapper): void
    {
        $formMapper
            ->with('form.bibliographicRecord.section.basicInformation.label', ['class' => 'col-md-7'])
                ->add('shortName', TextType::class, $this->createLabeledFormOptions('shortName'))
                ->add('year', IntegerType::class, $this->createLabeledFormOptions('year'))
                ->add('authorships', ModelType::class, $this->createLabeledManyToManyFormOptions('authorships'))
            ->end()
            ->with('form.bibliographicRecord.section.details.label', ['class' => 'col-md-5'])
                ->add('authors', TextType::class, $this->createLabeledFormOptions('authors'))
                ->add('title', TextType::class, $this->createLabeledFormOptions('title'))
                ->add('details', TextareaType::class, $this->createLabeledFormOptions('details'))
            ->end()
        ;
    }
}
