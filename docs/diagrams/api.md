# Fluxo da API

```mermaid
flowchart LR

Request

Request --> FormRequest

FormRequest --> Controller

Controller --> Service

Service --> Repository

Repository --> Model

Model --> Database

Database --> Resource

Resource --> Response
```
