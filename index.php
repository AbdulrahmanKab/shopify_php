<?php


$url = "https://e4cd4a95f3fe2ec2da7fac639da52402:f4816e0d6c56e729ce668202eb0598f8@sellenvoinc.myshopify.com/admin/api/2022-04/products.json";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
    "Accept: application/json",
    "X-Shopify-Access-Token: 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",
    "Content-Type: application/json",
    "Authorization: Basic Og==",
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
//for debug only!
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$resp = curl_exec($curl);
curl_close($curl);

$products = json_decode($resp);
$result = [];

foreach ($products->products as $product ){
    $res=[];
    foreach ($product as $p_K=>$p_v ){
        if (is_array($p_v)){

            $in = [];
            foreach ($p_v as $val){
                foreach ($val as $n=>$k){

                    if (is_null($k)|| $k==null){

                    }
                    else{

                        $e= [];
                        $e[$n]=$k;

                        $in[$n] =$k;

                    }
                }

            }

            array_push($res,$in);
        }
        else{
            if ($p_v==''){

            }else{
               /* $arr =[];
                $arr[$p_K]=$p_v;*/
                $res[$p_K]=$p_v;
            }
        }

    }
    array_push($result,$res);

}
var_dump($result);
?>