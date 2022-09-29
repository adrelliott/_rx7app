<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class ResponseController extends Controller
{
    public function __invoke($invitation): View
    {
        // get survey from service
        $survey = [];

        $this->throwSurveyException($survey);

        // return view
        return view('responses.show', compact('survey'));
    }

    private function throwSurveyException($survey)
    {
        // Match status and throw exception if required
    }
}
