<div class="item_section layout_padding2">
  <div class="container">
    <div class="item_container">
      <?php if (isset($liste)) { ?>
        <?php foreach ($liste as $objet) { ?>
          <?php if (!empty($objet)) { ?>
            <div class="box">
              <div class="price">
                <h6>
                <?php echo $objet['nom_objet'] ?>
                </h6>
              </div>
              <div class="img-box">
                <img src="<?php echo base_url(); ?>assets/images/<?php echo $objet['img'] ?>" alt="">
              </div>
              <div class="name">
                <h5>
                <?php echo $objet['descri'] ?>
                </h5>
                <h5>
                <?php echo $objet['prix'] ?> Ar
                </h5>
              </div>
            </div>
          <?php } ?>
        <?php } ?>
      <?php } ?>
    </div>
  </div>
</div>

<!-- end item section -->