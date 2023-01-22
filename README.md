# Projeto Web - Cidades do Brasil

Esse é um projeto web que lista informações de várias cidades e estados do Brasil, como cidades por estados, habitantes, mapa, gráficos.

## Telas do projeto

### 1 - Home com todos os estados

![Home](https://i.imgur.com/8yov5mw.png)

### 2 - Estado selecionado com todas as suas cidades

![estado](https://i.imgur.com/2iUapBd.jpg)

### 3 - Dados sobre o estado selecionado

![dados_estado](https://i.imgur.com/nuEVGDP.png)

### 4 - Informações sobre a cidade selecionada

![cidade](https://i.imgur.com/YeO6Nq3.png)

### 5 - Gráfico sobre a cidade selecionada

![grafico_cidade](https://i.imgur.com/e8TdqDe.png)

### 6 - Mapa com todos os estados

![mapa](https://i.imgur.com/nJYdE1V.png)

## Tecnologias

* Bootstrap
* MD Bootstrap
* PHP
* Banco de dados (MySql)

## Funcionalidades
* [x] Visualizar todas os estados e cidades do Brasil.
* [x] Fazer buscas pelo o estado e cidade que deseja ver.
* [x] Acessar informações de gráficos.

## Como rodar

Pré-Requisitos
* WampServer: https://www.wampserver.com/en/
  
Antes de tudo, clone este repositório
```bash
    git clone https://github.com/TeuSoares/cidades_brasil.git
```

Configurando servidor 👇
1. Execute o seu servidor wampserver:

    *Geralmente fica em seu menu iniciar ou um ícone na área de trabalho*

2. Coloque todos esses arquivos dentro de uma pasta cidades_brasil e mova para dentro de seu servidor wamp: `C:\wamp64\www\cidades_brasil`

3. Criando seu banco de dados
   * Acesse essa URL e clique em executar: http://localhost/phpmyadmin/index.php
     * Usuário: root
     * Senha: vazia
     * Servidor: MySQL
   * Acesse a aba **SQL** na barra superior e cole o seguinte comando: ``CREATE DATABASE db_cidadesBrasil;``
   * Importando tabelas:
     * Clique em **db_cidadesBrasil** na barra lateral da esquerda.
     * Acesse a aba **Importar**.
     * Clique em **Escolher Arquivo**.
     * Navegue até o diretório: `C:\wamp64\www\cidades_brasil\databases\`
     * Selecione o arquivo **db_cidadesBrasil.sql**.
     * Clique em **Executar**.

Acessando o projeto 👇

1. Acesse essa URL: http://localhost/cidades_brasil/index.php

## Links

* Apresentação no YouTube: https://www.youtube.com/watch?v=7xbjR6AHlX8

## Autor

* **Mateus Soares** [Linkedin](https://www.linkedin.com/in/mateus-soares-santos/)

## Versão

1.0.0

## Licença

Este projeto está licenciado sob a Licença MIT.
