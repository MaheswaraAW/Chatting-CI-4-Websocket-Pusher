<!doctype html>
<html lang="en" style="position:relative; min-height:100%; padding-bottom:100px">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />    
</head>
<body style="height:100%">
<div class="content-wrapper">
    <div class="container mt-5">
        <section class="content" style="margin-top:auto; margin-bottom:auto; margin-right:auto; margin-left:auto; width:50%">
            <div class="col">
                <div class="card card-primary" style="border: 1px solid grey">
                    <div class="card-header"><h4 style="text-align:center;">Daftar</h4></div> 
                    <?php
                        if(!empty(session()->getFlashdata('message'))): ?>
                        <div class="alert alert-info" style="text-align:center">
                        <?= session()->getFlashdata('message') ?>
                        </div>
                    <?php endif; ?>
                   
                    <div class="card-body">
                        <form method="POST" action="<?=base_url('CLogin/daftarakun')?>" required>
                            <div class="form-group mt-2">
                                <label for="nama">Nama</label>
                                <input id="nama" type="text" class="form-control" name="nama" required>
                            </div>

                            <div class="form-group mt-2">
                                <label for="email">Email</label>
                                <input id="email" type="email" class="form-control" name="email" tabindex="1" required autofocus>
                                <div class="invalid-feedback">
                                Masukan Email Dengan Benar
                                </div>
                            </div>

                            <div class="form-group mt-2">
                                <div class="d-block">
                                <label for="password" class="control-label">Password</label>
                                </div>
                                <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                                <div class="invalid-feedback">
                                Password masih kosong
                                </div>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-lg btn-block" style="margin-top:20px; width:100%" tabindex="4">
                                Daftar
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
<footer class="py-5" style="position:absolute; background-color: #0F0E20; bottom: 0; width: 100%; left: 0px; right: 0px; margin-bottom: 0px; margin-top: 0px;height: 50px;">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy;<a style="text-decoration: none"> Maheswara Athallah W</a> 2022</p>  
    </div>
      <!-- /.container -->
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>

</body>
</html>