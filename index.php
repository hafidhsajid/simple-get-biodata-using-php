<?php
function getAPI()
{
    try {

        $ch = curl_init();
        $port = $_SERVER["SERVER_PORT"];
        $addr = $_SERVER["HTTP_HOST"];
        $baseurl = "http://" . $_SERVER["HTTP_HOST"] . ":" . $_SERVER["SERVER_PORT"] . "/bvk";
        curl_setopt($ch, CURLOPT_URL, $baseurl . "/API.php");
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $output = curl_exec($ch);
        curl_close($ch);
        return $output;
    } catch (\Throwable $th) {
        print_r($th);
    }
}
function getAPIDecode()
{

    try {
        $ch = curl_init();
        $port = $_SERVER["SERVER_PORT"];
        $addr = $_SERVER["HTTP_HOST"];
        $baseurl = "http://" . $_SERVER["HTTP_HOST"] . ":" . $_SERVER["SERVER_PORT"] . "/bvk";
        curl_setopt($ch, CURLOPT_URL, $baseurl . "/API.php");
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $output = curl_exec($ch);
        $res = json_decode($output);
        curl_close($ch);
        return $res;
    } catch (\Throwable $th) {
        print_r($th);
    }
}

function primenumbercheck($MyNum)
{
    $n = 0;
    for ($i = 2; $i < ($MyNum); $i++) {
        if ($MyNum % $i == 0) {
            $n++;
            break;
        }
    }

    if ($n == 0) {
        return $MyNum . " ";
    }
}

function result($result)
{
    //styling table
    echo ("
    <style>
    table, th, td {
      border: 2px solid black;
    }
    </style>
    <table>
    <tr>
      <th>Soal</th>
      <th>Jawab</th>
    </tr>");

    foreach ($result as $key => $value) {

        echo ("<tr><td>" . $key . " </td><td> " . $value . "</td></tr>");
    }
    // end table
    echo ("</td></tr></table>");
}


//soal 4 cari bilangan prima 1 - 100
$result;
for ($i = 2; $i < 100; $i++) {
    $result.=(primenumbercheck($i));
}

result(
    array(
        
        "Ambil semua data dari API" =>  getAPI(),
        
        "Ambil Umur dan Tanggal Lahir " => "Umur: ".getAPIDecode()->umur . "<br>Tanggal lahir: "
            . getAPIDecode()->tgl_lahir,
        
            "Jumlah Character dari nama" =>  strlen(getAPIDecode()->nama),
        
        "Bilangan prima 1-100" => $result
    )
);
