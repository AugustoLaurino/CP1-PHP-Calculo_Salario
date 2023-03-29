<?php
function calcularINSS($salario = 0){
  $calculo = 0;

  if ($salario <= 1302) {
    $calculo = $salario * 0.075;
  }
  if ($salario > 1302 && $salario <= 2571.29) {
    $calculo = (1302 * 0.075) + ($salario - 1302) * 0.09;
  }
  if ($salario > 2571.29 && $salario <= 3856.94) {
    $calculo = (1302 * 0.075) + ((2571.29 - 1302) * 0.09) + ($salario - 2571.29) * 0.12;
  }
  if ($salario > 3856.94 && $salario <= 7507.49) {
    $calculo = (1302 * 0.075) + ((2571.29 - 1302) * 0.09) + ((3856.94 - 2571.29) * 0.12) + ($salario - 3856.94) * 0.14;
  }
  if ($salario > 7507.49) {
    $calculo = 877.24;
  }

  return $calculo;
}

function calcularIRRF($salario = 0, $dependente = 0) {
  $ir = 0;
  $inss = calcularINSS($salario);
  $base = $salario - $inss - ($dependente * 189.59);

  switch (true) {
    case $base <= 1903.98:
      $ir = 0;
      break;
    case $base > 1903.98 and $base <= 2826.65:
      $ir = ($base * 0.075) - 142.8;
      break;
    case $base > 2826.65 and $base <= 3751.05:
      $ir = ($base * 0.15) - 354.8;
      break;
    case $base > 3751.05 and $base <= 4664.68:
      $ir = ($base * 0.225) - 636.13;
      break;
    case $base > 4664.68:
      $ir = ($base * 0.275) - 869.36;
      break;
  }

  return $ir;
}

function calcularVR($dt){ 
    $valor_diario_vr = 25;
    $valorVR = $valor_diario_vr * $dt;
    return $valorVR;
}

?>