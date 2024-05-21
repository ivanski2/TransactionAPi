<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index(Request $request)
    {
        $query = Transaction::query();

        if ($request->has('type')) {
            $query->where('type', $request->get('type'));
        }

        if ($request->has('description')) {
            $query->where('description', 'like', '%' . $request->get('description') . '%');
        }

        $perPage = $request->get('per_page', 10);
        return $query->paginate($perPage);
    }

    public function store(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|min:0',
            'type' => 'required|in:deposit,withdrawal',
        ]);

        return Transaction::create($request->all());
    }

    public function show($id)
    {
        return Transaction::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'amount' => 'sometimes|required|numeric|min:0',
            'type' => 'sometimes|required|in:deposit,withdrawal',
        ]);

        $transaction = Transaction::findOrFail($id);
        $transaction->update($request->all());

        return $transaction;
    }

    public function destroy($id)
    {
        Transaction::destroy($id);
        return response(null, 204);
    }
}
