<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;


$this->title = 'RIFA';
$this->params['breadcrumbs'][] = $this->title;
?>
<script type="application/javascript">
    function consultar() {
        let dni = $("#dni").val();
        if (dni=="") {
            alert("Debe ingresar un número de DNI");
        } else {
            $.ajax({
                type: 'POST',
                url: '<?php echo Url::to("site/obtenerParticipacion") ?>',
                data: {
                    'dni': dni,
                },
                success: function (data) {
                    //var datos = jQuery.parseJSON(data);
                    $("#resultados").html(data);
                }
            });
        }
    }
</script>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        Consulta tu participación en la rifa
    </p>

</div>
<div class="body-content">
    <div class="row">
        <div class="col-lg-12">
            <label>DNI:</label> <input type="number" id="dni">
            <button type="button" name="consultar" class="btn-success" onclick="consultar()">Consultar</button>
        </div>

    </div>
    <div class="row">
        <div class="col-lg-12">
            <label>Resultados</label>
            <div id="resultados">

            </div>
        </div>
    </div>
</div>