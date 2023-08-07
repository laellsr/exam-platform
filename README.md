# Equipe 01 - Plataforma de Provas

## Problemas

1. Dificuldade na criação de exames eficientes, personalizados e dinâmicos
- A ausência de uma ferramenta para gerar provas torna o processo de criação de avaliações personalizadas mais complexo para os professores, pois é altamente custoso realizar manualmente provas para diferentes turmas e diferentes tipos de uma mesma prova para uma mesma turma. Provavelmente, um professor terá que reusar sua prova por muito tempo até que ela se torne obsoleta.
2. Complexidade e recursos escassos
- Não é uma tarefa fácil e rápida administrar provas de composição dinâmica em editores de texto comuns, independente de sua complexidade ou custo. Mesmo as ferramentas como Googles Forms, por exemplo, não conseguem compor provas de forma aleatória, utilizando versões, assuntos e pesos diferentes em suas questões.
3. Dificuldade em ter acesso a provas anteriormente aplicadas
- Uma aula ou um exercício podem não definir o exame final de um professor. Isso pode exercer desânimo e frustação para o aluno que estudou genuinamente para a disciplina. Em mecanismos de buscas contemporâneos, é possível encontrar exercícios e provas de acordo com os assuntos. Entretanto, é raro poder encontrar uma prova de acordo com a instituição e o professor.

## Expectativas

1. Facilidade na criação de exames eficientes, personalizados e dinâmicos
- Espera-se que o produto forneça uma ferramenta robusta e intuitiva para a geração de provas personalizadas de forma eficiente. Os professores devem ser capazes de criar avaliações com facilidade, selecionando diferentes tipos de questões, ajustando níveis de dificuldade e pesos, e até mesmo gerando variantes aleatórias das provas para diferentes turmas. Deve existir a possibilidade da prova ser compartilhada publicamente com os alunos. É fundamental que o produto garanta a segurança das provas e evite vazamento de informações.
2. Acesso a provas anteriormente aplicadas
- A expectativa é que o produto ofereça um banco de dados abrangente e organizado, contendo provas aplicadas por outros professores e instituições. Os usuários devem poder pesquisar por disciplina, instituição e professor, possibilitando o acesso a diferentes modelos de avaliações que auxiliem na preparação dos alunos com ajuda comunitária. 

## Expectativas Futuras

- Administração de provas de forma online
O produto deve superar a complexidade das ferramentas tradicionais, proporcionando uma plataforma fácil de usar, mesmo para provas de composição dinâmica.
- Correção Automática
- Monitoramento de Desempenho
Permitir que os professores acompanhem o desempenho dos alunos individualmente e em turma, gerando relatórios detalhados para identificar pontos fortes e fracos e, assim, adaptar suas estratégias de ensino.
- Recursos de Aprendizagem Personalizados
Utilizar algoritmos de aprendizado de máquina para identificar as necessidades específicas de cada aluno e sugerir recursos educacionais personalizados, como exercícios de reforço, tutoriais e vídeos explicativos.
- Comunicação em Tempo Real
- Módulo de Redação
- Ferramentas de Gamificação
Incorporar elementos de gamificação, como sistemas de pontos, níveis e recompensas, para incentivar a participação dos alunos e tornar o processo de aprendizagem mais envolvente e divertido.

## Personas

### Persona  E

A Persona E é um estudante que está a procura de entender o que lhe espera pela frente, querendo saber o quão dedicado precisa ser, além de quanto tempo precisa gastar estudando, para completar todas as disciplinas em seu período. 

Ele espera poder encontrar um acervo de provas e questões que o ajude a estar preparado em cada disciplina, que pode ser customizada de acordo com a preferência do seu professor e de acordo com cada instituição de ensino; apoiado por veteranos que já enfrentaram essa situação.

### Persona P

A Persona P é um professor que leciona disciplinas alternadas e está desgostoso de seu rendimento com as provas. Ele está cansado de procurar papéis e documentos digitais em seu revezamento entre instituições e disciplinas. Também quer dificultar a trapaça entre os estudantes na aplicação da prova e deseja ter bom desempenho de tempo e gerenciamento nisso.

Ele espera um sistema para gerenciar suas provas, onde ele possa separar por instituição e por disciplina; capaz de gerar provas com questões diversas do seu banco de dados e em ordem aleatória. Dificultando a trapaça e economizando tempo, já que diferentes tipos de provas e seus respectivos gabaritos poderiam ser gerados e impressos em um curto período de tempo. Além de poder adicionar pesos nas questões e administrar as que serão fixas em cada prova. Além disso, ser capaz de corrigir rapidamente provas diferentes de uma mesma turma.

## Marcos

### Marco 1 - 21/08/2023

Acreditamos que esse `Marco 1` servirá como o alicerce sobre o qual construiremos todo o desenvolvimento futuro. Através da definição cuidadosa da tecnologia e arquitetura, garantiremos uma base confiável e escalável para o projeto. Isso nos permitirá enfrentar desafios futuros com segurança, facilitando a integração de novas funcionalidades e acomodando o crescimento do sistema à medida que avançamos.

