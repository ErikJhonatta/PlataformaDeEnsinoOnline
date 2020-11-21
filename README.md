# PlataformaDeEnsinoOnline

Como usar o WebService

### Pré-requisitos
* Php 7
* Composer

```sh
apt-get update
apt-get install php

php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php -r "if (hash_file('sha384', 'composer-setup.php') === '756890a4488ce9024fc62c56153228907f1545c228516cbf63f885e036d37e9a59d27d63f46af1d4d07ee0f76181c7d3') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
php composer-setup.php
php -r "unlink('composer-setup.php');"

```
### Instalação

1. Clone o Repositório
```sh
git clone https://github.com/ErikJhonatta/PlataformaDeEnsinoOnline.git
cd PlataformaDeEnsinoOnline
```
2. Instale as dependencias e crie o banco de dados
```sh
composer install
php artisan migrate
```
3. Rode o artisan serve
```sh
php artisan serve
```

O WebService está pronto.

### Como usar

### Rotas
- Todas as rotas POST e PUT esperam um JSON como body.
### Aluno
- Para Criar um Aluno (POST)

`/api/aluno/create`

Exemplo de Body:
`
{
  "nome": "fulano",
  "email": "example@gmail.com",
  "sexo": "Masculino",
  "data_nasc": "01/01/2020"
}

`
- Para Editar um Aluno (PUT)
Necessário especificar o ID do Aluno na rota

`/api/aluno/edit/id`

Body deve conter as informações que serão atualizadas.

- Para Ver um Aluno (GET)
Necessário especificar o ID do Aluno na rota

`/api/aluno/show/id`

- Para Deletar um Aluno (DELETE)
Necessário especificar o ID do Aluno na rota

`/api/aluno/delete/id`

- Para Listar todos os Alunos (GET)

`/api/aluno/list`

- Para consultar Alunos por Nome e Email (POST)

`/api/aluno/consulta/nomeEmail`

Body deve conter o `nome` e o `email` para a consulta


- Para Contagem de Alunos Por Idade (GET)

`/api/aluno/profiling`

### Curso

- Para Criar um Curso (POST)

`/api/curso/create`

Exemplo de Body:

`
{
  "titulo": "Curso X",
  "descricao": "Descricao Curso X"
}
`

- Para Editar um Curso (PUT)
Necessário Especificar o ID do curso na rota

`/api/curso/edit/id`

Body deve conter as informações que serão atualizadas.

- Para ver um Curso (GET)
Necessário Especificar o ID do curso na rota

`/api/curso/show/id`

- Para deletar um Curso (DELETE)
Necessário especificar o id do Curso na rota

`/api/curso/delete/id`

- Para listar todos os Cursos (GET)

`/api/curso/list` 

### Matrícula
- Para Criar uma Matricula (POST)

`/api/matricula/create`

Exemplo de Body:

`
{
  "aluno_id": 1,
  "curso_id": 1
}
`

- Para Editar uma Matricula (PUT)
Necessário Especificar o ID da matrícula na rota

`/api/matricula/edit/id`

Body deve conter as informações que serão atualizadas.

- Para ver uma Matricula (GET)
Necessário Especificar o ID da matricula na rota

`/api/matricula/show/id`

- Para deletar uma Matricula (DELETE)
Necessário especificar o id da Matricula na rota

`/api/matricula/delete/id`

- Para listar todas as Matriculas (GET)

`/api/matricula/list` 

