<!-- Row for General Statistics -->
<div class="row">

    <!-- Total de Propiedades -->
    @if($totalProperties)
    <div class="col-lg-4 col-md-6 mb-4">
        <div class="card card-stats bg-gradient-purpura-azul">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="card-icon bg-gradient bg-primary text-white rounded-circle shadow">
                        <h1 class="text-center p-4"><i class="bi bi-house "></i> </h1>
                    </div>
                    <div class="ms-3 text-end">
                        <h5 class="card-title text-muted">Total de Propiedades</h5>
                        <h3 class="font-weight-bold">{{ $totalProperties }}</h3>
                    </div>
                </div>
            </div>
            <div class="card-footer text-muted">
                <span>Propiedades registradas en el sistema</span>
            </div>
        </div>
    </div>
    @endif

    <!-- Propiedades en Venta -->
    @if($totalForSale)
    <div class="col-lg-4 col-md-6 mb-4">
        <div class="card card-stats bg-gradient-purpura-azul">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="card-icon bg-success bg-gradient text-white rounded-circle shadow">
                       <h1 class="text-center p-4"><i class="bi bi-tags "></i> </h1>
                    </div>
                    <div class="ms-3 text-end">
                        <h5 class="card-title text-muted">Propiedades en Venta</h5>
                        <h3 class="font-weight-bold">{{ $totalForSale }}</h3>
                    </div>
                </div>
            </div>
            <div class="card-footer text-muted">
                <span>Propiedades disponibles para venta</span>
            </div>
        </div>
    </div>
    @endif

    <!-- Propiedades en Arriendo -->
    @if($totalForRent)
    <div class="col-lg-4 col-md-6 mb-4">
        <div class="card card-stats bg-gradient-purpura-azul">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="card-icon bg-gradient bg-info text-white rounded-circle shadow">
                        <h1 class="text-center p-4"><i class="bi bi-key "></i> </h1>
                    </div>
                    <div class="ms-3 text-end">
                        <h5 class="card-title text-muted">Propiedades en Arriendo</h5>
                        <h3 class="font-weight-bold">{{ $totalForRent }}</h3>
                    </div>
                </div>
            </div>
            <div class="card-footer text-muted">
                <span>Propiedades disponibles para arriendo</span>
            </div>
        </div>
    </div>
    @endif

    <!-- Propiedades Publicadas -->
    @if($publishedProperties)
    <div class="col-lg-4 col-md-6 mb-4">
        <div class="card card-stats bg-gradient-purpura-azul">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="card-icon bg-gradient bg-warning text-white rounded-circle shadow">
                           <h1 class="text-center p-4"><i class="bi bi-megaphone "></i> </h1>
                    </div>
                    <div class="ms-3 text-end">
                        <h5 class="card-title text-muted">Propiedades Publicadas</h5>
                        <h3 class="font-weight-bold">{{ $publishedProperties }}</h3>
                    </div>
                </div>
            </div>
            <div class="card-footer text-muted">
                <span>Propiedades actualmente publicadas</span>
            </div>
        </div>
    </div>
    @endif

    <!-- Propiedades Vendidas o Arrendadas -->
    @if($soldOrRentedProperties)
    <div class="col-lg-4 col-md-6 mb-4">
        <div class="card card-stats bg-gradient-purpura-azul">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="card-icon bg-gradient bg-danger text-white rounded-circle shadow">
                        <h1 class="text-center p-4"><i class="bi bi-calendar "></i> </h1>
                    </div>
                    <div class="text-end">
                        <h5 class="card-title text-muted">Vendidas ó Arrendadas</h5>
                        <h3 class="font-weight-bold">{{ $soldOrRentedProperties }}</h3>
                    </div>
                </div>
            </div>
            <div class="card-footer text-muted">
                <span>Propiedades vendidas o arrendadas</span>
            </div>
        </div>
    </div>
    @endif

    <!-- Propiedades Nuevas (Última Semana) -->
    @if($newPropertiesLastWeek)
    <div class="col-lg-4 col-md-6 mb-4">
        <div class="card card-stats bg-gradient-purpura-azul">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="card-icon bg-gradient bg-secondary text-white rounded-circle shadow">
                        <h1 class="text-center p-4"><i class="bi bi-bag "></i> </h1>
                    </div>
                    <div class="ms-3 text-end">
                        <h5 class="card-title text-muted">Propiedades Nuevas (Última Semana)</h5>
                        <h3 class="font-weight-bold">{{ $newPropertiesLastWeek }}</h3>
                    </div>
                </div>
            </div>
            <div class="card-footer text-muted">
                <span>Nuevas propiedades añadidas esta semana</span>
            </div>
        </div>
    </div>
    @endif

    <!-- Total de Visualizaciones -->
    @if($totalViews)
    <div class="col-lg-6 col-md-12 mb-4">
        <div class="card card-stats bg-gradient-purpura-azul">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="card-icon bg-gradient bg-dark text-white rounded-circle shadow">
                        <h1 class="text-center p-4"><i class="bi bi-eye "></i> </h1>
                    </div>
                    <div class="ms-3 text-end">
                        <h5 class="card-title text-muted">Total de Visualizaciones</h5>
                        <h3 class="font-weight-bold">{{ $totalViews }}</h3>
                    </div>
                </div>
            </div>
            <div class="card-footer text-muted">
                <span>Visualizaciones en todas las propiedades</span>
            </div>
        </div>
    </div>
    @endif

    <!-- Propiedad Más Vista -->
    @if($mostViewedProperty)
    <div class="col-lg-6 col-md-12 mb-4">
        <div class="card card-stats bg-gradient-purpura-azul">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="card-icon bg-danger bg-gradient text-white rounded-circle shadow">
                        <h1 class="text-center p-4"><i class="bi bi-star "></i> </h1>
                    </div>
                    <div class="ms-3 text-end">
                        <h5 class="card-title text-muted">Propiedad Más Vista</h5>
                        <h3 class="font-weight-bold">{{ $mostViewedProperty->nombre }}</h3>
                    </div>
                </div>
            </div>
            <div class="card-footer text-muted">
                <span>{{ $mostViewedProperty->views }} visualizaciones</span>
            </div>
        </div>
    </div>
    @endif

</div>



    <!-- Custom CSS -->
    <style>
        .card-stats {
            border: none;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;

            /* background: rgb(238,174,202);
            background: linear-gradient(90deg, rgba(238,174,202,1) 0%, rgba(148,187,233,1) 100%); */
           }

        .card-stats:hover {
            transform: translateY(-10px);
        }

        .card-icon {
            width: 60px;
            height: 60px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .card-footer {
            background-color: rgba(0, 0, 0, 0.05);
            border-top: none;
            border-radius: 0 0 12px 12px;
        }


        .card-body .ms-3 {
            max-width: 200px; /* Ajusta según el espacio disponible */
        }

        .card-icon h1 {
            font-size: 2rem; /* Ajusta el tamaño del icono si es necesario */
            padding: 1.5rem;
        }

        .card-stats .card-body {
            padding: 15px; /* Asegura un buen espacio dentro de la tarjeta */
        }

    </style>

    <!-- Icons CDN -->

