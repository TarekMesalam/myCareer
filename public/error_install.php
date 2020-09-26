<html>
<head>
    <title>Product not installed</title>
    <link rel="stylesheet" href="assets/error_install/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div id="error-main" class="row">
            <div class="text-center m-t-20 mt-20">
                <h2>Fix the following errors to run installer</h2>
            </div>
            <?php if ($GLOBALS['error_type'] == 'php-version') { ?>
                <div class="alert alert-danger">
                    <strong>Lower PHP version! </strong> Php version is lower than 7.1.3
                    <p class="pull-right">Server PHP version: <b><?php echo phpversion(); ?></b></p>
                </div>
            <?php } else { ?>
                <div class="alert alert-danger">
                    <strong>.env file missing!</strong>
                </div>
            <?php } ?>
        </div>
    </div>
    <script src="assets/error_install/js/jquery.min.js"></script>
    <script src="assets/error_install/js/bootstrap.min.js"></script>
</body>
</html>
