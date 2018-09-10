<!DOCTYPE html>
<html dir="ltr">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        @yield('css')
    </head>

    <body leftmargin="0" marginwidth="0" topmargin="0" marginheight="0" offset="0" style="color: #000">

        <div id="wrapper" dir="ltr" style="word-wrap: break-word;">

            <table border="0" cellpadding="0" cellspacing="0" height="100%" width="100%">
                <tr>
                    <td align="center" valign="top">
                        <table border="0" cellpadding="0" cellspacing="0" width="800" id="template_container">
                            <!-- Header -->
                            <tr>
                                <td colspan="2" align="center" valign="top">

                                </td>
                            </tr>
                            <!-- End Header -->
                            <!-- Body -->
                            <tr>
                                <td colspan="2" valign="top">
                                    <div id="body_content_inner" style="max-width: 800px; margin-bottom: 20px;">
                                        @yield('content')
                                    </div>
                                </td>
                            </tr>
                            <!--End body-->
                            <!-- Footer -->
                            <tr>
                                <td colspan="2" valign="top"
                                    style="border-top: 2px solid #000;
                                        border-bottom: 2px solid #000;
                                        padding-top: 8px;
                                        padding-bottom: 8px;
                                        line-height: 22px;">
                                    <div>上記、申し込み内容の、手配をお願いいたします。</div>
                                   
                                </td>
                            </tr>
                            <!-- End Footer -->
                        </table>
                    </td>
                </tr>
            </table>

        </div>

    </body>
</html>
