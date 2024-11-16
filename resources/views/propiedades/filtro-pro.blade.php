<div class="container my-5">
    <h3 class="text-end" data-bs-toggle="collapse" data-bs-target="#form-filter" role="button" aria-expanded="false" aria-controls="form-filter">
        Filtros <i class="bi bi-filter"></i>
    </h3>
    <form  class="row g-3 collapse filterForm" id="form-filter" >


        <!-- Número de Dormitorios -->
        <div class="col-md-4">
            <label for="bedrooms" class="form-label">Número de Dormitorios</label>
            <select class="form-select" id="habitaciones" name="habitaciones">
                <option value="" selected>Todos</option>
                <option value="1">1 Dormitorio</option>
                <option value="2">2 Dormitorios</option>
                <option value="3">3 Dormitorios</option>
                <option value="4">4 Dormitorios</option>
                <option value="5">5 o más Dormitorios</option>
            </select>
        </div>

        <!-- Número de Baños -->
        <div class="col-md-4">
            <label for="bathrooms" class="form-label">Número de Baños</label>
            <select class="form-select" id="banos" name="banos">
                <option value="" selected>Todos</option>
                <option value="1">1 Baño</option>
                <option value="2">2 Baños</option>
                <option value="3">3 Baños</option>
                <option value="4">4 o más Baños</option>
            </select>
        </div>

        <!-- Superficie -->
        <div class="col-md-4">
            <label for="surface" class="form-label">Superficie (m²)</label>
            <input type="number" class="form-control" id="metros_totales" name="metros_totales" placeholder="Ej: 100">
        </div>

        <!-- Precio Mínimo -->
        <div class="col-md-4">
            <label for="min_price" class="form-label">Precio Mínimo ($)</label>
            <input type="number" class="form-control" id="min_price" name="min_price" placeholder="Ej: 50000">
        </div>

        <!-- Precio Máximo -->
        <div class="col-md-4">
            <label for="max_price" class="form-label">Precio Máximo ($)</label>
            <input type="number" class="form-control" id="max_price" name="max_price" placeholder="Ej: 200000">
        </div>



        <!-- Botón de Búsqueda -->
        <div class="row m-3 g-5">
            <div class="text-center col">
                <button type="submit" class="btn btn-primary " >Aplicar Filtros</button>
            </div>
            <div class="text-center col">
                <button type="button" id="clearFilters" class="btn btn-secondary">Limpiar Filtros</button>
            </div>
        </div>
    </form>
</div>
