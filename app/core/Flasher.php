<?php

class Flasher {
    public static function setFlash(string $pesan, string $type) {
        $_SESSION["flash"] = ['pesan' => $pesan, 'type' => $type];
    }

    public static function getFlash() {
        if(isset($_SESSION["flash"])) {
            echo "
            <script>
                showToast('{$_SESSION['flash']['type']}','{$_SESSION['flash']['pesan']}');
            </script>
            ";
        unset($_SESSION["flash"]);
        }
    }
}