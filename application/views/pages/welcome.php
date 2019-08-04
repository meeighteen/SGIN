    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#myCarousel" data-slide-to="1"></li>
          <li data-target="#myCarousel" data-slide-to="2"></li>
          <li data-target="#myCarousel" data-slide-to="3"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="first-slide" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="First slide">
            <div class="container">
              <div class="carousel-caption text-left">
                <h1>Hola<?php if($usuario!=''){ echo ', '.$usuario;}?>.</h1>
                <p>Bienvenido al Sistema Gestor de Incidencias Informáticas.</p>
                <?php if(!$this->session->userdata('logged_in')){ ?><p><a class="btn btn-lg btn-primary" href="<?php echo base_url(); ?>users/login" role="button">Entrar</a></p><?php } ?>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <img class="second-slide" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Second slide">
            <div class="container">
              <div class="carousel-caption">
                <h1>Registro de incidencias.</h1>
                <p>El personal solo tiene acceso a la Edición, el administrador tiene los permisos de Edición y Eliminación.</p>
                <?php if($this->session->userdata('logged_in')){ ?><p><a class="btn btn-lg btn-primary" href="<?php echo base_url(); ?>incidents/register_incident" role="button">Registrar incidencia</a></p><?php } ?>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <img class="third-slide" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Third slide">
            <div class="container">
              <div class="carousel-caption text-right">
                <h1>Registro de mantenimientos.</h1>
                <p>El personal solo tiene acceso a la Edición, el administrador tiene los permisos de Edición y Eliminación.</p>
                <?php if($this->session->userdata('logged_in')){ ?><p><a class="btn btn-lg btn-primary" href="<?php echo base_url(); ?>incidents" role="button">Ver registros</a></p><?php } ?>
              </div>
            </div>
          </div>
        </div>
          <div class="carousel-item">
            <img class="third-slide" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Third slide">
            <div class="container">
              <div class="carousel-caption text-right">
                <h1>Funciones extras.</h1>
                <p>Añadir nuevas ubicaciones, tipos de equipos y personal técnico. (solo Administrador)</p>
                <?php if($this->session->userdata('logged_in')){ ?><p><a class="btn btn-lg btn-primary" href="<?php echo base_url(); ?>extras" role="button">Extras</a></p> <?php } ?>
              </div>
            </div>
          </div>
        
        <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Anterior</span>
        </a>
        <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Siguiente</span>
        </a>
    </div>
