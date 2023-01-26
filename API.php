<?php
class biodata
{
    public $nama;
    public $email;
    public $umur;
    public $tgl_lahir;
}
function index()
{
    try {
        $model = new biodata;
        $model->nama = "Hafidh Sajid Malik";
        $model->email = "hafidhsajid@gmail.com";
        $model->umur = "22";
        $model->tgl_lahir = "18-02-2000";
        return json_encode($model);
        http_response_code(200);
    } catch (\Throwable $th) {
        http_response_code(500);
        return json_encode(array("message"=>"something wrong"));
    }
}
header('Content-Type: application/json; charset=utf-8');
echo (index());
