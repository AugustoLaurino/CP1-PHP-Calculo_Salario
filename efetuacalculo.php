<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Calcular salário líquido</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
</head>

<body class="bg-dark d-flex flex-column align-items-center justify-content-center">
  <div class="bg-secondary text-dark border border-dark rounded col-6">
    <div class="bg-info">
      <div class="container p-3">
        <div class="display-3 text-center">Calcular salário</div>
      </div>
    </div>

    <div class="container d-flex flex-column align-items-center justify-content-center p-5">
      <form class="col-6 mb-5" method="POST">
        <div class="row mb-5">
          <label for="salario" class="form-label">Salário</label>
          <input type="number" class="form-control" id="salario" name="salario" value="0" min="0" />
        </div>

        <div class="row mb-5">
          <label for="dependente" class="form-label">Dependentes</label>
          <input type="number" class="form-control" id="dependente" name="dependente" value="0" min="0" />
        </div>

        <div class="row gap-2 justify-content-center">
          <button type="submit" class="btn btn-info col-4">
            Calcular
          </button>
        </div>
      </form>

      <?php
      include "calculosalario.php";

      if (isset($_POST['salario']) && isset($_POST['dependente'])) {
        $salario = $_POST['salario'];
        $dependente = $_POST['dependente'];

        $inss = calcularINSS($salario);
        $irrf = calcularIRRF($salario);
        $liquido = round($salario, 2) - calcularINSS($salario) - calcularIRRF($salario, $dependente);

        echo '
      <div>
        <h2 class="mb-3">Resultado:</h2>
        <div class="row">
          <p>
            <strong>Salário Bruto:</strong>
            R$ ' . number_format($salario, 2, ',', '.') . '
          </p>
        </div>
        <div class="row">
          <p>
            <strong>INSS:</strong>
            R$ ' . number_format($inss, 2, ',', '.') . '
          </p>
        </div>
        <div class="row">
          <p>
            <strong>IRRF:</strong>
            R$ ' . number_format($irrf, 2, ',', '.') . '
          </p>
        </div>
        <div class="row">
          <p>
            <strong>Salário Líquido:</strong>
            R$ ' . number_format($liquido, 2, ',', '.') . '
          </p>
        </div>
      </div>
    ';
      }
      ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous">
    </script>
  </div>
</body>

</html>