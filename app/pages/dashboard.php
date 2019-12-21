<?php
  if ( $_SESSION['UsuarioTipo'] == '1') {
    echo ' <script> window.location.href="index.php?pg=tickets" </script> ';
  }
?>

<div class="container">
    <div class="row text-center">
        <div class="col-md-3 col-sm-6">
            <div class="py-3 px-5 shadow">
                <?php

                $kpi1 = DBRead('ticket', '', 'count(1) as total');
                echo '<h1>' . $kpi1[0]['total'] . '</h1>';

                ?>
                <p>Total de tickets</p>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="py-3 px-5 shadow">
                <?php

                $kpi3 = DBRead('atendente', '', 'avg(custohora) as total');
                echo '<h1>' . number_format($kpi3[0]['total'], 2, ',', '.') . '</h1>';

                ?>
                <p>Média custo hora</p>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="py-3 px-5 shadow">
                <?php

                $kpi3 = DBRead('atendente', '', 'avg(custohora) as total');
                echo '<h1>' . number_format($kpi3[0]['total'], 2, ',', '.') . '</h1>';

                ?>
                <p>Média custo hora</p>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="py-3 px-5 shadow">
                <?php

                $kpi3 = DBRead('atendente', '', 'avg(custohora) as total');
                echo '<h1>' . number_format($kpi3[0]['total'], 2, ',', '.') . '</h1>';

                ?>
                <p>Média custo hora</p>
            </div>
        </div>
    </div>
</div>


<div class="container my-5">
    <div class="row justify-content-between shadow">
        <canvas id="oilChart" class="col-md-4 py-3" height="400"></canvas>
        <canvas id="myBarChart" class="col-md-8 py-3" height="400"></canvas>
    </div>
</div>

<div class="container my-5">
    <div class="row justify-content-between">
        <canvas id="myLineChart" class="col-md-12 shadow py-3" height="400"></canvas>
    </div>
</div>




<script>
    // GRÁFICO DE PIZZA
    var oilCanvas = document.getElementById("oilChart")

    Chart.defaults.global.defaultFontFamily = "Lato"
    Chart.defaults.global.defaultFontSize = 18

    var oilData = {
        labels: [
            <?php
            foreach (DBRead('tipo_ticket c', 'inner join ticket t on t.idtipoticket = c.idtipoticket group by 1', 'c.nome, count(t.idticket) as qtd') as $cat) {
                echo '"' . $cat['nome'] . '",';
            }
            ?>
        ],
        datasets: [{
            data: [
                <?php
                foreach (DBRead('tipo_ticket c', 'inner join ticket t on t.idtipoticket = c.idtipoticket group by 1', 'c.nome, count(t.idticket) as qtd') as $val) {
                    echo $val['qtd'] . ",";
                }
                ?>
            ],
            backgroundColor: [
                "#FF6384",
                "#84FF63",
                "#6384FF"
            ]
        }]
    }

    var myDoughnutChart = new Chart(oilCanvas, {
        type: 'doughnut',
        data: oilData
    })



    // GRAFICO EM BARRAS 
    var ctx = document.getElementById('myBarChart').getContext('2d')
    var chart = new Chart(ctx, {
        // The type of chart we want to create
        type: 'bar',

        // The data for our dataset
        data: {
            labels: [
                <?php
                foreach (DBRead('categoria_ticket c', 'inner join ticket t on t.idcategoriaticket = c.idcategoriaticket group by 1 order by 2 desc', 'c.nome, count(idticket) as qtd') as $cat2) {
                    echo '"' . $cat2['nome'] . '",';
                }
                ?>
            ],
            datasets: [{
                label: 'Tickets por Categoria',
                backgroundColor: 'rgb(52, 152, 219)',
                borderColor: 'rgb(52, 152, 250)',
                data: [
                    <?php
                    foreach (DBRead('categoria_ticket c', 'left join ticket t on t.idcategoriaticket = c.idcategoriaticket group by 1 order by 2 desc', 'c.nome, count(idticket) as qtd') as $val2) {
                        echo '"' . $val2['qtd'] . '",';
                    }
                    ?>
                ]
            }]
        },
    })


    // GRÁFICO DE LINHAS 
    var ctx = document.getElementById('myLineChart').getContext('2d');
    var chart = new Chart(ctx, {
        // The type of chart we want to create
        type: 'line',

        // The data for our dataset
        data: {
            labels: [
                <?php
                foreach (DBRead('ticket', 'group by 1 order by data', 'date(datahoraabertura) as data, count(idticket) as qtd') as $cat3) {
                    echo '"' . date('d/m/y', strtotime($cat3['data'])) . '",';
                }
                ?>
            ],
            datasets: [{
                label: 'Inclusão de ticket diário',
                backgroundColor: 'rgba(52, 152, 219, 0.4)',
                borderColor: 'rgb(52, 152, 250)',
                data: [
                    <?php
                    foreach (DBRead('ticket', 'group by 1 order by data', 'date(datahoraabertura) as data, count(idticket) as qtd') as $cat3) {
                        echo '"' . $cat3['qtd'] . '",';
                    }
                    ?>
                ]
            }]
        },
    })
</script>