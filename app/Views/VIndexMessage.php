<!doctype html>
<html lang="en" style="position:relative; min-height:100%; padding-bottom:100px">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />    
    <!-- <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script> -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/additional-methods.min.js"></script> -->
</head>
<body style="height:100%">
<div class="content-wrapper">
    <div class="container mt-5">
        <section class="content" style="margin-top:auto; margin-bottom:auto; margin-right:auto; margin-left:auto; width:50%">
            <div class="col">
                <div class="card direct-chat direct-chat-primary">
                    <div class="card-header">
                        <a href="<?php echo base_url('/VIndexUser'); ?>"><i class="fas fa-arrow-left"></i></a>    
                        <span class="card-title"><?php echo $_SESSION['nama_penerima']?></span>
                    </div>
                    <div class="card-body">
                        <div id="didpesan" class="direct-chat-messages" style="width:100%">
                            <?php 
                            foreach ($message as $msg) : 
                            if($_SESSION['id_akun']==$msg->id_pengirim){ 
                                echo
                            '<div>
                                <div class="direct-chat-text">
                                     '.$msg->pesan.'
                                </div>
                            </div>';
                            } elseif($_SESSION['id_akun']!=$msg->id_pengirim&&$msg->id_pengirim==$_SESSION['id_penerima']){
                            echo
                            '<div style="margin:0px auto; display:block; width:100%; float:none">
                                <div style="text-align:right">
                                    '.$msg->pesan.'     
                                </div>
                            </div>';
                            } endforeach;?>
                        </div>
                    </div>

                    <div class="card-footer">
                        <div class="input-group">
                            <input type="hidden" id="id_akun" name="id_akun" value="<?php echo $_SESSION['id_akun'] ?>" class="form-control">
                            <input type="hidden" id="id_pengirim" name="id_pengirim" value="<?php echo $_SESSION['id_akun'] ?>" class="form-control">
                            <input type="hidden" id="id_penerima" name="id_penerima" value="<?php echo $_SESSION['id_penerima'] ?>" class="form-control">
                            <input type="text" id="pesan" name="pesan" placeholder="Type Message ..." class="form-control">
                            <span class="input-group-append">
                                <button type="submit" class="kirimpesan btn btn-primary">Send</button>
                            </span>
                        </div>
                    </div>
                </div>
        </section>
    </div>
</div>
<!-- <footer class="py-5" style="position:absolute; background-color: #0F0E20; bottom: 0; width: 100%; left: 0px; right: 0px; margin-bottom: 0px; margin-top: 0px;height: 50px;">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy;<a style="text-decoration: none"> Maheswara Athallah W</a> 2022</p>  
    </div>
       /.container -->
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> -->
<script src="https://js.pusher.com/7.2/pusher.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> -->
<script>
$('.kirimpesan').click(function() {
    console.log('klikirim')
    var value = {
        id_akun: $('#id_akun').val(),
        id_pengirim: $('#id_pengirim').val(),
        id_penerima: $('#id_penerima').val(),
        pesan: $('#pesan').val(),
    }
    console.log(value)
    $.ajax({
        url:"<?= base_url('/CMessage/kirimpesan'); ?>",
        type: "POST",
        data: value,
        // dataType: 'json',
    });

});
$(document).ready(function() {
            
Pusher.logToConsole = true;

var pusher = new Pusher('e0bd82d32cf9d6ef3c0f', {
// var pusher = new Pusher('40ffd99f64d712cc1ceb', {
    cluster: 'ap1'
});

// var idus=$(this).data('id_client');
var idak = $('#id_akun').val();
var idpen = $('#id_penerima').val();
if(idak<idpen){
    var idcan = idak;
}
else{
    var idcan = idpen;
}
console.log(idak+idpen+idcan);
var channel = pusher.subscribe(idcan);

channel.bind('my-event', function(data) {
    // alert(JSON.stringify(data));
    // console.log('ber');
    addData(data);
    hapuschat();
});

    function addData(data) {
        var str = '';
        for (var z in data) {
            str +=
                (<?php echo $_SESSION['id_akun']?>!=data[z].id_pengirim&&data[z].id_pengirim==<?php echo $_SESSION['id_penerima']?>) ?
                '<div style="margin:0px auto; display:block; width:100%; float:none">'+
                    '<div style="text-align:right">'+
                        data[z].pesan+   
                    '</div>'+
                '</div>':
                '<div>'+
                    '<div class="direct-chat-text">'+
                        data[z].pesan+
                    '</div>'+
                '</div>';
        }
        $('#didpesan').html(str);
    }

    function hapuschat() {
        document.getElementById('pesan').value = '';
    }

})
</script>

</body>
</html>