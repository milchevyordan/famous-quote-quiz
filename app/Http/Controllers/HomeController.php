<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAttemptRequest;
use App\Models\Attempt;
use App\Models\GuestUser;
use App\Services\AttemptService;
use App\Services\QuizService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Inertia\Inertia;
use Inertia\Response;
use Throwable;

class HomeController extends Controller
{
    public AttemptService $service;

    public function __construct()
    {
        $this->service = new AttemptService();
    }

    /**
     * Go to homepage
     *
     * @param GuestUser|null $guestUser
     * @return Response
     */
    public function index(GuestUser $guestUser = null): Response
    {
        return Inertia::render('Welcome', [
            'guestUser' => fn () => $guestUser,
            'questions' => Inertia::lazy(fn () => QuizService::getQuestions())
        ]);
    }

    /**
     * Store the quiz
     *
     * @param StoreAttemptRequest $request
     * @return RedirectResponse
     */
    public function store(StoreAttemptRequest $request): RedirectResponse
    {
        DB::beginTransaction();

        try {
            $this->service->storeAttempt($request);

            DB::commit();

            return redirect()->route('leaderboard', ['attempt' => $this->service->getAttempt()->id]);

        } catch (Throwable $th) {
            DB::rollBack();

            Log::error($th->getMessage(), ['exception' => $th]);

            return redirect()->back()->withErrors(['Error creating record.']);
        }
    }

    /**
     * Show leaderboard
     *
     * @param Attempt|null $attempt
     * @return Response
     */
    public function leaderboard(Attempt $attempt = null): Response
    {
        if ($attempt) {
            $attempt->load('guestUser');
        }

        return Inertia::render('Leaderboard', [
            'attempt' => fn () => $attempt,
            'topScorers' => fn () => $this->service->getTopScorers()
        ]);
    }
}
