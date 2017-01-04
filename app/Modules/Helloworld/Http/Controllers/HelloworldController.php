<?php
namespace App\Modules\Helloworld\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\AuditRepository as Audit;
use Auth;

class HelloworldController extends Controller
{
    public function index()
    {
        Audit::log(Auth::user()->id, trans('helloworld::general.audit-log.category'), trans('helloworld::general.audit-log.msg-index'));

        $page_title = trans('helloworld::general.page.index.title');
        $page_description = trans('helloworld::general.page.index.description');

        return view('helloworld::index', compact('page_title', 'page_description'));
    }

}
