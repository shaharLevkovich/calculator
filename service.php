<?php
       
    class numbers{
        public $num1;
        public $num2;
        public $num3;
        public $func;

        public function __construct(){
            $method=$_SERVER['REQUEST_METHOD'];

            if($method == "PUT"){
                parse_str(file_get_contents("php://input"),$_PUT);
                $func=$_put['func'];
            }

            if(isset($_GET['num1'])){$this->num1=(int)$_GET['num1'];}
            else if(isset($_POST['num1'])){$this->num1=(int)$_POST['num1'];}
            else if(isset($_PUT['num1'])){$this->num1=(int)$_PUT['num1'];}
            else{$this->num1=0;}

            if(isset($_GET['num2'])){$this->num2=(int)$_GET['num2'];}
            else if(isset($_POST['num2'])){$this->num2=(int)$_POST['num2'];}
            else if(isset($_PUT['num2'])){$this->num2=(int)$_PUT['num2'];}
            else{$this->num2=0;}

            if(isset($_GET['num3'])){$this->num3=(int)$_GET['num3'];}
            else if(isset($_POST['num3'])){$this->num3=(int)$_POST['num3'];}
            else if(isset($_PUT['num3'])){$this->num3=(int)$_PUT['num3'];}
            else{$this->num3=0;}

            if(isset($_GET['func'])){$this->func=$_GET['func'];}
            else if(isset($_POST['func'])){$this->func=$_POST['func'];}
            else if(isset($_PUT['func'])){$this->func=$_PUT['func'];}
            else{$this->func='sum';}
        }
    }

    class calculator{
        public function sum($num1,$num2,$num3){
            $res = $num1 + $num2 + $num3;
            return $res;
        }
        public function avg($num1,$num2,$num3){
            $res = ($num1 + $num2 + $num3)/3;
            return $res;
        }
        public function mult($num1,$num2,$num3){
            $res = $num1 * $num2 * $num3;
            return $res;
        }

    }
    $number=new numbers;
    $calc=new calculator;
    
    if($number->func=='sum') {
        $res1=$calc->sum($number->num1,$number->num2,$number->num3);
    }
    else if($number->func == 'avg'){
        $res1=$calc->avg($number->num1,$number->num2,$number->num3);
    }
    else if($number->func == 'mult'){
        $res1=$calc->mult($number->num1,$number->num2,$number->num3);
    }
    else{
        return print('Error');
    }

    $a = array('retVal'=> $res1);
    header('Content-Type: application/json');
    echo json_encode($a);
?>