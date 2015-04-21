<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    @include('master.meta')
    <title>Telkom University</title>

    <style type="text/css">
        img { max-width: 600px; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic;}
        a img { border: none; }
        table { border-collapse: collapse !important;}
        #outlook a { padding:0; }
        .ReadMsgBody { width: 100%; }
        .ExternalClass { width: 100%; }
        .backgroundTable { margin: 0 auto; padding: 0; width: 100% !important; }
        table td { border-collapse: collapse; }
        .ExternalClass * { line-height: 115%; }
        .container-for-gmail-android { min-width: 600px; }

        /* General styling */
        * {
            font-family: Helvetica, Arial, sans-serif;
        }

        body {
            -webkit-font-smoothing: antialiased;
            -webkit-text-size-adjust: none;
            width: 100% !important;
            margin: 0 !important;
            height: 100%;
            color: #676767;
        }

        td {
            font-family: Helvetica, Arial, sans-serif;
            font-size: 14px;
            color: #777777;
            text-align: center;
            line-height: 21px;
        }

        a {
            color: #4a89dc;
            font-weight: bold;
            text-decoration: none !important;
        }

        .pull-left {
            text-align: left;
        }

        .pull-right {
            text-align: right;
        }

        .header-lg,
        .header-md,
        .header-sm {
            font-size: 32px;
            font-weight: 700;
            line-height: normal;
            padding: 35px 0 0;
            color: #4d4d4d;
        }

        .header-md {
            font-size: 24px;
        }

        .header-sm {
            padding: 5px 0;
            font-size: 18px;
            line-height: 1.3;
        }

        .content-padding {
            padding: 20px 0 30px;
        }

        .mobile-header-padding-right {
            width: 290px;
            text-align: right;
            padding-left: 10px;
        }

        .mobile-header-padding-left {
            width: 290px;
            text-align: left;
            padding-left: 10px;
            padding-bottom: 8px;
        }

        .free-text {
            width: 100% !important;
            padding: 10px 60px 0px;
        }

        .block-rounded {
            border-radius: 5px;
            border: 1px solid #e5e5e5;
            vertical-align: top;
        }

        .button {
            padding: 30px 0 0;
        }

        .info-block {
            padding: 0 20px;
            width: 260px;
        }

        .mini-block-container {
            padding: 30px 50px;
            width: 500px;
        }

        .mini-block {
            background-color: #ffffff;
            width: 498px;
            border: 1px solid #e1e1e1;
            border-radius: 5px;
            padding: 45px 75px;
        }

        .block-rounded {
            width: 260px;
        }

        .info-img {
            width: 258px;
            border-radius: 5px 5px 0 0;
        }

        .force-width-img {
            width: 480px;
            height: 1px !important;
        }

        .force-width-full {
            width: 600px;
            height: 1px !important;
        }

        .user-img img {
            width: 130px;
            border-radius: 5px;
            border: 1px solid #cccccc;
        }

        .user-img {
            text-align: center;
            border-radius: 100px;
            color: #4a89dc;
            font-weight: 700;
        }

        .user-msg {
            padding-top: 10px;
            font-size: 14px;
            text-align: center;
            font-style: italic;
        }

        .mini-img {
            padding: 5px;
            width: 140px;
        }

        .mini-img img {
            border-radius: 5px;
            width: 140px;
        }

        .force-width-gmail {
            min-width:600px;
            height: 0px !important;
            line-height: 1px !important;
            font-size: 1px !important;
        }

        .mini-imgs {
            padding: 25px 0 30px;
        }
    </style>

    <style type="text/css" media="screen">
        @import url(http://fonts.googleapis.com/css?family=Oxygen:400,700);
    </style>

    <style type="text/css" media="screen">
        @media screen {
            /* Thanks Outlook 2013! http://goo.gl/XLxpyl */
            * {
                font-family: 'Oxygen', 'Helvetica Neue', 'Arial', 'sans-serif' !important;
            }
        }
    </style>

    <style type="text/css" media="only screen and (max-width: 480px)">
        /* Mobile styles */
        @media only screen and (max-width: 480px) {

            table[class*="container-for-gmail-android"] {
                min-width: 290px !important;
                width: 100% !important;
            }

            table[class="w320"] {
                width: 320px !important;
            }

            img[class="force-width-gmail"] {
                display: none !important;
                width: 0 !important;
                height: 0 !important;
            }

            td[class*="mobile-header-padding-left"] {
                width: 160px !important;
                padding-left: 0 !important;
            }

            td[class*="mobile-header-padding-right"] {
                width: 160px !important;
                padding-right: 0 !important;
            }

            td[class="mobile-block"] {
                display: block !important;
            }

            td[class="mini-img"],
            td[class="mini-img"] img{
                width: 150px !important;
            }

            td[class="header-lg"] {
                font-size: 24px !important;
                padding-bottom: 5px !important;
            }

            td[class="header-md"] {
                font-size: 18px !important;
                padding-bottom: 5px !important;
            }

            td[class="content-padding"] {
                padding: 5px 0 30px !important;
            }

            td[class="button"] {
                padding: 5px !important;
            }

            td[class*="free-text"] {
                padding: 10px 18px 30px !important;
            }

            img[class="force-width-img"],
            img[class="force-width-full"] {
                display: none !important;
            }

            td[class="info-block"] {
                display: block !important;
                width: 280px !important;
                padding-bottom: 40px !important;
            }

            td[class="info-img"],
            img[class="info-img"] {
                width: 278px !important;
            }

            td[class="mini-block-container"] {
                padding: 8px 20px !important;
                width: 280px !important;
            }

            td[class="mini-block"] {
                padding: 20px !important;
            }

            td[class="user-img"] {
                display: block !important;
                text-align: center !important;
                width: 100% !important;
                padding-bottom: 10px;
            }

            td[class="user-msg"] {
                display: block !important;
                padding-bottom: 20px;
            }
        }
    </style>
</head>

<body bgcolor="#f7f7f7">
<table align="center" cellpadding="0" cellspacing="0" class="container-for-gmail-android" width="100%">
    <tr>
        <td align="left" valign="top" width="100%" style="background:repeat-x url(http://s3.amazonaws.com/swu-filepicker/4E687TRe69Ld95IDWyEg_bg_top_02.jpg) #ffffff;">
            <center>
                <img src="http://s3.amazonaws.com/swu-filepicker/SBb2fQPrQ5ezxmqUTgCr_transparent.png" class="force-width-gmail">
                <table cellspacing="0" cellpadding="0" width="100%" bgcolor="#ffffff" background="http://s3.amazonaws.com/swu-filepicker/4E687TRe69Ld95IDWyEg_bg_top_02.jpg" style="background-color:transparent">
                    <tr>
                        <td width="100%" height="80" valign="top" style="text-align: center; vertical-align:middle;">

                            <center>
                                <table cellpadding="0" cellspacing="0" width="600" class="w320">
                                    <!--<tr>
                                        <td class="pull-left mobile-header-padding-left" style="vertical-align: middle;">
                                            <a href=""><img width="167" height="35" src="/templates/theme/email-templates/img/logo.png" alt="logo"></a>
                                        </td>
                                        <td class="pull-right mobile-header-padding-right" style="color: #4d4d4d;">
                                            <a href=""><img width="40" height="47" src="/templates/theme/email-templates/social-fb.png" alt="facebook" /></a>
                                        </td>
                                    </tr>-->
                                </table>
                            </center>

                        </td>
                    </tr>
                </table>
            </center>
        </td>
    </tr>
    <tr>
        <td align="center" valign="top" width="100%" style="background-color: #f7f7f7;" class="content-padding">
            <center>
                <table cellspacing="0" cellpadding="0" width="600" class="w320">
                    <tr>
                        <td class="header-lg">
                            <strong>Telkom University Store</strong>!
                        </td>
                    </tr> 
                    <tr>
                        <td class="mini-block-container">
                            <table cellspacing="0" cellpadding="0" width="100%"  style="border-collapse:separate !important;">
                                <tr>
                                    <td class="mini-block">
                                        <table cellpadding="0" cellspacing="0" width="100%">
                                            <tr>
                                                <td>
                                                    <table cellspacing="0" cellpadding="0" width="100%">
                                                        <tr>
                                                            <td class="free-text">
                                                                Due you action in our Marketplace,
                                                                Administrator of <strong>Telkom University Store</strong> has been delete your account which has role as <strong>Moderator</strong>.
                                                                Please contact us for further Information, feel free to sent an email to <strong>telkomuniversitystrore@gmail.com</strong>
                                                                or you can contact <strong>Telkom Univeristy Store Management</strong>.
                                                            </td>
                                                        </tr><br>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </center>
        </td>
    </tr>

    <tr>
        <td align="center" valign="top" width="100%" style="background-color: #f7f7f7; height: 100px;">
            <center>
                <table cellspacing="0" cellpadding="0" width="600" class="w320">
                    <tr>
                        <td style="padding: 25px 0 25px">
                            <strong><a href="#">Telkom University Store</a></strong><br />
                            store.telkomuniversity.ac.id<br/>
                            Bandung,West Java,Indonesia <br /><br />
                        </td>
                    </tr>
                </table>
            </center>
        </td>
    </tr>
</table>
</body>
</html>
