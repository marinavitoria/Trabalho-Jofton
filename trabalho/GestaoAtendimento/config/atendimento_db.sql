-- 1. Configurações iniciais (Evita erros de time zone e caracteres)
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--Cria o banco de dados se não existir e seleciona ele
DROP DATABASE IF EXISTS atendimentoa;
CREATE DATABASE atendimento CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE atendimento;

-- --------------------------------------------------------

--Estrutura da tabela `aluno`
CREATE TABLE aluno (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nome VARCHAR(100) NOT NULL,
  email VARCHAR(100) NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-----------------------------------------------------------

--Estrutura da tabela `atendimento`
CREATE TABLE atendimento (
  id INT AUTO_INCREMENT PRIMARY KEY,
  id_aluno INT NOT NULL,
  descricao VARCHAR(255) NOT NULL,
  nome_educador VARCHAR(100) NOT NULL,
  prioridade ENUM('Alto', 'Medio', 'Baixo') NOT NULL,
  status ENUM('A esperar', 'Em atendimento', 'Finalizado') DEFAULT 'A esperar',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  
  -- Chave Estrangeira Conecta com aluno
  -- ON DELETE CASCADE: Se apagar o aluno, apaga os atendimentos dele automaticamente
  FOREIGN KEY (id_aluno) REFERENCES aluno(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-----------------------------------------------------------

--Inserir dados de teste para ver funcionando
INSERT INTO aluno (nome, email) VALUES 
('João Silva', 'joao@gmail.com'),
('Maria Oliveira', 'maria@hotmail.com');

INSERT INTO atendimento (id_aluno, descricao, nome_educador, prioridade, status) VALUES 
(1, 'Dúvida sobre renovação de matrícula', 'Prof. Carlos', 'Alto', 'A esperar'),
(1, 'Entregar documentação pendente', 'Secretaria', 'Baixo', 'Em atendimento'),
(2, 'Solicitação de histórico escolar', 'Secretaria', 'Medio', 'A esperar');

COMMIT;