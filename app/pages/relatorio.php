<div class="container-fluid">
    <div class="row text-center">
        <div class="col-md-3">
            <div class="d-inline-block p-5 border rounded shadow">
                <?php

                $kpi1 = DBRead('ticket', '', 'count(1) as total');
                echo '<h3>' . $kpi1[0]['total'] . '</h3>';

                ?>
                <p>Total de tickets</p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="d-inline-block p-5 border rounded shadow">
                <?php

                $kpi3 = DBRead('atendente', '', 'avg(custohora) as total');
                echo '<h3>' . number_format($kpi3[0]['total'], 2, ',', '.') . '</h3>';

                ?>
                <p>Média custo hora</p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="d-inline-block p-5 border rounded shadow">
                <?php

                $kpi3 = DBRead('atendente', '', 'avg(custohora) as total');
                echo '<h3>' . number_format($kpi3[0]['total'], 2, ',', '.') . '</h3>';

                ?>
                <p>Média custo hora</p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="d-inline-block p-5 border rounded shadow">
                <?php

                $kpi3 = DBRead('atendente', '', 'avg(custohora) as total');
                echo '<h3>' . number_format($kpi3[0]['total'], 2, ',', '.') . '</h3>';

                ?>
                <p>Média custo hora</p>
            </div>
        </div>

            <canvas id="oilChart" height="300" class="col-md-4"></canvas>
            <canvas id="myBarChart" height="300" class="col-md-8"></canvas>

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
                    foreach (DBRead('categoria_ticket c', 'left join ticket t on t.idcategoriaticket = c.idcategoriaticket group by 1', 'c.nome, count(idticket) as qtd', 'order by qtd desc') as $cat) {
                        echo '"' . $cat['nome'] . '",';
                    }
                ?>
            ],
            datasets: [{
                label: 'My First dataset',
                backgroundColor: 'rgb(255, 99, 132)',
                borderColor: 'rgb(255, 99, 132)',
                data: [0, 10, 5, 2, 20, 30, 45]
            }]
        },


    })
</script>