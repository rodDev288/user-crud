# 🧾 Projeto: User CRUD (Cadastro de Usuários)

Sistema simples de gerenciamento de usuários feito em **PHP** com padrão **MVC**,
utilizando **Bootstrap 5** no front-end,
**jQuery + AJAX** para comunicação assíncrona e **MySQL** como banco de dados.

---

## ✅ Funcionalidades

- Cadastro de usuários via formulário modal
- Edição e exclusão em tempo real (sem recarregar a página)
- Listagem dinâmica com Bootstrap Table
- API REST com retorno em JSON
- Validações front-end e back-end
- Interface moderna com Bootstrap 5

---

## 💻 Tecnologias utilizadas

- PHP
- HTML + CSS + Bootstrap 5
- JavaScript (jQuery + AJAX)
- MySQL
- XAMPP (ambiente local)

---

## 🚀 Como rodar localmente

1. Instale o [XAMPP](https://www.apachefriends.org/pt_br/index.html)
2. Copie o projeto para a pasta:
3. Inicie o Apache e o MySQL no XAMPP
4. Acesse o `phpMyAdmin` e crie o banco:
5. Execute esse SQL para criar a tabela:

```sql
CREATE TABLE usuarios (
id INT AUTO_INCREMENT PRIMARY KEY,
nome VARCHAR(100),
telefone VARCHAR(20),
email VARCHAR(100) UNIQUE,
senha VARCHAR(255),
endereco TEXT
);
http://localhost/user-crud
user-crud/
├── api/                 # API REST
├── app/
│   ├── controllers/
│   ├── models/
│   └── views/
├── config/              # Conexão com o banco
├── public/              # JS, CSS
└── index.php            # Entrada do sistema
