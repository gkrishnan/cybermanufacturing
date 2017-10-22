<?php
    $target = "http://www.mockcourt.org.uk/user/htdocs/pics/2012/";
    $target = $target . basename( $_FILES['uploaded']['name']) ; 
    $ok=1; 

    if (move_uploaded_file($_FILES['uploaded']['tmp_name'], $target)) 
    {
        $result=$target;
    } 
    else
    {
        $result=0;
    }
?>

<script language="javascript" type="text/javascript">
    window.top.window.juploadstop(<?php echo $result; ?>);
</script>