Funcionalidades

- Cadastro de usuário
- Login

### Marco 2 - 04/09/2023

Funcionalidades

- Cadastro de disciplinas
- Cadastro de provas
- Cadastro de questões

### Marco 3 - 25/09/2023

Funcionalidades

- Gerador de provas
- Gerador de gabaritos

### Marco 4 - 09/10/2023

Funcionalidades

- Repositório comunitário de provas por país e instituição
- Cadastro de provas/questões por OCR

### Marco 5 - 23/10/2023

Funcionalidade

- Correção de prova por OCR

## Riscos

1. **Banco de dados  - Severidade Alta e Probabilidade Alta**

A seleção inadequada do banco de dados pode levar a uma série de problemas que podem afetar negativamente o desempenho, a escalabilidade e a confiabilidade do sistema.

Ações para mitigação do risco:

1.1: Avaliar qual banco de dados melhor se encaixa nas funcionalidades do projeto, quando definidas

2. **Escopo mal definido - Severidade Média e Probabilidade Alta**

Se o escopo do sistema não for claramente definido desde o início, podem surgir constantes mudanças de requisitos, o que pode levar a atrasos e dificuldades na entrega final.

Ações para mitigação do risco:

2.1.

1. **Problemas de comunicação**
    
    Falhas na comunicação entre a equipe de desenvolvimento e o Professor (Persona 2) podem levar a mal-entendidos e resultar em funcionalidades incorretas ou incompletas.
    

Ações para mitigação do risco:

3.1.

1. **Riscos técnicos**
    
    Questões técnicas imprevistas podem surgir durante o desenvolvimento, como problemas de compatibilidade, bugs complexos ou desafios na integração com outros sistemas.
    

Ações para mitigação do risco:

4.1.

1. **Mudanças de prioridade**
    
    Se houver mudanças frequentes nas prioridades do projeto ou se o Professor Persona 2 solicitar funcionalidades adicionais de última hora, isso pode causar atrasos na conclusão.
    

Ações para mitigação do risco:

5.1.

1. **Conflitos internos**
    
    Conflitos entre membros da equipe de desenvolvimento ou entre a equipe e o cliente podem afetar negativamente a colaboração e a produtividade.
    

Ações para mitigação do risco:

6.1.

1. **Falta de treinamento**
    
    Se o cliente não receber um treinamento adequado sobre como usar o sistema, ele pode enfrentar dificuldades na sua utilização, o que pode atrasar a conclusão.
    

Ações para mitigação do risco:

7.1.

1. **Falta de feedback contínuo**
    
    A ausência de feedback regular do Professor Persona 2 durante o desenvolvimento pode levar a desvios em relação às suas expectativas, o que pode exigir retrabalho.
    

Ações para mitigação do risco:

8.1.

## Componentes

### Aplicativo Web

[descrição breve]

https://github.com/edgebr/templates-artefatos

### Aplicativo Mobile

Uma aplicação que tem como objetivo facilitar a vida de estudantes e professores com ferramentas de criação de prova com gabaritos de acordo com um conteúdo estipulado pelo usuário , armazenamento de questões, sendo possível gerar várias provas do mesmo conteúdo tornando assim mais difícil burlar o sistema, e sendo mais valioso para quem deseja utilizar para estudos, além disso existe um acervo de provas de diversos professores e diversas instituições de ensino que podem ser filtradas por professor, instituição e tema ,tornando assim uma poderosa ferramenta de estudos. 

https://github.com/edgebr/templates-artefatos

## Stakeholders

### Stakeholder 1 <br />

- Key User - Cargo na Empresa X* <br />
- E-mail* <br />

(xx) xxxxx-xxxx

### Stakeholder 2 <br />

- Key User - Cargo na Empresa X* <br />
- E-mail* <br />

(xx) xxxxx-xxxx

## Equipe

Lael de Lima Santa Rosa

- Gerente de Projeto
- llsr@ic.ufal.br

[https://github.com/laellsr](https://github.com/laellsr) 

Victor Ferro

- Desenvolvedor Pleno
- vfsm@ic.ufal.br

[https://github.com/vsosmonteiro](https://github.com/vsosmonteiro) 

Priscila Teodório

- Desenvolvedor Pleno
- pts@ic.ufal.br

[https://github.com/techpril](https://github.com/techpril) 

Ana Carolina Nesso

- Desenvolvedor Pleno
- acng@ic.ufal.br

[https://github.com/carolnesso](https://github.com/carolnesso)

Elygledson José

- Desenvolvedor Pleno
- ejsb2@ic.ufal.br

[https://github.com/Elygledson](https://github.com/Elygledson) 

## Status Reports

[Status Report 1 (20/12/2022)](status_report_1.md)
