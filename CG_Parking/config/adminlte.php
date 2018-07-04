<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Title
    |--------------------------------------------------------------------------
    |
    | The default title of your admin panel, this goes into the title tag
    | of your page. You can override it per page with the title section.
    | You can optionally also specify a title prefix and/or postfix.
    |
    */

    'title' => 'CG Parking',

    'title_prefix' => '',

    'title_postfix' => '',

    /*
    |--------------------------------------------------------------------------
    | Logo
    |--------------------------------------------------------------------------
    |
    | This logo is displayed at the upper left corner of your admin panel.
    | You can use basic HTML here if you want. The logo has also a mini
    | variant, used for the mini side bar. Make it 3 letters or so
    |
    */

    'logo' => '<b>CG Parking</b>',

    'logo_mini' => '<b>CG</b>',

    /*
    |--------------------------------------------------------------------------
    | Skin Color
    |--------------------------------------------------------------------------
    |
    | Choose a skin color for your admin panel. The available skin colors:
    | blue, black, purple, yellow, red, and green. Each skin also has a
    | ligth variant: blue-light, purple-light, purple-light, etc.
    |
    */

    'skin' => 'green',

    /*
    |--------------------------------------------------------------------------
    | Layout
    |--------------------------------------------------------------------------
    |
    | Choose a layout for your admin panel. The available layout options:
    | null, 'boxed', 'fixed', 'top-nav'. null is the default, top-nav
    | removes the sidebar and places your menu in the top navbar
    |
    */

    'layout' => null,

    /*
    |--------------------------------------------------------------------------
    | Collapse Sidebar
    |--------------------------------------------------------------------------
    |
    | Here we choose and option to be able to start with a collapsed side
    | bar. To adjust your sidebar layout simply set this  either true
    | this is compatible with layouts except top-nav layout option
    |
    */

    'collapse_sidebar' => false,

    /*
    |--------------------------------------------------------------------------
    | URLs
    |--------------------------------------------------------------------------
    |
    | Register here your dashboard, logout, login and register URLs. The
    | logout URL automatically sends a POST request in Laravel 5.3 or higher.
    | You can set the request to a GET or POST with logout_method.
    | Set register_url to null if you don't want a register link.
    |
    */

    'dashboard_url' => '/',

    'logout_url' => 'logout',

    'logout_method' => null,

    'login_url' => 'login',

    'register_url' => 'register',

    /*
    |--------------------------------------------------------------------------
    | Menu Items
    |--------------------------------------------------------------------------
    |
    | Specify your menu items to display in the left sidebar. Each menu item
    | should have a text and and a URL. You can also specify an icon from
    | Font Awesome. A string instead of an array represents a header in sidebar
    | layout. The 'can' is a filter on Laravel's built in Gate functionality.
    |
    */

    'menu' => [
        'NAVEGAÇÃO',
        [
            'text' => 'Página Inicial',
            'url'  => 'admin/home',
            'icon' => 'home',
            'can'  => 'admin',
        ],
        [
            'text' => 'Página Inicial',
            'url'  => 'oper/home',
            'icon' => 'home',
            'can'  => 'oper',
        ],
        [
            'text' => 'Página Inicial',
            'url'  => 'user/home',
            'icon' => 'home',
            'can'  => 'user',
        ],
        'CONFIGURAÇÕES DA CONTA',
        [
            'text' => 'Perfil',
            'url'  => 'admin/settings',
            'icon' => 'user',
            'can' => 'admin',
        ],
        [
            'text' => 'Mudar Senha',
            'url'  => 'admin/settings/password',
            'icon' => 'lock',
            'can' => 'admin',
        ],
        [
            'text' => 'Perfil',
            'url'  => 'oper/settings',
            'icon' => 'user',
            'can' => 'oper',
        ],
        [
            'text' => 'Mudar Senha',
            'url'  => 'oper/settings/password',
            'icon' => 'lock',
            'can' => 'oper',
        ],
        [
            'text' => 'Perfil',
            'url'  => 'user/settings',
            'icon' => 'user',
            'can' => 'user',
        ],
        [
            'text' => 'Mudar Senha',
            'url'  => 'user/settings/password',
            'icon' => 'lock',
            'can' => 'user',
        ],
        'ÁREA DO USUÁRIO',
        [
                'text'        => 'Vagas do CG Parking',
                'url'         => 'user/Vaga/Index',
                'icon'        => 'car',
                'can'         => 'user',
        ],
        [
                'text'        => 'Valores do CG Parking',
                'url'         => 'user/Valor/Index',
                'icon'        => 'money',
                'can'         => 'user',
        ],
        [
                'text'        => 'Histórico Pessoal',
                'url'         => 'user/Historico',
                'icon'        => 'history',
                'can'         => 'user',
        ],
        'ÁREA DO OPERADOR',
        [
                'text'        => 'Realizar Entrada de Veículo',
                'icon'        => 'check-square-o',
                'can'         => 'oper',
                'submenu'     =>[
                    [
                        'text'        => 'Cliente Cadastrado',
                        'url'         => 'oper/RegEntrada/Registered',
                        'icon'        => 'thumbs-o-up'
                    ],
                    [
                        'text'        => 'Cliente Não Cadastrado',
                        'url'         => 'oper/RegEntrada/NotRegistered',
                        'icon'        => 'thumbs-o-down'
                    ],
                ]
        ],
        [
                'text'        => 'Realizar Saída de Veículo',
                'url'         => 'oper/RegSaida',
                'icon'        => 'check-square',
                'can'         => 'oper',
        ],
        [
                'text'        => 'Tirar Segunda Via da Fatura',
                'url'         => 'oper/Resultado',
                'icon'        => 'file-pdf-o',
                'can'         => 'oper',
        ],
        [
                'text'        => 'Visualizar Tabela de Vagas',
                'url'         => 'oper/ListVaga',
                'icon'        => 'list-ul',
                'can'         => 'oper',
        ],
        [
                'text'        => 'Visualizar Tabela de Valores',
                'url'         => 'oper/ListValor',
                'icon'        => 'list-ul',
                'can'         => 'oper',
        ],
        'ÁREA DO ADMINISTRADOR',
        [
            'text'        => 'Manutenção de Vagas',
            'icon'        => 'car',
            'can'         => 'admin',
            'submenu'     =>[
                [
                    'text'        => 'Visualizar Vagas',
                    'url'         => 'admin/Vaga/Index',
                    'icon'        => 'bars'
                ],
                [
                    'text'        => 'Inserir Vaga',
                    'url'         => 'admin/Vaga/Create',
                    'icon'        => 'plus'
                ],
            ]
        ],
        [
            'text'        => 'Manutenção de Valores',
            'icon'        => 'money',
            'can'         => 'admin',
            'submenu'     =>[
                [
                    'text'        => 'Visualizar Valores',
                    'url'         => 'admin/Valor/Index',
                    'icon'        => 'bars'
                ],
                [
                    'text'        => 'Inserir Valor',
                    'url'         => 'admin/Valor/Create',
                    'icon'        => 'plus'
                ],
            ]
        ],
        [
            'text'        => 'Manutenção de Cadastros',
            'icon'        => 'cog',
            'can'         => 'admin',
            'submenu'     =>[
                [
                    'text'        => 'Visualizar Cadastros',
                    'url'         => 'admin/User/Index',
                    'icon'        => 'bars'
                ],
                [
                    'text'        => 'Cadastrar Usuário',
                    'url'         => 'admin/User/Create',
                    'icon'        => 'plus'
                ],
            ]
        ],
        [
            'text'        => 'Relatório Operacional',
            'url'         => 'admin/RelVenda',
            'icon'        => 'bar-chart',
            'can'         => 'admin',
        ],
    ],


    /*
    |--------------------------------------------------------------------------
    | Menu Filters
    |--------------------------------------------------------------------------
    |
    | Choose what filters you want to include for rendering the menu.
    | You can add your own filters to this array after you've created them.
    | You can comment out the GateFilter if you don't want to use Laravel's
    | built in Gate functionality
    |
    */

    'filters' => [
        JeroenNoten\LaravelAdminLte\Menu\Filters\HrefFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ActiveFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\SubmenuFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ClassesFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\GateFilter::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Plugins Initialization
    |--------------------------------------------------------------------------
    |
    | Choose which JavaScript plugins should be included. At this moment,
    | only DataTables is supported as a plugin. Set the value to true
    | to include the JavaScript file from a CDN via a script tag.
    |
    */

    'plugins' => [
        'datatables' => true,
        'select2'    => true,
        'chartjs'    => true,
    ],
];
