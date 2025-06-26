<?php

namespace App\Http\Controllers;

use App\Models\Attempt;
use App\Services\DataTable\DataTable;
use Inertia\Inertia;
use Inertia\Response;

class AttemptController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        $dataTable = (new DataTable(
            Attempt::query()
        ))
            ->setRelation('guestUser')
            ->setColumn('id', '#', true, true)
            ->setColumn('guestUser.name', 'Name', true, true)
            ->setColumn('guestUser.last_name', 'Last Name', true, true)
            ->setColumn('guestUser.email', 'Email', true, true)
            ->setColumn('total_score', 'Total Score', true, true)
            ->setColumn('total_number_of_unanswered_questions', 'Total Number Of Unanswered Questions', true, true)
            ->setColumn('time_taken_seconds', 'Time Taken Seconds', true, true)
            ->setColumn('created_at', 'Date', true, true)
            ->setDateColumn('created_at', 'dd.mm.YYYY H:i')
            ->run();

        return Inertia::render('attempts/Index', compact('dataTable'));
    }
}
