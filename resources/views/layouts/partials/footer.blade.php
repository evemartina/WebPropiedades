<footer class="bg-dark text-white text-center p-4">
    <div class="container">
        <p>&copy; 2024 Corredora de Propiedades. Todos los derechos reservados.</p>


            <div class="row mt-4 mb-5">
                <div class="col-10 offset-1">
                    <a href="{{ $info->instagram }}" target="_blank" class="plain-link  me-3">
                        <i class="bi bi-instagram display-3"></i>
                    </a>
                    <a href="https://api.whatsapp.com/send/?phone={{$info->whatsapp}}"  target="_blank"  class="plain-link  me-3">
                        <i class="bi bi-whatsapp display-3"></i>
                    </a>
                    <a href="mailto:{{ $info->email }}" class="plain-link me-3 ">
                        <i class="bi bi-envelope-at-fill display-3"></i>
                    </a>
                    <a href="{{ $info->facebook }}"  target="_blank" class="plain-link me-3">
                        <i class="bi bi-facebook display-3 " ></i>
                    </a>
                </div>
            </div>
    </div>
</footer>
