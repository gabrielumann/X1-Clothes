#  API

## Endpoint da API

### X1-Clothes/api

## Recursos

# Usuário


## CREATE
### Exemplo de requisição:
Criação de um novo usuário.
> POST /users

```json
{
  "first_name": "João",
  "last_name": "Feijão",
  "email": "feijoao@email.com",
  "password": "senha12345",
  "cpf": "12345678910"
}
```

### Resposta:
```json
{
  "type": "success",
  "message": "Usuário cadastrado com sucesso!",
  "response": [
    {
      "id": 1,
      "name": "João Feijão",
      "email": "feijoao@email.com"
    }
  ]
}
```

## READ

###  Exemplo de Requisição 1:
Pegar um usuário por seu id.
> GET /users/1
### Resposta:
```json
{
  "type": "success",
  "response": [
    {
      "id": 1,
      "first_name": "João",
      "last_name": "Feijão",
      "email": "feijoao@email.com",
      "cpf": "12345678910",
      "role": "DEFAULT"
    }
  ]
}
```
### Exemplo de Requisição 2 :
Pegar todos os usuários.
> GET /users

### Resposta:

```json
{
  "type": "success",
  "response": [
    {
      "id": 8,
      "first_name": "João",
      "last_name": "Feijão",
      "email": "feijoao@email.com",
      "cpf": "12345678910",
      "role": "DEFAULT"
    },
    {
      "id": 7,
      "first_name": "Beto",
      "last_name": "Carvalho",
      "email": "beto@email.com",
      "cpf": "12345543210",
      "role": "ADMIN"
    }
  ]
}
```


## UPDATE

###  Exemplo de Requisição:
O valor do que deseja modificar;
> POST /users/update/1



```json
{
  "first_name": "Jorge",
  "last_name" : "Gomes"
}
```

### Resposta:

```json
{
  "type": "success",
  "message": "Usuário atualizado com sucesso."
}
```

## DELETE


### Exemplo de Requisição:
Deletar Usuários.
> POST /users/delete/1

### Resposta:


```json
{
  "type": "success",
  "message": "Usuário foi removido com sucesso!"
}
```


## LOGIN

### Exemplo de Requisição:

> POST /usuarios/login

```json
{
  "email": "feijoao@email.com",
  "password": "senha12345"
}
```
Exemplo de Resposta:
> Status Code: 200

```json
{
  "type": "success",
  "message": "Usuário logado com sucesso!",
  "response": {
    "id": 9,
    "name": "João Feijão",
    "email": "feijoao@email.com",
    "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzUxMiJ9.eyJpYXQiOjE3MjQ5ODUxODEsImp0aSI6IjBIbkNlRG4wWkxwMkZzWXlGcWpBRVE9PSIsImlzcyI6Imh0dHA6XC9cL2xvY2FsaG9zdFwvWDEtQ2xvdGhlcyIsIm5iZiI6MTcyNDk4NTE4MSwiZXhwIjoxNzI0OTkwNTgxLCJkYXRhIjp7ImlkIjo5LCJuYW1lIjoiSm9cdTAwZTNvRmVpalx1MDBlM28iLCJlbWFpbCI6ImZlaWpvYW9AZW1haWwuY29tIiwicm9sZSI6IkRFRkFVTFQifX0.wL7UffIltc620qF3elDLmX8i6K3Wfy9Ng8aqId77yEQRFlkK-aFhSRVbOJX_dG1D0tnKaLkoiYcjehQPbhNEuw"
  }
}
```
# Produto


## CREATE
### Exemplo de requisição:
Criação de um novo produto.
> POST /products

```json
{
  "name": "Camiseta Supreme",
  "price_brl": 450.00,
  "color": "Preta",
  "category_id": "2",
  "brand_id": "2",
  "size_id": "1"
}
```

### Resposta:
```json
{
  "type": "success",
  "message": "Produto criado com sucesso!",
  "response": [
    {
      "id": 3,
      "name": "Camiseta Supreme",
      "price_brl": 450.00,
      "color": "Preta",
      "category_id": 2,
      "brand_id": 2,
      "size_id": 1
    }
  ]
}
```

## READ

###  Exemplo de Requisição 1:
Pegar um produto por seu id.
> GET /products/1
### Resposta:
```json
{
  "type": "success",
  "response": [
    {
      "id": 1,
      "name": "Camiseta Supreme",
      "price_brl": 450.00,
      "color": "Preta",
      "category_id": 2,
      "brand_id": 2,
      "size_id": 1
    }
  ]
}
```
### Exemplo de Requisição 2 :
Pegar todos os produtos.
> GET /products

### Resposta:

```json
{
  "type": "success",
  "response": [
    {
      "id": 3,
      "name": "Camiseta Supreme",
      "price_brl": 200,
      "color": "Preta",
      "category_id": 2,
      "brand_id": 2,
      "size_id": 1
    },
    {
      "id": 2,
      "name": "Bota Nike",
      "price_brl": 599.99,
      "color": "Rosa",
      "category_id": 1,
      "brand_id": 3,
      "size_id": 1
    }
  ]
}
```


## UPDATE

###  Exemplo de Requisição:
O valor do que deseja modificar;
> POST /products/update/1



```json
{
  "name": "Bota Vans",
  "category_id" : 2
}
```

### Resposta:

```json
{
  "type": "success",
  "message": "Produto atualizado com sucesso!"
}
```

## DELETE


### Exemplo de Requisição:
Deletar Produto.
> POST /products/delete/1

### Resposta:


```json
{
  "type": "success",
  "message": "Produto do id: 1 foi removido com sucesso!"
}
```