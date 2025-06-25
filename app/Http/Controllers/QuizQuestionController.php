<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreQuizQuestionRequest;
use App\Http\Requests\UpdateQuizQuestionRequest;
use App\Models\QuizQuestion;
use App\Services\ChangeLogService;
use App\Services\QuizQuestionService;
use Inertia\Inertia;
use Inertia\Response;

class QuizQuestionController extends Controller
{
    public QuizQuestionService $service;

    public function __construct()
    {
        $this->service = new QuizQuestionService();
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        return Inertia::render('quizQuestions/Index', [
            'dataTable'         => $this->service->getIndexMethodDatatable(),
            'changeLogsLimited' => ChangeLogService::getChangeLogsLimited(QuizQuestion::class),
            'changeLogs'        => Inertia::lazy(fn () => ChangeLogService::getChangeLogsDataTable(QuizQuestion::class)),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreQuizQuestionRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(QuizQuestion $quizQuestion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(QuizQuestion $quizQuestion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateQuizQuestionRequest $request, QuizQuestion $quizQuestion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(QuizQuestion $quizQuestion)
    {
        //
    }
}
