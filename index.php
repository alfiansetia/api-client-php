<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>


 <?php
if(isset($_POST['aksi'])){
	$aksi = $_POST['aksi'];
	if($aksi == 'tambah'){
		$url = 'https://35.185.191.122/api-server.php';
		$data= [
			'aksi' => $aksi,
			'name' => $_POST['name'],
			'email' => $_POST['email'],
			'gender' => $_POST['gender'],
			'notelp' => $_POST['notelp'],
		];
		$options = array(
		            "http"=> array(
		                "method"=>"POST",
		                "header"=>"Content-Type: application/x-www-form-urlencoded",
		                "content"=>http_build_query($data)
		            ),
		            "ssl" => array(
				        'verify_peer' => false,
				        'verify_peer_name' => false,
				        'allow_self_signed' => true
				    )
		);
		$str = file_get_contents($url, false,stream_context_create($options));
		$json = json_decode($str, true);
		// echo $url;
		// var_dump($_POST);
	}elseif($aksi == 'edit'){
		$url = 'https://35.185.191.122/api-server.php';
		$data= [
			'aksi' => $aksi,
			'id' => $_POST['id'],
			'name' => $_POST['name'],
			'email' => $_POST['email'],
			'gender' => $_POST['gender'],
			'notelp' => $_POST['notelp'],
		];
		$options = array(
		            "http"=> array(
		                "method"=>"PUT",
		                "header"=>"Content-Type: application/x-www-form-urlencoded",
		                "content"=>http_build_query($data)
		            ),
		            "ssl" => array(
				        'verify_peer' => false,
				        'verify_peer_name' => false,
				        'allow_self_signed' => true
				    )
		);
		$str = file_get_contents($url, false,stream_context_create($options));
		$json = json_decode($str, true);
		// echo $url;
		// var_dump($str);
	}elseif($aksi == 'hapus'){
		$url = 'https://35.185.191.122/api-server.php';
		$data= [
			'aksi' => $aksi,
			'id' => $_POST['id'],
		];
		$options = array(
		            "http"=> array(
		                "method"=>"DELETE",
		                "header"=>"Content-Type: application/x-www-form-urlencoded",
		                "content"=>http_build_query($data)
		            ),
		            "ssl" => array(
				        'verify_peer' => false,
				        'verify_peer_name' => false,
				        'allow_self_signed' => true
				    )
		);
		$str = file_get_contents($url, false,stream_context_create($options));
		$json = json_decode($str, true);
		// echo $url;
	}
	
}else{
	$url = 'https://35.185.191.122/api-server.php?load=all';
	$data= [
		'load' => 'all'
	];
	$options = array(
	            "http"=> array(
	                "method"=>"GET",
	                "header"=>"Content-Type: application/x-www-form-urlencoded",
	                "content"=>http_build_query($data)
	            ),
	            "ssl" => array(
			        'verify_peer' => false,
			        'verify_peer_name' => false,
			        'allow_self_signed' => true
			    )
	);
	$str = file_get_contents($url, false,stream_context_create($options));
	$json = json_decode($str, true);
	// echo '<pre>' . print_r($json['status'], true) . '</pre>';

}

if(isset($_GET['query'])){
	$url = 'https://35.185.191.122/api-server.php?query='.$_GET['query'];
	$data= [
		'query' => $_GET['query']
	];
	$options = array(
	            "http"=> array(
	                "method"=>"GET",
	                "header"=>"Content-Type: application/x-www-form-urlencoded",
	                "content"=>http_build_query($data)
	            ),
	            "ssl" => array(
			        'verify_peer' => false,
			        'verify_peer_name' => false,
			        'allow_self_signed' => true
			    )
	);
	$str = file_get_contents($url, false,stream_context_create($options));
	$json = json_decode($str, true);
}

 ?>

	<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-3">
		<div class="container">
		  <a class="navbar-brand" href="index.php">
		  	<img src="https://akupintar.id/documents/20143/0/stt-dutabangsa-bekasi.png" width="30" height="30" class="d-inline-block align-top" alt="" loading="lazy">
		  	Bootstrap
		  </a>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		  </button>

		  <div class="collapse navbar-collapse" id="navbarSupportedContent">
		    <ul class="navbar-nav mr-auto">
		      <li class="nav-item active">
		        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="#">Link</a>
		      </li>
		      <li class="nav-item dropdown">
		        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		          Dropdown
		        </a>
		        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
		          <a class="dropdown-item" href="#">Action</a>
		          <a class="dropdown-item" href="#">Another action</a>
		          <div class="dropdown-divider"></div>
		          <a class="dropdown-item" href="#">Something else here</a>
		        </div>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
		      </li>
		    </ul>
		    <form class="form-inline my-2 my-lg-0">
		      <input name="query" class="form-control mr-sm-2" type="search" placeholder="Cari" aria-label="Search">
		      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Cari</button>
		    </form>
		  </div>
		</div>
	</nav>
  	<div class="container">
	    <div class="card border-primary mb-2">
	    	<div class="card-header">
	    		<h3>Data, Kelompok!</h3>
	    	</div>
	    	<div class="card-body">
		    	<button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#ModalAdd">Tambah Data</button>
	    		<div class="table-responsive">
	    			<table class="table table-bordered table-sm table-stripped table-hover">
	    				<thead class="thead-dark">
	    					<tr>
	    						<th style="text-align: center;">No</th>
	    						<th>Nama</th>
	    						<th>Email</th>
	    						<th>Gender</th>
	    						<th>No Telp</th>
	    						<th style="text-align: center;">Aksi</th>
	    					</tr>
	    				</thead>
	    				<tbody>


								 <?php 
								 //Pengulangan untuk mengambil data Json
								 $no = 1; 
								 foreach ($json['data'] as $key => $data) {
								 	 // var_dump($data); ?>
								 		 
	    					<tr>
	    						<td style="text-align: center;"><?= $no++ ?></td>
	    						<td><?= $data['Name'] ?></td>
	    						<td><?= $data['Email'] ?></td>
	    						<td><?= $data['Gender'] ?></td>
	    						<td><?= $data['Notelp'] ?></td>
	    						<td style="text-align: center;">
	    							<button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#ModalEdit<?=$data['ID'] ?>">edit</button>
	    							<button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#ModalDelete<?=$data['ID'] ?>">hapus</button>

	    						</td>	
	    					</tr>
	    					<?php } ?>
	    				</tbody>
	    			</table>
	    		</div>
	    	</div>
	    </div>
	</div>



    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>



