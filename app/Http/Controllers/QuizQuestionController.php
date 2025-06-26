<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreQuizQuestionRequest;
use App\Http\Requests\UpdateQuizQuestionRequest;
use App\Models\QuizQuestion;
use App\Services\ChangeLogService;
use App\Services\QuizQuestionService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Inertia\Inertia;
use Inertia\Response;
use Throwable;

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
    public function store(StoreQuizQuestionRequest $request): RedirectResponse
    {
        DB::beginTransaction();

        try {
            $this->service->createQuizQuestion($request);

            DB::commit();

            return redirect()->back()->with('success', 'Record successfully created.');
        } catch (Throwable $th) {
            DB::rollBack();

            Log::error($th->getMessage(), ['exception' => $th]);

            return redirect()->back()->withErrors(['Error creating record.']);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateQuizQuestionRequest $request, QuizQuestion $question): RedirectResponse
    {
        DB::beginTransaction();

        try {
            $this->service->setQuizQuestion($question)->updateQuizQuestion($request);

            DB::commit();

            return redirect()->back()->with('success', 'Record successfully created.');
        } catch (Throwable $th) {
            DB::rollBack();

            Log::error($th->getMessage(), ['exception' => $th]);

            return redirect()->back()->withErrors(['Error creating record.']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(QuizQuestion $question): RedirectResponse
    {
        try {
            $question->delete();

            return redirect()->back()->with('success', 'The record has been successfully deleted.');
        } catch (Throwable $th) {
            Log::error($th->getMessage(), ['exception' => $th]);

            return redirect()->back()->withErrors(['Error deleting record.']);
        }
    }
}
