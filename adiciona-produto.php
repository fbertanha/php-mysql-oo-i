<?php
  require_once('header.php');
  require_once('banco-produto.php');
  require_once('logica-usuario.php');
  require_once('class/Categoria.php');
  require_once('class/Produto.php');


  verificaUsuario();
  $categoria = new Categoria();
  $produto = new Produto();
  
  $produto->nome = $_POST['produto'];
  $produto->preco = $_POST['preco'];
  $produto->descricao = $_POST['descricao'];
  $categoria->id = $_POST['categoria_id'];
  $produto->categoria = $categoria;

  if(isset($_POST['usado'])) {
    $produto->usado = 1;
  }else {
    $produto->usado = 0;
  }

  if(insereProduto($conexao, $produto)) {
?>
    <p class="text-success"> O Produto <?=$produto->nome?> foi adicionado.</p>
    <?php } else {
      $msg = mysqli_error($conexao);
    ?>
      <p class="text-danger"> O Produto <?=$produto->nome?> não foi adicionado. <?=$msg?> </p>
<?php
      }

  require_once('footer.php');
?>