<?php 
//Fungsi untuk menampilkan alert by sweet alert
function alert($message, $icon){
	echo "<script>
    	Swal.fire({
		  icon: '$icon',
		  text: '$message',
		})
    </script>";
}


$status = $json['status'];
if($status == true){
	$icon = 'success';
}else{
	$icon = 'error';
}
$mess = $json['message'];
if(!$json['message'] == false){
	alert($mess, $icon);
}


 ?>
    

  </body>
</html>


<!-- Modal Add -->
<div class="modal fade" id="ModalAdd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<form method="post" action="">
	      	<div class="form-group row">
	      		<label for="name" class="col-sm-3 col-form-label">Name</label>
			    <div class="col-sm-9">
			      <input type="hidden" name="aksi" class="form-control" value="tambah">
			      <input type="text" name="name" class="form-control" id="name" required="">
			    </div>
	      	</div>
	      	<div class="form-group row">
	      		<label for="email" class="col-sm-3 col-form-label">Email</label>
			    <div class="col-sm-9">
			      <input type="email" name="email" class="form-control" id="email" required="">
			    </div>
	      	</div>
	      	<div class="form-group row">
	      		<label for="gender" class="col-sm-3 col-form-label">Gender</label>
			    <div class="col-sm-9">
			      <select name="gender" class="select form-control" required="">
			      	<option value="">Pilih</option>
			      	<option value="male">Laki-laki</option>
			      	<option value="female">Perempuan</option>
			      </select>
			    </div>
	      	</div>
	      	<div class="form-group row">
	      		<label for="notelp" class="col-sm-3 col-form-label">No Telp</label>
			    <div class="col-sm-9">
			      <input type="number" name="notelp" class="form-control" id="notelp" required="">
			    </div>
	      	</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="reset" class="btn btn-warning">Reset</button>
        <button type="submit" class="btn btn-primary">Kirim</button>
      </div>
     	</form>
    </div>
  </div>
</div>



<?php 
 foreach ($json['data'] as $key => $data) {
 	 // var_dump($data); ?>
<!-- Modal Edit -->
<div class="modal fade" id="ModalEdit<?= $data['ID'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<form method="post" action="">
	      	<div class="form-group row">
	      		<label for="name" class="col-sm-3 col-form-label">Name</label>
			    <div class="col-sm-9">
			      <input type="hidden" name="aksi" required="" value="edit">
			      <input type="hidden" name="id" required="" value="<?= $data['ID'] ?>">
			      <input type="text" name="name" class="form-control" id="name" required="" value="<?= $data['Name'] ?>">
			    </div>
	      	</div>
	      	<div class="form-group row">
	      		<label for="email" class="col-sm-3 col-form-label">Email</label>
			    <div class="col-sm-9">
			      <input type="email" name="email" class="form-control" id="email" required="" value="<?= $data['Email'] ?>">
			    </div>
	      	</div>
	      	<div class="form-group row">
	      		<label for="gender" class="col-sm-3 col-form-label">Gender</label>
			    <div class="col-sm-9">
			      <select name="gender" class="select form-control" required="">
			      	<option value="">Pilih</option>
			      	<option <?php if($data['Gender'] == 'male'){echo 'selected';} ?> value="male">Laki-laki</option>
			      	<option <?php if($data['Gender'] == 'female'){echo 'selected';} ?> value="female">Perempuan</option>
			      </select>
			    </div>
	      	</div>
	      	<div class="form-group row">
	      		<label for="notelp" class="col-sm-3 col-form-label">No Telp</label>
			    <div class="col-sm-9">
			      <input type="number" name="notelp" class="form-control" id="notelp" required="" value="<?= $data['Notelp'] ?>" >
			    </div>
	      	</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="reset" class="btn btn-warning">Reset</button>
        <button type="submit" class="btn btn-primary">Kirim</button>
      </div>
     	</form>
    </div>
  </div>
</div>

<?php } ?>



<!-- Modal Delete -->

<?php 
 foreach ($json['data'] as $key => $data) {  ?>

<div class="modal fade" id="ModalDelete<?= $data['ID'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<form method="post" action="">
      		<input type="hidden" name="aksi" value="hapus">
      		<input type="hidden" name="id" value="<?= $data['ID'] ?>">
      		<p>
      			<h5>Apakah anda yakin ingin menghapus data?</h5>
      			Nama : <?= $data['Name'] ?>
      			<br>Gender : <?= $data['Gender'] ?>
      			<br>Email : <?= $data['Email'] ?>
      			<br>No Telp : <?= $data['Notelp'] ?>
      		</p>
	      	
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Kirim</button>
      </div>
     	</form>
    </div>
  </div>
</div>
<?php } ?>