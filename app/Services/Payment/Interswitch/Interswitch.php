<?php

namespace App\Services\Payment\Interswitch;


class Interswitch
{
	public $pdtid = 6205;
    public $payitemid = 101;
    public $currencycode = 566;
    public $paytest = "https://stageserv.interswitchng.com/test_paydirect/pay";
    public $paylive = "https://webpay.interswitchng.com/paydirect/pay";
    //public $callbackpage = "http://localhost/collegepay-master/tpay.php";
    public $callbackpage = "http://localhost/signage/public/mediapartner/payment/callback";
    public $clientcallbackpage = "http://localhost/signage/public/client/payment/callback";
    public $reference;
    public $mackey = "D3D1D05AFE42AD50818167EAC73C109168A0F108F32645C8B59E897FA930DA44F9230910DAC9E20641823799A107A02068F7BC0F4CC41D2952E249552255710F";

    public function __construct(){

    	$this->reference =  $this->dotref();
    	/*$this->pdtid = $idls;
    	$this->payitemid = $id;
    	$this->currencycode = $currencycode;
    	$this->callbackpage = $callbackpage;
    	$this->mackey = $mackey;*/

    	



    }


    public function dquery($amt,$ref){
        $pdt = $this->pdtid;
		$thash = $this->getTransactionRequestHash($ref);

        $parami = array(
            "productid"=>$pdt,
            "transactionreference"=>$ref,
            "amount"=>$amt,
        );

        $ponmo = http_build_query($parami);

        $query_url = 'https://sandbox.interswitchng.com/webpay/api/v1/gettransaction.json';
        //$query_url = 'https://webpay.interswitchng.com/paydirect/api/v1/gettransaction.json';
        $url = $query_url.'?'.$ponmo;
        //note the variables appended to the url as get values for these parameters
        $headers = array("Hash: $thash");
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $output = curl_exec($ch);

        return $output;

    }

    public function getTransactionRequestHash($reference)
    {
        $data2 = $this->pdtid . $reference . $this->mackey;

        return hash('SHA512', $data2);
    }


   	public  function dohash($amt1){
        $tohash = $this->reference . $this->pdtid . $this->payitemid .$amt1. $this->callbackpage. $this->mackey;
        $dhash =  hash('sha512',$tohash);
        return $dhash;
    }

    public  function clientdohash($amt1){
        $tohash = $this->reference . $this->pdtid . $this->payitemid .$amt1. $this->clientcallbackpage. $this->mackey;
        $dhash =  hash('sha512',$tohash);
        return $dhash;
    }


    public function queryHash($refi){
        $tryhash = $this->pdtid.$refi.$this->mackey;
        $dhash = hash('sha512', $tryhash);
        return $dhash;
    }

    public function dotref(){
        $tref = mt_rand(100000,999999);
        return $tref;
    }

	
}