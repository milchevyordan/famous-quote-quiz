<?php

namespace App\Http\Controllers;

use App\Models\GuestUser;
use App\Services\DataTable\DataTable;
use Inertia\Inertia;
use Inertia\Response;

class GuestUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        $dataTable = (new DataTable(
            GuestUser::query()
        ))
            ->setColumn('id', '#', true, true)
            ->setColumn('name', 'Name', true, true)
            ->setColumn('last_name', 'Last Name', true, true)
            ->setColumn('email', 'Email', true, true)
            ->setColumn('total_score', 'Total Score', true, true)
            ->setColumn('total_number_of_unanswered_questions', 'Total Number Of Unanswered Questions', true, true)
            ->setColumn('time_taken_seconds', 'Time Taken Seconds', true, true)
            ->setColumn('updated_at', 'Date', true, true)
            ->setDateColumn('updated_at', 'dd.mm.YYYY H:i')
            ->run();

        return Inertia::render('guestUsers/Index', compact('dataTable'));
    }
}
