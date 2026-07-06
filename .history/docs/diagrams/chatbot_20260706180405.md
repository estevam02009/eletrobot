Esse diagrama representa toda a arquitetura do projeto.

---

# Segundo Diagrama

## Fluxo de Atendimento

`docs/diagrams/chatbot.md`

````markdown
# Fluxo do ChatBot

```mermaid
sequenceDiagram

Cliente->>WhatsApp: Olá

WhatsApp->>Evolution API: Nova mensagem

Evolution API->>Laravel: Webhook

Laravel->>ChatBot: Processar mensagem

ChatBot->>Banco: Buscar contexto

Banco-->>ChatBot: Dados

ChatBot->>OpenAI: Pergunta + Contexto

OpenAI-->>ChatBot: Resposta

ChatBot->>Evolution API: Enviar resposta

Evolution API->>Cliente: Mensagem
````
