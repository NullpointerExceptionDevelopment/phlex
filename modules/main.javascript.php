<?php


class javascript{
    function cube() {
        echo "
        <script src='jquery/jquery-3.2.1.slim.min.js'></script>
        <script src='jquery/jquery.plate.js'></script>
        <script>
            $('#plate-default').plate();
            $('#plate-inverse').plate({
                inverse: true,
                maxRotation: 40
            });
        </script>
        ";
        return 0;

    }
        
}
