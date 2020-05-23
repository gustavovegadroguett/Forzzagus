<?php
    include 'header2.php';
    include 'db.php';
    
?>

<div class="container-fluid">
      <?php 
           
           
           
            $sql= "SELECT * FROM usuarios WHERE id_usuario=$_SESSION[uid]";     
            
            $run_query=mysqli_query($con,$sql);  
            if(!$run_query){
                printf("ERROR %s\n",$con);
            }
            $row=mysqli_fetch_row($run_query);

            ?>								
						<!-- /Billing Details -->
						
								<form id="pefil_form"  onsubmit="return false" class="login200-form">
									<div class="billing-details jumbotron">
                                    <div class="section-title">
                                        <h2 class="login100-form-title p-b-49" >Sus datos</h2>
                                    </div>
                                    <div class="form-group ">
                                    
                                        <input class="input form-control input-borders" type="text" name="f_name" id="f_name" placeholder="Nombre" value="">
                                    </div>
                                    <div class="form-group">
                                    
                                        <input class="input form-control input-borders" type="text" name="l_name1" id="l_name1" placeholder="Apellido Paterno" value="">
                                        <br>
                                        <input class="input form-control input-borders" type="text" name="l_name2" id="l_name2" placeholder="Apellido Materno" value="">
                                        
                                    </div>
                                    <div class="form-group">
                                        <input class="input form-control input-borders" type="rut" name="rut"  placeholder="rut" value="">
                                    </div>
                                    <div class="form-group">
                                        <input class="input form-control input-borders" type="email" name="email"  placeholder="Email" value="">
                                    </div>
                                    <div class="form-group">
                                        <input class="input form-control input-borders" type="password" name="password" id="password" placeholder="Contraseña">
                                    </div>
                                    <div class="form-group">
                                        <input class="input form-control input-borders" type="password" name="repassword" id="repassword" placeholder="contraseña">
                                    </div>
                                   <div class="form-group">
                                        <input class="input form-control input-borders" type="text" name="mobile" id="mobile" placeholder="Celular anteponga 9" value="">
                                    </div>
                                    <div class="form-group">
                                        <input class="input form-control input-borders" type="text" name="address1" id="address1" placeholder="Dirección" value="">
                                    </div>
                                    <div class="form-group">
                                        <input class="input form-control input-borders" type="text" name="city" id="city" placeholder="Ciudad">
                                    </div>  
                                    
                                    
                                    <div style="form-group">
                                       <input class="primary-btn btn-block"  value="Registrarse" type="submit" name="Registrar">
                                    </div>
                                   
                                    
                                
								</form>
                                <div class="login-marg">
						<!-- Billing Details -->
						<div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-8" id="signup_msg">
                                    

                                </div>
                                <!--Alert from signup form-->
                            </div>
                            <div class="col-md-2"></div>
                        </div>

						
					</div>
                    </div> 
          