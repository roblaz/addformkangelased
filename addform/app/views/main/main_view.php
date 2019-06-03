<!DOCTYPE HTML>
<html>
  <head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="add_form.css">    
    <title>Hero view</title>
  </head>
  <body>
    <div class="row2">
<hr/>
<h3><?= (isset($data['message'])) ? $data['message'] : ''; ?></h3>
<hr/>
<?= (isset($data['pagination'])) ? $data['pagination'] : ''; ?>



<center>
<a href="add_view.php" class="btn btn-default"> Add hero </a>
</center>
<hr/>

<table class="table table-striped table-bordered left">
    <caption><?= (isset($data['caption'])) ? $data['caption'] : ''; ?></caption>
    <thead>
    <tr>
        <? if (isset($data['head']) && is_array($data['head'])) {
            foreach ($data['head'] as $head) {
                echo '<th>' . $head . '</th>';
            }
        } ?>
    </tr>
    </thead>
    <tbody>
    <? if (isset($data['rows']) && is_array($data['rows'])) {
        foreach ($data['rows'] as $row) {
            echo $row;
        }
    } ?>
    </tbody>
</table>

<?= (isset($data['pagination'])) ? $data['pagination'] : ''; ?>

</div>

</body>
</html>