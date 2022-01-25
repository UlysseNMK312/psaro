<?php
defined('BASEPATH') OR exit ('No direct script access allowed');
?>


<!-- start: Content -->
<div id="content" class="span10">
<!-- partial -->

        <div class="row-fluid">
            <div class="col-lg-4 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Diagramme lineaire</h4>
                  <canvas id="lineChart"></canvas>
                </div>
              </div>
            </div>
        </div>

</div>

<!-- plugins:js -->
<script src="<?php echo base_url();?>assets/admin/admin/vendors/base/vendor.bundle.base.js"></script>
  <!-- endinject -->
    <!-- Plugin js for this page-->
    <script src="<?php echo base_url();?>assets/admin/admin/vendors/chart.js/Chart.min.js"></script>
    <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="<?php echo base_url();?>assets/admin/admin/js/off-canvas.js"></script>
  <script src="<?php echo base_url();?>assets/admin/admin/js/hoverable-collapse.js"></script>
  <script src="<?php echo base_url();?>assets/admin/admin/js/template.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="<?php echo base_url();?>assets/admin/admin/js/chart.js"></script>
  <!-- End custom js for this page-->