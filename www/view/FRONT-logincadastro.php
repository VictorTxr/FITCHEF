<?php require_once "FRONT-header.php"; 
?>

	
		<div class="login-container login-form-1">
            
                    <h3>Login</h3>
                    
                    <?php include "mensagem.php"; ?>
                    <form action="<?php echo $url."/login/cliente"; ?>" method="post" >
                        <div class="form-group">
                            <input type="text" name="email" class="form-control" placeholder="Seu Email *" value="" />
                        </div>
                        <div class="form-group">
                            <input type="password" name="senha" class="form-control" placeholder="Sua senha *" value="" />
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btnSubmit" value="Login" />
                        </div>
                        <div class="form-group">
                            <a href="#" class="ForgetPwd">Esqueceu sua senha?</a>
                            <br>
                            <a href="<?php echo $url; ?>/cadastrar/" class="ForgetPwd">Cadastre-se</a>
                        </div>
                    </form>
                </div>
				

</div>
</div>

			



<?php include "FRONT-footer.php" ?>