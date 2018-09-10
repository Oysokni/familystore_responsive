<?php

namespace App\Http\Controllers\Builder;

use App\Contracts\Common;
use App\Http\Controllers\Controller;
use App\Http\Requests\CheckBuildingRequest;
use App\Models\TShintikuReq;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Lang;
use App\Rules\MinimumNumberBuilderValidationRule;
use App\Rules\MaximumNumberBuilderValidationRule;
use App\Models\Builder;
use App\Models\Notify;
use App\Models\Policy;
use App\Routes\Breadcrumb;
use Carbon\Carbon;
use App\Helpers\ViewConst;
use LxMenu;
use Illuminate\Support\Facades\Mail;
use App\Queues\EmailQueue;
use App\Helpers\HelperFunc;

class BuilderController extends Controller
{
    const DATE_ALLOWED = '2018-4-30';

    private $shintikuReq;

    /**
     * Construct function
     *
     * BuildingController constructor.
     * @param TShintikuReq $shintikuReq
     */
    function __construct(TShintikuReq $shintikuReq)
    {
        LxMenu::setActive('builder');
        $this->shintikuReq = $shintikuReq;
        Breadcrumb::add('トップページ', route('page.index'));
    }

    /**
     * Handling data
     *
     * @param CheckBuildingRequest $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function register(CheckBuildingRequest $request)
    {
        if ($request->input('syain_kbn') == Common::USER_TRIAL_STAFF
            && $request->input('syoukai_kbn') == ViewConst::BUILDER_SYOUKAI_SELF) {

            $now = Carbon::now()->setTime(23, 59, 59);
            $date = Carbon::createFromFormat('Y-m-d', static::DATE_ALLOWED)->setTime(23, 59, 59);

            if($now->lt($date)) {
                return redirect()->back() ->withInput()
                    ->withErrors(['syain_kbn' => Lang::get('validate.The trial staff notenough time')]);
            }
        }
            
        $results = $this->shintikuReq->formatData($request);
        $results = array_merge($results,['s_tyoumei'=> HelperFunc::convertKana($request->strt21),'s_tat_mei'=> HelperFunc::convertKana($request->s_tat_mei),'kento_plan_id'=>HelperFunc::makeUniqueCodeNumber(TShintikuReq::class,'kento_plan_id',14,'S')]);

        Session::put('infoUser', $results);
        return redirect()->action('Builder\BuilderController@confirm');
    }

    /**
     * Get confirm screen
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function confirm(Request $request) {
        if (!Session::has('infoUser')) {
            return redirect()->action('Builder\BuilderController@getFormRegister');
        }
        $infoUser = Session::get('infoUser');
        $taiouKbn = Session::get('taiouKbn') ? Session::get('taiouKbn') : '';

        return view('builder.confirm', ['infoUser' => $infoUser, 'taiouKbn' => $taiouKbn]);
    }

    /**
     * Save data to database
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function storeData()
    {
        if (! Session::has('infoUser') || ! Session::has('districtName')
            || ! Session::has('builderName') || ! Session::has('taiouKbn')) {
            return redirect()->action('Builder\BuilderController@getFormRegister');
        }

        
        if (! $this->shintikuReq->saveData(Session::get('infoUser'))) {

            return redirect()->route('builder.register.get');
        }
        
        $toMail = config('mail.register_builder_mail', 'tetsuya.mizutani@lixil.com');
        
        
        Mail::to($toMail)->queue(new EmailQueue(
                    'mails.buider.mail_buider',
                    Lang::get('builder.mail_title_buider'),
                        [
                            'data'        => Session::get('infoUser'),
                            'taiouKbn'    => Session::get('taiouKbn') ? Session::get('taiouKbn') : '',
                        ]
                ));
        
        
        // send mail thanks register builder
        $data        = Session::get('infoUser');
        $dateend = Carbon::parse(Carbon::now())->format('Y/m/d');
        $year = substr($dateend,0,4);
        $month = substr($dateend,5,2);
        $day = substr($dateend,8,2);
        Mail::to($data['mail'])->queue(new EmailQueue(
                    'mails.buider.mail_thanks_builder',
                    Lang::get('builder.mail_title_buider_thanks'),
                        [
                           'name' => $data['sei_local'] . '　' . $data['mei_local'],
                           'date' => $year.'年'.$month.'月'.$day.'日',
                           'idKento'   => $data['kento_plan_id']
                        ]
                ));
       
        return redirect()->action('Builder\BuilderController@success');
    }

    /**
     * Get success screen
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function success()
    {
        Session::forget('infoUser');
        Session::forget('districtName');
        Session::forget('builderName');
        Session::forget('taiouKbn');
        Session::forget('type');

        return view('builder.success');
    }

    /**
     * Get form register builder
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getFormRegister()
    {
        $user = new User();
        $districtName   = Session::get('districtName') ? Session::get('districtName') : '';
        $builderName    = Session::get('builderName') ? Session::get('builderName') : '';
        $taiouKbn       = Session::get('taiouKbn') ? Session::get('taiouKbn') : '';
        $type           = Session::get('type') ? Session::get('type') : '';
        $infoUser       = $user->getUserBy(Auth::user()->knr_user_id);
        $policy         = Policy::getBuilderPolicyLink();

        $districts = Config::get('constants.districts');
        $district = array_search($districtName, $districts);
        $urlBack  = route('builder.search', ['district'=> $district, 'type'=> $type]);

        return view('builder.register', [
            'infoUser' => $infoUser,
            'provinces' => Common::listProvince(),
            'districtName'  => $districtName,
            'builders'   => $builderName,
            'taiouKbn'      => $taiouKbn,
            'policy' => $policy,
            'type'   =>  $type,
            'urlBack' => $urlBack,
        ]);
    }

    /**
     * search builder form
     * @param Request $request
     * @return type
     */
    public function index(Request $request)
    {
        LxMenu::setPrevRegisterPage('account.content.register_builder');
        Breadcrumb::add('住宅購入・紹介');
        $districts = Config::get('constants.districts');
        if (Session::has('infoUser')) {
            Session::forget('infoUser');
        }

        Session::forget('type');
        Session::forget('builderName');
        
        $notifications = Notify::getData([
            'type' => Notify::loggedUserNotifyType(),
            'orderby' => 'osirase_start_ymd',
            'order' => 'desc',
            'per_page' => 10
        ]);
        $request->flush();

        return view('builder.index', compact('districts', 'notifications'));
    }

