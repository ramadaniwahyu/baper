<!-- Aplikasi Barang & Persediaan dengan PHP7 dan MySQLi
*******************************************************
* Developer    : senopaTEA
* Company      : Desa Blockchain
* Release Date : 13 Agustus 2021
* Website      : https://desablockchain.com
* E-mail       : desablockchain@gmail.com
* Phone        : +62-8131-7361-689
-->



<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    <i class="fa fa-folder-o icon-title"></i> Data Permintaan Barang
  </h1>

</section>
<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12">
    <?php  
    // fungsi untuk menampilkan pesan
    // jika alert = "" (kosong)
    // tampilkan pesan "" (kosong)
    if (empty($_GET['alert'])) {
      echo "";
    } 
    // jika alert = 1
    // tampilkan pesan Sukses "Jenis Barang baru berhasil disimpan"
    elseif ($_GET['alert'] == 1) {
      echo "<div class='alert alert-success alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> Sukses!</h4>
              Permintaan Barang Masuk berhasil ditambahkan.
            </div>";
    }elseif ($_GET['alert'] == 2) {
      echo "<div class='alert alert-success alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> Sukses!</h4>
              Permintaan Barang Keluar berhasil ditambahkan.
            </div>";
    }
    ?>

	<div class="box box-primary">
	<div class="box-header">
		<h3 class="box-title">BARANG MASUK <i class="fa fa-arrow-circle-left icon-title"></i></h3>
	</div>
        <div class="box-body">
          <!-- tampilan tabel jenis -->
          <table id="dataTables1" class="table table-bordered table-striped table-hover">
            <!-- tampilan tabel header -->
            <thead>
              <tr>
                <th class="center">No.</th>
                <th class="left">ID Transaksi</th>
				<th class="center">Tgl. Transaksi</th>
				<th class="left">ID Barang</th>
				<th class="center">Masuk</th>
                <th class="center">Status</th>
              </tr>
            </thead>
            <!-- tampilan tabel body -->
            <tbody>
            <?php  
            $no = 1;
            // fungsi query untuk menampilkan data dari tabel jenis
            $query = mysqli_query($mysqli, "select a.id_barang, a.nama_barang,b.id_barang_masuk, b.tanggal_masuk, b.jumlah_masuk, b.status
						from is_barang a
						left join is_barang_masuk b
						on a.id_barang = b.id_barang
						where b.status = ''
						group by a.id_barang, b.tanggal_masuk,b.jumlah_masuk, b.status
						order by b.tanggal_masuk desc")
					or die('Ada kesalahan pada query tampil Data Jenis Barang: '.mysqli_error($mysqli));

            while ($data = mysqli_fetch_array($query)) { 
			?>
             <tr>
                      <td width='40' class='center'><?php echo $no ?></td>
                      <td width='350'><?php echo $data[2] ?></td>
					  <td class='center' width='200'><?php echo $data[3] ?></td>
					  <td width='350'><?php echo $data[0] ?></td>
					  <td class='center' width='100'><?php echo $data[4] ?></td>
                      <td class='center' width='80'>
                        <div>				
						  <a href="modules/permintaan-barang/proses.php?act=approval1&id=<?php echo $data[2];?>" data-toggle='tooltip' data-placement='top' title='Terima Barang' style='margin-right:5px' class='btn btn-primary btn-sm'>
						  ACCEPT</a>
						</div>
						</td>
            <?php
              $no++;
            }
            ?>
			
            </tbody>
          </table>
        </div><!-- /.box-body -->
      </div><!-- /.box -->
	  
	  <div class="box box-primary">
		<div class="box-header">
			<h3 class="box-title">BARANG KELUAR <i class="fa fa-arrow-circle-right icon-title"></i></h3>
		</div>
        <div class="box-body">
          <!-- tampilan tabel jenis -->
          <table id="dataTables2" class="table table-bordered table-striped table-hover">
            <!-- tampilan tabel header -->
            <thead>
              <tr>
                <th class="center">No.</th>
                <th class="left">ID Transaksi</th>
				<th class="center">Tgl. Transaksi</th>
				<th class="left">ID Barang</th>
				<th class="center">Keluar</th>
                <th class="center">Status</th>
              </tr>
            </thead>
            <!-- tampilan tabel body -->
			<tbody>
            <?php  
            $no = 1;
            // fungsi query untuk menampilkan data dari tabel jenis
            $query = mysqli_query($mysqli, "select a.id_barang, a.nama_barang,b.id_barang_keluar, b.tanggal_keluar, b.jumlah_keluar, b.status
						from is_barang a
						left join is_barang_keluar b
						on a.id_barang = b.id_barang
						where b.status = ''
						group by a.id_barang, b.tanggal_keluar,b.jumlah_keluar, b.status
						order by b.tanggal_keluar desc")
					or die('Ada kesalahan pada query tampil Data Jenis Barang: '.mysqli_error($mysqli));

            while ($data = mysqli_fetch_array($query)) { 
			?>
             <tr>
                      <td width='40' class='center'><?php echo $no ?></td>
                      <td width='350'><?php echo $data[2] ?></td>
					  <td class='center' width='200'><?php echo $data[3] ?></td>
					  <td width='350'><?php echo $data[0] ?></td>
					  <td class='center' width='100'><?php echo $data[4] ?></td>
                      <td class='center' width='80'>
                        <div>				
						  <a href="modules/permintaan-barang/proses.php?act=approval2&id=<?php echo $data[2];?>" data-toggle='tooltip' data-placement='top' title='Terima Barang' style='margin-right:5px' class='btn btn-primary btn-sm'>
						  ACCEPT</a>
						</div>
						</td>
            <?php
              $no++;
            }
            ?>
			
            </tbody>
		</table>
        </div><!-- /.box-body -->
      </div><!-- /.box -->	  
    </div><!--/.col -->
  </div>   <!-- /.row -->
</section><!-- /.content
