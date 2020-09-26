<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">
    <!-- Custom CSS -->
    <link href="{{ asset('css/style.min.css') }}" rel="stylesheet">
    <!-- page css -->
    <link href="{{ asset('css/pages/error-pages.css') }}" rel="stylesheet">
</head>
<body class="skin-default-dark fixed-layout">
    <section id="wrapper" class="error-page">
        <div class="error-box">
            <div class="error-body text-center">
                <h1>403</h1>
                <h3 class="text-uppercase">Forbiddon Error!</h3>
                <p class="text-muted m-t-30 mb-4">YOU DON'T HAVE PERMISSION TO ACCESS THIS PAGE.</p>
                <a href="{{ url('/') }}" class="btn btn-primary btn-rounded waves-effect waves-light m-b-40">Back to home</a> </div>
        </div>
    </section>
</body>
</html>
