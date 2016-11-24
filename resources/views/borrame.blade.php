<h1>hola</h1>



<?php

/*if (is_array($request['datos'][0])) {
    for ($i=0; $i < count($request['datos'][0]); $i++) {
      echo $request['datos'][0][$i].' , '.$request['datos'][1][$i].'<br>';
    }
}
*/
echo '<br><br><br>';
print_r($request->all());
echo '<br><br><br>';
//echo $request['datos']['nombre'][0].' - '.$request['datos']['clave_id'][0];
echo '<br>';
//var_dump($request);
echo count($request['nombre']);
echo '<br><br><br>';
//if($doc)
echo $request;



?>
