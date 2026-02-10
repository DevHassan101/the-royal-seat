<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Query;

class QueryController extends Controller
{
    public function index()
    {
        $queries = Query::get();
        return view('admin.pages.query.index', compact('queries'));
    }

    public function destroy(Query $query)
    {
        $query->delete();

        return redirect()
            ->back()
            ->with('success', 'Query deleted successfully');
    }
}
