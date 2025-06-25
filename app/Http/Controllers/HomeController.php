<?php

namespace App\Http\Controllers;

use App\Services\QuizService;
use Inertia\Inertia;
use Inertia\Response;

class HomeController extends Controller
{
    public QuizService $service;

    public function __construct()
    {
        $this->service = new QuizService();
    }

    public function index(): Response
    {
        return Inertia::render('Welcome', [
            'questions' => Inertia::lazy(fn () => $this->service->getQuestions())
        ]);
    }
}
