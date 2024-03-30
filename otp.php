//OTP system in PHP?
class SendExampleSmsJob implements ShouldQueue
{
    use InteractsWithQueue, Queueable, SerializesModels;
 
    public function handle()
    {
        // Process sending message ...
    }
 
    /**
     * Handle a job failure.
     */
    public function failed(Throwable $exception)
    {
        // dispatch another job to send Whatsapp message or something else
    }
}



    $baseUrl = "https://sendotp.msg91.com/api";
    if(isset($_POST['oneTimePassword'])){
        $data = array("countryCode" => $_POST['hiddenCode'], "mobileNumber" => $_POST['hiddenNumber'], "oneTimePassword" => $_POST['oneTimePassword']);
        $data_string = json_encode($data);
        $ch = curl_init($baseUrl . '/verifyOTP');
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_AUTOREFERER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($data_string),
            'application-Key: my key goes here'
        ));
        $result = curl_exec($ch);
        curl_close($ch);
        $response = json_decode($result, true);
        if ($response["status"] == "error") {
            header("location: index.php");
        } else {
            header("location: ../index.php");
        } 
    }


if(isset($_POST['oneTimePassword'])){
    if ($_POST['oneTimePassword'] == $_SESSION["oneTimePassword"]) {
            header("location: index.php");
        } else {
            header("location: ../index.php");
        }
    }



