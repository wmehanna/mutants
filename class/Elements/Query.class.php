<?php

class query extends Elements{
   
   function __construct() {
       parent::__construct();
   }
   
   function initAdmin($element) {
  
          echo("
           <tr>
           <td><img src='icon/mysql.png'></td>
           <td><input type='text' name='order_$element[objectname]' value='$element[order]' size='2'></td>
            <td>$element[objectname]</td> 
            <td>$element[elementname]</td>    
            <td> 
         
       ");
          
        $saveElement = new MessagesModal("Enregistrer cet élément",$element[objectname]);
        $saveElement->initModalSaveElement($element);

        echo("</td>");
        echo("<td>");
        $deleteElement = new MessagesModal("Supprimer cet élément","delete_".$element[objectname]);
        $deleteElement->initModalDeleteElement($element);
        echo("</td>");
        echo("</tr>");
       
   }
   
      
       
       
        
        
   

}

?>
