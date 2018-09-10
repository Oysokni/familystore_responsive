<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//route auth
require_once __DIR__.'/../app/Routes/auth/web.php';
//route page
require_once __DIR__.'/../app/Routes/pages/web.php';
//route builder
require_once __DIR__.'/../app/Routes/builder/web.php';
//route faq
require_once __DIR__.'/../app/Routes/faq/web.php';

//route register family
require_once __DIR__.'/../app/Routes/RegisterFamily/web.php';

// route code invite
require_once __DIR__.'/../app/Routes/codeinvite/web.php';

//route product
require_once __DIR__.'/../app/Routes/product/web.php';

//route cart list product
require_once __DIR__.'/../app/Routes/cart/web.php';

//route pdf
require_once __DIR__.'/../app/Routes/pdf/web.php';

//account content
require_once __DIR__.'/../app/Routes/account/web.php';

//route kengine
require_once __DIR__.'/../app/Routes/kengine/web.php';

//route upload s3
require_once __DIR__.'/../app/Routes/file/web.php';

//route upload s3
require_once __DIR__.'/../app/Routes/iinavi/web.php';

//route show link pdf
require_once __DIR__.'/../app/Routes/link/web.php';
