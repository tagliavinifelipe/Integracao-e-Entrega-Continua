<?php
// Empresa — menu.php
// Menu incluído logo depois do <body> das páginas.
// Antes do include, defina $base: "" na raiz do projeto e "../" dentro da pasta funcionario.

$base = $base ?? "";
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
  <div class="container-fluid">
  <a class="navbar-brand" href="<?php echo $base; ?>index.php">EMPRESA</a>
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="<?php echo $base; ?>index.php">Início</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          Funcionários
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="<?php echo $base; ?>funcionario/adicionar.php">Adicionar</a>
          <a class="dropdown-item" href="<?php echo $base; ?>funcionario/listar.php">Listar</a>
        </div>
      </li>
    </ul>
  </div>
  </div>
</nav>
<!-- JavaScript do Bootstrap: necessário para o dropdown e para o botão do menu no celular -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
