
<?php
include 'api.php';
$tpin = $_GET['tpin'];

$delete = callAPI('POST', '/programming/challenge/webservice/Taxpayers/delete', [
    'TPIN' => $tpin
]);

if($delete['code'] === 200){
    echo'Taxpayer has been deleted';
}
else{
    echo $delete['response']['Remark'];
}