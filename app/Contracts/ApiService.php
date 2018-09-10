<?php

namespace App\Contracts;

class ApiService
{
    // Iinavi
    const CLIENT_ID = 'bGl4aWxhcGkyMDE3';

    // Name server
    const SERVER_NAME = 'lffs.lixil.jp';

    // Url get access token server iinavi
    const URL_ACCESS_TOKEN = 'https://ssl.lixil.co.jp/lffs/authInit.php';

    // Url login iinavi
    const URL_LOGIN_IINAVI = 'https://ssl.lixil.co.jp/lffs/auth.php';

    // Url update member iinavi information
    const URL_UPDATE_MEMBER = 'https://ssl.lixil.co.jp/lffs/members.php';
}
