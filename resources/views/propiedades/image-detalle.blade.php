        <!-- Sección para la imagen principal (50% del ancho) -->
        <div class="col-lg-6 col-md-12 mb-4">
            <div id="main-image-container" class="mb-4">
                <img id="main-image" src="{{ asset($property->images[0]->imagen) }}" class="w-100" alt="Imagen Principal" style="object-fit: cover; height: 100%; cursor: pointer;" data-bs-toggle="modal" data-bs-target="#imageModal">
            </div>
        </div>

        <!-- Sección para las miniaturas de imágenes (50% del ancho) -->
        <div class="col-lg-6 col-md-12">
            <div class="row">
                @foreach($property->images as $index => $image)
                    <div class="col-4 mb-2">
                        <img src="{{ asset($image->imagen) }}" class="w-100 thumbnail" alt="Imagen {{ $index + 1 }}" style="object-fit: cover; cursor: pointer;" onclick="changeMainImage('{{ asset($image->imagen) }}')">
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Modal para la imagen principal al 100% -->
    <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <img id="modal-image" src="{{ asset($property->images[0]->imagen) }}" class="w-100" alt="Imagen Modal" style="object-fit: contain;">
                </div>
            </div>
        </div>
    </div>


<script>
    // Función para cambiar la imagen principal cuando se hace clic en una miniatura
        function changeMainImage(imageUrl) {
            const mainImage = document.getElementById('main-image');
            mainImage.src = imageUrl;
            // Cambiar la imagen del modal
            const modalImage = document.getElementById('modal-image');
            modalImage.src = imageUrl;
        }

</script>
