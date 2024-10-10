# Generic Todo API
## Sobre
Esta API foi desenvolvida com o intuito de praticar o desenvolvimento de API's com o Laravel, tendo como base o exemplo do site [roadmap.sh](https://roadmap.sh/backend/project-ideas#:~:text=relational%20databases%20first.-,2.%20To%2DDo%20List%20API,-Difficulty%3A%20Easy), foram usadas técnicas de autenticação com o [Sanctum](https://laravel.com/docs/11.x/sanctum), além das operações básicas de CRUD.

## Endpoints & Métodos
| **Método HTTP** |    **Endpoint**   |                               **Ação**                              |
|:---------------:|:-----------------:|:-------------------------------------------------------------------:|
|       POST      | _api/auth/signin_ |          Cria um usuário e gera um token para autenticação.         |
|       POST      |  _api/auth/login_ |            Faz login, gerando um token para autenticação.           |
|       POST      | _api/auth/logout_ |                    Faz logout, revogando o token.                   |
|       GET       |     _api/user_    |            Retorna as informações do usuário autenticado.           |
|       POST      |    _api/tasks_    |                      Grava informações da task.                     |
|       GET       |    _api/tasks_    |                  Retorna todas as tasks do usuário.                 |
|       GET       |  _api/tasks/:id_  |      Retorna a task requisitada, caso esta pertença ao usuário.     |
|      PATCH      |  _api/tasks/:id_  |   Atualiza apenas o status da task, caso esta pertença ao usuário.  |
|       PUT       |  _api/tasks/:id_  | Atualiza descrição e status da task, caso esta pertença ao usuário. |
|      DELETE     |  _api/tasks/:id_  |            Deleta a task, caso esta pertença ao usuário.            |

## Como usar?
Para utilizar a API é simples:
1. Crie uma conta de usuário usando o endpoint correspontende (_api/auth/signin_) e passando no corpo da requisição um JSON com o seguinte conteúdo:
``` json
{
    "name": "Nome",
    "email": "email@teste.com",
    "password": "suasenha"
}
``` 
   - Caso você já tenha uma conta, você pode apenas autenticar usando o endpoint de login (_api/auth/login_), passando no corpo da requisição um JSON com o email e senha (email, password);

2. Com o usuário criado/autenticado, guarde o token que recebeu, ele será a sua "chave" para autenticação nas outras rotas.

3. Realize as operações de CRUD para as tasks usando a sua token (isso irá depender de como você faz a requisição, no Postman você pode inserir em Authorization ou nos headers com Authorization, para ambos os casos, o token é um Bearer).

4. Quando estiver satisfeito, você pode fazer logout (_api/auth/logout_) usando a token. Deste modo ela será revogada e não poderá mais ser utilizada.