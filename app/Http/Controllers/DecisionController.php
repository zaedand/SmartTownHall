<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DecisionController extends Controller
{
    public function showDecisionForm()
    {
        return view('login-decision');
    }

    public function processDecision(Request $request)
    {
        // Proses data jika diperlukan

        // Redirect ke halaman decision setelah proses
        return view('decision');
    }
}
