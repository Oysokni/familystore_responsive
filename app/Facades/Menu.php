<?php

namespace App\Facades;
use App\Helpers\ViewConst;
use Illuminate\Support\Facades\Session;

class Menu 
{
    
    /*
     * list actiive strings
     */
    protected $actives = [];
    
    /*
     * key session route content register
     */
    protected $keyRouteRegister = 'route_register_content';
    
    /**
     * set active menu
     */
    public function setActive ($active) 
    {
        if (!is_array($active)) {
            $active = (array) $active;
        }
        foreach ($active as $str) {
            array_push($this->actives, $str);
        }
    }
    
    /*
     * get menu items
     */
    public function getMenus() 
    {
        return [
            [
                'route' => 'page.reform',
                'icon' => 'lxl-reform',
                'label' => 'リフォームストア',
                'member_type' => [],
                'active' => 'reform'
            ],
            [
                'route' => 'builder.index',
                'icon' => 'lxl-architecture_urban',
                'label' => '住宅購入・紹介',
                'member_type' => [ViewConst::USER_TYPE_LIME_NORMAL],
                'active' => 'builder',
            ],
            [
                'route' => 'account.content.register',
                'icon' => 'lxl-account_config',
                'label' => 'お申し込み内容',
                'member_type' => [],
                'active' => 'account'
            ],
            [
                'route' => 'code.invite.invite',
                'icon' => 'img-icon img-67-45 img-invitation mgb-14',
                'label' => '招待コードの発行',
                'member_type' => [ViewConst::USER_TYPE_LIME_NORMAL],
                'active' => 'code_invite'
            ]
        ];
    }

    /*
     * render menu html
     */
    public function render () 
    {
        return view('includes.menu', [
            'menus' => $this->getMenus(),
            'actives' => $this->actives
        ]);
    }
    
    /**
     * get list content register page
     * @return array
     */
    public function getRoutesRegister()
    {
        return [
            'account.content.register_reform' => 'reform',
            'account.content.register_builder' => 'builder'
        ];
    }
    
    /**
     * set content register route
     */
    public function setPrevRegisterPage($route)
    {
        $routesRegister = $this->getRoutesRegister();
        if (array_key_exists($route, $routesRegister)) {
            Session::put($this->keyRouteRegister, $route);
        }
    }
    
    /**
     * get previous content register route
     * @return array
     */
    public function getPrevRegisterPage()
    {
        $route = Session::get($this->keyRouteRegister);
        if (!$route) {
            $route = 'account.content.register_reform';
        }
        $routesRegister = $this->getRoutesRegister();
        if (array_key_exists($route, $routesRegister)) {
            return [
                'route' => $route,
                'active' => $routesRegister[$route]
            ];
        }
        return [
            'route' => 'account.content.register_reform',
            'active' => 'reform'
        ];
    }
    
}

