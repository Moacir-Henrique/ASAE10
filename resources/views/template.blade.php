<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<link rel="icon" type="imagem/png" href="{{url('image/icon.png') }}" />
	<title>FraiBeer</title>

	<link rel="stylesheet" type="text/css" href="{{url('style/style.css')}}"/>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	
</head>
<body>

<div class="container-fluid">
	<div class="row">
		
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark col-md-12">
		  <a class="navbar-brand" href="#"><img src="{{url('image/icon.png') }}" height="50" class="d-inline-block align-top" alt=""><span class="fontBeer">FraiBeer</span></a>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		  </button>
		  <div class="collapse navbar-collapse" id="navbarNavDropdown">
		    <ul class="navbar-nav">
		      <li class="nav-item">
		        <a class="nav-link" href="#">Produtos</a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="{{ Route('lista_cliente') }}">Lista de Clientes</a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="/venda">Venda</a>
		      </li>
		    </ul>
		  </div>
		  
			<div class="dropdown dropleft">
			  <button class="btn btn-dark my-2 my-sm-0" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			    Login
			  </button>
			  <div class="dropdown-menu dropdown-menu-left" aria-labelledby="dropdownMenuButton">
			    <form class="px-4 py-3" method="POST" action=" {{ Route('logar') }}">
			    	@csrf
				    <div class="form-group">
				      <label for="email">Endereço de e-mail</label>
				      <input type="email" class="form-control" name="email" id="email" placeholder="email@exemplo.com">
				    </div>
				    <div class="form-group">
				      <label for="password1">Password</label>
				      <input type="password" class="form-control" name="senha" id="password1" placeholder="Senha">
				    </div>

				    <button type="submit" class="btn btn-primary">Entrar</button>
				  </form>
				  <div class="dropdown-divider"></div>
				  <a class="dropdown-item" href="/cliente/cadastro">Novo por aqui? Cadastre-se</a>
				  <a class="dropdown-item" href="#">Esqueceu sua senha?</a>
				</div>
			  </div>
			
		

		</nav>

	


		<div class="col-md-1"></div>
		<div class="col-md-10 mt-3">
			@yield('conteudo')
		</div>
		<div class="col-md-1"></div>
	</div>
</div>






<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>
</html>