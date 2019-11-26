<?php
require_once "Usuarios.class.php";

$usuario = new Usuarios();
$usuario->setQuantidadePorPag(6);

$pagina = 1;
if (isset($_GET["pagina"]) && !empty($_GET["pagina"])) {
  $pagina = addslashes($_GET["pagina"]);
}

$limite = ($pagina - 1) * $usuario->getQuantidadePorPag();

$lista = $usuario->lista($limite);
$total = $usuario->quantidadeRegitros();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Paginação</title>
</head>

<body>
  <?php foreach ($lista as $valor) : ?>
    <li><?php echo $valor["nome"] ?></li>
  <?php
  endforeach;

  for ($i = 0; $i < $total; $i++) {
    echo "<a href='./?pagina=" . ($i + 1) . "'>" . ($i + 1) . "</a>";
  }
  ?>

</body>

</html>