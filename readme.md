# teste

Para execução do teste é necessário um servidor com o banco de dados MongoDB.

Instalação:
Baixe o arquivo, entre na pasta do projeto e execute o comando "composer install" para instalar as dependências do projeto.

Renomeie o arquivo .env.example para .env.

No arquivo .env adicione as informações do banco de dados nas linhas abaixo:
MONGO_DB_HOST=127.0.0.1
MONGO_DB_PORT=27017
MONGO_DB_DATABASE=testdatabase
MONGO_DB_USERNAME=
MONGO_DB_PASSWORD=

Configure o Servidor Web para que o Document Root seja a pasta "public" do projeto.

Para efeito de teste também é possível rodar o comando "php artisan serve" que o projeto será executado na porta 8000.

Adquirindo acesso a API:
Envie uma solicitação POST, com todos os dados conforme abaixo, para "http://host/api/register". (Troque sempre "host" pelo endereço do servidor onde está a API):
Cabeçalho: Accept application/json
O corpo deverá conter os seguintes campos: name, email, password, password_confirmation.

Em caso de sucesso a API retornará os campos conforme abaixo:
{
  "data": {
    "name": "nome informado no post",
    "email": "email informado",
    "updated_at": "data hora atualização do registro",
    "created_at": "data hora inserção do registro",
    "_id": "identicador único padrão do MongoDB",
    "api_token": "Token gerado para o usuário criado"
  }
}

Em caso de falha na validação de alguma informação a API retornará os dados no padrão abaixo:
{
  "message": "The given data was invalid.",
  "errors": {
    "email": [
      "The email field is required."
    ]
  }
}

Fazendo Login:
Envie uma solicitação POST, com todos os dados conforme abaixo, para "http://host/api/login".
Cabeçalho: Accept application/json
O corpo deverá conter os seguintes campos: email, password.
Em caso de sucesso a API retornará os campos conforme abaixo:
{
  "data": {
    "_id": "5d27765ce537865b04007cb4",
    "name": "Name User",
    "email": "email@test.com.br",
    "updated_at": "2019-07-11 18:03:56",
    "created_at": "2019-07-11 17:48:12",
    "api_token": "ckB00AvShlnz0LRcydrKO4xGqHnVnjmi3PXX1SDK5hCSsinOlBu4pYibwyd9"
  }
}
Utilize o valor do campo api_token no cabeçalho de todas as requisições no seguinte formato:
"Authorization" "Bearer ckB00AvShlnz0LRcydrKO4xGqHnVnjmi3PXX1SDK5hCSsinOlBu4pYibwyd9"

Demais End Points disponíveis:
GET api/collaborators - Lista os colaboradores cadastrados (limitado a 100 registros)
GET api/collaborators/{_id_collaborator} - Lista os dados do colaborador informado
POST api/collaborators - Cadastra um novo colaborador. Campos obrigatórios: sector, full_name, birth_date, salary
PUT api/collaborators/{_id_collaborator} - Atualiza o cadastro de um colaborador. Campos obrigatórios: sector, full_name, birth_date, salary
DELETE api/collaborators/{_id_collaborator} Desativa o colaborador informado

GET api/sectors - Lista todos os setores cadastrados
GET api/sectors/{_id_sector} - Lista os dados do setor informado
POST api/sectors - Cadastra um novo setor. Campo obrigatório: name
PUT api/sectors/{_id_sector} - Atualiza o cadastro de um setor. Campo obrigatório: name
DELETE api/sectors/{_id_sector} - Remove o setor informado
