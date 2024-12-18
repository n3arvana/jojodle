<?php
session_start();
require 'conexao.php';
?>
<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Editar Stand</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="views/styleEdit.css">
  </head>
  <body>
    <div class="container mt-5">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h4>Editar Stand
                <a href="view.php" class="btn btn-danger float-end">Voltar</a>
              </h4>
            </div>
            <div class="card-body">
              <?php
              if (isset($_GET['id'])) {
                $stand_id = mysqli_real_escape_string($conexao, $_GET['id']);
                $sql = "SELECT * FROM stands WHERE id='$stand_id'";
                $query = mysqli_query($conexao, $sql);
                if (mysqli_num_rows($query) > 0) {
                  $stand = mysqli_fetch_array($query);
              ?>
              <form action="acoes.php" method="POST">
                <input type="hidden" name="stand_id" value="<?=$stand['id']?>">
                <div class="mb-3">
                <label>Imagem (URL)</label>
                  <input type="text" name="imagem" value="<?=$stand['imagem']?>" class="form-control">
                </div>
                <div class="mb-3">
                  <label>Nome</label>
                  <input type="text" name="nome" value="<?=$stand['nome']?>" class="form-control">
                </div>
                <div class="mb-3">
                  <label>Parte</label>
                  <input type="text" name="parte" value="<?=$stand['parte']?>" class="form-control">
                </div>
                <div class="mb-3">
                  <label>Forma</label>
                  <input type="text" name="forma" value="<?=$stand['forma']?>" class="form-control">
                </div>
                <div class="mb-3">
                  <label>Habilidade</label>
                  <input type="text" name="habilidade" value="<?=$stand['habilidade']?>" class="form-control">
                </div>
                <div class="mb-3">
                  <label>Especial</label>
                  <input type="text" name="especial" value="<?=$stand['especial']?>" class="form-control">
                </div>
                <div class="mb-3">
                  <label>Poder</label>
                  <input type="text" name="poder" value="<?=$stand['poder']?>" class="form-control">
                </div>
                <div class="mb-3">
                  <label>Velocidade</label>
                  <input type="text" name="velocidade" value="<?=$stand['velocidade']?>" class="form-control">
                </div>
                <div class="mb-3">
                  <label>Alcance</label>
                  <input type="text" name="alcance" value="<?=$stand['alcance']?>" class="form-control">
                </div>
                <div class="mb-3">
                  <label>Resistência</label>
                  <input type="text" name="resistencia" value="<?=$stand['resistencia']?>" class="form-control">
                </div>
                <div class="mb-3">
                  <label>Precisão</label>
                  <input type="text" name="precisao" value="<?=$stand['precisao']?>" class="form-control">
                </div>
                <div class="mb-3">
                  <label>Potencial</label>
                  <input type="text" name="potencial" value="<?=$stand['potencial']?>" class="form-control">
                </div>
                <div class="mb-3">
                  <button type="submit" name="update_stand" class="btn btn-primary">Salvar</button>
                </div>
              </form>
              <?php
              } else {
                echo "<h5>Stand não encontrado</h5>";
              }
            }
            ?>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
