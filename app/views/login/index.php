<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="<?= BASEURL; ?>/img/favicon.ico" type="image/ico" />

    <title>SECURE | <?= $data['WebTitle'] ?></title>

    <!-- Bootstrap -->
    <link href="<?= BASEURL; ?>/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?= BASEURL; ?>/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="<?= BASEURL; ?>/vendors/animate.css/animate.min.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="<?= BASEURL; ?>/vendors/build/css/custom.min.css" rel="stylesheet">

    <style>
        body.login {
            background: #2A3F54;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }
        .login_wrapper {
            width: 360px;
            padding: 30px;
            background: #fff;
            box-shadow: 0 3px 9px rgba(0, 0, 0, 0.5);
            border-radius: 8px;
            animation: fadeIn 1s ease-in-out;
        }
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        .bodyLoading {
            display: none;
            position: fixed;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            background: rgba(0, 0, 0, 0.5);
            z-index: 9999;
            justify-content: center;
            align-items: center;
        }
        .wrapper {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .circle {
            width: 20px;
            height: 20px;
            margin: 10px;
            background: #fff;
            border-radius: 50%;
            animation: bounce 1.2s infinite ease-in-out;
        }
        .circle:nth-child(2) {
            animation-delay: -0.4s;
        }
        .circle:nth-child(3) {
            animation-delay: -0.8s;
        }
        @keyframes bounce {
            0%, 100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-15px);
            }
        }
        .shadow {
            width: 20px;
            height: 4px;
            margin: 10px;
            background: rgba(0, 0, 0, 0.5);
            border-radius: 50%;
            animation: shrink 1.2s infinite ease-in-out;
        }
        .shadow:nth-child(5) {
            animation-delay: -0.4s;
        }
        .shadow:nth-child(6) {
            animation-delay: -0.8s;
        }
        @keyframes shrink {
            0%, 100% {
                transform: scaleX(1);
            }
            50% {
                transform: scaleX(0.5);
            }
        }
        .submit {
            transition: background 0.3s ease;
        }
        .submit:hover {
            background: #18a657;
        }
    </style>

    <script src="<?= BASEURL; ?>/vendors/jquery/3.4.1/jquery-3.4.1.min.js"></script>
</head>

<body class="login">
    <div class="bodyLoading">
        <div class="wrapper">
            <div class="circle"></div>
            <div class="circle"></div>
            <div class="circle"></div>
            <div class="shadow"></div>
            <div class="shadow"></div>
            <div class="shadow"></div>
            <span><?= $data['loadingTitle'] ?></span>
        </div>
    </div>
    <div class="login_wrapper animate__animated animate__fadeIn">
        <section class="login_content">
            <form id="<?= $data['idForm'] ?>" method="POST" action="<?= BASEURL; ?>/masuk/<?= $data['methodForm'] ?>">
                <h1>MASUK</h1>
                <div>
                    <input type="text" name="username" class="form-control" placeholder="Username" required="" />
                </div>
                <div>
                    <input type="password" name="password" class="form-control" placeholder="Password" required="" />
                </div>
                <div>
                    <button type="submit" class="btn btn-success submit" name="masuk">MASUK</button>
                </div>
                <div class="clearfix"></div>
                <div class="separator">
                    <div class="clearfix"></div>
                    <br />
                    <div>
                        <h1><i class="fa fa-user-secret"></i> SECURE</h1>
                        <p>© <?= date("Y"); ?> WILDAN | F551 18 258</p>
                    </div>
                </div>
            </form>
        </section>
    </div>

    <!-- SweetAlert -->
    <script src="<?= BASEURL; ?>/vendors/sweetalert2/sweetalert2.all.min.js"></script>

</body>
</html>