    /**
     * list builder search result
     * @param Request $request
     * @return type
     */
    public function search(Request $request)
    {
        Breadcrumb::add('住宅購入・紹介');
        $districts = Config::get('constants.districts');

        $notifications = Notify::getData([
            'type' => Notify::loggedUserNotifyType(),
            'orderby' => 'osirase_start_ymd',
            'order' => 'desc',
            'per_page' => 10
        ]);

        $district = $request->input('district');
        $type = $request->input('type');
        $request->session()->put('type', $type);

        $validate = Validator::make($request->only('district', 'type'), [
            'district' => ['required'],
            'type' => ['numeric']
        ],
        [
            'district.required' => trans('builder.select_buider_required'),

        ]);
        if ($validate->fails()) {
            return redirect()
                    ->route('builder.index')
                    ->withInput()
                    ->withErrors($validate->errors())
                    ->with('oldType', $type);
        }

        $districtName = $districts[$district];
        $request->session()->put('districtName', $districtName);
        $request->flash();

        $convertData = Builder::getTypeData($type);
        $ptype = $convertData['type'];
        $taiouKbns = $convertData['taiouKbn'];
        $request->session()->put('taiouKbn', $taiouKbns);

        $builders = Builder::getData([
            'district' => $district,
            'type' => $ptype
        ])->get();

        $error = [];
        if ($request->type == '0') {
            $error = [
                'error_type'    => '※一戸建て、マンション、どちらか片方、もしくは両方にチェックしてください。',
                'error_type_sw' => 'スーパーウォール工法 取扱い店'
            ];
            $builders = [];
        }
        $totalItems = count($builders);
        $totalPages = ceil($totalItems / Builder::PER_PAGE);
        $itemsPerPage = Builder::PER_PAGE;

        return view('builder.search', [
            'districts' => $districts,
            'builders' => $builders,
            'totalItems' => $totalItems,
            'totalPages' => $totalPages,
            'itemsPerPage' => $itemsPerPage,
            'notifications'=> $notifications,
            'errorType' => $error,
        ]);
    }
    /**
     * store selected builder
     * @param Request $request
     * @return type
     */
    public function store(Request $request)
    {
        $builderNames = $request->input('builder_name');

        $messages = [
            'taiou_kbn.required' => trans('builder.minimum_number_of_required_builder')
        ];
        $validate = Validator::make($request->only('taiou_kbn'), [
            'taiou_kbn' => ['required', 'array', new MinimumNumberBuilderValidationRule, new MaximumNumberBuilderValidationRule]
        ], $messages);
        if ($validate->fails()) {
            return redirect()
                    ->back()
                    ->withErrors($validate->errors())
                    ->with('taiou_kbn_flash', collect($request->input('taiou_kbn')));
        }
        $request->session()->put('builderName', $builderNames);

        return redirect()->route('builder.register.get');
    }
}
