<?php

require 'boot.php';


$var = <<<'EOT'
<?php

namespace App\Controllers;

class Controller {

    /*
    Test
    */
    /**
    @route get /
    */
    public function index()
    {
        
    }

}
EOT;


new \Kernel\Router\RoutesTokenizer($var);