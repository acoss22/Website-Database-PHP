drop table TipoUtilizador cascade constraints;
drop table Livros cascade constraints;
drop table Utilizador cascade constraints;
drop table Entregas cascade constraints;
drop table  ObraLiteraria cascade constraints;
drop table  Autor cascade constraints;
drop table  Editora cascade constraints;
drop table  Genero cascade constraints;
drop table   Visualizacoes cascade constraints;
drop table   GeneroLivros cascade constraints;



	create table TipoUtilizador(
					tpu_id number(10) not null, 		
					tpu_tipo varchar2(20) not null 		
							);

	create table Livros(	
					liv_id number(10) not null,  		
					edi_id_f number(10) not null, 	
					obr_id_f number(10) not null, 		
					liv_nome varchar2(255) not null,  	
					liv_preco number(5) not null,  		
					liv_idioma varchar2(3)				
					);

	create table Utilizador(
					uti_id number(10) not null, 	
					tpu_id_f number(10) not null,		
					uti_user varchar2(20) not null,		
					uti_pass varchar2(20) not null,		
					uti_nome varchar2(255) not null,	
					uti_morada varchar2(255) not null,	
					uti_dt_nasc Date not null,			
					uti_nib number(21) not null,		
					uti_bi number(7) not null,			
					uti_email varchar2(40) not null		
					);

	create table Entregas( 
					ent_id number(10) not null, 		
					uti_id_f number(10) not null, 		
					liv_id_f number(10) not null,	
					ent_dt_entrega Date,				
					ent_dt_compra Date not null,		
					ent_estado varchar(20)				
					);
	
	
---

	create table ObraLiteraria( 
					obr_id number(10) not null, 		
					aut_id_f number(10) not null,		
					obr_nome varchar(255) not null,		
					obr_dt_criacao Date not null		
					);
						


	create table Autor(
					aut_id number(10), 				
					aut_nome varchar2(255),				
					aut_dt_nasc Date				
					);


	create table Genero(
					gen_id number(10) not null, 	
					gen_nome varchar(255) not null 		
					);
			
					
	create table Editora(
					edi_id number(10) not null, 	
					edi_nome varchar(255) not null 	
						);
								
					
	create table Visualizacoes(
					vis_id number(10) not null, 
					vis_numero number(38) not null		
							);



	
	create table GeneroLivros(
						liv_id_f number(10), 			
						gen_id_f number(10) 		
							);
	

						
	alter table Livros add constraint pk_Livros primary key(liv_id); 							
	alter table TipoUtilizador add constraint pk_TipoUtilizador primary key(tpu_id); 			
	alter table Utilizador add constraint pk_Utilizador primary key(uti_id); 					
	alter table Entregas add constraint pk_Entregas primary key(ent_id); 					
	alter table ObraLiteraria add constraint pk_ObraLiteraria primary key(obr_id); 				
	alter table Autor add constraint pk_Autor primary key(aut_id); 							
	alter table Visualizacoes add constraint pk_Visualizacoes primary key(vis_id); 				
	alter table Genero add constraint pk_Genero primary key(gen_id);	 						
	alter table Editora add constraint pk_Editora primary key(edi_id); 							
	alter table GeneroLivros add constraint pk_GeneroLivros primary key(liv_id_f, gen_id_f); 	
	
	
	alter table Livros add constraint Livros_fk_ObraLiteraria foreign key(obr_id_f) references ObraLiteraria(obr_id); 			
	alter table Livros add constraint Livros_fk_Editora foreign key(edi_id_f) references Editora(edi_id); 						
	alter table Utilizador add constraint Utilizador_fk_TipoUtilizador foreign key(tpu_id_f) references TipoUtilizador(tpu_id); 
	alter table ObraLiteraria add constraint ObraLiteraria_fk_Autor foreign key(aut_id_f) references Autor(aut_id); 			
	alter table GeneroLivros add constraint GeneroLivros_fk_Livros foreign key(liv_id_f) references Livros(liv_id); 			
	alter table GeneroLivros add constraint GeneroLivros_fk_Genero foreign key(gen_id_f) references Genero(gen_id); 			
	alter table Entregas add constraint Entregas_fk_Utilizador foreign key(uti_id_f) references Utilizador(uti_id); 			
	alter table Entregas add constraint Entregas_fk_Livros foreign key(liv_id_f) references Livros(liv_id); 