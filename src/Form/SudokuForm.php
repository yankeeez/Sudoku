<?php

namespace App\Form;

use SudokuConstants;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\NotBlank;

class SudokuForm extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     *
     * @return void
     */
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder->add(SudokuConstants::SUDOKU_DATA_KEY, TextareaType::class, [
            'label' => SudokuConstants::DEFAULT_MESSAGE,
            'constraints' => [
                new NotBlank(),
            ],
        ]);
        $this->addSubmitButton($builder);
    }

    /**
     * @param FormBuilderInterface $builder
     *
     * @return $this
     */
    protected function addSubmitButton(FormBuilderInterface $builder)
    {
        $builder->add('submit', SubmitType::class, [
            'label' => 'sudoku_form',
            'attr' => [
                'class' => 'btn btn-primary safe-submit',
                'data-e2e' => 'import-form-button',
            ],
        ]);

        return $this;
    }
}
