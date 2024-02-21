<?php
    if($model->hasErrors()){
        foreach($model->errors as $key=>$value){
            print_r($value);
        }
    }
?>
<h1>Форма</h1>
<form method="post">
    <input type="text" name="email"><br>
    <br>
    <input type="submit">
</form>