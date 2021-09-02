<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>AdminLTE 3 | Blank Page</title>

  <!-- Google Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

  <!-- Vendor CSS Files -->
  <link rel="stylesheet" href="<?= base_url(); ?>/assets/admin/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="<?= base_url(); ?>/assets/admin/plugins/summernote/summernote-lite.min.css">

  <!-- Template Main CSS File -->
  <link rel="stylesheet" href="<?= base_url(); ?>/assets/admin/dist/css/mycss.css">
  <link rel="stylesheet" href="<?= base_url(); ?>/assets/admin/dist/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed">
  <!-- ======= Wrapper ======= -->
  <div class="wrapper">

    <!-- ======= Header ======= -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left Side -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="/admin" class="nav-link active">Beranda Admin</a>
        </li>
      </ul>

      <!-- Right Side -->
      <ul class="navbar-nav ml-auto">
        <!-- Buat Logout -->
      </ul>
    </nav>
    <!-- ======= /Header ======= -->

    <!-- ======= Sidebar ======= -->
    <?= $this->include('admin/layout/sidebar'); ?>
    <!-- ======= /Sidebar ======= -->

    <!-- ======= Konten ======= -->
    <div class="content-wrapper">
      <?= $this->renderSection('content'); ?>
    </div>
    <!-- ======= /Konten ======= -->

    <!-- ======== Footer ======= -->
    <footer class="main-footer">
      <div class="float-right d-none d-sm-block">
        Designed by NAA
      </div>
      Copyright &copy; 2021 <strong>Desaku Desamu</strong>.
    </footer>
    <!-- ======= /Footer ======= -->

  </div>
  <!-- ======= /Wrapper ======= -->

  <!-- JS Files -->
  <script src="<?= base_url(); ?>/assets/vendor/jquery/jquery.min.js"></script>
  <script src="<?= base_url(); ?>/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?= base_url(); ?>/assets/admin/dist/js/adminlte.min.js"></script>
  <script src="<?= base_url(); ?>/assets/admin/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
  <script src="<?= base_url(); ?>/assets/admin/plugins/summernote/summernote-lite.min.js"></script>

  <script>
    $(function() {
      bsCustomFileInput.init();

      $('#textarea').summernote({
        placeholder: 'Tulis Isi Post di Sini',
        tabsize: 2,
        height: 200,
        toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
          ['insert', ['link', 'picture', 'video']],
          ['view', ['fullscreen', 'codeview', 'help']]
        ],
        callbacks: {
          onImageUpload: function(image) {
            uploadImage(image[0]);
          },
          onMediaDelete: function(target) {
            deleteImage(target[0].src);
          }
        }
      });

      function uploadImage(image) {
        var data = new FormData();
        data.append("image", image);
        $.ajax({
          url: "<?= site_url('adminpage/upload_image') ?>",
          cache: false,
          contentType: false,
          processData: false,
          data: data,
          type: "POST",
          success: function(url) {
            $('#textarea').summernote("insertImage", url);
          },
          error: function(data) {
            console.log(data);
          }
        });
      }

      function deleteImage(src) {
        $.ajax({
          data: {
            src: src
          },
          type: "POST",
          url: "<?= site_url('adminpage/delete_image') ?>",
          cache: false,
          success: function(response) {
            console.log(response);
          }
        });
      }
    });
  </script>
</body>

</html>