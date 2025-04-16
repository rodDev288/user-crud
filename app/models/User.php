
<?php
require_once __DIR__ . '/../../config/database.php';

class User {

    // Buscar todos os usuários
    public static function all() {
        $db = Database::connect();
        return $db->query("SELECT * FROM usuarios")->fetchAll(PDO::FETCH_ASSOC);
    }

    // Cadastrar novo usuário
    public static function create($data) {
        $db = Database::connect();
        $stmt = $db->prepare("INSERT INTO usuarios (nome, telefone, email, senha, endereco) VALUES (?, ?, ?, ?, ?)");
        return $stmt->execute([
            $data['nome'],
            $data['telefone'],
            $data['email'],
            password_hash($data['senha'], PASSWORD_DEFAULT),
            $data['endereco']
        ]);
    }

    // Atualizar usuário
    public static function update($id, $data) {
        $db = Database::connect();
        $stmt = $db->prepare("UPDATE usuarios SET nome=?, telefone=?, email=?, endereco=? WHERE id=?");
        return $stmt->execute([
            $data['nome'],
            $data['telefone'],
            $data['email'],
            $data['endereco'],
            $id
        ]);
    }

    // Deletar usuário
    public static function delete($id) {
        $db = Database::connect();
        $stmt = $db->prepare("DELETE FROM usuarios WHERE id=?");
        return $stmt->execute([$id]);
    }

    // Buscar um único usuário
    public static function find($id) {
        $db = Database::connect();
        $stmt = $db->prepare("SELECT * FROM usuarios WHERE id=?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
