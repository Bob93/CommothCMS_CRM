<?php
if(isset($_POST['create-pages-next'])) {
    $pageTitle = $_POST['create-pages-title'];
    $pageTemplate = $_POST['create-pages-template'];
    $pageMenu = $_POST['create-pages-menu'];
    $pageChild = $_POST['create-pages-child'];
    $pageSubmenu = $_POST['create-pages-submenu'];

    echo $pageTitle;
}

if(isset($_POST['create-pages-done'])) {
    $editor = $_POST['editor1'];
    $pageTitle = $_POST['create-pages-title'];

    echo $pageTitle;
    echo $editor;
}

?>

<script src="//cdn.ckeditor.com/4.5.9/full/ckeditor.js"></script>
<section id="content">

    <div class="container clearfix">

        <div class="row">

            <div class="col-md-12 bottommargin">

                <div class="col_full bottommargin-lg clearfix">

                    <div class="fancy-title title-border center">
                        <h3>Create Page</h3>
                    </div>

                    <div class="col-md-12 nobottommargin">

                       <?php if(!isset($_POST['create-pages-next'])) {
                           echo "<h3>Page Credentials</h3>";
                       } else {
                           echo "<h3>Page Content</h3>";
                       }
                       ?>

                        <form id="create-pages-form" name="create-pages-form" class="nobottommargin" action="#" method="POST">
                            <input type="hidden" id="create-pages-title" name="create-pages-title" value="<?php if(!empty($_POST['create-pages-title'])){echo $_POST['create-pages-title'];} ?>">
                            <input type="hidden" id="create-pages-template" name="create-pages-template" value="<?php if(!empty($_POST['create-pages-template'])){echo $_POST['create-pages-template'];} ?>">
                            <input type="hidden" id="create-pages-menu" name="create-pages-menu" value="<?php if(!empty($_POST['create-pages-menu'])){echo $_POST['create-pages-menu'];} ?>">
                            <input type="hidden" id="create-pages-child" name="create-pages-child" value="<?php if(!empty($_POST['create-pages-child'])){echo $_POST['create-pages-child'];} ?>">
                            <input type="hidden" id="create-pages-submenu" name="create-pages-submenu" value="<?php if(!empty($_POST['create-pages-submenu'])){echo $_POST['create-pages-submenu'];} ?>">

                            <?php if(!isset($_POST['create-pages-next'])) { ?>

                                <div class="col_half">
                                    <label for="create-pages-title">Page Title:</label>
                                    <input type="text" id="create-pages-title" name="create-pages-title" value="" class="form-control" />
                                </div>

                                <div class="col_half col_last">
                                    <label for="create-pages-template">Page Template:</label>
                                    <select id="create-pages-template" name="create-pages-template" class="sm-form-control">
                                        <option value="">-- Select One --</option>
                                        <option value="Index">Index</option>
                                        <option value="Tour">Tour</option>
                                        <option value="Aboutus">About Us</option>
                                        <option value="Contact">Contact</option>
                                        <option value="Portfolio">Portfolio</option>
                                    </select>
                                </div>
                            <?php
                            //echo "/COMMOTH%20CO-1.0/website/CommothCMS_CRM/app/home/aboutus.php";
                            //echo file_get_contents("http://localhost/COMMOTH%20CO-1.0/website/CommothCMS_CRM/app/views/home/aboutus.php");
                             ?>
                                <script>
                                $("select#create-pages-template").on('change', function() {
                                    var template = '';

                                    switch (this.value) {
                                        case "Index":
                                            CKEDITOR.instances.editor1.setData( '<h1>Hello</h1>', function()
                                            {
                                                this.checkDirty();  // true
                                            });
                                            break;

                                        case 'Aboutus':
                                            template = 4;
                                            break;

                                        case '3':
                                            template = 5;
                                            break;

                                        case '4':
                                            template = 6;
                                            break;
                                    }


                                    });


                            </script>

                                <div class="col_half">
                                    <label for="create-pages-menu">Menu Items:</label>
                                    <input type="text" id="create-pages-menu" name="create-pages-menu" value="" class="form-control" />
                                </div>

                                <div class="col_half col_last">
                                    <label for="create-pages-child">Child from:</label>
                                    <select id="create-pages-child" name="create-pages-child" class="sm-form-control">
                                        <option value="">-- Select One --</option>
                                        <option value="Index">Index</option>
                                    </select>
                                </div>

                            <div class="col_half">
                                <label for="create-pages-submenu">SubMenu:</label>
                                <select id="create-pages-submenu" name="create-pages-submenu" class="sm-form-control">
                                    <option value="">-- Select One --</option>
                                    <option value="Index">Index</option>
                                </select>
                            </div>

                                <div class="line"></div>
                                <div class="clear"></div>

                            <?php } else { ?>


                                <div id="page_details">
                                        <textarea name="editor1" id="editor1" rows="10" cols="80">
                                            This is my textarea to be replaced with CKEditor.
                                        </textarea>

                                        <script>

//                                            $(document).ready(function()
//                                            {
//                                                $('#cke_19').click(function(e)
//                                                {
//                                                    e.preventDefault();
//                                                    alert("hai");
//                                                });
//                                            })

                                            $(document).ready(function()
                                            {
                                                $('#create-pages-preview').click(function(e)
                                                {
                                                    e.preventDefault();
                                                });

                                            })

                                            var editor = CKEDITOR.replace( 'editor1', {
                                                toolbar :
                                                    [
                                                        { name: 'document', items : [ 'NewPage','Preview' ] },
                                                        { name: 'clipboard', items : [ 'Cut','Copy','Paste','PasteText','PasteFromWord','-','Undo','Redo' ] },
                                                        { name: 'editing', items : [ 'Find','Replace','-','SelectAll','-','Scayt' ] },
                                                        { name: 'insert', items : [ 'Image','Flash','Table','HorizontalRule','Smiley','SpecialChar','PageBreak'
                                                            ,'Iframe' ] },
                                                        '/',
                                                        { name: 'styles', items : [ 'Styles','Format' ] },
                                                        { name: 'basicstyles', items : [ 'Bold','Italic','Strike','-','RemoveFormat' ] },
                                                        { name: 'paragraph', items : [ 'NumberedList','BulletedList','-','Outdent','Indent','-','Blockquote' ] },
                                                        { name: 'links', items : [ 'Link','Unlink','Anchor' ] },
                                                        { name: 'tools', items : [ 'Maximize','-','About' ] }
                                                    ]
                                            });
                                            editor.addContentsCss('../css/style.css' );

                                            $('#editor1').ckeditor();

                                            </script>
                                </div>


                            <div class="clear"></div>

                            <?php } ?>

                            <?php if(!isset($_POST['create-pages-next'])) { ?>
                            <div class="col_full nobottommargin text-right" style="margin:20px;">
                                <button class="button button-desc button-3d button-rounded button-green" id="create-pages-next" name="create-pages-next" value="edit" type="submit">Next (Content Page)</button>
                            </div>
                            <?php } else { ?>
                                <div class="col_full">
                                    <div class="col_half nobottommargin text-left" style="margin-top:20px;">
                                        <button class="button button-desc button-3d button-rounded" id="create-pages-preview" name="create-pages-preview" value="preview" onclick="CKEDITOR.tools.callFunction(7,this);return false;">Preview</button>
                                    </div>
                                    <div class="col_half col_last nobottommargin text-right" style="margin-top:20px;">
                                    <button class="button button-desc button-3d button-rounded button-green" id="create-pages-done" name="create-pages-done" value="edit" type="submit">Create Page</button>
                                    </div>
                                </div>
                            <?php } ?>



                        </form></div>

                    <div class="clear"></div>

                </div>

            </div>

        </div>

    </div>

</section><!-- #content end -->