<?php

declare(strict_types=1);

namespace App\Services;

use App\Http\Requests\StoreQuizQuestionRequest;
use App\Models\QuizQuestion;
use App\Services\DataTable\DataTable;

class QuizQuestionService
{
    /**
     * Context model.
     *
     * @var QuizQuestion
     */
    private QuizQuestion $model;

    /**
     * Get the value of model.
     *
     * @return QuizQuestion
     */
    public function getQuizQuestion(): QuizQuestion
    {
        return $this->model;
    }

    /**
     * Set the value of model.
     *
     * @param  QuizQuestion $model
     * @return self
     */
    public function setQuizQuestion(QuizQuestion $model): self
    {
        $this->model = $model;

        return $this;
    }

    /**
     * Create a new ProductService instance.
     */
    public function __construct()
    {
        $this->setQuizQuestion(new QuizQuestion());
    }

    /**
     * Create a new ProductService instance.
     *
     * @return DataTable
     */
    public function getIndexMethodDatatable(): DataTable
    {
        return (new DataTable(
            QuizQuestion::with('answers')
        ))
            ->setColumn('action', 'Action')
            ->setColumn('id', '#', true, true)
            ->setColumn('question', 'Question', true, true)
            ->setColumn('is_binary', 'Is Binary', true, true)
            ->setColumn('created_at', 'Created', true, true)
            ->setDateColumn('created_at', 'dd.mm.YYYY H:i')
            ->run();
    }

    /**
     * Create the client.
     *
     * @param StoreQuizQuestionRequest $request
     * @return self
     */
    public function createQuizQuestion(StoreQuizQuestionRequest $request): self
    {
        $validatedRequest = $request->validated();

        $quizQuestion = new QuizQuestion();
        $quizQuestion->fill($validatedRequest);
        $quizQuestion->creator_id = auth()->id();
        $quizQuestion->save();

        if (!$validatedRequest['is_binary']) {
            $quizQuestion->answers()->createMany($validatedRequest['answers']);
        }

        $this->setQuizQuestion($quizQuestion);

        return $this;
    }
}
