# Gerenciador de Tarefas

Um gerenciador de tarefas feito para teste técnico da empresa HCOSTA, foi construído com **Laravel**, utilizando **arquitetura hexagonal (ports & adapters)**. Integra **MongoDB**, **RabbitMQ** e autenticação via **Sanctum** para uma experiência robusta e performática.

## Funcionalidades
- Gerenciamento de tarefas e projetos com entidades bem definidas
- Arquitetura hexagonal para desacoplamento e manutenibilidade
- Suporte a UUID como chave primária para maior segurança e escalabilidade
- Integração com MongoDB para dados não relacionais
- Filas assíncronas com RabbitMQ
- Cache e gerenciamento de jobs com Redis e Laravel Horizon
- Testes automatizados para garantir qualidade

## Instalação Rápida

1. Clone o repositório:
   ```bash
   git clone https://github.com/victoralmeidamag/gerenciador_tarefas.git
   cd gerenciador_tarefas
   ```

2. Dê permissão ao script de bootstrap:
   ```bash
   chmod +x bootstrap.sh
   ```

3. Execute o script para instalar dependências, subir containers e migrar o banco:
   ```bash
   ./bootstrap.sh
   ```
4. *opcional (Serve para rodar os comandos usando somente sail. Ex sail down, sail up -d)
    ```bash
    alias sail='sh $([ -f sail ] && echo sail || echo vendor/bin/sail)` | |
    ```


[Clique aqui para importar a Collection no Postman](docs/postman/doc_api.postman_collection.json)

## Estrutura do Projeto

```plaintext
app/
├── Application         # Casos de uso e lógica de aplicação
│   ├── Commands        # Dados imutáveis para entrada de ações
│   ├── Contracts       # Interfaces (portas) a serem implementadas
│   ├── Handlers        # Orquestradores de ações (use cases)
│   ├── Queries         # Consultas específicas
│   ├── Services        # Regras auxiliares do domínio
│   └── ViewModels      # Estruturas de resposta
├── Domain              # Entidades e regras de negócio
│   ├── Project         # Entidade Project
│   ├── Shared          # Value Objects (ex.: UUID)
│   ├── Task            # Entidade Task
│   └── User            # Entidade User
├── Infrastructure      # Implementações concretas (adapters)
│   ├── Models          # Modelos Eloquent
│   ├── Mongo           # Integração com MongoDB
│   ├── Persistence     # Repositórios Eloquent
│   └── RabbitMQ        # Producers e Consumers
├── Interfaces          # Camada de entrada (ex.: HTTP Controllers)
├── Events              # Eventos do domínio
├── Listeners           # Listeners para eventos
├── Providers           # Configurações e bindings
```

##  Por que UUID como chave primária?

Utilizamos **UUIDv7** (via `ramsey/uuid`) em vez de IDs auto-incrementais pelos seguintes motivos:
- **Independência do banco**: Evita colisões em sistemas distribuídos ou microsserviços.
- **Segurança**: Dificulta enumeração de registros (ex.: `/users/1`, `/users/2`).
- **Escalabilidade**: Facilita replicação e sincronização entre bancos.
- **Testes**: Não depende de auto-incremento, simplificando mocks.

O Value Object `Uuid` garante tipagem forte, imutabilidade e serialização automática.

##  MongoDB
Usado como banco complementar para cenários não relacionais (logs, documentos, testes paralelos). Conectado via `jenssegers/laravel-mongodb`.

```plaintext
app/Infrastructure/Mongo/
```

##  RabbitMQ
Broker de mensagens assíncronas para:
- Filas de notificações
- Processamento em background
- Desacoplamento entre ações

Estrutura:
```plaintext
app/Infrastructure/RabbitMQ/  # Producers e Consumers
```
Integração via driver `rabbitmq` no Laravel Queue.

##  Princípios SOLID
| Princípio | Aplicação |
|-----------|-----------|
| **S**ingle Responsibility | Cada classe tem uma única responsabilidade (ex.: `RegisterUserHandler` só orquestra registros). |
| **O**pen/Closed | Classes como `Uuid`, `Handlers` e `Listeners` são extensíveis sem modificação. |
| **L**iskov Substitution | Repositórios (ex.: `UserRepository`) são injetados via interfaces, permitindo substituição. |
| **I**nterface Segregation | Interfaces pequenas e focadas (ex.: `UserRepositoryInterface`). |
| **D**ependency Inversion | Dependências externas injetadas via construtor (ex.: repositórios, serviços). |


## 🛠️ Tecnologias Utilizadas
- **Laravel 12**
- **PHP 8.4**
- **MongoDB**
- **PostgreSQL**
- **RabbitMQ**
- **Laravel Sail**
- **Docker Compose**

##  Scripts Úteis
| Script                        | Descrição                                      |
|-------------------------------|------------------------------------------------|
| `./bootstrap.sh`              | Instala dependências, sobe containers e migra o banco |
| `sail artisan queue:work`     | Roda o worker de filas                         |
| `sail artisan horizon`        | Inicia o Laravel Horizon para gerenciamento de jobs |
