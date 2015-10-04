	drop sequence seq_Livros;
	drop sequence seq_TipoUtilizador;
	drop sequence seq_Utilizador;
	drop sequence seq_Autor;
	drop sequence seq_Entregas;
	drop sequence seq_ObraLiteraria;
	drop sequence seq_Genero;
	drop sequence seq_Editora;
	drop sequence seq_Visualizacoes;
	
	create sequence seq_Livros;
	create sequence seq_TipoUtilizador;
	create sequence seq_Utilizador;
	create sequence seq_Autor;
	create sequence seq_Entregas;
	create sequence seq_ObraLiteraria;
	create sequence seq_Genero;
	create sequence seq_Editora;
	create sequence seq_Visualizacoes;

	
	insert into TipoUtilizador values(seq_TipoUtilizador.nextVal,'ADMIN');
	insert into TipoUtilizador values(seq_TipoUtilizador.nextVal,'UTENTE');
	
	insert into  Editora values(
						seq_Editora.nextVal,
						'Editora A'
						);
					
	insert into  Editora values(
						seq_Editora.nextVal,
						'Editora B'
						);
						
	insert into  Editora values(
						seq_Editora.nextVal,
						'Editora C'
						);
						
	insert into Autor values(
						seq_Autor.nextVal, 
						'Joaquim Poeta', 
						to_date('1940.09.10','yyyy-mm-dd')
						);
							
	insert into Autor values(
						seq_Autor.nextVal, 
						'Alberto Aveiro', 
						to_date('1966.02.09','yyyy-mm-dd')
						);
							
	insert into Autor values(
						seq_Autor.nextVal, 
						'Jorge Jesualdo', 
						to_date('1931.05.29','yyyy-mm-dd')
						);
						
	insert into Autor values(
						seq_Autor.nextVal, 
						'Maria Maquiavel', 
						to_date('1800.08.23','yyyy-mm-dd')
						);
						
	insert into Autor values(
						seq_Autor.nextVal, 
						'Joana Jacinto', 
						to_date('1976.12.30','yyyy-mm-dd')
						);
						
	insert into Autor values(
						seq_Autor.nextVal, 
						'Manuel Rosa', 
						to_date('1950.06.10','yyyy-mm-dd')
						);
						
	insert into Autor values(
						seq_Autor.nextVal, 
						'Vasco Ribeiro', 
						to_date('1988.06.30','yyyy-mm-dd')
						);
						
	insert into Autor values(
						seq_Autor.nextVal, 
						'Natalia Borges', 
						to_date('1991.05.13','yyyy-mm-dd')
						);

	
	insert into ObraLiteraria values (
						seq_ObraLiteraria.nextVal, 
						(select aut_id from Autor where aut_nome='Joaquim Poeta'), 
						'OBRA LITERARIA 2', 
						to_date('1967.06.21','yyyy-mm-dd')
						);
						
	insert into ObraLiteraria values (
						seq_ObraLiteraria.nextVal, 
						(select aut_id from Autor where aut_nome='Maria Maquiavel'), 
						'OBRA LITERARIA 1', 
						to_date('1983.09.23','yyyy-mm-dd')
						);
						
	insert into ObraLiteraria values (
						seq_ObraLiteraria.nextVal, 
						(select aut_id from Autor where aut_nome='Joaquim Poeta'), 
						'OBRA LITERARIA 3', 
						to_date('1966.01.13','yyyy-mm-dd')
						);
						
	insert into ObraLiteraria values (
						seq_ObraLiteraria.nextVal, 
						(select aut_id from Autor where aut_nome='Jorge Jesualdo'), 
						'OBRA LITERARIA 4', 
						to_date('1978.10.05','yyyy-mm-dd')
						);
						
	insert into ObraLiteraria values (
						seq_ObraLiteraria.nextVal, 
						(select aut_id from Autor where aut_nome='Joaquim Poeta'), 
						'OBRA LITERARIA 5', 
						to_date('1998.12.10','yyyy-mm-dd')
						);
						
	insert into ObraLiteraria values (
						seq_ObraLiteraria.nextVal, 
						(select aut_id from Autor where aut_nome='Alberto Aveiro'), 
						'OBRA LITERARIA 6', 
						to_date('1990.05.11','yyyy-mm-dd')
						);
						
	insert into ObraLiteraria values (
						seq_ObraLiteraria.nextVal, 
						(select aut_id from Autor where aut_nome='Joana Jacinto'), 
						'OBRA LITERARIA 7', 
						to_date('1956.07.25','yyyy-mm-dd')
						);
						
	insert into ObraLiteraria values (
						seq_ObraLiteraria.nextVal, 
						(select aut_id from Autor where aut_nome='Manuel Rosa'), 
						'OBRA LITERARIA 8', 
						to_date('1989.03.07','yyyy-mm-dd')
						);
	
	insert into ObraLiteraria values (
						seq_ObraLiteraria.nextVal, 
						(select aut_id from Autor where aut_nome='Vasco Ribeiro'), 
						'OBRA LITERARIA 9', 
						to_date('1968.02.15','yyyy-mm-dd')
						);
						
	insert into ObraLiteraria values (
						seq_ObraLiteraria.nextVal, 
						(select aut_id from Autor where aut_nome='Natalia Borges'), 
						'OBRA LITERARIA 10', 
						to_date('1999.03.11','yyyy-mm-dd')
						);
	
	
	insert into Livros values(
						seq_Livros.nextVal, 
						(select edi_id from Editora where edi_nome = 'Editora A'), 
						(select obr_id from ObraLiteraria where obr_nome='OBRA LITERARIA 2'),
						'Java for dummies',
						15.00,
						'ENG'
						);
						
	insert into Livros values(
						seq_Livros.nextVal, 
						(select edi_id from Editora where edi_nome = 'Editora B'), 
						(select obr_id from ObraLiteraria where obr_nome='OBRA LITERARIA 3'),					
						'Murder 101', 
						66.00, 
						'EN'
						);
						
	insert into Livros values(
						seq_Livros.nextVal, 
						(select edi_id from Editora where edi_nome = 'Editora A'), 
						(select obr_id from ObraLiteraria where obr_nome='OBRA LITERARIA 1'),
						'LIVRO GENERICO 2', 
						9.99, 
						'PT'
						);	
						
	insert into Livros values(
						seq_Livros.nextVal, 
						(select edi_id from Editora where edi_nome = 'Editora B'), 
						(select obr_id from ObraLiteraria where obr_nome='OBRA LITERARIA 5'),
						'LIVRO A', 
						30.40, 
						'PT'
						);
						
	insert into Livros values(
						seq_Livros.nextVal, 
						(select edi_id from Editora where edi_nome = 'Editora A'), 
						(select obr_id from ObraLiteraria where obr_nome='OBRA LITERARIA 4'),
						'LIVRO B', 
						19.60, 
						'PT'
						);
						
	insert into Livros values(
						seq_Livros.nextVal, 
						(select edi_id from Editora where edi_nome = 'Editora C'), 	 
						(select obr_id from ObraLiteraria where obr_nome='OBRA LITERARIA 6'),
						'LIVRO C', 
						12.80, 
						'PT'
						);
						
	insert into Livros values(
						seq_Livros.nextVal, 
						(select edi_id from Editora where edi_nome = 'Editora C'), 
						(select obr_id from ObraLiteraria where obr_nome='OBRA LITERARIA 9'),					
						'LIVRO D', 
						62.24, 
						'PT'
						);
						
	insert into Livros values(
						seq_Livros.nextVal, 
						(select edi_id from Editora where edi_nome = 'Editora A'), 
						(select obr_id from ObraLiteraria where obr_nome='OBRA LITERARIA 7'),					
						'LIVRO E', 
						23.63, 
						'PT'
						);
						
	insert into Livros values(
						seq_Livros.nextVal, 
						(select edi_id from Editora where edi_nome = 'Editora C'), 
						(select obr_id from ObraLiteraria where obr_nome='OBRA LITERARIA 8'),					
						'LIVRO F',
						57.42,
						'PT'
						);
						
	insert into Livros values(
						seq_Livros.nextVal, 
						(select edi_id from Editora where edi_nome = 'Editora A'), 
						(select obr_id from ObraLiteraria where obr_nome='OBRA LITERARIA 10'),						
						'Crime Scene', 
						5.11, 
						'PT'
						);
	
	insert into Utilizador values(
						seq_Utilizador.nextVal, 
						(select tpu_id from TipoUtilizador where tpu_tipo = 'UTENTE'),
						'qwerty35', 
						'password 1', 
						'Roberto Vitorino', 
						'Rua das galinhas nº10 ', 
						to_date('1955.12.25','yyyy-mm-dd'), 
						110000000000000000000, 
						1220000, 
						'roberto_vito@gmail.com'
						);
						
	insert into Utilizador values(
						seq_Utilizador.nextVal, 
						(select tpu_id from TipoUtilizador where tpu_tipo = 'UTENTE'),
						'xderx90', 
						'password 2', 
						'Maria Gondomar', 
						'Avenia das batatas nº15 1DT FRENTE', 
						to_date('1967.11.10','yyyy-mm-dd'), 
						100000000000000000000, 
						1210000, 
						'maria_gamer@hotmail.com'
						);
	
	insert into Utilizador values(
						seq_Utilizador.nextVal, 
						(select tpu_id from TipoUtilizador where tpu_tipo = 'UTENTE'),
						'ptsewer00', 
						'password 3', 
						'Orlando Fernandes', 
						'Rua dos frades carecas', 
						to_date('1990.05.10','yyyy-mm-dd'), 
						120000000000000000000, 
						1200000, 
						'o.fernades@gmail.com'
						);
						
	insert into Entregas values(
						seq_Entregas.nextVal,
						(select uti_id from Utilizador where uti_nome = 'Roberto Vitorino'),
						(select liv_id from Livros where liv_nome = 'Murder 101'),
						to_date('2008.08.12','yyyy-mm-dd'),
						to_date('2008.08.08','yyyy-mm-dd'),
						'Entregue'
						);
						
	insert into Entregas values(
						seq_Entregas.nextVal,
						(select uti_id from Utilizador where uti_nome = 'Maria Gondomar'),
						(select liv_id from Livros where liv_nome = 'Java for dummies'),
						to_date('2008.12.25','yyyy-mm-dd'),
						to_date('2008.12.23','yyyy-mm-dd'),
						'Entregue'
						);
						
	insert into Entregas values(
						seq_Entregas.nextVal,
						(select uti_id from Utilizador where uti_nome = 'Orlando Fernandes'),
						(select liv_id from Livros where liv_nome = 'LIVRO B'),
						to_date('2008.04.15','yyyy-mm-dd'),
						to_date('2008.04.14','yyyy-mm-dd'),
						'Entregue'
						);
	insert into Entregas values(
						seq_Entregas.nextVal,
						(select uti_id from Utilizador where uti_nome = 'Orlando Fernandes'),
						(select liv_id from Livros where liv_nome = 'Java for dummies'),
						to_date('2008.04.15','yyyy-mm-dd'),
						to_date('2008.04.14','yyyy-mm-dd'),
						'Entregue'
						);
						
	insert into Genero values(
						seq_Genero.nextVal, 
						'Terror'
						);
	insert into Genero values(
						seq_Genero.nextVal, 
						'Drama'
						);
	insert into Genero values(
						seq_Genero.nextVal, 
						'Fantasia'
						);
	insert into Genero values(
						seq_Genero.nextVal, 
						'Thriller'
						);
	insert into Genero values(
						seq_Genero.nextVal, 
						'Policial'
						);
	insert into Genero values(
						seq_Genero.nextVal, 
						'Educacional'
						);
	insert into Genero values(
						seq_Genero.nextVal, 
						'Tutorial'
						);
						
	insert into GeneroLivros values(
						(select liv_id from Livros where liv_nome='Murder 101'), 
						(select gen_id from Genero where gen_nome ='Terror')
						);
						
	insert into GeneroLivros values(
						(select liv_id from Livros where liv_nome='Java for dummies'), 
						(select gen_id from Genero where gen_nome ='Educacional')
						);
	
	insert into GeneroLivros values(
						(select liv_id from Livros where liv_nome='Crime Scene'), 
						(select gen_id from Genero where gen_nome ='Policial')
						);