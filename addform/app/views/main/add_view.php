<!DOCTYPE HTML>
<html>
  <head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="add_form.css">    
    <title>Add hero</title>
  </head>
  <body>
<form id="form" method="post" enctype="multipart/form-data">
    <legend><?= $data['page_title'] ?></legend>
    <?php
    if (is_array($data['messages'])) foreach ($data['messages'] as $msg) { ?>
        <h4 class="text-info text-center"><?= $msg ?></h4>
    <? } ?>

    
    <div class="row">
      <h1> Hero add form </h1>
        <div class="form-group">
            <label for="name" class="cont">Hero name:</label>
            <input class="form-control" type="text" name='name' value="<?= $data['name'] ?>"
                   required>
            <span class="help-block"></span>
        </div>
        <div class="form-group">
            <label class="cont">City:</label>
            <input class="form-control" type="text" name='city' value="<?= $data['city'] ?>"
                   required>
            <span class="help-block"></span>
        </div>
        
        <div class="form-group">
            <label class="cont">Super abilities?:</label>
            <select name="superhero" class="form-control" id="superhero" required>
                 <option value="1">Yes</option>
                 <option value="0">No</option>
            </select>
        </div>
        
        
        <div class="form-group">
            <label class="cont">Description:</label>
            <textarea name="description" class="form-control" required></textarea>
            <span class="help-block"></span>
        </div>


        <div class=" form-group">
            <label class="cont">Load image:</label>
            <input class="form-control" type="file" name='image' id='image'>
            <span class="help-block"></span>
        </div>
        
         <div class="form-group">
            <label class="cont">Good or bad?:</label>
            <select name="good" class="form-control" id="good" required>
                 <option value="1">Yes</option>
                 <option value="0">No</option>
            </select>
        </div>

        
    
    <div class="form-group">
        <a onclick="history.go(-1)" class="btn btn-default">Cancel</a>
        <button type="submit" class="btn btn-success" name="location" value="">Add hero!</button>
    </div>
    </div>   
</form>

</body>
</html>