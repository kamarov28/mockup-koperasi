<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class DashboardRedirectController extends Controller
{
    public function __invoke(Request $request): RedirectResponse
    {
        if (mb_strtolower((string) $request->user()->getAttribute('role')) === 'admin') {
            return redirect()->route('admin.dashboard');
        }

        return redirect()->route('nasabah.dashboard');
    }
}
