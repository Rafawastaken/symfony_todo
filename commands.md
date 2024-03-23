**1. `symfony new nome_projeto`**

- **Descrição:** Cria um novo diretório de projeto Symfony com o nome especificado (`nome_projeto`). Este comando configura a estrutura básica do projeto, incluindo ficheiros de configuração essenciais, diretórios para código, templates e assets.
- **Exemplo:** `symfony new meu_projeto_incrível`

**2. `symfony server:start`**

- **Descrição:** Inicia um servidor de desenvolvimento integrado dentro do seu projeto. É útil para executar a sua aplicação localmente durante o desenvolvimento, para testar funcionalidades sem necessidade de configurar um servidor web separado.
- **Nota:** Este servidor destina-se apenas a fins de desenvolvimento. Não é recomendado para ambientes de produção devido a limitações de segurança e desempenho.

**3. `composer req orm`**

- **Descrição:** Instala os pacotes necessários para a funcionalidade de Mapeamento Objeto-Relacional (ORM). Permite interagir com bases de dados usando entidades que representam o seu modelo de dados.
- **Exemplo:** `composer req doctrine/orm`

**4. `composer req maker`**

- **Descrição:** Instala o pacote Symfony Maker. Este pacote fornece um conjunto de comandos que podem automatizar a criação de componentes comuns do projeto, como controladores, entidades, formulários e muito mais. Simplifica e acelera significativamente o desenvolvimento.
- **Exemplo:** `composer req symfony/maker-bundle`

**5. `composer req twig`**

- **Descrição:** Instala o motor de templating Twig. Este é o motor de templating padrão usado pelo Symfony que permite separar a lógica da aplicação da camada de apresentação. Pode usar o Twig para criar templates HTML dinâmicos para apresentar os seus dados de forma eficaz.
- **Exemplo:** `composer req twig/twig`

**6. `php bin/console make:controller nome_controlador`**

- **Descrição:** (Usando Symfony Maker) Cria uma nova classe de controlador com o nome especificado (`nome_controlador`). Este comando automatiza a geração do código base para o seu controlador, poupando tempo e esforço.
- **Exemplo:** `composer make:controller ControladorIncrível`

**7. `php bin/console make:entity nome_tabela`**

- **Descrição:** Cria uma nova classe de entidade baseada num nome de tabela de base de dados existente (`nome_tabela`). Esta classe de entidade serve como a representação da estrutura da sua tabela de base de dados no código da sua aplicação. Ajuda a gerir a camada de acesso a dados.
- **Exemplo:** `php bin/console make:entity Utilizador` (assumindo que tem uma tabela "Utilizador" na sua base de dados)

**8. `php bin/console make:migration`**

- **Descrição:** Cria um novo ficheiro de migração que regista alterações ao esquema da sua base de dados. Use este comando quando efetuar modificações às suas entidades (por exemplo, adicionar um novo campo) para garantir que a sua base de dados reflete essas alterações.
- **Exemplo:** `php bin/console make:migration AdicionarEmailAoUtilizador` (cria uma migração para adicionar um campo "email" à entidade Utilizador)

**9. `php bin/console doctrine:migrations:migrate`**

- **Descrição:** Executa todas as migrações pendentes, atualizando o esquema da sua base de dados para corresponder às alterações mais recentes definidas nas suas classes de entidade e migração. Use este comando após criar migrações para as aplicar à sua base de dados.
- **Exemplo:** `php bin/console doctrine:migrations:migrate`

**10. `composer require form validator`**

- **Descrição:** Instala dois pacotes adicionais necessários para trabalhar com formulários:
  - `form`: Fornece classes para construir estruturas de formulário, gerir a entrada do utilizador e validar dados.
  - `validator`: Oferece restrições de validação e verificações para garantir que os dados submetidos através de formulários estejam no formato correto e atendam aos requisitos da sua aplicação.
- **Exemplo:** `composer require symfony/form symfony/validator`

**11. `php bin/console make:form`**

- **Descrição:** (Usando Symfony Maker) Cria uma nova classe de formulário baseada numa classe de entidade existente. Esta classe de formulário define a estrutura do seu formulário, incluindo campos, regras de validação e como os dados são submetidos.
- **Exemplo:** `composer make:form UtilizadorType` (cria uma classe de formulário para a entidade Utilizador)
