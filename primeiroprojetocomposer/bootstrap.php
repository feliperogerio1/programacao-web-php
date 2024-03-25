<?php

require __DIR__."/vendor/autoload.php";

$metodo = $_SERVER['REQUEST_METHOD'];
$caminho = $_SERVER['PATH_INFO'] ?? '/';

$r = new Php\Primeiroprojeto\Router($metodo, $caminho);

#ROTAS

$r->get('/olamundo', function (){
    return "Olá mundo!";
} );

$r->get('/olapessoa/{nome}', function($params){
    return 'Olá '.$params[1];
} );

$r->get('/exemplo/formulario', function(){
    include("exemplo.html");
});

$r->post('/exemplo/resposta', function(){
    $valor1 = $_POST['valor1'];
    $valor2 = $_POST['valor2'];
    $soma = $valor1 + $valor2;
    return "A soma é: {$soma}";
});

$r->get('/exercicio1/formulario', function() {
    include("exercicio1.html");
});

$r->post('/exercicio1/resposta', function(){
    $number = $_POST['number'];
    if($number > 0) {
        return "Valor Positivo";
    } else if($number == 0){
        return "Igual a Zero";
    } else{
        return "Valor Negativo";
    }
});

$r->get('/exercicio2/formulario', function(){
    include("exercicio2.html");
});

$r->post('/exercicio2/resposta', function(){
    $all_numbers = [];
    $all_numbers[] = $_POST['number1'];
    $all_numbers[] = $_POST['number2'];
    $all_numbers[] = $_POST['number3'];
    $all_numbers[] = $_POST['number4'];
    $all_numbers[] = $_POST['number5'];
    $all_numbers[] = $_POST['number6'];
    $all_numbers[] = $_POST['number7'];
    foreach ($all_numbers as $key => $number){
        if($key == 0){
            $lower_value = $number;
            $index_lower_value = $key;
        }
        if($number < $lower_value){
            $lower_value = $number;
            $index_lower_value = $key;
        }
    }
    echo "O menor valor é: $lower_value. Sua posição é: $index_lower_value.";
});

$r->get('/exercicio3/formulario', function(){
    include("exercicio3.html");
});

$r->post('/exercicio3/resposta', function(){
    $number1 = $_POST['number1'];
    $number2 = $_POST['number2'];
    $sum = $number1 + $number2;
    if($number1 == $number2){
        return "O triplo da soma dos números é: " . 3 * $sum;
    } else{
        echo "A soma dos números é: $sum.";
    }
});

$r->get('/exercicio4/formulario', function(){
    include("exercicio4.html");
});

$r->post('/exercicio4/resposta', function(){
    $number = $_POST['number'];
    for($i = 0; $i <= 10; $i++){
        echo "$number x $i = " . $number * $i . "<br>";
    }
});

$r->get('/exercicio5/formulario', function(){
    include("exercicio5.html");
});

$r->post('/exercicio5/resposta', function(){
    $number = $_POST['number'];
    $result = 1;
    for($i = $number; $i > 1; $i--) {
        if($i == $number){
            $result = $i * ($i - 1);
        } else{
            $result = $result * ($i - 1);
        }
    }
    echo "Fatorial de $number é: $result";
});

$r->get('/exercicio6/formulario', function(){
    include("exercicio6.html");
});

$r->post('/exercicio6/resposta', function(){
    $number1 = $_POST['number1'];
    $number2 = $_POST['number2'];
    if($number1 == $number2){
        return "Números iguais: $number1";
    } else{
        if($number1 < $number2){
            return "$number1 $number2";
        } else{
            return "$number2 $number1";
        }
    }
});

$r->get('/exercicio7/formulario', function(){
    include("exercicio7.html");
});

$r->post('/exercicio7/resposta', function(){
    $number = $_POST['number'];
    $numberInCentimeters = $number * 100;
    return "$numberInCentimeters centímetros.";
});

$r->get('/exercicio8/formulario', function(){
    include("exercicio8.html");
});

$r->post('/exercicio8/resposta', function(){
    $area = $_POST['area'];
    $liters = ceil($area / 3);
    $cans = ceil($liters / 18);
    return "É necessário $cans latas de tinta. O preço total é de " . $cans * 80 . ".";
});

$r->get('/exercicio9/formulario', function(){
    include("exercicio9.html");
});

$r->post('/exercicio9/resposta', function(){
    define("CURRENT_YEAR", 2024);
    $yearOfBirth = $_POST['year'];
    $age = CURRENT_YEAR - $yearOfBirth;
    $daysAlive = $age * 365;
    $age2025 = $age + 1;
    return "Idade atual: $age.<br>
    Dias vividos: $daysAlive.<br>
    Idade em 2025: $age2025.";
});

$r->get('/exercicio10/formulario', function(){
    include("exercicio10.html");
});

$r->post('/exercicio10/resposta', function(){
    $weight = $_POST['weight'];
    $height = $_POST['height'];
    $imc = $weight / pow($height, 2);
    if($imc < 18.5){
        $result = "magreza";
    } else if($imc >= 18.5 && $imc <= 24.9){
        $result = "normal";
    } else if($imc >= 25 && $imc <= 29.9){
        $result = "sobrepeso";
    } else if($imc >= 30 && $imc <= 39.9){
        $result = "obesidade";
    } else{
        $result = "obesidade grave";
    }
    echo "Sua classificação de índice IMC se encaixa em $result.<br>
        Para mais informações, visite a <a href='https://www.programasaudefacil.com.br/calculadora-de-imc' 
        target='_blank'>página</a>.";
});

#ROTAS

$resultado = $r->handler();

if(!$resultado){
    http_response_code(404);
    echo "Página não encontrada!";
    die();
}

echo $resultado($r->getParams());


