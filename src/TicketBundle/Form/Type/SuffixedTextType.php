<?php

namespace TicketBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SuffixedTextType extends AbstractType
{
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setRequired('url_suffixed');
    }

    public function buildView(FormView $view, FormInterface $form, array $options)
    {
        $view->vars['url_suffixed'] = $options['url_suffixed'];
    }

    public function getParent()
    {
        return 'text';
    }

    public function getName()
    {
        return 'suffixed_text';
    }
}