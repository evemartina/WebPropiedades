<div class="row">
    <!-- Gráfico de Barras de Propiedades en Venta, Arriendo y Publicadas -->
    <div class="col-lg-6 col-md-12 mb-4">
        <div class="card">
            <div class="card-header">Distribución de Propiedades</div>
            <div class="card-body">
                <canvas id="myChart"></canvas>
            </div>
        </div>
    </div>

    <!-- Gráfico de Torta por Tipo de Propiedad -->
    <div class="col-lg-6 col-md-12 mb-4">
        <div class="card">
            <div class="card-header">Distribución por Tipo de Propiedad</div>
            <div class="card-body">
                <canvas id="propertyTypeChart"></canvas>
            </div>
        </div>
    </div>
</div>
<!-- Scripts de Charts -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Gráfico de Barras
    var ctx = document.getElementById('myChart').getContext('2d');

    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Propiedades en Venta', 'Propiedades en Arriendo', 'Propiedades Publicadas'],
            datasets: [{
                label: '# de Propiedades',
                data: [{{ $totalForSale }}, {{ $totalForRent }}, {{ $publishedProperties }}],
                // Aplicamos el gradiente al backgroundColor
                backgroundColor: [
                    ' #fe9496',
                    ' #4bcbeb',
                    '#9e58ff'
                ], // Gradiente en el fondo de las barras
                borderColor: ['rgba(238, 174, 202, 1)', 'rgba(148, 187, 233, 1)'], // Borde sólido
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    // Gráfico de Torta
    var tortaChart = document.getElementById('propertyTypeChart').getContext('2d');

    // Paleta de colores basada en tonos del gradiente (rosa a azul)
    var paletteColors = [

        '#1bcfb4',
        '#fe9496',
        '#4bcbeb',
        '#9e58ff',
        '#17a2b8',
        '#f3797e',
        '#7978e9 '

    ];

    var propertyTypeChart = new Chart(tortaChart, {
        type: 'pie',
        data: {
            labels: @json($typeLabels), // Etiquetas dinámicas (casas, apartamentos, etc.)
            datasets: [{
                label: 'Tipo de Propiedad',
                data: @json($typeValues), // Valores dinámicos (número de propiedades)
                backgroundColor: paletteColors, // Colores sólidos de la paleta
                borderColor: paletteColors, // Bordes con el mismo color
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top'
                },
                tooltip: {
                    callbacks: {
                        label: function(tooltipItem) {
                            return tooltipItem.label + ': ' + tooltipItem.raw + ' propiedades';
                        }
                    }
                }
            }
        }
    });
</script>
