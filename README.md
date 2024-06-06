# Projeto de Bater Ponto em PHP

## Descrição

Este é um projeto simples de bater ponto em PHP, desenvolvido para fins de estudo. O objetivo do projeto é permitir que os usuários registrem sua entrada e saída, e com isso calcular e exibir as horas trabalhadas.

## Funcionalidades

- **Registro de Entrada:** O usuário pode registrar o horário de entrada.
- **Registro de Saída:** O usuário pode registrar o horário de saída.
- **Cálculo de Horas Trabalhadas:** O sistema calcula e exibe as horas trabalhadas com base nos horários de entrada e saída.

## Tecnologias Utilizadas

- **Linguagem de Programação:** PHP
- **Banco de Dados:** MySQL
- **Servidor Web:** Apache

## Pré-requisitos

- **Servidor Web:** Apache ou qualquer servidor que suporte PHP.
- **PHP:** Versão 7.4 ou superior.
- **Banco de Dados:** MySQL.

## Configuração e Instalação

1. **Clonar o Repositório:**

   git clone https://https://github.com/yann074/BaterPontoPHP


2. **Configurar o Banco de Dados:**
- Crie um banco de dados no MySQL.
- Execute o seguinte SQL para criar as tabelas necessárias:
  ```sql
  CREATE DATABASE ponto;
  USE ponto;
  CREATE TABLE registros (
      id INT AUTO_INCREMENT PRIMARY KEY,
      usuario VARCHAR(50),
      entrada DATETIME,
      saida DATETIME
  );
  ```

3. **Configurar as Credenciais do Banco de Dados:**
- Crie um arquivo `config.php` no diretório do projeto com as seguintes credenciais do banco de dados:
  ```php
  <?php
  $servername = "localhost";
  $username = "root";
  $password = "sua_senha";
  $dbname = "ponto";
  ?>
  ```

4. **Código da Aplicação:**

```php
<?php
include 'config.php';

$usuario = $_POST['usuario'];
$action = $_POST['action'];
$datetime = date('Y-m-d H:i:s');

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

if ($action == 'entrada') {
    $sql = "INSERT INTO registros (usuario, entrada) VALUES ('$usuario', '$datetime')";
} else if ($action == 'saida') {
    $sql = "UPDATE registros SET saida='$datetime' WHERE usuario='$usuario' AND saida IS NULL";
}

if ($conn->query($sql) === TRUE) {
    echo "Registro salvo com sucesso!";
} else {
    echo "Erro: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>

Executar a Aplicação:
Configure seu servidor web para executar o projeto.
Acesse a aplicação através do navegador.
