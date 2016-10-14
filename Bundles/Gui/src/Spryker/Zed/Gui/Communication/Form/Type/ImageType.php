<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\Gui\Communication\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ImageType extends AbstractType
{
    const OPTION_IMAGE_WIDTH = 'image_width';
    const OPTION_IMAGE_HEIGHT = 'image_height';
    const OPTION_IMAGE_TITLE = 'image_title';
    const OPTION_IMAGE_URL = 'image_url';
    const OPTION_IMAGE_GALLERY = 'image_gallery';

    /**
     * @param \Symfony\Component\Form\FormView $view
     * @param \Symfony\Component\Form\FormInterface $form
     * @param array $options
     *
     * @return void
     */
    public function buildView(FormView $view, FormInterface $form, array $options)
    {
        $view->vars[self::OPTION_IMAGE_WIDTH] = $options[self::OPTION_IMAGE_WIDTH];
        $view->vars[self::OPTION_IMAGE_HEIGHT] = $options[self::OPTION_IMAGE_HEIGHT];
        $view->vars[self::OPTION_IMAGE_TITLE] = $options[self::OPTION_IMAGE_TITLE];
        $view->vars[self::OPTION_IMAGE_URL] = $options[self::OPTION_IMAGE_URL];
        $view->vars[self::OPTION_IMAGE_GALLERY] = $options[self::OPTION_IMAGE_GALLERY];
    }

    /**
     * {@inheritdoc}
     *
     * @return void
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults([
            self::OPTION_IMAGE_WIDTH => null,
            self::OPTION_IMAGE_HEIGHT => null,
            self::OPTION_IMAGE_TITLE => null,
            self::OPTION_IMAGE_URL => null,
            self::OPTION_IMAGE_GALLERY => null,
        ]);
    }

    /**
     * @return string
     */
    public function getParent()
    {
        return 'form';
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'image';
    }

}
