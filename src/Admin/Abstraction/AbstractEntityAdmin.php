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

namespace Vyfony\Bundle\BibliographyBundle\Admin\Abstraction;

use ReflectionClass;
use Sonata\AdminBundle\Admin\AbstractAdmin;

abstract class AbstractEntityAdmin extends AbstractAdmin
{
    protected $translationDomain = 'vyfony_bibliography_admin';

    public function getLabel(): string
    {
        return 'menu.paragraphs.'.$this->getEntityKey().'.label';
    }

    protected function getEntityKey(): string
    {
        return lcfirst((new ReflectionClass($this->getClass()))->getShortName());
    }

    protected function getFormKeyForFieldName(string $fieldName): string
    {
        return 'form.'.$this->getEntityKey().'.fields.'.$fieldName;
    }

    protected function getListKeyForFieldName(string $fieldName): string
    {
        return 'list.'.$this->getEntityKey().'.fields.'.$fieldName;
    }

    protected function createLabeledListOptions(string $fieldName, array $options = []): array
    {
        return array_merge(
            $options,
            [
                'label' => $this->getListKeyForFieldName($fieldName),
            ]
        );
    }

    protected function createLabeledFormOptions(string $fieldName, array $options = []): array
    {
        return array_merge(
            $options,
            [
                'label' => $this->getFormKeyForFieldName($fieldName),
            ]
        );
    }

    protected function createLabeledManyToManyFormOptions(string $fieldName, array $options = [])
    {
        return $this->createLabeledFormOptions(
            $fieldName,
            array_merge(
                $options,
                ['required' => false, 'multiple' => true]
            )
        );
    }
}
