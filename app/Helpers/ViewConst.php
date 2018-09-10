<?php

namespace App\Helpers;

class ViewConst {

    /*
     * user type
     */
    const USER_TYPE_LIME_NORMAL = 1;
    const USER_TYPE_LIME_SPECIAL = 2;
    const USER_TYPE_FAMILY = 3;

    /*
     * register cart, building type
     */
    const TYPE_BUILDING_HOUSE = '01';
    const TYPE_BUILDING_APARTMENT = '02';
    const TYPE_BUILDING_OTHER = '03';

    /*
     * register cart, type show price of product (kakakuhyouji_kbn)
     */
    const TYPE_SHOW_PRICE_BEFORE = '01';
    const TYPE_NOT_SHOW_PRICE_AFTER = '02';
    const TYPE_SHOW_PRICE_TEXT = '03';

    /*
     * register cart, type regis product (syouhin_toroku_kbn)
     */
    const TYPE_REGIS_PROD_COMMON = '01'; //type common
    const TYPE_REGIS_PROD_EST_KENGINE = '02'; //est K-engine
    const TYPE_REGIS_PROD_TPL_KENGINE = '03'; //template K-engine
    const TYPE_REGIS_PROD_EST_IINAVI = '04'; //est Iinavi

    /*
     * register cart, contact method
     */
    const CONTACT_METHOD_EMAIL = 1;
    const CONTACT_METHOD_PHONE = 2;
    const CONTACT_METHOD_VISIT = 3;
    const CONTACT_METHOD_OTHER = 0;

    /*
     * reform locate
     */
    const REFORM_LOCATE_HOME = '01';
    const REFORM_LOCATE_HOME_MOVE = '02';
    const REFORM_LOCATE_MASION = '03';

    /*
     * reform status
     */
    const REFORM_STT_RESEARCHING = '00';
    const REFORM_STT_CREATING = '01';
    const REFORM_STT_REGISTED = '02';
    const REFORM_STT_RECEIVED = '03';
    const REFORM_STT_DISCUSSION = '04';
    const REFORM_STT_PUBLISH = '05';
    const REFORM_STT_SIGNED = '06';
    const REFORM_STT_DELIVERIED = '07';
    const REFORM_STT_COMPLETE = '08';
    const REFORM_STT_LOSTED = '09';
    const REFORM_STT_CANCEL = '99';

    /**
     * reform and builder family introduction pdf
     */
    const MEMBER_REGISTER_PDF = '（ALL版）LIXIL Family STORE規約.pdf';
    const FAMILY_REGISTER_PDF = '（Family）LIXIL Family STORE規約.pdf';
    const FAMILY_REFORM_PDF = '（Family）LIXIL Family STORE規約.pdf';
    const BUILDER_PDF_DEFAULT_1 = 'LIXIL_Family_STORE住宅購入紹介版利用規約（住宅購入）LIXIL社員.pdf';
    const BUILDER_PDF_DEFAULT_2 = 'LIXIL_Family_STORE住宅購入紹介版利用規約（案件紹介）LIXIL社員.pdf ';
    const MEMBER_PDF_PATH = '/policys/lixil';
    const FAMILY_PDF_PATH = '/policys/family';

    const BUILDER_SYOUKAI_SELF = '01';

    /**
     * category
     */
    const CATEGORY_MAX_SIZE = 20;
    const LAST_CATEGORY_ID = 999;
    /*
     * temp product price
     */
    const TEMP_PLANS_PRICE = [
        1 => [31, 23, 25],
        2 => [0, 0, 0],
        3 => [31, 23, 25],
        4 => [0, 0, 0],
        5 => [132, 66, 77],
        6 => [0, 0, 0],
        7 => [127, 67, 77],
        8 => [0, 0, 0],
        9 => [0, 0, 0],
        10 => [0, 0, 0],
        11 => [0, 0, 0],
        12 => [0, 0, 0],
        13 => [0, 0, 0],
        14 => [0, 0, 0],
        15 => [0, 0, 0],
        16 => [0, 0, 0],
        17 => [0, 0, 0],
        18 => [0, 0, 0],
        19 => [0, 0, 0],
        20 => [0, 0, 0],
        21 => [0, 0, 0],
        22 => [0, 0, 0],
        23 => [0, 0, 0],
        24 => [0, 0, 0],
        25 => [458, 214, 254],
        26 => [1411, 634, 719],
        27 => [912, 530, 595],
        28 => [418, 198, 234],
        29 => [719, 378, 435],
        30 => [341, 167, 196],
        31 => [346, 169, 198],
        32 => [556, 310, 351],
        33 => [671, 329, 386],
        34 => [2459, 1334, 1521],
        35 => [813, 409, 477],
        36 => [2439, 1255, 1453],
        37 => [0, 0, 0],
        38 => [0, 0, 0],
        39 => [0, 0, 0],
        40 => [0, 0, 0],
        41 => [0, 0, 0],
        42 => [0, 0, 0],
        43 => [0, 0, 0],
        44 => [0, 0, 0],
        45 => [0, 0, 0],
        46 => [0, 0, 0],
        47 => [0, 0, 0],
        48 => [171, 106, 117],
        49 => [75, 48, 52],
        50 => [138, 73, 84],
        51 => [66, 43, 47],
        52 => [389, 227, 254],
        53 => [397, 184, 219],
        54 => [209, 144, 155],
        55 => [461, 307, 332],
        56 => [269, 160, 178],
        57 => [415, 225, 257],
        58 => [253, 154, 170],
        59 => [758, 436, 490],
        60 => [252, 147, 164],
        61 => [1848, 1888, 1298],
        62 => [1848, 1188, 1298],
        63 => [1885, 1203, 1317],
        64 => [2646, 1698, 1856],
        65 => [2646, 1698, 1856],
        66 => [2646, 1698, 1856],
        67 => [2449, 1557, 1706],
        68 => [2449, 1557, 1706],
        69 => [2831, 1710, 1897],
        70 => [426, 253, 282],
        71 => [426, 253, 282],
        72 => [426, 253, 282],
        73 => [415, 255, 281],
        74 => [415, 255, 281],
        75 => [415, 255, 281],
        76 => [894, 490, 557],
        77 => [894, 490, 557],
        78 => [894, 490, 557],
        79 => [545, 338, 373],
        80 => [545, 338, 373],
        81 => [561, 345, 381],
        82 => [610, 398, 434],
        83 => [610, 398, 434],
        84 => [626, 405, 442],
        85 => [899, 524, 586],
        86 => [899, 524, 586],
        87 => [899, 524, 586],
        88 => [1108, 652, 728],
        89 => [1108, 652, 728],
        90 => [1108, 652, 728],
        91 => [1717, 1016, 1133],
        92 => [1717, 1016, 1133],
        93 => [1717, 1016, 1133],
        94 => [2648, 1268, 1498],
        95 => [2648, 1268, 1498],
        96 => [2648, 1268, 1498]
    ];
}
