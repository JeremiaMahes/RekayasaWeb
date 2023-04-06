<?php
function curl($url){
 $ch = curl_init();
 curl_setopt($ch, CURLOPT_URL, $url);
 curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
 $output = curl_exec($ch);
 curl_close($ch);
 return $output;
}

$send = curl("http://localhost/json/server/getWisata.php");

$data = json_decode($send, TRUE);

?>

<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container">
 <div class="row">
   <div class="col-sm-8">
    <?php echo $deleteMsg??''; ?>
    <div class="table-responsive">
      <table class="table table-bordered">
    <thead>
         <th>ID</th>
         <th>KOTA</th>
         <th>LANDMARK</th>
         <th>TARIF</th>
    </thead>
    <tbody>
  <?php
      if(is_array($data)){      
      $sn=1;
      foreach($data as $YE){
    ?>
      <tr>
      <td><?php echo $YE['id_wisata']??''; ?></td>
      <td><?php echo $YE['kota']??''; ?></td>
      <td><?php echo $YE['landmark']??''; ?></td>
      <td><?php echo $YE['tarif']??''; ?></td>
     </tr>
     <?php
      $sn++;}}else{ ?>
      <tr>
        <td colspan="8">
    <?php echo $data; ?>
  </td>
    <tr>
    <?php
    }?>
    </tbody>
     </table>
   </div>
</div>
</div>
</div>
</body>
</html>