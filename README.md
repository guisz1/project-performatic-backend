# Introdução

Esse é um projeto teste para desenvolvimento.

# Tecnologias

 - php
 - hyperf
 - swoole
 - mysql
 - redis

# Pre-requisitos
 - make
 - docker
   - docker-compose
 - git

# Sobre o makefile
Temos alguns comandos disponiveis que criei para etapa de desenvolvimento e para testes

 - Para subir os containers
   - $ make up
 - Para derrubar os containers
   - $ make dowm
 - Para acessar o container do php
   - $ make php
 - Para rodar as migrações
   - $ make migrate
 - Para criar uma nova migração
   - $ make migration name=nome_da_nova_migracao(snake_case)
 - Para resetar as migrações 
   - $ make reset
 - Para comandos composer
    - Para instalar os requirements com paramentros
        - $ make install
    - Para instalar os requirements com paramentros
        - $ make install params=nome_do_paramentro (Ex: --dev or --no-dev)
    - Para instalar um modulo composer
        - $ make require name=nome_do_modulo
    - Para instalar um modulo composer com paramentros
        - $ make require name=nome_do_modulo params=nome_do_paramentro