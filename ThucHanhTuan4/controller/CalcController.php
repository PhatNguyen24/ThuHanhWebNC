
<?php
include_once('../model/CalcModel.php');

if(isset($_POST) && isset($_POST['btnSubmit']))
{
    $var1 = $_POST['number1'];
    $var2 = $_POST['number2'];
    $method = $_POST['method_v'];

    $calc = new CalcModel();
    $calc->a = $var1;
    $calc->b = $var2;
    $calc->method_calc($method);

    session_start();
    $_SESSION['calc'] = $calc;

    // Redirect to the view
    header("Location: ../view/CalcView.php");
    exit();
}
?>
