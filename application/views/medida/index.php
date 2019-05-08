        <!-- Sidebar -->
        <div style="background-color: #54669e" class=" border-right" id="sidebar-wrapper">
            <div class="sidebar-heading text-center bg-light"><img src="assets/img/logo.png" width="100" alt=""></div>
            <div class="list-group list-group-flush">
                <button data-toggle="modal" data-target="#calcular" class="btn btn-info">Calcular
                    IMC</button>
            </div>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- The Modal -->
        <div class="modal fade" id="calcular">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header" style="background-color: #7acefa; color: white">
                        <h4 class="modal-title">Cálcule su IMC</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <form>
                            <div class="form-group">
                                <label for="altura">Altura: (m)</label>
                                <input type='number' step='0.01' value='0.00' min="0" max="200" class="form-control"
                                    placeholder="Altura" ng-model="formData.altura">
                            </div>
                            <div class="form-group">
                                <label for="peso">Peso: (Kg)</label>
                                <input type='number' step='0.01' value='0.00' min="0" max="200" class="form-control"
                                    placeholder="Peso" ng-model="formData.peso">
                            </div>

                            <div class="form-group">
                                <label for="peso">IMC: </label>
                                <input class="form-control" readonly ng-model="formData.imc">
                            </div>

                            <div class="form-group">
                                <label for="peso">Categoría: </label>
                                <input class="form-control" readonly ng-model="formData.clasificacion">
                            </div>
                            <button ng-click="calcular()" type="button" class="btn btn-primary">Calcular</button>
                        </form>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                    </div>

                </div>
            </div>
        </div>

        <!-- Page Content -->
        <div id="page-content-wrapper">

            <nav class="navbar navbar-expand-lg  border-bottom" style="background-color: #7acefa">
                <button class="btn btn-primary" id="menu-toggle"> Menú</button>

                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                        <li class="nav-item active">
                            <span
                                class="nav-link"><?php echo $this->session->userdata('userdata')['nombre'] .' '.$this->session->userdata('userdata')['apellido'] ; ?>
                                <span class="sr-only">(current)</span></span>
                        </li>
                        <li class="nav-item">
                            <button class="btn btn-danger" ng-click="cerrar()">Cerrar</button>
                        </li>
                    </ul>
                </div>
            </nav>

            <div class="container-fluid">
                <h1 class="mt-4">Su Historial de ICM</h1>

                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover dataTables-example">
                        <thead>
                            <tr>
                                <th>Fecha</th>
                                <th>Altura</th>
                                <th>Peso</th>
                                <th>IMC</th>
                                <th>Clasificación</th>
                            </tr>
                        </thead>
                        <tbody id="tabla">

                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Fecha</th>
                                <th>Altura</th>
                                <th>Peso</th>
                                <th>IMC</th>
                                <th>Clasificación</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <p class="text-justify m-5">El índice de masa corporal (IMC) es un método utilizado
                    para estimar la cantidad de grasa corporal que tiene una persona, y determinar por tanto si el peso
                    está dentro del rango normal, o por el contrario, se tiene sobrepeso o delgadez. Para ello, se pone
                    en relación la estatura y el peso actual del individuo. Esta fórmula matemática fue ideada por el
                    estadístico belga Adolphe Quetelet, por lo que también se conoce como índice de Quetelet o Body Mass
                    Index (BMI).</p>

            </div>
        </div>
        <!-- /#page-content-wrapper -->

        </div>
        <!-- /#wrapper -->