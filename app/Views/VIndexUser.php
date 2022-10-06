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
                <div class="card direct-chat direct-chat-primary">
                    <div class="card-header ui-sortable-handle" style="cursor: move;">
                        <h3 class="card-title"><?php echo $_SESSION['nama_akun'] ?></h3>    
                    </div>
                    <div class="card-body">
                    <table class="table table-bordered">
                            <tbody>
                                <?php
                                foreach($akun as $ak) :
                                // if ($_SESSION['nama']!=$ak['nama']) { ?>
                                <tr>
                                    <td style="width:80%"><?= $ak['nama'];?></td>
                                    <td>
                                        <a href="<?= base_url('CMessage/index/' . $ak['id_akun']) ?>" class="btn btn-primary">CHAT</button>
                                    </td>
                                </tr>
                                <?php  
                                endforeach; ?>
                            </tbody>
                        </table>    
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