
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Cadastro de Usuários</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">
  <div class="container">
    <h2 class="mb-4">Gerenciamento de Usuários</h2>

    <!-- ALERTA -->
    <div id="alert" class="alert d-none" role="alert"></div>

    <!-- BOTÃO NOVO -->
    <button class="btn btn-primary mb-3" onclick="abrirModal()">Novo Usuário</button>

    <!-- TABELA -->
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>Nome</th>
          <th>Telefone</th>
          <th>Email</th>
          <th>Endereço</th>
          <th>Ações</th>
        </tr>
      </thead>
      <tbody id="tabela-usuarios"></tbody>
    </table>
  </div>

  <!-- MODAL -->
  <div class="modal fade" id="modalUsuario" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
      <form id="formUsuario" class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Cadastrar / Editar Usuário</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <input type="hidden" id="id">
          <div class="mb-2"><input class="form-control" id="nome" placeholder="Nome" required></div>
          <div class="mb-2"><input class="form-control" id="telefone" placeholder="Telefone"></div>
          <div class="mb-2"><input class="form-control" id="email" placeholder="Email" required></div>
          <div class="mb-2"><input class="form-control" id="senha" placeholder="Senha" type="password"></div>
          <div class="mb-2"><textarea class="form-control" id="endereco" placeholder="Endereço"></textarea></div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
          <button type="submit" class="btn btn-primary">Salvar</button>
        </div>
      </form>
    </div>
  </div>

  <!-- SCRIPTS -->
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="/user-crud/public/js/main.js"></script>
</body>
</html>
