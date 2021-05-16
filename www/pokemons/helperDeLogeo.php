<?php
    function mostrarEdicion() {
        return isset($_SESSION['logueado']) ? true :  false;
    }
    function getTipoSegunUrl($url) {
        switch ($url) {
            case "/recursos/tipo/fuego.png":
                return "fuego";
            case "/recursos/tipo/tierra.png":
                return "tierra";
            case "/recursos/tipo/viento.png":
                return "viento";
            case "/recursos/tipo/agua.png":
                return "agua";
        }
    }
?>
