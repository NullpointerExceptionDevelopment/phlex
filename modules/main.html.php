<?php


class html{
    function plater() {
        return '
        <div id="platebg"><div id="plate-inverse" class="plate pointer"></div></div>';
    } 
    function css($color) {
        return '<style>
        .plate {
            width: 100px;
            height: 100px;
            background-color: #FFF;
            border-radius: 500px 500px 500px 500px;
            cursor: pointer;
            background-size: cover;
            background-image: url(uploads/'.$_SESSION['username'].'.jpg);
            background-repeat:no-repeat;
            background-position:center;
        }
        #platebg {
            width: 100px;
            height: 100px;
            background-color: rgba(0,0,0,0.2);
            border-radius: 500px 500px 500px 500px;
            cursor: pointer;
            box-shadow: inset 0px 1px 2px #000;
        }

        #titlebar {
            background-color: #'.$color.';
            position: fixed;
            width:100%;
            top: 0px;
            left:0px;
            padding: 10px;
            
        }        
        #space {
            background-color: transparent;
            height:100px;
            
        }
        #button {
            background-color: transparent;
            height:150px;
            
        }

        </style>';
    }     
    function masterstart() {
        echo '<div id="master">';
        return 0;
    }
    function masterend() {
        echo '</div>';
        return 0;
    }
    function titlebar($content) {
        echo '<div id="titlebar">'.$content.'</div>';
        return 0;
    }
    function space() {
        echo '<div id="space"></div>';
    }
    function upload(){
        return '
                <form name="uploadformular" enctype="multipart/form-data" action="?action=upload" method="post">
                    <label id="uploadlabel" class="UPLOADLABEL">
                    <input type="file" required style="display:none" name="uploadfile"   accept="image/jpeg"/>
                    <span>Browse ...</span>
                    <input type="hidden" name="page" id="page" value="control">
                    </label>
                    <input type="Submit" name="Submit" id="Upload" value="Upload">
                </form>
			 ';
             
    }

    
    
    
        
}
