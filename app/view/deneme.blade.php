<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>

    <form action="post" method="post">
        <input type="text" name="dddd" id="">
        <button>Post Et</button>
    </form>

    {{ $flash['error'] }}

    <hr>
    {{ Tuva::url('/hakkımızda/panpa') }}
    <hr>
    {{ Tuva::assets('genel.png') }}
    <hr>
    {{ Tuva::css('genel.css') }}
    <hr>

    <hr>
    {{ Tuva::js('genel.js') }}
    <hr>

    <hr>
    Haberler dili : {{ Tuva::lang('Haberler') }}
    <hr>

    <hr>
    Haberler dili : {{ LANG }}
    <hr>

    <hr>
    Dil Degiştir: <a href="{{ Tuva::url('/lang/tr') }}"> Seç</a>
    <hr>

....
</body>
</html>

 {{ $user }}
