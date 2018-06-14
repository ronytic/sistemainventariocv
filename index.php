<?php
include_once("login/check.php");
$folder="";
$titulo="Inicio de Sistema";
$Subtitulo="";
?>
<?php require_once($folder."cabecerahtml.php")?>
<?php require_once($folder."cabecera.php")?>

 <!-- Counters -->
            <div class="row">
              <div class="col-sm-6 col-xl-3">

                <div class="card mb-4">
                  <div class="card-body">
                    <div class="d-flex align-items-center">
                      <div class="lnr lnr-cart display-4 text-success"></div>
                      <div class="ml-3">
                        <div class="text-muted small">Ventas Mensuales</div>
                        <div class="text-large">2362</div>
                      </div>
                    </div>
                  </div>
                </div>

              </div>
              <div class="col-sm-6 col-xl-3">

                <div class="card mb-4">
                  <div class="card-body">
                    <div class="d-flex align-items-center">
                      <div class="lnr lnr-earth display-4 text-info"></div>
                      <div class="ml-3">
                        <div class="text-muted small">Venta Diaria</div>
                        <div class="text-large">687,123</div>
                      </div>
                    </div>
                  </div>
                </div>

              </div>
              <div class="col-sm-6 col-xl-3">

                <div class="card mb-4">
                  <div class="card-body">
                    <div class="d-flex align-items-center">
                      <div class="lnr lnr-gift display-4 text-danger"></div>
                      <div class="ml-3">
                        <div class="text-muted small">Productos</div>
                        <div class="text-large">985</div>
                      </div>
                    </div>
                  </div>
                </div>

              </div>
              <div class="col-sm-6 col-xl-3">

                <div class="card mb-4">
                  <div class="card-body">
                    <div class="d-flex align-items-center">
                      <div class="lnr lnr-users display-4 text-warning"></div>
                      <div class="ml-3">
                        <div class="text-muted small">Clientes</div>
                        <div class="text-large">105,652</div>
                      </div>
                    </div>
                  </div>
                </div>

              </div>
            </div>
            <!-- / Counters -->
            <!-- Statistics -->
            <div class="card mb-4">
              <h6 class="card-header with-elements">
                <div class="card-header-title">Estadisticas</div>
                <div class="card-header-elements ml-auto">
                  <label class="text m-0">
                    <span class="text-light text-tiny font-weight-semibold align-middle">
                      Ver Estadisticas
                    </span>
                    <span class="switcher switcher-sm d-inline-block align-middle mr-0 ml-2">
                      <input type="checkbox" class="switcher-input" checked>
                      <span class="switcher-indicator">
                        <span class="switcher-yes"></span>
                        <span class="switcher-no"></span>
                      </span>
                    </span>
                  </label>
                </div>
              </h6>
              <div class="row no-gutters row-bordered">
                <div class="col-md-8 col-lg-12 col-xl-8">
                  <div class="card-body">
                    <div style="height: 210px;">
                      <canvas id="statistics-chart-1"></canvas>
                    </div>
                  </div>
                </div>

                <div class="col-md-4 col-lg-12 col-xl-4">
                  <div class="card-body">

                    <!-- Numbers -->
                    <div class="row">
                      <div class="col-6 col-xl-5 text-muted mb-3">Total Ventas</div>
                      <div class="col-6 col-xl-7 mb-3">
                        <span class="text-big">10,332</span>
                        <sup class="text-success">+12%</sup>
                      </div>
                      <div class="col-6 col-xl-5 text-muted mb-3">Ingresos</div>
                      <div class="col-6 col-xl-7 mb-3">
                        <span class="text-big">$1,534</span>
                        <sup class="text-danger">-5%</sup>
                      </div>
                      <div class="col-6 col-xl-5 text-muted mb-3">Total</div>
                      <div class="col-6 col-xl-7 mb-3">
                        <span class="text-big">$10,534</span>
                        <sup class="text-success">+12%</sup>
                      </div>
                      <div class="col-6 col-xl-5 text-muted mb-3">Páginas Vistas</div>
                      <div class="col-6 col-xl-7 mb-3">
                        <span class="text-big">21,332</span>
                        <sup class="text-danger">-12%</sup>
                      </div>
                      <div class="col-6 col-xl-5 text-muted mb-3">Tareas Completadas</div>
                      <div class="col-6 col-xl-7 mb-3">
                        <span class="text-big">12</span>
                        <sup class="text-success">+12%</sup>
                      </div>
                    </div>
                    <!-- / Numbers -->

                  </div>
                </div>
              </div>
            </div>
            <!-- / Statistics -->

            <div class="row">

              <!-- Charts -->
              <div class="col-sm-6 col-xl-4">

                <div class="card mb-4">
                  <h6 class="card-header with-elements border-0 pr-0 pb-0">
                    <div class="card-header-title">Ventas</div>
                    <div class="card-header-elements ml-auto">
                      <div class="btn-group mr-3">
                        <button type="button" class="btn btn-sm btn-default icon-btn borderless btn-round md-btn-flat dropdown-toggle hide-arrow" data-toggle="dropdown">
                          <i class="ion ion-ios-more"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right" id="sales-dropdown-menu">
                          <a class="dropdown-item" href="javascript:void(0)">Action 1</a>
                          <a class="dropdown-item" href="javascript:void(0)">Action 2</a>
                        </div>
                      </div>
                    </div>
                  </h6>
                  <div class="mt-3">
                    <div style="height:100px;">
                      <canvas id="statistics-chart-2"></canvas>
                    </div>
                  </div>
                  <div class="card-footer text-center py-2">
                    <div class="row">
                      <div class="col">
                        <div class="text-muted small">Destino</div>
                        <strong class="text-big">500</strong>
                      </div>
                      <div class="col">
                        <div class="text-muted small">Actual</div>
                        <strong class="text-big">421</strong>
                      </div>
                    </div>
                  </div>
                </div>

              </div>
              <div class="col-sm-6 col-xl-4">

                <div class="card mb-4">
                  <div class="card-body">
                    <div class="float-right text-success">
                      <small class="ion ion-md-arrow-round-up text-tiny"></small> 12%
                    </div>
                    <div class="text-muted small">Total </div>
                    <div class="text-xlarge">$1,534</div>
                  </div>
                  <div class="px-2">
                    <div class="w-100" style="height: 117px;">
                      <canvas id="statistics-chart-3"></canvas>
                    </div>
                  </div>
                </div>

              </div>
              <div class="col-sm-6 col-xl-4">

                <div class="card mb-4">
                  <div class="card-body pb-0">
                    <div class="text-right small mb-4">Junio</div>
                    <div class="my-3" style="height: 86px;">
                      <canvas id="statistics-chart-4"></canvas>
                    </div>
                  </div>
                  <div class="card-footer">
                    <button type="button" class="btn btn-xs btn-outline-primary icon-btn float-right">
                      <i class="ion ion-md-sync"></i>
                    </button>
                    Clientes Unicos
                  </div>
                </div>

              </div>

              <!-- / Charts -->
<?php require_once($folder."pie.php")?>