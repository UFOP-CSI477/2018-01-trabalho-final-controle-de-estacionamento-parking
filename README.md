# **CSI477-2018-01 - CG Parking- Sistema de Estacionamento**
## Grupo: Gabriel Magalhães e Caio Caldeira


### Resumo
O objetivo deste documento é apresentar uma proposta para o trabalho a ser desenvolvido na disciplina CSI477 -- Sistemas WEB I. Neste documento estão presentes os seguintes tópicos: Tema, Escopo, Restrições, Protótipo e as referências, buscando mostrar a abrangência do projeto que visa implementar um sistema de estacionamento de carros.

### 1. Tema

O trabalho tem como tema o desenvolvimento de um sistema de controle de estacionamento,são três tipos de usuários diferentes.

Administrador: Que tem o maior controle de todo o sistema e é o responsável pela inserção de novos usuários, novas vagas( caso seja aumentado o estacionamento, por exemplo) e também é esse tipo de usuário que é o responsável pela inserção e modificação dos valores de cada tipo de carro.

Operacional: É o controlador do sistema, esse usuário é responsável por controlar a entrada e saída dos veículos do estacionamento, além de conseguir gerar a segunda via do pagamento para os clientes.

Usuário: Por fim é o tipo de usuário, o usuário cadastrado no nosso sistema consegue verificar tanto as vagas disponíveis quanto os valores de cada tipo de carro. Além disso ele pode gerar um histórico que contém todas as suas reservas efetuadas.

### 2. Escopo
Funcionalidades do sistema de controle de estacionamento:
* Login ( com senha criptografada ) 
* Cadastro de usuário
* Operador realiza o controle de entrada e de saída no estacionamento
* Visualização de vagas do estacionamento pelos usuários cadastrados
* Visualização de preços de cada tipo de veículo pelos usuários cadastrados
* Exibir vagas( liberadas e ocupadas )
* Modificação de dados para todos os tipos de usuários
* Gerar histórico
* Geração de fatura


### 3. Restrições
Restrições do sistema de controle de estacionamento
 * Usuários não poderão cadastrar carros, somente irão informar o carro no ato da reserva da vaga
 * Após usuário realizar o check-in, não há formas de cancelar tal ato
 

### 4. Protótipo
 * Login
  ![Login](https://github.com/UFOP-CSI477/2018-01-trabalho-final-controle-de-estacionamento-parking/blob/master/Prototipos/Tela_Login.png)
 * Cadastro de usuário
  ![Cadastro de usuário](https://github.com/UFOP-CSI477/2018-01-trabalho-final-controle-de-estacionamento-parking/blob/master/Prototipos/Tela_Cadastro_Usuario.png)
 * Cadastro de veículo
  ![Cadastro de veículo](https://github.com/UFOP-CSI477/2018-01-trabalho-final-controle-de-estacionamento-parking/blob/master/Prototipos/Tela_Cadastro_Veiculo.png)
 * Check-in
  ![Check-in](https://github.com/UFOP-CSI477/2018-01-trabalho-final-controle-de-estacionamento-parking/blob/master/Prototipos/Tela_CheckIn.png)
 * Adquirir crédito
  ![Adquirir crédito](https://github.com/UFOP-CSI477/2018-01-trabalho-final-controle-de-estacionamento-parking/blob/master/Prototipos/Tela_Adquirir_Credito.png)

### 5. Referências
* expparking.com.br
* Para a criação dos protótipos foi utilizada a ferramenta Pencil.
* https://adminlte.io/themes/AdminLTE/dist/img/credit/visa.png
* https://adminlte.io/themes/AdminLTE/dist/img/credit/mastercard.png
* https://adminlte.io/themes/AdminLTE/dist/img/credit/american-express.png
* https://adminlte.io/themes/AdminLTE/dist/img/credit/paypal2.png
* Template utilizado: https://adminlte.io/
