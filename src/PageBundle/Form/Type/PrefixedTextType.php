<?php

namespace PageBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PrefixedTextType extends AbstractType
{
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setRequired('url_prefix');
    }

    public function buildView(FormView $view, FormInterface $form, array $options)
    {
        $view->vars['url_prefix'] = $options['url_prefix'];
    }

    public function getParent()
    {
        return 'text';
    }

    public function getName()
    {
        return 'prefixed_text';
    }
}