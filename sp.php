<?php
namespace np;
use \think\Controller;
Class Test extends Controller{
 function Getmsg(){

    echo this->fetch();
}

}

namespace np1;
function Getmsg(){

    echo "456";
}
\np\Getmsg();