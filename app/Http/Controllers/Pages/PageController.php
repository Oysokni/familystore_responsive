<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Notify;
use App\Routes\Breadcrumb;
use App\Models\SyohinCategory;
use App\Models\Policy;
use LxMenu;

class PageController extends Controller
{
    /*
     * construct
     */
    public function __construct()
    {
        Breadcrumb::add('トップページ', route('page.index'));
    }

    /*
     * view index page
     */
    public function index()
    {
        LxMenu::setActive('index');

        return view('toppage', [
            'notifyList' => Notify::getData([
                'type' => Notify::loggedUserNotifyType(),
                'orderby' => 'osirase_start_ymd',
                'order' => 'desc',
                'per_page' => 10
            ]),
        ]);
    }

    /*
     * view top page
     */
    public function topPage()
    {
        LxMenu::setActive('index');

        return redirect()->route('page.index');
    }

    /*
     * view reform page
     */
    public function reform()
    {
        LxMenu::setActive('reform');
        LxMenu::setPrevRegisterPage('account.content.register_reform');
        Breadcrumb::add(trans('page.breadcrumb_reform'));

        $notifyList = Notify::getData([
            'type' => Notify::loggedUserNotifyType(),
            'orderby' => 'osirase_start_ymd',
            'order' => 'desc',
            'per_page' => 10
        ]);
        $categories = SyohinCategory::getData([
            'per_page' => -1
        ]);
        $reformPolicy = Policy::getReformPolicyLink();

        return view('pages.reform', compact('notifyList', 'categories', 'reformPolicy'));
    }

    /*
     * view reform thanks page
     */
    public function reformThanks()
    {
        LxMenu::setActive('reform');

        return view('pages.reform-thanks');
    }

    /*
     * view register reform content
     */
    public function contentRegisterReform()
    {
        return view('pages.register-reform-content');
    }

    /*
     * view register builder content
     */
    public function contentRegisterBuilder()
    {
        return view('pages.register-builder-content');
    }

    /*
     * proxy, cross domain
     */
    public function html2canvasProxy()
    {
        include_once __DIR__.'/../includes/proxy.php';
    }

}

