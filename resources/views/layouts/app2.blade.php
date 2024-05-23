<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon" href="/img/icon_pes.png">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Biblioteca</title>
    <link rel="stylesheet" href="{{ asset('css/div2.css') }}">
</head>
<body>
    <div id="max">
        <div id="cober">
            <div id="sup"><h4>EDICCION</h4></div>
            <div id="inf">
                <div id="l1"><p>Libro: </p></div>
                <div id="l2">
                    @yield('cont1')
                </div>
            </div>
        </div>
    </div>
</body>
</html>