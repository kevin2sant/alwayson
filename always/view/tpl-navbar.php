<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">AlwaysOn</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="./index.php?action=index">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="./index.php?action=deposito">Deposito</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="./index.php?action=transferencia">Transferencia</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-danger" href="./index.php?action=close" tabindex="-1" aria-disabled="true">Cerrar Sesión</a>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true"><?=$_SESSION['nombre']?></a>
      </li>
    </ul>
  </div>
  Saldo Disponible : <strong id="montoDisponible"><?= $_SESSION['saldo']?></strong>
</nav>