

const api = '/user-crud/api/user.php';
const modal = new bootstrap.Modal(document.getElementById('modalUsuario'));

// Carrega todos os usuários
function carregarUsuarios() {
  $.get(api, function(data) {
    let html = '';
    data.forEach(usuario => {
      html += `
        <tr>
          <td>${usuario.nome}</td>
          <td>${usuario.telefone}</td>
          <td>${usuario.email}</td>
          <td>${usuario.endereco}</td>
          <td>
            <button class="btn btn-warning btn-sm" onclick="editarUsuario(${usuario.id})">Editar</button>
            <button class="btn btn-danger btn-sm" onclick="deletarUsuario(${usuario.id})">Excluir</button>
          </td>
        </tr>
      `;
    });
    $('#tabela-usuarios').html(html);
  });
}

// Abre o modal em branco para novo cadastro
function abrirModal() {
  $('#formUsuario')[0].reset();
  $('#id').val('');
  modal.show();
}

// Editar usuário (preenche o modal com os dados)
function editarUsuario(id) {
  $.get(`${api}?id=${id}`, function(usuario) {
    $('#id').val(usuario.id);
    $('#nome').val(usuario.nome);
    $('#telefone').val(usuario.telefone);
    $('#email').val(usuario.email);
    $('#senha').val('');
    $('#endereco').val(usuario.endereco);
    modal.show();
  });
}

// Excluir usuário
function deletarUsuario(id) {
  if (confirm('Deseja realmente excluir este usuário?')) {
    $.ajax({
      url: `${api}?id=${id}`,
      type: 'DELETE',
      success: function() {
        mostrarAlerta('Usuário excluído com sucesso!', 'danger');
        carregarUsuarios();
      }
    });
  }
}

// Submissão do formulário (create ou update)
$('#formUsuario').submit(function(e) {
  e.preventDefault();
  const id = $('#id').val();
  const usuario = {
    nome: $('#nome').val(),
    telefone: $('#telefone').val(),
    email: $('#email').val(),
    senha: $('#senha').val(),
    endereco: $('#endereco').val()
  };

  const metodo = id ? 'PUT' : 'POST';
  const url = id ? `${api}?id=${id}` : api;

  $.ajax({
    url: url,
    type: metodo,
    data: JSON.stringify(usuario),
    contentType: 'application/json',
    success: function() {
      modal.hide();
      carregarUsuarios();
      mostrarAlerta('Usuário salvo com sucesso!', 'success');
      $('#formUsuario')[0].reset();
    }
  });
});

// Alerta com Bootstrap
function mostrarAlerta(mensagem, tipo) {
  const alerta = $('#alert');
  alerta.removeClass().addClass(`alert alert-${tipo}`).text(mensagem).removeClass('d-none');
  setTimeout(() => alerta.addClass('d-none'), 3000);
}

// Inicializa
$(document).ready(carregarUsuarios);
