<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAttemptRequest;
use App\Services\GuestUserService;
use App\Services\QuizService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Inertia\Inertia;
use Inertia\Response;
use Throwable;

class HomeController extends Controller
{
    public GuestUserService $service;

    public function __construct()
    {
        $this->service = new GuestUserService();
    }

    public function index(): Response
    {
        return Inertia::render('Welcome', [
            'questions' => Inertia::lazy(fn () => QuizService::getQuestions())
        ]);
    }

    public function store(StoreAttemptRequest $request): RedirectResponse
    {
        DB::beginTransaction();

        try {
            $this->service->storeGuestUser($request);

            DB::commit();

            return redirect()->route('show.score', ['guest_user' => $this->service->getGuestUser()->id])->with('success', 'Record successfully created.');

        } catch (Throwable $th) {
            DB::rollBack();

            Log::error($th->getMessage(), ['exception' => $th]);

            return redirect()->back()->withErrors(['Error creating record.']);
        }
    }
}
