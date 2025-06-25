<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\QuizQuestion;
use App\Services\DataTable\DataTable;

class QuizQuestionService
{
    /**
     * Context product.
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
            QuizQuestion::query()
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
     * @param array $validatedRequest
     * @return self
     */
    public function createQuizQuestion(array $validatedRequest): self
    {
        $client = new QuizQuestion();
        $client->fill($validatedRequest);
        $client->creator_id = auth()->id();
        $client->save();

        $this->setQuizQuestion($client);

        return $this;
    }

    /**
     * Add payment to the client.
     *
     * @param array $validatedRequest
     * @return self
     */
    public function addPaymentToQuizQuestion(array $validatedRequest): self
    {
        $clientPayment = new QuizQuestionPayment();
        $clientPayment->fill($validatedRequest);
        $clientPayment->creator_id = auth()->id();
        $clientPayment->client_id = $validatedRequest['client_id'];
        $clientPayment->save();

        return $this;
    }

    /**
     * Add a visit to the client.
     *
     * @param array $validatedRequest
     * @return self
     */
    public function addVisitToQuizQuestion(array $validatedRequest): self
    {
        $clientVisit = new QuizQuestionVisit();
        $clientVisit->fill($validatedRequest);
        $clientVisit->creator_id = auth()->id();
        $clientVisit->save();

        if (! $validatedRequest['use_multisport']) {
            return $this;
        }

        $clientPayment = new QuizQuestionPayment();
        $clientPayment->fill($validatedRequest);
        $clientPayment->amount = 10;
        $clientPayment->creator_id = auth()->id();
        $clientPayment->date_from = now();
        $clientPayment->date_to = now();
        $clientPayment->client_id = $validatedRequest['client_id'];
        $clientPayment->save();

        return $this;
    }
}
