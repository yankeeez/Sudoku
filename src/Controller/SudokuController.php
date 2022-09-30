<?php

namespace App\Controller;

use App\Form\SudokuForm;
use App\SudokuBusinessFactory;
use SudokuConstants;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SudokuController extends AbstractController
{
    #[Route('/sudoku', name: 'app_sudoku')]
    public function index(Request $request): Response
    {
        $message = '';
        $sudokuForm = $this->createForm(SudokuForm::class);
        $sudokuForm->handleRequest($request);

        if ($sudokuForm->isSubmitted() && $sudokuForm->isValid()) {
            $sudokuFactory = new SudokuBusinessFactory();

            $resultDto = $sudokuFactory->createSudokuHandler()->handleRequest($sudokuForm->getData());

            $message = $resultDto->isSuccessful() ? SudokuConstants::SUCCESS_MESSAGE : SudokuConstants::INCORRECT_SUDOKU_MESSAGE;
        }

        return $this->render('sudoku/index.html.twig', [
            'sudokuForm' => $sudokuForm->createView(),
            'message' => $message,
        ]);
    }
}
