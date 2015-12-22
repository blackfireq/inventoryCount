
<form class="form-inline">
<?php foreach ($assets as $asset) { ?>
  <div class="form-group">
    <label for="<?php echo $asset['id']; ?>"><?php echo $asset['name']; ?></label>
    <input type="text" class="form-control" id="<?php echo $asset['id']; ?>">
  </div>
<?php } ?>
</form>
