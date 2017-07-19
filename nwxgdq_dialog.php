<?php
// this file contains the contents of the popup window
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Insert Game Dev Quote</title>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.js"></script>
    <script language="javascript" type="text/javascript" src="../../../../wp-includes/js/tinymce/tiny_mce_popup.js"></script>
    <style type="text/css" src="../../../wp-includes/js/tinymce/themes/advanced/skins/wp_theme/dialog.css"></style>
    <script type="text/javascript">

        var nwxgdq_button_dlog = {
            local_ed : 'ed',
            init : function(ed) {
                nwxgdq_button_dlog.local_ed = ed;
                tinyMCEPopup.resizeToInnerSize();
            },
            insert : function insertButton(ed) {

                // set up variables to contain our input values
                var type = $('select#nwxgdq_type option:selected').text();
                //var name = $('#button-dialog input#nwxgdq_name').val();
	            var name = document.getElementById("nwxgdq_name").value;
                var src = document.getElementById("nwxgdq_src").value;
                var content = document.getElementById("nwxgdq_content").value;


                var output = '';

                // setup the output of our shortcode
                if( type == 'Blue Post') {
                    output =  '[bluepost ';
                    output += 'name=\"' + name + '\" url=\"' + src + '\" ';
                    output += ']' + content + '[/bluepost]';
                }else if( type == 'ToR Post' ) {
                    output = '[torpost ';
                    output += 'name=\"' + name + '\" url=\"' + src + '\" ';
                   output += ']' + content + '[/torpost]';
                }else if ( type == 'PS2 Post' ) {
                    output = '[ps2post ';
                    output += 'name=\"' + name + '\" url=\"' + src + '\" ';
                   output += ']' + content + '[/ps2post]';
                }else if ( type == 'ArcheAge Post' ) {
	                output = '[aapost ';
	                output += 'name=\"' + name + '\" url=\"' + src + '\" ';
	                output += ']' + content + '[/aapost]';
                }else {
                    output =  '[valvepost ';
                    output += 'name=\"' + name + '\" url=\"' + src + '\" ';
                    output += ']' + content + '[/valvepost]';
                }

                tinyMCEPopup.execCommand('mceReplaceContent', false, output);

                // Return
                tinyMCEPopup.close();
            }
        };

        tinyMCEPopup.onInit.add(nwxgdq_button_dlog.init, nwxgdq_button_dlog);


    </script>

</head>
<body>
<div id="nwxgdq-dialog">
    <form action="/" method="get" accept-charset="utf-8">

            <label for="nwxgdq_type">Type:</label>
            <select id="nwxgdq_type" name="nwxgdq_type">
            <?php $nwxgdq_types = array('Blue Post', 'ToR Post', 'PS2 Post', 'Valve Post', 'ArcheAge Post' );
                foreach ( $nwxgdq_types as $types ) {
                    echo '<option value="' . $types . '">' . $types . '</option>';
                }?>
            </select><br>

            <label for="nwxgdq_name">Name:</label>
            <input type="text" name="nwxgdq_name" value="" id="nwxgdq_name" /><br>

            <label for="nwxgdq_src">Source:</label>
            <input type="text" name="nwxgdq_src" value="" id="nwxgdq_src" /><br>

            <label for="nwxgdq_content">Content:</label>
            <input type="text" name="nwxgdq_content" value="" id="nwxgdq_content" size="75" /><br>

            <a href="javascript:nwxgdq_button_dlog.insert(nwxgdq_button_dlog.local_ed)" id="insert" style="display: block; line-height: 25px; width: 75px; text-align: center;">Insert</a>

    </form>
</div>
</body>
</html>