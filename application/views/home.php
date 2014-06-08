<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>UKWM Coin Counter</title>

    <!-- Bootstrap core CSS -->
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/assets/css/site.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="container">
      <div class="header">
        <h1 class="text-muted">UKWM: Coin Counter</h1>
      </div>

      <div class="jumbotron">		
		<?php echo validation_errors('<div class="bg-danger">','</div>'); ?>
		
		<?=form_open('welcome',array('class' => 'form-inline'))?>
		
		<?=form_label('Enter your coin total','total')?>
		<?=form_input('total',$original_value,'class="form-control"')?>
		
		<?=form_submit('submit','Submit','class="btn btn-success"')?>
		
		<?=form_close()?>
		
      </div>

		<?php if(isset($result)):?>
			<div class="row marketing">
				<div class="col-lg-6">
					<h4>Change Total: &pound;<?=$original_value?>p</h4>
					<table class="table table-striped">
						<tr>
							<td>Coin Type</td>
							<td>Total</td>
						</tr>
					<?php foreach($result['coins'] as $key=>$total):?>
						<tr>
							<td><?=$key?></td>
							<td><?=$total?></td>
						</tr>
					<?php endforeach?>
					</table>
				</div>
			</div>
		<?php endif; ?>

		<div class="footer">
			<p>&copy; Company <?=date('Y')?></p>
		</div>

    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
  </body>
</html>
