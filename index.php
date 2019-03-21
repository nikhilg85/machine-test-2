<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge"> -->
  <title>Combine Excel Utility</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Select2 -->
  <!-- <link rel="stylesheet" href="plugins/select2/select2.min.css"> -->
  <!-- Theme style -->
  <link rel="stylesheet" href="css/style.min.css?ver=1.1">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

</head>

<body class="hold-transition">
  <div class="container">

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

      <!-- Floating Alert -->
      <div class="ui floating hidden message" id="floating-message">
        <i class="close icon"></i>
        <div class="header" id="floating-title">
          Welcome back!
        </div>
        <p id="floating-content">This is a special notification which you can dismiss if you're bored with it.</p>
      </div>

      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-12 text-center">
              <h1>Combine Excel Utility</h1>
              <hr>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

   <section class="content">
        <div class="container-fluid">
            
          <div class="row">
              <!-- general form elements -->
            <div class="col-md-3"></div>
            <div class="col-md-6">

              <div class="card card-primary">
                <!-- <div class="card-header">
                  <h3 class="card-title"></h3>
                </div> -->
                 <div class="card-body js">
                  <!-- Drop Zone -->
                  <form method="post" action="uploads.php" enctype="multipart/form-data" novalidate class="box">

                      <div class="box__input">
                        <svg class="box__icon" xmlns="http://www.w3.org/2000/svg" width="50" height="43" viewBox="0 0 50 43"><path d="M48.4 26.5c-.9 0-1.7.7-1.7 1.7v11.6h-43.3v-11.6c0-.9-.7-1.7-1.7-1.7s-1.7.7-1.7 1.7v13.2c0 .9.7 1.7 1.7 1.7h46.7c.9 0 1.7-.7 1.7-1.7v-13.2c0-1-.7-1.7-1.7-1.7zm-24.5 6.1c.3.3.8.5 1.2.5.4 0 .9-.2 1.2-.5l10-11.6c.7-.7.7-1.7 0-2.4s-1.7-.7-2.4 0l-7.1 8.3v-25.3c0-.9-.7-1.7-1.7-1.7s-1.7.7-1.7 1.7v25.3l-7.1-8.3c-.7-.7-1.7-.7-2.4 0s-.7 1.7 0 2.4l10 11.6z"/></svg>
                        <input type="text" class="form-control initial-hide" name="doc_type" value="1">
                        <input type="file" name="file" id="file" class="box__file" data-multiple-caption="{count} files selected" />
                        <label for="file" class="choosefile"><strong>Choose files</strong><span class="box__dragndrop" style="font-weight: normal;"> or drag it here</span>.</label>
                        <button type="submit" class="box__button">Upload</button>
                      </div>

                      
                      <div class="box__uploading">Uploading&hellip;</div>
                      <div class="box__success">Done! <a href="" class="box__restart" role="button">Upload more?</a></div>
                      <div class="box__error">Error! <span></span>. <a href="" class="box__restart" role="button">Try again!</a></div>
                    </form>
                    <span class="text-warning" style="font-size:14px"> Only Excel files are allowed!</span> 

                </div>
                <!-- Upload Finished -->
                <div class="js-upload-finished initial-hide">
                 <h3>Uploaded files</h3>
                  
                </div>
              </div>
            </div>
            <div class="col-md-3"></div>
          </div>
          <div class="row">
            <div class="col-md-12">

              <div class="card card-primary">
                <!-- <div class="card-header">
                  <h3 class="card-title"></h3>
                </div> -->
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form">
                  <div class="card-body">
                    <div class="form-group">
                      <label for="">File 1:</label>
                      <div class="input-group-prepend">
                        <div class="col-sm-2">
                          <span>Available Fields:- </span>
                        </div>
                        <div class="col-sm-12">
                        <span class="input-group-text" id="file-cols-1"></span>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="">File 2:</label>
                      <div class="input-group-prepend">
                        <div class="col-sm-2">
                          <span>Available Fields:- </span>
                        </div>
                        <div class="col-sm-12">
                        <span class="input-group-text" id="file-cols-2"></span>
                        </div>
                      </div>
                    </div>
                    <div class="form-group row">                
                      <label for="set-order" class="col-sm-2 col-form-label">Set Order:</label>
                      <div class="col-sm-10 mb-3">
                        <textarea class="form-control" id="set-order" placeholder="Provide columns separated by comma delimiter here to set order" style="width: 50%"></textarea>
                      </div>
                    </div>
                    <!-- <div class="form-group">
                      <label>Set File Type:</label>
                      <select class="form-control select2" data-placeholder="Set File type" id="">
                        <option>Xlsx</option>
                        <option>Csv</option>
                        <option>txt</option>
                      </select>
                    </div> -->
                    <div class="col-md-12 text-center">
                      <button type="submit" id="download" class="btn btn-primary">Download Output File</button>
                    </div>
                  </div>
                  <!-- /.card-body -->

                </form>
              </div>

            </div>

            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <div id="processedFile" class="initial-hide">
        <div class="alert alert-info alert-dismissable" style="font-size:16px;">
        <button type="button" class="close" data-toggle="modal" data-target="#delete_docmnt"><i class="fa fa-trash-o icon-trash"></i></button>
        <span></span>
        </div>
      </div>

      <!-- Delete confirmation modal -->
      <div class="modal fade" id="docdeleteModal" role="dialog">
        <div class="modal-dialog">
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-body" style="padding: 40px 50px; text-align: center">
              <div class="row">
                <p style="font-size: 20px" id="delete_msg">
                  Are you sure you want to delete?
                </p>
                <br/>
              </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-danger btn-lg pull-left" data-dismiss="modal" id="formdelete">
                <i class="fa fa-trash" aria-hidden="true" style="font-size: 20px; padding-right: 3px;"></i>
                Yes
              </button>
              <button class="btn btn-success btn-lg pull-right" data-dismiss="modal" id="nodelete">
                No
                <i class="fa fa-times" aria-hidden="true" style="font-size: 20px; padding-left: 3px;"></i>
              </button>
            </div>
          </div>
        </div>
      </div>

      <!-- Main content -->
    
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./container -->

  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Select2 -->
  <!-- <script src="plugins/select2/select2.full.min.js"></script> -->

  <!-- Page script -->
  <script>
    function showFloatingMessage(type, title, content, action) {
      $el = $("#floating-message");
      if(type == "success"){
        $el.addClass("positive");
        $el.removeClass("negative");
        $el.removeClass("info");
      }else if(type == "error"){
        $el.addClass("negative");
        $el.removeClass("positive");
        $el.removeClass("info");
      }else if(type == "info"){
        $el.addClass("info");
        $el.removeClass("positive");
        $el.removeClass("negative");
      }

      $("#floating-title").html(title);
      $("#floating-content").html(content);
      $el.removeClass("hidden");

      setTimeout(function() {
        $el.addClass("hidden");
      }, 4000);
    }

    //Initialize Docs Array
    var filesBuffer = [];

    $(function () {
      //Initialize Select2 Elements
      // $('.select2').select2()


      var filecontent = $('#processedFile').html();


      function showPfiles(){
          var len = filesBuffer.length;
          if(len>0){
            $('.js-upload-finished').html('');
            $('.js-upload-finished').html('<h3>Uploaded file(s)</h3>');
            while (len>0){
              addProcessedFile(filesBuffer[len-1]);
              len--;
            }
            $('.js-upload-finished').show();
          }else
            $('.js-upload-finished').hide();
      }

      showPfiles();


      function addProcessedFile(spantext){
        $('.js-upload-finished h3').after('<div class="list-group">'+filecontent+'</div>');
        $('.js-upload-finished div:first').find('span').text(spantext);
      }


      $(".js-upload-finished").on('click', '.icon-trash', deleteRowModal);


      function deleteDoc(e, $el) {
        if (e) e.preventDefault();
        var $this = null;
        if ($el) $this = $el;
        else $this = $(this);
        var row = $this.parents('.list-group');
        var lastRow = $('.js-upload-finished div.list-group').length == 1;
        if (lastRow) {
          $('.js-upload-finished').hide();
          return;
        }
        row.remove();
      }


      function deleteRowModal(ev) {
        if (ev) ev.preventDefault();
        var trigger = $(this);
        var name = $(this).parent().next().text();
        $('#docdeleteModal').modal({
          backdrop : 'static',
          keyboard : false
        }).one('click', '#formdelete', function() {
            deleteDoc(null, trigger);
            filesBuffer = $.grep(filesBuffer, function(value) {
              return value != name;
            });
        }).one('click', '#nodelete', function(ev) {
          trigger = null;
          id = 0;
          ev.preventDefault();
          $("#deleteModal").modal('hide');
        });
      }



      // feature detection for drag & drop upload
      var isAdvancedUpload = function()
        {
          var div = document.createElement( 'div' );
          return ( ( 'draggable' in div ) || ( 'ondragstart' in div && 'ondrop' in div ) ) && 'FormData' in window && 'FileReader' in window;
        }();

      // applying the effect for every form
      $( '.box' ).each( function()
      {
        var $form    = $( this ),
          $input     = $form.find( 'input[type="file"]' ),
          // $meta_type   = $form.find( '[name="meta_type"]' ),
          $label     = $form.find( 'label' ),
          $errorMsg  = $form.find( '.box__error span' ),
          $restart   = $form.find( '.box__restart' ),
          droppedFiles = false,
          showFiles  = function( files )
          {
            $label.text( files.length > 1 ? ( $input.attr( 'data-multiple-caption' ) || '' ).replace( '{count}', files.length ) : files[ 0 ].name );
          };

        // letting the server side to know we are going to make an Ajax request
        $form.append( '<input type="hidden" name="ajax" value="1" />' );

        // automatically submit the form on file select
        $input.on( 'change', function( e )
        {
          showFiles( e.target.files );
          $form.trigger( 'submit' );
        });

        // drag&drop files if the feature is available
        if( isAdvancedUpload )
        {
          $form
          .addClass( 'has-advanced-upload' ) // letting the CSS part to know drag&drop is supported by the browser
          .on( 'drag dragstart dragend dragover dragenter dragleave drop', function( e )
          { // preventing the unwanted behaviours
            e.preventDefault();
            e.stopPropagation();
          })
          .on( 'dragover dragenter', function() //
          {
            $form.addClass( 'is-dragover' );
          })
          .on( 'dragleave dragend drop', function()
          {
            $form.removeClass( 'is-dragover' );
          })
          .on( 'drop', function( e )
          {
            droppedFiles = e.originalEvent.dataTransfer.files; // the files that were dropped
            showFiles(droppedFiles);

            $form.trigger( 'submit' ); // automatically submit the form on file drop    
          });
        }

        // if the form was submitted
        $form.on( 'submit', function( e )
        {
          if (filesBuffer.length && filesBuffer.length == 2) {
            showFloatingMessage('error', 'Error!', 'Sorry! Maximum 2 file are allowed!', 'show');
            return false;
          }
          // preventing the duplicate submissions if the current one is in progress
          if( $form.hasClass( 'is-uploading' ) ) return false;

          $form.addClass( 'is-uploading' ).removeClass( 'is-error' );

          if( isAdvancedUpload ) // ajax file upload for modern browsers
          {
            e.preventDefault();

            // gathering the form data
            var ajaxData = new FormData( $form.get( 0 ) );
            if( droppedFiles )
            {
              $.each( droppedFiles, function( i, file )
              {
                ajaxData.append( $input.attr( 'name' ), file );
              });
            }
            // var meta_type = $meta_type.val();
            // ajax request
            $.ajax(
            {
              url:      $form.attr( 'action' ),
              type:     $form.attr( 'method' ),
              data:       ajaxData,
              dataType:   'json',
              cache:      false,
              contentType:  false,
              processData:  false,
              complete: function(data)
              {
                $form.removeClass( 'is-uploading' );
              },
              success: function( data )
              {
                //console.log(data);
                $form.addClass( data.success == true ? 'is-success' : 'is-error' );
                if( !data.success ) 
                  $errorMsg.text( data.error );
                else {
                  let index = filesBuffer.length;
                  if (!index) {
                    filesBuffer = [];
                    index = 0;
                  }
                  filesBuffer[index] = data.filename;
                  let lastColIndex = Number($('#file-cols-'+index).text().substr(-1, 1));

                  if (data.fields > 0) {
                    let aFields = "";
                    for (let col = 1; col <= data.fields; ++col) {
                        aFields += "Col"+(col+lastColIndex)+", ";
                    }
                    //Remove extra space from last
                    aFields = aFields.replace(/,\s*$/, "");
                    $('#file-cols-'+(index+1)).text(aFields);
                  }
                  if (index == 1) $('.box__restart').hide();
                  showPfiles();
                }
              },
              error: function(data)
              {
                console.log( 'Error. Please, contact the webmaster!' );
              }
            });
          }
          else // fallback Ajax solution upload for older browsers
          {
            var iframeName  = 'uploadiframe' + new Date().getTime(),
              $iframe   = $( '<iframe name="' + iframeName + '" style="display: none;"></iframe>' );

            $( 'body' ).append( $iframe );
            $form.attr( 'target', iframeName );

            $iframe.one( 'load', function()
            {
              var data = $.parseJSON( $iframe.contents().find( 'body' ).text() );
              $form.removeClass( 'is-uploading' ).addClass( data.success == true ? 'is-success' : 'is-error' ).removeAttr( 'target' );
              if( !data.success ) $errorMsg.text( data.error );
              $iframe.remove();
            });
          }
        });


        // Restart the form if has a state of error/success
        $restart.on( 'click', function( e )
        {
          e.preventDefault();
          $form.removeClass( 'is-error is-success' );
          $input.trigger( 'click' );
        });

        // Firefox focus bug fix for file input
        $input
        .on( 'focus', function(){ $input.addClass( 'has-focus' ); })
        .on( 'blur', function(){ $input.removeClass( 'has-focus' ); });
      });

      
      $("#download").click(function(ev) {
        ev.preventDefault();
        $(ev.target).blur();

        let order = $("#set-order").val();

        if (!order.length || filesBuffer.length != 2) {
          showFloatingMessage("error", "Please add necessary details first", "", "show");
          return;
        }

        showFloatingMessage("info", "Processing Data!", "", "show");
        $('.container-fluid').fadeTo(0, 0.5);

        $.ajax({
          method: "POST",
          dataType: "JSON",
          data : {
            "order" : order,
            "files": filesBuffer
          },
          url: "process.php"
        }).done(function(res){
          $('.container-fluid').fadeTo("slow", 1);
          if(res.success){
              showFloatingMessage('success', 'Starting Download!', '', 'show');

              var link = document.createElement('a');
              link.download = 'output.xlsx';
              link.href = res.file;
              link.click();
            }else{
              if (res.message) {
                showFloatingMessage('error', 'Error!', res.message, 'show');
              }else{
                showFloatingMessage('error', 'Error!', "Something went wrong!!", 'show');
              }
            }
        }).fail(function(xhr,status){
          $('.container-fluid').fadeTo("slow", 1);
          showFloatingMessage('error', 'Error!', "Something went wrong!!", 'show');
        });
      });

    })
  </script>
</body>
</html>
