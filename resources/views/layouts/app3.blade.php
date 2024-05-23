<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon" href="/img/icon_pes.png">
    <title>Biblioteca</title>
    <link rel="stylesheet" href="{{ asset('css/div3.css') }}">
</head>
<body>
    <div id="contenedor">
        <div id="div1">
            <div id="superior">
                <h4>BIENVENIDO</h4>
            </div>
            <div id="inferior">
                <div id="izquierda">
                    <div class="caja" id="caja1"></div>
                    <div class="caja" id="caja2"></div>
                    <div class="caja" id="caja3"></div>
                    <div class="caja" id="caja4"></div>
                    <div class="caja" id="caja5"></div>
                </div>
                <div id="derecha">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
</body>
</html>
