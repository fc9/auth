@extends('emails.layouts.adidas')

@section('email-css')
@endsection

@section('subject', $title)

@section('title', \Illuminate\Support\Str::upper($title))

@section('email-logo')
    <img name="header-logo-image" id="header-logo-image" src="@lang('auth.logo')" class="centerImage" border="0"
         alt="{{ env('APP_NAME') }}" style="display:block;">
@endsection

@section('email-content')
    <table width="640" border="0" cellpadding="0" cellspacing="0"
           class="container">
        <tr>
            <td aling="center">
                <table width="400" border="0" cellpadding="10"
                       style="margin:.1rem auto;font-size:45px;text-align:center;font-weight:900;color:#666">
                    <td aling="center">
                        <table width="65" border="0" cellpadding="0" bgcolor="#fff" cellspacing="0">
                            <tr>
                                <td class="code" style="padding:9px 0">{{ substr($token, 0, 1) }}</td>
                            </tr>
                        </table>
                    </td>
                    <td>
                        <table width="65" border="0" cellpadding="0" bgcolor="#fff"
                               cellspacing="0">
                            <tr>
                                <td class="code" style="padding:9px 0">{{ substr($token, 1, 1) }}</td>
                            </tr>
                        </table>
                    </td>
                    <td>
                        <table width="65" border="0" cellpadding="0" bgcolor="#fff"
                               cellspacing="0">
                            <tr>
                                <td class="code" style="padding:9px 0">{{ substr($token, 2, 1) }}</td>
                            </tr>
                        </table>
                    </td>
                    <td>
                        <table width="65" border="0" cellpadding="0" bgcolor="#fff"
                               cellspacing="0">
                            <tr>
                                <td class="code" style="padding:9px 0">{{ substr($token, 3, 1) }}</td>
                            </tr>
                        </table>
                    </td>
                    <td>
                        <table width="65" border="0" cellpadding="0" bgcolor="#fff"
                               cellspacing="0">
                            <tr>
                                <td class="code" style="padding:9px 0">{{ substr($token, 4, 1) }}</td>
                            </tr>
                        </table>
                    </td>
                </table>
            </td>
        </tr>
        <tr>
            <td align="center" valign="top"
                style="font-family:Arial; font-size:18px; color:#333333; padding-top:60px; line-height:25px; padding-left:38px; padding-right:38px;">
                Use o código acima para confirmar seu e-mail.
                <span style="margin:2px;"></span>
            </td>
        </tr>
    </table>
@endsection

@section('email-banner')
    <a href="" _label="SecondaryStoryImage1" title="advertisement" target="_blank">
        <img src="/images/template/emails/banner.jpg"
             border="0" alt="Advertisement" width="640" style="display:block;">
    </a>
@endsection