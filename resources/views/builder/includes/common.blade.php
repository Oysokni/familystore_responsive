<div class="row grid-items items">
    <div class="col-md-12 col-xs-12 item-2">
        <div class="inner">
            <div class="item-body">
                <h4 class="item-title">
                    <p>1</p><p> 都道府県を選択</p>
                </h4>
                <div class="content">
                    <div class="form-group {{ $errors->has('district') ? 'has-error' : ''}}" >
                        <select class="form-control" id="districts" tabindex="1">
                            <option value="">都道府県を選択（地図からでもプルダウンからでも選べます）</option>
                            @foreach ($districts as $key => $value)
                            <option
                                @if(isset($old['districts']) && old('districts') == $key) selected @endif
                                value="{{$key}}">{{$value}}</option>
                            @endforeach
                        </select>
                        <span class="error-mess">{{ $errors->first('district') }}</span>
                    </div>
                    <div class="map-area">
                        <canvas></canvas>
                        <img src="../images/products/select-prefecture-img.jpg" class="map-area maphilighted" usemap="#map-district"/>
                    </div>
                    <map id="map-district" name="map-district" class="map-district">
                        <!-- 0:北海道 -->
                        <area shape="poly" coords="490,0,665,0,665,105,530,105,530,137,490,137" href="javascript:void(0)" key="0" data="北海道">
                        <!-- 1:青森県 -->
                        <area shape="poly" coords="490,150,529,150,529,165,568,165,568,150,630,150,630,188,490,188" href="javascript:void(0)" key="1" data="青森県">
                        <!-- 2:岩手県 -->
                        <area shape="rect" coords="563,190,630,235" href="javascript:void(0)" key="2" data="岩手県">
                        <!-- 3:宮城県 -->
                        <area shape="rect" coords="563,238,630,289" href="javascript:void(0)" key="3" data="宮城県">
                        <!-- 4:秋田県 -->
                        <area shape="rect" coords="490,190,560,235" href="javascript:void(0)" key="4" data="秋田県">
                        <!-- 5:山形県 -->
                        <area shape="poly" coords="490,238,560,238,560,289,521,289,521,283,490,283" href="javascript:void(0)" key="5" data="山形県">
                        <!-- 6:福島県 -->
                        <area shape="rect" coords="521,292,630,338" href="javascript:void(0)" key="6" data="福島県">
                        <!-- 7:茨城県 -->
                        <area shape="rect" coords="580,340,630,410" href="javascript:void(0)" key="7" data="茨城県">
                        <!-- 8:栃木県 -->
                        <area shape="rect" coords="531,340,578,377" href="javascript:void(0)" key="8" data="栃木県">
                        <!-- 9:群馬県 -->
                        <area shape="rect" coords="484,340,528,377" href="javascript:void(0)" key="9" data="群馬県">
                        <!-- 10:埼玉県 -->
                        <area shape="poly" coords="484,378,578,378,578,403,515,403,515,391,484,391" href="javascript:void(0)" key="10" data="埼玉県">
                        <!-- 11:千葉県 -->
                        <area shape="poly" coords="580,413,630,413,630,472,585,472,585,428,580,428" href="javascript:void(0)" key="11" data="千葉県">
                        <!-- 12:東京都 -->
                        <area shape="poly" coords="515,407,578,407,578,429,562,429,562,432,515,432" href="javascript:void(0)" key="12" data="東京都">
                        <!-- 13:神奈川県 -->
                        <area shape="rect" coords="515,434,562,462" href="javascript:void(0)" key="13" data="神奈川県">
                        <!-- 14:新潟県 -->
                        <area shape="poly" coords="412,315,490,286,518,286,518,338,412,338" href="javascript:void(0)" key="14" data="新潟県">
                        <!-- 15:富山県 -->
                        <area shape="poly" coords="362,333,410,315,410,357,362,357" href="javascript:void(0)" key="15" data="富山県">
                        <!-- 16:石川県 -->
                        <area shape="poly" coords="305,350,318,345,318,310,350,310,348,340,359,335,360,350" href="javascript:void(0)" key="16" data="石川県">
                        <!-- 17:福井県 -->
                        <area shape="rect" coords="298,352,359,369" href="javascript:void(0)" key="17" data="福井県">
                        <!-- 18:山梨県 -->
                        <area shape="rect" coords="463,395,512,428" href="javascript:void(0)" key="18" data="山梨県">
                        <!-- 19:長野県 -->
                        <area shape="poly" coords="403,360,412,360,412,340,482,340,482,391,460,391,460,431,403,431" href="javascript:void(0)" key="19" data="長野県">
                        <!-- 20:岐阜県 -->
                        <area shape="poly" coords="358,372,362,372,362,359,401,359,401,431,357,431" href="javascript:void(0)" key="20" data="岐阜県">
                        <!-- 21:静岡県 -->
                        <area shape="poly" coords="422,433,463,433,463,429,512,429,512,469,483,469,483,457,466,457,440,469,422,469" href="javascript:void(0)" key="21" data="静岡県">
                        <!-- 22:愛知県 -->
                        <area shape="poly" coords="357,434,420,434,420,470,372,470,372,447,357,447" href="javascript:void(0)" key="22" data="愛知県">
                        <!-- 23:三重県 -->
                        <area shape="rect" coords="335,428,354,510" href="javascript:void(0)" key="23" data="三重県">
                        <!-- 24:滋賀県 -->
                        <area shape="rect" coords="312,372,354,425" href="javascript:void(0)" key="24" data="滋賀県">
                        <!-- 25:京都府 -->
                        <area shape="poly" coords="285,353,295,353,295,372,308,372,308,407,285,407" href="javascript:void(0)" key="25" data="京都府">
                        <!-- 26:大阪府 -->
                        <area shape="poly" coords="285,410,308,410,308,458,290,458,290,415,285,415" href="javascript:void(0)" key="26" data="大阪府">
                        <!-- 27:兵庫県 -->
                        <area shape="rect" coords="247,352,282,415" href="javascript:void(0)" key="27" data="兵庫県">
                        <!-- 28:奈良県 -->
                        <area shape="rect" coords="312,427,333,470" href="javascript:void(0)" key="28" data="奈良県">
                        <!-- 29:和歌山県 -->
                        <area shape="poly" coords="290,461,309,461,309,473,333,473,333,511,290,511" href="javascript:void(0)" key="29" data="和歌山県">
                        <!-- 30:鳥取県 -->
                        <area shape="rect" coords="210,352,245,373" href="javascript:void(0)" key="30" data="鳥取県">
                        <!-- 31:島根県 -->
                        <area shape="rect" coords="173,352,207,373" href="javascript:void(0)" key="31" data="島根県">
                        <!-- 32:岡山県 -->
                        <area shape="rect" coords="210,376,245,415" href="javascript:void(0)" key="32" data="岡山県">
                        <!-- 33:広島県 -->
                        <area shape="rect" coords="173,376,207,415" href="javascript:void(0)" key="33" data="広島県">
                        <!-- 34:山口県 -->
                        <area shape="rect" coords="150,352,170,415" href="javascript:void(0)" key="34" data="山口県">
                        <!-- 35:徳島県 -->
                        <area shape="rect" coords="227,445,283,464" href="javascript:void(0)" key="35" data="徳島県">
                        <!-- 36:香川県 -->
                        <area shape="rect" coords="227,427,283,443" href="javascript:void(0)" key="36" data="香川県">
                        <!-- 37:愛媛県 -->
                        <area shape="rect" coords="170,427,225,464" href="javascript:void(0)" key="37" data="愛媛県">
                        <!-- 38:高知県 -->
                        <area shape="rect" coords="170,466,283,490" href="javascript:void(0)" key="38" data="高知県">
                        <!-- 39:福岡県 -->
                        <area shape="rect" coords="75,352,145,412" href="javascript:void(0)" key="39" data="福岡県">
                        <!-- 40:佐賀県 -->
                        <area shape="poly" coords="33,352,71,352,71,412,41,412,41,406,33,406" href="javascript:void(0)" key="40" data="佐賀県">
                        <!-- 41:長崎県 -->
                        <area shape="rect" coords="0,352,30,407" href="javascript:void(0)" key="41" data="長崎県">
                        <!-- 42:熊本県 -->
                        <area shape="rect" coords="42,415,82,507" href="javascript:void(0)" key="42" data="熊本県">
                        <!-- 43:大分県 -->
                        <area shape="rect" coords="85,415,145,450" href="javascript:void(0)" key="43" data="大分県">
                        <!-- 44:宮崎県 -->
                        <area shape="rect" coords="85,452,145,515" href="javascript:void(0)" key="44" data="宮崎県">
                        <!-- 45:鹿児島県 -->
                        <area shape="poly" coords="41,510,83,510,83,517,145,517,145,535,41,535" href="javascript:void(0)" key="45" data="鹿児島県">
                        <!-- 46:沖縄県 -->
                        <area shape="rect" coords="0,482,28,537" href="javascript:void(0)" key="46" data="沖縄県">
                    </map>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-12 col-xs-12 item-3">
        <div class="inner">
            <div class="item-body">
                <h4 class="item-title">
                    <p>2</p><p> 希望案件種別</p>
                </h4>
                <div class="content-2">
                    <ul>
                        <li>
                            <div>
                                <p>
                                    <input type="checkbox" id="radio-house" name="radio-house-type" value="0">
                                    <label for="radio-house">一戸建て</label>
                                </p>
                            </div>
                        </li>
                        <li class="first-option">
                            <ul>
                                <li>
                                    <p>希望対応先（複数選択可）</p>
                                    <ul>
                                        <li>
                                            <div>
                                                <p>
                                                    <input type="checkbox" id="checkbox-house-option-1" name="radio-group" value="2">
                                                        <label for="checkbox-house-option-1" tabindex="2">大手ハウスメーカー大手地場ビルダー</label>
                                                </p>
                                            </div>
                                        </li>
                                        <li>
                                            <div>
                                                <p>
                                                    <input type="checkbox" id="checkbox-house-option-2" name="radio-group" value="3" >
                                                    <label for="checkbox-house-option-2" tabindex="3">LIXILグループFC加盟ビルダー（アイフルホーム等）</label>
                                                </p>
                                            </div>
                                        </li>
                                        <li>
                                            <div>
                                                <p>
                                                    <input type="checkbox" id="checkbox-house-option-3" name="radio-group" value="4" >
                                                    <label tabindex="4" for="checkbox-house-option-3">スーパーウォール工法 取扱店</label>
                                                </p>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <div>
                                <p>
                                    <input type="checkbox" id="radio-mansion" name="radio-house-type-2" value="1" >
                                    <label for="radio-mansion" tabindex="5" >マンション</label>
                                </p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xs-12 item-4">
        <div class="inner">
            <div class="item-body">
                <h4 class="item-title">
                    <p>検索条件</p>
                </h4>
                <div class="content-2">
                    <div class="selected-option">
                        <p id="district-label"></p>
                        <p id="type-label"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="col-lg-12">
        <div class="arrow-down"></div>
    </div>
</div>
<!--end list-->
<form action="{{ route('builder.search') }}" method="get">
    <input type='hidden' id="district" name="district" value="{{ old('district') }}" />
    <input type='hidden' id="type" name="type" value="{{ old('type') != null ? old('type') : $oldType }}" />
    <button type="submit" tabindex="6"  class="action-btn btn-block custom-btn">検索する</button>
</form>