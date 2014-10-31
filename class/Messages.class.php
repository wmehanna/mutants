<?php
class Messages {
    
    function __construct($type, $message) {
        $this->init($message);
        $this->loadMessage($type, $message);
    }
    
    protected function loadMessage($type, $message){
        
        if(count($message) > 0){
            
            ?>
            <script>
            $(document).ready(function() {
                <?php echo($type); ?>();
            });
            </script>
            <div class="messagebox" id="messageBox"></div>
            <?php
            
        }

    }
    
    protected function init($message){
        ?>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
        
        <style type="text/css">
        .messagebox {position: absolute; width:300px; left: 40%;background-color: #F5F5F5;border: 0px solid #DBDBDB;text-align: center; z-index: 1}
        .errorbox {position: absolute; width:300px; left: 40%;color:#000;background-color:#ffeded;margin:10px 0px;border:1px solid #f27c7c;text-align: center;z-index: 1}
        .confirmbox {position: absolute; width:300px; left: 40%;background-color:#F2FFDB;color:#151515;border:1px solid #9C6;margin:10px 0px;padding:15px;text-align: center;z-index: 1}
       
        </style>
        
        <script>
            $(document).ready(function(){
                setTimeout(function(){
                    $("div.successful").fadeOut("slow", function () {
                    $("div.successful").remove();
                    });
                }, 19000);
            });
            
            $(document).ready(function() {
                $("#messageBox").addClass("messagebox");
                
                setTimeout(function(){
                    $("#messageBox").fadeOut("slow")
                    }, 
                10000);
            });
            
            function success(){
                $("#messageBox").removeClass().addClass("confirmbox").html("<?php echo($message); ?>").fadeIn(15000).fadeOut(4000);
            }
            
            function fail(){
                $("#messageBox").removeClass().addClass("errorbox").html("<?php echo($message); ?>").fadeIn(15000).fadeOut(4000);
            }
            
            
           
        </script>
       
        
        <?php
    }

}

?>
