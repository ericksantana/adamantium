<?php
	if(!session_id())
		session_start();	
?>
<!DOCTYPE html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Upload MKT</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap-theme.min.css">
	<link rel="stylesheet" href="css/style.css">
</head>

<body>
	<div class="container">
		<form class="form-signin" role="form" method="post" action="action/upload_file.php" enctype="multipart/form-data">
			<h2 class="form-signin-heading">Upload MKT</h2>
			<div class="form-group">
				<label for="cliente">Cliente</label>
				<select name="cliente" id="cliente" class="form-control">
					
					<?php
						
						$dir = "../pecas/";
						function listar($dir,$oq = null){
							$op = ( ($oq == null) ? $dir : $oq );
							if (is_dir($dir)) {
								if ($dh = opendir($dir)) {
									while (($file = readdir($dh)) !== false) {
										if( $file != '.' and $file != '..' ){
											if( filetype($dir . $file) == "dir" ){
												$tmp[$file] = listar($dir.$file."/",$file);
											}else{
												$tmp[] = $file;
											}
										}
									}
									closedir($dh);
								}
							}
							return $tmp;
						}
							
						$arr = listar($dir);
						ksort($arr);
					foreach ($arr as $key => $value) {?>
					
					<option value="<?php echo $key ?>"><?php echo $key;?></option>
					<?php
						# code...
					}
					?>
				</select>
			</div>
			<div class="form-group">
				<label for="task">Task</label>
				<input name="task" type="text" class="form-control" placeholder="Task">
			</div>
			<div class="form-group">
				
				<label for="arquivohtml">Html</label>
				<input accept="text/html" name="arquivohtml" type="file" class="form-control" placeholder="">
			</div>
			<div class="form-group">
				
				<label for="arquivo">Imagens</label>
				<input  accept="image/*" multiple  name="arquivo[]" type="file" class="form-control" placeholder="">
			</div>

			<div class="form-group">
				<input id="comentar" name="comentar" type="checkbox"> Comentar no Jira!
			</div>

			<div class="form-group">
				<input id="litimus" name="litimus" type="checkbox"> Testar no Litimus!
			</div>

			<div id="jira">

				<div class="form-group">
						<input name="login" type="text" class="form-control" placeholder="login">
					</div>

				<div class="form-group">Senha</label>
						<input name="senha" type="password" class="form-control" placeholder="Senha">
				</div>		

				<div class="form-group">Comentário</label>
						<textarea name="comentario" rows="3" class="form-control"></textarea>
				</div>	
				
			</div>

			<button id="enviar" class="btn btn-lg btn-primary btn-block" type="submit">Enviar</button>
		</form>


<?php 
 
if(isset($_SESSION['retorno'])){
	foreach ($_SESSION['retorno'] as $value) {
		echo '<p class="text-center">
				<a href="'.$value.'">'.$value.'</a>
			</p>';
	}
	session_destroy();
}?>

		</div> <!-- /container -->
	</body>


	<script src="js/vendor/jquery.js"></script>
	<script src="js/upload.js"></script>
	


</html>