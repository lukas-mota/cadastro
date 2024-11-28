CREATE DATABASE secure;

use secure

CREATE TABLE usuario (                       -- Inicia a criação da tabela 'usuario'
    idusuario INT AUTO_INCREMENT PRIMARY KEY,  -- Identificador único (auto-incremento) e chave primária
    nome VARCHAR(80) NOT NULL,                -- Nome do usuário, não pode ser nulo
    email VARCHAR(100) NOT NULL UNIQUE,        -- E-mail do usuário, não pode ser nulo e deve ser único
    senha VARCHAR(20) NOT NULL                 -- Senha do usuário, não pode ser nula
);


CREATE TABLE sensor (                        -- Inicia a criação da tabela 'sensor'
    idsensor INT AUTO_INCREMENT PRIMARY KEY,   -- Identificador único (auto-incremento) e chave primária
    idusuario INT,                              -- Identificador do usuário (chave estrangeira)
    tipo VARCHAR(50) NOT NULL,                  -- Tipo de sensor, não pode ser nulo
    localizacao VARCHAR(255) NOT NULL,          -- Localização do sensor, não pode ser nulo
    estado BOOLEAN NOT NULL DEFAULT TRUE,        -- Estado do sensor (ativo/inativo), padrão é TRUE
    FOREIGN KEY (idusuario) REFERENCES usuario(idusuario) -- Define a chave estrangeira que referencia a tabela 'usuario'
);


CREATE TABLE atividade (                      -- Inicia a criação da tabela 'atividade'
    idatividade INT AUTO_INCREMENT PRIMARY KEY,  -- Identificador único (auto-incremento) e chave primária
    idsensor INT,                               -- Identificador do sensor (chave estrangeira)
    data_hora DATETIME NOT NULL,                -- Data e hora do alerta, não pode ser nula
    tipo_alerta VARCHAR(100) NOT NULL,          -- Tipo de alerta, não pode ser nulo
    descricao TEXT,                             -- Descrição do alerta (campo de texto)
    FOREIGN KEY (idsensor) REFERENCES sensor(idsensor) -- Define a chave estrangeira que referencia a tabela 'sensor'
);


