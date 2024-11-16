<div id="heroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <div class="hero-home d-flex align-items-center"
        style="background-image: url('/storage/images/home/fondo.jpg')">
          <div class="container carussel-contain">

          </div>
        </div>
      </div>
      <div class="carousel-item">
        <div class="hero-home d-flex align-items-center"
        style="background-image:url('/storage/images/home/home2.webp')">
          <div class="container carussel-contain">

          </div>
        </div>
      </div>
      <div class="carousel-item">
        <div class="hero-home d-flex align-items-center"
        style="background-image: url('/storage/images/home/home3.webp')">
          <div class="container carussel-contain">

          </div>
        </div>
      </div>
    </div>
  </div>


<div class="formulario-carrusel-container">
      <form class="row g-0 justify-content-center formulario-carrusel formulario filterForm">
        <div class="col-12 col-md-5 col-lg-3 mb-3">
            <div class="input-group mb-3 p-2">
                <span class="input-group-text" id="basic-addon1">Tipo de Inmueble</span>
                <select name="property_types" id="property_types" class="form-select m-0">
                    @foreach($tipo_propiedades as $tipo)
                        <option value="{{$tipo->id}}">{{$tipo->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-12 col-md-5 col-lg-3 mb-3">
            <div class="input-group mb-3 p-2">
                <span class="input-group-text" id="basic-addon1">Operacion</span>
                <select name="operacion" id="operacion" class="form-select m-0">
                    <option value="venta">Venta</option>
                    <option value="arriendo">Arriendo</option>
                </select>
            </div>
        </div>
        <div class="col-12 col-md-2 mb-3 p-2">
            <button type="submit" class="btn btn-primary mb-3 "> Buscar</button>
        </div>
    </form>
</div>



