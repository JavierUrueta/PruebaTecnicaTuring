@extends('layouts.director-navbar')

@section('content')
<div class="container text-center" style="margin-top: 1em; min-height: 100vh; display: flex; flex-direction: column;">
    <div class="row align-items-center" style="padding-right: 5em;">
        <!-- Columna de Títulos -->
        <div class="col-12 col-md-6">
            <h1 style="font-family: 'Poppins', sans-serif; font-weight: 700; font-size: 3rem; color: white; margin-top: 1em; text-shadow: 2px 2px 4px #0f2d3c, -2px -2px 4px #0f2d3c;">Profesores</h1> <!-- Título pegado al navbar -->
        </div>
        <div class="col-12 col-md-6">
            <h1 style="font-family: 'Poppins', sans-serif; font-weight: 700; font-size: 3rem; color: white; margin-top: 1em; text-shadow: 2px 2px 4px #0f2d3c, -2px -2px 4px #0f2d3c;">Servicios escolares</h1> <!-- Título pegado al navbar -->
        </div>
    </div>
    <div class="row" style="margin-top: 3em;">
        <!-- Columna de las cards que se expandirá -->
        <div class="col-12 col-md-5" style="display: flex; flex-direction: column; padding-right: 0;">
            <!-- Paginación y tarjetas -->
            <div class="row" style="margin-right: 0;">
                <!-- Card 1 -->
                <div class="col-12 mb-4">
                    <div class="card" style="height: 250px;">
                        <div class="card-body">
                            <h5 class="card-title">Card Title 1</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                    </div>
                </div>
                <!-- Card 2 -->
                <div class="col-12 mb-4">
                    <div class="card" style="height: 250px;">
                        <div class="card-body">
                            <h5 class="card-title">Card Title 2</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                    </div>
                </div>
                <!-- Card 3 -->
                <div class="col-12 mb-4">
                    <div class="card" style="height: 250px;">
                        <div class="card-body">
                            <h5 class="card-title">Card Title 3</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Paginación al final, ajustada -->
            <nav aria-label="Page navigation" style="margin-top: 2em; padding-bottom: 0;">
                <ul class="pagination justify-content-center">
                    <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                    </li>
                    <li class="page-item active" aria-current="page">
                        <a class="page-link" href="#">1</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">2</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">3</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">Next</a>
                    </li>
                </ul>
            </nav>
        </div>
        <!-- Columna de contenido adicional -->
        <div class="col-12 col-md-5 offset-md-1" style="display: flex; flex-direction: column; padding-left: 0;">
            <!-- Aquí puedes agregar tarjetas o contenido adicional -->
            <div class="row" style="margin-right: 0;">
                <!-- Card 1 -->
                <div class="col-12 mb-4">
                    <div class="card" style="border: none; display: flex; flex-direction: row; max-width: 100%; margin-bottom: 1.5em; background-color: #0f2d3c; color: #ffffff; border-radius: 1.5em">
                        <div class="row no-gutters" style="width: 100%;">
                            <!-- Imagen en el lado izquierdo, ocupando 3 columnas (25% del ancho) y con margen a la izquierda -->
                            <div class="col-4 d-flex align-items-center justify-content-center" style="height: 100px; border-radius: 3em;">
                                <img src="{{ asset('images/avatar.jpg') }}" class="card-img-left" style="max-height: 100%; max-width: 100%; object-fit: contain; border-radius: 25%; margin-top: 1.8em; border-style: solid; border-color: #3cdcf0; ">
                            </div>
                            <!-- Contenido a la derecha, ocupando 9 columnas (75% del ancho) -->
                            <div class="col-8" style="padding-left: 20px;">
                                <div class="card-body">
                                    <h5 class="card-title">Secretario</h5>
                                    <p class="card-text">Jennie Rivera</p>
                                    <p class="card-text">Encargada de blblabla</p>
                                    <p class="card-text">Correo: Correo@correo.com</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Card 2 -->
                <div class="col-12 mb-4">
                    <div class="card" style="border: none; display: flex; flex-direction: row; max-width: 100%; margin-bottom: 1.5em; background-color: #0f2d3c; color: #ffffff;">
                        <div class="row no-gutters" style="width: 100%;">
                            <!-- Imagen en el lado izquierdo, ocupando 3 columnas (25% del ancho) y con margen a la izquierda -->
                            <div class="col-4 d-flex align-items-center justify-content-center" style="height: 100px; border-radius: 3em;">
                                <img src="{{ asset('images/avatar.jpg') }}" class="card-img-left" style="max-height: 100%; max-width: 100%; object-fit: contain; border-radius: 25%; margin-top: 2em; ">
                            </div>
                            <!-- Contenido a la derecha, ocupando 9 columnas (75% del ancho) -->
                            <div class="col-8" style="padding-left: 20px;">
                                <div class="card-body">
                                    <h5 class="card-title">Secretario</h5>
                                    <p class="card-text">Jennie Rivera</p>
                                    <p class="card-text">Encargada de blblabla</p>
                                    <p class="card-text">Correo: Correo@correo.com</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Card 3 -->
                <div class="col-12 mb-4">
                    <div class="card" style="border: none; display: flex; flex-direction: row; max-width: 100%; margin-bottom: 1.5em; background-color: #0f2d3c; color: #ffffff;">
                        <div class="row no-gutters" style="width: 100%;">
                            <!-- Imagen en el lado izquierdo, ocupando 3 columnas (25% del ancho) y con margen a la izquierda -->
                            <div class="col-4 d-flex align-items-center justify-content-center" style="height: 100px; border-radius: 3em;">
                                <img src="{{ asset('images/avatar.jpg') }}" class="card-img-left" style="max-height: 100%; max-width: 100%; object-fit: contain; border-radius: 25%; margin-top: 2em; ">
                            </div>
                            <!-- Contenido a la derecha, ocupando 9 columnas (75% del ancho) -->
                            <div class="col-8" style="padding-left: 20px;">
                                <div class="card-body">
                                    <h5 class="card-title">Secretario</h5>
                                    <p class="card-text">Jennie Rivera</p>
                                    <p class="card-text">Encargada de blblabla</p>
                                    <p class="card-text">Correo: Correo@correo.com</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
