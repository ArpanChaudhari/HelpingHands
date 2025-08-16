<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>{{ config('app.name') }}</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="color-scheme" content="light">
<meta name="supported-color-schemes" content="light">
<style>
@media only screen and (max-width: 600px) {
.inner-body {
width: 100% !important;
}

.footer {
width: 100% !important;
}
}

@media only screen and (max-width: 500px) {
.button {
width: 100% !important;
}
}
    body, table, td {
        font-family: 'Segoe UI', sans-serif !important;
        font-size: 17px !important;
        color: #333 !important;
        line-height: 1.6 !important;
    }

    h1, h2, h3 {
        color: #2c3e50 !important;
        font-weight: 600 !important;
    }

    a {
        color: #1a73e8 !important;
    }

    .wrapper {
        background-color: #f4f4f4 !important;
    }

    .inner-body {
        background-color: #ffffff !important;
        border-radius: 10px;
        padding: 30px !important;
        box-shadow: 0 4px 8px rgba(0,0,0,0.05);
    }

    .footer {
        text-align: center !important;
        font-size: 14px !important;
        color: #999999 !important;
        padding: 20px;
    }

</style>
{!! $head ?? '' !!}
</head>
<body>

<table class="wrapper" width="100%" cellpadding="0" cellspacing="0" role="presentation">
<tr>
<td align="center">
<table class="content" width="100%" cellpadding="0" cellspacing="0" role="presentation">
{!! $header ?? '' !!}

<!-- Email Body -->
<tr>
<td class="body" width="100%" cellpadding="0" cellspacing="0" style="border: hidden !important;">
<table class="inner-body" align="center" width="570" cellpadding="0" cellspacing="0" role="presentation">
<!-- Body content -->
<tr>
<td class="content-cell">
{!! Illuminate\Mail\Markdown::parse($slot) !!}

{!! $subcopy ?? '' !!}
</td>
</tr>
</table>
</td>
</tr>

{!! $footer ?? '' !!}
</table>
</td>
</tr>
</table>
</body>
</html>
