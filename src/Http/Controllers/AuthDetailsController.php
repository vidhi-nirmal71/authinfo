<?php

namespace Itpathsolutions\Authinfo\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Itpathsolutions\Authinfo\Models\LoginLog;

class AuthDetailsController extends Controller
{
    public function index()
    {
        $query = LoginLog::query();
        $loginLogs = $query->orderBy('login_time', 'desc')->paginate(10);

        return view('authinfo::logindetails');
    }

    public function fetchData(Request $request)
    {
        $query = LoginLog::query();

        if ($request->has('search')) {
            $search = $request->search;
            $query->where('user_name', 'LIKE', "%{$search}%")
                ->orWhere('ip_address', 'LIKE', "%{$search}%")
                ->orWhere('user_agent', 'LIKE', "%{$search}%")
                ->orWhere('device_type', 'LIKE', "%{$search}%")
                ->orWhere('location', 'LIKE', "%{$search}%")
                ->orWhere('status', 'LIKE', "%{$search}%")
                ->orWhere('login_time', 'LIKE', "%{$search}%")
                ->orWhere('logout_time', 'LIKE', "%{$search}%");
        }
        $loginLogs = $query->paginate(15);

        $tbody = '';
        if ($loginLogs->isNotEmpty()) {
            foreach ($loginLogs as $index => $log) {
                $tbody .= '<tr>';
                $tbody .= '<td>' . ($loginLogs->firstItem() + $index) . '</td>';
                $tbody .= '<td>' . ($log->user_name ?? 'Guest') . '</td>';
                $tbody .= '<td>' . $log->ip_address . '</td>';
                $tbody .= '<td>' . ($log->device_type ?? 'N/A') . '</td>';
                $tbody .= '<td style="max-width: 200px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;" title="' . htmlspecialchars($log->user_agent, ENT_QUOTES, 'UTF-8') . '">'. ($log->user_agent ?? 'N/A') . '</td>';
                $tbody .= '<td>' . ($log->location ?? '-') . '</td>';
                $tbody .= '<td>' . $log->login_time . '</td>';
                $tbody .= '<td>' . ($log->logout_time ?? '-') . '</td>';
                $tbody .= '<td>' . ($log->error_message ?? '-') . '</td>';
                $tbody .= '</tr>';
            }
        } else {
            $tbody .= '<tr><td colspan="9" class="text-center text-muted">No login records found.</td></tr>';
        }

        return response()->json([
            'tbody' => $tbody,
            'pagination' => $loginLogs->isNotEmpty() ? $loginLogs->appends(request()->query())->links('authinfo::vendor.pagination.sneat')->toHtml() : ''
        ]);
    }

    function generatePaginationArray($paginator, $elements)
    {
        $paginationArray = [];

        // Previous Page Link
        if ($paginator->onFirstPage()) {
            $paginationArray[] = ['type' => 'prev', 'class' => 'disabled', 'page' => 'prev'];
        } else {
            $paginationArray[] = ['type' => 'prev', 'class' => '', 'page' => $paginator->currentPage() - 1];
        }

        // Pagination Elements
        foreach ($elements as $element) {
            // "Three Dots" Separator
            if (is_string($element)) {
                $paginationArray[] = ['type' => 'ellipsis', 'class' => 'disabled', 'page' => '...'];
            }

            // Array Of Links
            if (is_array($element)) {
                foreach ($element as $page => $url) {
                    if ($page == $paginator->currentPage()) {
                        $paginationArray[] = ['type' => 'active', 'class' => 'active', 'page' => $page];
                    } else {
                        $paginationArray[] = ['type' => 'page', 'class' => '', 'page' => $page];
                    }
                }
            }
        }

        // Next Page Link
        if ($paginator->hasMorePages()) {
            $paginationArray[] = ['type' => 'next', 'class' => '', 'page' => $paginator->currentPage() + 1];
        } else {
            $paginationArray[] = ['type' => 'next', 'class' => 'disabled', 'page' => 'next'];
        }

        return $paginationArray;
    }
}
