@extends('layout.mailNovaSugestao')

@section('content')
    <table class="es-content" cellspacing="0" cellpadding="0" align="center"
           style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%">
        <tr style="border-collapse:collapse">
            <td align="center" style="padding:0;Margin:0">
                <table class="es-content-body"
                       style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:transparent;width:600px"
                       cellspacing="0" cellpadding="0" align="center">
                    <tr style="border-collapse:collapse">
                        <td align="left" style="padding:0;Margin:0">
                            <table width="100%" cellspacing="0" cellpadding="0"
                                   style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                <tr style="border-collapse:collapse">
                                    <td valign="top" align="center" style="padding:0;Margin:0;width:600px">
                                        <table style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:separate;border-spacing:0px;border-radius:3px;background-color:#fcfcfc"
                                               width="100%" cellspacing="0" cellpadding="0"
                                               bgcolor="#fcfcfc" role="presentation">
                                            <tr style="border-collapse:collapse">
                                                <td class="es-m-txt-l" align="left"
                                                    style="padding:0;Margin:0;padding-left:20px;padding-right:20px;padding-top:30px">
                                                    <h2 style="Margin:0;line-height:31px;mso-line-height-rule:exactly;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif;font-size:26px;font-style:normal;font-weight:normal;color:#333333">
                                                        Nova Sugestão Cadastrada<br></h2></td>
                                            </tr>
                                            <tr style="border-collapse:collapse">
                                                <td bgcolor="#fcfcfc" align="left"
                                                    style="padding:0;Margin:0;padding-top:10px;padding-left:20px;padding-right:20px">
                                                    <p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:helvetica, 'helvetica neue', arial, verdana, sans-serif;line-height:21px;color:#333333;font-size:14px">
                                                        Olá, {{ Auth::user()->name }} sua sugestão foi
                                                        registrada com sucesso, agora aguarde a
                                                        avaliação...</p>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr style="border-collapse:collapse">
                        <td style="padding:0;Margin:0;padding-left:20px;padding-right:20px;padding-top:30px;background-color:#fcfcfc"
                            bgcolor="#fcfcfc" align="left">
                            <table width="100%" cellspacing="0" cellpadding="0"
                                   style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                <tr style="border-collapse:collapse">
                                    <td valign="top" align="center" style="padding:0;Margin:0;width:560px">
                                        <table style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:separate;border-spacing:0px;border-color:#efefef;border-style:solid;border-width:1px;border-radius:3px;background-color:#ffffff"
                                               width="100%" cellspacing="0" cellpadding="0"
                                               bgcolor="#ffffff" role="presentation">
                                            <tr style="border-collapse:collapse">
                                                <td align="center"
                                                    style="padding:0;Margin:0;padding-bottom:15px;padding-top:20px">
                                                    <h3 style="Margin:0;line-height:22px;mso-line-height-rule:exactly;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif;font-size:18px;font-style:normal;font-weight:normal;color:#333333">
                                                        Detalhes da sua Sugestão:</h3></td>
                                            </tr>
                                            <tr style="border-collapse:collapse">
                                                <td align="center" style="padding:0;Margin:0">
                                                    <p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:helvetica, 'helvetica neue', arial, verdana, sans-serif;line-height:24px;color:#64434a;font-size:16px">
                                                        Número:
                                                    </p>
                                                    <p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:helvetica, 'helvetica neue', arial, verdana, sans-serif;line-height:24px;color:#64434a;font-size:16px">
                                                        Autor:
                                                    </p>
                                                    <p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:helvetica, 'helvetica neue', arial, verdana, sans-serif;line-height:24px;color:#64434a;font-size:16px">
                                                        Título:
                                                    </p>
                                                    <p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:helvetica, 'helvetica neue', arial, verdana, sans-serif;line-height:24px;color:#64434a;font-size:16px">
                                                        Descrição:
                                                    </p>
                                                </td>
                                            </tr>
                                            <tr style="border-collapse:collapse">
                                                <td align="center"
                                                    style="Margin:0;padding-left:10px;padding-right:10px;padding-top:20px;padding-bottom:20px">
                                                    <span class="es-button-border"
                                                          style="border-style:solid;border-color:transparent;background:#f8f3ef;border-width:0px;display:inline-block;border-radius:3px;width:auto"><a
                                                                href="http://portalideias.paracatu.mg.gov.br/appIdeiasSugestoes/public/login"
                                                                class="es-button" target="_blank"
                                                                style="mso-style-priority:100 !important;text-decoration:none;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;color:#64434A;font-size:17px;border-style:solid;border-color:#f8f3ef;border-width:10px 20px 10px 20px;display:inline-block;background:#f8f3ef;border-radius:3px;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif;font-weight:normal;font-style:normal;line-height:20px;width:auto;text-align:center">Acompanhar</a></span>
                                                </td>
                                            </tr>
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
@endsection
