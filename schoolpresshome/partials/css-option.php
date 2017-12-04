<?php
$ale_background = ale_get_option('background');
$ale_mainfont = ale_get_option('mainfont');
$ale_bodystyle = ale_get_option('bodystyle');
?>
<?php

    if($ale_mainfont){
        if($ale_mainfontex) {
        $ale_mainfontex = ":".$ale_mainfontex;
    } else {
        $ale_mainfontex = '';
    }
        echo "<link href='https://fonts.googleapis.com/css?family=".$ale_mainfont."' rel='stylesheet'>";
    }

?>
<style type='text/css'>
    body {
        <?php

        if($ale_bodystyle['size']){
            echo "font-size:".$ale_bodystyle['size'].";";
        }
        if($ale_bodystyle['style']){ echo "font-style:".$ale_bodystyle['style'].";"; };
        if($ale_bodystyle['color']){ echo "color:".$ale_bodystyle['color'].";"; };
        if($ale_bodystyle['face']){ $fontfamily =  str_replace ('+',' ',$ale_bodystyle['face']); echo "font-family:".$fontfamily.";"; };

        if($ale_background['color']){ echo "background-color:".$ale_background['color'].";"; }
        if($ale_background['image']){ echo "background-image: url(".$ale_background['image'].");"; }
        if($ale_background['repeat']){ echo "background-repeat:".$ale_background['repeat'].";"; }
        if($ale_background['position']){ echo "background-position:".$ale_background['position'].";"; }
        if($ale_background['attachment']){ echo "background-attachment:".$ale_background['attachment'].";"; }
        ?>
    }

    <?php if($ale_mainfont){?>
        .page-title__big-text, .page-title__small-text {
            <?php if($ale_mainfont){ $mainfont =  str_replace ('+',' ',$ale_mainfont); echo "font-family:".$mainfont.";"; }; ?>
    }
    <?php } ?>

</style>