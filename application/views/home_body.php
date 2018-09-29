
    <link rel="stylesheet" href="<?=base_url();?>assets/css/bootstrap-select.min.css" />
    <script src="<?=base_url();?>assets/js/jqueryn.min.js"></script>
    <script src="<?=base_url();?>assets/js/bootstrap-select.min.js"></script>

<h1 align="center" style="font-family: Times">Search Developer</h1>

<div class="row">
<form method="post" enctype="multipart/form-data">
      <div class="col-sm-4 col-sm-offset-2">
       <label class="control-label " for="email">Programming Language</label>
        <select name="prog_lang" class="selectpicker" data-show-subtext="true" data-live-search="true">
            <option value="">Select</option>
            <?php foreach ($pl->result() as $prog_lang) {?>

              <option  value="<?=$prog_lang->id;?>"><?=$prog_lang->name;?></option>
              <?php }?>
          </select>
      </div>

     <div class="col-sm-3">
       <label class="control-label " for="email">Language Code</label>
        <select name="lang" class="selectpicker" data-show-subtext="true" data-live-search="true">
            <option value="">Select</option>
             <?php foreach ($languages->result() as $language) {?>

              <option  value="<?=$language->id;?>"><?=$language->code;?></option>

              <?php }?>
          </select>
      </div>
</form>

	<div class="form-group">
      <div class="col-sm-offset-5 col-sm-5">
        <button type="submit" class="btn btn-success" onclick="search_result();" style="margin-top: 20px">See Result</button>
      </div>
    </div>

      </div>

      <div class="row" id="demo">




      </div>
 <script type="text/javascript">
    function search_result()
    {
       var prog_lang = $("#prog_lang").val();
       var lang = $("#lang").val();

       if(prog_lang == '' || lang == '')
       {
       		alert('Select One Field at least');
       }
       else
       {
       		$.ajax({

	  		type: "POST",
	  		url: "<?=base_url();?>welcome/search_result",
	  		data:  {prog_lang:prog_lang,lang:lang},
	  		success: function (data)
	  		{
	  			//alert(data);
	  			if(data)
	  			{

	  				document.getElementById("demo").innerHTML = data;

	  			}
	  		}
  		});
       }
    }
</script>