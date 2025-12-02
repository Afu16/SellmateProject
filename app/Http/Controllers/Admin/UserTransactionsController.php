<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserTransactionsController extends Controller
{
    public function index(Request $request, string $username)
    {
        return view('page.admin.user-transactions', [
            'username' => $username,
        ]);
    }

    public function data(Request $request, string $username)
    {
        $page = (int)($request->query('page', 1));
        $perPage = (int)($request->query('per_page', 10));

        $items = [];
        for ($i = 0; $i < 12; $i++) {
            $items[] = [
                'username' => $username,
                'school' => 'SMK BPI',
                'department' => 'RPL',
                'product' => 'Cake Tiramisu',
                'price' => 200000,
                'transaction_date' => '2024-07-04',
                'status' => 'success',
            ];
        }

        $total = count($items);
        $offset = ($page - 1) * $perPage;
        $data = array_slice($items, $offset, $perPage);

        return response()->json([
            'username' => $username,
            'total_omzet' => 5000000,
            'transactions' => $data,
            'pagination' => [
                'page' => $page,
                'per_page' => $perPage,
                'total' => $total,
                'pages' => (int)ceil($total / max(1, $perPage)),
            ],
        ]);
    }
}

