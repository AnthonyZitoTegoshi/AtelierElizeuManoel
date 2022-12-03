<?php

    namespace App\Helper;

    class LevelHelper{
        static function verifyLV($resultLevel){ //O result level basicamente tem que corresponder ao meu nível
            switch ($resultLevel) {
                case ($resultLevel == '00000'): //casos a serem analisados 
                    echo "You dont have permission to access this service";
                    return false;
                    session_destroy();
                    break;
                
                case ($resultLevel[0] == '1'):
                    echo "This is your permission";
                    break;

                case ($resultLevel[1] == '1'):
                    echo "This is your permission";
                    # code...
                    break;
                
                case ($resultLevel[2] == '1'):
                    echo "This is your permission";
                    # code...
                    break;

                case ($resultLevel[3] == '1'):
                    echo "This is your permission";
                    # code...
                    break;
                
                case ($resultLevel[4] == '1'):
                    echo "This is your permission";
                    # code...
                    break;
            }
        }
    }




?>