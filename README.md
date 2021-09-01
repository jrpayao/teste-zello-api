## Passos necessários para subir a aplicação

  - Será necessário que tenha instalado o PHP superior ao 7.3 na maquina.
  - Será necessário que tenha o docker instalado.
  - Será necessário que tenha o composer instalado.
  
  Executar os comandos abaixo:
  1.    composer install
  2.    cp .env.example .env - Arquivo de configuração
  3.    ./vendor/bin/sail up - Necessário para subir os containers da aplicação
  4.    sail artisan migrate ou ./vendor/bin/sail artisan migrate - Popular o banco de dados
  
  Dessa forma é acessar localmente para verificar se ira apresentar a página inicial do Laravel.
  
    

